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
<body onload="setInterval('changeimage()',3000)">
<center>
<?php
	include "top.php";				//banner
?>
<table class="w_1200" width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	</tr>
	<tr>
		<td width="" height="70" align="left" valign="middle" style="font-size:18px; padding-left:0px; font-weight: bold;">������</td>
		<td width="" align="left" style="padding-left:0px;">
		<?php
			if($_GET['action'] == "audio"){//���action����ֵ����audio
				$s_sql = "select id,name from tb_audiolist where grade = '1'";//�����ѯ���
				
			}
			else if($_GET['action'] == "video"){//���action����ֵ����video
				$s_sql = "select id,name from tb_videolist where grade = '2' and father='��Ӱ'";//�����ѯ���
			}
			else{
				$s_sql = "";//Ϊ������ֵ
			}
			if($s_sql != ""){//�������ֵ��Ϊ��
				//echo "<a href='?action=".$_GET['action']."' style='font-size:28px; margin-left:30px;'>ȫ��</a>";//�������
				echo "&nbsp;&nbsp;&nbsp;";//����ո�
				$result = $pdo->prepare($s_sql);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				while($s_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
					if(isset($_GET['style']) && $_GET['style'] == $s_rst[1]){
						echo "<a class='linkstyle' href='?action=".$_GET['action']."&style=".urlencode($s_rst[1])."'><span>".$s_rst[1]."</span></a>";//�������
						echo "&nbsp;&nbsp;&nbsp;";//����ո�
					}else{
						echo "<a class='d' href='?action=".$_GET['action']."&style=".urlencode($s_rst[1])."'><span>".$s_rst[1]."</span></a>";//�������
						echo "&nbsp;&nbsp;&nbsp;";//����ո�
					}
				}
			}
		?>
		</td>
		<td align="" valign="middle" style="font-size:18px; font-weight: bold;">������</td>
		<td width="" align="left" style="font-size:14px; padding-left:0px;">
		<?php
					if(isset($_GET['style']) && $_GET['style'] == "����"){
						echo "<a class='linkstyle' href='?action=".$_GET['action']."&style=".urlencode("����")."'><span>����</span></a>";//�������
					}else{
						echo "<a class='d' href='?action=".$_GET['action']."&style=".urlencode("����")."'><span>����</span></a>";//�������
					}
						echo "&nbsp;&nbsp;&nbsp;";//����ո�
					if(isset($_GET['style']) && $_GET['style'] == "Ӣ��"){
						echo "<a class='linkstyle' href='?action=".$_GET['action']."&style=".urlencode("Ӣ��")."'><span>Ӣ��</span></a>";//�������
					}else{
						echo "<a class='d' href='?action=".$_GET['action']."&style=".urlencode("Ӣ��")."'><span>Ӣ��</span></a>";//�������
					}
		?>
		</td>
		<td width="50%">&nbsp;</td>
	</tr>
</table>

