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

class _IPRequestAddressCreateV6 extends IPRequestAddressCreate
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
				$oIpContainer = MetaModel::GetObject('IPv6Range', $this->Get('range_id'), false /* MustBeFound */); 
				if (is_null($oIpContainer))
				{
					$oIpContainer = MetaModel::GetObject('IPv6Subnet', $this->Get('subnet_id'), false /* MustBeFound */);
					if (is_null($oIpContainer))
					{
						return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet', $this->Get('block_id')));
					}
				}
				else
				{
					if ($oIpContainer->GetOccupancy() == 100)
					{
						return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange'));
					}
				}
				
				// Check that an IP address can be created with given parameters
				$oIp = MetaModel::NewObject('IPv6Address');
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
			$oIpContainer = MetaModel::GetObject('IPv6Range', $this->Get('range_id'), false /* MustBeFound */); 
			if (is_null($oIpContainer))
			{
				$bWithRanges = true;
				$oIpContainer = MetaModel::GetObject('IPv6Subnet', $iSubnetId, true /* MustBeFound */); 
				$sIpContainerClass = 'IPv6Subnet';
				$oFirstIp = $oIpContainer->Get('ip');
				$oLastIp = $oIpContainer->Get('lastip');
				$oIpRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT IPv6Range AS r WHERE r.subnet_id = $iSubnetId"));
				$aRangeIPs = $oIpRangeSet->GetColumnAsArray('firstip', false);
				$oIpRangeSet->Rewind();
			}
			else
			{
				$bWithRanges = false;
				$oFirstIp = $oIpContainer->Get('firstip');
				$oLastIp = $oIpContainer->Get('lastip');
			}
			$sFirstIp = $oFirstIp->ToString();
			$sLastIp = $oLastIp->ToString();

			$oIpRegisteredSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT IPv6Address AS i WHERE i.subnet_id = $iSubnetId"));
			$aRegisteredIPs = $oIpRegisteredSet->GetColumnAsArray('ip', false);
			$sPingBeforeAssign = IPConfig::GetFromGlobalIPConfig('ping_before_assign', $sOrgId);
			$iCreationOffset = IPConfig::GetFromGlobalIPConfig('request_creation_ipv6_offset', $sOrgId);
			// Note: because of the size of an Ipv6 subnet, subnet IP + offset (which is less than 10K) < last IP
			for ($i = 0; $i < $iCreationOffset; $i++)
			{
				$oFirstIp = $oFirstIp->GetNextIp();
			}	
						
			$oAnIp = $bWithRanges ? ($oFirstIp->GetNextIp()) : $oFirstIp;
			$i = 0;
			$iNumberOfFreeIps = 0;
			$iMaxFreeOffers = ($sPingBeforeAssign == 'ping_yes') ? DEFAULT_MAX_FREE_IP_OFFERS_WITH_PING_REQ : DEFAULT_MAX_FREE_IP_OFFERS_REQ;
			while ($oAnIp->IsSmallerOrEqual($oLastIp) && ($i < $iMaxFreeOffers))
			{
				$sAnIp = $oAnIp->ToString();
				if ($bWithRanges)
				{
					// If IP belongs to a range, skip range
					if (in_array($oAnIp, $aRangeIPs))
					{
						$oIpRangeSet->Rewind();
						$oIpRange = $oIpRangeSet->Fetch();
						while (! $oIpRange->Get('firstip')->IsEqual($oAnIp))
						{
							$oIpRange = $oIpRangeSet->Fetch();
						}
						$oAnIp = $oIpRange->Get('lastip');
					}
				}          
				if (!in_array($oAnIp, $aRegisteredIPs))
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
				$oAnIp = $oAnIp->GetNextIp();
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
		$oP->add("<tr><td><button type=\"button\" class=\"action\" onClick=\"BackToDetails('IPRequestAddressCreateV6', $iObjId)\"><span>".Dict::S('UI:Button:Cancel')."</span></button>&nbsp;&nbsp;");
				
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
					$oIpv6 = MetaModel::NewObject('IPv6Address');
					$oIpv6->Set('org_id', $this->Get('org_id'));
					$oIpv6->Set('status', $this->Get('status_ip'));
					$oIpv6->Set('short_name', $this->Get('short_name'));
					$oIpv6->Set('domain_id', $this->Get('domain_id'));
					$oIpv6->Set('usage_id', $this->Get('usage_id'));
					$oIpv6->Set('requestor_id', $this->Get('caller_id'));
																	   
					$oIpv6->Set('subnet_id', $this->Get('subnet_id'));
					$oIpv6->Set('range_id', $this->Get('range_id'));
					$oIp = new ormIPv6($sIp);
					$oIpv6->Set('ip', $oIp);
					$oIpv6->DBInsert();

					// Update ticket with IP
					$this->Set('ip_id', $oIpv6->GetKey());
				}
				else
				{
					$iIpId = $this->Get('ip_id');
					$oIpv6 = MetaModel::GetObject('IPv6Address', $iIpId, true /* MustBeFound */);
					$oIpv6->Set('status', $this->Get('status_ip'));

					$oIpv6->DBUpdate();
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
							$oFunctionalCI->Set($sIPAttribute, $oIpv6->GetKey());
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
