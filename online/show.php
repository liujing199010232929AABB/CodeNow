<?php
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script src="js/chk.js" language="javascript"></script>
<script type="text/javascript">
function chk_see(){
	var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//Ϊ������ֵ
	if(name == ""){//�������name��ֵΪ��
		alert('ֻ�л�Ա���ܹۿ�ӰƬ�����¼��');//�����Ի���
		return false;//����false
	}else{
		return true;//����true
	}
}
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
function chk_dot(){
	var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//Ϊ������ֵ
	if(name == ""){//�������name��ֵΪ��
		alert('ֻ�л�Ա���ܵ�裬���¼��');//�����Ի���
		return false;//����false
	}else{
		return true;//����true
	}
}
</script>
<link rel="stylesheet" href="css/style.css" />
<body>
<?php
	include "top.php";			//banner
?>
<!---->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="w_1200" style="margin-top: 12px; margin-bottom: 12px">
        <tr>
          <td height="42" align="center" valign="middle" bgcolor="" style=" font-size:16px; color:#333333;">��ѯ���</td>
        </tr>
</table>
<div style="" class="w_1200">
<?php
if(isset($_POST['action']) && $_POST['action'] == "l_found"){//���POST�������ݵ�action������ֵΪl_found
	$_SESSION['action'] = $_POST['action'];//ΪSession������ֵ
	$_SESSION['k_word'] = $_POST['k_word'];//ΪSession������ֵ
	$_SESSION['m_type'] = $_POST['m_type'];//ΪSession������ֵ
}
if(isset($_SESSION['action'])){//���Session����action��ֵ������
	if($_SESSION['m_type'] == "video"){//���Session����m_type��ֵΪvideo
		$l_sqlstr = "select * from tb_video where name like '%".$_SESSION['k_word']."%'";//�����ѯ���
		$result = $pdo->prepare($l_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		$total = $result->rowCount();//��ȡ��ѯ��¼��
		$pagesize = 3;//ÿҳ��ʾ3������
		$pages = ceil($total/$pagesize);//��ȡ��ҳ��
		$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
		$l_sqlstr = "select id,name,picture,actor,director,style,remark,address from tb_video where name like '%".$_SESSION['k_word']."%' limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
		$result = $pdo->prepare($l_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		//$number = 0;//��ʼ������
		while($l_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
			//if(($number % 3) == 0){//���������ֵ��3�ı���������б�ǩ<tr>

			//}
?>
<!--��ʾӰ������ -->
<table width="32%" border="0" cellspacing="0" cellpadding="0" style="float:left; border: 1px solid #e5e5e5; margin-right: 1%">
  <tr>
    <td width="52%" align="left" valign="middle"><a href="operation.php?action=see&id=<?php echo $l_rst[7]; ?>" target="_blank" onclick="return chk_see()"><img name="news" src="<?php echo "upfiles/video/".$l_rst[2]; ?>" width="100%" height="260" alt="" border="0" style=" border-color:#CCCCCC; margin-top:0px; margin-left:0px; margin-bottom:0px; margin-right:0px;" /></a></td>
	<td align="center" valign="middle">
	  <table width="95%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" height="35" colspan="2" style="font-size:20px;">&nbsp;&nbsp;<a href="operation.php?action=see&id=<?php echo $l_rst[7]; ?>" target="_blank" onclick="return chk_see()"><?php echo $l_rst[1]; ?></a></td>
      </tr>
      <tr>
        <td width="50" height="35" align="right" valign="middle">���ݣ�</td>
        <td><?php echo $l_rst[4]; ?></td>
      </tr>
      <tr>
        <td height="35" align="right" valign="middle">���ݣ�</td>
        <td><?php echo $l_rst[3]; ?></td>
      </tr>
      <tr>
        <td height="35" align="right" valign="middle">���ͣ�</td>
        <td><?php echo $l_rst[5]; ?></td>
      </tr>
      <tr>
        <td height="35" colspan="2" align="left" valign="middle" style="padding-left:10%;">
			<a href="operation.php?action=see&id=<?php echo $l_rst[7]; ?>" target="_blank" onclick="return chk_see()">
				<img src="images/online_icon.png" border="0" alt="���߹ۿ�" /></a>
			<a href="download.php?id=<?php echo $l_rst[7] ?>&action=video" onclick="return chk_download()">
				<img src="images/down.png" border=0 alt="����" /></a>&nbsp;
			<a href="operation.php?action=v_intro&id=<?php echo $l_rst[0]; ?>" target="_blank">
				<img src="images/show_icon.png" alt="����" border="0" /></a></td>
      </tr></table>
	</td>
  </tr>
</table>
<?php
			//if(($number %3) == 2){//���������ֵ����3����������2������н�����ǩ</tr>
			
			//}
			//$number++;//�����Լ�1
		}
?>

<?php
	}else{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="w_1200 list_music">
	<tr bgcolor="#ededed">
		<td width="14%" height="54" align="left" valign="middle" style="font-size:18px;">��������</td>
		<td width="20%" align="center" valign="middle" style="font-size:18px;">��������</td>
		<td width="20%" align="center" valign="middle" style="font-size:18px;">����</td>
		<td width="10%" align="center" valign="middle" style="font-size:18px;">�������</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">��������</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">����</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">���</td>
	</tr>
<?php
		$l_sqlstr = "select * from tb_audio where name like '%".$_SESSION['k_word']."%'";//�����ѯ���
		$result = $pdo->prepare($l_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		$total = $result->rowCount();//��ȡ��ѯ��¼��
		$pagesize = 3;//ÿҳ��ʾ3������
		$pages = ceil($total/$pagesize);//��ȡ��ҳ��
		$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
		$l_sqlstr = "select id,style,name,actor,remark,address from tb_audio where name like '%".$_SESSION['k_word']."%' limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
		$result = $pdo->prepare($l_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		while($l_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
        <tr class="list_tr" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();">
          <td height="48" align="left" valign="middle" style="font-size:14px;">��<?php echo $l_rst[1]; ?>��</td>
		  <td  align="center" valign="middle" style="font-size:14px;"><a style="color: #2bb673;" href="operation.php?action=listen&id=<?php echo $l_rst[5]; ?>" target="_blank" onclick="return chk_listen()"><?php echo $l_rst[2]; ?></a></td>
		  <td  align="center" valign="middle" style="font-size:14px;"><?php echo $l_rst[3]; ?></td>
		  <td align="center" valign="middle">
			  <a href="operation.php?action=intro&id=<?php echo $l_rst[0]; ?>" target="_blank">
			  <img src="images/music_01.png" alt="����" border="0" /></a></td>
		  <td align="center" valign="middle">
			<a href="operation.php?action=listen&id=<?php echo $l_rst[5]; ?>" target="_blank" onclick="return chk_listen()">
		  	<img src="images/music_02.png"  border="0" /></a>
			</td>
		  <td align="center" valign="middle">
			<a href="download.php?id=<?php echo $l_rst[5] ?>&action=audio" onclick="return chk_download()">
		 	 <img src="images/music_03.png" border="0" /></a>
		  </td>
		  <td  align="center" valign="middle">
			  <a href='operation.php?action=give&id=<?php echo $l_rst[0]; ?>' target="_blank" onclick="return chk_dot()">
				  <img src=images/music_04.png border="0" alt="�㲥" /></a></td>
		</tr>
<?php
		}
?>
</table>
<?php
	}
}
?>
</div>

		
<table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" style="font-size:14px; font-weight:bolder;">
		<?php
			$url = $_SERVER['QUERY_STRING'];//��ȡURL��ѯ���ַ���
			parse_str($url,$arr);//����ѯ�ַ�������������$arr��
			unset($arr['page']);//�ͷ�������pageԪ�ص�ֵ
			$url = http_build_query($arr);//����URL�ַ���
			echo "��".$page."ҳ/��".$pages."ҳ&nbsp;&nbsp;&nbsp;";//���
			if($page == 1){//�����ǰҳΪ��һҳ
				echo "��ҳ&nbsp;��һҳ&nbsp;&nbsp;&nbsp;";//���
			}else{
				echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=1'>��ҳ</a>&nbsp;";//���
				echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=".($page-1)."'>��һҳ</a>&nbsp;&nbsp;&nbsp;";	//���
			}
			if($page == $pages){//�����ǰҳΪ���һҳ
				echo "��һҳ&nbsp;βҳ";//���
			}else{
				echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=".($page+1)."'>��һҳ</a>&nbsp;";//���
				echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=".$pages."'>βҳ</a>";	//���
			}
		?>
		</td>
	</tr>
</table>		
<?php
	include "bottom.php";			//��ϵ����
?>		
	

</body>