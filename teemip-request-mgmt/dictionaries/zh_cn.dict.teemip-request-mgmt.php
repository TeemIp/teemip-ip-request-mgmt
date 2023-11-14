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
									
Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequest' => 'IP地址请求',
	'Class:IPRequest+' => '',
	'Class:IPRequest/Attribute:status' => '状态',
	'Class:IPRequest/Attribute:status+' => '',
	'Class:IPRequest/Attribute:status/Value:new' => '新建',
	'Class:IPRequest/Attribute:status/Value:new+' => '',
	'Class:IPRequest/Attribute:status/Value:rejected' => '已拒绝',
	'Class:IPRequest/Attribute:status/Value:rejected+' => '',
	'Class:IPRequest/Attribute:status/Value:assigned' => '已分配',
	'Class:IPRequest/Attribute:status/Value:assigned+' => '',
	'Class:IPRequest/Attribute:status/Value:resolved' => '已处理',
	'Class:IPRequest/Attribute:status/Value:resolved+' => '',
	'Class:IPRequest/Attribute:status/Value:closed' => '已关闭',
	'Class:IPRequest/Attribute:status/Value:closed+' => '',
	'Class:IPRequest/Attribute:public_log' => '公共日志',
	'Class:IPRequest/Attribute:public_log+' => '',
	'Class:IPRequest/Attribute:user_comment' => '用户评论',
	'Class:IPRequest/Attribute:user_comment+' => '',
));

//
// Class: IPRequestAddress
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestAddress' => 'IP地址请求',
	'Class:IPRequestAddress+' => '',
	'Class:IPRequestAddress/Attribute:ip_id' => 'IP地址',
	'Class:IPRequestAddress/Attribute:ip_id+' => '',
	'Class:IPRequestAddress:baseinfo' => '基本信息',
	'Class:IPRequestAddress:contact' => '联系人',
	'Class:IPRequestAddress:ipinfo' => 'IP信息',
	'Class:IPRequestAddress:device' => '设备信息',
	'Class:IPRequestAddress:date' => '日期',
));

//
// Class: IPRequestAddressCreate
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestAddressCreate' => 'IP地址创建请求',
	'Class:IPRequestAddressCreate+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip' => 'IP地址状态',
	'Class:IPRequestAddressCreate/Attribute:status_ip+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved' => '已预留',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated' => '已分配',
	'Class:IPRequestAddressCreate/Attribute:status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressCreate/Attribute:short_name' => '简称',
	'Class:IPRequestAddressCreate/Attribute:short_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_id' => 'DNS域',
	'Class:IPRequestAddressCreate/Attribute:domain_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:domain_name' => '域名',
	'Class:IPRequestAddressCreate/Attribute:domain_name+' => 'DNS域的名称',
	'Class:IPRequestAddressCreate/Attribute:usage_id' => '用途',
	'Class:IPRequestAddressCreate/Attribute:usage_id+' => '',
	'Class:IPRequestAddressCreate/Attribute:usage_name' => '用途名称',
	'Class:IPRequestAddressCreate/Attribute:usage_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ciclass' => '目标类',
	'Class:IPRequestAddressCreate/Attribute:ciclass+' => 'IP必须关联到的CI的类',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id' => '功能CI',
	'Class:IPRequestAddressCreate/Attribute:connectableci_id+' => 'IP必须绑定的功能CI',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name' => '功能CI名称',
	'Class:IPRequestAddressCreate/Attribute:connectableci_name+' => '',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute' => 'CI的IP属性',
	'Class:IPRequestAddressCreate/Attribute:ci_ip_attribute+' => 'IP必须绑定的CI的IP属性',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link' => 'IP和CI之间的链接',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link+' => 'IP地址和功能CI之间的链接类型',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip' => '管理IP',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:managementip+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface' => '物理接口',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:physicalinterface+' => '',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface' => '逻辑接口',
	'Class:IPRequestAddressCreate/Attribute:ip_device_link/Value:logicalinterface+' => '',
));

//
// Class: IPRequestAddressCreateV4
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestAddressCreateV4' => 'IPv4地址创建请求',
	'Class:IPRequestAddressCreateV4+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:block_id' => '子网块',
	'Class:IPRequestAddressCreateV4/Attribute:block_id+' => 'IPv4块',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id' => '子网',
	'Class:IPRequestAddressCreateV4/Attribute:subnet_id+' => 'IPv4子网',
	'Class:IPRequestAddressCreateV4/Attribute:range_id' => '范围',
	'Class:IPRequestAddressCreateV4/Attribute:range_id+' => 'IPv4范围',
	'Class:IPRequestAddressCreateV4/Attribute:location_id' => '位置',
	'Class:IPRequestAddressCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV4/Attribute:location_name' => '位置名称',
	'Class:IPRequestAddressCreateV4/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign' => '分配',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close' => '关闭',
	'Class:IPRequestAddressCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestAddressCreateV6
