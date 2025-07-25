<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Combodo\iTop\Service\Events\EventData;
use Dict;
use IPRequestAddress;
use MetaModel;
use UserRights;

class _IPRequestAddressDelete extends IPRequestAddress
{
    /**
     * Handle After Write event on IPRequestAddressDelete
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnIPRequestAddressDeleteAfterWriteRequestedByIpRequestMgmt(EventData $oEventData): void
    {
        $aEventData = $oEventData->GetEventData();
        if ($aEventData['is_new']) {
            // If user profile allows it and if parameter allows automatic processing, try to release IP straight away
            $aProfiles = UserRights::ListProfiles();
            if (in_array('IP Portal Automation user', $aProfiles)) {
                if (parent::ApplyStimulus('ev_auto_resolve', true /* $bDoNotWrite */)) {
                    // Release IP and update public log
                    $oIp = MetaModel::GetObject('IPAddress', $this->Get('ip_id'), false /* MustBeFound */);
                    $sIp = (is_null($oIp)) ? '' : $oIp->Get('ip');
                    $this->ReleaseIP($oIp);

                    $oLog = $this->Get('public_log');
                    $sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed');
                    $sLogEntry .= Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressRelease:Confirmation', $sIp);
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
			$oIp = MetaModel::GetObject('IPAddress', $this->Get('ip_id'), false /* MustBeFound */);

			return $this->ReleaseIP($oIp);
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
	private function ReleaseIP($oIp): bool
    {
		if (!is_null($oIp)) {
			$oIp->Set('status', 'released');    // release_date is managed at IPObject level
			$iCallerId = $this->Get('caller_id');
			if (!is_null($iCallerId)) {
				$oIp->Set('requestor_id', $iCallerId);
			}
			$oIp->DBUpdate();

			return true;
		}
		return false;
	}
}
