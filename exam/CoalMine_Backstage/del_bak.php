<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include('bak_config.php');
$f_names = show_file(PATH.ROOT.ADMIN.BAK);
if(count($f_names)>=3){
	for($num = 2;$num < count($f_names);$num++){
		unlink(PATH.ROOT.ADMIN.BAK.$f_names[$num]);
	}
	
	echo "<script>alert('数据删除成功！');window.history.back();</script>";
}else{
	echo "<script>alert('无备份数据！');window.history.back();</script>";
}

?>

</body>
</html>