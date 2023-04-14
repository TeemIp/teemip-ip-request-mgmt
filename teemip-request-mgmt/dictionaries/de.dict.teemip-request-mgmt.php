<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'Request Mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: IPRequest
//
									
Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequest' => 'IP Anforderung',
	'Class:IPRequest+' => '',
	'Class:IPRequest/Attribute:status' => 'Status',
	'Class:IPRequest/Attribute:status+' => '',
	'Class:IPRequest/Attribute:status/Value:new' => 'Neu',
	'Class:IPRequest/Attribute:status/Value:new+' => '',
	'Class:IPRequest/Attribute:status/Value:rejected' => 'Zurückgewiesen',
	'Class:IPRequest/Attribute:status/Value:rejected+' => '',
	'Class:IPRequest/Attribute:status/Value:assigned' => 'Zugewiesen',
	'Class:IPRequest/Attribute:status/Value:assigned+' => '',
	'Class:IPRequest/Attribute:status/Value:resolved' => 'Gelöst',
	'Class:IPRequest/Attribute:status/Value:resolved+' => '',
	'Class:IPRequest/Attribute:status/Value:closed' => 'Geschlossen',
	'Class:IPRequest/Attribute:status/Value:closed+' => '',
	'Class:IPRequest/Attribute:public_log' => 'Öffentliches Log',
	'Class:IPRequest/Attribute:public_log+' => '',
	'Class:IPRequest/Attribute:user_comment' => 'Benutzerkommentar',
	'Class:IPRequest/Attribute:user_comment+' => '',
));

//
// Class: IPRequestAddress
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestAddress' => 'IP Adressen Anforderungen',
	'Class:IPRequestAddress+' => '',
	'Class:IPRequestAddress/Attribute:ip_id' => 'IP Adresse',
	'Class:IPRequestAddress/Attribute:ip_id+' => '',
	'Class:IPRequestAddress:baseinfo' => 'Allgemeine Information',
	'Class:IPRequestAddress:contact' => 'Kontakte',
	'Class:IPRequestAddress:ipinfo' => 'IP Informationen',
	'Class:IPRequestAddress:device' => 'Geräte Information',
	'Class:IPRequestAddress:date' => 'Daten',
));

//
// Class: IPRequestAddressCreate
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestAddressCreate' => 'Anforderung einer neuen IP Adresse',
	'Class:IPRequestAddressCreate+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip' => 'IP Status',
	'Class:IPRequestAddressCreate/Attribute:status_ip+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved' => 'Reserviert',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated' => 'Allokiert',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressCreate/Attribute:short_name' => 'Short Name',
	'Class:IPRequestAddressCreate/Attribute:short_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_id' => 'DNS Domain',
	'Class:IPRequestAddressCreate/Attribute:domain_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_name' => 'Domain Name',
	'Class:IPRequestAddressCreate/Attribute:domain_name+' => 'Name der DNS Domain',
	'Class:IPRequestAddressCreate/Attribute:usage_id' => 'Verwendungszweck',
	'Class:IPRequestAddressCreate/Attribute:usage_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:usage_name' => 'Name des Verwendungszwecks',
	'Class:IPRequestAddressCreate/Attribute:usage_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ciclass' => 'Zielklasse',
	'Class:IPRequestAddressCreate/Attribute:ciclass+' => 'Klasse den CI das mit der IP verknüpft ist',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id' => 'Verknüpfbares CI',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id+' => 'Verknüpfbares CI das mit der IP verknüpft ist',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name' => 'Verknüpfbares CI Name',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute' => 'IP-Attribut von CI',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute+' => 'Das IP-Attribut von CI, an das die IP gebunden werden muss',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link' => 'Verknüpfung zwischen IP und CI',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link+' => 'Typ der Verknüpfung zwischen IP Adresse und Verknüpfbarem CI',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip' => 'Management-IP',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface' => 'Physical Interface',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface' => 'Logical Interface',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface+' => '',
));

