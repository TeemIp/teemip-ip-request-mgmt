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

//////////////////////////////////////////////////////////////////////
// Classes in 'Request Mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: IPRequest
//
									
Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequest' => 'Richiesta IP',
	'Class:IPRequest+' => '',
	'Class:IPRequest/Attribute:status' => 'Stato',
	'Class:IPRequest/Attribute:status+' => '',
	'Class:IPRequest/Attribute:status/Value:new' => 'Nuovo',
	'Class:IPRequest/Attribute:status/Value:new+' => '',
	'Class:IPRequest/Attribute:status/Value:rejected' => 'Respinto',
	'Class:IPRequest/Attribute:status/Value:rejected+' => '',
	'Class:IPRequest/Attribute:status/Value:assigned' => 'Assegnata',
	'Class:IPRequest/Attribute:status/Value:assigned+' => '',
	'Class:IPRequest/Attribute:status/Value:resolved' => 'Risolta',
	'Class:IPRequest/Attribute:status/Value:resolved+' => '',
	'Class:IPRequest/Attribute:status/Value:closed' => 'Chiusa',
	'Class:IPRequest/Attribute:status/Value:closed+' => '',
	'Class:IPRequest/Attribute:public_log' => 'Log Pubblico',
	'Class:IPRequest/Attribute:public_log+' => '',
	'Class:IPRequest/Attribute:user_comment' => 'Commento dell\'utente',
	'Class:IPRequest/Attribute:user_comment+' => '',
));

//
// Class: IPRequestAddress
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestAddress' => 'Richiesta indirizzo IP',
	'Class:IPRequestAddress+' => '',
	'Class:IPRequestAddress/Attribute:ip_id' => 'Indirizzo IP',
	'Class:IPRequestAddress/Attribute:ip_id+' => '',
	'Class:IPRequestAddress:baseinfo' => 'Informazione Generale',
	'Class:IPRequestAddress:contact' => 'Contatti',
	'Class:IPRequestAddress:ipinfo' => 'Informazioni sull\'IP',
	'Class:IPRequestAddress:device' => 'Informazioni sul dispositivo',
	'Class:IPRequestAddress:date' => 'Date',
));

//
// Class: IPRequestAddressCreate
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestAddressCreate' => 'Richiesta di creazione di indirizzi IP',
	'Class:IPRequestAddressCreate+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip' => 'Stato dell\'IP',
	'Class:IPRequestAddressCreate/Attribute:status_ip+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved' => 'Riservato',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated' => 'Allocato',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressCreate/Attribute:short_name' => 'Nome Breve',
	'Class:IPRequestAddressCreate/Attribute:short_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_id' => 'Dominio DNS',
	'Class:IPRequestAddressCreate/Attribute:domain_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_name' => 'Nome del Dominio',
	'Class:IPRequestAddressCreate/Attribute:domain_name+' => 'Nome del dominio DNS',
	'Class:IPRequestAddressCreate/Attribute:usage_id' => 'Uso',
	'Class:IPRequestAddressCreate/Attribute:usage_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:usage_name' => 'Nome dell\'Uso',
	'Class:IPRequestAddressCreate/Attribute:usage_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ciclass' => 'Classe di destinazione',
	'Class:IPRequestAddressCreate/Attribute:ciclass+' => 'Classe del CI funzionale a cui deve essere collegato l\'IP',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id' => 'CI Funzionale',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id+' => 'CI funzionale a cui deve essere collegato l\'IP',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name' => 'Nome del CI funzionale ',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute' => 'Attributo IP del CI',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute+' => 'L\'attributo IP CI a cui deve essere associato l\'IP',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link' => 'Collegamento tra IP e CI',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link+' => 'Tipo di collegamento tra indirizzo IP e CI collegabile',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip' => 'IP di Gestione',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface' => 'Iterfaccia fisica',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface' => 'Interfaccia Logica',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface+' => '',
));

//
// Class: IPRequestAddressCreateV4
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestAddressCreateV4' => 'Richiesta di creazione di indirizzo IP V4',
	'Class:IPRequestAddressCreateV4+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:block_id' => 'Blocco di sottorete',
	'Class:IPRequestAddressCreateV4/Attribute:block_id+' => 'Blocco IPv4',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id' => 'Subnet',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id+' => 'Sottorete IPv4',
	'Class:IPRequestAddressCreateV4/Attribute:range_id' => 'Intervallo',
	'Class:IPRequestAddressCreateV4/Attribute:range_id+' => 'Intervallo IPv4',
	'Class:IPRequestAddressCreateV4/Attribute:location_id' => 'LocalitÓ',
	'Class:IPRequestAddressCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:location_name' => 'Nome della localitÓ',
	'Class:IPRequestAddressCreateV4/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign' => 'Assegnato',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve' => 'In lavorazione',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close' => 'Chiuso',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressCreateV6
