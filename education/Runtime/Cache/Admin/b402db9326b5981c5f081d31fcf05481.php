<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<title>后台管理系统</title>
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/tipDialog.js"></script>
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" /><link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/tipDialog.css" />


</head>
<frameset rows="52,*,59" frameborder="no">
	<frame src="<?php echo U('Index/addTop');?>" name="top" frameborder="no"  border="0" framespacing="0" />
	<frameset cols="221,*" frameborder="no" id="midContent" border="0" framespacing="0">
		<frame src="<?php echo U('Index/addLeft');?>" name="left" frameborder="no" scrolling="no" border="0" framespacing="0" />
		<frame src="<?php echo U('Index/addMain');?>" name="main" id="main" frameborder="no"  border="0" framespacing="0" />
	</frameset>
	<frame name="bottom" src="<?php echo U('Index/addFoot');?>" frameborder="no" border="0" framespacing="0" />
	<noframes>
		<body>
			<p>此网页使用了框架，但您的浏览器不支持框架。</p>
		</body>
	</noframes>
</frameset>
</html>