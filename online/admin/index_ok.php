<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	$a_sqlstr = "select * from tb_manager where name= '".$_POST['manager']."'";//�����ѯ���
	$result = $pdo->prepare($a_sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	if($a_rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�жϽ���Ƿ�Ϊ��
		if($a_rst[2] != $_POST['pwd']){//�����ѯ����е�������û���������벻���
			echo "<script>alert('�û����������������');history.go(-1);</script>";//�����Ի���
			exit();//�˳�����
		}
		if($a_rst[6] == "0"){//�����7���ֶ�ֵΪ0
			echo "<script>alert('������¼���û������ᣬ����������벦��绰0431-1234****��ѯ��ϸ��Ϣ');history.go(-1)</script>";//�����Ի���
			exit();//�˳�����
		}
		$_SESSION['admin']=$a_rst[1];//ΪSession������ֵ
		$_SESSION['type']=$a_rst[3];//ΪSession������ֵ
		$_SESSION['m_id']=$a_rst[0];//ΪSession������ֵ
		echo "<script>alert('��¼�ɹ�');location='main.php';</script>";//�����Ի���
	}
	else{
		echo "<script>alert('�û����������������');history.go(-1);</script>";//�����Ի���
	}
?>