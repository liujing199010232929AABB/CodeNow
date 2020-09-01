<?php

include "inc/check.php";
include("system/system.inc.php");
$i_sql = "update tb_iss set i_state = ".$_POST['a_state']." where id = ".$_POST['id'];
$i_rst=$admindb->ExecSQL($i_sql,$conn);
if($i_rst){
	echo "<script>alert('审核成功');window.close();</script>";
}else{
	echo "<script>alert('审核失败，稍后再试');history.go(-1);</script>";
}
?>