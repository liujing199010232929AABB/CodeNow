<?php
	//session_start();
	if(!isset($_SESSION['m_id']) and !isset($_SESSION['type'])){
		echo "<script>alert('�Ƿ���¼');location.href = 'index.php';</script>";
		exit();
	}
?>