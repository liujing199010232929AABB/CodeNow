<?php /* Smarty version 2.6.19, created on 2016-07-27 18:00:03
         compiled from qyjx/t_performance.html */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>任务绩效</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
</head>
<body>
<!--部门列表-->
	<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
		<tr>
			<td height="33" background="images/list.jpg" id="list">任务绩效</td>
		</tr>
	</table>

	<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
		<?php unset($this->_sections['res1_id']);
$this->_sections['res1_id']['name'] = 'res1_id';
$this->_sections['res1_id']['loop'] = is_array($_loop=$this->_tpl_vars['res1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['res1_id']['show'] = true;
$this->_sections['res1_id']['max'] = $this->_sections['res1_id']['loop'];
$this->_sections['res1_id']['step'] = 1;
$this->_sections['res1_id']['start'] = $this->_sections['res1_id']['step'] > 0 ? 0 : $this->_sections['res1_id']['loop']-1;
if ($this->_sections['res1_id']['show']) {
    $this->_sections['res1_id']['total'] = $this->_sections['res1_id']['loop'];
    if ($this->_sections['res1_id']['total'] == 0)
        $this->_sections['res1_id']['show'] = false;
} else
    $this->_sections['res1_id']['total'] = 0;
if ($this->_sections['res1_id']['show']):

            for ($this->_sections['res1_id']['index'] = $this->_sections['res1_id']['start'], $this->_sections['res1_id']['iteration'] = 1;
                 $this->_sections['res1_id']['iteration'] <= $this->_sections['res1_id']['total'];
                 $this->_sections['res1_id']['index'] += $this->_sections['res1_id']['step'], $this->_sections['res1_id']['iteration']++):
$this->_sections['res1_id']['rownum'] = $this->_sections['res1_id']['iteration'];
$this->_sections['res1_id']['index_prev'] = $this->_sections['res1_id']['index'] - $this->_sections['res1_id']['step'];
$this->_sections['res1_id']['index_next'] = $this->_sections['res1_id']['index'] + $this->_sections['res1_id']['step'];
$this->_sections['res1_id']['first']      = ($this->_sections['res1_id']['iteration'] == 1);
$this->_sections['res1_id']['last']       = ($this->_sections['res1_id']['iteration'] == $this->_sections['res1_id']['total']);
?>
			<tr>
				<td width="50" height="25" align="center" valign="middle">
					<a href="t_performance.php?d_id=<?php echo $this->_tpl_vars['res1'][$this->_sections['res1_id']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['res1'][$this->_sections['res1_id']['index']]['d_name']; ?>
</a>
				</td>
			</tr>
		<?php endfor; endif; ?>
	</table>
	<!--部门员工-->
    <table border="0" cellpadding="0" cellspacing="0"  bgcolor="#DEEBEF">
        <?php unset($this->_sections['psql_id']);
$this->_sections['psql_id']['name'] = 'psql_id';
$this->_sections['psql_id']['loop'] = is_array($_loop=$this->_tpl_vars['psql']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['psql_id']['show'] = true;
$this->_sections['psql_id']['max'] = $this->_sections['psql_id']['loop'];
$this->_sections['psql_id']['step'] = 1;
$this->_sections['psql_id']['start'] = $this->_sections['psql_id']['step'] > 0 ? 0 : $this->_sections['psql_id']['loop']-1;
if ($this->_sections['psql_id']['show']) {
    $this->_sections['psql_id']['total'] = $this->_sections['psql_id']['loop'];
    if ($this->_sections['psql_id']['total'] == 0)
        $this->_sections['psql_id']['show'] = false;
} else
    $this->_sections['psql_id']['total'] = 0;
if ($this->_sections['psql_id']['show']):

            for ($this->_sections['psql_id']['index'] = $this->_sections['psql_id']['start'], $this->_sections['psql_id']['iteration'] = 1;
                 $this->_sections['psql_id']['iteration'] <= $this->_sections['psql_id']['total'];
                 $this->_sections['psql_id']['index'] += $this->_sections['psql_id']['step'], $this->_sections['psql_id']['iteration']++):
$this->_sections['psql_id']['rownum'] = $this->_sections['psql_id']['iteration'];
$this->_sections['psql_id']['index_prev'] = $this->_sections['psql_id']['index'] - $this->_sections['psql_id']['step'];
$this->_sections['psql_id']['index_next'] = $this->_sections['psql_id']['index'] + $this->_sections['psql_id']['step'];
$this->_sections['psql_id']['first']      = ($this->_sections['psql_id']['iteration'] == 1);
$this->_sections['psql_id']['last']       = ($this->_sections['psql_id']['iteration'] == $this->_sections['psql_id']['total']);
?>
        <tr>
            <td width="50" height="25" align="center" valign="middle">
                <a href="#" onclick="javascript:openWin=open('show_performance.php?action=m&p_id=<?php echo $this->_tpl_vars['psql'][$this->_sections['psql_id']['index']]['id']; ?>
' ,'','width=450,height=450,scrollbars=no');"><?php echo $this->_tpl_vars['psql'][$this->_sections['psql_id']['index']]['u_name']; ?>
</a>
            </td>
        </tr>
        <?php endfor; endif; ?>
    </table>

</body>
</html>