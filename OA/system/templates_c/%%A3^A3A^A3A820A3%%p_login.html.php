<?php /* Smarty version 2.6.19, created on 2016-07-23 12:56:56
         compiled from kqgl/p_login.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Util', 'kqgl/p_login.html', 18, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>考勤</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
</head>
<body>
<form id="pl" name="pl" method="post" action="p_login_chk.php">
<table background="images/bg.jpg"  width="420" height="260" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="50" align="right" valign="middle">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" >姓名：</td>
      <td height="30"><input type="text" name="u_name" value="<?php echo charsetUTF8(array('text' => $_SESSION['u_name']), $this);?>
" readonly="readonly" /></td>
	</tr>
	<tr>
		<td align="right" valign="middle">登记类型：</td>
		<td height="30">
            <select name="u_type">
                <?php if ($this->_tpl_vars['uc'] == 23): ?>
                    <option value="1">上班</option>
                    <option value="0">下班</option>
                <?php elseif ($this->_tpl_vars['uc'] == 24): ?>
                    <option value="4">病假</option>
                    <option value="5">事假</option>
                <?php elseif ($this->_tpl_vars['uc'] == 25): ?>
                    <option value="2">加班签到</option>
                    <option value="3">加班签退</option>
                <?php endif; ?>
            </select>
        </td>
	</tr>
	<tr>
		<td align="right" valign="middle">备注：</td>
		<td><textarea name="r_remark" rows="5"></textarea></td>
	</tr>
	<tr>
		<td height="30" colspan="2" align="center" valign="middle">
		<input type="hidden" name="r_id" value="<?php echo $this->_tpl_vars['uc']; ?>
" />
		<input type="submit" value="登记"></td>
	</tr>
</table>
</form>
</body>
</html>