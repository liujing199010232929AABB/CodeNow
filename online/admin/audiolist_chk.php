<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
	$father = isset($_POST['father'])?$_POST['father']:"";//Ϊ������ֵ
	$sqlstr = "select * from tb_audiolist where name = '".$_POST['names']."'";//�����ѯ��� 
	$result = $pdo->prepare($sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	$rs=$result->fetch(PDO::FETCH_ASSOC);//����ѯ������ص�������
	if($rs){//�������Ϊ��
		echo "<script>alert('��Ŀ¼���Ѵ���');history.go(-1);</script>";//�����Ի���
	}else{
		$a_sqlstr = "insert into tb_audiolist (grade,name,father,userName,issueDate) values('".$_POST['grade']."','".$_POST['names']."','".$father."','".$_SESSION['admin']."','".date("Y-m-d H:i:s")."')";//����������
		if(!$pdo->exec($a_sqlstr))//���ִ�в��������Ϊ��
			echo "<script>alert('���ʧ��');history.go(-1);</script>";//�����Ի���
		else
			echo "<script>top.opener.location.reload();alert('��ӳɹ�');window.close();</script>";//�����Ի���
	}
	
?>