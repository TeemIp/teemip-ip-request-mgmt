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

/*******************
 * Global constants
 */

define('DEFAULT_MAX_FREE_IP_OFFERS_REQ', 10);
define('DEFAULT_MAX_FREE_IP_OFFERS_WITH_PING_REQ', 5);
define('DEFAULT_MAX_FREE_SPACE_OFFERS_REQ', 10);

/*****************************************************************
 * Attribute that lists, like an enum, the functional ci classes:
 *   - that can be instanciated
 *   - that have an external key to an IPAddress or to an IPvnAddress (n = 4 or 6)
 */

class AttributeClassWithIP extends AttributeString
{
	public function GetAllowedValues($aArgs = array(), $sContains = '')
	{
		$oHostObj = null;
		$aValues = array();
		if (isset($aArgs['this']))
		{
			$oHostObj = $aArgs['this'];
		}
		elseif (isset($aArgs['this->object()']))
		{
			$oHostObj = $aArgs['this->object()'];
		}
		if ($oHostObj != null)
		{
			$iOrgId = $oHostObj->Get('org_id');
			$sThisClass = get_class($oHostObj);
			switch ($sThisClass)
			{
				case 'IPRequestAddressCreateV6':
					$sClass = 'IPv6Address';
					break;

				case 'IPRequestAddressCreateV4':
				default:
					$sClass = 'IPv4Address';
					break;
			}

			$aCIClassesWithIp = IPAddress::GetListOfClassesWIthIP('leaf');
			foreach($aCIClassesWithIp as $sCIClass => $sKey)
			{
				$oCISet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT FunctionalCI AS ci WHERE ci.org_id = :org_id AND ci.finalclass = :ciclass"), array(), array('org_id' => $iOrgId, 'ciclass' => $sCIClass));
				if ($oCISet->CountExceeds(0))
				{
					$aValues[$sCIClass] = MetaModel::GetName($sCIClass);
				}
			}
		}
		return $aValues;
	}

	public function GetAsHTML($sValue, $oHostObject = null, $bLocalize = true)
	{
		if (empty($sValue))
		{
			return '';
		}
		return MetaModel::GetName($sValue);
	}

	static public function GetFormFieldClass()
	{
		return '\\Combodo\\iTop\\Form\\Field\\SelectField';
	}

	public function MakeFormField(DBObject $oObject, $oFormField = null)
	{
		if ($oFormField === null)
		{
			// Later : We should check $this->Get('display_style') and create a Radio / Select / ... regarding its value
			$sFormFieldClass = static::GetFormFieldClass();
			$oFormField = new $sFormFieldClass($this->GetCode());
		}

		$oFormField->SetChoices($this->GetAllowedValues($oObject->ToArgsForQuery()));
		parent::MakeFormField($oObject, $oFormField);

		return $oFormField;
	}

}

/*******************************************************************
 * Attribute that lists, like an enum, the external key attributes:
 *   - of a given class inherited from FunctionalCI
 *   - that point to an IPAddress or to an IPvnAddress (n = 4 or 6)
 */

class AttributeIPFieldInClass extends AttributeString
{
	public function GetAllowedValues($aArgs = array(), $sContains = '')
	{
		$oHostObj = null;
		$aValues = array();
		if (isset($aArgs['this']))
		{
			$oHostObj = $aArgs['this'];
		}
		elseif (isset($aArgs['this->object()']))
		{
			$oHostObj = $aArgs['this->object()'];
		}
		if ($oHostObj != null)
		{
			$sThisClass = get_class($oHostObj);
			switch ($sThisClass)
			{
				case 'IPRequestAddressCreateV6':
					$sClass = 'IPv6Address';
					break;

				case 'IPRequestAddressCreateV4':
				default:
					$sClass = 'IPv4Address';
					break;
			}
			$sCiClass = $oHostObj->Get('ciclass');
			if ($sCiClass != '')
			{
				$aCIClassesWithIp = IPAddress::GetListOfClassesWIthIP('leaf');
				foreach($aCIClassesWithIp[$sCiClass]['IPAddress'] as $sKey => $sAttribute)
				{
					$oAttDef = MetaModel::GetAttributeDef($sCiClass, $sAttribute);
					$aValues[$oAttDef->GetCode()] = $oAttDef->GetLabel();
				}
				foreach($aCIClassesWithIp[$sCiClass][$sClass] as $sKey => $sAttribute)
				{
					$oAttDef = MetaModel::GetAttributeDef($sCiClass, $sAttribute);
					$aValues[$oAttDef->GetCode()] = $oAttDef->GetLabel();
				}
			}
		}
		return $aValues;
	}

	public function GetAsHTML($sValue, $oHostObject = null, $bLocalize = true)
	{
		if (empty($sValue) || is_null($oHostObject))
		{
			return '';
		}
		$sCiClass = $oHostObject->Get('ciclass');
		$oAttDef = MetaModel::GetAttributeDef($sCiClass, $sValue);
		return $oAttDef->GetLabel();
	}

	static public function GetFormFieldClass()
	{
		return '\\Combodo\\iTop\\Form\\Field\\SelectField';
	}

	public function MakeFormField(DBObject $oObject, $oFormField = null)
	{
		if ($oFormField === null)
		{
			// Later : We should check $this->Get('display_style') and create a Radio / Select / ... regarding its value
			$sFormFieldClass = static::GetFormFieldClass();
			$oFormField = new $sFormFieldClass($this->GetCode());
		}

		$oFormField->SetChoices($this->GetAllowedValues($oObject->ToArgsForQuery()));
		parent::MakeFormField($oObject, $oFormField);

		return $oFormField;
	}

}

/***********************************************************************************
 * Plugin to extend the list of possible actions that can be applied to IP Requests 
 */

class IPRequestPlugIn implements iApplicationUIExtension
{
	public function OnDisplayProperties($oObject, WebPage $oPage, $bEditMode = false)
	{
	}
	
	public function OnDisplayRelations($oObject, WebPage $oPage, $bEditMode = false)
	{
	}
	
	public function OnFormSubmit($oObject, $sFormPrefix = '')
	{
	}
	
	public function OnFormCancel($sTempId)
	{
	}
	
	public function EnumUsedAttributes($oObject)
	{
		return array();
	}
	
	public function GetIcon($oObject)
	{
		return '';
	}
	
	public function GetHilightClass($oObject)
	{
		return HILIGHT_CLASS_NONE;
	}
	
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
