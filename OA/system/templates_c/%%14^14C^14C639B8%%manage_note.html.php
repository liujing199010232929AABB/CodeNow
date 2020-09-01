<?php /* Smarty version 2.6.19, created on 2016-07-23 11:48:31
         compiled from kqgl/manage_note.html */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>考勤管理</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
</head>

<body>
<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td height="33" background="images/list.jpg" id="list">考勤管理</td>
	</tr>
</table>
<table width="765" border="1" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
	<tr>
		<td height="25" colspan="8" align="center" valign="middle">
		<a href="#" onclick="javascript:openWin=open('set_time.php' ,'','width=500,height=100,scrollbars=no');">设置时间</a>&nbsp;&nbsp;
		<a href="del_note_chk.php" onclick="return del_mess();">清空记录</A>
		</td>
	</tr>
	<tr>
		<td width="75" height="20" align="center" valign="middle">日期</td>
		<td width="75" height="20" align="center" valign="middle">时间</td>
  		<td width="75" height="20" align="center" valign="middle">职员姓名</td>
		<td width="75" align="center" valign="middle">上班签到</td>
		<td width="75" align="center" valign="middle">下班签退</td>
		<td width="75" align="center" valign="middle">加班签到</td>
		<td width="75" align="center" valign="middle">加班签退</td>
		<td width="75" align="center" valign="middle">病事假</td>
		
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
			<td height="25" align="center" valign="middle"><?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_date']; ?>
</td>
			<td height="25" align="center" valign="middle"><?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_time']; ?>
</td>
			<td height="25" align="center" valign="middle">
			<?php unset($this->_sections['uc_id']);
$this->_sections['uc_id']['name'] = 'uc_id';
$this->_sections['uc_id']['loop'] = is_array($_loop=$this->_tpl_vars['uc']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['uc_id']['show'] = true;
$this->_sections['uc_id']['max'] = $this->_sections['uc_id']['loop'];
$this->_sections['uc_id']['step'] = 1;
$this->_sections['uc_id']['start'] = $this->_sections['uc_id']['step'] > 0 ? 0 : $this->_sections['uc_id']['loop']-1;
if ($this->_sections['uc_id']['show']) {
    $this->_sections['uc_id']['total'] = $this->_sections['uc_id']['loop'];
    if ($this->_sections['uc_id']['total'] == 0)
        $this->_sections['uc_id']['show'] = false;
} else
    $this->_sections['uc_id']['total'] = 0;
if ($this->_sections['uc_id']['show']):

            for ($this->_sections['uc_id']['index'] = $this->_sections['uc_id']['start'], $this->_sections['uc_id']['iteration'] = 1;
                 $this->_sections['uc_id']['iteration'] <= $this->_sections['uc_id']['total'];
                 $this->_sections['uc_id']['index'] += $this->_sections['uc_id']['step'], $this->_sections['uc_id']['iteration']++):
$this->_sections['uc_id']['rownum'] = $this->_sections['uc_id']['iteration'];
$this->_sections['uc_id']['index_prev'] = $this->_sections['uc_id']['index'] - $this->_sections['uc_id']['step'];
$this->_sections['uc_id']['index_next'] = $this->_sections['uc_id']['index'] + $this->_sections['uc_id']['step'];
$this->_sections['uc_id']['first']      = ($this->_sections['uc_id']['iteration'] == 1);
$this->_sections['uc_id']['last']       = ($this->_sections['uc_id']['iteration'] == $this->_sections['uc_id']['total']);
?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['p_id'] == $this->_tpl_vars['uc'][$this->_sections['uc_id']['index']]['id']): ?>
			 		<?php echo $this->_tpl_vars['uc'][$this->_sections['uc_id']['index']]['u_name']; ?>

				<?php endif; ?>
			<?php endfor; endif; ?>
			</td>
			<td align="center" valign="middle">
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 1): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					正点上班
				<?php else: ?>
					迟到
				<?php endif; ?>
			<?php else: ?>
			-
			<?php endif; ?>
		</td>
			<td align="center" valign="middle">
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 0): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					早退
				<?php else: ?>
					正点上班
				<?php endif; ?>
			<?php else: ?>
			-
			<?php endif; ?>
			</td>
			<td align="center" valign="middle">
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 2): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					正点上班
				<?php else: ?>
					晚点上班
				<?php endif; ?>
			<?php else: ?>
			-
			<?php endif; ?>
			</td>
			<td align="center" valign="middle">
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 3): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					早退
				<?php else: ?>
					正点上班
				<?php endif; ?>
			<?php else: ?>
			-
			<?php endif; ?>
			</td>
			<td align="center" valign="middle">
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 4 || $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 5): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					病假
				<?php else: ?>
					事假
				<?php endif; ?>
			<?php else: ?>
			-
			<?php endif; ?>
		</td>
		</tr>
<?php endfor; endif; ?>
</table>
</body>
</html>