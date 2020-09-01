<?php /* Smarty version 2.6.19, created on 2016-07-23 10:37:15
         compiled from rsxx/show_message.html */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>详细信息</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
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
<table border="1" align="center" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td align="center" valign="middle" style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;"><pre><?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_content']; ?>
</pre></td>
	</tr>
</table>
<?php endfor; endif; ?>
</body>
</html>