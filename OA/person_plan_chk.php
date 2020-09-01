<?php

include "inc/check.php";
include("system/system.inc.php");
if(isset($_POST['p_content']) && isset($_POST['p_date'])){
	$sqlstr = "insert into tb_plan(p_plan,p_type,p_id,p_time) values('".$_POST['p_content']."','".$_POST['p_type']."','".$_SESSION['id']."','".$_POST['p_date']."')";
	$result = $admindb->ExecSQL($sqlstr,$conn);
	if($result){
		echo "<script>alert('操作成功！');window.location.href='main.php';</script>";
	}else{
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('添加内容不能为空！');window.location.href='add_manage.php';</script>";
}
?>