<div class="w_1200" style="height:1px; background-color: #CCCCCC"></div>
<!-- �б�-->
<?php
	if($_GET['action'] == "video"){//���action����ֵ����video
		if(!isset($_GET['style'])){//���style����ֵδ������
			$l_sqlstr = "select * from tb_video";//�����ѯ���
			$result = $pdo->prepare($l_sqlstr);//׼����ѯ
			$result->execute();//ִ�в�ѯ
			$total = $result->rowCount();//��ȡ��ѯ��¼��
			$pagesize = 9;//ÿҳ��ʾ3������
			$pages = ceil($total/$pagesize);//��ȡ��ҳ��
			$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
			$l_sqlstr = "select id,name,picture,actor,director,style,remark,address from tb_video order by downTime desc limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
			$l_sqlstr1 = "select * from tb_video where bool = '1'";//�����ѯ���
			$result = $pdo->prepare($l_sqlstr1);//׼����ѯ
			$result->execute();//ִ�в�ѯ
			$total = $result->rowCount();//��ȡ��ѯ��¼��
			$pagesize = 9;//ÿҳ��ʾ3������
			$pages1 = ceil($total/$pagesize);//��ȡ��ҳ��
			$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
			$l_sqlstr1 = "select id,name,picture,actor,director,style,remark,address from tb_video where bool = '1' order by id limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
		}else{
			if($_GET['style'] != "����" && $_GET['style'] != "Ӣ��"){
				$l_sqlstr = "select * from tb_video where style='".$_GET['style']."'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 9;//ÿҳ��ʾ3������
				$pages = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr = "select id,name,picture,actor,director,style,remark,address from tb_video where style='".$_GET['style']."' order by downTime desc limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
				$l_sqlstr1 = "select * from tb_video where style='".$_GET['style']."' and bool = '1'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr1);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 9;//ÿҳ��ʾ3������
				$pages1 = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr1 = "select id,name,picture,actor,director,style,remark,address from tb_video where style='".$_GET['style']."' and bool = '1' order by id limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
			}else{
				$l_sqlstr = "select * from tb_video where languages='".$_GET['style']."'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 9;//ÿҳ��ʾ3������
				$pages = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr = "select id,name,picture,actor,director,style,remark,address from tb_video where languages='".$_GET['style']."' order by downTime desc limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
				$l_sqlstr1 = "select * from tb_video where languages='".$_GET['style']."' and bool = '1'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr1);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 9;//ÿҳ��ʾ3������
				$pages1 = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr1 = "select id,name,picture,actor,director,style,remark,address from tb_video where languages='".$_GET['style']."' and bool = '1' order by id limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
			}
		}
	}
	else if($_GET['action'] == "audio"){//���action����ֵ����audio
		if(!isset($_GET['style'])){//���style����ֵδ������
			$l_sqlstr = "select * from tb_audio";//�����ѯ���
			$result = $pdo->prepare($l_sqlstr);//׼����ѯ
			$result->execute();//ִ�в�ѯ
			$total = $result->rowCount();//��ȡ��ѯ��¼��
			$pagesize = 6;//ÿҳ��ʾ3������
			$pages = ceil($total/$pagesize);//��ȡ��ҳ��
			$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
			$l_sqlstr = "select id,style,name,actor,remark,address from tb_audio order by downTime desc limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���
			$l_sqlstr1 = "select * from tb_audio where bool = '1'";//�����ѯ���
			$result = $pdo->prepare($l_sqlstr1);//׼����ѯ
			$result->execute();//ִ�в�ѯ
			$total = $result->rowCount();//��ȡ��ѯ��¼��
			$pagesize = 6;//ÿҳ��ʾ3������
			$pages1 = ceil($total/$pagesize);//��ȡ��ҳ��
			$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
			$l_sqlstr1 = "select id,style,name,actor,remark,address from tb_audio where bool = '1' order by id limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���//�����ѯ���
		}else{
			if($_GET['style'] != "����" && $_GET['style'] != "Ӣ��"){
				$l_sqlstr = "select * from tb_audio where type='".$_GET['style']."'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 6;//ÿҳ��ʾ3������
				$pages = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr = "select id,style,name,actor,remark,address from tb_audio where type='".$_GET['style']."' order by downTime desc limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���//�����ѯ���
				$l_sqlstr1 = "select * from tb_audio where type='".$_GET['style']."' and bool = '1'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr1);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 6;//ÿҳ��ʾ3������
				$pages1 = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr1 = "select id,style,name,actor,remark,address from tb_audio where type='".$_GET['style']."' and bool = '1' order by id limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���//�����ѯ���
			}else{
				$l_sqlstr = "select * from tb_audio where languages='".$_GET['style']."'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 6;//ÿҳ��ʾ3������
				$pages = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr = "select id,style,name,actor,remark,address from tb_audio where languages='".$_GET['style']."' order by downTime desc limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���//�����ѯ���
				$l_sqlstr1 = "select * from tb_audio where languages='".$_GET['style']."' and bool = '1'";//�����ѯ���
				$result = $pdo->prepare($l_sqlstr1);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$total = $result->rowCount();//��ȡ��ѯ��¼��
				$pagesize = 3;//ÿҳ��ʾ3������
				$pages1 = ceil($total/$pagesize);//��ȡ��ҳ��
				$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//Ϊ��ǰҳ������ֵ
				$l_sqlstr1 = "select id,style,name,actor,remark,address from tb_audio where languages='".$_GET['style']."' and bool = '1' order by id limit ".($page-1)*$pagesize.",".$pagesize;//�����ѯ���//�����ѯ���
			}
		}
	}else{
		echo "����������";//����ַ���
		exit();//�˳�����
	}
