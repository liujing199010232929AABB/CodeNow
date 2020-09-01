<?php

include "inc/check.php";
include("system/system.inc.php");
$sqlstr = "select * from tb_company where id != 1";
$res=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("com",$res);
if(isset($_GET['id'])){	
	$f_sql = "select * from tb_company where id = ".$_GET['id'];
	$fsql=$admindb->ExecSQL($f_sql,$conn);
	$smarty->assign("company",$fsql[0]['f_content']);
}else{
	$f_sql = "select * from tb_company where id != 1 order by id desc";
	$fsql=$admindb->ExecSQL($f_sql,$conn);
	$smarty->assign("company",$fsql[0]['f_content']);
}
$smarty->display("qyxx/r_system.html");
?>