//
 
Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestAddressCreateV6' => 'IPv6地址创建请求',
	'Class:IPRequestAddressCreateV6+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:block_id' => '子网块',
	'Class:IPRequestAddressCreateV6/Attribute:block_id+' => 'IPv6块',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id' => '子网',
	'Class:IPRequestAddressCreateV6/Attribute:subnet_id+' => 'IPv6子网',
	'Class:IPRequestAddressCreateV6/Attribute:range_id' => '范围',
	'Class:IPRequestAddressCreateV6/Attribute:range_id+' => 'IPv6范围',
	'Class:IPRequestAddressCreateV6/Attribute:location_id' => '位置',
	'Class:IPRequestAddressCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestAddressCreateV6/Attribute:location_name' => '位置名称',
	'Class:IPRequestAddressCreateV6/Attribute:location_name+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign' => '分配',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close' => '关闭',
	'Class:IPRequestAddressCreateV6/Stimulus:ev_close+' => '',
));           

//
// Class: IPRequestAddressUpdate
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestAddressUpdate' => 'IP地址更新请求',
	'Class:IPRequestAddressUpdate+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip' => '新IP状态',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved' => '已预留',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:reserved+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated' => '已分配',
	'Class:IPRequestAddressUpdate/Attribute:new_status_ip/Value:allocated+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name' => '新简称',
	'Class:IPRequestAddressUpdate/Attribute:new_short_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id' => '新域',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name' => '新域名',
	'Class:IPRequestAddressUpdate/Attribute:new_domain_name+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id' => '新用途',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_id+' => '',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name' => '新用途名称',
	'Class:IPRequestAddressUpdate/Attribute:new_usage_name+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign' => '分配',
	'Class:IPRequestAddressUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestAddressUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestAddressUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close' => '关闭',
	'Class:IPRequestAddressUpdate/Stimulus:ev_close+' => '',
));


//
// Class: IPRequestAddressDelete
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
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

//
// Class: IPRequestAddressDelete
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestAddressDelete' => 'IP地址释放请求',
	'Class:IPRequestAddressDelete+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestAddressDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign' => '分配',
	'Class:IPRequestAddressDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestAddressDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestAddressDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestAddressDelete/Stimulus:ev_close' => '关闭',
	'Class:IPRequestAddressDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnet
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestSubnet' => '子网请求',
	'Class:IPRequestSubnet+' => '',
	'Class:IPRequestSubnet:baseinfo' => '基本信息',
	'Class:IPRequestSubnet:contact' => '联系人',
	'Class:IPRequestSubnet:subnetinfo' => '子网信息',
	'Class:IPRequestSubnet:date' => '日期',
));

//
// Class: IPRequestSubnetCreate
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestSubnetCreate' => '子网创建请求',
	'Class:IPRequestSubnetCreate+' => '',
	'Class:IPRequestSubnetCreate/Attribute:name' => '名称',
	'Class:IPRequestSubnetCreate/Attribute:name+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet' => '子网状态',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved' => '已预留',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated' => '已分配',
	'Class:IPRequestSubnetCreate/Attribute:status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetCreate/Attribute:type' => '类型',
	'Class:IPRequestSubnetCreate/Attribute:type+' => '',
));

