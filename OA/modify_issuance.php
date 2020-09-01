<?php

include "inc/check.php";
include("system/system.inc.php");
$i_sql = "select * from tb_iss where id = ".$_GET['id'];
$result=$admindb->ExecSQL($i_sql,$conn);
$smarty->assign("res",$result);
$smarty->assign("re_id",$_GET['id']);
$smarty->display("shps/modify_issuance.html");
?>