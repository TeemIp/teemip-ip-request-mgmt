<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-request-mgmt/3.2.0',
	array(
		// Identification
		//
		'label' => 'IP Request Management',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'itop-tickets/3.2.0',
			'teemip-ip-mgmt/3.2.0',
			'teemip-ipv6-mgmt/3.2.0',
			'teemip-network-mgmt/3.2.0',
		),
		'mandatory' => false,
		'visible' => true,
		'installer' => 'IPRequestManagementInstaller',

		// Components
		//
		'datamodel' => array(
			'vendor/autoload.php',
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
				SetupLog::Info("Module teemip-request-mgmt: copy ip_device_link attribute to ci_ip_attribute attribute in ip_req_add_create table");

				$sDBSubname = $oConfiguration->Get('db_subname');
				$sUpdate = "UPDATE ".$sDBSubname."ip_req_add_create SET ci_ip_attribute = ip_device_link";
				CMDBSource::Query($sUpdate);
				$sAlter = "ALTER TABLE ".$sDBSubname."ip_req_add_create DROP COLUMN ip_device_link";
				CMDBSource::Query($sAlter);

				SetupLog::Info("Module teemip-request-mgmt: copy done");
			}
		}
	}
}

