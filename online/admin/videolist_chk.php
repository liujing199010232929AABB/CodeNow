<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/func.php";//���������ļ�
	if(is_chk("name","tb_videolist",$_POST['names']) == false){//�ж���������������ݱ��е�ֵ�Ƿ��ظ�
		echo "<script>alert('�����ظ�');history.go(-1);</script>";//�����Ի���
		exit();//�˳�����
	}
	$father = isset($_POST['father'])?$_POST['father']:"";//Ϊ������ֵ
	$a_sqlstr = "insert into tb_videolist (grade,name,father,userName,issueDate) values('".$_POST['grade']."','".$_POST['names']."','".$father."','".$_SESSION['admin']."','".date("Y-m-d H:i:s")."')";//����������
	if(!$pdo->exec($a_sqlstr))//���ִ�в��������Ϊ��
		echo "<script>alert('���ʧ��');history.go(-1);</script>";//�����Ի���
	else
		echo "<script>top.opener.location.reload();alert('��ӳɹ�');window.close();</script>";//�����Ի���
	
?>