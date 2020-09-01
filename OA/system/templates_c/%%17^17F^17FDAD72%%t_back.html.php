<?php /* Smarty version 2.6.19, created on 2016-07-23 14:20:09
         compiled from zytd/t_back.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>回复主题</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
</head>
<body>
<table width="765" border="0" cellspacing="0" cellpadding="0" class="big_td">
    <form action="t_back_chk.php" method="post" name="tback" id="tback">
        <tr>
        <td width="100" height="25" align="right" valign="middle" scope="col">回复主题：</td>
        <td height="25" align="left" valign="middle" scope="col">
        <input type="text" name="t_title" id="t_title" value="<?php echo $this->_tpl_vars['l_title']; ?>
" readonly="readonly" >
        </td>
    </tr>
    <tr>
        <td align="right" valign="middle">回复内容</td>
        <td align="left" valign="middle">
        <textarea name="r_back" id="r_back" cols="75" rows="10"></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['u_id']; ?>
">
        <input type="submit" value="回复" onClick="return re_back();"></td>
    </tr>
    </form>
</table>
</body>
</html>
