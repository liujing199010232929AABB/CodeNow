<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include "../inc/check.php";
include "../conn/conn.php";
$u_level = $_POST['g_list'];
$sqlstr = "insert into tb_group(u_group,u_member) values('".$_POST['u_group']."','".$u_level."')";
$result = sqlsrv_query($conn,$sqlstr);
if($result)
	echo "<script>alert('操作成功！');location='user_group.php';</script>";
else
	echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
?>