//
 
Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestAddressCreateV6' => 'Richiesta di creazione dell\'indirizzo IP V6',
	'Class:IPRequestAddressCreateV6+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:block_id' => 'Blocco di Sottorete',
	'Class:IPRequestAddressCreateV6/Attribute:block_id+' => 'Blocco IPv6',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id' => 'Sottorete',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id+' => 'Sottorete IPv6',
	'Class:IPRequestAddressCreateV6/Attribute:range_id' => 'Intervallo',
	'Class:IPRequestAddressCreateV6/Attribute:range_id+' => 'Intervallo IPv6',
	'Class:IPRequestAddressCreateV6/Attribute:location_id' => 'LocalitÓ',
	'Class:IPRequestAddressCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:location_name' => 'Nome della LocalitÓ',
	'Class:IPRequestAddressCreateV6/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign' => 'Assignato',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve' => 'In lavorazione',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close' => 'Chiuso',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close+' => '',
));           

//
// Class: IPRequestAddressUpdate
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestAddressUpdate' => 'Richiesta di aggiornamento dell\'indirizzo IP',
	'Class:IPRequestAddressUpdate+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip' => 'Nuovo IP Stato',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved' => 'Riservato',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated' => 'Allocato',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name' => 'Nuovo Nome Breve',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id' => 'Nuovo Dominio',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name' => 'Nuovo nome Dominio',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id' => 'Nuovo Uso',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name' => 'Nome del nuovo uso',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign' => 'Assegnato',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve' => 'Risolto',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close' => 'Close',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressDelete
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestAddressDelete' => 'Richiesta di rilascio dell\'indirizzo IP',
	'Class:IPRequestAddressDelete+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign' => 'Assegnato',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve' => 'Risolto',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_close' => 'Chiuso',
	'Class:IPRequestAddressDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnet
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestSubnet' => 'Richeista di Sottorete',
	'Class:IPRequestSubnet+' => '',
	'Class:IPRequestSubnet:baseinfo' => 'Informazioni Generali',
	'Class:IPRequestSubnet:contact' => 'Contatti',
	'Class:IPRequestSubnet:subnetinfo' => 'Informazioni della sottorete',
	'Class:IPRequestSubnet:date' => 'Date',
));

//
// Class: IPRequestSubnetCreate
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestSubnetCreate' => 'Richesta di creazione sottorete',
	'Class:IPRequestSubnetCreate+' => '',
	'Class:IPRequestSubnetCreate/Attribute:name' => 'Nome',
	'Class:IPRequestSubnetCreate/Attribute:name+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet' => 'Stato della sottorete',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved' => 'Riservato',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated' => 'Allocato',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetCreate/Attribute:type' => 'Tipo',
	'Class:IPRequestSubnetCreate/Attribute:type+' => '',
));

//
// Class: IPRequestSubnetCreateV4
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestSubnetCreateV4' => 'Richiesta di creazione della sottorete V4',
	'Class:IPRequestSubnetCreateV4+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id' => 'Blocco di sottorete',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id+' => 'Blocco IPv4',
	'Class:IPRequestSubnetCreateV4/Attribute:mask' => 'Maschera',
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
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id' => 'Sottorete Creata',
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id' => 'LocalitÓ',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign' => 'Assegnato',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve' => 'Risolto',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close' => 'Chiuso',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetCreateV6
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestSubnetCreateV6' => 'Richiesta di creazione della sottorete V6',
	'Class:IPRequestSubnetCreateV6+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id' => 'Blocco di sottorete',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id+' => 'Blocco IPv6',
	'Class:IPRequestSubnetCreateV6/Attribute:mask' => 'Prefisso',
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
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id' => 'Sottorete creata',
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id' => 'LocalitÓ',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign' => 'Assegnato',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve' => 'Risolto',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close' => 'Close',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetUpdate
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestSubnetUpdate' => 'Richiesta di aggiornamento sottorete',
	'Class:IPRequestSubnetUpdate+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id' => 'Sottorete da aaggiornare',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_name' => 'Nuovo Nome',
	'Class:IPRequestSubnetUpdate/Attribute:new_name+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet' => 'Nuova Sottorete Stato',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved' => 'Riservato',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated' => 'Allocato',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_type' => 'Nuovo Tipo',
	'Class:IPRequestSubnetUpdate/Attribute:new_type+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id' => 'Vecchia localitÓ',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id' => 'Nuova localitÓ',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign' => 'Assegnato',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve' => 'Risolto',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close' => 'Chiuso',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetDelete
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPRequestSubnetDelete' => 'Richiesta di rilascio sottorete',
	'Class:IPRequestSubnetDelete+' => '',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id' => 'Sottorete da rilasciare',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject' => 'Respinto',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign' => 'Assegnato',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen' => 'Riaperto',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve' => 'Risolto',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close' => 'Chiuso',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPConfig
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:IPConfig:requestinfo' => 'Impostazioni predefinite per richieste IP',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset' => 'Offset per la creazione di IP all\'interno di sottoreti IPv4',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset+' => '',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset' => 'Offset per la creazione di IP all\'interno di sottoreti IPv6',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset+' => '',
));

