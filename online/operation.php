<?php
	session_start();//����Session
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" href="css/reg.css"/>
<link rel="stylesheet" href="css/style.css"/>
</head>
<script src="js/chk.js"></script>
<script src="js/createxmlhttp.js"></script>
<script type="text/javascript">
function chk_download(){
	var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//Ϊ������ֵ
	var grades = "<?php echo isset($_SESSION['grades'])?$_SESSION['grades']:"";?>";//Ϊ������ֵ
	if(name == "" || grades!="�߼���Ա"){//�������name��ֵΪ�ջ��߱���grades��ֵ����"�߼���Ա"
		alert('ֻ�и߼���Ա��¼���������');//�����Ի���
		return false;//����false
	}else{
		return true;//����true
	}
}
</script>
<body>
<center>
<?php
	include "top.php";			//banner
?>
<?php
/*  �������  */
	switch($_GET['action']){
		case "reg":					//ע��
			include "register.php";//�����ļ�
			break;
		case "s_music":				//�鿴���ϵͳ
			include "s_music.php";//�����ļ�
			break;
		case "mod_vip":				//�޸�����
			include "mod_vip.php";	//�����ļ�
			break;
		case "intro":				//��Ƶ����
?>
			<iframe src="intro.php?id=<?php echo $_GET['id']; ?>" width="100%" height="800" scrolling="auto" frameborder="0"></iframe>
<?php
			break;
		case "v_intro":				//��Ƶ����
?>
			<iframe src="v_intro.php?id=<?php echo $_GET['id']; ?>" width="100%" height="800" scrolling="auto" frameborder="0"></iframe>
<?php
			break;
		case "call":
			include "call.php";//�����ļ�
			break;
		case "trans":
			include "trans.php";//�����ļ�
			break;
		case "found":
			include "found_pwd.php";//�����ļ�
			break;
		case "see":
		echo "<script>location.href='see.php?id=".$_GET['id']."'</script>";
?>
			
<?php
			break;
		case "listen":
?>
			<iframe src="listen.php?id=<?php echo $_GET['id']; ?>" width="665" height="530" scrolling="no" frameborder="0" align="middle"></iframe>
<?php
			break;
		case "give":
?>
			<iframe src="give.php?id=<?php echo $_GET['id']; ?>" width="665" height="530" scrolling="no" frameborder="0" align="middle"></iframe>
<?php
			break;
		case "dotlisten":
?>
			<iframe src="dotlisten.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>" width="665" height="530" scrolling="no" frameborder="0" align="middle"></iframe>
<?php
		default:
			break;
	}
/**************/
?>
</center>
</body>
</html>
