<?php
// Copyright (C) 2014 TeemIp
//
//   This file is part of TeemIp.
//
//   TeemIp is free software; you can redistribute it and/or modify	
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   TeemIp is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with TeemIp. If not, see <http://www.gnu.org/licenses/>

/**
 * @copyright   Copyright (C) 2014 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

/*******************
 * Set page titles.
 */
function SetPageTitles(WebPage $oP, $sUIPath, $oObj, $sClassLabel, $bIcon = true)
{
	$oP->set_title(Dict::Format($sUIPath.'PageTitle_Object_Class', $oObj->GetName(), $sClassLabel));
	$oP->add("<div class=\"page_header\">\n");
	if ($bIcon)
	{
		$oP->add("<h1>".$oObj->GetIcon()."&nbsp;".Dict::Format($sUIPath.'Title_Class_Object', $sClassLabel, $oObj->GetName())."</h1>\n");
	}
	else
	{
		$oP->add("<h1>".Dict::Format($sUIPath.'Title_Class_Object', $sClassLabel, $oObj->GetName())."</h1>\n");
	}
	$oP->add("</div>\n");
}

/**************************************
 * Displays choices related to action. 
 */
function DisplayActionForm(WebPage $oP, $oAppContext, $sOperation, $sClass, $id, $oObj, $aDefault = array())
{
	$sClassLabel = MetaModel::GetName($sClass);
	$sUIPath = $oObj->MakeUIPath($sOperation);

	// Set page titles
	SetPageTitles($oP, $sUIPath, $oObj, '', false);
			
	// Set blue modification frame 
	$oP->add("<div class=\"wizContainer\">\n");
			
	// Preparation to allow new values to be posted
	$aFieldsMap = array();
	$sPrefix = '';
	$m_iFormId = $oObj->GetNewFormId($sPrefix);
	$iTransactionId = utils::GetNewTransactionId();
	$oP->SetTransactionId($iTransactionId);
	$sFormAction= utils::GetAbsoluteUrlModulesRoot()."teemip-request-mgmt/ui.teemip-request-mgmt.php";
	$oP->add("<form action=\"$sFormAction\" id=\"form_{$m_iFormId}\" enctype=\"multipart/form-data\" method=\"post\" onSubmit=\"return OnSubmit('form_{$m_iFormId}');\">\n");
	$oP->add_ready_script("$(window).unload(function() { OnUnload('$iTransactionId') } );\n");
	
	// Display action fields
	$oObj->DisplayActionFieldsForOperation($oP, $sOperation, $m_iFormId, $aDefault);
	
	// Load other parameters to post
	$sNextOperation = $oObj->GetNextOperation($sOperation);
	$id = $oObj->GetKey();
	$oP->add($oAppContext->GetForForm());
	$oP->add("<input type=\"hidden\" name=\"operation\" value=\"$sNextOperation\">\n");	
	$oP->add("<input type=\"hidden\" name=\"class\" value=\"$sClass\">\n");
	$oP->add("<input type=\"hidden\" name=\"transaction_id\" value=\"$iTransactionId\">\n");
	$oP->add("<input type=\"hidden\" name=\"id\" value=\"$id\">\n");
	
	$oP->add('</form>');
	$oP->add("</div>\n");
	
	$iFieldsCount = count($aFieldsMap);
	$sJsonFieldsMap = json_encode($aFieldsMap);
	$sState = $oObj->GetState();
	$oP->add_script(
<<<EOF
	// Create the object once at the beginning of the page...
	var oWizardHelper$sPrefix = new WizardHelper('$sClass', '$sPrefix', '$sState');
	oWizardHelper$sPrefix.SetFieldsMap($sJsonFieldsMap);
	oWizardHelper$sPrefix.SetFieldsCount($iFieldsCount);
EOF
);

}

/*************************************************************
 * Main user interface pages for IP Request module starts here
 */
