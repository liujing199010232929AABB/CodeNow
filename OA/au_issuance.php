<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_SESSION['id'])){
	$a_sql = "select * from tb_iss where p_id = ".$_SESSION['id'];
	$rec=$admindb->ExecSQL($a_sql,$conn);
	$smarty->assign("rec",$rec);
}else{
	echo "<script>alert('请正确输入');history.go(-1);</script>";
}
$smarty->display("shps/au_issuance.html");
?>
