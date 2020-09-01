<?php
include "inc/check.php";
include("system/system.inc.php");
$sqlstr = "select id,u_name from tb_users";
$result=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("res",$result);
$smarty->display("qyjx/ass_read.html");
?>