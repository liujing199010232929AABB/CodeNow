<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/func.php";//���������ļ�
	include "inc/chec.php";//�����û�Ȩ���ļ�
	$p_type = array("jpg","jpeg","bmp","gif");//����ͼƬ��ʽ����
	$f_type = array("avi","rm","rmvb","wav","mp3","mpg","mp4","wmv");//������Ƶ��Ƶ��ʽ����
	$audio_path = "upfiles\\audio";//������Ƶ�ļ�·��
	$video_path = "upfiles\\video";//������Ƶ�ļ�·��
	$picture_path ="";//��ʼ������
	$file_path = "";//��ʼ������
	/*  �ж��ϴ�ͼƬ���ͺ��ļ���С���ϴ�ͼƬ */
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0 and $_FILES['picture']['size'] < 700000){
		if(($postf = f_postfix($p_type,$_FILES['picture']['name'])) != false){
			$picture_path = time().".".$postf;
			if($_POST['action'] == "a"){
				if($_FILES['picture']['tmp_name'])
					move_uploaded_file($_FILES['picture']['tmp_name'],$audio_path."\\".$picture_path);
				else{
					echo "<script>alert('�ϴ�ͼƬʧ�ܣ�');history.go(-1);</script>";
					exit();
				}
			}else if($_POST['action'] == "v"){
				if($_FILES['picture']['tmp_name'])
					move_uploaded_file($_FILES['picture']['tmp_name'],$video_path."\\".$picture_path);
				else{
					echo "<script>alert('�ϴ�ͼƬʧ�ܣ�');history.go(-1);</script>";
					exit();
				}
			}
		}else{
			echo "<script>alert('�ϴ�ͼƬ��ʽ����');history.go(-1);</script>";
			exit();
		}
	}else if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 700000){
			echo "<script>alert('�ϴ�ͼƬ��С������Χ��');history.go(-1);</script>";
			exit();
	}
	else{
		$picture = "";
	}
	/******************************/
	/*  �ж��ϴ��ļ��������С���ϴ��ļ�  */
	if(isset($_FILES['address']) && $_FILES['address']['size'] > 0){
		//�������Ƶ�ļ�
		if($_POST['action'] == "v"){
			if($_FILES['address']['size'] < 300000000){
				if(($postf = f_postfix($f_type,$_FILES['address']['name'])) != false){
					$file_path = time().".".$postf;
					if($_FILES['address']['tmp_name'])
						move_uploaded_file($_FILES['address']['tmp_name'],$video_path."\\".$file_path);
					else{
						echo "<script>alert('�ϴ��ļ�����');history.go(-1);</script>";
						exit();
					}
				}
				else{
					echo "<script>alert('�ϴ��ļ���ʽ����');history.back(-1);</script>";
					exit();
				}
			}else{
				echo "<script>alert('�ϴ��ļ���С����');history.go(-1);</script>";
				exit();
			}
		}
		//�������Ƶ�ļ�
		else if($_POST['action'] == "a"){
			if($_FILES['address']['size'] < 10000000){
				if(($postf = f_postfix($f_type,$_FILES['address']['name'])) != false){
					$file_path = time().".".$postf;
					if($_FILES['address']['tmp_name'])
						move_uploaded_file($_FILES['address']['tmp_name'],$audio_path."\\".$file_path);
					else{
						echo "<script>alert('�ϴ��ļ�����');history.go(-1);</script>";
						exit();
					}
				}
				else{
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
	$froms = $_POST['from'];//Ϊ������ֵ
	$publishtime = $_POST['publishtime'];//Ϊ������ֵ
	$news = isset($_POST['news'])?$_POST['news']:"";//Ϊ������ֵ
	$remark = $_POST['remark'];//Ϊ������ֵ
	$intro = isset($_POST['intro'])?$_POST['intro']:"";//Ϊ������ֵ
	
	/*****************/
	if($_POST['action'] == "v"){//����ϴ�������Ƶ�ļ�
		$director = $_POST['director'];//Ϊ������ֵ
		$marker = $_POST['marker'];//Ϊ������ֵ
		$a_sqlstr = "insert into tb_video (name,picture,sizes,grade,publisher,actor,director,marker,languages,type,style,froms,publishtime,bool,remark,property,address,username,issueDate,intro)  values('$names','$picture_path','$sizes','$grade','$publisher','$actor','$director','$marker','$language','$type','$style','$froms','$publishtime','$news','$remark','�û�','$file_path','".$_SESSION['name']."','".date("Y-m-d H:i:s")."','$intro')";//����������
	}
	else if($_POST['action'] == "a"){//��������ϴ�������Ƶ�ļ�
		$actortype = $_POST['actortype'];//Ϊ������ֵ
		$ci = $_POST['ci'];//Ϊ������ֵ
		$qu = $_POST['qu'];//Ϊ������ֵ
		$a_sqlstr = "insert into tb_audio (name,picture,actor,ci,qu,actortype,type,style,publisher,froms,sizes,languages,publishTime,remark,property,address,userName,issueDate,bool) values('$names','$picture_path','$actor','$ci','$qu','$actortype','$type','$style','$publisher','$froms','$sizes','$language','$publishtime','$remark','�û�','$file_path','".$_SESSION['name']."','".date("Y-m-d H:i:s")."','$news')";//����������
	}
	else
	{
		echo "<script>alert('����');window.close();</script>";//�����Ի���
		exit();//�˳�����
	}
	/*  �ϴ�ͼƬ���ļ� */
		
	/***************************/

	if($pdo->exec($a_sqlstr)){//���ִ�в������Ľ��Ϊ��
		$quesql = "select id,counts from tb_account where id = ".$_SESSION['id'];//�����ѯ���
		//$querst = $conn->execute($quesql);
		$result = $pdo->prepare($quesql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		$querst=$result->fetch(PDO::FETCH_NUM);//����ѯ������ص�����
		$count = $querst[1];//Ϊ������ֵ
		$count += 1;//����ֵ�Լ�1
		$addsql = "update tb_account set counts = ".$count." where id = ".$_SESSION['id'];//����������
		if($pdo->exec($addsql)){//���ִ�и������Ľ��Ϊ��
		$_SESSION['counts'] += 1;//����ֵ�Լ�1
		echo "<script>top.opener.location.reload();alert('��ӳɹ�');window.close();history.go(-1);</script>";//�����Ի���
		exit();//�˳�����
		}
	}else{
		echo "<script>alert('���ʧ��');history.go(-1);</script>";//�����Ի���
		exit();//�˳�����
	}
?>