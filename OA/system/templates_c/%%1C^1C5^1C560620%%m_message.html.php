<?php /* Smarty version 2.6.19, created on 2016-07-23 11:06:49
         compiled from rsxx/m_message.html */ ?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>修改消息</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
</head>

<body>
	<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
		<tr>
			<td height="33" background="../images/list.jpg" id="list">修改消息
			</td>
		</tr>
	</table>
	<form action="m_message_chk.php" method="post" name="form1">
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
		<table width="500" height="180" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
			<tr>
			<td width="100" height="25" align="right" valign="middle" scope="col">标题：</td>
			<td height="25" align="left" valign="middle" scope="col">
			<input type="text" name="p_title" value="<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_title']; ?>
" /></td>
			</tr>
			<tr>
				<td align="right" valign="middle">内容：</td>
				<td align="left" valign="top">
					<textarea name="p_content" cols="50" rows="15"><?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_content']; ?>
</textarea>
				</td>
			</tr>
			<tr>
				<td height="30" align="right" valign="middle">类别：</td>
				<td height="30" align="left" valign="middle">
					<select name="p_type">
						<?php if ($this->_tpl_vars['res'][$this->_sections['res_id']['index']]['u_id'] == 18): ?>}

							<option value="18" selected="selected">企业公告</option>
							<option value="19">活动安排</option>
						<?php else: ?>
							<option value="18">企业公告</option>
							<option value="19" selected="selected">活动安排</option>
						<?php endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" height="30" align="center" valign="middle">
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
">
					<input type="submit" value="修改" />
					<input type="reset"  value="重置" />
				</td>
			</tr>
		</table>
		<?php endfor; endif; ?>
	</form>
</body>
</html>
