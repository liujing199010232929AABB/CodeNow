<?php
	header('Content-type: text/html;charset=GB2312');	//ָ���������ݵı����ʽ
	include "conn/conn.php";//�������ݿ������ļ�
	$type = $_GET['type'];
	$types = $_GET['types'];
	if($types == "" || $types == "Video"){
		$sql="select * from tb_videolist where father='".$type."'";//�����ѯ���
		$result = $pdo->prepare($sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		while($rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
		<option value="<?php echo $rst[2]; ?>"><?php echo $rst[2]; ?></option>
<?php
		}
	}else{
		$sql="select * from tb_audiolist where father='".$type."'";//�����ѯ���
		$result = $pdo->prepare($sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		while($rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
		<option value="<?php echo $rst[2]; ?>"><?php echo $rst[2]; ?></option>
<?php
		}
	}
?>	

