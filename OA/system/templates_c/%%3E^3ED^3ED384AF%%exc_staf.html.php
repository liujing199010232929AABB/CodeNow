<?php /* Smarty version 2.6.19, created on 2016-07-23 10:01:50
         compiled from qyjx/exc_staf.html */ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8" />
	<title>优秀员工</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
</head>

<body>
	<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
		<tr>
			<td height="33" background="images/list.jpg" id="list">优秀员工</td>
		</tr>
	</table>
	<table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
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
				<td height="25" width="654">
					<a href="exc_staf.php?cont=<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
">
						<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['s_fmonth']; ?>
 到 <?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['s_lmonth']; ?>
优秀员工
					</a>
				</td>
				<td width="105" align="center" valign="middle">
					<a href="del_exc_chk.php?id=<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
">删除</a>
				</td>
			</tr>
		<?php endfor; endif; ?>
		<tr>
			<td height="33" colspan="2" ><?php echo $this->_tpl_vars['cont']; ?>
</td>
		</tr>
	</table>
</body>
</html>