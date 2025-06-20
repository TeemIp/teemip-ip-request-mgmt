<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Combodo\iTop\Service\Events\EventData;
use CMDBObjectSet;
use DBObjectSearch;
use Dict;
use IPRequestSubnet;
use MetaModel;
use UserRights;

class _IPRequestSubnetUpdate extends IPRequestSubnet
{
    /**
     * Handle After Write event on IPRequestSubnetUpdate
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnIPRequestSubnetUpdateAfterWriteRequestedByIpRequestMgmt(EventData $oEventData): void
    {
        $aEventData = $oEventData->GetEventData();
        if ($aEventData['is_new']) {
            // Has the user the right profile for automatic update ?
            $aProfiles = UserRights::ListProfiles();
            if (in_array('IP Portal Automation user', $aProfiles)) {
                // Can the stimulus be applied ?
                $sLogEntry = $this->CheckStimulus('ev_auto_resolve');
                if ($sLogEntry == '') {
                    if (parent::ApplyStimulus('ev_auto_resolve', false /* $bDoNotWrite */)) {
                        // Update subnet and update public log
                        $oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);
                        $sSubnet = (is_null($oSubnet)) ? '' : $oSubnet->Get('ip') . ' /' . $oSubnet->Get('mask');
                        $this->UpdateSubnet($oSubnet);

                        $sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed');
                        $sLogEntry .= Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:Confirmation', $sSubnet);
                    }
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
	 *
	 * @param $sStimulusCode
	 *
	 * @return string
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 */
	public function CheckStimulus($sStimulusCode): string
    {
		if (($sStimulusCode == 'ev_auto_resolve') || ($sStimulusCode == 'ev_resolve')) {
			// If subnet mask has changed, request agent to change it through manual tools
			$oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);
			if (is_null($oSubnet)) {
				return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:NoSuchSubnet', $this->Get('subnet_id')));
			}
		}

		return '';
	}

	/**
	 * @inheritdoc
	 */
	public function ApplyStimulus($sStimulusCode, $bDoNotWrite = false): bool
    {
		if (($sStimulusCode != 'ev_auto_resolve') && ($sStimulusCode != 'ev_resolve')) {
			return parent::ApplyStimulus($sStimulusCode);
		} elseif (parent::ApplyStimulus($sStimulusCode, false /* $bDoNotWrite */)) {
			$oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);

			return $this->UpdateSubnet($oSubnet);
		}

		return false;
	}

	/**
	 * @return bool
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	private function UpdateSubnet($oSubnet): bool
    {
		if (!is_null($oSubnet)) {
			$sNewName = $this->Get('new_name');
			if ($sNewName != '') {
				$oSubnet->Set('name', $sNewName);
			}
			$sNewStatusSubnet = $this->Get('new_status_subnet');
			if (($sNewStatusSubnet != '') && ($sNewStatusSubnet != $oSubnet->Get('status'))) {
				$oSubnet->Set('status', $sNewStatusSubnet);
			}
			$sNewType = $this->Get('new_type');
			if ($sNewType != '') {
				$oSubnet->Set('type', $sNewType);
			}
			$oSubnet->Set('requestor_id', $this->Get('caller_id'));
			$oSubnet->DBUpdate();

			$iKey = $oSubnet->GetKey();
			$iOldLocationId = $this->Get('old_location_id');
			$iNewLocationId = $this->Get('new_location_id');
			if ($iNewLocationId != $iOldLocationId) {
				if (!$iOldLocationId <= 0) {
					// A geography needs to be removed

					$oLocationLinkSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT lnkIPSubnetToLocation AS l WHERE l.location_id = $iOldLocationId AND l.ipsubnet_id = $iKey"));
					while ($oLocationLink = $oLocationLinkSet->Fetch()) {
						$oLocationLink->DBDelete();
					}
				}
				if (!$iNewLocationId <= 0) {
					// A new geography has been selected.
					// Create link if it doesn't already exist
					$oLocationLinkSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT lnkIPSubnetToLocation AS l WHERE l.location_id = $iNewLocationId AND l.ipsubnet_id = $iKey"));
					if (!$oLocationLinkSet->CountExceeds(0)) {
						$oNewLocationLink = MetaModel::NewObject('lnkIPSubnetToLocation');
						$oNewLocationLink->Set('ipsubnet_id', $iKey);
						$oNewLocationLink->Set('location_id', $iNewLocationId);
						$oNewLocationLink->DBInsert();
					}
				}
			}

			$this->DBUpdate();
			return true;
		}
		return false;
	}

}