//
// Class: IPRequestSubnetCreateV4
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestSubnetCreateV4' => 'IPv4子网创建请求',
	'Class:IPRequestSubnetCreateV4+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id' => '子网块',
	'Class:IPRequestSubnetCreateV4/Attribute:block_id+' => 'IPv4块',
	'Class:IPRequestSubnetCreateV4/Attribute:mask' => '子网掩码',
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
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id' => '创建的子网',
	'Class:IPRequestSubnetCreateV4/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id' => '位置',
	'Class:IPRequestSubnetCreateV4/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign' => '分配',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close' => '关闭',
	'Class:IPRequestSubnetCreateV4/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetCreateV6
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestSubnetCreateV6' => 'IPv6子网创建请求',
	'Class:IPRequestSubnetCreateV6+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id' => '子网块',
	'Class:IPRequestSubnetCreateV6/Attribute:block_id+' => 'IPv6块',
	'Class:IPRequestSubnetCreateV6/Attribute:mask' => '前缀',
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
        'Class:IPRequestSubnetCreateV6/Attribute:subnet_id' => '子网已创建',
	'Class:IPRequestSubnetCreateV6/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id' => '位置',
	'Class:IPRequestSubnetCreateV6/Attribute:location_id+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign' => '分配',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close' => '关闭',
	'Class:IPRequestSubnetCreateV6/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetUpdate
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestSubnetUpdate' => '子网更新请求',
	'Class:IPRequestSubnetUpdate+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id' => '要更新的子网',
	'Class:IPRequestSubnetUpdate/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_name' => '新名称',
	'Class:IPRequestSubnetUpdate/Attribute:new_name+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet' => '新的子网状态',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved' => '保留',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:reserved+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated' => '已分配',
	'Class:IPRequestSubnetUpdate/Attribute:new_status_subnet/Value:allocated+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_type' => '新类型',
	'Class:IPRequestSubnetUpdate/Attribute:new_type+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id' => '旧位置',
	'Class:IPRequestSubnetUpdate/Attribute:old_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id' => '新位置',
	'Class:IPRequestSubnetUpdate/Attribute:new_location_id+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign' => '分配',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close' => '关闭',
	'Class:IPRequestSubnetUpdate/Stimulus:ev_close+' => '',
));

//
// Class: IPRequestSubnetDelete
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPRequestSubnetDelete' => '子网释放请求',
	'Class:IPRequestSubnetDelete+' => '',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id' => '要释放的子网',
	'Class:IPRequestSubnetDelete/Attribute:subnet_id+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject' => '拒绝',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reject+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign' => '分配',
	'Class:IPRequestSubnetDelete/Stimulus:ev_assign+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen' => '重新打开',
	'Class:IPRequestSubnetDelete/Stimulus:ev_reopen+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve' => '处理',
	'Class:IPRequestSubnetDelete/Stimulus:ev_resolve+' => '',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close' => '关闭',
	'Class:IPRequestSubnetDelete/Stimulus:ev_close+' => '',
));

//
// Class: IPConfig
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPConfig:requestinfo' => 'IP请求的默认设置',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset' => '在IPv4子网中创建IP的偏移量',
	'Class:IPConfig/Attribute:request_creation_ipv4_offset+' => '',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset' => '在IPv6子网中创建IP的偏移量',
	'Class:IPConfig/Attribute:request_creation_ipv6_offset+' => '',
));

//
// Class: IPSubnet
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation' => '允许自动创建IP',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation+' => '可以自动处理该子网的IP创建请求',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation/Value:yes' => '是',
	'Class:IPSubnet/Attribute:allow_automatic_ip_creation/Value:no' => '否',
));

//
// Class: IPBlock
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation' => 'Allow automatic subnet creation',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation+' => 'Subnet creation requests may be automatically processed for that block',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation/Value:yes' => '是',
	'Class:IPBlock/Attribute:allow_automatic_subnet_creation/Value:no' => '否',
));

