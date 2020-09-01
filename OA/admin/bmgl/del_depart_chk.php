<?php
    header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
    include "../inc/check.php"; //包含权限检查文件
    include "../conn/conn.php"; //包含数据库链接文件
    include "../inc/func.php";  //包含自定义函数文件
    $sqlstr = "delete from tb_depart where id = ".$_GET['id'];  //删除tb_depart表数据
    $result = sqlsrv_query($conn,$sqlstr);
    re_message($result,"show_depart.php");
?>