<?php

include "inc/check.php";
include("system/system.inc.php");
$sqlstr = "select * from tb_company where id = 1";
$res=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("company_info",$res[0]['f_content']);
$smarty->display("qyxx/company_info.html");
?>