//
// Application Menu
//

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Menu:IPRequestManagement' => 'IP Helpdesk',
	'Menu:IPRequestManagement+' => '',
	'Menu:IPRequestManagement:Overview' => 'Panoramica',
	'Menu:IPRequestManagement:Overview+' => '',
	'Menu:IPRequestManagement:ShortCut' => 'Scorciatoie',
	'Menu:IPRequestManagement:ShortCut+' => '',  
	'Menu:IPRequestManagement:OpenRequests' => 'Apri una irchiesta IP',
	'Menu:IPRequestManagement:OpenRequests+' => 'Elenca le richieste aperte per gli oggetti IP',
	'Menu:IPRequestManagement:MyRequests' => 'Le mie richieste IP',
	'Menu:IPRequestManagement:MyRequests+' => 'RIchieste IP assegnate a me',  
	'Menu:IPRequestManagement:MyOpenRequests' => 'Le mie richieste IP aperte',
	'Menu:IPRequestManagement:MyOpenRequests+' => 'Elenco delle richieste IP aperte assegnate a me',
	'Menu:IPRequestManagement:New' => 'Nuova Richiesta IP',
	'Menu:IPRequestManagement:New+' => 'Crea una nuova richiesta per un oggetto IP',
	'Menu:IPRequestManagement:Search' => 'Cerca richieste IP',
	'Menu:IPRequestManagement:Search+' => 'Cerca richieste per oggetti IP',
	'Menu:IPRequestManagement:Overview:Requests' => 'IP Richieste: %1s',
	'Menu:IPRequestManagement:Overview:Requests+' => 'Elenca richieste per oggetti IP',
	
	'UI:IPRequestManagement:Overview:Title' => 'Cruscotto per la gestione delle richieste IP',
	'UI:IPRequestManagement:Overview:RequestByType-last-14-days' => 'Richieste IP degli ultimi 14 giorni (per tipo)',
	'UI:IPRequestManagement:Overview:Last-14-days' => 'IP Richieste IP degli ultimi 14 giorni(per giorno)',
	'UI:IPRequestManagement:Overview:OpenRequestByStatus' => 'Richieste IP aperte per stato',
	'UI:IPRequestManagement:Overview:OpenRequestByAgent' => 'Richieste IP aperte per agente',
	'UI:IPRequestManagement:Overview:OpenRequestByType' => 'Richieste IP aperte per tipo',
	'UI:IPRequestManagement:Overview:OpenRequestByCustomer' => 'Richieste IP aperte per Organizzazione',
	
//
// Management of IP requests
//
	// Implement new IP Request
	'UI:IPManagement:Action:Implement:IPRequest' => 'Process...',
	'UI:IPManagement:Action:Implement:IPRequest:PageTitle_Object_Class' => 'Process',
	'UI:IPManagement:Action:Implement:IPRequest:Title_Class_Object' => 'Process - <span class="hilite">%2$s</span>',
	'UI:IPManagement:Action:Implement:IPRequest' => 'Process...',
	'UI:IPManagement:Action:Implement:IPRequest:Button' => 'Process',
	'UI:IPManagement:Action:Implement:IPRequest:CannotBeImplemented' => 'La richiesta non pu‗ essere elaborata: %1$s',
	
	// Display details of IP Address Create
	'UI:IPManagement:Action:Details:IPRequestAddressCreate' => 'Dettagli',
	'UI:IPManagement:Action:Details:IPRequestAddressCreate+' => '',
	
	// Implement IP Address Create
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet' => 'La sottorete non esiste!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullSubnet' => 'La sottorete Þ piena!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange' => 'L\'intervallo IP Þ pieno!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:IPNameCollision' => 'Il nome breve esiste giÓ nel dominio!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp' => 'Selezione un IP libero',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:ConfirmSelectedIP' => 'L\'indirizzo %1$s Þ giÓ stato selezionato.',
	
	// Implement IP Address Update
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:IPNameCollision' => 'Il nome breve esiste giÓ nel dominio!',

	// Implement Subnet Create
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock' => 'La sottorete non esiste!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock' => 'Non c\'è più spazio nel blocco per una rete con una maschera %1$s !',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet' => 'Selezione una sottorete libera',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet' => 'La sottorete %1$s Þ giÓ stata selezionata.',
	
	// Implement Subnet Update
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:NoSuchSubnet' => 'La sottorete non esiste!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:ChangeSizeManually' => 'Il cambio di maschera dovrebbe essere fatto prima attraverso il menu sottorete.',

	// Portal actions
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV4' => 'Creazionde di IPv4',
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV6' => 'Creazione di IPv6',
	'UI:IPManagement:Action:Portal:IPRequestAddressUpdate' => 'Aggiornamento dell\'IP',
	'UI:IPManagement:Action:Portal:IPRequestAddressDelete' => 'Rilascio dell\'IP',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV4' => 'Creazione della sottorete IPv4',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV6' => 'Creazionde di una sottorete IPv6',
	'UI:IPManagement:Action:Portal:IPRequestSubnetUpdate' => 'Aggiornamento della sottorete',
	'UI:IPManagement:Action:Portal:IPRequestSubnetDelete' => 'Candellazione della sottorete',
	
));
