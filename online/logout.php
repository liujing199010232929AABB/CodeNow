<?php
	session_start();//启动Session
	session_destroy();//销毁Session
?>
<script language="javascript">
	alert("已经安全退出!");
	location="index.php";
</script>