<?php

include("inc/check.php");			//包含权限文件
include("system/system.inc.php");	//包含类的实例化文件
//更改tb_setup表的l_time字段
if(isset($_POST['u_logo'])){
	$sqlstr = "update tb_setup set l_time ='".$_POST['l_time1']."' where id = 1";
}else if(isset($_POST['d_logo'])){
	$sqlstr = "update tb_setup set l_time ='".$_POST['l_time2']."' where id = 2";
}else if(isset($_POST['a_logo'])){
	$sqlstr = "update tb_setup set l_time ='".$_POST['l_time3']."' where id = 3";
}else if(isset($_POST['q_logo'])){
	$sqlstr = "update tb_setup set l_time ='".$_POST['l_time4']."' where id = 4";
}else{
	echo "<script>alert('非法登录');window.close();</script>";
}
$result=$admindb->ExecSQL($sqlstr,$conn);	//执行更新语句
if($result)
	echo "<script>alert('设置成功');window.close();</script>";
else
	echo "<script>alert('设置失败');window.close();</script>";
?>

