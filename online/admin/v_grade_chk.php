<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	$v_sqlstr = "update tb_grade set price = '".$_POST['price']."' where id = ".$_POST['name'];//����������
	if($pdo->exec($v_sqlstr)==1 || $pdo->exec($v_sqlstr)==0)//���ִ�и��������Ϊ��
		echo "<script>alert('�޸ĳɹ�');top.opener.location.reload();window.close();</script>";//�����Ի���
	else
		echo "<script>alert('�޸�ʧ��');history.go(-1);</script>";//�����Ի���
?>