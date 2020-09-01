<?php /* Smarty version 2.6.19, created on 2016-07-23 10:18:27
         compiled from qyjx/show_performance.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'qyjx/show_performance.html', 12, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<link rel="stylesheet" href="css/style.css" />
<body>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="big_td" >
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
		<td width="584" height="30"><?php echo ((is_array($_tmp=$this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_plan'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", false) : smarty_modifier_truncate($_tmp, 30, "...", false)); ?>
</td>
		<td width="224">
			<a href="#" onclick="javascript:openWin=open('show_plan.php?id=<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
' ,'','width=300,height=200,scrollbars=no');">查看全文</a>		</td>
		<td width="186" align="center" valign="middle"><a href="del_plan_chk.php?id=<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
">删除</a></td>
	</tr>
<?php endfor; endif; ?>

</table>

</body>
</html>