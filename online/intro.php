<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
?>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript">
function chk_listen(){
	var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//Ϊ������ֵ
	if(name == ""){//�������name��ֵΪ��
		alert('ֻ�л�Ա���ܲ��Ÿ��������¼��');//�����Ի���
		return false;//����false
	}else{
		return true;//����true
	}
}
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
<body style="background-color: #f2f2f2">

<?php	
	$sql="select * from tb_audio where id=".$_GET['id'];//�����ѯ���
	$result = $pdo->prepare($sql);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	if($rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�ж��Ƿ�Ϊ��
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="w_1200" style="margin-top: 20px;margin-bottom: 20px; padding-bottom:36px;">
	<tr>
		<td width="34">&nbsp;</td><td colspan="3"><span style="font-size: 20px;color: #2bb673; border-bottom: 4px solid #2bb673; line-height: 54px; margin: 0 0 6px 0px; padding-bottom: 10px">��������</span></td>
	</tr>
	<tr><td width="34"></td><td colspan="2" height="1" bgcolor="#e5e5e5"></td></tr>
  <tr>
	<td >
	</td>
	<td align="left" valign="top" style="padding-top:30px;">
	  <table width="95%" border="0">
		<tr>
		  <td width="30%" height="300" align="left" valign="middle"><img name="news" src="<?php echo "upfiles/audio/".$rst[2]; ?>" width="280" height="362" alt="" border="0" style=" border-color:#CCCCCC; margin-top:15px; margin-left:0px; margin-bottom:15px; margin-right:0px;" /></td>
		  <td width="70%" align="left" valign="top">
		  <table border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;"><tr>
				  <td height="60" style="font-size:22px; font-weight:bolder;"><?php echo $rst[1]; ?></td>
			  </tr>
            <tr>
              <td width="280" height="50" align="left" style="font-size:18px;">���֣�<?php echo $rst[3]; ?></td>
			</tr>
			<tr>
              <td height="50" align="left" style="font-size:18px;">���ʣ�<?php echo $rst[4]; ?></div></td>
            </tr>
            <tr>
              <td height="50" align="left" style="font-size:18px;">������<?php echo $rst[5]; ?></td>
			</tr>
			<tr>
              <td height="50" align="left" style="font-size:18px;">�������ͣ�<?php echo $rst[10]; ?></td>
            </tr>
			<tr>
              <td height="50" align="left" style="font-size:18px;">���ԣ�<?php echo $rst[12]; ?></td>
            </tr>
            <tr>
              <td height="50" align="left" style="font-size:18px;">����ʱ�䣺<?php echo $rst[18]; ?></td>
            </tr></table>
		  </td>
		</tr>
		  <tr>
			  <td align="left">
				  <a href="operation.php?action=listen&id=<?php echo $rst[16]; ?>" target="_blank" onclick="return chk_listen()"><img src="images/playsong.png"></a>
				  <a href="download.php?id=<?php echo $rst[16]; ?>&action=audio" onClick="return chk_download()"><img src="images/downloadsong.png"></a>
			  </td>
		  </tr>
		<tr>
		  <td height="44" colspan="2" style="font-size:18px;">&nbsp;&nbsp;������飺</td>
		</tr>
		<tr>
		  <td colspan="2" style="font-size:14px; line-height:30px;">&nbsp;&nbsp;<?php echo $rst[14]; ?></td>
		</tr>
	  </table>
	</td>
  </tr>
</table>
<?php
}
?>