try
{
	require_once('../../approot.inc.php');
	require_once(APPROOT.'/application/application.inc.php');
	require_once(APPROOT.'/application/displayblock.class.inc.php');
	require_once(APPROOT.'/application/itopwebpage.class.inc.php');
	require_once(APPROOT.'/application/loginwebpage.class.inc.php');
	require_once(APPROOT.'/application/startup.inc.php');
	require_once(APPROOT.'/application/wizardhelper.class.inc.php');
	
	$sLoginMessage = LoginWebPage::DoLogin(); // Check user rights and prompt if needed
	$oAppContext = new ApplicationContext();
	
	// Start construction of page

	$oP = new iTopWebPage('');
	$oP->set_base(utils::GetAbsoluteUrlAppRoot().'pages/');
	
	// All the following actions use advanced forms that require more javascript to be loaded
	$oP->add_linked_script("../js/json.js");
	$oP->add_linked_script("../js/forms-json-utils.js");
	$oP->add_linked_script("../js/wizardhelper.js");
	$oP->add_linked_script("../js/wizard.utils.js");
	
	$oP->add_linked_script("../js/linkswidget.js");
	$oP->add_linked_script("../js/extkeywidget.js");
	
	$operation = utils::ReadParam('operation', '');
	switch($operation)
	{
		///////////////////////////////////////////////////////////////////////////////////////////
		
		case 'stimulus': // Stimulus
			$sClass = utils::ReadParam('class', '');
			$id = utils::ReadParam('id', '');
			$sStimulus = utils::ReadParam('stimulus', '');
			// Check if right parameters have been given
			if ( empty($sClass) || empty($id) || empty($sStimulus))
			{
				throw new ApplicationException(Dict::Format('UI:Error:3ParametersMissing', 'class', 'id', 'stimulus'));
			}
			// Check if the object exists
			$oObj = MetaModel::GetObject($sClass, $id, false /* MustBeFound */);
			if (is_null($oObj))
			{
				$oP->set_title(Dict::S('UI:ErrorPageTitle'));
				$oP->P(Dict::S('UI:ObjectDoesNotExist'));
			}
			else
			{
				// The object can be read - Check now that user is allowed to modify it
				$oSet = CMDBObjectSet::FromObject($oObj);
				if (!UserRights::IsStimulusAllowed($sClass, $sStimulus, $oSet))
				{
					throw new SecurityException('User not allowed to modify this object', array('class' => $sClass, 'id' => $id));
				}
				
				// Check that stimulus can be applied 
				$sErrorString = $oObj->CheckStimulus($sStimulus);
				if ($sErrorString != '')
				{
					// Found issues, explain and display search bar & ticket
					$oP->set_title(Dict::S('UI:IPManagement:Action:Implement:IPRequest'));
					$oSearch = new DBObjectSearch($sClass);
					$oBlock = new DisplayBlock($oSearch, 'search', false);
					$oBlock->Display($oP, 0);
					$oObj->DisplayDetails($oP, false);
					$sIssueDesc = Dict::Format('UI:IPManagement:Action:Implement:IPRequest:CannotBeImplemented', $sErrorString);
					$oP->add_ready_script("alert('".addslashes($sIssueDesc)."');");
				}
				else
				{
					switch ($sClass)
					{
						case 'IPRequestAddressUpdate':
						case 'IPRequestAddressDelete':
						case 'IPRequestSubnetUpdate':
						case 'IPRequestSubnetDelete':
							if ($sStimulus == 'ev_resolve')
							{
								// Apply stimulus
								if ($oObj->ApplyStimulus($sStimulus))
								{
									$sMessage = Dict::Format('UI:Class_Object_Updated', MetaModel::GetName(get_class($oObj)), $oObj->GetName());
									$sSeverity = 'ok';
								}
								else
								{
									$sMessage = Dict::S('UI:FailedToApplyStimuli');
									$sSeverity = 'info';
								}
								
								// Displays the ticket details AFTER the actions
								/*$sClassLabel = MetaModel::GetName($sClass);
								$oP->set_title(Dict::Format('UI:ModificationPageTitle_Object_Class', $oObj->GetName(), $sClassLabel));
								$oObj->Reload();
								$oObj->DisplayDetails($oP);*/
								$oAppContext = new ApplicationContext();
								cmdbAbstractObject::SetSessionMessage($sClass, $id, 'update', $sMessage, $sSeverity, 0, true /* must not exist */);
								$oP->add_header('Location: '.utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class='.$sClass.'&id='.$id.'&'.$oAppContext->GetForLink());
							}
						break;
						
						default:
							// Process stimulus
							$aDefault['stimulus'] = $sStimulus;
							DisplayActionForm($oP, $oAppContext, $operation, $sClass, $id, $oObj, $aDefault);
							
							// Displays the ticket details AFTER the actions
							$oP->add('<div class="ui-widget-content">');
							$oObj->DisplayBareProperties($oP);
							$oP->add('</div>');
						break;
					}
				}
			}
		break; // End case stimulus
		
		///////////////////////////////////////////////////////////////////////////////////////////
		
		case 'apply_stimulus': // Apply stimulus
			$sClass = utils::ReadPostedParam('class', '');
			$id = utils::ReadPostedParam('id', '');
			$sTransactionId = utils::ReadPostedParam('transaction_id', '');
			$sStimulus = utils::ReadPostedParam('stimulus', '');
			// Check if right parameters have been given
			if ( empty($sClass) || empty($id) ||	empty($sStimulus))
			{
				throw new ApplicationException(Dict::Format('UI:Error:3ParametersMissing', 'class', 'id', 'stimulus'));
			}
			// Check if the object exists
			$oObj = MetaModel::GetObject($sClass, $id, false /* MustBeFound */);
			if (is_null($oObj))
			{
				$oP->set_title(Dict::S('UI:ErrorPageTitle'));
				$oP->P(Dict::S('UI:ObjectDoesNotExist'));
			}
			else
			{
				// Make sure we don't follow the same path twice in a row.
				$sClassLabel = MetaModel::GetName($sClass);
				if (!utils::IsTransactionValid($sTransactionId, false))
				{
					$oP->set_title(Dict::Format('UI:ModificationPageTitle_Object_Class', $oObj->GetName(), $sClassLabel));
					$oP->p("<strong>".Dict::S('UI:Error:ObjectAlreadyUpdated')."</strong>\n");
				}
				else
				{
					// Check that stimulus can be applied
					$aTransitions = $oObj->EnumTransitions();
					$aStimuli = MetaModel::EnumStimuli($sClass);
					if (!isset($aTransitions[$sStimulus]))
					{
						throw new ApplicationException(Dict::Format('UI:Error:Invalid_Stimulus_On_Object_In_State', $sStimulus, $oObj->GetName(), $oObj->GetStateLabel()));
					}
					
					// Apply stimulus
					$oP->set_title(Dict::S('UI:IPManagement:Action:Implement:IPRequest'));
					if ($oObj->ApplyStimulus($sStimulus))
					{
						$sMessage = Dict::Format('UI:Class_Object_Updated', MetaModel::GetName(get_class($oObj)), $oObj->GetName());
						$sSeverity = 'ok';
					}
					else
					{
						$sMessage = Dict::S('UI:FailedToApplyStimuli');
						$sSeverity = 'info';
					}
					
					// Displays the ticket details AFTER the actions
					$oAppContext = new ApplicationContext();
					cmdbAbstractObject::SetSessionMessage($sClass, $id, 'update', $sMessage, $sSeverity, 0, true /* must not exist */);
					$oP->add_header('Location: '.utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class='.$sClass.'&id='.$id.'&'.$oAppContext->GetForLink());
				}
			}
		break; // End case apply_stimulus
		
		///////////////////////////////////////////////////////////////////////////////////////////
		
		case 'cancel':	// An action was cancelled
		case 'displaylist':
		default: // Menu node rendering (templates)
			ApplicationMenu::LoadAdditionalMenus();
			$oMenuNode = ApplicationMenu::GetMenuNode(ApplicationMenu::GetMenuIndexById(ApplicationMenu::GetActiveNodeId()));
			if (is_object($oMenuNode))
			{
				$oMenuNode->RenderContent($oP, $oAppContext->GetAsHash());
				$oP->set_title($oMenuNode->GetLabel());
			}
		break;
		
	}
	$oP->output(); // Display the whole content now !
}

catch(CoreException $e)
{
	require_once(APPROOT.'/setup/setuppage.class.inc.php');
	$oP = new SetupPage(Dict::S('UI:PageTitle:FatalError'));
	if ($e instanceof SecurityException)
	{
		$oP->add("<h1>".Dict::S('UI:SystemIntrusion')."</h1>\n");
	}
	else
	{
		$oP->add("<h1>".Dict::S('UI:FatalErrorMessage')."</h1>\n");
	}	
	$oP->error(Dict::Format('UI:Error_Details', $e->getHtmlDesc()));	
	$oP->output();
	
	if (MetaModel::IsLogEnabledIssue())
	{
		if (MetaModel::IsValidClass('EventIssue'))
		{
			try
			{
				$oLog = new EventIssue();
				
				$oLog->Set('message', $e->getMessage());
				$oLog->Set('userinfo', '');
				$oLog->Set('issue', $e->GetIssue());
				$oLog->Set('impact', 'Page could not be displayed');
				$oLog->Set('callstack', $e->getTrace());
				$oLog->Set('data', $e->getContextData());
				$oLog->DBInsertNoReload();
			}
			catch(Exception $e)
			{
				IssueLog::Error("Failed to log issue into the DB");
			}
		}
		
		IssueLog::Error($e->getMessage());
	}
	
	// For debugging only
	//throw $e;
}

catch(Exception $e)
{
	require_once(APPROOT.'/setup/setuppage.class.inc.php');
	$oP = new SetupPage(Dict::S('UI:PageTitle:FatalError'));
	$oP->add("<h1>".Dict::S('UI:FatalErrorMessage')."</h1>\n");	
	$oP->error(Dict::Format('UI:Error_Details', $e->getMessage()));	
	$oP->output();
	
	if (MetaModel::IsLogEnabledIssue())
	{
		if (MetaModel::IsValidClass('EventIssue'))
		{
			try
			{
				$oLog = new EventIssue();
				
				$oLog->Set('message', $e->getMessage());
				$oLog->Set('userinfo', '');
				$oLog->Set('issue', 'PHP Exception');
				$oLog->Set('impact', 'Page could not be displayed');
				$oLog->Set('callstack', $e->getTrace());
				$oLog->Set('data', array());
				$oLog->DBInsertNoReload();
			}
			catch(Exception $e)
			{
				IssueLog::Error("Failed to log issue into the DB");
			}
		}
		
		IssueLog::Error($e->getMessage());
	}
}
