<?php
// Copyright (C) 2014 TeemIp
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
 * @copyright   Copyright (C) 2014 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'Request Mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: IPRequest
//
									
Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequest' => 'IP Request',
	'Class:IPRequest+' => '',
	'Class:IPRequest/Attribute:status' => 'Status',
	'Class:IPRequest/Attribute:status+' => '',
	'Class:IPRequest/Attribute:status/Value:new' => 'New',
	'Class:IPRequest/Attribute:status/Value:new+' => '',
	'Class:IPRequest/Attribute:status/Value:rejected' => 'Rejected',
	'Class:IPRequest/Attribute:status/Value:rejected+' => '',
	'Class:IPRequest/Attribute:status/Value:assigned' => 'Assigned',
	'Class:IPRequest/Attribute:status/Value:assigned+' => '',
	'Class:IPRequest/Attribute:status/Value:resolved' => 'Resolved',
	'Class:IPRequest/Attribute:status/Value:resolved+' => '',
	'Class:IPRequest/Attribute:status/Value:closed' => 'Closed',
	'Class:IPRequest/Attribute:status/Value:closed+' => '',
	'Class:IPRequest/Attribute:public_log' => 'Public log',
	'Class:IPRequest/Attribute:public_log+' => '',
	'Class:IPRequest/Attribute:user_comment' => 'User comment',
	'Class:IPRequest/Attribute:user_comment+' => '',
));

//
// Class: IPRequestAddress
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddress' => 'IP Address Request',
	'Class:IPRequestAddress+' => '',
	'Class:IPRequestAddress/Attribute:ip_id' => '<font color=#ff0000>IP Address</font>',
	'Class:IPRequestAddress/Attribute:ip_id+' => '',
	'Class:IPRequestAddress:baseinfo' => 'General Information',
	'Class:IPRequestAddress:contact' => 'Contacts',
	'Class:IPRequestAddress:ipinfo' => 'IP Informations',
	'Class:IPRequestAddress:date' => 'Dates',
));

//
// Class: IPRequestAddressCreate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressCreate' => 'IP Address Creation Request',
	'Class:IPRequestAddressCreate+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip' => 'Status',
	'Class:IPRequestAddressCreate/Attribute:status_ip+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved' => 'Reserved',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated' => 'Allocated',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressCreate/Attribute:short_name' => 'Short Name',
	'Class:IPRequestAddressCreate/Attribute:short_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_id' => 'DNS Domain',
	'Class:IPRequestAddressCreate/Attribute:domain_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_name' => 'Domain Name',
	'Class:IPRequestAddressCreate/Attribute:domain_name+' => 'Name of the DNS domain',
	'Class:IPRequestAddressCreate/Attribute:usage_id' => 'Usage',
	'Class:IPRequestAddressCreate/Attribute:usage_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:usage_name' => 'Usage Name',
	'Class:IPRequestAddressCreate/Attribute:usage_name+' => '',
));

//
// Class: IPRequestAddressCreateV4
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressCreateV4' => 'IP Address V4 Creation Request',
	'Class:IPRequestAddressCreateV4+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:block_id' => 'Subnet Block',
	'Class:IPRequestAddressCreateV4/Attribute:block_id+' => 'IPv4 Block',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id' => 'Subnet',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id+' => 'IPv4 Subnet',
	'Class:IPRequestAddressCreateV4/Attribute:range_id' => 'Range',
	'Class:IPRequestAddressCreateV4/Attribute:range_id+' => 'IPv4 Range',
	'Class:IPRequestAddressCreateV4/Attribute:location_id' => 'Location',
	'Class:IPRequestAddressCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:location_name' => 'Location Name',
	'Class:IPRequestAddressCreateV4/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close' => 'Close',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressCreateV6
//
 
Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressCreateV6' => 'IP Address V6 Creation Request',
	'Class:IPRequestAddressCreateV6+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:block_id' => 'Subnet Block',
	'Class:IPRequestAddressCreateV6/Attribute:block_id+' => 'IPv6 Block',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id' => 'Subnet',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id+' => 'IPv6 Subnet',
	'Class:IPRequestAddressCreateV6/Attribute:range_id' => 'Range',
	'Class:IPRequestAddressCreateV6/Attribute:range_id+' => 'IPv6 Range',
	'Class:IPRequestAddressCreateV6/Attribute:location_id' => 'Location',
	'Class:IPRequestAddressCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:location_name' => 'Location Name',
	'Class:IPRequestAddressCreateV6/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close' => 'Close',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close+' => '',
));           

