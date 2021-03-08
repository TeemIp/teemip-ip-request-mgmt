<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Dict;
use IPRequestAddress;
use MetaModel;
use UserRights;

class _IPRequestAddressDelete extends IPRequestAddress
{
	/**
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	public function AfterInsert()
	{
		parent::AfterInsert();

		// If user profile allows it and if parameter allows automatic processing, try to release IP straight away
		$aProfiles = UserRights::ListProfiles();
		if (in_array('IP Portal Automation user', $aProfiles))
		{
			if (parent::ApplyStimulus('ev_resolve', true /* $bDoNotWrite */))
			{
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

	/**
	 * Apply stimulus to object
	 *
	 * @param string $sStimulusCode
	 * @param false $bDoNotWrite
	 *
	 * @return bool
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	public function ApplyStimulus($sStimulusCode, $bDoNotWrite = false)
	{
		if ($sStimulusCode != 'ev_resolve')
		{
			return parent::ApplyStimulus($sStimulusCode);
		}
		else
		{
			if (parent::ApplyStimulus($sStimulusCode, false /* $bDoNotWrite */))
			{
				$oIp = MetaModel::GetObject('IPAddress', $this->Get('ip_id'), false /* MustBeFound */);
				return $this->ReleaseIP($oIp);
			}
			return false;
		}
	}

	/**
	 * @return bool
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	private function ReleaseIP($oIp)
	{
		if (!is_null($oIp))
		{
			$oIp->Set('status', 'released');    // release_date is managed at IPObject level
			$iCallerId = $this->Get('caller_id');
			if (!is_null($iCallerId ))
			{
				$oIp->Set('requestor_id', $iCallerId);
			}
			$oIp->DBUpdate();
			return true;
		}
		return false;
	}
}
