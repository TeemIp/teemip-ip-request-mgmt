<?php
/*
 * @copyright   Copyright (C) 2023 TeemIp
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

require_once MODULESROOT.'itop-portal-base/index.php';
