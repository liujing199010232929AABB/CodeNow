<?php

include "inc/check.php";
include("system/system.inc.php");

if(isset($_POST['s_id']) && isset($_POST['s_fmonth'])){
	$fmonth = $_POST['s_fmonth'];
	$lmonth = $_POST['s_lmonth'];
	$s_id   = $_POST['s_id'];

	$sqlstr = "insert into tb_superson values('$fmonth','$lmonth','$s_id')";
	$result = $admindb->ExecSQL($sqlstr,$conn);
	if($result)
		echo "<script>alert('操作成功！');window.location.href='exc_staf.php';</script>";
	else
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}else{
		echo "<script>alert('添加内容不能为空！');history.go(-1);</script>";
}
?>