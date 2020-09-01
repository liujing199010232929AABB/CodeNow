<?php /* Smarty version 2.6.19, created on 2016-07-25 17:34:08
         compiled from qyxx/c_manage.html */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8" />
	<title>企业管理</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
</head>

<body>
<table width="765" border="1" cellpadding="0" cellspacing="0" >
	<tr>
		<td height="33" background="images/list.jpg" id="list">企业管理</td>
	</tr>
</table>

<table width="765" border="1" cellpadding="0" cellspacing="0" >
	<tr>
		<td height="16" >
			<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
			<?php unset($this->_sections['com_id']);
$this->_sections['com_id']['name'] = 'com_id';
$this->_sections['com_id']['loop'] = is_array($_loop=$this->_tpl_vars['com']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['com_id']['show'] = true;
$this->_sections['com_id']['max'] = $this->_sections['com_id']['loop'];
$this->_sections['com_id']['step'] = 1;
$this->_sections['com_id']['start'] = $this->_sections['com_id']['step'] > 0 ? 0 : $this->_sections['com_id']['loop']-1;
if ($this->_sections['com_id']['show']) {
    $this->_sections['com_id']['total'] = $this->_sections['com_id']['loop'];
    if ($this->_sections['com_id']['total'] == 0)
        $this->_sections['com_id']['show'] = false;
} else
    $this->_sections['com_id']['total'] = 0;
if ($this->_sections['com_id']['show']):

            for ($this->_sections['com_id']['index'] = $this->_sections['com_id']['start'], $this->_sections['com_id']['iteration'] = 1;
                 $this->_sections['com_id']['iteration'] <= $this->_sections['com_id']['total'];
                 $this->_sections['com_id']['index'] += $this->_sections['com_id']['step'], $this->_sections['com_id']['iteration']++):
$this->_sections['com_id']['rownum'] = $this->_sections['com_id']['iteration'];
$this->_sections['com_id']['index_prev'] = $this->_sections['com_id']['index'] - $this->_sections['com_id']['step'];
$this->_sections['com_id']['index_next'] = $this->_sections['com_id']['index'] + $this->_sections['com_id']['step'];
$this->_sections['com_id']['first']      = ($this->_sections['com_id']['iteration'] == 1);
$this->_sections['com_id']['last']       = ($this->_sections['com_id']['iteration'] == $this->_sections['com_id']['total']);
?>
				<tr>
					<td height=30 align=center valign=middle><a href='c_manage.php?id=<?php echo $this->_tpl_vars['com'][$this->_sections['com_id']['index']]['id']; ?>
'><?php echo $this->_tpl_vars['com'][$this->_sections['com_id']['index']]['f_name']; ?>
</a></td>
				</tr>
			<?php endfor; endif; ?>
			</table>
		</td>
	</tr>
	
	<tr>
	  <td height="17">
	  <?php if ($this->_tpl_vars['com_id'] == 'false'): ?>
	<table width="750" border="0" align="left" cellpadding="0" cellspacing="0">
	<form name="r_add" id="r_add" action="c_manage_chk.php" method="post">
	<tr>
		<td width="100" height="25" align="right">标题：</td>
		<td width="650"><input name="u_title" type="text" id="u_title" size="60" ></td>
	</tr>
	<tr>
		<td align="right">内容：</td>
		<td><textarea name="u_content" cols="60" rows="23"></textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="center" valign="middle">
		<input type="hidden" name="action" value="add" />
		<input name="add" type="submit" id="add" value="添加" onclick="return add_rule();">&nbsp;
		<input name="reset" type="reset" id="reset" value="重置">
		</td>
	</tr>
	</form>
	</table>
	<?php else: ?>

<?php unset($this->_sections['company_id']);
$this->_sections['company_id']['name'] = 'company_id';
$this->_sections['company_id']['loop'] = is_array($_loop=$this->_tpl_vars['company']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['company_id']['show'] = true;
$this->_sections['company_id']['max'] = $this->_sections['company_id']['loop'];
$this->_sections['company_id']['step'] = 1;
$this->_sections['company_id']['start'] = $this->_sections['company_id']['step'] > 0 ? 0 : $this->_sections['company_id']['loop']-1;
if ($this->_sections['company_id']['show']) {
    $this->_sections['company_id']['total'] = $this->_sections['company_id']['loop'];
    if ($this->_sections['company_id']['total'] == 0)
        $this->_sections['company_id']['show'] = false;
} else
    $this->_sections['company_id']['total'] = 0;
if ($this->_sections['company_id']['show']):

            for ($this->_sections['company_id']['index'] = $this->_sections['company_id']['start'], $this->_sections['company_id']['iteration'] = 1;
                 $this->_sections['company_id']['iteration'] <= $this->_sections['company_id']['total'];
                 $this->_sections['company_id']['index'] += $this->_sections['company_id']['step'], $this->_sections['company_id']['iteration']++):
$this->_sections['company_id']['rownum'] = $this->_sections['company_id']['iteration'];
$this->_sections['company_id']['index_prev'] = $this->_sections['company_id']['index'] - $this->_sections['company_id']['step'];
$this->_sections['company_id']['index_next'] = $this->_sections['company_id']['index'] + $this->_sections['company_id']['step'];
$this->_sections['company_id']['first']      = ($this->_sections['company_id']['iteration'] == 1);
$this->_sections['company_id']['last']       = ($this->_sections['company_id']['iteration'] == $this->_sections['company_id']['total']);
?>
		<table width="750" border="0" align="left" cellpadding="0" cellspacing="0">
	<form name="r_add" id="r_add" action="c_manage_chk.php" method="post">
	<tr>
		<td width="100" height="25" align="right">标题：</td>
		<td width="650"><input name="u_title" type="text" value="<?php echo $this->_tpl_vars['company'][$this->_sections['company_id']['index']]['f_name']; ?>
" size="60">		</td>
	</tr>
	<tr>
		<td align="right">内容：</td>
		<td>
		<textarea name="u_content" cols="60" rows="23"><?php echo $this->_tpl_vars['company'][$this->_sections['company_id']['index']]['f_content']; ?>
</textarea>		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" valign="middle">
		<input type="hidden" name="action" value="modify" />
		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['company'][$this->_sections['company_id']['index']]['id']; ?>
" />
		<input name="add"   type="submit"  value="修改" onclick="return add_rule();">&nbsp;
		<input name="reset" type="reset"   value="重置">&nbsp;
		<label id="s_del"><a href="c_manage_chk.php?action=del&id=<?php echo $this->_tpl_vars['company'][$this->_sections['company_id']['index']]['id']; ?>
" class="tmpa" onclick="return del_mess();">删除</a></label>
		</td>
	</tr>
	</form>
	</table>
		<?php endfor; endif; ?>
		<?php endif; ?>
	  </td>
  </tr>
   <tr>
  	<td height="25" align="center" valign="bottom"><a href="c_manage.php">添加新制度</a></td>
  </tr>
</table>

</body>
</html>