//
// Class: IPRequestAddressCreateV4
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestAddressCreateV4' => 'Anforderung einer neuen IPv4 Adresse',
	'Class:IPRequestAddressCreateV4+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:block_id' => 'Subnetz Block',
	'Class:IPRequestAddressCreateV4/Attribute:block_id+' => 'IPv4 Block',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id' => 'Subnetz',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id+' => 'IPv4 Subnetz',
	'Class:IPRequestAddressCreateV4/Attribute:range_id' => 'Bereich',
	'Class:IPRequestAddressCreateV4/Attribute:range_id+' => 'IPv4 Bereich',
	'Class:IPRequestAddressCreateV4/Attribute:location_id' => 'Standort',
	'Class:IPRequestAddressCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:location_name' => 'Name des Standort',
	'Class:IPRequestAddressCreateV4/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign' => 'Zuweisen',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressCreateV6
//
 
Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestAddressCreateV6' => 'Anfordern einer neuen IPv6 Adresse',
	'Class:IPRequestAddressCreateV6+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:block_id' => 'Subnetz Block',
	'Class:IPRequestAddressCreateV6/Attribute:block_id+' => 'IPv6 Block',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id' => 'Subnetz',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id+' => 'IPv6 Subnetz',
	'Class:IPRequestAddressCreateV6/Attribute:range_id' => 'Bereich',
	'Class:IPRequestAddressCreateV6/Attribute:range_id+' => 'IPv6 Bereich',
	'Class:IPRequestAddressCreateV6/Attribute:location_id' => 'Standort',
	'Class:IPRequestAddressCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:location_name' => 'Name des Standorts',
	'Class:IPRequestAddressCreateV6/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign' => 'Zuweisen',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close+' => '',
));           

//
// Class: IPRequestAddressUpdate
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestAddressUpdate' => 'IP Adressen Update Anforderung',
	'Class:IPRequestAddressUpdate+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip' => 'Neuer IP Status',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved' => 'Reserviert',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated' => 'Allokiert',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name' => 'Neuer Short Name',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id' => 'Neue Domain',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name' => 'Neue Domain Name',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id' => 'Neuer Verwendungszweck',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name' => 'Neuer Verwendungszweck',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressDelete
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestAddressDelete' => 'Anforderung zur Freigabe einer IP Adresse',
	'Class:IPRequestAddressDelete+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestAddressDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnet
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestSubnet' => 'Subnetz Anforderung Request',
	'Class:IPRequestSubnet+' => '',
	'Class:IPRequestSubnet:baseinfo' => 'Allgemeine Information',
	'Class:IPRequestSubnet:contact' => 'Kontakte',
	'Class:IPRequestSubnet:subnetinfo' => 'Subnetz Information',
	'Class:IPRequestSubnet:date' => 'Daten',
));

//
// Class: IPRequestSubnetCreate
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestSubnetCreate' => 'Anforderung, ein Subnetz zu erstellen',
	'Class:IPRequestSubnetCreate+' => '',
	'Class:IPRequestSubnetCreate/Attribute:name' => 'Name',
	'Class:IPRequestSubnetCreate/Attribute:name+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet' => 'Subnetz Status',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved' => 'Reserviert',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated' => 'Allokiert',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetCreate/Attribute:type' => 'Typ',
	'Class:IPRequestSubnetCreate/Attribute:type+' => '',
));

