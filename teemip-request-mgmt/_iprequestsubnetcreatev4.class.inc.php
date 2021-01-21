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
 * Class _IPRequestSubnetCreateV4
 */
class _IPRequestSubnetCreateV4 extends IPRequestSubnetCreate
{
	/**
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 */
	public function AfterInsert()
	{
		parent::AfterInsert();

		// Has the user the right profile for auto registration ?
		$aProfiles = UserRights::ListProfiles();
		if (in_array('IP Portal Automation user', $aProfiles))
		{
			// CheckStimulus is not called as all check operations need to be replayed here
			// If the block exists...
			$oBlock = MetaModel::GetObject('IPv4Block', $this->Get('block_id'), false /* MustBeFound */);
			if (!is_null($oBlock))
			{
				// ... and allows auto registration
				if ($oBlock->Get('allow_automatic_subnet_creation') == "yes")
				{
					// Check if there is some space available
					$iSize = IPv4Subnet::MaskToSize($this->Get('mask'));
					$aFreeSpace = $oBlock->GetFreeSpace($iSize, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
					if (count($aFreeSpace) > 0)
					{
						// If yes, register first subnet
						if (parent::ApplyStimulus('ev_resolve',true /* $bDoNotWrite */))
						{
							$this->RegisterSubnet(true, $aFreeSpace[0]['firstip']);
							$this->DBUpdate();
						}
					}
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
	 */
	public function CheckStimulus($sStimulusCode)
	{
		if ($sStimulusCode == 'ev_resolve')
		{
			// Run the check only if no subnet has been manually assigned yet !
			if ($this->Get('subnet_id') <= 0)
			{
				// Check that block is not full already for required size
				$oBlock = MetaModel::GetObject('IPv4Block', $this->Get('block_id'), false /* MustBeFound */);
				if (is_null($oBlock))
				{
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock', $this->Get('block_id')));
				}
				$iSize = IPv4Subnet::MaskToSize($this->Get('mask'));
				$aFreeSpace = $oBlock->GetFreeSpace($iSize, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
				$iSizeFreeArray = sizeof ($aFreeSpace);
				if ($iSizeFreeArray == 0)
				{
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock', $this->Get('mask')));
				}
			}
		}
		return '';
	}
	
	/**
	 * Display attributes associated operation
	 *
	 * @param \WebPage $oP
	 * @param $sOperation
	 * @param $m_iFormId
	 * @param array $aDefault
	 *
	 * @return string
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
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
				
		// Check if Subnet has already been manually allocated
		if ($this->Get('subnet_id') <= 0)
		{
			// No subnet has already been manually allocated, offer some
			$sLabelOfAction1 = Dict::S('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet');

			$oBlock = MetaModel::GetObject('IPv4Block', $this->Get('block_id'), true /* MustBeFound */);
			$iSize = IPv4Subnet::MaskToSize($this->Get('mask'));
			$aFreeSpace = $oBlock->GetFreeSpace($iSize, DEFAULT_MAX_FREE_SPACE_OFFERS_REQ);
			$iSizeFreeArray = sizeof ($aFreeSpace);
			if ($iSizeFreeArray != 0)
			{
				// Translate list of spaces into select box
				$sInputId = $m_iFormId.'_'.'ip';
				$sHTMLValue = "<select id=\"$sInputId\" name=\"ip\">\n";
				$sFirstIp = $aFreeSpace[0]['firstip'];			
				$sHTMLValue .= "<option selected='' value=\"$sFirstIp\">$sFirstIp</option>\n";
				for ($i = 1; $i < sizeof ($aFreeSpace); $i++)
				{
					$sFirstIp = $aFreeSpace[$i]['firstip'];
					$sHTMLValue .= "<option value=\"$sFirstIp\">$sFirstIp</option>\n";
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
			// A subnet has already been manually allocated
			$sLabelOfAction1 = Dict::Format('UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet', $this->GetAsHTML('subnet_id'));
			$sHTMLValue = "";
		}

		$aDetails[] = array('label' => '<span title="">'.$sLabelOfAction1.'</span>', 'value' => $sHTMLValue);
		$oP->Details($aDetails);
		$oP->add('</td></tr>');
			
		// Cancel button
		$iObjId = $this->GetKey();
		$oP->add("<tr><td><button type=\"button\" class=\"action\" onClick=\"BackToDetails('IPRequestSubnetCreateV4', $iObjId)\"><span>".Dict::S('UI:Button:Cancel')."</span></button>&nbsp;&nbsp;");
				
			
		// Implement button
		$oP->add("&nbsp;&nbsp<button type=\"submit\" class=\"action\"><span>".Dict::S('UI:IPManagement:Action:Implement:IPRequest:Button')."</span></button></td></tr>");

		$oP->add("</table>");
	}
	
	/**
	 * Apply stimulus to object
	 *
	 * @param $sStimulusCode
	 * @param bool $bDoNotWrite
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
			$bProceedWithChange = false;
			if ($this->Get('subnet_id') > 0)
			{
				// A subnet has already been manually allocated
				$bProceedWithChange = true;
				$bRegisterNewSubnet = false; 
			}
			else
			{
				// No subnet has been allocated yet
				$sIp = filter_var(utils::ReadPostedParam('ip', '', 'raw_data'), FILTER_VALIDATE_IP);
				if ($sIp != '')
				{
					$bProceedWithChange = true;
					$bRegisterNewSubnet = true;
				}
			}
			if ($bProceedWithChange)
			{
				if (parent::ApplyStimulus($sStimulusCode, true /* $bDoNotWrite */))
				{
					$this->RegisterSubnet($bRegisterNewSubnet, $sIp);
					$this->DBUpdate();
					return true;
				}
			}
			return false;
		}
	}

	/**
	 * Create new subnet or update existing one
	 *
	 * @param $bNewIp = is this a new subnet ?
	 * @param $sSubnetIp = Subnet to be created
	 *
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \CoreWarning
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	private function RegisterSubnet($bNewSubnet, $sSubnetIp)
	{
		// Prepare and register subnet
		if ($bNewSubnet)
		{
			$oSubnet = MetaModel::NewObject('IPv4Subnet');
			$oSubnet->Set('org_id', $this->Get('org_id'));
			$oSubnet->Set('block_id', $this->Get('block_id'));
			$oSubnet->Set('ip', $sSubnetIp);
			$oSubnet->Set('mask', $this->Get('mask'));
			$oSubnet->Set('name', $this->Get('name'));
			$oSubnet->Set('status', $this->Get('status_subnet'));
			$oSubnet->Set('type', $this->Get('type'));
			$oSubnet->Set('requestor_id', $this->Get('caller_id'));
			$oSubnet->DBInsert();

			if (!$this->Get('location_id') <= 0)
			{
				// A geography has been selected.
				$oNewLocationLink = MetaModel::NewObject('lnkIPSubnetToLocation');
				$oNewLocationLink->Set('ipsubnet_id', $oSubnet->GetKey());
				$oNewLocationLink->Set('location_id', $this->Get('location_id'));
				$oNewLocationLink->DBInsert();
			}

			$this->Set('subnet_id', $oSubnet->GetKey());
		}
	}

}
