<?php
	session_start();
	header ( "Content-type: text/html; charset=UTF-8" ); 						//设置文件编码格式
	session_destroy();
	echo "<script>parent.window.close();</script>";
?>