<?php

include("inc/check.php");
include("system/system.inc.php");
//0 下班 1 上班 2 加班签到 3 加班签退 4 病假 5 事假
$sqlstr = "select * from tb_register order by id";
$rec=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("rec",$rec);
$sqlstr1 = "select id,u_name from tb_users";
$record1=$admindb->ExecSQL($sqlstr1,$conn);
$smarty->assign("uc",$record1);
$smarty->display("kqgl/manage_note.html");
?>
