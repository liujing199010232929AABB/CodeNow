<?php
	include "conn/conn.php";//�������ݿ������ļ�
	$t_sqlstr = "select * from tb_audio order by downTime desc limit 0,7";//�����ѯ���
	$result = $pdo->prepare($t_sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	$num = 1;//��ʼ������
	$t_rst = $result->fetch(PDO::FETCH_NUM);//����ѯ������ص�������
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:36px;">
	<tr><td height="70" align="left" valign="bottom" style="font-size:22px;">�����������а�</td></tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="position:relative;margin-top: 6px;">
	<tr>
		<td height="220" align="center" colspan="3"><a href="operation.php?action=listen&id=<?php echo $t_rst[16]; ?>" target="_blank" onclick="return chk_listen()"><img width="100%" height="220" src="<?php echo "upfiles/audio/".$t_rst[2]; ?>" /></a>
		  <div style="width:18%; height:10%; line-height:350%; background-color:#2bb673; color:#FFFFFF; font-size:14px; position:absolute; top:36.5%; left:0px;">
			<?php echo $num; ?>
		  </div>
		  <div style=" font-size:16px; font-weight:bolder; color:#FFFFFF; position:absolute; top:39%; left:22%;">
			<?php echo $t_rst[1]; ?>
		  </div></td>
	</tr>
<?php
	while($t_rst = $result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
		$num++;//�����Լ�1
?>
	<tr height="42">
		<td width="36" align="center" valign="middle" class="f_td"><?php echo $num; ?></td>
		<td width="130" align="left" valign="middle" class="f_td" style="padding-left:18px"><a href="operation.php?action=listen&id=<?php echo $t_rst[16]; ?>" target="_blank" onclick="return chk_listen()"><?php echo $t_rst[1]; ?></a></td>
		<td width="25" align="center" valign="middle" class="f_td"><?php echo $t_rst[19]; ?></td>
	</tr>
<?php
	}
?>
</table>
