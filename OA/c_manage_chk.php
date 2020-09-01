<?php

include "inc/check.php";
include("system/system.inc.php");
if(isset($_GET['action']) && $_GET['action'] == "del"){
	if($_GET['id'] == 1){
		echo "<script>alert('公司简介不允许删除');history.go(-1);</script>";
	}else{
		$del_sql = "delete from tb_company where id = ".$_GET['id'];
		$res=$admindb->ExecSQL($del_sql,$conn);
		if($res)
			echo "<script>alert('操作成功！');window.location.href='c_manage.php';</script>";
		else
			echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
	}
}
if(isset($_POST['action']) && $_POST['action'] == "add"){
	$f_name    = $_POST['u_title'];
	$f_content = $_POST['u_content'];
	$add_sql   = "insert into tb_company(f_name,f_content) values('$f_name','$f_content')";
	$res=$admindb->ExecSQL($add_sql,$conn);
	if($res)
		echo "<script>alert('操作成功！');window.location.href='c_manage.php';</script>";
	else
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
		
}else if(isset($_POST['action']) && $_POST['action'] == "modify"){
	$id        = $_POST['id'];
	$f_name    = $_POST['u_title'];
	$f_content = $_POST['u_content'];
	$md_sql    = "update tb_company set f_name = '$f_name',f_content = '$f_content' where id = '$id' ";
	$res       = $admindb->ExecSQL($md_sql,$conn);
	if($res)
		echo "<script>alert('操作成功！');window.location.href='c_manage.php';</script>";
	else
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}else{
		echo "<script>alert('非法连接，请登录');location='index.php';</script>";
}
?>