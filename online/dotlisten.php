<?php
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
?>
<body leftmargin="0" topmargin="0" onUnload="javascript:top.opener.location.reload();"> 
<center>
<?php
	if($_SERVER['HTTP_REFERER'] != ""){//�����һҳ�治Ϊ��
		$sql = "delete from tb_register where id = ".$_GET['id'];//����ɾ�����
		$result = $pdo->exec($sql);//ִ�����
		if($result == 1){//�������ֵΪ1
?>
  <embed src="upfiles/audio/<?php echo $_GET['name'];?>" ShowStatusBar=true></embed>
<?php
		}else{
			echo "<script>alert('ɾ��ʧ��');window.close();</script>";//�����Ի���
			exit();//�˳�����
		}
	}else{
		echo "<script>alert('��������ⲿ����');window.close();</script>";//�����Ի���
			exit();//�˳�����
	}
?>	
</center>
</body>
