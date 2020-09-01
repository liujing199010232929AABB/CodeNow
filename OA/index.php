<?php
include("system/system.inc.php");
$result=$admindb->ExecSQL("select * from tb_group",$conn);
$smarty->assign("gro",$result);
$smarty->display("index.html");
?>