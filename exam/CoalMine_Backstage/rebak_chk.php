<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include "bak_config.php";	//连接数据库，指定数据库文件存储的位置
	//编写恢复数据库的命令

$mysqlstr = MYSQLPATH.'mysql -u'.MYSQLUSER.' -h'.MYSQLHOST.' -p'.MYSQLPWD.' '.MYSQLDATA.' < '.PATH.ROOT.ADMIN.BAK.$_GET['r_name'];
exec($mysqlstr);		//执行恢复数据库操作的命令
echo "<script>alert('恢复成功');window.history.back();</script>";
?>


</body>
</html>