<?php /* Smarty version 2.6.19, created on 2016-10-20 10:35:51
         compiled from main.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'main.html', 27, false),)), $this); ?>
<link href="css/style.css" rel="stylesheet" />
<link href="css/semantic.css" rel="stylesheet" />
<script src="js/client_js.js"></script>
<script src="js/semantic.js"></script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#DEEBEF;">
	<tr>
		<td id="list" style="height:36px  background:url(images/list.jpg) no-repeat ">最新消息</td>
	</tr>
	<tr>
		<td width="50%" align="center" valign="top">
			<table width="100%" height="195" border="0" cellpadding="0" cellspacing="0" class="big_td">
				<tr>
					<td height="20" align="center" valign="middle">企业公告</td>
				</tr>
				<tr>
					<td align="center" valign="top">
						<!--公告-->
						<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
							<tr>
								<td height="25" align="center" valign="middle">发布时间</td>
								<td align="center" valign="middle">标题</td>
							</tr>
							<?php unset($this->_sections['per_id']);
$this->_sections['per_id']['name'] = 'per_id';
$this->_sections['per_id']['loop'] = is_array($_loop=$this->_tpl_vars['per']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['per_id']['show'] = true;
$this->_sections['per_id']['max'] = $this->_sections['per_id']['loop'];
$this->_sections['per_id']['step'] = 1;
$this->_sections['per_id']['start'] = $this->_sections['per_id']['step'] > 0 ? 0 : $this->_sections['per_id']['loop']-1;
if ($this->_sections['per_id']['show']) {
    $this->_sections['per_id']['total'] = $this->_sections['per_id']['loop'];
    if ($this->_sections['per_id']['total'] == 0)
        $this->_sections['per_id']['show'] = false;
} else
    $this->_sections['per_id']['total'] = 0;
if ($this->_sections['per_id']['show']):

            for ($this->_sections['per_id']['index'] = $this->_sections['per_id']['start'], $this->_sections['per_id']['iteration'] = 1;
                 $this->_sections['per_id']['iteration'] <= $this->_sections['per_id']['total'];
                 $this->_sections['per_id']['index'] += $this->_sections['per_id']['step'], $this->_sections['per_id']['iteration']++):
$this->_sections['per_id']['rownum'] = $this->_sections['per_id']['iteration'];
$this->_sections['per_id']['index_prev'] = $this->_sections['per_id']['index'] - $this->_sections['per_id']['step'];
$this->_sections['per_id']['index_next'] = $this->_sections['per_id']['index'] + $this->_sections['per_id']['step'];
$this->_sections['per_id']['first']      = ($this->_sections['per_id']['iteration'] == 1);
$this->_sections['per_id']['last']       = ($this->_sections['per_id']['iteration'] == $this->_sections['per_id']['total']);
?>
							<tr>
								<td height=30 align=center valign=middle><?php echo $this->_tpl_vars['per'][$this->_sections['per_id']['index']]['p_time']; ?>
</td>
								<td align="center" valign="middle" style='text-indent: 30px;'>
									<a href="show_message.php?id=<?php echo $this->_tpl_vars['per'][$this->_sections['per_id']['index']]['id']; ?>
" target='_blank'><?php echo ((is_array($_tmp=$this->_tpl_vars['per'][$this->_sections['per_id']['index']]['p_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", false) : smarty_modifier_truncate($_tmp, 20, "...", false)); ?>
</a>
								</td>
							</tr>
							<?php endfor; endif; ?>
						</table>
					</td>
				</tr>
			</table>
	</td>
	<td align="center" valign="top">
		<table width="100%" height="195" border="0" cellpadding="0" cellspacing="0" class="big_td">
			<tr>
			<td height="20" align="center" valign="middle" scope="col">活动安排</td>
			</tr>
			<tr>
				<td align="center" valign="top">
				<!--活动-->
					<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
						<tr>
						<td height="25" align="center" valign="middle">发布时间</td>
						<td align="center" valign="middle">标题</td>
						</tr>
						<?php unset($this->_sections['pers_id']);
$this->_sections['pers_id']['name'] = 'pers_id';
$this->_sections['pers_id']['loop'] = is_array($_loop=$this->_tpl_vars['pers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pers_id']['show'] = true;
$this->_sections['pers_id']['max'] = $this->_sections['pers_id']['loop'];
$this->_sections['pers_id']['step'] = 1;
$this->_sections['pers_id']['start'] = $this->_sections['pers_id']['step'] > 0 ? 0 : $this->_sections['pers_id']['loop']-1;
if ($this->_sections['pers_id']['show']) {
    $this->_sections['pers_id']['total'] = $this->_sections['pers_id']['loop'];
    if ($this->_sections['pers_id']['total'] == 0)
        $this->_sections['pers_id']['show'] = false;
} else
    $this->_sections['pers_id']['total'] = 0;
if ($this->_sections['pers_id']['show']):

            for ($this->_sections['pers_id']['index'] = $this->_sections['pers_id']['start'], $this->_sections['pers_id']['iteration'] = 1;
                 $this->_sections['pers_id']['iteration'] <= $this->_sections['pers_id']['total'];
                 $this->_sections['pers_id']['index'] += $this->_sections['pers_id']['step'], $this->_sections['pers_id']['iteration']++):
$this->_sections['pers_id']['rownum'] = $this->_sections['pers_id']['iteration'];
$this->_sections['pers_id']['index_prev'] = $this->_sections['pers_id']['index'] - $this->_sections['pers_id']['step'];
$this->_sections['pers_id']['index_next'] = $this->_sections['pers_id']['index'] + $this->_sections['pers_id']['step'];
$this->_sections['pers_id']['first']      = ($this->_sections['pers_id']['iteration'] == 1);
$this->_sections['pers_id']['last']       = ($this->_sections['pers_id']['iteration'] == $this->_sections['pers_id']['total']);
?>
						<tr>
							<td height=30 style='text-indent: 30px;' align=left valign=middle><?php echo $this->_tpl_vars['pers'][$this->_sections['pers_id']['index']]['p_time']; ?>
</td>
							<td align="left" valign="middle" style='text-indent: 30px;'>
								<a href="show_message.php?id=<?php echo $this->_tpl_vars['pers'][$this->_sections['pers_id']['index']]['id']; ?>
" target='_blank'>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['pers'][$this->_sections['pers_id']['index']]['p_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", false) : smarty_modifier_truncate($_tmp, 20, "...", false)); ?>

								</a>
							</td>
						</tr>
						<?php endfor; endif; ?>
					</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
	<td width="50%" align="center" valign="top">
		<table width="100%" height="195" border="0" cellpadding="0" cellspacing="0" class="big_td">
			<tr>
				<td height="20" align="center" valign="middle">个人计划</td>
			</tr>
			<tr>
			<td align="center" valign="top">
			<!--个人计划-->
				<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
					<tr>
					<td width="75" height="25" align="center" valign="middle">日期</td>
					<td align="center" valign="middle">内容提要</td>
					<td align="center" valign="middle">类型</td>
					</tr>
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
						<?php unset($this->_sections['list_id']);
$this->_sections['list_id']['name'] = 'list_id';
$this->_sections['list_id']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list_id']['show'] = true;
$this->_sections['list_id']['max'] = $this->_sections['list_id']['loop'];
$this->_sections['list_id']['step'] = 1;
$this->_sections['list_id']['start'] = $this->_sections['list_id']['step'] > 0 ? 0 : $this->_sections['list_id']['loop']-1;
if ($this->_sections['list_id']['show']) {
    $this->_sections['list_id']['total'] = $this->_sections['list_id']['loop'];
    if ($this->_sections['list_id']['total'] == 0)
        $this->_sections['list_id']['show'] = false;
} else
    $this->_sections['list_id']['total'] = 0;
if ($this->_sections['list_id']['show']):

            for ($this->_sections['list_id']['index'] = $this->_sections['list_id']['start'], $this->_sections['list_id']['iteration'] = 1;
                 $this->_sections['list_id']['iteration'] <= $this->_sections['list_id']['total'];
                 $this->_sections['list_id']['index'] += $this->_sections['list_id']['step'], $this->_sections['list_id']['iteration']++):
$this->_sections['list_id']['rownum'] = $this->_sections['list_id']['iteration'];
$this->_sections['list_id']['index_prev'] = $this->_sections['list_id']['index'] - $this->_sections['list_id']['step'];
$this->_sections['list_id']['index_next'] = $this->_sections['list_id']['index'] + $this->_sections['list_id']['step'];
$this->_sections['list_id']['first']      = ($this->_sections['list_id']['iteration'] == 1);
$this->_sections['list_id']['last']       = ($this->_sections['list_id']['iteration'] == $this->_sections['list_id']['total']);
?>
							<?php if ($this->_tpl_vars['psql'][$this->_sections['psql_id']['index']]['p_type'] == $this->_tpl_vars['list'][$this->_sections['list_id']['index']]['id']): ?>
								<tr>
								<td height="30" align="center" valign="middle"><?php echo $this->_tpl_vars['psql'][$this->_sections['psql_id']['index']]['p_time']; ?>
 </td>
								<td align="left" valign="middle"><?php echo ((is_array($_tmp=$this->_tpl_vars['psql'][$this->_sections['psql_id']['index']]['p_plan'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "...", false) : smarty_modifier_truncate($_tmp, 10, "...", false)); ?>
&nbsp;&nbsp;&nbsp;&nbsp;<a href='show_plan.php?id=<?php echo $this->_tpl_vars['psql'][$this->_sections['psql_id']['index']]['id']; ?>
' target='_blank'>查看全文</a></td>
								<td width="50" align="center" valign="middle"><?php echo $this->_tpl_vars['list'][$this->_sections['list_id']['index']]['f_name']; ?>
</td>
								</tr>
							<?php endif; ?>
						<?php endfor; endif; ?>
					<?php endfor; endif; ?>
					<?php echo $this->_tpl_vars['rst1_page']; ?>

				</table>
			</td>
			</tr>
		</table>
	</td>
	<td align="center" valign="top">
		<table width="100%" height="195" border="0" cellpadding="0" cellspacing="0" class="big_td">
			<tr>
				<td height="20" align="center" valign="middle" scope="col">审核批示</td>
			</tr>
			<tr>
				<td align="center" valign="top">
				<!--审核批示-->
				<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
					<tr>
					<td width="75" height="25" align="center" valign="middle">日期</td>
					<td height="25" align="center" valign="middle">标题</td>
					<td width="50" height="25" align="center" valign="middle">是否批示</td>
					<td width="75" height="25" align="center" valign="middle">操作</td>
					</tr>
					<?php unset($this->_sections['asql_id']);
$this->_sections['asql_id']['name'] = 'asql_id';
$this->_sections['asql_id']['loop'] = is_array($_loop=$this->_tpl_vars['asql']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['asql_id']['show'] = true;
$this->_sections['asql_id']['max'] = $this->_sections['asql_id']['loop'];
$this->_sections['asql_id']['step'] = 1;
$this->_sections['asql_id']['start'] = $this->_sections['asql_id']['step'] > 0 ? 0 : $this->_sections['asql_id']['loop']-1;
if ($this->_sections['asql_id']['show']) {
    $this->_sections['asql_id']['total'] = $this->_sections['asql_id']['loop'];
    if ($this->_sections['asql_id']['total'] == 0)
        $this->_sections['asql_id']['show'] = false;
} else
    $this->_sections['asql_id']['total'] = 0;
if ($this->_sections['asql_id']['show']):

            for ($this->_sections['asql_id']['index'] = $this->_sections['asql_id']['start'], $this->_sections['asql_id']['iteration'] = 1;
                 $this->_sections['asql_id']['iteration'] <= $this->_sections['asql_id']['total'];
                 $this->_sections['asql_id']['index'] += $this->_sections['asql_id']['step'], $this->_sections['asql_id']['iteration']++):
$this->_sections['asql_id']['rownum'] = $this->_sections['asql_id']['iteration'];
$this->_sections['asql_id']['index_prev'] = $this->_sections['asql_id']['index'] - $this->_sections['asql_id']['step'];
$this->_sections['asql_id']['index_next'] = $this->_sections['asql_id']['index'] + $this->_sections['asql_id']['step'];
$this->_sections['asql_id']['first']      = ($this->_sections['asql_id']['iteration'] == 1);
$this->_sections['asql_id']['last']       = ($this->_sections['asql_id']['iteration'] == $this->_sections['asql_id']['total']);
?>
					<tr>
						<td height="30" align="center" valign="middle"><?php echo $this->_tpl_vars['asql'][$this->_sections['asql_id']['index']]['i_time']; ?>
</td>
						<td height="30" align="left" valign="middle"><?php echo $this->_tpl_vars['asql'][$this->_sections['asql_id']['index']]['i_title']; ?>
</td>
						<td height="30" align="center" valign="middle">
							<?php if ($this->_tpl_vars['asql'][$this->_sections['asql_id']['index']]['i_state'] == 3): ?>
							未审核
							<?php elseif ($this->_tpl_vars['asql'][$this->_sections['asql_id']['index']]['i_state'] == 0): ?>
							未通过
							<?php else: ?>
							通过
							<?php endif; ?>
						</td>
						<td height="30" align="center" valign="middle">
							<a href="modify_issuance.php?id=<?php echo $this->_tpl_vars['asql'][$this->_sections['asql_id']['index']]['id']; ?>
">修改</a>||
							<a href="del_issuance_chk.php?id=<?php echo $this->_tpl_vars['asql'][$this->_sections['asql_id']['index']]['id']; ?>
">删除</a>
						</td>
					</tr>
					<?php endfor; endif; ?>
				</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>