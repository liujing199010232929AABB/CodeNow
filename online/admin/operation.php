<?php
	session_start();//����Session
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
?>
<link href="css/style.css" rel="stylesheet"/>
<script src="js/admin_js.js" language="javascript"></script>
<center>
<table>
	<tr>
		<td width="665" height="164" background="images/ball.jpg">&nbsp;</td>
	</tr>
</table>
<?php
	switch ($_GET['action']){//�жϲ���action��ֵ
		case "audiolist":					//�����ƵĿ¼
			include "audiolist.php";//�������ļ�
			break;//����switch���
		case "videolist":					//�����ƵĿ¼
			include "videolist.php";//�������ļ�
			break;//����switch���
		case "audioadd":					//�����Ƶ
			include "audioadd.php";//�������ļ�
			break;//����switch���
		case "videoadd":					//�����Ƶ
			include "videoadd.php";//�������ļ�
			break;//����switch���
		case "v_grade":						//��Ա��������
			include "v_grade.php";//�������ļ�
			break;//����switch���
		case "v_found":						//��Ա��ѯ
			include "v_found.php";//�������ļ�
			break;//����switch���
		case "freeze":						//�����ʺ�
			include "freeze.php";//�������ļ�
			break;//����switch���
		case "l_found":						//��ѯ��־
			include "l_found.php";//�������ļ�
			break;//����switch���
		case "addmanager":					//��ӹ���Ա
			include "addmanager.php";	//�������ļ�	 
			break;//����switch���
		case "audio":						//��Ƶ����
?>
		<iframe src="intro.php?id=<?php echo $_GET['id']; ?>" width="665" height="700" scrolling="no"></iframe>
<?php
		break;//����switch���
	case "video":							//��Ƶ����
?>
		<iframe src="v_intro.php?id=<?php echo $_GET['id']; ?>" width="665" height="700" scrolling="no"></iframe>
<?php
		break;//����switch���
		case "see"://������Ƶ�ļ�
?>
			<iframe src="see.php?id=<?php echo $_GET['id']; ?>" width="665" height="530" scrolling="no" frameborder="0" align="middle"></iframe>
<?php
			break;//����switch���
		case "listen"://������Ƶ�ļ�
?>
			<iframe src="listen.php?id=<?php echo $_GET['id']; ?>" width="665" height="530" scrolling="no" frameborder="0" align="middle"></iframe>
<?php
			break;//����switch���
}
?>
</center>