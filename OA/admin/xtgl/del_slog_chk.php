<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include "../inc/check.php"; //包含权限检查文件
include "../inc/func.php";  //包含自定义函数文件
c_log();                    //调用自定义函数
echo "<script>alert('删除成功！');lcation='data_stock.php';</script>";
?>