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

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-request-mgmt/2.7.1',
	array(
		// Identification
		//
		'label' => 'IP Request Management',
		'category' => 'business',
		
		// Setup
		//
		'dependencies' => array(
			'itop-tickets/2.7.0',
			'teemip-ip-mgmt/2.7.1',
			'teemip-ipv6-mgmt/2.7.1',
			'teemip-network-mgmt/2.7.1',
		),
		'mandatory' => false,
		'visible' => true,
		'installer' => 'IPRequestManagementInstaller',

		// Components
		//
		'datamodel' => array(
			'vendor/autoload.php',
			'src/Hook/IPRequestPlugIn.php',
			'src/Model/AttributeClassWithIP.php',
			'src/Model/AttributeIPFieldInClass.php',
			'model.teemip-request-mgmt.php',
		),
		'data.struct' => array(
			//'data.struct.teemip-change-mgmt.xml',
		),
		'data.sample' => array(
			//'data.sample.teemip-change-mgmt.xml',
		),
		
		// Documentation
		//
		'doc.manual_setup' => '',
		'doc.more_information' => '',
		
		// Default settings
		//
		'settings' => array(
		),
	)
);

if (!class_exists('IPRequestManagementInstaller'))
{
	// Module installation handler
	//
	class IPRequestManagementInstaller extends ModuleInstallerAPI
	{
		public static function BeforeWritingConfig(Config $oConfiguration)
		{
			// If you want to override/force some configuration values, do it here
			return $oConfiguration;
		}

		/**
		 * Handler called before creating or upgrading the database schema
		 * @param $oConfiguration Config The new configuration of the application
		 * @param $sPreviousVersion string PRevious version number of the module (empty string in case of first install)
		 * @param $sCurrentVersion string Current version number of the module
		 */
		public static function BeforeDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
		{
			// If you want to migrate data from one format to another, do it here
		}

		/**
		 * Handler called after the creation/update of the database schema
		 *
		 * @param $oConfiguration Config The new configuration of the application
		 * @param $sPreviousVersion string PRevious version number of the module (empty string in case of first install)
		 * @param $sCurrentVersion string Current version number of the module
		 *
		 * @throws \CoreException
		 * @throws \MySQLException
		 * @throws \MySQLHasGoneAwayException
		 */
		public static function AfterDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
		{
			// For migration from 2.4.0 -> 2.5.1
			// Copy ip_device_link attribute to ci_ip_attribute attribute in ip_req_add_create table of IPRequestAddressCreate class

			if (($sPreviousVersion == '2.5.1') || ($sPreviousVersion == '2.5.0') || ($sPreviousVersion == '2.4.1') || ($sPreviousVersion == '2.4.0'))
			{
				SetupPage::log_info("Module teemip-request-mgmt: copy ip_device_link attribute to ci_ip_attribute attribute in ip_req_add_create table");

				$sDBSubname = $oConfiguration->Get('db_subname');
				$sUpdate = "UPDATE ".$sDBSubname."ip_req_add_create SET ci_ip_attribute = ip_device_link";
				CMDBSource::Query($sUpdate);
				$sAlter = "ALTER TABLE ".$sDBSubname."ip_req_add_create DROP COLUMN ip_device_link";
				CMDBSource::Query($sAlter);

				SetupPage::log_info("Module teemip-request-mgmt: copy done");
			}
		}
	}
}

