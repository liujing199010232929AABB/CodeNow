<?php
include "inc/check.php";
include("system/system.inc.php");
if(isset($_GET['u_id'])){
	$p_sql  = "select * from tb_plan where p_id = ".$_SESSION['id']." and p_type = ".$_GET['u_id'];
	$result = $admindb->ExecSQL($p_sql,$conn);
	$smarty->assign("res",$result);
		$sqlstr1 = "select f_name from tb_list where id = ".$_GET['u_id'];
		$record1 = $admindb->ExecSQL($sqlstr1,$conn);
		$smarty->assign("f_na",$record1[0]['f_name']);
		$smarty->assign("u_id",$_GET['u_id']);
	$smarty->display("grjh/person_plan.html");
}else{
	echo "<script>alert('非法链接');window.location.href='index.php';</script>";
}
?>
