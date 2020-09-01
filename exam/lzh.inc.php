<?php
session_start();//启动Session
header('Content-Type:text/html; charset=UTF-8');//设置页面编码格式
ini_set('date.timezone', 'Asia/Shanghai');//设置时区
require_once 'library/SmartyConfig.php';//包含Smarty配置类文件
require_once 'library/ConnDB.php';//包含数据库连接类文件
require_once 'library/AdminDB.php';//包含数据库操作类文件
require_once 'library/PageDB.php';//包含分页类文件
require_once 'library/Util.php';//包含常用方法类文件
require_once 'library/InitAction.php';//包含基类文件

$arrayIni = parse_ini_file('library/lzhConfig.ini');
//实例化数据库连接类
$connDB = new ConnDB($arrayIni['dbType'], $arrayIni['host'], $arrayIni['userName'], $arrayIni['password'], $arrayIni['dbName']);
$connID = $connDB->getConnID();//执行数据库连接操作

$adminDB = new AdminDB();//实例化数据库操作类
$pageDB = new PageDB();//实例化分页类
$smarty = new SmartyConfig();//实例化Smarty配置类

$util = new Util();//实例化常用方法类
$smarty->register_object('util', $util, null, false);


/*********************需在页面最下加上如下语句*****************************
 * $connDB->closeConnID();
***************************************************************************/




