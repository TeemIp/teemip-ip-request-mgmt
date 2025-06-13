<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Combodo\iTop\Service\Events\EventData;
use Dict;
use IPRequestSubnet;
use MetaModel;
use UserRights;

class _IPRequestSubnetDelete extends IPRequestSubnet
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
            // If user profile allows it and if parameter allows automatic processing, try to release subnet straight away
            $aProfiles = UserRights::ListProfiles();
            if (in_array('IP Portal Automation user', $aProfiles)) {
                if (parent::ApplyStimulus('ev_auto_resolve', true /* $bDoNotWrite */)) {
                    // Release subnet and update public log
                    $oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);
                    $sSubnet = (is_null($oSubnet)) ? '' : $oSubnet->Get('ip') . ' /' . $oSubnet->Get('mask');
                    $this->ReleaseSubnet($oSubnet);

                    $oLog = $this->Get('public_log');
                    $sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed');
                    $sLogEntry .= Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetRelease:Confirmation', $sSubnet);
                    $oLog->AddLogEntry($sLogEntry);
                    $this->Set('public_log', $oLog);
                    $this->DBUpdate();
                }
            }
        }
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

			return $this->ReleaseSubnet($oSubnet);
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
	private function ReleaseSubnet($oSubnet): bool
    {
		if (!is_null($oSubnet)) {
			$oSubnet->Set('status', 'released');    // release_date is managed at IPObject level
			$iCallerId = $this->Get('caller_id');
			if (!is_null($iCallerId)) {
				$oSubnet->Set('requestor_id', $iCallerId);
			}
			$oSubnet->DBUpdate();

			return true;
		}

		return false;
	}

}
