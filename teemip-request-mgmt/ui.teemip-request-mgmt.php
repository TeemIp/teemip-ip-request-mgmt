<?php
/*
 * @copyright   Copyright (C) 2010-2023 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

use TeemIp\TeemIp\Extension\Framework\Helper\DisplayMessage;
use TeemIp\TeemIp\Extension\Framework\Helper\IPUtils;

/*************************************************************
 *
 * Main user interface pages for IP Management extension starts here
 *
 * *****************************************************************/
if (!defined('__DIR__')) {
	define('__DIR__', dirname(__FILE__));
}
if (!defined('APPROOT')) {
	if (file_exists(__DIR__.'/../../approot.inc.php')) {
		require_once(__DIR__.'/../../approot.inc.php');   // When in env-xxxx folder
	} else {
		require_once(__DIR__.'/../../../approot.inc.php');   // When in datamodels/x.x folder
	}
}
require_once(APPROOT.'/application/application.inc.php');
require_once(APPROOT.'/application/startup.inc.php');
require_once(APPROOT.'/application/wizardhelper.class.inc.php');

try {
	$operation = utils::ReadParam('operation', '');
	$bPrintable = (utils::ReadParam('printable', 0) == '1');

	require_once(APPROOT.'/application/loginwebpage.class.inc.php');
	$sLoginMessage = LoginWebPage::DoLogin(); // Check user rights and prompt if needed
	$oAppContext = new ApplicationContext();

	$oP = new iTopWebPage(Dict::S('UI:WelcomeToITop'), $bPrintable);
	$oP->SetMessage($sLoginMessage);

	$oP->set_base(utils::GetAbsoluteUrlAppRoot().'pages/');
	// All the following actions use advanced forms that require more javascript to be loaded
	$oP->add_linked_script("../js/json.js");
	$oP->add_linked_script("../js/forms-json-utils.js");
	$oP->add_linked_script("../js/wizardhelper.js");
	$oP->add_linked_script("../js/wizard.utils.js");
	$oP->add_linked_script("../js/links/links_widget.js");
	$oP->add_linked_script("../js/extkeywidget.js");

	switch ($operation) {
		///////////////////////////////////////////////////////////////////////////////////////////

		case 'stimulus': // Stimulus
			$sClass = utils::ReadParam('class', '', false, 'class');
			$id = utils::ReadParam('id', '');
			$sStimulus = utils::ReadParam('stimulus', '');
			// Check if right parameters have been given
			if (empty($sClass) || empty($id) || empty($sStimulus)) {
				throw new ApplicationException(Dict::Format('UI:Error:3ParametersMissing', 'class', 'id', 'stimulus'));
			}
			// Check if the object exists
			$oObj = MetaModel::GetObject($sClass, $id, false /* MustBeFound */);
			if (is_null($oObj)) {
				$oP->set_title(Dict::S('UI:ErrorPageTitle'));
				$oP->P(Dict::S('UI:ObjectDoesNotExist'));
			} else {
				// The object can be read - Check now that user is allowed to modify it
				$oSet = CMDBObjectSet::FromObject($oObj);
				if (!UserRights::IsStimulusAllowed($sClass, $sStimulus, $oSet)) {
					throw new SecurityException('User not allowed to modify this object', array('class' => $sClass, 'id' => $id));
				}

				// Check that stimulus can be applied 
				$sErrorString = $oObj->CheckStimulus($sStimulus);
				if ($sErrorString != '') {
					// Found issues, explain and display search bar & ticket
					$sMessage = Dict::Format('UI:IPManagement:Action:Implement:IPRequest:CannotBeImplemented', $sErrorString);
					DisplayMessage::Warning($oP, $sMessage);

					IPUtils::DisplayDetails($oP, $oObj);
				} else {
					switch ($sClass) {
						case 'IPRequestAddressUpdate':
						case 'IPRequestAddressDelete':
						case 'IPRequestSubnetUpdate':
						case 'IPRequestSubnetDelete':
							if (($sStimulus == 'ev_auto_resolve') || ($sStimulus == 'ev_resolve')) {
								// Apply stimulus
								if ($oObj->ApplyStimulus($sStimulus)) {
									$sMessage = Dict::Format('UI:Class_Object_Updated', MetaModel::GetName(get_class($oObj)), $oObj->GetName());
									DisplayMessage::Success($oP, $sMessage);
								} else {
									$sMessage = Dict::S('UI:FailedToApplyStimuli');
									DisplayMessage::Info($oP, $sMessage);
								}
								$sHeaderTitle = Dict::Format('UI:IPManagement:Action:Implement:IPRequest:Title_Class_Object', $oObj->GetName());
								$oP->SetBreadCrumbEntry($sHeaderTitle, $sHeaderTitle, '', '', 'fas fa-wrench', iTopWebPage::ENUM_BREADCRUMB_ENTRY_ICON_TYPE_CSS_CLASSES);
								IPUtils::DisplayDetails($oP, $oObj);
							}
						break;

						default:
							// Process stimulus
							$aDefault['stimulus'] = $sStimulus;
							$oObj->DisplayOperationForm($oP, $oAppContext, $operation, $aDefault);
							break;
					}
				}
			}
			break; // End case stimulus

		///////////////////////////////////////////////////////////////////////////////////////////

		case 'apply_stimulus': // Apply stimulus
			$sClass = utils::ReadPostedParam('class', '', 'class');
			$id = utils::ReadPostedParam('id', '');
			$sStimulus = utils::ReadPostedParam('stimulus', '');
			// Check if right parameters have been given
			if (empty($sClass) || empty($id) || empty($sStimulus)) {
				throw new ApplicationException(Dict::Format('UI:Error:3ParametersMissing', 'class', 'id', 'stimulus'));
			}
			$sTransactionId = utils::ReadPostedParam('transaction_id', '');

			// Check if the object exists
			$oObj = MetaModel::GetObject($sClass, $id, false /* MustBeFound */);
			if (is_null($oObj)) {
				$oP->set_title(Dict::S('UI:ErrorPageTitle'));
				$oP->P(Dict::S('UI:ObjectDoesNotExist'));
			} else {
				// Make sure we don't follow the same path twice in a row.
				$sClassLabel = MetaModel::GetName($sClass);
				if (!utils::IsTransactionValid($sTransactionId, false)) {
					$oP->set_title(Dict::Format('UI:ModificationPageTitle_Object_Class', $oObj->GetName(), $sClassLabel));
					$oP->p("<strong>".Dict::S('UI:Error:ObjectAlreadyUpdated')."</strong>\n");
				} else {
					// Check that stimulus can be applied
					$aTransitions = $oObj->EnumTransitions();
					$aStimuli = MetaModel::EnumStimuli($sClass);
					if (!isset($aTransitions[$sStimulus])) {
						throw new ApplicationException(Dict::Format('UI:Error:Invalid_Stimulus_On_Object_In_State', $sStimulus, $oObj->GetName(), $oObj->GetStateLabel()));
					}

					// Apply stimulus
					$oP->set_title(Dict::S('UI:IPManagement:Action:Implement:IPRequest'));
					if ($oObj->ApplyStimulus($sStimulus)) {
						$sMessage = Dict::Format('UI:Class_Object_Updated', MetaModel::GetName(get_class($oObj)), $oObj->GetName());
						DisplayMessage::Success($oP, $sMessage);
					} else {
						$sMessage = Dict::S('UI:FailedToApplyStimuli');
						DisplayMessage::Info($oP, $sMessage);
					}
					$sHeaderTitle = Dict::Format('UI:IPManagement:Action:Implement:IPRequest:Title_Class_Object', $oObj->GetName());
					$oP->SetBreadCrumbEntry($sHeaderTitle, $sHeaderTitle, '', '', 'fas fa-wrench', iTopWebPage::ENUM_BREADCRUMB_ENTRY_ICON_TYPE_CSS_CLASSES);
					IPUtils::DisplayDetails($oP, $oObj);
				}
			}
			break; // End case apply_stimulus

		///////////////////////////////////////////////////////////////////////////////////////////

		case 'cancel':    // An action was cancelled
		case 'displaylist':
		default: // Menu node rendering (templates)
			ApplicationMenu::LoadAdditionalMenus();
			$oMenuNode = ApplicationMenu::GetMenuNode(ApplicationMenu::GetMenuIndexById(ApplicationMenu::GetActiveNodeId()));
			if (is_object($oMenuNode)) {
				$oMenuNode->RenderContent($oP, $oAppContext->GetAsHash());
				$oP->set_title($oMenuNode->GetLabel());
			}
			break;

	}
	$oP->output(); // Display the whole content now !
} catch (CoreException $e) {
	require_once(APPROOT.'/setup/setuppage.class.inc.php');
	$oP = new SetupPage(Dict::S('UI:PageTitle:FatalError'));
	if ($e instanceof SecurityException) {
		$oP->add("<h1>".Dict::S('UI:SystemIntrusion')."</h1>\n");
	} else {
		$oP->add("<h1>".Dict::S('UI:FatalErrorMessage')."</h1>\n");
	}
	$oP->error(Dict::Format('UI:Error_Details', $e->getHtmlDesc()));
	$oP->output();

	if (MetaModel::IsLogEnabledIssue()) {
		if (MetaModel::IsValidClass('EventIssue')) {
			try {
				$oLog = new EventIssue();

				$oLog->Set('message', $e->getMessage());
				$oLog->Set('userinfo', '');
				$oLog->Set('issue', $e->GetIssue());
				$oLog->Set('impact', 'Page could not be displayed');
				$oLog->Set('callstack', $e->getTrace());
				$oLog->Set('data', $e->getContextData());
				$oLog->DBInsertNoReload();
			} catch (Exception $e) {
				IssueLog::Error("Failed to log issue into the DB");
			}
		}

		IssueLog::Error($e->getMessage());
	}

	// For debugging only
	//throw $e;
} catch (Exception $e) {
	require_once(APPROOT.'/setup/setuppage.class.inc.php');
	$oP = new SetupPage(Dict::S('UI:PageTitle:FatalError'));
	$oP->add("<h1>".Dict::S('UI:FatalErrorMessage')."</h1>\n");
	$oP->error(Dict::Format('UI:Error_Details', $e->getMessage()));
	$oP->output();

	if (MetaModel::IsLogEnabledIssue()) {
		if (MetaModel::IsValidClass('EventIssue')) {
			try {
				$oLog = new EventIssue();

				$oLog->Set('message', $e->getMessage());
				$oLog->Set('userinfo', '');
				$oLog->Set('issue', 'PHP Exception');
				$oLog->Set('impact', 'Page could not be displayed');
				$oLog->Set('callstack', $e->getTrace());
				$oLog->Set('data', array());
				$oLog->DBInsertNoReload();
			} catch (Exception $e) {
				IssueLog::Error("Failed to log issue into the DB");
			}
		}

		IssueLog::Error($e->getMessage());
	}
}
