
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
  <tr class="top_box">
  	<td>&nbsp;</td>
    <td width="300" height="98"  style="cursor: pointer" onclick="javascript:location='index.php'"><img src="images/ball.png"></td>
	<td width="560"  valign="middle" style="padding-left:20px;">
	  <form id="found" name="found" method="post" action="show.php">
		  <select name="m_type" class="mytext" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''">
			  <option value="video" selected="selected">��Ƶ����</option>
			  <option value="audio">��������</option>
		  </select>
	    <input type="hidden" name="action" value="l_found" />
	    <input type="text"  name="k_word" id="k_word" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''" />
		<input type="image" name="query" value="" src="images/findmeeting.png" />
	  </form>
	</td>
	<td width="120" align="left"><?php if(isset($_SESSION['name']) && $_SESSION['name'] <> "") { ?><a href="operation.php?action=trans" target="_blank" class="trans">�ϴ��ļ�</a><?php } ?></td>
	<td width="220" align="left" >
		<?php
			if(isset($_SESSION['name'])){//���Session����name������
				include "conn/conn.php";//�������ݿ������ļ�
				$sql = "select grade,counts,head from tb_account where name = '".$_SESSION['name']."'";//�����ѯ���
				$result = $pdo->prepare($sql);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$rst = $result->fetch(PDO::FETCH_NUM);//����ѯ������ص�������

				$sqlstr="select Count(*) as numbers from tb_register where ToName='".$_SESSION['name']."'";//�����ѯ���
				$result = $pdo->prepare($sqlstr);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				$rs=$result->fetch(PDO::FETCH_ASSOC);//����ѯ������ص�������
				if($rs)//�������Ϊ��
					$num = $rs['numbers'];//Ϊ������ֵ
				else
					$num = 0;//Ϊ������ֵ
		?>
		<table width="100%" border="0" bgcolor="" style="position:relative;">
			<tr>
			  <td>��ӭ����<font style="color: #FF0000;"><?php echo $_SESSION['name'];?></font></td>
			  <td rowspan="3" align="center">
				  <div id="user" onmouseover="show()" onmouseout="hide()"><img src="upfiles/head/<?php echo $rst[2];?>" width="60" height="60" /></div>
				  <div id="menu" style="height:0px;" onmouseover="this.style.height='90px'" onmouseout="this.style.height='0px'">
					<div><a href="operation.php?action=s_music" style="color:#000000 " target="_blank">�鿴�����Ϣ</a></div>
					<div><a href="operation.php?action=mod_vip" target="_blank">��Ա�����޸�</a></div>
					<div><a href="#" onclick="return l_chk();" />�˳���¼</a></div>
				  </div>
			  </td>
			</tr>
			<tr>
			  <td ">�ȼ���<?php echo $rst[0];?></td>
			</tr>
			<tr>
			  <td ">�ϴ�������<?php echo $rst[1];?></td>
			</tr>
		</table>
	  
		<?php
			}else{
		?>
		<div align="center"><img width="16" src="images/logreg.png" />&nbsp;&nbsp;<span class="logregtext"><a href="login.php" style="font-size: 14px">��¼</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="operation.php?action=reg" style="font-size: 14px" target="_blank">ע��</a></span></div>
			<?php
				}
			?>
		</td>
	  <td>&nbsp;</td>
	
  </tr>
  <tr>
	  <td colspan="6" height="1" bgcolor="#e5e5e5"></td>
  </tr>

  <tr>
  	<td colspan="6" align="center" valign="top">
	<!--������-->
		<table class="nav" width="100%" height="48" cellpadding="0" cellspacing="0">
			<tr>
				<td>&nbsp;</td>
			    <td width="92" align="left" valign="middle"><a class="<?php echo !isset($_GET['action'])?'nav_cur':'d';?>" href="index.php">��ҳ</a></td>
			    <td width="92" align="left" valign="middle"><a class="<?php echo isset($_GET['action']) && $_GET['action']=='video'?'nav_cur':'d';?>" href="list.php?action=video">��Ӱ</a></td>
			    <td width="92" align="left" valign="middle"><a class="<?php echo isset($_GET['action']) && $_GET['action']=='audio'?'nav_cur':'d';?>" href="list.php?action=audio">����</a></td>
			    <td width="922">&nbsp;</td>
			    <td>&nbsp;</td>
			</tr>
		</table>
	<!-- ----------------------------------- -->
	</td>
  </tr>
  <tr>
    <td colspan="6"  bgcolor="#e5e5e5" valign="top">
		<div class="banner" style="width: 100%">
			<?php
			if(basename($_SERVER['PHP_SELF']) == 'index.php' || isset($_GET['action']) && $_GET['action'] == 'video'){
				include "conn/conn.php";//�������ݿ������ļ�
				$sql = "select id,picture,address from tb_video order by id asc limit 0,2";//�����ѯ���
				$result = $pdo->prepare($sql);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				echo "<div id='tabs'>";//����ַ���
				while($rst = $result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
					?>
					<a class="i" href="operation.php?action=see&id=<?php echo $rst[2]; ?>" target="_blank" onclick="return chk_see()"><img src="upfiles/video/<?php echo $rst[1];?>" width="100%" height="420" /></a>
					<?php
				}
				echo "</div>";
			}elseif(isset($_GET['action']) && $_GET['action'] == 'audio'){
				include "conn/conn.php";//�������ݿ������ļ�
				$sql = "select id,picture,address from tb_audio order by id asc limit 0,2";//�����ѯ���
				$result = $pdo->prepare($sql);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				echo "<div id='tabs'>";
				while($rst = $result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
					?>
					<a class="i" href="operation.php?action=listen&id=<?php echo $rst[2]; ?>" target="_blank" onclick="return chk_listen()"><img src="upfiles/audio/<?php echo $rst[1];?>" width="100%" height="100%" /></a>
					<?php
				}
				echo "</div>";
			}else{
				?>
				<div width="100%" style="height: 154px; background: url('images/login_bg.png') no-repeat center">
				</div>

				<!--<table width="100%">
					<tr>
						<td height="13" colspan="2" align="center" valign="bottom" background="images/1ine_1.jpg"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="886" height="12" align="bottom">
								<param name="movie" value="images/00.swf" />
								<param name="quality" value="high" />
								<embed src="images/00.swf" width="886" height="12" align="bottom" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
							</object></td>
					</tr>
					<tr>
						<td height="96" colspan="2" align="center" valign="top" background="images/c_banner.jpg">&nbsp;</td>
					</tr>
					<tr>
						<td height="12" colspan="2" align="center" valign="bottom" background="images/1ine_1.jpg">
							<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="886" height="12">
								<param name="movie" value="images/01.swf" />
								<param name="quality" value="high" />
								<embed src="images/01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="886" height="12"></embed>
							</object></td>
					</tr>
				</table>-->
				<?php
			}
			?>
		</div>
	</td>
  </tr>
</table>