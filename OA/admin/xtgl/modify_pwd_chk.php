<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include "../inc/check.php";
include "../conn/conn.php";
$sqlstr = "select * from tb_controller where mana_pwd = '".$_POST['old_pwd']."'";
$result = sqlsrv_query($conn,$sqlstr);
if($rows = sqlsrv_fetch_array($result)){
	$modsql = "update tb_controller set mana_pwd = '".$_POST['new_pwd']."' where mana_pwd = '".$_POST['old_pwd']."'";
	if(sqlsrv_query($conn,$modsql))
		echo "<script>alert('�����޸ĳɹ�');history.go(-1);</script>";
	else
		echo "<script>alert('�����޸�ʧ��');history.go(-1);</script>";
}else{
	echo "<script>alert('����������������룡');history.go(-1);</script>";
}
?>
