<?php
// Copyright (C) 2010-2012 Combodo SARL
//
//	 This file is part of iTop.
//
//	 iTop is free software; you can redistribute it and/or modify	
//	 it under the terms of the GNU Affero General Public License as published by
//	 the Free Software Foundation, either version 3 of the License, or
//	 (at your option) any later version.
//
//	 iTop is distributed in the hope that it will be useful,
//	 but WITHOUT ANY WARRANTY; without even the implied warranty of
//	 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
//	 GNU Affero General Public License for more details.
//
//	 You should have received a copy of the GNU Affero General Public License
//	 along with iTop. If not, see <http://www.gnu.org/licenses/>

/**
 * @copyright	 Copyright (C) 2010-2012 Combodo SARL
 * @license		 http://opensource.org/licenses/AGPL-3.0
 */

/************************************
 * IP Templates related classes 
 */

class IPObjTemplate extends Template
{
	/**
	 * Class for tickets related to Subnet deletion
	 */	 
	public static function Init()
	{
		$aParams = array
		(
			"category" => "bizmodel,searchable,ipmgmt",
			"key_type" => "autoincrement",
			"name_attcode" => "name",
			"state_attcode" => "",
			"reconc_keys" => array("name"),
			"db_table" => "ipobj_tpl",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
			"display_template" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		
		MetaModel::Init_AddAttribute(new AttributeExternalKey("servicesubcategory_id", array("targetclass"=>"ServiceSubcategory", "jointype"=>null, "allowed_values"=>null, "sql"=>"servicesubcategory_id", "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "depends_on"=>array())));
		MetaModel::Init_AddAttribute(new AttributeEnum("request_type", array("allowed_values"=>new ValueSetEnum('ip_create, ip_change, ip_delete, subnet_create, subnet_change, subnet_delete'), "sql"=>"request_type", "default_value"=>"ip_create", "is_null_allowed"=>false, "depends_on"=>array())));
		
		MetaModel::Init_SetZListItems('details', array('name', 'servicesubcategory_id', 'request_type', 'label', 'description', 'field_list'));
		MetaModel::Init_SetZListItems('advanced_search', array('name', 'servicesubcategory_id', 'request_type', 'label', 'description'));
		MetaModel::Init_SetZListItems('standard_search', array('name', 'servicesubcategory_id', 'request_type', 'label', 'description'));
		MetaModel::Init_SetZListItems('list', array('name', 'servicesubcategory_id', 'request_type', 'label'));
	}
}

/**************************************
 * Menu where to manage templates from 
 */

$oServiceManagementGroup = new MenuGroup('RequestManagement', 60 /* fRank */);

new OQLMenuNode('IPv4Template', 'SELECT IPObjTemplate', $oServiceManagementGroup->GetIndex(), 20 /* fRank */);

?>