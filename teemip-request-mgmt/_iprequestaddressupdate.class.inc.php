<?php
// Copyright (C) 2014 TeemIp
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
 * @copyright   Copyright (C) 2014 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

class _IPRequestAddressUpdate extends IPRequestAddress
{
	/**
	 * Check validity of stimulus before allowing it to be applied
	 */
	public function CheckStimulus($sStimulusCode)
	{
		if ($sStimulusCode == 'ev_resolve')
		{
			// Check that an Ip address can be created with given parameters
			//	Create temporary IP to check uniqueness of FQDN. Note that Ipv4 or IPv6 addresses can do.
			$oIp = MetaModel::NewObject('IPv4Address');
			$oIp->Set('org_id', $this->Get('org_id'));
			$oIp->Set('short_name', $this->Get('new_short_name'));
			$oIp->Set('domain_id', $this->Get('new_domain_id'));
			$oIp->ComputeValues();
			if (! $oIp->IsFqdnUnique())
			{
				return (Dict::Format('UI:IPManagement:Action:Implement:IPAddressChangeUpdate:IPNameCollision'));
			}
		}
		return '';
	}
	
	/**
	 * Apply stimulus to object
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
				$iIpId = $this->Get('ip_id');
				$oIp = MetaModel::GetObject('IPv4Address', $iIpId, false /* MustBeFound */);
				if (is_null($oIp))
				{
					$oIp = MetaModel::GetObject('IPv6Address', $iIpId, false /* MustBeFound */);
				}
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
			}
			return false;
		}
	}

}