//
// Application Menu
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Menu:IPRequestManagement' => 'IP Helpdesk',
	'Menu:IPRequestManagement+' => '',
	'Menu:IPRequestManagement:Overview' => '概览',
	'Menu:IPRequestManagement:Overview+' => '',
	'Menu:IPRequestManagement:ShortCut' => '快捷方式',
	'Menu:IPRequestManagement:ShortCut+' => '',
	'Menu:IPRequestManagement:Requests' => 'IP 请求',
	'Menu:IPRequestManagement:Requests+' => '列出 IP 对象的请求',
	'Menu:IPRequestManagement:OpenRequests' => '未处理的 IP 请求',
	'Menu:IPRequestManagement:OpenRequests+' => '列出未处理的 IP 对象请求',
	'Menu:IPRequestManagement:MyRequests' => '我的 IP 请求',
	'Menu:IPRequestManagement:MyRequests+' => '分配给我的 IP 请求',
	'Menu:IPRequestManagement:MyOpenRequests'=> '我的未处理 IP 请求',	
	'Menu:IPRequestManagement:MyOpenRequests+'=> '列出分配给我的未处理 IP 请求',	
	'Menu:IPRequestManagement:New' => '新建 IP 请求',
	'Menu:IPRequestManagement:New+' => '创建一个新的 IP 对象请求',
	'Menu:IPRequestManagement:Search' => '搜索 IP 请求',
	'Menu:IPRequestManagement:Search+' => '搜索 IP 对象请求',
	'Menu:IPRequestManagement:Overview:Requests' => 'IP 请求：%1s',
	'Menu:IPRequestManagement:Overview:Requests+' => '列出 IP 对象的请求',
	'UI:IPRequestManagement:Overview:Title' => 'IP 请求管理仪表板',
	'UI:IPRequestManagement:Overview:RequestByType-last-14-days' => '过去 14 天的 IP 请求（按类型）',
	'UI:IPRequestManagement:Overview:Last-14-days' => '过去 14 天的 IP 请求（按天数）',
	'UI:IPRequestManagement:Overview:OpenRequestByStatus' => '按状态分类的未处理 IP 请求',
	'UI:IPRequestManagement:Overview:OpenRequestByAgent' => '按服务台人员分类的未处理 IP 请求',
	'UI:IPRequestManagement:Overview:OpenRequestByType' => '按类型分类的未处理 IP 请求',
	'UI:IPRequestManagement:Overview:OpenRequestByCustomer' => '按组织分类的未处理请求',

	//
	// 管理 IP 请求
	//
	// 实施新的 IP 请求
	'UI:IPManagement:Action:Implement:IPRequest' => '处理...',
	'UI:IPManagement:Action:Implement:IPRequest:PageTitle_Object_Class' => '处理',
	'UI:IPManagement:Action:Implement:IPRequest:Title_Class_Object' => '处理 - %1$s',
	'UI:IPManagement:Action:Implement:IPRequest:Button' => '处理',
	'UI:IPManagement:Action:Implement:IPRequest:CannotBeImplemented' => '请求无法处理：%1$s',

	// 自动化流程
	'UI:IPManagement:Action:Implement:IPRequestAutomaticallyProcessed' => '感谢您的权限，您的请求已被自动处理。',

	// 显示 IP 地址创建的详细信息
	'UI:IPManagement:Action:Details:IPRequestAddressCreate' => '详细信息',
	'UI:IPManagement:Action:Details:IPRequestAddressCreate+' => '',

	// 实施 IP 地址创建
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoSuchSubnet' => '子网不存在！',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:NoAutomaticAllocationInSubnet' => '该子网禁用了自动 IP 创建！',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullSubnet' => '子网已满！',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:FullRange' => 'IP 范围已满！',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:IPNameCollision' => '域中已存在相同的短名称！',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:PickAnIp' => '选择一个空闲的 IP',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:ConfirmSelectedIP' => '地址 %1$s 已经被选中。',
	'UI:IPManagement:Action:Implement:IPRequestAddressCreate:Confirmation' => '地址 %1$s 已被创建，状态为 %2$s。',

	// 实施 IP 地址更新
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:NoSelectedIP' => '未选择 IP 地址！',
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:IPNameCollision' => '域中已存在相同的短名称！',
	'UI:IPManagement:Action:Implement:IPRequestAddressUpdate:Confirmation' => '地址 %1$s 已被更新，状态为 %2$s。',

	// 实施 IP 地址释放
	'UI:IPManagement:Action:Implement:IPRequestAddressRelease:Confirmation' => '地址 %1$s 已被释放。',

	// 实施子网创建
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSuchBlock' => '子网块不存在！',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoAutomaticAllocationInBlock' => '该块禁用了自动子网创建！',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:NoSpaceInBlock' => '该块没有足够的空间容纳 %1$s 掩码的网络！',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:PickASubnet' => '选择一个空闲的子网',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:ConfirmSelectedSubnet' => '子网 %1$s 已经被选中。',
	'UI:IPManagement:Action:Implement:IPRequestSubnetCreate:Confirmation' => '子网 %1$s 已被创建，状态为 %2$s。',

	// 实施子网更新
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:NoSuchSubnet' => '子网不存在！',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:ChangeSizeManually' => '首先应通过子网菜单更改掩码。',
	'UI:IPManagement:Action:Implement:IPRequestSubnetUpdate:Confirmation' => '子网 %1$s 已被更新，状态为 %2$s。',

	// 实施子网释放
	'UI:IPManagement:Action:Implement:IPRequestSubnetRelease:Confirmation' => '子网 %1$s 已被释放。',

	// 门户操作
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV4' => 'IPv4 创建',
	'UI:IPManagement:Action:Portal:IPRequestAddressCreateV6' => 'IPv6 创建',
	'UI:IPManagement:Action:Portal:IPRequestAddressUpdate' => 'IP 更新',
	'UI:IPManagement:Action:Portal:IPRequestAddressDelete' => 'IP 释放',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV4' => 'IPv4 子网创建',
	'UI:IPManagement:Action:Portal:IPRequestSubnetCreateV6' => 'IPv6 子网创建',
	'UI:IPManagement:Action:Portal:IPRequestSubnetUpdate' => '子网更新',
	'UI:IPManagement:Action:Portal:IPRequestSubnetDelete' => '子网删除',
));

