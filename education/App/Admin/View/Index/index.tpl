<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<title>后台管理系统</title>
<import type="js" basepath="__JS__" file="jquery,tipDialog" />
<import type="css" basepath="__CSS__" file="admin,tipDialog" />


</head>
<frameset rows="52,*,59" frameborder="no">
	<frame src="{:U('Index/addTop')}" name="top" frameborder="no"  border="0" framespacing="0" />
	<frameset cols="221,*" frameborder="no" id="midContent" border="0" framespacing="0">
		<frame src="{:U('Index/addLeft')}" name="left" frameborder="no" scrolling="no" border="0" framespacing="0" />
		<frame src="{:U('Index/addMain')}" name="main" id="main" frameborder="no"  border="0" framespacing="0" />
	</frameset>
	<frame name="bottom" src="{:U('Index/addFoot')}" frameborder="no" border="0" framespacing="0" />
	<noframes>
		<body>
			<p>此网页使用了框架，但您的浏览器不支持框架。</p>
		</body>
	</noframes>
</frameset>
</html>
