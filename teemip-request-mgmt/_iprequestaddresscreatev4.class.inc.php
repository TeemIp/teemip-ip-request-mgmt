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

class _IPRequestAddressCreateV4 extends IPRequestAddressCreate
{
	/**
	 * Check validity of stimulus before allowing it to be applied
	 */
	public function CheckStimulus($sStimulusCode)
	{
		if ($sStimulusCode == 'ev_resolve')
		{
			// Run the check only if no IP has been manually assigned yet !
			if ($this->Get('ip_id') <= 0)
			{
				// Check that range or subnet is not full already
				$oIpContainer = MetaModel::GetObject('IPv4Range', $this->Get('range_id'), false /* MustBeFound */); 
				if (is_null($oIpContainer))
				{
					$oIpContainer = MetaModel::GetObject('IPv4Subnet', $this->Get('subnet_id'), false /* MustBeFound */);
					if (is_null($oIpContainer))
					{
						return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet', $this->Get('block_id')));
					}
					elseif ($oIpContainer->GetOccupancy('IPv4Address_out_IPv4Range') == 100)
					{
						return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullSubnet'));
					}
				}
				else
				{
					if ($oIpContainer->GetOccupancy('IPv4Address') == 100)
					{
						return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange'));
					}
				}
				
				// Check that an IP address can be created with given parameters
				$oIp = MetaModel::NewObject('IPv4Address');
				$oIp->Set('org_id', $this->Get('org_id'));
				$oIp->Set('short_name', $this->Get('short_name'));
				$oIp->Set('domain_id', $this->Get('domain_id'));
				$oIp->ComputeValues();
				if (! $oIp->IsFqdnUnique())
				{
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:IPNameCollision'));
				}
			}
		}
		return '';
	}
	
