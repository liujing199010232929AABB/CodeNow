<?php
	header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	$d_sqlstr = "delete from tb_manager where id = ".$_GET['id'];//����ɾ�����
	if($pdo->exec($d_sqlstr))//���ִ��ɾ�������Ϊ��
		echo "<script>alert('ɾ���ɹ�');location='main.php?action=manager';</script>";//�����Ի���
	else
		echo "<script>alert('ɾ��ʧ��');history.go(-1);</script>";//�����Ի���
?>