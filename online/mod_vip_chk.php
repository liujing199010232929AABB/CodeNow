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
			if($_FILES['head']['tmp_name']){
				move_uploaded_file($_FILES['head']['tmp_name'],$head_path."\\".$picture_path);
				unlink($head_path."\\".$_POST['oldhead']);
			}else{
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
		$picture_path = $_POST['oldhead'];
	}
	
	
		$password = $_POST['password'];//Ϊ������ֵ
		$sex = $_POST['sex'];//Ϊ������ֵ
		$age = $_POST['age'];//Ϊ������ֵ
		$job = $_POST['job'];//Ϊ������ֵ
		$email = $_POST['email'];//Ϊ������ֵ
		$address = $_POST['address'];//Ϊ������ֵ
		$qq = $_POST['qq'];//Ϊ������ֵ
		$up_sqlstr = "update tb_account set password = '$password',sex='$sex',age=$age,job='$job',email='$email',address='$address',qq='$qq',head='$picture_path' where id = ".$_POST['id'];//����������
	if($pdo->exec($up_sqlstr)==1 || $pdo->exec($up_sqlstr)==0){//���ִ�����Ľ��Ϊ��
		echo "<script>alert('��Ϣ�޸ĳɹ�!');window.close();</script>";//�����Ի���
	}
	else{
		echo "<script>alert('�޸Ĵ���".$pdo->errorInfo()."');history.go(-1);</script>";//�����Ի���
	}
?>