	/**
	 * Display attributes associated operation
	 */      
	function DisplayActionFieldsForOperation(WebPage $oP, $sOperation, $m_iFormId, $aDefault = array())
	{
		$sStimulus = $aDefault['stimulus'];
		if ($sStimulus != 'ev_resolve')
		{
			return '';
		}
		
		$oP->add("<table>");
		$oP->add("<input type=\"hidden\" name=\"stimulus\" value=\"$sStimulus\">\n");
		$oP->add('<tr><td style="vertical-align:top">');
		$sOrgId = $this->Get('org_id');

		// Check if IP has already been manually allocated
		if ($this->Get('ip_id') <= 0)
		{
			// No IP has already been manually allocated, offer some
			// Create array of free IPs
			$sLabelOfAction1 = Dict::S('UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp');

			$iSubnetId = $this->Get('subnet_id');
			$oIpContainer = MetaModel::GetObject('IPv4Range', $this->Get('range_id'), false /* MustBeFound */); 
			if (is_null($oIpContainer))
			{
				$bWithRanges = true;
				$oIpContainer = MetaModel::GetObject('IPv4Subnet', $iSubnetId, true /* MustBeFound */); 
				$sIpContainerClass = 'IPv4Subnet';
				$sFirstIp = $oIpContainer->Get('ip');
				$sLastIp = $oIpContainer->Get('broadcastip');
				$oIpRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT IPv4Range AS r WHERE r.subnet_id = $iSubnetId"));
				$aRangeIPs = $oIpRangeSet->GetColumnAsArray('firstip', false);
				$oIpRangeSet->Rewind();
			}
			else
			{
				$bWithRanges = false;
				$sFirstIp = $oIpContainer->Get('firstip');
				$sLastIp = $oIpContainer->Get('lastip');
			}
			$oIpRegisteredSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT IPv4Address AS i WHERE i.subnet_id = $iSubnetId"));
			$aRegisteredIPs = $oIpRegisteredSet->GetColumnAsArray('ip', false);
			$iFirstIp = myip2long($sFirstIp);
			$iLastIp = myip2long($sLastIp);
			$sPingBeforeAssign = IPConfig::GetFromGlobalIPConfig('ping_before_assign', $sOrgId);
			$iCreationOffset = IPConfig::GetFromGlobalIPConfig('request_creation_ipv4_offset', $sOrgId);
			if ($iFirstIp + $iCreationOffset <= $iLastIp)
			{
				$iFirstIp += $iCreationOffset;
			}
						
			$iAnIp = $bWithRanges ? ($iFirstIp + 1) : $iFirstIp;
			$i = 0;
			$iNumberOfFreeIps = 0;
			$iMaxFreeOffers = ($sPingBeforeAssign == 'ping_yes') ? DEFAULT_MAX_FREE_IP_OFFERS_WITH_PING_REQ : DEFAULT_MAX_FREE_IP_OFFERS_REQ;
			while (($iAnIp <= $iLastIp) && ($i < $iMaxFreeOffers))
			{
				$sAnIp = mylong2ip($iAnIp);
				if ($bWithRanges)
				{
					// If IP belongs to a range, skip range
					if (in_array($sAnIp, $aRangeIPs))
					{ 
						$oIpRangeSet->Rewind();
						$oIpRange = $oIpRangeSet->Fetch();
						while ($oIpRange->Get('firstip') != $sAnIp)
						{
							$oIpRange = $oIpRangeSet->Fetch();
						}
						$iAnIp = myip2long($oIpRange->Get('lastip'));
					}
				}
				if (!in_array($sAnIp, $aRegisteredIPs))
				{
					// Found free IP. If required, make sure it doesn't ping (well... locally)
					if ($sPingBeforeAssign == 'ping_yes')
					{
						$aOutput = IpPings($sAnIp, TIME_TO_WAIT_FOR_PING_SHORT);
						if (empty($aOutput))
						{
							// IP doesn't ping
							$aFreeIPs [$i++] = $sAnIp;
						}
					}
					else
					{
						$aFreeIPs [$i++] = $sAnIp;
					}
				}
				$iAnIp++;
			}
			$iNumberOfFreeIps = $i;
						
			// There is at least an IP free. Check has been done before...
			// ... unless pings has been required and all IPs ping
			if ($iNumberOfFreeIps != 0)
			{ 
				// Translate it into select box
				$sInputId = $m_iFormId.'_'.'ip';
				$sHTMLValue = "<select id=\"$sInputId\" name=\"ip\">\n";
				// There is at least an IP free. Check has been done before.
				$sHTMLValue .= "<option selected='' value=\"$aFreeIPs[0]\">$aFreeIPs[0]</option>\n";
				for($i = 1; $i < $iNumberOfFreeIps; $i++)
				{
					$sHTMLValue .= "<option value=\"$aFreeIPs[$i]\">$aFreeIPs[$i]</option>\n";
				}
				$sHTMLValue .= "</select>";
			}
			else
			{
				$sHTMLValue = "";
			}
		}	
		else
		{
			// AnIP has already been manually allocated
			$sLabelOfAction1 = Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:ConfirmSelectedIP', $this->GetAsHTML('ip_id'));
			$sHTMLValue = "";
		}
		
		$aDetails[] = array('label' => '<span title="">'.$sLabelOfAction1.'</span>', 'value' => $sHTMLValue);
		$oP->Details($aDetails);
		$oP->add('</td></tr>');
				
		// Cancel button
		$iObjId = $this->GetKey();
		$oP->add("<tr><td><button type=\"button\" class=\"action\" onClick=\"BackToDetails('IPRequestAddressCreateV4', $iObjId)\"><span>".Dict::S('UI:Button:Cancel')."</span></button>&nbsp;&nbsp;");
				
		// Implement button
		$oP->add("&nbsp;&nbsp<button type=\"submit\" class=\"action\"><span>".Dict::S('UI:IPManagement:Action:Implement:IPRequest:Button')."</span></button></td></tr>");
	
		$oP->add("</table>");
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
		
		$bProceedWithChange = false;
		if ($this->Get('ip_id') != 0)
		{
			// An IP has already been manually allocated
			$bProceedWithChange = true;
			$bRegisterNewIp = false; 
		}
		else
		{
			// No IP has been allocated yet
			$sIp = filter_var(utils::ReadPostedParam('ip', '', 'raw_data'), FILTER_VALIDATE_IP);
			if ($sIp != '')
			{
				$bProceedWithChange = true;
				$bRegisterNewIp = true;
			}
		}
		if ($bProceedWithChange)
		{
			if (parent::ApplyStimulus($sStimulusCode, true /* $bDoNotWrite */))
			{
				// Prepare IP
				// Update CI
				// Register IP with final information
				if ($bRegisterNewIp)
				{
					// Create IP
					$oIp = MetaModel::NewObject('IPv4Address');
					$oIp->Set('org_id', $this->Get('org_id'));
					$oIp->Set('status', $this->Get('status_ip'));
					$oIp->Set('short_name', $this->Get('short_name'));
					$oIp->Set('domain_id', $this->Get('domain_id'));
					$oIp->Set('usage_id', $this->Get('usage_id'));
					$oIp->Set('requestor_id', $this->Get('caller_id'));
																	   
					$oIp->Set('subnet_id', $this->Get('subnet_id'));
					$oIp->Set('range_id', $this->Get('range_id'));
					$oIp->Set('ip', $sIp);
					$oIp->DBInsert();

					// Update ticket with IP
					$this->Set('ip_id', $oIp->GetKey());
				}
				else
				{
					$iIpId = $this->Get('ip_id');
					$oIp = MetaModel::GetObject('IPv4Address', $iIpId, true /* MustBeFound */);
					$oIp->Set('status', $this->Get('status_ip'));

					$oIp->DBUpdate();
				}
				
				// Update FunctionalCI, if any
				$sCIClass = $this->Get('ciclass');
				if ($sCIClass != '')
				{
					$iFunctionalCIid = $this->Get('connectableci_id');
					$oFunctionalCI = MetaModel::GetObject($sCIClass, $iFunctionalCIid, false /* MustBeFound */);
					if (!is_null($oFunctionalCI))
					{
						$sIPAttribute = $this->Get('ip_device_link');
						if (MetaModel::IsValidAttCode($sCIClass, $sIPAttribute))
						{
							$oFunctionalCI->Set($sIPAttribute, $oIp->GetKey());
							$oFunctionalCI->DBUpdate();
						}
					}
				}

				// Update ticket
				$this->DBUpdate();
				return true;
			}
		}
		return false;
	}

}
