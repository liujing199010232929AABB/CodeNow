<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_POST['a_title']) && $_POST['a_title'] != "" and isset($_POST['a_content'])){
	$i_sql = "update tb_iss set i_title = '".$_POST['a_title']."', i_content = '".$_POST['a_content']."',i_time = '".date("Y-m-d H:i:s")."',i_state = 3 where id = ".$_POST['id'];
	$i_rst=$admindb->ExecSQL($i_sql,$conn);
	if($i_rst){
		echo "<script>alert('修改成功!!');location='au_issuance.php';</script>";
	}else{
		echo "<script>alert('系统繁忙,请稍后再试！！');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('请正确登录');location='index.php';</script>";
}
?>