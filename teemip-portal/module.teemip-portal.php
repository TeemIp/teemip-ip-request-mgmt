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

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-portal/2.6.1',
	array(
		// Identification
		'label' => 'Enhanced Portal for TeemIp',
		'category' => 'Portal',
		
		// Setup
		'dependencies' => array(
			'itop-portal-base/2.7.0',
		),
		'mandatory' => false,
		'visible' => true,
		
		// Components
		'datamodel' => array(
			'main.teemip-portal.php'
		),
		
		'webservice' => array(
		//'webservices.itop-portal.php',
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