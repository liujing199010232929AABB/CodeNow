<?php
	session_start();//����Session
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
?>
<link href="css/style.css" rel="stylesheet"/>
<script src="js/admin_js.js" language="javascript"></script>
<script type="text/javascript">
<!--
function MM_popupMsg(msg) { //v1.0
  if(confirm(msg))
     return true;
   else
     return false;
}
//-->
</script>
<table width="828" cellpadding="0" cellspacing="0">
<tr>
	<td height="12" background="images/side.jpg">&nbsp;</td>
</tr>
  <tr>
    <td height="96" colspan="2" scope="col" background="images/banner.jpg">&nbsp;</td>
  </tr>
<tr>
	<td height="12" background="images/side.jpg">&nbsp;</td>
</tr>
</table>

<table width="828" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="201" height="500" align="center" valign="top" bgcolor="#f0f0f0">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f0f0f0">
			<tr>
				<td height="33" background="images/menu.jpg">&nbsp;</td>
			</tr>
			<tr>
				<td>
<?php
	include "left.php";//�����ļ�
?>	
				</td>
			</tr>
		</table>
	</td>
    <td align="center" valign="top" bgcolor="#f0f0f0">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f0f0f0">
		<tr>
			<td height="34" align="right" valign="middle" background="images/line.jpg"> <a href="logout.php" onclick="return MM_popupMsg('�Ƿ�Ҫ�˳���¼');">�˳���¼</a></td>
		</tr>
		<tr>
			<td height="15" bgcolor="#f0f0f0">&nbsp;</td>
		</tr>
		<tr>
			<td height="427" align="center" valign="top"  style="background-image:url(images/bg.jpg); background-repeat:no-repeat; background-position:center;">
<div style="height:35px;">&nbsp;</div>
<?php
	/*  ���ݲ�ͬ�Ĳ�������ʾ��ͬ�Ĺ��ܽ���  */
	switch (isset($_GET['action'])?$_GET['action']:""){//�жϲ���action��ֵ
		case "audioList"://�������ֵΪaudioList
			include "a_list.php";//����a_list.php�ļ�
			break;//����switch���
		case "videoList"://�������ֵΪvideoList
			include "v_list.php";//����v_list.php�ļ�
			break;//����switch���
		case "audio"://�������ֵΪaudio
			include "audio.php";//����audio.php�ļ�
			break;//����switch���
		case "video"://�������ֵΪvideo
			include "video.php";//����video.php�ļ�
			break;//����switch���
		case "grade"://�������ֵΪgrade
			include "grade.php";//����grade.php�ļ�
			break;//����switch���
		case "member"://�������ֵΪmember
			include "member.php";//����member.php�ļ�
			break;//����switch���
		case "log"://�������ֵΪlog
			include "log.php";//����log.php�ļ�
			break;//����switch���
		case "manager"://�������ֵΪmanager
			include "manager.php";//����manager.php�ļ�
			break;//����switch���
		default://Ĭ��ֵ
			include "a_list.php";//����a_list.php�ļ�
			break;//����switch���
	}
?>			</td>
		</tr>
		<tr>
			<td height="15" bgcolor="#f0f0f0">&nbsp;</td>
		</tr>
	</table>
	
	</td>
   </tr>
</table>