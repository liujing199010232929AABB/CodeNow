<?php
include "inc/check.php";			//判断用户权限
include("system/system.inc.php");	//包含类的实例化文件

$p_title   = $_POST['p_title'];		//接收post传递的参数
$p_content = $_POST['p_content'];	//接收post传递的参数
$dates     = date("Y-m-d H:i:s");	//获取时间
$p_type    = $_POST['p_type'];		//接收post传递的参数
//查找tb_person表
$sqlstr    = "update tb_person set p_title = '$p_title',p_content = '$p_content',p_time = '$dates' ,u_id = '$p_type'   where id = ".$_POST['id'];
$res=$admindb->ExecSQL($sqlstr,$conn);
if($res)
	echo "<script>alert('操作成功！');window.location.href='p_manage.php';</script>";
else
	echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
?>