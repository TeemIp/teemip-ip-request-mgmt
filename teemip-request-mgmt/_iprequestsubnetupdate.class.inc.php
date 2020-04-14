<?php
// Copyright (C) 2020 TeemIp
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
 * @copyright   Copyright (C) 2020 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

class _IPRequestSubnetUpdate extends IPRequestSubnet
{
	/**
	 * Check validity of stimulus before allowing it to be applied
	 *
	 * @param $sStimulusCode
	 *
	 * @return string
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 */
	public function CheckStimulus($sStimulusCode)
	{
		if ($sStimulusCode == 'ev_resolve')
		{
			// If subnet mask has changed, request agent to change it through manual tools
			$oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);
			if (is_null($oSubnet))
			{
				return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:NoSuchSubnet', $this->Get('subnet_id')));
			}
		}
		return '';
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
	 * @throws \DeleteException
	 * @throws \MissingQueryArgument
	 * @throws \MySQLException
	 * @throws \MySQLHasGoneAwayException
	 * @throws \OQLException
	 */
	public function ApplyStimulus($sStimulusCode, $bDoNotWrite = false)
	{
		if ($sStimulusCode != 'ev_resolve')
		{
			return parent::ApplyStimulus($sStimulusCode);
		}
		else
		{
			$oSubnet = MetaModel::GetObject('IPSubnet', $this->Get('subnet_id'), false /* MustBeFound */);
			if (!is_null($oSubnet))
			{
				if (parent::ApplyStimulus($sStimulusCode, false /* $bDoNotWrite */))
				{
					$sNewName = $this->Get('new_name');
					if ($sNewName != '')
					{
						$oSubnet->Set('name', $sNewName);
					}
					$sNewStatusSubnet = $this->Get('new_status_subnet');
					if (($sNewStatusSubnet != '') && ($sNewStatusSubnet != $oSubnet->Get('status')))
					{
						$oSubnet->Set('status', $sNewStatusSubnet);
					}
					$sNewType = $this->Get('new_type');
					if ($sNewType != '')
					{
						$oSubnet->Set('type', $sNewType);
					}
					$oSubnet->Set('requestor_id', $this->Get('caller_id'));
					$oSubnet->DBUpdate();
						
					$iKey = $oSubnet->GetKey();
					$iOldLocationId = $this->Get('old_location_id');
					$iNewLocationId = $this->Get('new_location_id');
					if ($iNewLocationId != $iOldLocationId)
					{
						if (!$iOldLocationId <= 0)
						{
							// A geography needs to be removed
							
							$oLocationLinkSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT lnkIPSubnetToLocation AS l WHERE l.location_id = $iOldLocationId AND l.ipsubnet_id = $iKey"));
							while ($oLocationLink = $oLocationLinkSet->Fetch())
							{
								$oLocationLink->DBDelete();
							}
						}
						if (!$iNewLocationId <= 0)
						{
							// A new geography has been selected.
							// Create link if it doesn't already exist

							$oLocationLinkSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT lnkIPSubnetToLocation AS l WHERE l.location_id = $iNewLocationId AND l.ipsubnet_id = $iKey"));
							if (!$oLocationLinkSet->CountExceeds(0))
							{
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
			}
			return false;
		}
	}
	
}