//
// Class: IPRequestAddressUpdate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressUpdate' => 'IP Address Update Request',
	'Class:IPRequestAddressUpdate+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip' => 'New Status',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved' => 'Reserved',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated' => 'Allocated',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name' => 'New Short Name',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id' => 'New Domain',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name' => 'New Domain Name',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id' => 'New Usage',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name' => 'New Usage Name',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close' => 'Close',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressDelete
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressDelete' => 'IP Address Release Request',
	'Class:IPRequestAddressDelete+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_close' => 'Close',
	'Class:IPRequestAddressDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnet
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnet' => 'Subnet Request',
	'Class:IPRequestSubnet+' => '',
	'Class:IPRequestSubnet:baseinfo' => 'General Information',
	'Class:IPRequestSubnet:contact' => 'Contacts',
	'Class:IPRequestSubnet:subnetinfo' => 'Subnet Information',
	'Class:IPRequestSubnet:date' => 'Dates',
));

//
// Class: IPRequestSubnetCreate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetCreate' => 'Subnet Creation Request',
	'Class:IPRequestSubnetCreate+' => '',
	'Class:IPRequestSubnetCreate/Attribute:name' => 'Name',
	'Class:IPRequestSubnetCreate/Attribute:name+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet' => 'Status',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved' => 'Reserved',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated' => 'Allocated',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetCreate/Attribute:type' => 'Type',
	'Class:IPRequestSubnetCreate/Attribute:type+' => '',
));

//
// Class: IPRequestSubnetCreateV4
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetCreateV4' => 'Subnet V4 Creation Request',
	'Class:IPRequestSubnetCreateV4+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id' => 'Subnet Block',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id+' => 'IPv4 Block',
	'Class:IPRequestSubnetCreateV4/Attribute:mask' => 'Mask',
	'Class:IPRequestSubnetCreateV4/Attribute:mask+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.0.0' => '255.255.0.0 - /16',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.128.0' => '255.255.128.0 - /17',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.192.0' => '255.255.192.0 - /18',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.224.0' => '255.255.224.0 - /19',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.240.0' => '255.255.240.0 - /20',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.248.0' => '255.255.248.0 - /21',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.252.0' => '255.255.252.0 - /22',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.254.0' => '255.255.254.0 - /23',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.0' => '255.255.255.0 - /24',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.128' => '255.255.255.128 - /25',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.192' => '255.255.255.192 - /26',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.224' => '255.255.255.224 - /27',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.240' => '255.255.255.240 - /28',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.248' => '255.255.255.248 - /29',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.252' => '255.255.255.252 - /30',
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.254' => '255.255.255.254 - /31',
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id' => '<font color=#ff0000>Subnet created</font>',
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id' => 'Location',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close' => 'Close',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetCreateV6
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetCreateV6' => 'Subnet V6 Creation Request',
	'Class:IPRequestSubnetCreateV6+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id' => 'Subnet Block',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id+' => 'IPv6 Block',
	'Class:IPRequestSubnetCreateV6/Attribute:mask' => 'Prefix',
	'Class:IPRequestSubnetCreateV6/Attribute:mask+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:64' => 'FFFF:FFFF:FFFF:FFFF:: - /64',
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id' => '<font color=#ff0000>Subnet created</font>',
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id' => 'Location',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close' => 'Close',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetUpdate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetUpdate' => 'Subnet Update Request',
	'Class:IPRequestSubnetUpdate+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id' => '<font color=#ff0000>Subnet to update</font>',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_name' => 'New Name',
	'Class:IPRequestSubnetUpdate/Attribute:new_name+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet' => 'New Status',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved' => 'Reserved',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated' => 'Allocated',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_type' => 'New type',
	'Class:IPRequestSubnetUpdate/Attribute:new_type+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id' => 'New location',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close' => 'Close',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetDelete
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetDelete' => 'Subnet Release Request',
	'Class:IPRequestSubnetDelete+' => '',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id' => '<font color=#ff0000>Subnet to release</font>',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject' => 'Reject',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen' => 'Reopen',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve' => 'Process',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close' => 'Close',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPConfig
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPConfig:requestinfo' => 'Default Settings for IP Requests',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset' => 'Offset for the creation of IPs within IPv4 subnets',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset+' => '',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset' => 'Offset for the creation of IPs within IPv6 subnets',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset+' => '',
));

