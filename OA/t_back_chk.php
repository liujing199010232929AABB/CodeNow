<?php

include("inc/check.php");
include("system/system.inc.php");
if(isset($_POST['id'])){
	$sqlstr = "update tb_lyb set r_back='".$_POST['r_back']."',is_replay = 1  where id = ".$_POST['id'];
	$res    = $admindb->ExecSQL($sqlstr,$conn);
	if($res)
		echo "<script>alert('修改成功！');location='lyb.php?u_id=5';</script>";
	else
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}else{
	echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}
?>