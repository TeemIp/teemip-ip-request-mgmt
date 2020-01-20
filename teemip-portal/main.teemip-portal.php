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

class TeemIpPortalEditUrlMaker implements iDBObjectURLMaker
{
	/**
	 * Generate an (absolute) URL to an object, either in view or edit mode
	 * @param string $sClass The class of the object
	 * @param int $iId The identifier of the object
	 * @param string $sMode edit|view
	 * @return string
	 */
	public static function PrepareObjectURL($sClass, $iId, $sMode)
	{
		require_once APPROOT . '/lib/silex/vendor/autoload.php';
		require_once APPROOT . '/env-' . utils::GetCurrentEnvironment() . '/itop-portal-base/portal/src/providers/urlgeneratorserviceprovider.class.inc.php';
		require_once APPROOT . '/env-' . utils::GetCurrentEnvironment() . '/itop-portal-base/portal/src/helpers/urlgeneratorhelper.class.inc.php';
		require_once APPROOT . '/env-' . utils::GetCurrentEnvironment() . '/itop-portal-base/portal/src/helpers/applicationhelper.class.inc.php';

		// Using a static var allows to preserve the object through function calls
		static $oApp = null;
		static $sPortalId = null;

		// Initializing Silex app
		if ($oApp === null)
		{
			// Initializing Silex framework
			$oApp = new Silex\Application();
			// Registering optional silex components
			$oApp->register(new Combodo\iTop\Portal\Provider\UrlGeneratorServiceProvider());
			// Registering routes
			Combodo\iTop\Portal\Helper\ApplicationHelper::LoadRouters();
			Combodo\iTop\Portal\Helper\ApplicationHelper::RegisterRoutes($oApp);
			// Retrieving portal id
			$sPortalId = basename(__DIR__);
		}
		// The object is reachable in the specified mode (edit/view)
		switch($sMode)
		{
			case 'view':
				$sObjectQueryString = $oApp['url_generator']->generate('p_object_view', array('sObjectClass' => $sClass, 'sObjectId' => $iId));
				break;

			case 'edit':
			default:
				$sObjectQueryString = $oApp['url_generator']->generate('p_object_edit', array('sObjectClass' => $sClass, 'sObjectId' => $iId));
		}
		$sPortalAbsoluteUrl = utils::GetAbsoluteUrlModulePage($sPortalId, 'index.php');
		if (strpos($sPortalAbsoluteUrl, '?') !== false)
		{
			// Removing generated url query parameters so it can be replaced with those from the absolute url
			// Mostly necessary when iTop instance has multiple portals
			if(strpos($sObjectQueryString, '?') !== false)
			{
				$sObjectQueryString = substr($sObjectQueryString, 0, strpos($sObjectQueryString, '?'));
			}
			$sUrl = substr($sPortalAbsoluteUrl, 0, strpos($sPortalAbsoluteUrl, '?')).$sObjectQueryString.substr($sPortalAbsoluteUrl, strpos($sPortalAbsoluteUrl, '?'));
		}
		else
		{
			$sUrl = $sPortalAbsoluteUrl.$sObjectQueryString;
		}
		return $sUrl;
	}

	public static function MakeObjectURL($sClass, $iId)
	{
		return static::PrepareObjectURL($sClass, $iId, 'edit');
	}
}

class TeemIpPortalViewUrlMaker extends TeemIpPortalEditUrlMaker
{
	public static function MakeObjectURL($sClass, $iId)
	{
		return static::PrepareObjectURL($sClass, $iId, 'view');
	}
}

DBObject::RegisterURLMakerClass('teemip-portal', 'TeemIpPortalEditUrlMaker');