//
// Class: IPRequestSubnetCreateV4
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestSubnetCreateV4' => 'Anforderung eines neue V4 Subnetzes',
	'Class:IPRequestSubnetCreateV4+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id' => 'Subnetz Block',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id+' => 'IPv4 Block',
	'Class:IPRequestSubnetCreateV4/Attribute:mask' => 'Maske',
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
	'Class:IPRequestSubnetCreateV4/Attribute:mask/Value:255.255.255.255' => '255.255.255.255 - /32',
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id' => 'Subnetz erstellt',
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id' =>  'Standort',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetCreateV6
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestSubnetCreateV6' => 'Anforderung eines neuen V6 Subnetzes',
	'Class:IPRequestSubnetCreateV6+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id' => 'Subnetz Block',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id+' => 'IPv6 Block',
	'Class:IPRequestSubnetCreateV6/Attribute:mask' => 'Prefix',
	'Class:IPRequestSubnetCreateV6/Attribute:mask+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:64'  => 'FFFF:FFFF:FFFF:FFFF:: - /64',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:65'  => 'FFFF:FFFF:FFFF:FFFF:8000:: - /65',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:66'  => 'FFFF:FFFF:FFFF:FFFF:C000:: - /66',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:67'  => 'FFFF:FFFF:FFFF:FFFF:E000:: - /67',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:68'  => 'FFFF:FFFF:FFFF:FFFF:F000:: - /68',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:69'  => 'FFFF:FFFF:FFFF:FFFF:F800:: - /69',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:70'  => 'FFFF:FFFF:FFFF:FFFF:FC00:: - /70',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:71'  => 'FFFF:FFFF:FFFF:FFFF:FE00:: - /71',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:72'  => 'FFFF:FFFF:FFFF:FFFF:FF00:: - /72',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:73'  => 'FFFF:FFFF:FFFF:FFFF:FF80:: - /73',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:74'  => 'FFFF:FFFF:FFFF:FFFF:FFC0:: - /74',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:75'  => 'FFFF:FFFF:FFFF:FFFF:FFE0:: - /75',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:76'  => 'FFFF:FFFF:FFFF:FFFF:FFF0:: - /76',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:77'  => 'FFFF:FFFF:FFFF:FFFF:FFF8:: - /77',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:78'  => 'FFFF:FFFF:FFFF:FFFF:FFFC:: - /78',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:79'  => 'FFFF:FFFF:FFFF:FFFF:FFFE:: - /79',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:80'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:: - /80',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:81'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:8000:: - /81',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:82'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:C000:: - /82',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:83'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:E000:: - /83',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:84'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:F000:: - /84',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:85'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:F800:: - /85',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:86'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FC00:: - /86',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:87'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FE00:: - /87',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:88'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FF00:: - /88',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:89'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FF80:: - /89',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:90'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFC0:: - /90',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:91'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFE0:: - /91',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:92'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFF0:: - /92',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:93'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFF8:: - /93',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:94'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFC:: - /94',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:95'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFE:: - /95',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:96'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:: - /96',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:97'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:8000:0 - /97',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:98'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:C000:0 - /98',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:99'  => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:E000:0 - /99',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:100' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:F000:0 - /100',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:101' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:F800:0 - /101',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:102' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FC00:0 - /102',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:103' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FE00:0 - /103',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:104' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FF00:0 - /104',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:105' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FF80:0 - /105',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:106' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFC0:0 - /106',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:107' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFE0:0 - /107',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:108' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFF0:0 - /108',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:109' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFF8:0 - /109',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:110' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFC:0 - /110',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:111' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFE:0 - /111',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:112' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:0 - /112',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:113' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:8000 - /113',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:114' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:C000 - /114',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:115' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:E000 - /115',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:116' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:F000 - /116',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:117' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:F800 - /117',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:118' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FC00 - /118',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:119' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FE00 - /119',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:120' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FF00 - /120',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:121' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FF80 - /121',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:122' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFC0 - /122',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:123' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFE0 - /123',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:124' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFF0 - /124',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:125' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFF8 - /125',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:126' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFC - /126',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:127' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFE - /127',
	'Class:IPRequestSubnetCreateV6/Attribute:mask/Value:128' => 'FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF - /128',
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id' => 'Subnetz erzeugt',
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id' => 'Standort',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetUpdate
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestSubnetUpdate' => 'Anforderung zum Update eines Subnetzes',
	'Class:IPRequestSubnetUpdate+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id' => 'Subnetz, das aktualisiert werden soll',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_name' => 'Neuer Name',
	'Class:IPRequestSubnetUpdate/Attribute:new_name+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet' => 'Neuere Subnetz Status',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved' => 'Reserviert',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated' => 'Allokiert',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_type' => 'Neuere Typ',
	'Class:IPRequestSubnetUpdate/Attribute:new_type+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id' => 'Alter Standort',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id' => 'Neuer Standort',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetDelete
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPRequestSubnetDelete' => 'Subnetz Freigabe Anforderung',
	'Class:IPRequestSubnetDelete+' => '',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id' => 'Subnetz, das freigegeben werden soll',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject' => 'Zurückweisen',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign' => 'Assign',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve' => 'Bearbeiten',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close' => 'Schliessen',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPConfig
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPConfig:requestinfo' => 'Default Einstellungen für IP Anforderungen',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset' => 'Offset zum Erzeugen von IPs in IPv4 Subnetzen',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset+' => '',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset' => 'Offset zum Erzeugen von IPs in IPv6 Subnetzen',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset+' => '',
));

