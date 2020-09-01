<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
	session_start();//启动Session
	if(isset($_SESSION['name'])){//如果用户已登录
?>
<body leftmargin="0" topmargin="0">
<object classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95" width="100%" height="100%" id="MediaPlayer1" >
  <param name="AutoStart" value="-1">
  <param name="ShowStatusBar" value="-1">
  <param name="Filename" value="upfiles/video/<?php echo $_GET['id'];  ?>">
</object>
</body>
<?php
	}else{
		echo "<script>alert('只有会员才能观看影片，请登录！');location.href='login.php';</script>";//弹出提示信息
	}
?>