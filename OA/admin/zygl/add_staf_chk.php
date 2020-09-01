<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include "../inc/check.php";
include "../conn/conn.php";
include "../inc/func.php";
$g_sql = "select id,u_member from tb_group where id = ".$_POST['u_group'];
$g_result = sqlsrv_query($conn,$g_sql);
$g_rows = sqlsrv_fetch_array($g_result,SQLSRV_FETCH_NUMERIC);
$g_mem = $g_rows[1].$_POST['u_name'].",";
$a_sql = "update tb_group set u_member = '".$g_mem."' where id = ".$_POST['u_group'];
sqlsrv_query($conn,$a_sql);
$sqlstr = "insert into tb_users (u_user,u_pwd,u_name,u_sex,u_birth,u_address,u_tel,u_email,u_depart,is_on) values('".$_POST['u_user']."','".$_POST['u_pwd']."','".$_POST['u_name']."','".$_POST['u_sex']."','".$_POST['u_birth']."','".$_POST['u_address']."','".$_POST['u_tel']."','".$_POST['u_email']."','".$_POST['u_depart']."',1)";
$result = sqlsrv_query($conn,$sqlstr);
re_message($result,"show_staf.php");
?>