//
// Class: IPSubnet
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation' => 'Automatische IP-Erstellung zulassen',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation+' => 'IP Erstellen Anforderungen können für dieses Subnetz automatisch verarbeitet werden',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation/Value:yes' => 'Ja',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation/Value:no' => 'Nein',
));

//
// Class: IPBlock
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation' => 'Automatische Subnetz-Erstellung zulassen',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation+' => 'Subnetz Erstellen Anforderungen können für diesen Block automatisch verarbeitet werden',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation/Value:yes' => 'Ja',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation/Value:no' => 'Nein',
));

//
// Application Menu
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Menu:IPRequestManagement' => 'IP Helpdesk',
	'Menu:IPRequestManagement+' => '',
	'Menu:IPRequestManagement:Overview' => 'Überblick',
	'Menu:IPRequestManagement:Overview+' => '',
	'Menu:IPRequestManagement:ShortCut' => 'Shortcuts',
	'Menu:IPRequestManagement:ShortCut+' => '',
	'Menu:IPRequestManagement:OpenRequests' => 'Offene IP Anforderungen',
	'Menu:IPRequestManagement:OpenRequests+' => 'Alle offenen Anforderungen für IP Objekte anzeigen',
	'Menu:IPRequestManagement:MyRequests' => 'Meine IP Anforderungen',
	'Menu:IPRequestManagement:MyRequests+' => 'IP Anforderungen, die mir zugewiesen sind',
	'Menu:IPRequestManagement:MyOpenRequests' => 'Meine Offenen IP Anforderungen',
	'Menu:IPRequestManagement:MyOpenRequests+' => 'Alle mir zugewiesenen offenen Anforderungen für IP Objekte anzeigen',
	'Menu:IPRequestManagement:New' => 'Neue IP Anforderung',
	'Menu:IPRequestManagement:New+' => 'Eine neue Anforderung für ein IP Objekt erstellen',
	'Menu:IPRequestManagement:Search' => 'Nach IP Anforderungen suchen',
	'Menu:IPRequestManagement:Search+' => 'Nach IP-Objekt Anforderungen suchen',
	'Menu:IPRequestManagement:Overview:Requests' => 'IP Anforderungen: %1s',
	'Menu:IPRequestManagement:Overview:Requests+' => 'Alle Anforderungen für IP-Objekte',
	'UI:IPRequestManagement:Overview:Title' => 'Dashboard für IP Anforderungs Management',
	'UI:IPRequestManagement:Overview:RequestByType-last-14-days' => 'IP Anforderungen der letzten 14 Tage (pro Typ)',
	'UI:IPRequestManagement:Overview:Last-14-days' => 'IP Anforderungen der letzten 14 Tage (pro Tag)',
	'UI:IPRequestManagement:Overview:OpenRequestByStatus' => 'Offene IP Anforderungen nach Status',
	'UI:IPRequestManagement:Overview:OpenRequestByAgent' => 'Offene IP Anforderungen nach Bearbeiter',
	'UI:IPRequestManagement:Overview:OpenRequestByType' => 'Offene IP Anforderungen nach Typ',
	'UI:IPRequestManagement:Overview:OpenRequestByCustomer' => 'Offene IP Anforderungen nach Organisation',

