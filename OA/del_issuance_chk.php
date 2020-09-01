<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_GET['id'])){
	$i_sql = "delete from tb_iss where id = ".$_GET['id'];
	$rec=$admindb->ExecSQL($i_sql,$conn);
	if($rec){
		echo "<script>alert('删除成功!!');location='au_issuance.php';</script>";
	}else{
		echo "<script>alert('系统繁忙,请稍后再试！！');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('请正确输入');history.go(-1);</script>";
}
?>
