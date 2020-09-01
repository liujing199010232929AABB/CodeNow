<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include "../inc/check.php";
include "../conn/conn.php";
$sqlstr = "select * from tb_controller where mana_pwd = '".$_POST['old_pwd']."'";
$result = sqlsrv_query($conn,$sqlstr);
if($rows = sqlsrv_fetch_array($result)){
	$modsql = "update tb_controller set mana_pwd = '".$_POST['new_pwd']."' where mana_pwd = '".$_POST['old_pwd']."'";
	if(sqlsrv_query($conn,$modsql))
		echo "<script>alert('密码修改成功');history.go(-1);</script>";
	else
		echo "<script>alert('密码修改失败');history.go(-1);</script>";
}else{
	echo "<script>alert('密码错误，请重新输入！');history.go(-1);</script>";
}
?>
