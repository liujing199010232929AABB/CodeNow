<?php
include "../inc/check.php";	//����Ȩ�޼���ļ�
include "../conn/conn.php";	//�������ݿ������ļ�
include "../inc/func.php";	//�����Զ��庯���ļ�
//�޸Ĳ��ţ�ȷ���ϼ����ź͸�����
if($_POST['u_id'] != 0){
	//��top_depart��ɸѡtop_depart�ֶ�
	$sqlstr = "select top_depart from tb_depart where id = ".$_POST['u_id'];
	$result = sqlsrv_query($conn,$sqlstr);						//�������ݿ�
	$rows   = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);	//ִ�в�ѯ
	/*��������ϼ����ţ���ȡ���ϼ����ŵĸ�����*/
	if ($rows['top_depart'] != 0)
		$top_depart = $rows['top_depart'];
	/*��������ڣ����ϼ�������Ϊ������*/
	else
		$top_depart = $_POST['u_id'];
}else
	/* ���û���ϼ����ţ���ô�ͽ�����Ϊ������*/
	$top_depart = 0;
	/*������ִ���޸Ĳ��ŵ�SQL���*/
	$sqlstr = "update tb_depart set d_name = '".$_POST['d_name']."',top_depart = ".$top_depart.", up_depart = ".$_POST['u_id'].", remark = '".$_POST['remark']."' where id = ".$_POST['id'];
	$result = sqlsrv_query($conn,$sqlstr);
	re_message($result,"show_depart.php");
?>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
