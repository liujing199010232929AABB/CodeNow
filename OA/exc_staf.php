<?php

include "inc/check.php";
include("system/system.inc.php");
$sqlstr = "select * from tb_superson";
$result=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("res",$result);
if(isset($_GET['cont'])){
	$super_sql = 'select * from tb_superson where id = '.$_GET['cont'];
	$super     = $admindb->ExecSQL($super_sql,$conn);
	$super_names  = $super[0]['s_id'];
	if(!$super_names){
		$super_names = '无';
	}
	$smarty->assign("cont",$super_names);
}else{
	$smarty->assign("cont","优秀员工");
}
$smarty->display("qyjx/exc_staf.html");
?>