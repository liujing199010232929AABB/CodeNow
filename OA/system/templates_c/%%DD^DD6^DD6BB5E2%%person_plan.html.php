<?php /* Smarty version 2.6.19, created on 2016-07-23 13:54:32
         compiled from grjh/person_plan.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'grjh/person_plan.html', 26, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>计划计划</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
    <script src="js/riq.js" ></script>
    <script src="js/laydate/laydate.js" ></script>
</head>
<body>
    <table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
        <tr>
            <td height="33" background="../images/list.jpg" id="list"><?php echo $this->_tpl_vars['f_na']; ?>
</td>
        </tr>
    </table>
    <table width="765" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF" class="big_td">
        <tr>
            <td width="80" height="25" align="center" valign="middle">日期</td>
            <td width="420" align="center" valign="middle">内容提要</td>
            <td width="50" align="center" valign="middle">类型</td>
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
            <td height="30"><?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_time']; ?>
</td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['res'][$this->_sections['res_id']['index']]['p_plan'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", false) : smarty_modifier_truncate($_tmp, 20, "...", false)); ?>
......<a href='show_plan.php?id=<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
' target='_blank'>查看全文</a></td>
            <td><?php echo $this->_tpl_vars['f_na']; ?>
</td>
            </tr>
        <?php endfor; endif; ?>
    </table>
    <table border="1" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
        <form name="form1" method="post" action="person_plan_chk.php">
            <tr>
                <td width="15%" height="25" align="right" valign="middle">日期</td>
                <td>
                    <input name="p_date" placeholder="请输入日期" class="laydate-icon" readonly="readonly" onclick="laydate()">
                </td>
            </tr>
            <tr>
                <td align="right" valign="middle">内容：</td>
                <td align="left" valign="middle"><textarea name="p_content" cols="50" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center" valign="middle">
                    <input type="hidden" name="p_type" value="<?php echo $this->_tpl_vars['u_id']; ?>
" />
                    <input type="submit" value="提交" />
                </td>
            </tr>
        </form>
    </table>
</body>
</html>