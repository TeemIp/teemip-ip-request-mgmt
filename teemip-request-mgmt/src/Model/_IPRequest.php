<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use cmdbAbstractObject;
use Combodo\iTop\Application\UI\Base\Component\Button\ButtonUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Form\FormUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\InputUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Toolbar\ToolbarUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Layout\Object\ObjectFactory;
use Combodo\iTop\Application\UI\Base\Layout\PageContent\PageContentFactory;
use Combodo\iTop\Application\UI\Base\Layout\UIContentBlock;
use Dict;
use iTopWebPage;
use MetaModel;
use Ticket;
use utils;
use WebPage;

class _IPRequest extends Ticket {
	/**
	 * @param $sStimulusCode
	 *
	 * @return bool
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	public function SetClosureDate($sStimulusCode) {
		$this->Set('close_date', time());

		return true;
	}

	/**
	 * @inheritdoc
	 */
	protected function OnInsert() {
		$this->Set('start_date', time());
		$this->Set('last_update', time());
	}

	/**
	 * @inheritdoc
	 */
	protected function OnUpdate() {
		// Auto assign if possible
		if (($this->Get('status') == 'new') && ($this->Get('team_id') > 0) && ($this->Get('agent_id') > 0)) {
			$this->ApplyStimulus('ev_auto_assign');
		}

		$this->Set('last_update', time());
	}

	/**
	 * @inheritdoc
	 */
	public static function GetTicketRefFormat() {
		return 'R-IP-%06d';
	}

	/**
	 * @param bool $bImgTag
	 *
	 * @return string
	 * @throws \CoreException
	 * @throws \Exception
	 */
	public function GetIcon($bImgTag = true) {
		switch ($this->GetState()) {
			case 'closed':
				$sIconFile = 'iprequest-closed.png';
				break;

			default:
				$sIconFile = 'iprequest.png';
				break;
		}
		$sPath = utils::GetAbsoluteUrlModulesRoot().'teemip-request-mgmt/asset/img/'.$sIconFile;
		if ($bImgTag) {
			return "<img src=\"$sPath\" style=\"vertical-align:middle;\" alt=\"\"/>";
		} else {
			return $sPath;
		}
	}

	/*
	 * Displays choices related to operation.
	 *
	 * @param \iTopWebPage $oP
	 * @param $oAppContext
	 * @param $sOperation
	 * @param $aDefault
	 *
	 * @return void
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 * @throws \DictExceptionMissingString
	 */
	public function DisplayOperationForm(iTopWebPage $oP, $oAppContext, $sOperation, $aDefault = array()) {
		$id = $this->GetKey();
		$sClass = get_class($this);
		$sClassLabel = MetaModel::GetName($sClass);
		$sUIPath = $this->MakeUIPath($sOperation);

		$sNextOperation = $this->GetNextOperation($sOperation);
		if (version_compare(ITOP_DESIGN_LATEST_VERSION, '3.0', '<')) {
			// Set page titles
			$this->SetPageTitles($oP, $sUIPath);

			// Set blue modification frame
			$oP->add("<div class=\"wizContainer\">\n");

			// Preparation to allow new values to be posted
			$aFieldsMap = array();
			$sPrefix = '';
			$m_iFormId = $this->GetNewFormId($sPrefix);
			$iTransactionId = utils::GetNewTransactionId();
			$oP->SetTransactionId($iTransactionId);
			$sFormAction = utils::GetAbsoluteUrlModulesRoot()."teemip-request-mgmt/ui.teemip-request-mgmt.php";
			$oP->add("<form action=\"$sFormAction\" id=\"form_$m_iFormId\" enctype=\"multipart/form-data\" method=\"post\" onSubmit=\"return OnSubmit('form_$m_iFormId');\">\n");
			$oP->add_ready_script("$(window).unload(function() { OnUnload('$iTransactionId') } );\n");

			// Display action fields
			$this->DisplayActionFieldsForOperation($oP, $sOperation, $m_iFormId, $aDefault);

			// Load other parameters to post
			$oP->add($oAppContext->GetForForm());
			$oP->add("<input type=\"hidden\" name=\"operation\" value=\"$sNextOperation\">\n");
			$oP->add("<input type=\"hidden\" name=\"class\" value=\"$sClass\">\n");
			$oP->add("<input type=\"hidden\" name=\"transaction_id\" value=\"$iTransactionId\">\n");
			$oP->add("<input type=\"hidden\" name=\"id\" value=\"$id\">\n");

			$oP->add('</form>');
			$oP->add("</div>\n");

			$iFieldsCount = count($aFieldsMap);
			$sJsonFieldsMap = json_encode($aFieldsMap);
			$sState = $this->GetState();
			$oP->add_script(
				<<<EOF
				// Create the object once at the beginning of the page...
				var oWizardHelper$sPrefix = new WizardHelper('$sClass', '$sPrefix', '$sState');
				oWizardHelper$sPrefix.SetFieldsMap($sJsonFieldsMap);
				oWizardHelper$sPrefix.SetFieldsCount($iFieldsCount);
EOF
			);
		} else {
			// Prepare form
			$sUITitle = Dict::Format($sUIPath.':PageTitle_Object_Class', $this->GetName(), $sClassLabel);
			$oP->SetBreadCrumbEntry($sUITitle, $sUITitle, '', '', 'fas fa-wrench', iTopWebPage::ENUM_BREADCRUMB_ENTRY_ICON_TYPE_CSS_CLASSES);
			$oP->set_title($sUITitle);

			$iTransactionId = utils::GetNewTransactionId();
			$oP->SetTransactionId($iTransactionId);
			$this->GetNewFormId('');

			$oP->SetContentLayout(PageContentFactory::MakeForObjectDetails($this, cmdbAbstractObject::ENUM_DISPLAY_MODE_VIEW));
			$oContentBlock = new UIContentBlock();
			$oP->AddUiBlock($oContentBlock);

			$oForm = FormUIBlockFactory::MakeStandard();
			$oContentBlock->AddSubBlock($oForm);

			$oForm->AddHtml($oAppContext->GetForForm())
				->AddSubBlock(InputUIBlockFactory::MakeForHidden('operation', $sNextOperation))
				->AddSubBlock(InputUIBlockFactory::MakeForHidden('class', $sClass))
				->AddSubBlock(InputUIBlockFactory::MakeForHidden('id', $id))
				->AddSubBlock(InputUIBlockFactory::MakeForHidden('transaction_id', $iTransactionId));

			$oToolbarButtons = ToolbarUIBlockFactory::MakeStandard(null);
			$oCancelButton = ButtonUIBlockFactory::MakeForCancel(Dict::S('UI:Button:Cancel'), 'cancel', 'cancel')->SetOnClickJsCode("BackToDetails('$sClass', '$id', '', '{null}');");
			$oCancelButton->AddCSSClasses(['action', 'cancel']);
			$oToolbarButtons->AddSubBlock($oCancelButton);
			$oApplyButton = ButtonUIBlockFactory::MakeForPrimaryAction(Dict::S('UI:Button:Apply'), null, null, true);
			$oApplyButton->AddCSSClass('action');
			$oToolbarButtons->AddSubBlock($oApplyButton);

			$oObjectDetails = ObjectFactory::MakeDetails($this);
			$oToolbarButtons->AddCSSClass('ibo-toolbar-top');
			$oObjectDetails->AddToolbarBlock($oToolbarButtons);

			$oForm->AddSubBlock($oObjectDetails);

			// Note: DisplayBareHeader is called before adding $oObjectDetails to the page, so it can inject HTML before it through $oPage.
			$oP->AddTabContainer(OBJECT_PROPERTIES_TAB, '', $oObjectDetails);
			$oP->SetCurrentTabContainer(OBJECT_PROPERTIES_TAB);
			$oP->SetCurrentTab(Dict::S($sUIPath));

			// Display action fields and action buttons
			$this->DisplayActionFieldsForOperationV3($oP, $oObjectDetails, $sOperation, $aDefault);

			$oP->add_ready_script(
				<<<EOF
				$(window).on('unload',function() { return OnUnload('$iTransactionId', '$sClass', $id) } );
EOF
			);

		}
	}

