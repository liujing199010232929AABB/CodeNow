<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include "../inc/check.php";
include "../conn/conn.php";
$u_level = $_POST['g_list'];
$sqlstr = "insert into tb_group(u_group,u_member) values('".$_POST['u_group']."','".$u_level."')";
$result = sqlsrv_query($conn,$sqlstr);
if($result)
	echo "<script>alert('�����ɹ���');location='user_group.php';</script>";
else
	echo "<script>alert('ϵͳ��æ�����Ժ�����');history.go(-1);</script>";
?>