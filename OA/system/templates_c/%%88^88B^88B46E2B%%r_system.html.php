<?php /* Smarty version 2.6.19, created on 2016-07-23 09:58:49
         compiled from qyxx/r_system.html */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8" />
	<title>规章制度</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
</head>

<body>
<table width="765" border="1" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px; background-color:#CCCCCC;">
	<tr>
		<td height="36" background="images/list.jpg" id="list">规章制度</td>
	</tr>
</table>
<table width="768" border="1" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF" class="big_td">
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
		<td height=25 align=center valign=middle>
			<a href='r_system.php?id=<?php echo $this->_tpl_vars['com'][$this->_sections['com_id']['index']]['id']; ?>
'><?php echo $this->_tpl_vars['com'][$this->_sections['com_id']['index']]['f_name']; ?>
</a>
		</td>
	</tr>	
<?php endfor; endif; ?>
	
</table>
<table width="768" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
	<tr>
		<td align="center" valign="top">		
		<textarea readonly='readonly' cols=90 rows=25><?php echo $this->_tpl_vars['company']; ?>
</textarea>
		</td>
	</tr>
</table>
</body>
</html>