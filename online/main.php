<?php
	include "conn/conn.php";//�������ݿ������ļ�
	$l_sqlstr = "select * from tb_video order by id desc limit 0,4";//�����ѯ���
	$l_sqlstr1 = "select * from tb_video order by id desc limit 0,15";//�����ѯ���
	$l_sqlstr2 = "select * from tb_audio order by id desc limit 0,4";//�����ѯ���
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<!--����Ӱ��-->
	  <table width="100%" height="70" border="0" style="margin-left:0;">
	    <tr>
		  <td align="left" valign="bottom" style="font-size:22px;">��Ӱ</td>
		  <td width="10%" align="right" valign="bottom" style="padding-right:1%;"><a href="list.php?action=video" style=" font-size:14px;">����></a></td>
		</tr>
	  </table>
<?php
		$l_sqlstr4 = "select * from tb_video where downTime = (select max(downTime) from tb_video)";//�����ѯ���
		$result4 = $pdo->prepare($l_sqlstr4);//׼����ѯ
		$result4->execute();//ִ�в�ѯ
		$l_rst4=$result4->fetch(PDO::FETCH_NUM)//����ѯ������ص�����
?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:0;">
        <tr>
          <td width="440">
		  <table width="98%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
		    <tr><td><a href="operation.php?action=see&id=<?php echo $l_rst4[16]; ?>" target="_blank" onclick="return chk_see()"><img src="<?php echo "upfiles/video/".$l_rst4[2]; ?>" width="100%" height="420" /></a></td></tr>
			<tr><td height="40" valign="bottom" style="padding-left:20px; font-size:20px; color: #333333"><a href="operation.php?action=see&id=<?php echo $l_rst4[16]; ?>" target="_blank" onclick="return chk_see()"><?php echo $l_rst4[1];?></a></td></tr>
			<tr><td height="40" valign="middle" style="padding-left:20px; font-size:14px; color: #7a7a7a"><?php echo $l_rst4[14];?></td></tr>
		  </table>
		  </td>
		  <td width="54%" align="center">
		    <table width="100%" border="0">
			  <?php
		$result = $pdo->prepare($l_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		$number = 0;//��ʼ������
		while($l_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
			if(($number % 2) == 0){//���������ֵ��ż��������б�ǩ<tr>
?>
        <tr>
<?php
			}
?>
          <td width="49%" align="center">
		  <!--��ʾӰ������ -->
		  <table width="97%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" style="margin:0px 0px 8px 0px;">
		  	<tr>
				<td align="center"><a href="operation.php?action=see&id=<?php echo $l_rst[16]; ?>" target="_blank" onclick="return chk_see()"><img name="news" src="<?php echo "upfiles/video/".$l_rst[2]; ?>" width="100%" height="172" alt="" border="0" /></a></td>
			</tr>
			<tr><td height="32" valign="bottom" style="padding-left:10px; font-size:18px; color: #333333"><a href="operation.php?action=see&id=<?php echo $l_rst[16]; ?>" target="_blank" onclick="return chk_see()"><?php echo $l_rst[1];?></a></td></tr>
			<tr><td height="32" valign="middle" style="padding-left:10px; font-size:14px; color: #7a7a7a"><?php echo $l_rst[14];?></td></tr>
		  </table>
		  </td>
        <?php
			if(($number %2) != 0){//���������ֵ����ż��������н�����ǩ</tr>
?>
			</tr>
<?php			
			}
			$number++;//�����Լ�1
		}
?>
      </table>
	</td>
	</tr>
	</table>
	  
	  
<!--����-->
	  <table width="100%" height="70" border="0" style="margin-left:0%; margin-top:20px;">
	    <tr>
		  <td align="left" valign="bottom" style="font-size:22px;">����</td>
		  <td width="10%" align="right" valign="bottom" style="padding-right:1%;"><a href="list.php?action=audio" style=" font-size:14px;">����></a></td>
		</tr>
	  </table>
<?php
		$l_sqlstr6 = "select * from tb_audio where downTime = (select max(downTime) from tb_audio)";//�����ѯ���
		$result6 = $pdo->prepare($l_sqlstr6);//׼����ѯ
		$result6->execute();//ִ�в�ѯ
		$l_rst6=$result6->fetch(PDO::FETCH_NUM)//����ѯ������ص�����
?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:0%; margin-bottom:32px;">
        <tr>
          <td width="440">
		  <table width="98%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
		    <tr><td><a href="operation.php?action=listen&id=<?php echo $l_rst6[16]; ?>" target="_blank" onclick="return chk_listen()"><img src="<?php echo "upfiles/audio/".$l_rst6[2]; ?>" width="100%" height="416" /></a></td></tr>
			<tr><td height="40" valign="bottom" style="padding-left:20px; font-size:22px;color: #333333;"><a href="operation.php?action=listen&id=<?php echo $l_rst6[16]; ?>" target="_blank" onclick="return chk_listen()"><?php echo $l_rst6[1];?></a></td></tr>
			<tr><td height="40" valign="middle" style="padding-left:20px; font-size:14px  color: #7a7a7a;"><?php echo $l_rst6[14];?></td></tr>
		  </table>
		  </td>
		  <td width="54%" align="center" valign="top">
		    <table width="100%" border="0">
			  <?php
		$result2 = $pdo->prepare($l_sqlstr2);//׼����ѯ
		$result2->execute();//ִ�в�ѯ
		$number = 0;//��ʼ������
		while($l_rst2=$result2->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
			if(($number % 2) == 0){//���������ֵ��ż��������б�ǩ<tr>
?>
        <tr>
<?php
			}
?>
          <td width="50%" align="center">
		  <!--��ʾ�������� -->
		  <table width="97%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" style="margin:3px;">
		  	<tr>
				<td align="center"><a href="operation.php?action=listen&id=<?php echo $l_rst2[16]; ?>" target="_blank" onclick="return chk_listen()"><img name="news" src="<?php echo "upfiles/audio/".$l_rst2[2]; ?>" width="100%" height="172" alt="" border="0" /></a></td>
			</tr>
			<tr><td height="30" valign="bottom" style="padding-left:10px; font-size:18px;"><a href="operation.php?action=listen&id=<?php echo $l_rst2[16]; ?>" target="_blank" onclick="return chk_listen()"><?php echo $l_rst2[1];?></a></td></tr>
			<tr><td height="30" valign="middle" style="padding-left:10px; font-size:14px; color:#818181"><?php echo $l_rst2[14];?></td></tr>
		  </table>
		  </td>
        <?php
			if(($number %2) != 0){//���������ֵ����ż��������н�����ǩ</tr>
?>
			</tr>
<?php			
			}
			$number++;//�����Լ�1
		}
?>
      </table>
	</td>
	</tr>
	</table>	  

</body>
</html>
