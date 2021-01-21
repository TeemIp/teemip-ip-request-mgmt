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

class _IPRequestAddressUpdate extends IPRequestAddress
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

		// Has the user the right profile for automatic update ?
		$aProfiles = UserRights::ListProfiles();
		if (in_array('IP Portal Automation user', $aProfiles))
		{
			// Can the stimulus be applied ?
			$sResCheck = $this->CheckStimulus('ev_resolve');
			if ($sResCheck == '')
			{
				if (parent::ApplyStimulus('ev_resolve', false /* $bDoNotWrite */))
				{
					$this->UpdateIP();
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
	 * @throws \CoreUnexpectedValue
	 */
	public function CheckStimulus($sStimulusCode)
	{
		if ($sStimulusCode == 'ev_resolve')
		{
			// Check that an IP address can be created with given parameters
			$sNewShortName = $this->Get('new_short_name');
			if ($sNewShortName != '')
			{
				//	Check uniqueness of FQDN
				$oIp = MetaModel::GetObject('IPAddress', $this->Get('ip_id'), false);
				if (!is_null($oIp))
				{
					$oIp->Set('org_id', $this->Get('org_id'));
					$oIp->Set('short_name', $this->Get('new_short_name'));
					$oIp->Set('domain_id', $this->Get('new_domain_id'));
					$oIp->ComputeValues();
					if (!$oIp->IsFqdnUnique())
					{
						return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressUpdate:IPNameCollision'));
					}
				}
				else
				{
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressUpdate:NoSelectedIP'));
				}
			}
		}
		return '';
	}
	
	/**
	 * @param string $sStimulusCode
	 * @param false $bDoNotWrite
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
				return $this->UpdateIP();
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
	private function UpdateIP()
	{
		$oIp = MetaModel::GetObject('IPAddress', $this->Get('ip_id'), false /* MustBeFound */);
		if (!is_null($oIp))
		{
			$sNewStatusIp = $this->Get('new_status_ip');
			if (($sNewStatusIp != '') && ($sNewStatusIp != $oIp->Get('status')))
			{
				$oIp->Set('status', $sNewStatusIp);
			}
			$sNewShortName = $this->Get('new_short_name');
			if (($sNewShortName != '') && ($sNewShortName != $oIp->Get('short_name')))
			{
				$oIp->Set('short_name', $sNewShortName);
			}
			$iNewDomainId = $this->Get('new_domain_id');
			if (($iNewDomainId != 0) && ($iNewDomainId != $oIp->Get('domain_id')))
			{
				$oIp->Set('domain_id', $iNewDomainId);
			}
			$iNewUsageId = $this->Get('new_usage_id');
			if (($iNewUsageId != '') && ($iNewUsageId != $oIp->Get('usage_id')))
			{
				$oIp->Set('usage_id', $iNewUsageId);
			}
			$iCallerId = $this->Get('caller_id');
			if (! is_null($iCallerId ))
			{
				$oIp->Set('requestor_id', $iCallerId);
			}
			$oIp->DBUpdate();
			return true;
		}
		return false;
	}
}
