<?php
session_start();
header('Content-Type:text/html; charset=UTF-8');
ini_set('date.timezone', 'Asia/Shanghai');
require_once 'library/SmartyConfig.php';
require_once 'library/ConnDB.php';
require_once 'library/AdminDB.php';
require_once 'library/PageDB.php';
require_once 'library/Cart.php';
require_once 'library/Util.php';
require_once 'library/InitAction.php';

$arrayIni = parse_ini_file('library/lzhConfig.ini');
$connDB = new ConnDB($arrayIni['dbType'], $arrayIni['host'], $arrayIni['userName'], $arrayIni['password'], $arrayIni['dbName']);
$connID = $connDB->getConnID();

$adminDB = new AdminDB();
$pageDB = new PageDB();
$smarty = new SmartyConfig();

$util = new Util();
$smarty->register_object('util', $util, null, false);


/*********************需在页面最下加上如下语句*****************************
 * $connDB->closeConnID();
***************************************************************************/