<?php

include "inc/check.php";
include("system/system.inc.php");
if(isset($_GET['id'])){
	$sqlstr = "delete from tb_superson where id = ".$_GET['id'];
	$result=$admindb->ExecSQL($sqlstr,$conn);
	if($result)
		echo "<script>alert('操作成功！');window.location.href='exc_staf.php';</script>";
	else
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}
?>