<?php
	header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	
	if($_POST['whether'] == "1")//������ݹ����Ĳ���whether��ֵΪ1
		$wt = "0";//Ϊ������ֵ
	else if($_POST['whether'] == "0")//����������ݹ����Ĳ���whether��ֵΪ0
		$wt = "1";//Ϊ������ֵ
	else{
		echo "<script>alert('�Ƿ�����!');history.go(-1);</script>";//�����Ի���
		exit();//�˳�����
	}
	$o_sqlstr = "update tb_manager set whether = '".$wt."' where id = ".$_POST['id'];//����������
	if($pdo->exec($o_sqlstr)){//���ִ�и������Ľ��Ϊ��
		echo "<script>alert('�����ɹ�');location='main.php?action=manager';</script>";//�����Ի���
	}
?>