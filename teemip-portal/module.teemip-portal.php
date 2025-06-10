<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-portal/3.2.0',
	array(
		// Identification
		'label' => 'Enhanced Portal for TeemIp',
		'category' => 'Portal',

		// Setup
		'dependencies' => array(
			'itop-portal-base/3.2.0',
            'itop-portal-new-look-for-3.2-lts/1.0.0'
		),
		'mandatory' => false,
		'visible' => true,
		
		// Components
		'datamodel' => array(
			'model.teemip-portal.php',
		),
		
		'webservice' => array(
		),
		
		'dictionary' => array(
		),
		
		'data.struct' => array(
		//'data.struct.itop-portal.xml',
		),
		
		'data.sample' => array(
		//'data.sample.itop-portal.xml',
		),
		
		// Documentation
		'doc.manual_setup' => '',
		'doc.more_information' => '',
		
		// Default settings
		'settings' => array(
		),
	)
);