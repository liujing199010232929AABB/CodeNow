<?php
	header('Content-type: text/html;charset=GB2312');	//指定发送数据的编码格式
	include "conn/conn.php";//包含数据库连接文件
	$type = $_GET['type'];
	$types = $_GET['types'];
	if($types == "" || $types == "Video"){
		$sql="select * from tb_videolist where father='".$type."'";//定义查询语句
		$result = $pdo->prepare($sql);//准备查询
		$result->execute();//执行查询
		while($rst=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
?>
		<option value="<?php echo $rst[2]; ?>"><?php echo $rst[2]; ?></option>
<?php
		}
	}else{
		$sql="select * from tb_audiolist where father='".$type."'";//定义查询语句
		$result = $pdo->prepare($sql);//准备查询
		$result->execute();//执行查询
		while($rst=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
?>
		<option value="<?php echo $rst[2]; ?>"><?php echo $rst[2]; ?></option>
<?php
		}
	}
?>	

