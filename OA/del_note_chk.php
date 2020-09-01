<?php

include("inc/check.php");
include("system/system.inc.php");
$del_sql = "delete from tb_register";
$rec=$admindb->ExecSQL($del_sql,$conn);
if($rec){
	echo "<script>alert('删除成功!!');location='manage_note.php';</script>";
}else{
	echo "<script>alert('系统繁忙,请稍后再试！！');history.go(-1);</script>";
}
?>