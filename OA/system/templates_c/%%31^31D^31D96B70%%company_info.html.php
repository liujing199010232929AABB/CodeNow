<?php /* Smarty version 2.6.19, created on 2016-07-26 17:03:32
         compiled from qyxx/company_info.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8" />
    <title>公司简介</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
</head>

<body>
<table width="768" border="1" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td height="36" background="images/list.jpg" id="list">公司简介</td>
	</tr>
	<tr>
		<td height="25" align="center" valign="top">
			<textarea cols="90" rows="20" readonly="readonly"><?php echo $this->_tpl_vars['company_info']; ?>
</textarea>
        </td>
	</tr>
</table>

</body>
</html>