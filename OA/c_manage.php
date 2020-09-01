<?php
include "inc/check.php";
include("system/system.inc.php");
$sqlstr = "select * from tb_company";
$res=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("com",$res);
if(isset($_GET['id'])){
	$smarty->assign("com_id","true");
	$f_sql = "select * from tb_company where id = ".$_GET['id'];
	$fsql=$admindb->ExecSQL($f_sql,$conn);
	$smarty->assign("company",$fsql);
}else{
	$smarty->assign("com_id","false");
}
$smarty->display("qyxx/c_manage.html");
?>