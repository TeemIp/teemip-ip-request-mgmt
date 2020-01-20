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

if (file_exists(__DIR__ . '/../../approot.inc.php'))
{
	require_once __DIR__ . '/../../approot.inc.php';   // When in env-xxxx folder
}
else
{
	require_once __DIR__ . '/../../../approot.inc.php';   // When in datamodels/x.x folder
}
require_once APPROOT . '/application/startup.inc.php';

// Protection against setup in the following configuration : ITIL Ticket with Enhanced Portal selected but neither UserRequest or Incident. Which would crash the portal.
if (!class_exists('IPObject') && !class_exists('IPRequest'))
{
	die('Product has neither been installed with IP Management nor IP Request Management. Please contact your administrator.');
}

$sDir = basename(__DIR__);
define('PORTAL_MODULE_ID', $sDir);
define('PORTAL_ID', $sDir);

require_once APPROOT . '/env-' . utils::GetCurrentEnvironment() . '/itop-portal-base/portal/web/index.php';
