<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\IPRequestManagement\Hook;

use ApplicationContext;
use DBObjectSet;
use Dict;
use iApplicationUIExtension;
use IPRequest;
use UserRights;
use utils;
use WebPage;

class IPRequestPlugIn implements iApplicationUIExtension
{
	/**
	 * @inheritdoc
	 */
	public function OnDisplayProperties($oObject, WebPage $oPage, $bEditMode = false)
	{
	}

	/**
	 * @inheritdoc
	 */
	public function OnDisplayRelations($oObject, WebPage $oPage, $bEditMode = false)
	{
	}

	/**
	 * @inheritdoc
	 */
	public function OnFormSubmit($oObject, $sFormPrefix = '')
	{
	}
	
	public function OnFormCancel($sTempId)
	{
	}

	/**
	 * @inheritdoc
	 */
	public function EnumUsedAttributes($oObject)
	{
		return array();
	}

	/**
	 * @inheritdoc
	 */
	public function GetIcon($oObject)
	{
		return '';
	}

	/**
	 * @inheritdoc
	 */
	public function GetHilightClass($oObject)
	{
		return HILIGHT_CLASS_NONE;
	}

	/**
	 * @inheritdoc
	 */
	public function EnumAllowedActions(DBObjectSet $oSet)
	{
		$oObj = $oSet->Fetch();
		
		// Additional actions for IPRequest
		if ($oObj instanceof IPRequest)
		{
			// Add action if in new state only
			if ($oObj->Get('status') == 'assigned')
			{
				$oAppContext = new ApplicationContext();
				$sContext = $oAppContext->GetForLink();
			
				$sClass = get_class($oObj);
				if (UserRights::IsStimulusAllowed($sClass, 'ev_resolve'))
				{
					$id = $oObj->GetKey();
					return array(Dict::S('UI:IPManagement:Action:Implement:IPRequest') => utils::GetAbsoluteUrlModulesRoot()."teemip-request-mgmt/ui.teemip-request-mgmt.php?operation=stimulus&stimulus=ev_resolve&class=$sClass&id=$id&$sContext");
				}
			}
		}
		return array();
	}
}
