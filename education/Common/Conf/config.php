<?php
return array(
	'CREAT_HTML' => false, /////////生成静态页面总开关
	'DEFAULT_FILTER' => 'htmlspecialchars', //系统默认的变量过滤机制等同于 htmlspecialchars($_GET)
	'LOAD_EXT_CONFIG' => array(   // 加载扩展配置文件，扩展文件放在同级目录下
		'db',
		'DIR'=>'',
		'VALID_INDEX'=>'valid_index',
		'VALID_ADMIN'=>'valid_admin',
		'UPLOAD_CONFIG'=>'upload_config',
	),
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin','Cn','En','Cnm','Enm'), //允许访问模块
	'URL_MODULE_MAP'       =>    array('cn'=>'home'),//设置模块映射，模块映射的模块必须使用小写定义
	'DEFAULT_MODULE'       =>    'Cn',//默认模块
);