<?php
	include "inc/check.php";			//判断用户权限
	include("system/system.inc.php");	//包含类的实例化文件
	if(isset($_POST['p_title']) && isset($_POST['p_content'])){
		$p_title   = $_POST['p_title'];		//接收POST传递的变量
		$p_content = $_POST['p_content'];	//接收POST传递的变量
		$dates     = date("Y-m-d H:i:s");	//定义时间
		$p_type    = $_POST['p_type'];		//接收POST传递的变量
		//查找tb_person表信息
		$sqlstr    = "insert into tb_person(p_title,p_content,p_time,u_id) values('$p_title','$p_content','$dates','$p_type')";
		$result    = $admindb->ExecSQL($sqlstr,$conn);	//执行sql查询
		if($result) {
			echo "<script>alert('操作成功！');window.location.href='p_manage.php';</script>";
		}else{
			echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
		}
	}else{
		echo "<script>alert('添加内容不能为空！'););window.location.href='add_manage.php';</script>";
	}
?>
