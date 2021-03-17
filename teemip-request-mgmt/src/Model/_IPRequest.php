<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Model;

use Ticket;
use utils;
use WebPage;

class _IPRequest extends Ticket
{
	/**
	 * @param $sStimulusCode
	 *
	 * @return bool
	 */
	public function SetClosureDate($sStimulusCode)
	{
		$this->Set('close_date', time());
		return true;
	}

	/**
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	protected function OnInsert()
	{
		$this->Set('start_date', time());
		$this->Set('last_update', time());
	}

	/**
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	protected function OnUpdate()
	{
		// Auto assign if possible
		if (($this->Get('status') == 'new') && ($this->Get('team_id') > 0) && ($this->Get('agent_id') > 0))
		{
			$this->ApplyStimulus('ev_auto_assign');
		}

		$this->Set('last_update', time());
	}

	/**
	 * @return string
	 */
	public static function GetTicketRefFormat()
	{
		return 'R-IP-%06d';
	}

	/**
	 * @param bool $bImgTag
	 *
	 * @return string
	 * @throws \CoreException
	 * @throws \Exception
	 */
	public function GetIcon($bImgTag = true)
	{
		switch($this->GetState())
		{
			case 'closed':
				$sIconFile = 'iprequest-closed.png';
				break;

			default:
				$sIconFile = 'iprequest.png';
				break;
		}
		$sPath = utils::GetAbsoluteUrlModulesRoot().'teemip-request-mgmt/asset/img/'.$sIconFile;
		if ($bImgTag)
		{
			return "<img src=\"$sPath\" style=\"vertical-align:middle;\" alt=\"\"/>";
		}
		else
		{
			return $sPath;
		}
	}

	/**
	 * @param $sPrefix
	 *
	 * @return string
	 */
	public function GetNewFormId($sPrefix)
	{
		self::$iGlobalFormId++;
		$this->m_iFormId = $sPrefix.self::$iGlobalFormId;
		return ($this->m_iFormId);
	}

	/**
	 * Create common string for UI displays
	 */
	public function MakeUIPath($sOperation)
	{
		switch ($sOperation)
		{
			case 'stimulus':                   
			case 'apply_stimulus':
				return ('UI:IPManagement:Action:Implement:IPRequest:');

			default:
				return '';
		}
	}
	
	/**
	 * Return next operation after current one
	 */
	function GetNextOperation($sOperation)
	{
		switch ($sOperation)
		{
			case 'stimulus': return 'apply_stimulus';
			case 'apply_stimulus': return 'stimulus';
				
			default: return '';
		}
	}
	
	/**
	 * Check validity of stimulus before allowing it to be applied
	 */
	public function CheckStimulus($sStimulusCode)
	{
		return '';
	}


	/*
	 * Display additional tabs to Zone object
	 *
	 * @param \WebPage $oP
	 * @param bool $bEditMode
	 *
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \DictExceptionMissingString
	 * @throws \MissingQueryArgument
	 * @throws \MySQLException
	 * @throws \MySQLHasGoneAwayException
	 * @throws \OQLException
	 */
	public function DisplayBareRelations(WebPage $oP, $bEditMode = false)
	{
		parent::DisplayBareRelations($oP, $bEditMode);

		if (!$bEditMode)
		{
			$oP->RemoveTab('Ticket:ImpactAnalysis');
		}
	}

}
