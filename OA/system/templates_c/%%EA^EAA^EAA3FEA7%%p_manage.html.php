<?php /* Smarty version 2.6.19, created on 2016-07-23 10:37:42
         compiled from rsxx/p_manage.html */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>企业公告</title>
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/client_js.js"></script>
</head>

<body>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td height="33" background="../images/list.jpg" id="list">消息管理
		</td>
	</tr>
</table>
<table width="765" border="0" cellspacing="0" cellpadding="0" bgcolor="#DEEBEF" class="big_td">
  <tr>
    <td width="100" height="25" align="center" valign="middle" scope="col">发布时间</td>
    <td height="25" align="center" valign="middle" scope="col">标题</td>
	<td width="150" height="25" align="center" valign="middle" scope="col">操作</td>
  </tr>

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
    <td width="100" height="25" align="center" valign="middle" scope="col"><?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_time']; ?>
</td>
    <td height="25" align="center" valign="middle" scope="col"><?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_title']; ?>
</td>
	<td width="150" height="25" align="center" valign="middle" scope="col">
		<a href='m_message.php?id=<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
'>修改</a> /
		<a href='d_message_chk.php?id=<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
' onclick='return del_mess();'>删除</a>
	</td>
</tr>
<?php endfor; endif; ?>
<tr>
	<td height="30" align="right" valign="middle" colspan="3"><a href='add_manage.php' target="mainFrame">发布新消息</a></td>
</tr>
</table>
</body>
</html>
