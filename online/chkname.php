<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	include "conn/conn.php";//�������ݿ������ļ�
	if(!isset($_GET['name']) or $_GET['name'] == ""){//�ж��Ƿ�������name����
		echo "<font color='red'>�Ƿ��û���!</font>";//����ַ���
		exit();//�˳�����
	}
	$c_sql = "select * from tb_account where name='".$_GET['name']."'";//�����ѯ���
	$result = $pdo->prepare($c_sql);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	$rs = $result->fetch(PDO::FETCH_ASSOC);//����ѯ������ص�����
	if($rs['name']!=""){//���name�ֶ�ֵ��Ϊ��
		echo "<font color='red'>�û�����ռ��!</font>";//����ַ���
		exit();//�˳�����
	}else{
		echo "<font color='green'>��ϲ�������û�������!</font>";//����ַ���
		exit();//�˳�����
	}
?>
