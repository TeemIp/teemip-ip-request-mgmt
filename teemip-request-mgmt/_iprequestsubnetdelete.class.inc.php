<?php
// Copyright (C) 2021 TeemIp
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
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

/**
 * Class _IPRequestSubnetDelete
 */
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