	/**
	 * Set page titles.
	 *
	 * @param \WebPage $oP
	 * @param $sUIPath
	 * @param $oObj
	 * @param $sClassLabel
	 * @param bool $bIcon
	 */
	public function SetPageTitles(iTopWebPage $oP, $sUIPath, $bIcon = true) {
		$sClassLabel = MetaModel::GetName(get_class($this));
		$oP->set_title(Dict::Format($sUIPath.':PageTitle_Object_Class', $this->GetName(), $sClassLabel));
		$oP->add("<div class=\"page_header teemip_page_header\">\n");
		$sIcon = '';
		if ($bIcon) {
			$sIcon = $this->GetIcon()."&nbsp;";
		}
		$oP->add("<h1>".$sIcon.Dict::Format($sUIPath.':Title_Class_Object', $sClassLabel,
				'<span class="hilite">'.$this->GetName().'</span>')."</h1>\n");
		$oP->add("</div>\n");
	}

	/**
	 * @param $sPrefix
	 *
	 * @return string
	 */
	public function GetNewFormId($sPrefix) {
		self::$iGlobalFormId++;
		$this->m_iFormId = $sPrefix.self::$iGlobalFormId;

		return ($this->m_iFormId);
	}

	/**
	 * Create common string for UI displays
	 *
	 * @param $sOperation
	 *
	 * @return string
	 */
	public function MakeUIPath($sOperation) {
		switch ($sOperation) {
			case 'stimulus':
			case 'apply_stimulus':
				return ('UI:IPManagement:Action:Implement:IPRequest');

			default:
				return '';
		}
	}

	/**
	 * @param $sOperation
	 *
	 * @return string
	 */
	function GetNextOperation($sOperation) {
		switch ($sOperation) {
			case 'stimulus':
				return 'apply_stimulus';
			case 'apply_stimulus':
				return 'stimulus';

			default:
				return '';
		}
	}

	/**
	 * Check validity of stimulus before allowing it to be applied
	 */
	public function CheckStimulus($sStimulusCode) {
		return '';
	}

	/**
	 * @inheritdoc
	 */
	public function DisplayBareRelations(WebPage $oP, $bEditMode = false) {
		parent::DisplayBareRelations($oP, $bEditMode);

		if (!$bEditMode) {
			$oP->RemoveTab('Ticket:ImpactAnalysis');
		}
	}

	/**
	 * Display attributes associated to an operation
	 *
	 * @param \iTopWebPage $oP
	 * @param $sOperation
	 * @param $iFormId
	 * @param $aDefault
	 *
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 * @throws \DictExceptionMissingString
	 */
	protected function DisplayActionFieldsForOperation(iTopWebPage $oP, $sOperation, $iFormId, $aDefault) {
	}

	/**
	 * Display attributes associated to operation - V >= 3.0
	 *
	 * @param \iTopWebPage $oP
	 * @param $oObjectDetails
	 * @param $sOperation
	 * @param $aDefault
	 *
	 * @return void
	 */
	protected function DisplayActionFieldsForOperationV3(iTopWebPage $oP, $oObjectDetails, $sOperation, $aDefault) {
	}

}
