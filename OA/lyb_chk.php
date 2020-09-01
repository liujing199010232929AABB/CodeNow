<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_POST['l_title']) and isset($_POST['l_content'])){
	$date=date("Y-m-d H:i:s");
	$l_sql = "insert into tb_lyb(l_title,l_content,l_time,is_replay,r_back)values('".$_POST['l_title']."','".$_POST['l_content']."','".$date."','0','')";
	$res=$admindb->ExecSQL($l_sql,$conn);
	if($res){
		echo "<script>alert('成功!!');location='lyb.php?u_id=5';</script>";
	}else{
		echo "<script>alert('系统繁忙,请稍后再试！！');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('非法操作，请重新登录！');location='index.php';</script>";
}
?>