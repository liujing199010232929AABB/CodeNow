<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_POST['a_title']) && $_POST['a_title'] != ""  && isset($_POST['a_content'])){
	$date  = date("Y-m-d H:i:s");
	$i_sql = "insert into tb_iss(i_title,i_content,i_time,i_state,p_id) values('".$_POST['a_title']."','".$_POST['a_content']."','".$date."','3','".$_SESSION['id']."')";
	$rec=$admindb->ExecSQL($i_sql,$conn);
	if($rec){
		echo "<script>alert('添加成功!!');location='au_issuance.php';</script>";
	}else{
		echo "<script>alert('系统繁忙,请稍后再试！！');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('请正确输入');history.go(-1);</script>";
}
?>
