<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/func.php";//���������ļ�
	$p_type = array("jpg","jpeg","bmp","gif","png");//����ͼƬ�ļ���ʽ����
	$f_type = array("avi","rm","rmvb","wav","mp3","mpg","mp4","wmv");//������Ƶ��Ƶ�ļ���ʽ����
	$audio_path = "../upfiles\\audio";//�����ϴ���Ƶ�ļ�·��
	$video_path = "../upfiles\\video";//�����ϴ���Ƶ�ļ�·��
	$picture_path ="";//�����ϴ����ͼƬ����
	$file_path = "";//�����ϴ�����ļ�����
	/*  �ж��ϴ�ͼƬ���ͺ��ļ���С���ϴ�ͼƬ */
	if($_FILES['picture']['size'] > 0 and $_FILES['picture']['size'] < 700000){
		if(($postf = f_postfix($p_type,$_FILES['picture']['name'])) != false){//���ͼƬ��ʽ��ȷ
			$picture_path = time().".".$postf;//ʹ��time()���������ļ���
			if($_POST['action'] == "a"){//���actionֵΪaʱ��˵���ϴ�Ϊ��ƵͼƬ
				if($_FILES['picture']['tmp_name'])
					move_uploaded_file($_FILES['picture']['tmp_name'],$audio_path."\\".$picture_path);//ִ���ϴ�����
				else{
					echo "<script>alert('�ϴ�ͼƬʧ�ܣ�');history.go(-1);</script>";
					exit();
				}
			}else if($_POST['action'] == "v"){//���actionֵΪvʱ��˵���ϴ�Ϊ��ƵͼƬ
				if($_FILES['picture']['tmp_name'])
					move_uploaded_file($_FILES['picture']['tmp_name'],$video_path."\\".$picture_path);//ִ���ϴ�����
				else{
					echo "<script>alert('�ϴ�ͼƬʧ�ܣ�');history.go(-1);</script>";
					exit();
				}
			}
		}else{
			echo "<script>alert('�ϴ�ͼƬ��ʽ����111');history.go(-1);</script>";
			exit();
		}
	}else if($_FILES['picture']['size'] > 700000){
			echo "<script>alert('�ϴ�ͼƬ��С������Χ��');history.go(-1);</script>";
			exit();
	}
	else{
		$picture = "";
	}
	/******************************/
	/*  �ж��ϴ��ļ��������С���ϴ��ļ�  */
	if($_FILES['address']['size'] > 0){
		if($_POST['action'] == "v"){//�������Ƶ�ļ�
			if($_FILES['address']['size'] < 300000000){
				if(($postf = f_postfix($f_type,$_FILES['address']['name'])) != false){//����ļ���ʽ��ȷ
					$file_path = time().".".$postf;//ʹ��time()���������ļ���
					if($_FILES['address']['tmp_name'])
						move_uploaded_file($_FILES['address']['tmp_name'],$video_path."\\".$file_path);//ִ���ϴ�����
					else{
						echo "<script>alert('�ϴ��ļ�����');history.go(-1);</script>";
						exit();
					}
				}else{
					echo "<script>alert('�ϴ��ļ���ʽ����');history.back(-1);</script>";
					exit();
				}
			}else{
				echo "<script>alert('�ϴ��ļ���С����');history.go(-1);</script>";
				exit();
			}
		}else if($_POST['action'] == "a"){//�������Ƶ�ļ�
			if($_FILES['address']['size'] < 10000000){
				if(($postf = f_postfix($f_type,$_FILES['address']['name'])) != false){//����ļ���ʽ��ȷ
					$file_path = time().".".$postf;//ʹ��time()���������ļ���
					if($_FILES['address']['tmp_name'])
						move_uploaded_file($_FILES['address']['tmp_name'],$audio_path."\\".$file_path);//ִ���ϴ�����
					else{
						echo "<script>alert('�ϴ��ļ�����');history.go(-1);</script>";
						exit();
					}
				}else{
					echo "<script>alert('�ϴ��ļ���ʽ����');history.back(-1);</script>";
					exit();
				}
			}else{
				echo "<script>alert('�ϴ��ļ���С����');history.go(-1);</script>";
				exit();
			}
		}
	}else{
		echo "<script>alert('û���ϴ��ļ����ļ�����300M');history.go(-1);</script>";
		exit();
	}
	/****************/
	/*  ��ͬ����Ϣ  */
	$names = $_POST['names'];					//Ϊ������ֵ
	$grade = isset($_POST['grade'])?$_POST['grade']:"";					//Ϊ������ֵ
	$sizes = $_FILES['address']['size'];//Ϊ������ֵ
	$publisher = $_POST['publisher'];			//Ϊ������ֵ
	$actor = $_POST['actor'];//Ϊ������ֵ
	$language = $_POST['language'];//Ϊ������ֵ
	$style = $_POST['style'];//Ϊ������ֵ
	$type = $_POST['type'];//Ϊ������ֵ
	$from = $_POST['from'];//Ϊ������ֵ
	$publishtime = $_POST['publishtime'];//Ϊ������ֵ
	$news = isset($_POST['news'])?$_POST['news']:"";//Ϊ������ֵ
	$remark = $_POST['remark'];//Ϊ������ֵ
	$intro = isset($_POST['intro'])?$_POST['intro']:"";//Ϊ������ֵ
	/*****************/
	if($_POST['action'] == "v"){//����ϴ��ļ�����Ƶ�ļ�
		$director = $_POST['director'];//Ϊ������ֵ
		$marker = $_POST['marker'];//Ϊ������ֵ
		$a_sqlstr = "insert into tb_video (name,picture,sizes,grade,publisher,actor,director,marker,languages,type,style,froms,publishtime,bool,remark,property,address,username,issueDate,intro) values('$names','$picture_path','$sizes','$grade','$publisher','$actor','$director','$marker','$language','$type','$style','$from','$publishtime','$news','$remark','����Ա','$file_path','".$_SESSION['admin']."','".date("Y-m-d H:i:s")."','$intro')";//����������
	}else if($_POST['action'] == "a"){//��������ϴ��ļ�����Ƶ�ļ�
		$actortype = $_POST['actortype'];//Ϊ������ֵ
		$ci = $_POST['ci'];//Ϊ������ֵ
		$qu = $_POST['qu'];//Ϊ������ֵ
		$a_sqlstr = "insert into tb_audio (name,picture,actor,ci,qu,actortype,type,style,publisher,froms,sizes,languages,publishTime,remark,property,address,userName,issueDate) values('$names','$picture_path','$actor','$ci','$qu','$actortype','$type','$style','$publisher','$from','$sizes','$language','$publishtime','$remark','����Ա','$file_path','".$_SESSION['admin']."','".date("Y-m-d H:i:s")."')";//����������
	}else{
		echo "<script>alert('����');window.close();</script>";//�����Ի���
		exit();//�˳�����
	}
	if($pdo->exec($a_sqlstr))//���ִ�в��������Ϊ��
		echo "<script>top.opener.location.reload();alert('��ӳɹ�');window.close();</script>";//�����Ի���
	else
		echo "<script>alert('���ʧ��');history.go(-1);</script>";//�����Ի���
?>