<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use CMDBObjectSet;
use Combodo\iTop\Application\UI\Base\Component\Html\HtmlFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\InputUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\Select\SelectOptionUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Component\Input\SelectUIBlockFactory;
use Combodo\iTop\Application\UI\Base\Layout\MultiColumn\Column\Column;
use Combodo\iTop\Application\UI\Base\Layout\MultiColumn\MultiColumn;
use DBObjectSearch;
use Dict;
use IPConfig;
use IPRequestAddressCreate;
use IPv6Address;
use iTopWebPage;
use MetaModel;
use TeemIp\TeemIp\Extension\IPv6Management\Model\ormIPv6;
use UserRights;
use utils;

class _IPRequestAddressCreateV6 extends IPRequestAddressCreate {
	/**
	 * @inheritdoc
	 */
	public function AfterInsert() {
		parent::AfterInsert();

		// Has the user the right profile for auto registration ?
		$aProfiles = UserRights::ListProfiles();
		if (in_array('IP Portal Automation user', $aProfiles)) {
			// Can the stimulus be applied ?
			$sResCheck = $this->CheckStimulus('ev_resolve');
			if ($sResCheck == '') {
				// If the subnet exists...
				$oIPSubnet = MetaModel::GetObject('IPv6Subnet', $this->Get('subnet_id'), false /* MustBeFound */);
				if (!is_null($oIPSubnet)) {
					// ... and allows auto registration
					if ($oIPSubnet->Get('allow_automatic_ip_creation') == "yes") {
						// If there is as least one Ip available
						$aFreeIPs = $this->GetFreeIPs();
						if (count($aFreeIPs) > 0) {
							if (parent::ApplyStimulus('ev_resolve', true /* $bDoNotWrite */)) {
								// Register IP and update public log
								$this->RegisterIp(true, $aFreeIPs[0]);

								$oLog = $this->Get('public_log');
								$sLogEntry = Dict::S('UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed');
								$sLogEntry .= Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:Confirmation', $aFreeIPs[0], $this->Get('status_ip'));
								$oLog->AddLogEntry($sLogEntry);
								$this->Set('public_log', $oLog);
								$this->DBUpdate();
							}
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
	 * @throws \CoreUnexpectedValue
	 */
	public function CheckStimulus($sStimulusCode) {
		if ($sStimulusCode == 'ev_resolve') {
			// Run the check only if no IP has been manually assigned yet !
			if ($this->Get('ip_id') <= 0) {
				// Check that range or subnet is not full already
				$oIpContainer = MetaModel::GetObject('IPv6Range', $this->Get('range_id'), false /* MustBeFound */);
				if (is_null($oIpContainer)) {
					$oIpContainer = MetaModel::GetObject('IPv6Subnet', $this->Get('subnet_id'), false /* MustBeFound */);
					if (is_null($oIpContainer)) {
						return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet', $this->Get('block_id')));
					}
				} elseif ($oIpContainer->GetOccupancy() == 100) {
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange'));
				}

				// Check that an IP address can be created with given parameters
				$oIp = MetaModel::NewObject('IPv6Address');
				$oIp->Set('org_id', $this->Get('org_id'));
				$oIp->Set('short_name', $this->Get('short_name'));
				$oIp->Set('domain_id', $this->Get('domain_id'));
				$oIp->ComputeValues();
				if (!$oIp->IsFqdnUnique()) {
					return (Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:IPNameCollision'));
				}
			}
		}

		return '';
	}

	/**
	 * @inheritdoc
	 */
	protected function DisplayActionFieldsForOperation(iTopWebPage $oP, $sOperation, $m_iFormId, $aDefault = array()) {
		$sStimulus = $aDefault['stimulus'];
		if ($sStimulus != 'ev_resolve') {
			return;
		}

		$oP->add("<table>");
		$oP->add("<input type=\"hidden\" name=\"stimulus\" value=\"$sStimulus\">\n");
		$oP->add('<tr><td style="vertical-align:top">');

		// Check if IP has already been manually allocated
		if ($this->Get('ip_id') <= 0) {
			// No IP has already been manually allocated, offer some
			// Create array of free IPs
			$sLabelOfAction1 = Dict::S('UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp');
			$aFreeIPs = $this->GetFreeIPs();
			$iNumberOfFreeIps = count($aFreeIPs);

			// There is at least an IP free. Check has been done before...
			// ... unless pings has been required and all IPs ping
			if ($iNumberOfFreeIps != 0) {
				// Translate it into select box
				$sInputId = $m_iFormId.'_'.'ip';
				$sHTMLValue = "<select id=\"$sInputId\" name=\"ip\">\n";
				// There is at least an IP free. Check has been done before.
				$sHTMLValue .= "<option selected='' value=\"$aFreeIPs[0]\">$aFreeIPs[0]</option>\n";
				for ($i = 1; $i < $iNumberOfFreeIps; $i++) {
					$sHTMLValue .= "<option value=\"$aFreeIPs[$i]\">$aFreeIPs[$i]</option>\n";
				}
				$sHTMLValue .= "</select>";
			} else {
				$sHTMLValue = "";
			}
		} else {
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
	 * @inheritdoc
	 */
	protected function DisplayActionFieldsForOperationV3(iTopWebPage $oP, $oObjectDetails, $sOperation, $aDefault) {
		$sStimulus = $aDefault['stimulus'];
		if ($sStimulus != 'ev_resolve') {
			return;
		}

		$oObjectDetails->AddSubBlock(InputUIBlockFactory::MakeForHidden('stimulus', 'ev_resolve'));

		$oMultiColumn = new MultiColumn();
		$oP->AddUIBlock($oMultiColumn);
		$oColumn1 = new Column();           // First column = labels or fields
		$oMultiColumn->AddColumn($oColumn1);
		$oColumn2 = new Column();           // Second column = data
		$oMultiColumn->AddColumn($oColumn2);

		// Check if IP has already been manually allocated
		if ($this->Get('ip_id') <= 0) {
			// No IP has already been manually allocated, offer some
			// Get array of free IPs
			$sLabelOfAction1 = Dict::S('UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp');

			$aFreeIPs = $this->GetFreeIPs();
			$iNumberOfFreeIps = count($aFreeIPs);

			// There is at least an IP free. Check has been done before...
			// ... unless pings has been required and all IPs ping
			$oSelect = SelectUIBlockFactory::MakeForSelect('ip');
			$oColumn2->AddSubBlock($oSelect);
			if ($iNumberOfFreeIps != 0) {
				// There is at least an IP free. Check has been done before.
				for ($i = 0; $i < $iNumberOfFreeIps; $i++) {
					$bSelected = ($i == 0) ? true : false;
					$oSelect->AddOption(SelectOptionUIBlockFactory::MakeForSelectOption($aFreeIPs[$i], $aFreeIPs[$i], $bSelected));
				}
			}
		} else {
			// AnIP has already been manually allocated
			$sLabelOfAction1 = Dict::Format('UI:IPManagement:Action:Implement:IPRequestAddressCreate:ConfirmSelectedIP', $this->GetAsHTML('ip_id'));
		}
		$oColumn1->AddSubBlock(HtmlFactory::MakeParagraph($sLabelOfAction1));
		$oColumn1->AddSubBlock(HtmlFactory::MakeRaw('<br>'));
	}

	/**
	 * @inheritdoc
	 */
	public function ApplyStimulus($sStimulusCode, $bDoNotWrite = false) {
		if ($sStimulusCode != 'ev_resolve') {
			return parent::ApplyStimulus($sStimulusCode);
		}

		$bProceedWithChange = false;
		if ($this->Get('ip_id') != 0) {
			// An IP has already been manually allocated
			$bProceedWithChange = true;
			$bRegisterNewIp = false;
		} else {
			// No IP has been allocated yet
			$sIp = filter_var(utils::ReadPostedParam('ip', '', 'raw_data'), FILTER_VALIDATE_IP);
			if ($sIp != '') {
				$bProceedWithChange = true;
				$bRegisterNewIp = true;
			}
		}
		if ($bProceedWithChange) {
			if (parent::ApplyStimulus($sStimulusCode, true /* $bDoNotWrite */)) {
				$this->RegisterIp($bRegisterNewIp, $sIp);

				// Update ticket
				$this->DBUpdate();

				return true;
			}
		}

		return false;
	}

	/**
	 * Build array containing free IPs that can be allocated within requested subnet or range
	 *
	 * @return mixed
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	private function GetFreeIPs() {
		$aFreeIPs = array();

		// Make sure specified subnet exists
		$iSubnetId = $this->Get('subnet_id');
		$oSubnet = MetaModel::GetObject('IPv6Subnet', $iSubnetId, true /* MustBeFound */);
		if (is_null($oSubnet)) {
			return $aFreeIPs;
		}

		// Define search interval
		$oIpContainer = MetaModel::GetObject('IPv6Range', $this->Get('range_id'), false /* MustBeFound */);
		if (is_null($oIpContainer)) {
			$bWithRanges = true;
			$oIpContainer = $oSubnet;
			$oFirstIp = $oIpContainer->Get('ip');
			$oLastIp = $oIpContainer->Get('lastip');
			$oIpRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT IPv6Range AS r WHERE r.subnet_id = $iSubnetId"));
			$aRangeIPs = $oIpRangeSet->GetColumnAsArray('firstip', false);
			$oIpRangeSet->Rewind();
		} else {
			$bWithRanges = false;
			$oFirstIp = $oIpContainer->Get('firstip');
			$oLastIp = $oIpContainer->Get('lastip');
		}
		$oIpRegisteredSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT IPv6Address AS i WHERE i.subnet_id = $iSubnetId"));
		$aRegisteredIPs = $oIpRegisteredSet->GetColumnAsArray('ip', false);
		$iOrgId = $this->Get('org_id');
		$sPingBeforeAssign = IPConfig::GetFromGlobalIPConfig('ping_before_assign', $iOrgId);
		$iCreationOffset = IPConfig::GetFromGlobalIPConfig('request_creation_ipv6_offset',$iOrgId);
		// Note: because of the size of an Ipv6 subnet, subnet IP + offset (which is less than 10K) < last IP
		for ($i = 0; $i < $iCreationOffset; $i++) {
			$oFirstIp = $oFirstIp->GetNextIp();
		}

		// Launch search
		$oAnIp = $bWithRanges ? ($oFirstIp->GetNextIp()) : $oFirstIp;
		$i = 0;
		$iMaxFreeOffers = ($sPingBeforeAssign == 'ping_yes') ? DEFAULT_MAX_FREE_IP_OFFERS_WITH_PING_REQ : DEFAULT_MAX_FREE_IP_OFFERS_REQ;
		while ($oAnIp->IsSmallerOrEqual($oLastIp) && ($i < $iMaxFreeOffers)) {
			$sAnIp = $oAnIp->ToString();
			if ($bWithRanges) {
				// If IP belongs to a range, skip range
				if (in_array($oAnIp, $aRangeIPs)) {
					$oIpRangeSet->Rewind();
					$oIpRange = $oIpRangeSet->Fetch();
					while (!$oIpRange->Get('firstip')->IsEqual($oAnIp)) {
						$oIpRange = $oIpRangeSet->Fetch();
					}
					$oAnIp = $oIpRange->Get('lastip');
				}
			}
			if (!in_array($oAnIp, $aRegisteredIPs)) {
				// Found free IP. If required, make sure it doesn't ping (well... locally)
				if ($sPingBeforeAssign == 'ping_yes') {
					$aOutput = IPv6Address::DoCheckIpPings($sAnIp, TIME_TO_WAIT_FOR_PING_SHORT);
					if (empty($aOutput)) {
						// IP doesn't ping
						$aFreeIPs [$i++] = $sAnIp;
					}
				} else {
					$aFreeIPs [$i++] = $sAnIp;
				}
			}
			$oAnIp = $oAnIp->GetNextIp();
		}

		return $aFreeIPs;
	}

	/**
	 * Create new IP or update existing one
	 * Update functional CI, if any
	 *
	 * @param $bNewIp = is this a new IP ?
	 * @param $sIp = IP to be created
	 *
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \CoreWarning
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	private function RegisterIp($bNewIp, $sIp) {
		if ($bNewIp) {
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
		} else {
			$iIpId = $this->Get('ip_id');
			$oIpv6 = MetaModel::GetObject('IPv6Address', $iIpId, true /* MustBeFound */);
			$oIpv6->Set('status', $this->Get('status_ip'));
			$oIpv6->DBUpdate();
		}

		// Update FunctionalCI, if any
		$sCIClass = $this->Get('ciclass');
		if ($sCIClass != '') {
			$iFunctionalCIid = $this->Get('connectableci_id');
			$oFunctionalCI = MetaModel::GetObject($sCIClass, $iFunctionalCIid, false /* MustBeFound */);
			if (!is_null($oFunctionalCI)) {
				$sIPAttribute = $this->Get('ci_ip_attribute');
				if (MetaModel::IsValidAttCode($sCIClass, $sIPAttribute)) {
					// Check if attribute can be written
					$iFlags = $oFunctionalCI->GetFormAttributeFlags($sIPAttribute);
					if (!($iFlags & (OPT_ATT_READONLY | OPT_ATT_SLAVE))) {
						$oFunctionalCI->Set($sIPAttribute, $oIpv6->GetKey());
						$oFunctionalCI->DBUpdate();
					}
				}
			}
		}
	}

}
