<?php

include "inc/check.php";			//判断用户权限
include("system/system.inc.php");	//包含类的实例化文件
$sqlstr = "delete from tb_person where id = ".$_GET['id'];	//删除tb_person表数据
$res=$admindb->ExecSQL($sqlstr,$conn);	//执行删除
if($res)
	echo "<script>alert('操作成功！');window.location.href='p_manage.php';</script>";
else
	echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";

?>