//
// Management of IP requests
//
	// Implement new IP Request
	'UI:IPManagement:Action:Implement:IPRequest' => 'Bearbeitung...',
	'UI:IPManagement:Action:Implement:IPRequest:PageTitle_Object_Class' => 'Bearbeiten',
	'UI:IPManagement:Action:Implement:IPRequest:Title_Class_Object' => 'Bearbeitung - %2$s',
	'UI:IPManagement:Action:Implement:IPRequest:Button' => 'Bearbeiten',
	'UI:IPManagement:Action:Implement:IPRequest:CannotBeImplemented' => 'Anforderungen kann nicht bearbeitet werden: %1$s',

	// Automation processes
	'UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed' => 'Dank Ihrer Privilegien wurde Ihr Ticket automatisch verarbeitet. ',

	// Display details of IP Address Create
	'UI:IPManagement:Action:Details:IPRequestAddressCreate' => 'Details',
	'UI:IPManagement:Action:Details:IPRequestAddressCreate+' => '',

	// Implement IP Address Create
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet' => 'Subnetz existiert nicht!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullSubnet' => 'Subnetz ist voll!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange' => 'IP Bereich ist voll!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:IPNameCollision' => 'Der Short Name existiert bereits in der Domain!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp' => 'Wählen Sie eine freie IP aus',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:ConfirmSelectedIP' => 'Adresse %1$s wurde schon ausgewählt.',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:Confirmation' => 'Adresse %1$s wurde mit Status %2$s erstellt.',

	// Implement IP Address Update
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:NoSelectedIP' => 'Es wurde keine IP-Adresse ausgewählt!',
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:IPNameCollision' => 'Der Short Name existiert bereits in der Domain!',
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:Confirmation' => 'Adresse %1$s wurde mit Status %2$s aktualisiert.',

	// Implement IP Address Release
	'UI:IPManagement:Action:Implement:IPRequestAddressRelease:Confirmation' => 'Adresse %1$s wurde freigegeben.',

	// Implement Subnet Create
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock' => 'Subnetz Block existiert nicht!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock' => 'Es gibt keinen Platz in diesem Block für ein Netzwerk mit der Maske %1$s !',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet' => 'Wählen Sie ein freies Subnetz aus',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet' => 'Subnetz %1$s wurde bereits ausgewählt.',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:Confirmation' => 'Subnetz %1$s wurde mit Status %2$s erstellt.',

	// Implement Subnet Update
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:NoSuchSubnet' => 'Subnetz existiert nicht!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:ChangeSizeManually' => 'Die Änderung der Maske sollte zunächste im Subnetz Menu durchgeführt werden.',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:Confirmation' => 'Subnetz %1$s wurde mit Status %2$s aktualisiert.',

	// Implement subnet Release
	'UI:IPManagement:Action:Implement:IPRequestSubnetRelease:Confirmation' => 'Subnetz %1$s wurde freigegeben.',

	// Portal actions
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV4' => 'IPv4 Adresse erzeugen',
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV6' => 'IPv6 Adresse erzeugen',
	'UI:IPManagement:Action:Portal:IPRequestAddressUpdate' => 'IP Update',
	'UI:IPManagement:Action:Portal:IPRequestAddressDelete' => 'IP Freigabe',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV4' => 'IPv4 Subnetz erzeugen',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV6' => 'IPv6 Subnetz erzeugen',
	'UI:IPManagement:Action:Portal:IPRequestSubnetUpdate' => 'Subnetz Update',
	'UI:IPManagement:Action:Portal:IPRequestSubnetDelete' => 'Subnetz Löschen',

));