//
// Application Menu
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Menu:IPRequestManagement' => 'Helpdesk',
	'Menu:IPRequestManagement+' => '',
	'Menu:IPRequestManagement:Overview' => 'Overview',
	'Menu:IPRequestManagement:Overview+' => '',
	'Menu:IPRequestManagement:ShortCut' => 'Shortcuts',
	'Menu:IPRequestManagement:ShortCut+' => '',  
	'Menu:IPRequestManagement:OpenRequests' => 'Open IP Requests',
	'Menu:IPRequestManagement:OpenRequests+' => 'List open Requests for IP Objects',
	'Menu:IPRequestManagement:MyRequests' => 'My IP requests',
	'Menu:IPRequestManagement:MyRequests+' => 'IP requests that are assigned to me',  
	'Menu:IPRequestManagement:MyOpenRequests'=> 'My Open IP Requests',	
	'Menu:IPRequestManagement:MyOpenRequests+'=> 'List of Open IP Requests that are assigned to me',	
	'Menu:IPRequestManagement:New' => 'New IP Request',
	'Menu:IPRequestManagement:New+' => 'Create a new Request for an IP Object',
	'Menu:IPRequestManagement:Search' => 'Search for IP Requests',
	'Menu:IPRequestManagement:Search+' => 'Search for IP Object Requests',
	'Menu:IPRequestManagement:Overview:Requests' => 'IP Requests: %1s',
	'Menu:IPRequestManagement:Overview:Requests+' => 'List Requests for IP Objects',
	
	'UI:IPRequestManagement:Overview:Title' => 'Dashboard for IP Request Management',
	'UI:IPRequestManagement:Overview:RequestByType-last-14-days' => 'IP Requests of the last 14 days (per type)',
	'UI:IPRequestManagement:Overview:Last-14-days' => 'IP Requests of the last 14 days (per day)',
	'UI:IPRequestManagement:Overview:OpenRequestByStatus' => 'Open IP Requests by Status',
	'UI:IPRequestManagement:Overview:OpenRequestByAgent' => 'Open IP Requests by Agent',
	'UI:IPRequestManagement:Overview:OpenRequestByType' => 'Open IP Requests by Type',
	'UI:IPRequestManagement:Overview:OpenRequestByCustomer' => 'Open requests by organization',
	
//
// Management of IP requests
//
	// Implement new IP Request
	'UI:IPManagement:Action:Implement:IPRequest' => 'Process...',
	'UI:IPManagement:Action:Implement:IPRequest:PageTitle_Object_Class' => 'Process',
	'UI:IPManagement:Action:Implement:IPRequest:Title_Class_Object' => 'Process - <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Implement:IPRequest' => 'Process...',
	'UI:IPManagement:Action:Implement:IPRequest:Button' => 'Process',
	'UI:IPManagement:Action:Implement:IPRequest:CannotBeImplemented' => 'Request cannot be processed: %1$s',
	
	// Display details of IP Address Create
	'UI:IPManagement:Action:Details:IPRequestAddressCreate' => 'Details',
	'UI:IPManagement:Action:Details:IPRequestAddressCreate+' => '',
	
	// Implement IP Address Create
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet' => 'Subnet doesn\'t exist!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullSubnet' => 'Subnet is full!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange' => 'IP Range is full!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:IPNameCollision' => 'Short name already exists within domain!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp' => 'Select a free IP',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:ConfirmSelectedIP' => 'Address %1$s has already been selected.',
	
	// Implement IP Address Update
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:IPNameCollision' => 'Short name already exists within domain!',

	// Implement Subnet Create
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock' => 'Subnet block doesn\'t exist!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock' => 'There is no more room in the block for a network with a %1$s mask !',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet' => 'Select a free subnet',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet' => 'Subnet %1$s has already been selected.',
	
	// Implement Subnet Update
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:NoSuchSubnet' => 'Subnet doesn\'t exist!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:ChangeSizeManually' => 'Change of mask should be done through subnet menu first.',

	// Portal actions
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV4' => 'IPv4 creation',
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV6' => 'IPv6 creation',
	'UI:IPManagement:Action:Portal:IPRequestAddressUpdate' => 'IP update',
	'UI:IPManagement:Action:Portal:IPRequestAddressDelete' => 'IP release',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV4' => 'IPv4 Subnet creation',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV6' => 'IPv6 Subnet creation',
	'UI:IPManagement:Action:Portal:IPRequestSubnetUpdate' => 'Subnet update',
	'UI:IPManagement:Action:Portal:IPRequestSubnetDelete' => 'Subnet deletion',
	
));
