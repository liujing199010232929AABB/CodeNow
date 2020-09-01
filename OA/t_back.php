<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_GET['u_id'])){
	$smarty->assign("u_id",$_GET['u_id']);
	$sqlstr1 = "select l_title from tb_lyb where id = ".$_GET['u_id'];
	$record1=$admindb->ExecSQL($sqlstr1,$conn);
	$smarty->assign("l_title",$record1[0]['l_title']);
}else{
	echo "<script>alert('连接非法，请重新登录！！');location='index.php';</script>";
}
$smarty->display("zytd/t_back.html");
?>
