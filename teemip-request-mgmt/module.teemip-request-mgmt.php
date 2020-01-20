<?php


SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-request-mgmt/2.6.0',
	array(
		// Identification
		//
		'label' => 'IP Request Management',
		'category' => 'business',
		
		// Setup
		//
		'dependencies' => array(
			'itop-tickets/2.7.0',
			'teemip-ip-mgmt/2.6.0',
			'teemip-network-mgmt/2.6.0',
		),
		'mandatory' => false,
		'visible' => true,
		
		// Components
		//
		'datamodel' => array(
			'model.teemip-request-mgmt.php',
			'main.teemip-request-mgmt.php',
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
