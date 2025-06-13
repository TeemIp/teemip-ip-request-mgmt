<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Combodo\iTop\Application\UI\Base\Component\Html\HtmlFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\InputUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\Select\SelectOptionUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\SelectUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Layout\MultiColumn\Column\Column;
use Combodo\iTop\Application\UI\Base\Layout\MultiColumn\MultiColumn;
use Combodo\iTop\Service\Events\EventData;
use Dict;
use IPRequestSubnetCreate;
use iTopWebPage;
use MetaModel;
use TeemIp\TeemIp\Extension\IPv6Management\Model\ormIPv6;
use UserRights;
use utils;

class _IPRequestSubnetCreateV6 extends IPRequestSubnetCreate
{
    /**
     * Handle After Write event on IPRequestSubnetCreateV6
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnIPRequestSubnetCreateV6AfterWriteRequestedByIpRequestMgmt(EventData $oEventData): void
    {
        $aEventData = $oEventData->GetEventData();
        if ($aEventData['is_new']) {
            // Has the user the right profile for auto registration ?
            $aProfiles = UserRights::ListProfiles();
            if (in_array('IP Portal Automation user', $aProfiles)) {
                // CheckStimulus is not called as all check operations need to be replayed here
                // If the block exists...
                $sLogEntry = '';
                $oBlock = MetaModel::GetObject('IPv6Block', $this->Get('block_id'), false /* MustBeFound */);
                if (!is_null($oBlock)) {
                    // ... and allows auto registration
                    if ($oBlock->Get('allow_automatic_subnet_creation') == "yes") {
                        // Check if there is some space available
                        $iPrefix = $this->Get('mask');
                        $aFreeSpace = $oBlock->GetFreeSpace($iPrefix, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
                        if (count($aFreeSpace) > 0) {
                            if (parent::ApplyStimulus('ev_auto_resolve', true /* $bDoNotWrite */)) {
                                // Register subnet and update public log
                                $this->RegisterSubnet(true, $aFreeSpace[0]['firstip']->ToString());

                                $sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed');
                                $sLogEntry .= Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:Confirmation', $aFreeSpace[0]['firstip'] . ' /' . $this->Get('mask'), $this->Get('status_subnet'));
                            }
                        } else {
                            $sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock');
                        }
                    } else {
                        $sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoAutomaticAllocationInBlock');
                    }
                } else {
                    $sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock');
                }
                if ($sLogEntry != '') {
                    $oLog = $this->Get('public_log');
                    $oLog->AddLogEntry($sLogEntry);
                    $this->Set('public_log', $oLog);
                    $this->DBUpdate();
                }
            }
        }
	}

	/**
	 * Check validity of stimulus before allowing it to be applied
	 */
	public function CheckStimulus($sStimulusCode): string
    {
		if (($sStimulusCode == 'ev_auto_resolve') || ($sStimulusCode == 'ev_resolve')) {
			// Run the check only if no subnet has been manually assigned yet !
			if ($this->Get('subnet_id') <= 0) {
				// Check that block is not full already for required size
				$oBlock = MetaModel::GetObject('IPv6Block', $this->Get('block_id'), false /* MustBeFound */);
				if (is_null($oBlock)) {
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock', $this->Get('block_id')));
				}
				$iPrefix = $this->Get('mask');
				$aFreeSpace = $oBlock->GetFreeSpace($iPrefix, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
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
	protected function DisplayActionFieldsForOperationV3(iTopWebPage $oP, $oObjectDetails, $sOperation, $aDefault): void
    {
		$sStimulus = $aDefault['stimulus'];
		if ($sStimulus != 'ev_resolve') {
			return;
		}
		$oObjectDetails->AddSubBlock(InputUIBlockFactory::MakeForHidden('stimulus', 'ev_resolve'));

		$oMultiColumn = new MultiColumn();
		$oP->AddUIBlock($oMultiColumn);
		$oColumn1 = new Column();           // First column = labels or fields
		$oMultiColumn->AddColumn($oColumn1);
		$oColumn2 = new Column();           // Second column = data
		$oMultiColumn->AddColumn($oColumn2);

		// Check if Subnet has already been manually allocated
		if ($this->Get('subnet_id') <= 0) {
			// No subnet has already been manually allocated, offer some
			$sLabelOfAction1 = Dict::S('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet');

			$oBlock = MetaModel::GetObject('IPv6Block', $this->Get('block_id'), true /* MustBeFound */);
			$iPrefix = $this->Get('mask');
			$aFreeSpace = $oBlock->GetFreeSpace($iPrefix, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
			$iSizeFreeArray = sizeof($aFreeSpace);

			$oSelect = SelectUIBlockFactory::MakeForSelect('ip');
			$oColumn2->AddSubBlock($oSelect);
			if ($iSizeFreeArray != 0) {
				// Translate list of spaces into select box
				for ($i = 0; $i < sizeof($aFreeSpace); $i++) {
					$bSelected = ($i == 0) ? true : false;
					$sFirstIp = $aFreeSpace[$i]['firstip']->ToString();
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
	public function ApplyStimulus($sStimulusCode, $bDoNotWrite = false): bool
    {
		if (($sStimulusCode != 'ev_auto_resolve') && ($sStimulusCode != 'ev_resolve')) {
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
	private function RegisterSubnet($bNewSubnet, $sSubnetIp): void
    {
		// Prepare and register subnet
		if ($bNewSubnet) {
			// Find corresponding IPConfig
			$iOrgId = $this->Get('org_id');
			$oIPConfig = MetaModel::GetObjectFromOQL("SELECT IPConfig AS c WHERE c.org_id = :org_id", array('org_id' => $iOrgId));
			if (is_null($oIPConfig)) {
				return;
			}

			// Create Subnet
			$oSubnet = MetaModel::NewObject('IPv6Subnet');
			$oSubnet->Set('org_id', $iOrgId);
			$oSubnet->Set('ipconfig_id', $oIPConfig->GetKey());
			$oSubnet->Set('block_id', $this->Get('block_id'));
			$oIp = new ormIPv6($sSubnetIp);
			$oSubnet->Set('ip', $oIp);
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
