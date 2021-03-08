<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Dict;
use IPRequestSubnet;
use MetaModel;
use UserRights;

class _IPRequestSubnetDelete extends IPRequestSubnet
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

		// If user profile allows it and if parameter allows automatic processing, try to release subnet straight away
		$aProfiles = UserRights::ListProfiles();
		if (in_array('IP Portal Automation user', $aProfiles))
		{
			if (parent::ApplyStimulus('ev_resolve', true /* $bDoNotWrite */))
			{
				// Release subnet and update public log
				$oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);
				$sSubnet = (is_null($oSubnet)) ? '' : $oSubnet->Get('ip').' /'.$oSubnet->Get('mask');
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

	/**
	 * Apply stimulus to object
	 *
	 * @param $sStimulusCode
	 * @param bool $bDoNotWrite
	 *
	 * @return bool
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
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
				$oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);
				return  $this->ReleaseSubnet($oSubnet);
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
	private function ReleaseSubnet($oSubnet)
	{
		if (!is_null($oSubnet))
		{
			$oSubnet->Set('status', 'released');    // release_date is managed at IPObject level
			$iCallerId = $this->Get('caller_id');
			if (!is_null($iCallerId ))
			{
				$oSubnet->Set('requestor_id', $iCallerId);
			}
			$oSubnet->DBUpdate();
			return true;
		}
		else
		{
			return false;
		}
	}

}
