<?php /* Smarty version 2.6.19, created on 2016-07-23 11:33:11
         compiled from shps/au_read.html */ ?>
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
		<td height="33" background="images/list.jpg" id="list">批示审核</td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
	<tr>
		<td width="100" height="25" align="center" valign="middle">日期</td>
		<td width="100" height="25" align="center" valign="middle">标题</td>
		<td height="25" align="center" valign="middle">内容</td>
		<td width="100" height="25" align="center" valign="middle">是否审核</td>
		<td width="100" height="25" align="center" valign="middle">操作</td>
	</tr>
	<?php unset($this->_sections['rec_id']);
$this->_sections['rec_id']['name'] = 'rec_id';
$this->_sections['rec_id']['loop'] = is_array($_loop=$this->_tpl_vars['rec']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rec_id']['show'] = true;
$this->_sections['rec_id']['max'] = $this->_sections['rec_id']['loop'];
$this->_sections['rec_id']['step'] = 1;
$this->_sections['rec_id']['start'] = $this->_sections['rec_id']['step'] > 0 ? 0 : $this->_sections['rec_id']['loop']-1;
if ($this->_sections['rec_id']['show']) {
    $this->_sections['rec_id']['total'] = $this->_sections['rec_id']['loop'];
    if ($this->_sections['rec_id']['total'] == 0)
        $this->_sections['rec_id']['show'] = false;
} else
    $this->_sections['rec_id']['total'] = 0;
if ($this->_sections['rec_id']['show']):

            for ($this->_sections['rec_id']['index'] = $this->_sections['rec_id']['start'], $this->_sections['rec_id']['iteration'] = 1;
                 $this->_sections['rec_id']['iteration'] <= $this->_sections['rec_id']['total'];
                 $this->_sections['rec_id']['index'] += $this->_sections['rec_id']['step'], $this->_sections['rec_id']['iteration']++):
$this->_sections['rec_id']['rownum'] = $this->_sections['rec_id']['iteration'];
$this->_sections['rec_id']['index_prev'] = $this->_sections['rec_id']['index'] - $this->_sections['rec_id']['step'];
$this->_sections['rec_id']['index_next'] = $this->_sections['rec_id']['index'] + $this->_sections['rec_id']['step'];
$this->_sections['rec_id']['first']      = ($this->_sections['rec_id']['iteration'] == 1);
$this->_sections['rec_id']['last']       = ($this->_sections['rec_id']['iteration'] == $this->_sections['rec_id']['total']);
?>
	<tr>
		<td height="30"><?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['i_time']; ?>
</td>
		<td height="30"><?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['i_title']; ?>
</td>
		<td height="30">
		<a href="#" onClick="javascript:Wopen=open('read_state.php?id=<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['id']; ?>
','','width=400,height=200,scrollbars=no');"><?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['i_content']; ?>
</a>
		</td>
		<td height="30">
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['i_state'] == 3): ?>
				未审核
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['i_state'] == 0): ?>
				通过
			<?php else: ?>
				未通过
			<?php endif; ?>
		</td>
		<td height="30"><a href="del_issuance_chk.php?id=<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['id']; ?>
" onClick="return del_mess();">删除</a></td>
	</tr>
<?php endfor; endif; ?>
</table>
</body>
</html>