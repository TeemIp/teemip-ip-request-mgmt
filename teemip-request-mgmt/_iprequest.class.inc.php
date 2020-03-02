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

class _IPRequest extends Ticket
{
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
				$sIcon = self::MakeIconFromName('iprequest-closed.png');
			break;
			
			default:
				$sIcon = self::MakeIconFromName('iprequest.png');
			break;
		}
		return $sIcon;
	}

	/**
	 * @param $sIconName
	 * @param bool $bImgTag
	 *
	 * @return string
	 * @throws \Exception
	 */
	protected static function MakeIconFromName($sIconName, $bImgTag = true)
	{
		$sIcon = '';
		if ($sIconName != '')
		{
			$sPath = utils::GetAbsoluteUrlModulesRoot().'teemip-request-mgmt/images/'.$sIconName;
			if ($bImgTag)
			{
				$sIcon = "<img src=\"$sPath\" style=\"vertical-align:middle;\" alt=\"\"/>";
			}
			else
			{
				$sIcon = $sPath;
			}
		}
		return $sIcon;
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
			$oP->RemoveTab(Dict::S('Ticket:ImpactAnalysis'));
		}
	}

}
