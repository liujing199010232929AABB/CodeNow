<?php
include("system/system.inc.php");
$sqlstr = "select * from tb_plan where id=".$_GET['id'];
$result=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("res",$result);
$smarty->display("grjh/show_plan.html")
?>
