<?php
include "../inc/check.php";
include "../conn/conn.php";
include "../inc/func.php";
//��ȡ�û��ʺ�
$fields = read_field($conn,"tb_users","u_name",$_GET['id']);
/*ɾ���û�*/
$sqlstr = "delete from tb_users where id = ".$_GET['id'];
$result = sqlsrv_query($conn,$sqlstr);
/*******************************/
/*ɾ��group�������Ӧ���û�*/
$l_sqlstr = "select * from tb_group";
$l_result = sqlsrv_query($conn,$l_sqlstr);
while($l_rows = sqlsrv_fetch_array($l_result,SQLSRV_FETCH_NUMERIC)){
	/* �����û����б� */
	$l_list = split(",",$l_rows[2]);
	$new_fields = "";
	for($num = 0; $num < (count($l_list) -1); $num++){
		if($fields != $l_list[$num]){
			$new_fields .= $l_list[$num].",";
		}
	}
	$n_sqlstr = "update tb_group set u_member = '".$new_fields."' where id = ".$l_rows[0];
	sqlsrv_query($conn,$n_sqlstr);
}
/******************************/
if($result)
	echo "<script>alert('ɾ���ɹ���');location='show_staf.php';</script>";
else
	echo "<script>alert('ϵͳ��æ�����Ժ�����');history.go(-1);</script>";
?>