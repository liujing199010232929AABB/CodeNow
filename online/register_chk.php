<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	
	include "inc/func.php";//���������ļ�
	$p_type = array("jpg","jpeg","bmp","gif","png");//����ͼƬ��ʽ����
	$head_path = "upfiles\\head";//�����ϴ�ͷ���ļ�·��
	$picture_path ="";//��ʼ������
	$file_path = "";//��ʼ������
	/*  �ж��ϴ�ͼƬ���ͺ��ļ���С���ϴ�ͼƬ */
	if(isset($_FILES['head']) && $_FILES['head']['size'] > 0 and $_FILES['head']['size'] < 700000){
		if(($postf = f_postfix($p_type,$_FILES['head']['name'])) != false){
			$picture_path = time().".".$postf;
			if($_FILES['head']['tmp_name'])
				move_uploaded_file($_FILES['head']['tmp_name'],$head_path."\\".$picture_path);
			else{
				echo "<script>alert('�ϴ�ͼƬʧ�ܣ�');history.go(-1);</script>";
				exit();
			}
		}else{
			echo "<script>alert('�ϴ�ͼƬ��ʽ����');history.go(-1);</script>";
			exit();
		}
	}else if(isset($_FILES['head']) && $_FILES['head']['size'] > 700000){
			echo "<script>alert('�ϴ�ͼƬ��С������Χ��');history.go(-1);</script>";
			exit();
	}
	else{
		$picture_path = "default.png";
	}
	
	
	
	$c_sql = "select * from tb_account where name = '".$_POST['name']."'";//�����ѯ���
	$result = $pdo->prepare($c_sql);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	$c_rst=$result->fetch(PDO::FETCH_ASSOC);//����ѯ������ص�����
	if($c_rst){//�������Ϊ��
		if($c_rst['name']!=""){//���name�ֶε�ֵ��Ϊ��
			echo "<script>alert('�û����ظ�������������');history.go(-1);</script>";//�����Ի���
			exit();//�˳�����
		}
	}
	if(isset($_POST['regi'])){//������ݵ�regi������ֵ
	$sqlstr = "insert into tb_account(name,password,question,answer,sex,age,job,email,address,qq,head) values ('".$_POST['name']."','".$_POST['password']."','".$_POST['question']."','".$_POST['answer']."','".$_POST['sex']."',".(empty($_POST['age'])?0:$_POST['age']).",'".$_POST['job']."','".$_POST['email']."','".$_POST['address']."','".$_POST['qq']."','".$picture_path."')";//����������
	if(!$pdo->exec($sqlstr)){//���ִ�����Ľ��Ϊ��
		echo "<script>alert('��Ӵ���".$pdo->errorInfo()."');history.go(-1);</script>";//�����Ի���
	}
	else{
		echo "<script>alert('��ϲ,�û�ע��ɹ�.�����µ�¼');window.close();</script>";//�����Ի���
	}}
	else{
		echo "<script>alert('!@#$$#@!@#,�Ƿ���¼');window.close();</script>";//�����Ի���
	}
?>