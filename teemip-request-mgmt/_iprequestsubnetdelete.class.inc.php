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

class _IPRequestSubnetDelete extends IPRequestSubnet
{
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
				$iSubnetId = $this->Get('subnet_id');
				$oSubnet = MetaModel::GetObject('IPv4Subnet', $iSubnetId, false /* MustBeFound */);
				if (is_null($oSubnet))
				{
					$oSubnet = MetaModel::GetObject('IPv6Subnet', $iSubnetId, false /* MustBeFound */);
				}
				if (!is_null($oSubnet))
				{
					$oSubnet->Set('status', 'released');
					$iCallerId = $this->Get('caller_id');
					if (! is_null($iCallerId ))
					{
						$oSubnet->Set('requestor_id', $iCallerId);
					}
					$oSubnet->Set('release_date', time());
					$oSubnet->DBUpdate();
					return true;
				}
			}
			return false;
		}
	}
	
}
