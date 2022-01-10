<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Combodo\iTop\Application\UI\Base\Component\Html\HtmlFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\InputUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\Select\SelectOptionUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\SelectUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Layout\MultiColumn\Column\Column;
use Combodo\iTop\Application\UI\Base\Layout\MultiColumn\MultiColumn;
use Dict;
use IPRequestSubnetCreate;
use iTopWebPage;
use MetaModel;
use TeemIp\TeemIp\Extension\Framework\Helper\IPUtils;
use UserRights;
use utils;

class _IPRequestSubnetCreateV4 extends IPRequestSubnetCreate {
	/**
	 * @inheritdoc
	 */
	public function AfterInsert() {
		parent::AfterInsert();

		// Has the user the right profile for auto registration ?
		$aProfiles = UserRights::ListProfiles();
		if (in_array('IP Portal Automation user', $aProfiles)) {
			// CheckStimulus is not called as all check operations need to be replayed here
			// If the block exists...
			$oBlock = MetaModel::GetObject('IPv4Block', $this->Get('block_id'), false /* MustBeFound */);
			if (!is_null($oBlock)) {
				// ... and allows auto registration
				if ($oBlock->Get('allow_automatic_subnet_creation') == "yes") {
					// Check if there is some space available
					$iSize = IPUtils::MaskToSize($this->Get('mask'));
					$aFreeSpace = $oBlock->GetFreeSpace($iSize, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
					if (count($aFreeSpace) > 0) {
						// Register subnet and update public log
						if (parent::ApplyStimulus('ev_resolve', true /* $bDoNotWrite */)) {
							$this->RegisterSubnet(true, $aFreeSpace[0]['firstip']);

							$oLog = $this->Get('public_log');
							$sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed');
							$sLogEntry .= Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:Confirmation', $aFreeSpace[0]['firstip'].' /'.$this->Get('mask'), $this->Get('status_subnet'));
							$oLog->AddLogEntry($sLogEntry);
							$this->Set('public_log', $oLog);
							$this->DBUpdate();
						}
					}
				}
			}
		}
	}

	/**
	 * Check validity of stimulus before allowing it to be applied
	 *
	 * @param $sStimulusCode
	 *
	 * @return string
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 */
	public function CheckStimulus($sStimulusCode) {
		if ($sStimulusCode == 'ev_resolve') {
			// Run the check only if no subnet has been manually assigned yet !
			if ($this->Get('subnet_id') <= 0) {
				// Check that block is not full already for required size
				$oBlock = MetaModel::GetObject('IPv4Block', $this->Get('block_id'), false /* MustBeFound */);
				if (is_null($oBlock)) {
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock', $this->Get('block_id')));
				}
				$iSize = IPUtils::MaskToSize($this->Get('mask'));
				$aFreeSpace = $oBlock->GetFreeSpace($iSize, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
				$iSizeFreeArray = sizeof($aFreeSpace);
				if ($iSizeFreeArray == 0) {
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock', $this->Get('mask')));
				}
			}
		}

		return '';
	}

	/**
	 * @inheritdoc
	 */
	protected function DisplayActionFieldsForOperation(iTopWebPage $oP, $sOperation, $m_iFormId, $aDefault = array()) {
		$sStimulus = $aDefault['stimulus'];
		if ($sStimulus != 'ev_resolve') {
			return;
		}

		$oP->add("<table>");
		$oP->add("<input type=\"hidden\" name=\"stimulus\" value=\"$sStimulus\">\n");
		$oP->add('<tr><td style="vertical-align:top">');

		// Check if Subnet has already been manually allocated
		if ($this->Get('subnet_id') <= 0) {
			// No subnet has already been manually allocated, offer some
			$sLabelOfAction1 = Dict::S('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet');

			$oBlock = MetaModel::GetObject('IPv4Block', $this->Get('block_id'), true /* MustBeFound */);
			$iSize = IPUtils::MaskToSize($this->Get('mask'));
			$aFreeSpace = $oBlock->GetFreeSpace($iSize, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
			$iSizeFreeArray = sizeof($aFreeSpace);
			if ($iSizeFreeArray != 0) {
				// Translate list of spaces into select box
				$sInputId = $m_iFormId.'_'.'ip';
				$sHTMLValue = "<select id=\"$sInputId\" name=\"ip\">\n";
				$sFirstIp = $aFreeSpace[0]['firstip'];
				$sHTMLValue .= "<option selected='' value=\"$sFirstIp\">$sFirstIp</option>\n";
				for ($i = 1; $i < sizeof($aFreeSpace); $i++) {
					$sFirstIp = $aFreeSpace[$i]['firstip'];
					$sHTMLValue .= "<option value=\"$sFirstIp\">$sFirstIp</option>\n";
				}
				$sHTMLValue .= "</select>";
			} else {
				$sHTMLValue = "";
			}
		} else {
			// A subnet has already been manually allocated
			$sLabelOfAction1 = Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet', $this->GetAsHTML('subnet_id'));
			$sHTMLValue = "";
		}

		$aDetails[] = array('label' => '<span title="">'.$sLabelOfAction1.'</span>', 'value' => $sHTMLValue);
		$oP->Details($aDetails);
		$oP->add('</td></tr>');

		// Cancel button
		$iObjId = $this->GetKey();
		$oP->add("<tr><td><button type=\"button\" class=\"action\" onClick=\"BackToDetails('IPRequestSubnetCreateV4', $iObjId)\"><span>".Dict::S('UI:Button:Cancel')."</span></button>&nbsp;&nbsp;");


		// Implement button
		$oP->add("&nbsp;&nbsp<button type=\"submit\" class=\"action\"><span>".Dict::S('UI:IPManagement:Action:Implement:IPRequest:Button')."</span></button></td></tr>");

		$oP->add("</table>");
	}

	/**
	 * @inheritdoc
	 */
	protected function DisplayActionFieldsForOperationV3(iTopWebPage $oP, $oForm, $sOperation, $aDefault) {
		$sStimulus = $aDefault['stimulus'];
		if ($sStimulus != 'ev_resolve') {
			return;
		}

		$oForm->AddSubBlock(InputUIBlockFactory::MakeForHidden('stimulus', 'ev_resolve'));

		$oMultiColumn = new MultiColumn();
		$oP->AddUIBlock($oMultiColumn);
		$oColumn1 = new Column();           // First column = labels or fields
		$oMultiColumn->AddColumn($oColumn1);
		$oColumn2 = new Column();           // Second column = data
		$oMultiColumn->AddColumn($oColumn2);

		// Check if IP has already been manually allocated
		if ($this->Get('subnet_id') <= 0) {
			// No subnet has already been manually allocated, offer some
			$sLabelOfAction1 = Dict::S('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet');

			$oBlock = MetaModel::GetObject('IPv4Block', $this->Get('block_id'), true /* MustBeFound */);
			$iSize = IPUtils::MaskToSize($this->Get('mask'));
			$aFreeSpace = $oBlock->GetFreeSpace($iSize, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
			$iSizeFreeArray = sizeof($aFreeSpace);

			$oSelect = SelectUIBlockFactory::MakeForSelect('ip');
			$oColumn2->AddSubBlock($oSelect);
			if ($iSizeFreeArray != 0) {
				// Translate list of spaces into select box
				for ($i = 0; $i < sizeof($aFreeSpace); $i++) {
					$bSelected = ($i == 0) ? true : false;
					$sFirstIp = $aFreeSpace[$i]['firstip'];
					$oSelect->AddOption(SelectOptionUIBlockFactory::MakeForSelectOption($sFirstIp, $sFirstIp, $bSelected));
				}
			}
		} else {
			// A subnet has already been manually allocated
			$sLabelOfAction1 = Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet', $this->GetAsHTML('subnet_id'));
		}
		$oColumn1->AddSubBlock(HtmlFactory::MakeParagraph($sLabelOfAction1));
		$oColumn1->AddSubBlock(HtmlFactory::MakeRaw('<br>'));
	}

	/**
	 * @inheritdoc
	 */
	public function ApplyStimulus($sStimulusCode, $bDoNotWrite = false) {
		if ($sStimulusCode != 'ev_resolve') {
			return parent::ApplyStimulus($sStimulusCode);
		} else {
			$bProceedWithChange = false;
			if ($this->Get('subnet_id') > 0) {
				// A subnet has already been manually allocated
				$bProceedWithChange = true;
				$bRegisterNewSubnet = false;
			} else {
				// No subnet has been allocated yet
				$sIp = filter_var(utils::ReadPostedParam('ip', '', 'raw_data'), FILTER_VALIDATE_IP);
				if ($sIp != '') {
					$bProceedWithChange = true;
					$bRegisterNewSubnet = true;
				}
			}
			if ($bProceedWithChange) {
				if (parent::ApplyStimulus($sStimulusCode, true /* $bDoNotWrite */)) {
					$this->RegisterSubnet($bRegisterNewSubnet, $sIp);
					$this->DBUpdate();

					return true;
				}
			}

			return false;
		}
	}

	/**
	 * Create new subnet or update existing one
	 *
	 * @param $bNewIp = is this a new subnet ?
	 * @param $sSubnetIp = Subnet to be created
	 *
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \CoreWarning
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	private function RegisterSubnet($bNewSubnet, $sSubnetIp) {
		// Prepare and register subnet
		if ($bNewSubnet) {
			$oSubnet = MetaModel::NewObject('IPv4Subnet');
			$oSubnet->Set('org_id', $this->Get('org_id'));
			$oSubnet->Set('block_id', $this->Get('block_id'));
			$oSubnet->Set('ip', $sSubnetIp);
			$oSubnet->Set('mask', $this->Get('mask'));
			$oSubnet->Set('name', $this->Get('name'));
			$oSubnet->Set('status', $this->Get('status_subnet'));
			$oSubnet->Set('type', $this->Get('type'));
			$oSubnet->Set('requestor_id', $this->Get('caller_id'));
			$oSubnet->DBInsert();

			if (!$this->Get('location_id') <= 0) {
				// A geography has been selected.
				$oNewLocationLink = MetaModel::NewObject('lnkIPSubnetToLocation');
				$oNewLocationLink->Set('ipsubnet_id', $oSubnet->GetKey());
				$oNewLocationLink->Set('location_id', $this->Get('location_id'));
				$oNewLocationLink->DBInsert();
			}

			$this->Set('subnet_id', $oSubnet->GetKey());
		}
	}

}
