<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_POST['id']) && isset($_POST['u_name'])){
	$sqlstr = "update tb_users set u_name='".$_POST['u_name']."',u_sex='".$_POST['u_sex']."',u_birth='".$_POST['u_birth']."',u_address = '".$_POST['u_address']."',u_tel = '".$_POST['u_tel']."',u_email = '".$_POST['u_email']."' where id = ".$_POST['id'];
	$res=$admindb->ExecSQL($sqlstr,$conn);
	if($res)
		echo "<script>alert('修改成功！');location='main.php';</script>";
	else
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}else{
	echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}
?>
