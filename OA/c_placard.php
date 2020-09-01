<?php

include "inc/check.php";
include("system/system.inc.php");
$sqlstr = "select * from tb_person";
$record=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("rel",$record);
$smarty->display("rsxx/c_placard.html");
?>
