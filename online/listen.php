<?php
	session_start();//����Session
	if(isset($_SESSION['name'])){//����û��ѵ�¼
?>

<body leftmargin="0" topmargin="0"> 
	<embed src="upfiles/audio/<?php echo $_GET['id'];?>" ShowStatusBar=true></embed>
</body>
<?php
	}else{
		echo "<script>alert('ֻ�л�Ա���ܲ��Ÿ��������¼��');top.location.href='login.php';</script>";//������ʾ��Ϣ
	}
?>