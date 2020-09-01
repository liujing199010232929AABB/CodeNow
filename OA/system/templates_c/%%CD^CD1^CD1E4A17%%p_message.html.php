<?php /* Smarty version 2.6.19, created on 2016-07-23 10:35:27
         compiled from rsxx/p_message.html */ ?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>企业公告</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
	<script src="js/riq.js"></script>
</head>
<body>
<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td height="33" background="../images/list.jpg" id="list"><?php echo $this->_tpl_vars['rs']; ?>
</td>
	</tr>
</table>
<table width="765" border="1" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF" class="big_td">
	<tr>
		<td width="100" height="25" align="center" valign="middle">发布时间</td>
		<td align="center" valign="middle">标题</td>
	</tr>
	<?php unset($this->_sections['re_id']);
$this->_sections['re_id']['name'] = 're_id';
$this->_sections['re_id']['loop'] = is_array($_loop=$this->_tpl_vars['res']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['re_id']['show'] = true;
$this->_sections['re_id']['max'] = $this->_sections['re_id']['loop'];
$this->_sections['re_id']['step'] = 1;
$this->_sections['re_id']['start'] = $this->_sections['re_id']['step'] > 0 ? 0 : $this->_sections['re_id']['loop']-1;
if ($this->_sections['re_id']['show']) {
    $this->_sections['re_id']['total'] = $this->_sections['re_id']['loop'];
    if ($this->_sections['re_id']['total'] == 0)
        $this->_sections['re_id']['show'] = false;
} else
    $this->_sections['re_id']['total'] = 0;
if ($this->_sections['re_id']['show']):

            for ($this->_sections['re_id']['index'] = $this->_sections['re_id']['start'], $this->_sections['re_id']['iteration'] = 1;
                 $this->_sections['re_id']['iteration'] <= $this->_sections['re_id']['total'];
                 $this->_sections['re_id']['index'] += $this->_sections['re_id']['step'], $this->_sections['re_id']['iteration']++):
$this->_sections['re_id']['rownum'] = $this->_sections['re_id']['iteration'];
$this->_sections['re_id']['index_prev'] = $this->_sections['re_id']['index'] - $this->_sections['re_id']['step'];
$this->_sections['re_id']['index_next'] = $this->_sections['re_id']['index'] + $this->_sections['re_id']['step'];
$this->_sections['re_id']['first']      = ($this->_sections['re_id']['iteration'] == 1);
$this->_sections['re_id']['last']       = ($this->_sections['re_id']['iteration'] == $this->_sections['re_id']['total']);
?>
	<tr>
		<td height=30 align=center valign=middle><?php echo $this->_tpl_vars['res'][$this->_sections['re_id']['index']]['p_time']; ?>
</td>
		<td style='text-indent: 30px;'>
		<a href="#" onclick="javascript:openWin=open('show_message.php?id=<?php echo $this->_tpl_vars['res'][$this->_sections['re_id']['index']]['id']; ?>
','','width=600,height=200,scrollbars=no');"><?php echo $this->_tpl_vars['res'][$this->_sections['re_id']['index']]['p_title']; ?>
</a>
		</td>
	</tr>
	<?php endfor; endif; ?>
</table>
</body>
</html>