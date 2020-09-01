<?php /* Smarty version 2.6.19, created on 2016-07-23 11:39:33
         compiled from shps/modify_issuance.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改审核内容</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
</head>

<body>
<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td height="33" background="images/list.jpg" id="list">发布审核</td>
	</tr>
</table>
<form name="form1" method="post" action="modify_issuance_chk.php">
<table border="0" cellspacing="0" cellpadding="0" bgcolor="#DEEBEF">
 <?php unset($this->_sections['res_id']);
$this->_sections['res_id']['name'] = 'res_id';
$this->_sections['res_id']['loop'] = is_array($_loop=$this->_tpl_vars['res']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['res_id']['show'] = true;
$this->_sections['res_id']['max'] = $this->_sections['res_id']['loop'];
$this->_sections['res_id']['step'] = 1;
$this->_sections['res_id']['start'] = $this->_sections['res_id']['step'] > 0 ? 0 : $this->_sections['res_id']['loop']-1;
if ($this->_sections['res_id']['show']) {
    $this->_sections['res_id']['total'] = $this->_sections['res_id']['loop'];
    if ($this->_sections['res_id']['total'] == 0)
        $this->_sections['res_id']['show'] = false;
} else
    $this->_sections['res_id']['total'] = 0;
if ($this->_sections['res_id']['show']):

            for ($this->_sections['res_id']['index'] = $this->_sections['res_id']['start'], $this->_sections['res_id']['iteration'] = 1;
                 $this->_sections['res_id']['iteration'] <= $this->_sections['res_id']['total'];
                 $this->_sections['res_id']['index'] += $this->_sections['res_id']['step'], $this->_sections['res_id']['iteration']++):
$this->_sections['res_id']['rownum'] = $this->_sections['res_id']['iteration'];
$this->_sections['res_id']['index_prev'] = $this->_sections['res_id']['index'] - $this->_sections['res_id']['step'];
$this->_sections['res_id']['index_next'] = $this->_sections['res_id']['index'] + $this->_sections['res_id']['step'];
$this->_sections['res_id']['first']      = ($this->_sections['res_id']['iteration'] == 1);
$this->_sections['res_id']['last']       = ($this->_sections['res_id']['iteration'] == $this->_sections['res_id']['total']);
?>
  <tr>
    <td width="100" height="30" align="right" valign="middle" scope="col">主题：</td>
    <td height="30" align="left" valign="middle" scope="col"><input type="text" name="a_title" value="<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['i_title']; ?>
"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">内容：</td>
    <td align="left" valign="middle">
        <textarea name="a_content" cols="30" rows="5"><?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['i_content']; ?>
</textarea>
    </td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['re_id']; ?>
">
	<input type="submit" value="修改">
	<input type="reset"  value="重置">
	</td>
  </tr>
<?php endfor; endif; ?>
</table>
</form>
</body>
</html>