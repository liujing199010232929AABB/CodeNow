<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	if((trim($_POST['name']) == "") or (trim($_POST['password']) == "")){//����û����������ֵΪ��
		echo "<script>alert('�ʺŻ��������');history.go(-1);</script>";//�����Ի���
		exit();//�˳�����
	}
	$sqlstr = "select * from tb_account where name = '".$_POST['name']."' and password = '".$_POST['password']."'";//�����ѯ���
	$result = $pdo->prepare($sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	if($u_rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�ж��Ƿ�Ϊ��
		if($u_rst[13] == "0")//�����ѯ����е�18���ֶε�ֵΪ0
			echo "<script>alert('���ʺű����ᣬ�������벦��绰0431-XXXXXXXX��ѯ');history.go(-1);</script>";//�����Ի���
		else{
			$result = $pdo->prepare("select * from tb_grade");//׼����ѯ
			$result->execute();//ִ�в�ѯ
			$g_rst=$result->fetch(PDO::FETCH_NUM);//����ѯ������ص�����
			if($u_rst[11] >= (int)$g_rst[2]){//����û��ϴ���������ָ������ֵ
				$u_sql = "update tb_account set grade='�߼���Ա' where name = '".$_POST['name']."' and password = '".$_POST['password']."'";//����������
				$pdo->exec($u_sql);//ִ�����
			}
			$_SESSION['name']=$u_rst[1];//ΪSession������ֵ
			$_SESSION['id']=$u_rst[0];//ΪSession������ֵ
			$_SESSION['grades']=$u_rst[12];//ΪSession������ֵ
			$_SESSION['counts']=$u_rst[11];//ΪSession������ֵ
			echo "<script>alert('�û���¼�ɹ�!');location='index.php';</script>";//�����Ի���
		}
	}
	else{
		echo "<script>alert('�û�����������������µ�¼��');history.go(-1);</script>";//�����Ի���
	}
?>