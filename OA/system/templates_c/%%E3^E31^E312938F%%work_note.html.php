<?php /* Smarty version 2.6.19, created on 2016-10-20 10:42:12
         compiled from kqgl/work_note.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<link href="css/style.css" rel="stylesheet" />
<script src="js/client_js.js"></script>
<body>
<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td height="33" background="images/list.jpg" id="list"><?php echo $this->_tpl_vars['f_name']; ?>
</td>
	</tr>
</table>
<table width="765" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
<form method="post" action="#">
	<tr>
		<td colspan="5" height="30" align="center" valign="middle">
		<a href="#" onclick="javascript:openWin=open('p_login.php?r_id=<?php echo $this->_tpl_vars['u_id']; ?>
' ,'','width=420,height=260,scrollbars=no');">
			<?php if ($this->_tpl_vars['u_id'] == 23): ?>
				上下班登记
			<?php elseif ($this->_tpl_vars['u_id'] == 24): ?>
				病事假登记
			<?php elseif ($this->_tpl_vars['u_id'] == 25): ?>
				加班登记
			<?php endif; ?>
		</a></td>
	</tr>
	<tr>
		<td width="100" height="20" align="center" valign="middle">日期</td>
		<td width="100" height="20" align="center" valign="middle">登记时间</td>
		<td width="100" align="center" valign="middle">登记类型</td>
		<td width="100" align="center" valign="middle">登记状态</td>
		<td  align="center" valign="middle">备注</td>
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
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 0): ?>
				下班
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 1): ?>
				上班
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 2): ?>
				加班签到
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 3): ?>
				加班签退
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 4): ?>
				病假
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 5): ?>
				事假
			<?php endif; ?>
		</td>
		<td height="25" align="center" valign="middle">
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 0): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					早退
				<?php else: ?>
					正点下班
				<?php endif; ?>

			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 1): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					正点上班
				<?php else: ?>
					迟到
				<?php endif; ?>
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 2): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					正点加班
				<?php else: ?>
					晚点加班
				<?php endif; ?>
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 3): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					早退
				<?php else: ?>
					正点下班
				<?php endif; ?>
			<?php elseif ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_type'] == 4): ?>
				<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_state'] == 0): ?>
					病假
				<?php else: ?>
					事假
				<?php endif; ?>
			<?php endif; ?>
		</td>
		<td height="25" align="center" valign="middle">
			<?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_remark'] != null): ?>
				<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_remark']; ?>

			<?php else: ?>
				无
			<?php endif; ?>
		</td>
	</tr>
	<?php endfor; endif; ?>
</form>
</table>
</body>
</html>