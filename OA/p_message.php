<?php
include "inc/check.php";
include("system/system.inc.php");
if(isset($_GET['u_id'])){
	if($_GET['u_id'] == 18)
		$smarty->assign("rs","企业公告");
	elseif($_GET['u_id'] == 19)
		$smarty->assign("rs","活动安排");
	$sqlstr = "select * from tb_person where u_id = ".$_GET['u_id'];
	$res=$admindb->ExecSQL($sqlstr,$conn);
	$smarty->assign("res",$res);
}
$smarty->display("rsxx/p_message.html");
?>