?>
<?php
	if($_GET['action'] == "video"){//���action����ֵ����video
?>

<table class="w_1200 right_table" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr><td align="left" style="font-size:22px; padding-left:0px;">�����Ƽ�</td></tr>
</table>

<div class="w_1200" style="">
<?php
		$result = $pdo->prepare($l_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		$number = 0;//��ʼ������
		while($l_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
			//if(($number % 3) == 0){//���������ֵ��3�ı���������б�ǩ<tr>

			//}
?>
<!--��ʾӰ������ -->
<table width="32%" border="0" cellspacing="0" cellpadding="0" style="float:left; border: 1px solid #dadada; margin-right: 8px;margin-bottom: 8px">
  <tr>
	<td width="52%" align="center" valign="middle"><a href="operation.php?action=see&id=<?php echo $l_rst[7]; ?>" target="_blank" onclick="return chk_see()"><img name="news" src="<?php echo "upfiles/video/".$l_rst[2]; ?>" width="100%" height="260" alt="" border="0" style=" border-color:#CCCCCC; margin-top:0px; margin-left:0px; margin-bottom:0px; margin-right:0px;" /></a></td>
	<td align="left" valign="top">
		<table width="95%" border="0" cellspacing="0" cellpadding="0" style="margin-left: 14px">
		  <tr>
			<td align="left" height="68" colspan="2" style="font-size:20px; padding-left: 0px;"><a href="operation.php?action=see&id=<?php echo $l_rst[7]; ?>" target="_blank" onclick="return chk_see()"><?php echo $l_rst[1]; ?></a></td>
		  </tr>
		  <tr>
			<td height="35" align="left" valign="middle">���ݣ�</td>
			<td><?php echo $l_rst[4]; ?></td>
		  </tr>
		  <tr>
			<td width="50" height="35" align="left" valign="middle" style="">���ݣ�</td>
			<td ><?php echo $l_rst[3]; ?></td>
		  </tr>
		  <tr>
			<td height="35" align="left" valign="middle">���ͣ�</td>
			<td><?php echo $l_rst[5]; ?></td>
		  </tr>
		  <tr>
			<td height="35" colspan="2" align="left" valign="middle" style="padding-left:2%;">
				<a href="operation.php?action=see&id=<?php echo $l_rst[7]; ?>" target="_blank" onclick="return chk_see()"><img src="images/online_icon.png"  border="0" alt="���߹ۿ�" /></a>
				<a href="download.php?id=<?php echo $l_rst[7] ?>&action=video" onclick="return chk_download()"><img src="images/down.png"  border=0 alt="����" /></a>&nbsp;
				<a href="operation.php?action=v_intro&id=<?php echo $l_rst[0]; ?>" target="_blank"><img src="images/show_icon.png"  alt="����" border="0" /></a></td>
		  </tr>
		</table>
	</td>
  </tr>
</table>
<?php
			//if(($number %3) == 2){//���������ֵ����3����������2������н�����ǩ</tr>
			
			//}
			//$number++;//�����Լ�1
		}
?>
</div>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="right_table w_1200">
    <tr><td align="left" style="font-size:22px; padding-left:0px;">��Ƭ�׷�</td></tr>
</table>

<div class="w_1200" style="">
<?php
		$result1 = $pdo->prepare($l_sqlstr1);//׼����ѯ
		$result1->execute();//ִ�в�ѯ
		//$number = 0;//��ʼ������
		while($l_rst1=$result1->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
			//if(($number % 3) == 0){//���������ֵ��3�ı���������б�ǩ<tr>

			//}
?>
<!--��ʾӰ������ -->
<table width="32%" border="0" cellspacing="0" cellpadding="0" style="float:left; border: 1px solid #dadada; margin-right: 8px;margin-bottom: 8px">
  <tr>
    <td width="52%" align="center" valign="middle"><a href="operation.php?action=see&id=<?php echo $l_rst1[7]; ?>" target="_blank" onclick="return chk_see()"><img name="news" src="<?php echo "upfiles/video/".$l_rst1[2]; ?>" width="100%" height="260" alt="" border="0" style=" border-color:#CCCCCC; margin-top:0px; margin-left:0px; margin-bottom:0px; margin-right:0px;" /></a></td>
	<td align="left" valign="top">
		<table width="95%" border="0" cellspacing="0" cellpadding="0" style="margin-left: 14px">
		  <tr>
			<td align="left" height="68" colspan="2" style="font-size:20px;"><a href="operation.php?action=see&id=<?php echo $l_rst1[7]; ?>" target="_blank" onclick="return chk_see()"><?php echo $l_rst1[1]; ?></a></td>
		  </tr>
		  <tr>
			<td width="50" height="35" align="left" valign="middle">���ݣ�</td>
			<td><?php echo $l_rst1[4]; ?></td>
		  </tr>
		  <tr>
			<td height="35" align="left" valign="middle">���ݣ�</td>
			<td><?php echo $l_rst1[3]; ?></td>
		  </tr>
		  <tr>
			<td height="35" align="left" valign="middle">���ͣ�</td>
			<td><?php echo $l_rst1[5]; ?></td>
		  </tr>
		  <tr>
			<td height="35" colspan="2" align="left" valign="middle" style="padding-left:2%;">
				<a href="operation.php?action=see&id=<?php echo $l_rst1[7]; ?>" target="_blank" onclick="return chk_see()"><img src="images/online_icon.png" border="0" alt="���߹ۿ�" /></a>
				<a href="download.php?id=<?php echo $l_rst1[7] ?>&action=video" onclick="return chk_download()"><img src="images/down.png" border=0 alt="����" /></a>&nbsp;
				<a href="operation.php?action=v_intro&id=<?php echo $l_rst1[0]; ?>" target="_blank"><img src="images/show_icon.png" alt="����" border="0" /></a></td>
		  </tr>
		</table>
	</td>
  </tr>
</table>
<?php
			//if(($number %3) == 2){//���������ֵ����3����������2������н�����ǩ</tr>
			
			//}
			//$number++;//�����Լ�1
		}
?>
</div>
<?php
	}else{
?>

<div class="w_1200" style="height:0px; background-color: #CCCCCC"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="w_1200 list_music">
    <tr><td align="left" colspan="7" height="68" style="font-size:20px; padding-left:0px;">���Ÿ���</td></tr>
	<tr bgcolor="#ededed">
		<td width="14%" height="54" align="left" valign="middle" style="font-size:18px; padding-left: 16px">��������</td>
		<td width="20%" align="center" valign="middle" style="font-size:18px;">��������</td>
		<td width="20%" align="center" valign="middle" style="font-size:18px;">����</td>
		<td width="10%" align="center" valign="middle" style="font-size:18px;">�������</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">��������</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">����</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">���</td>
	</tr>
<?php
		$result = $pdo->prepare($l_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		while($l_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
        <tr class="list_tr" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();">
          <td height="48" align="left" valign="middle" style="font-size:14px; padding-left: 16px">��<?php echo $l_rst[1]; ?>��</td>
		  <td align="center" valign="middle" style="font-size:14px;"><a style="color: #2bb673;" href="operation.php?action=listen&id=<?php echo $l_rst[5]; ?>" target="_blank" onclick="return chk_listen()"><?php echo $l_rst[2]; ?></a></td>
		  <td align="center" valign="middle" style="font-size:14px;"><?php echo $l_rst[3]; ?></td>
		  <td align="center" valign="middle">
			  <a href="operation.php?action=intro&id=<?php echo $l_rst[0]; ?>" target="_blank">
				  <img src="images/music_01.png" alt="����" border="0" /></a></td>
		  <td align="center" valign="middle">
			<a href="operation.php?action=listen&id=<?php echo $l_rst[5]; ?>" target="_blank" onclick="return chk_listen()">
			<img src="images/music_02.png"border="0"  /></a>
		  </td>
		  <td align="center" valign="middle">
			<a href="download.php?id=<?php echo $l_rst[5] ?>&action=audio" onclick="return chk_download()">
		  	<img src="images/music_03.png" border="0"  /></a>
		  </td>
		  <td  align="center" valign="middle">
			  <a href='operation.php?action=give&id=<?php echo $l_rst[0]; ?>' target="_blank" onclick="return chk_dot()">
				  <img src=images/music_04.png border="0" alt="�㲥" /></a></td>
		</tr>
<?php
		}
?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="w_1200 list_music" style="margin-top: 16px">
    <tr><td colspan="7" height="68" align="left" style="font-size:22px; padding-left:0px;">�¸��Ƽ�</td></tr>
	<tr bgcolor="#ededed">
		<td width="14%" height="54" align="left" valign="middle" style="font-size:18px; padding-left: 16px">��������</td>
		<td width="20%" align="center" valign="middle" style="font-size:18px;">��������</td>
		<td width="20%" align="center" valign="middle" style="font-size:18px;">����</td>
		<td width="10%" align="center" valign="middle" style="font-size:18px;">�������</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">��������</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">����</td>
		<td width="12%" align="center" valign="middle" style="font-size:18px;">���</td>
	</tr>
<?php
		$result1 = $pdo->prepare($l_sqlstr1);//׼����ѯ
		$result1->execute();//ִ�в�ѯ
		while($l_rst1=$result1->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
        <tr class="list_tr" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();">
          <td height="48" align="left" valign="middle" style="font-size:14px; padding-left: 16px"">��<?php echo $l_rst1[1]; ?>��</td>
		  <td align="center" valign="middle" style="font-size:14px;"><a style="color: #2bb673;" href="operation.php?action=listen&id=<?php echo $l_rst1[5]; ?>" target="_blank"><?php echo $l_rst1[2]; ?></a></td>
		  <td align="center" valign="middle" style="font-size:14px;"><?php echo $l_rst1[3]; ?></td>
		  <td align="center" valign="middle">
			  <a href="operation.php?action=intro&id=<?php echo $l_rst1[0]; ?>" target="_blank">
				  <img src="images/music_01.png" alt="����" border="0" /></a></td>
		  <td align="center" valign="middle">

				<a href="operation.php?action=listen&id=<?php echo $l_rst1[5]; ?>" target="_blank" onclick="return chk_listen()">
		  <img src="images/music_02.png" border="0"  /></a>

</td>
		  <td align="center" valign="middle">

		<a href="download.php?id=<?php echo $l_rst1[5]; ?>&action=audio" onclick="return chk_download()">
		  <img src="images/music_03.png" border="0"  /></a>

		  </td>
		  <td  align="center" valign="middle">
			  <a href='operation.php?action=give&id=<?php echo $l_rst1[0]; ?>' target="_blank" onclick="return chk_dot()">
				  <img src=images/music_04.png border="0" alt="�㲥" /></a></td>
		</tr>
<?php
		}
?>
      </table>		
<?php
	}
?>

<!--��ҳ-->
<table class="w_1200" width="100%" height="70" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" style="font-size:14px; font-weight:bolder;">
		<?php
			$url = $_SERVER['QUERY_STRING'];//��ȡURL��ѯ���ַ���
			parse_str($url,$arr);//����ѯ�ַ�������������$arr��
			unset($arr['page']);//�ͷ�������pageԪ�ص�ֵ
			$url = http_build_query($arr);//����URL�ַ���
			$pages = $pages>$pages1?$pages:$pages1;//��ȡ���ֲ�ѯ��������ҳ��
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
		
		
		
		
		
</center>
</body>
