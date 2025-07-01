<?php
/*
 * @copyright   Copyright (C) 2010-2023 TeemIp
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
	'Class:IPRequest' => 'Requisição de IP',
	'Class:IPRequest+' => '',
	'Class:IPRequest/Attribute:status' => 'Status',
	'Class:IPRequest/Attribute:status+' => '',
	'Class:IPRequest/Attribute:status/Value:new' => 'Nova',
	'Class:IPRequest/Attribute:status/Value:new+' => '',
	'Class:IPRequest/Attribute:status/Value:rejected' => 'Rejeitada',
	'Class:IPRequest/Attribute:status/Value:rejected+' => '',
	'Class:IPRequest/Attribute:status/Value:assigned' => 'Atribuída',
	'Class:IPRequest/Attribute:status/Value:assigned+' => '',
	'Class:IPRequest/Attribute:status/Value:resolved' => 'Resolvida',
	'Class:IPRequest/Attribute:status/Value:resolved+' => '',
	'Class:IPRequest/Attribute:status/Value:closed' => 'Fechada',
	'Class:IPRequest/Attribute:status/Value:closed+' => '',
	'Class:IPRequest/Attribute:public_log' => 'Log público',
	'Class:IPRequest/Attribute:public_log+' => '',
	'Class:IPRequest/Attribute:user_comment' => 'Comentário do usuário',
	'Class:IPRequest/Attribute:user_comment+' => '',
));

//
// Class: IPRequestAddress
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddress' => 'Requisição de Endereço IP',
	'Class:IPRequestAddress+' => '',
	'Class:IPRequestAddress/Attribute:ip_id' => 'Endereço IP',
	'Class:IPRequestAddress/Attribute:ip_id+' => '',
	'Class:IPRequestAddress:baseinfo' => 'Informações Gerais',
	'Class:IPRequestAddress:contact' => 'Contatos',
	'Class:IPRequestAddress:ipinfo' => 'Informações do IP',
	'Class:IPRequestAddress:device' => 'Informações do Dispositivo',
	'Class:IPRequestAddress:date' => 'Datas',
));

//
// Class: IPRequestAddressCreate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressCreate' => 'Requisição de Criação de Endereço IP',
	'Class:IPRequestAddressCreate+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip' => 'Status do IP',
	'Class:IPRequestAddressCreate/Attribute:status_ip+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved' => 'Reservado',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated' => 'Alocado',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressCreate/Attribute:short_name' => 'Nome Curto',
	'Class:IPRequestAddressCreate/Attribute:short_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_id' => 'Domínio DNS',
	'Class:IPRequestAddressCreate/Attribute:domain_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_name' => 'Nome do Domínio',
	'Class:IPRequestAddressCreate/Attribute:domain_name+' => 'Nome do domínio DNS',
	'Class:IPRequestAddressCreate/Attribute:usage_id' => 'Uso',
	'Class:IPRequestAddressCreate/Attribute:usage_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:usage_name' => 'Nome de Uso',
	'Class:IPRequestAddressCreate/Attribute:usage_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ciclass' => 'Classe de destino',
	'Class:IPRequestAddressCreate/Attribute:ciclass+' => 'Classe do CI ao qual o IP deve ser vinculado',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id' => 'CI Funcional',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id+' => 'CI Funcional ao qual o IP deve ser vinculado',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name' => 'Nome do CI Funcional',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute' => 'Atributo de IP do CI\'s',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute+' => 'Atributo de IP dos CI\'s ao qual o IP deve ser vinculado',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link' => 'Vínculo entre IP e CI',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link+' => 'Tipo de vínculo entre o endereço IP e o CI Conectável',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip' => 'IP de Gerenciamento',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface' => 'Interface Física',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface' => 'Interface Lógica',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface+' => '',
));

//
// Class: IPRequestAddressCreateV4
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressCreateV4' => 'Requisição de Criação de Endereço IPv4',
	'Class:IPRequestAddressCreateV4+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:block_id' => 'Bloco de Sub-rede',
	'Class:IPRequestAddressCreateV4/Attribute:block_id+' => 'Bloco IPv4',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id' => 'Sub-rede',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id+' => 'Sub-rede IPv4',
	'Class:IPRequestAddressCreateV4/Attribute:range_id' => 'Intervalo',
	'Class:IPRequestAddressCreateV4/Attribute:range_id+' => 'Intervalo IPv4',
	'Class:IPRequestAddressCreateV4/Attribute:location_id' => 'Localização',
	'Class:IPRequestAddressCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:location_name' => 'Nome da Localização',
	'Class:IPRequestAddressCreateV4/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressCreateV6
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressCreateV6' => 'Requisição de Criação de Endereço IPv6',
	'Class:IPRequestAddressCreateV6+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:block_id' => 'Bloco de Sub-rede',
	'Class:IPRequestAddressCreateV6/Attribute:block_id+' => 'Bloco IPv6',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id' => 'Sub-rede',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id+' => 'Sub-rede IPv6',
	'Class:IPRequestAddressCreateV6/Attribute:range_id' => 'Intervalo',
	'Class:IPRequestAddressCreateV6/Attribute:range_id+' => 'Intervalo IPv6',
	'Class:IPRequestAddressCreateV6/Attribute:location_id' => 'Localização',
	'Class:IPRequestAddressCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:location_name' => 'Nome da Localização',
	'Class:IPRequestAddressCreateV6/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressUpdate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressUpdate' => 'Requisição de Atualização de Endereço IP',
	'Class:IPRequestAddressUpdate+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip' => 'Novo Status do IP',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved' => 'Reservado',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated' => 'Alocado',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name' => 'Novo Nome Curto',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id' => 'Novo Domínio',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name' => 'Novo Nome de Domínio',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id' => 'Novo Uso',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name' => 'Novo Nome de Uso',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressDelete
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestAddressDelete' => 'Requisição de Liberação de Endereço IP',
	'Class:IPRequestAddressDelete+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestAddressDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnet
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnet' => 'Requisição de Sub-rede',
	'Class:IPRequestSubnet+' => '',
	'Class:IPRequestSubnet:baseinfo' => 'Informações Gerais',
	'Class:IPRequestSubnet:contact' => 'Contatos',
	'Class:IPRequestSubnet:subnetinfo' => 'Informações da Sub-rede',
	'Class:IPRequestSubnet:date' => 'Datas',
));

//
// Class: IPRequestSubnetCreate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetCreate' => 'Requisição de Criação de Sub-rede',
	'Class:IPRequestSubnetCreate+' => '',
	'Class:IPRequestSubnetCreate/Attribute:name' => 'Nome',
	'Class:IPRequestSubnetCreate/Attribute:name+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet' => 'Status da Sub-rede',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved' => 'Reservada',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated' => 'Alocada',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetCreate/Attribute:type' => 'Tipo',
	'Class:IPRequestSubnetCreate/Attribute:type+' => '',
));

//
// Class: IPRequestSubnetCreateV4
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetCreateV4' => 'Requisição de Criação de Sub-rede IPv4',
	'Class:IPRequestSubnetCreateV4+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id' => 'Bloco de Sub-rede',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id+' => 'Bloco IPv4',
	'Class:IPRequestSubnetCreateV4/Attribute:mask' => 'Máscara',
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
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id' => 'Sub-rede criada',
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id' => 'Localização',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetCreateV6
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetCreateV6' => 'Requisição de Criação de Sub-rede IPv6',
	'Class:IPRequestSubnetCreateV6+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id' => 'Bloco de Sub-rede',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id+' => 'Bloco IPv6',
	'Class:IPRequestSubnetCreateV6/Attribute:mask' => 'Prefixo',
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
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id' => 'Sub-rede criada',
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id' => 'Localização',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetUpdate
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetUpdate' => 'Requisição de Atualização de Sub-rede',
	'Class:IPRequestSubnetUpdate+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id' => 'Sub-rede para atualizar',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_name' => 'Novo Nome',
	'Class:IPRequestSubnetUpdate/Attribute:new_name+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet' => 'Novo Status da Sub-rede',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved' => 'Reservada',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated' => 'Alocada',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_type' => 'Novo tipo',
	'Class:IPRequestSubnetUpdate/Attribute:new_type+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id' => 'Localização antiga',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id' => 'Nova localização',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetDelete
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPRequestSubnetDelete' => 'Requisição de Liberação de Sub-rede',
	'Class:IPRequestSubnetDelete+' => '',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id' => 'Sub-rede para liberar',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject' => 'Rejeitar',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign' => 'Atribuir',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen' => 'Reabrir',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve' => 'Processar',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close' => 'Fechar',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPConfig
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPConfig:requestinfo' => 'Configurações Padrão para Requisições de IP',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset' => 'Offset para a criação de IPs dentro de sub-redes IPv4',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset+' => '',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset' => 'Offset para a criação de IPs dentro de sub-redes IPv6',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset+' => '',
));

//
// Class: IPSubnet
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation' => 'Permitir criação automática de IP',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation+' => 'Requisições de criação de IP podem ser processadas automaticamente para esta sub-rede',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation/Value:yes' => 'Sim',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation/Value:no' => 'Não',
));

//
// Class: IPBlock
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation' => 'Permitir criação automática de sub-rede',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation+' => 'Requisições de criação de sub-rede podem ser processadas automaticamente para este bloco',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation/Value:yes' => 'Sim',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation/Value:no' => 'Não',
));

//
// Application Menu
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Menu:IPRequestManagement' => 'Helpdesk de IP',
	'Menu:IPRequestManagement+' => '',
	'Menu:IPRequestManagement:Overview' => 'Visão Geral',
	'Menu:IPRequestManagement:Overview+' => '',
	'Menu:IPRequestManagement:ShortCut' => 'Atalhos',
	'Menu:IPRequestManagement:ShortCut+' => '',
	'Menu:IPRequestManagement:Requests' => 'Requisições de IP',
	'Menu:IPRequestManagement:Requests+' => 'Listar Requisições para Objetos IP',
	'Menu:IPRequestManagement:OpenRequests' => 'Requisições de IP Abertas',
	'Menu:IPRequestManagement:OpenRequests+' => 'Listar Requisições abertas para Objetos IP',
	'Menu:IPRequestManagement:MyRequests' => 'Minhas requisições de IP',
	'Menu:IPRequestManagement:MyRequests+' => 'Requisições de IP que estão atribuídas a mim',
	'Menu:IPRequestManagement:MyOpenRequests'=> 'Minhas Requisições de IP Abertas',
	'Menu:IPRequestManagement:MyOpenRequests+'=> 'Lista de Requisições de IP Abertas que estão atribuídas a mim',
	'Menu:IPRequestManagement:New' => 'Nova Requisição de IP',
	'Menu:IPRequestManagement:New+' => 'Criar uma nova Requisição para um Objeto IP',
	'Menu:IPRequestManagement:Search' => 'Buscar Requisições de IP',
	'Menu:IPRequestManagement:Search+' => 'Buscar por Requisições de Objeto IP',
	'Menu:IPRequestManagement:Overview:Requests' => 'Requisições de IP: %1s',
	'Menu:IPRequestManagement:Overview:Requests+' => 'Listar Requisições para Objetos IP',
	'UI:IPRequestManagement:Overview:Title' => 'Painel de Gerenciamento de Requisições de IP',
	'UI:IPRequestManagement:Overview:RequestByType-last-14-days' => 'Requisições de IP dos últimos 14 dias (por tipo)',
	'UI:IPRequestManagement:Overview:Last-14-days' => 'Requisições de IP dos últimos 14 dias (por dia)',
	'UI:IPRequestManagement:Overview:OpenRequestByStatus' => 'Requisições de IP Abertas por Status',
	'UI:IPRequestManagement:Overview:OpenRequestByAgent' => 'Requisições de IP Abertas por Agente',
	'UI:IPRequestManagement:Overview:OpenRequestByType' => 'Requisições de IP Abertas por Tipo',
	'UI:IPRequestManagement:Overview:OpenRequestByCustomer' => 'Requisições abertas por organização',

//
// Management of IP requests
//
	// Implement new IP Request
	'UI:IPManagement:Action:Implement:IPRequest' => 'Processar...',
	'UI:IPManagement:Action:Implement:IPRequest:PageTitle_Object_Class' => 'Processar',
	'UI:IPManagement:Action:Implement:IPRequest:Title_Class_Object' => 'Processar - %1$s',
	'UI:IPManagement:Action:Implement:IPRequest:Button' => 'Processar',
	'UI:IPManagement:Action:Implement:IPRequest:CannotBeImplemented' => 'A requisição não pode ser processada: %1$s',

	// Automation processes
	'UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed' => 'Graças aos seus privilégios, seu ticket foi processado automaticamente. ',

	// Display details of IP Address Create
	'UI:IPManagement:Action:Details:IPRequestAddressCreate' => 'Detalhes',
	'UI:IPManagement:Action:Details:IPRequestAddressCreate+' => '',

	// Implement IP Address Create
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet' => 'A sub-rede não existe!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoAutomaticAllocationInSubnet' => 'A criação automática de IP está desabilitada para esta sub-rede!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullSubnet' => 'A sub-rede está cheia!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange' => 'O intervalo de IP está cheio!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:IPNameCollision' => 'O nome curto já existe dentro do domínio!',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp' => 'Selecione um IP livre',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:ConfirmSelectedIP' => 'O endereço %1$s já foi selecionado.',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:Confirmation' => 'O endereço %1$s foi criado com o status %2$s.',

	// Implement IP Address Update
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:NoSelectedIP' => 'Nenhum endereço IP foi selecionado!',
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:IPNameCollision' => 'O nome curto já existe dentro do domínio!',
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:Confirmation' => 'O endereço %1$s foi atualizado com o status %2$s.',

	// Implement IP Address Release
	'UI:IPManagement:Action:Implement:IPRequestAddressRelease:Confirmation' => 'O endereço %1$s foi liberado.',

	// Implement Subnet Create
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock' => 'O bloco de sub-rede não existe!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoAutomaticAllocationInBlock' => 'A criação automática de sub-rede está desabilitada para este bloco!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock' => 'Não há mais espaço no bloco para uma rede com máscara %1$s!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet' => 'Selecione uma sub-rede livre',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet' => 'A sub-rede %1$s já foi selecionada.',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:Confirmation' => 'A sub-rede %1$s foi criada com o status %2$s.',

	// Implement Subnet Update
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:NoSuchSubnet' => 'A sub-rede não existe!',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:ChangeSizeManually' => 'A mudança de máscara deve ser feita primeiro através do menu de sub-rede.',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:Confirmation' => 'A sub-rede %1$s foi atualizada com o status %2$s.',

	// Implement subnet Release
	'UI:IPManagement:Action:Implement:IPRequestSubnetRelease:Confirmation' => 'A sub-rede %1$s foi liberada.',

	// Portal actions
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV4' => 'Criação de IPv4',
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV6' => 'Criação de IPv6',
	'UI:IPManagement:Action:Portal:IPRequestAddressUpdate' => 'Atualização de IP',
	'UI:IPManagement:Action:Portal:IPRequestAddressDelete' => 'Liberação de IP',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV4' => 'Criação de Sub-rede IPv4',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV6' => 'Criação de Sub-rede IPv6',
	'UI:IPManagement:Action:Portal:IPRequestSubnetUpdate' => 'Atualização de Sub-rede',
	'UI:IPManagement:Action:Portal:IPRequestSubnetDelete' => 'Exclusão de Sub-rede',

));
