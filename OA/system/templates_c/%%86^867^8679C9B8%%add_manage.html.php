<?php /* Smarty version 2.6.19, created on 2016-07-23 10:58:40
         compiled from rsxx/add_manage.html */ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加消息</title>
</head>

<body>
<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td height="33" background="images/list.jpg" id="list">添加消息
		</td>
	</tr>
</table>
<form action="add_manage_chk.php" method="post" name="addmess" id="addmess">
<table width="765" height="180" border="1" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF" class="big_td">
  <tr>
    <td width="100" height="25" align="right" valign="middle" scope="col">标题：</td>
    <td height="25" align="left" valign="middle" scope="col">
	<input type="text" name="p_title" id="p_title" />&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="middle">内容：</td>
    <td align="left" valign="middle">
	<textarea name="p_content" id="p_content" cols="60" rows="15"></textarea>
	</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">类别：</td>
    <td height="30" align="left" valign="middle">
	<select name="p_type">
		<option value="18">企业公告</option>
		<option value="19">活动安排</option>
	</select>
	</td>
  </tr>
  <tr>
    <td colspan="2" height="30" align="center" valign="middle">
	<input type="submit" value="发布" onclick="return add_mess();" />
	<input type="reset" value="重置" />
	</td>
  </tr>
</table>
</form>
</body>
</html>