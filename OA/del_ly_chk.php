<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_GET['id'])){
	$sqlstr = "delete from tb_lyb where id = ".$_GET['id'];
	$rec=$admindb->ExecSQL($sqlstr,$conn);
	if($rec){
		echo "<script>alert('删除成功!!');location='lyb.php?u_id=5';</script>";
	}else{
		echo "<script>alert('系统繁忙,请稍后再试！！');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('请正确输入');history.go(-1);</script>";
}
?>