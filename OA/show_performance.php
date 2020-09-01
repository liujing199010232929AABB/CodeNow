<?php
include("system/system.inc.php");
if(isset($_GET['action']) && $_GET['action'] == "t"){
	$sqlstr = "select * from tb_plan where (p_type = 7 or p_type = 8) and p_id = ".$_GET['p_id'];
}else if(isset($_GET['action']) && $_GET['action'] == "m"){
	$sqlstr = "select * from tb_plan where (p_type>=9 and  p_type <= 11) and p_id = ".$_GET['p_id'];
}

$result = $admindb->ExecSQL($sqlstr,$conn);

$smarty->assign("res",$result);
$smarty->display("qyjx/show_performance.html");
?>