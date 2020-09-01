<?php /* Smarty version 2.6.19, created on 2016-07-23 14:05:29
         compiled from zytd/personnel_air.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人设定</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
</head>
<body>
<table width="765" border="0" cellpadding="0" cellspacing="0" style="margin-top:15px; border: 1px;">
    <tr>
        <td height="33" background="images/list.jpg" id="list" style=" border: inset 1px; "><?php echo $this->_tpl_vars['f_name']; ?>
</td>
    </tr>
    <tr>
        <td align="center" valign="top">
        <?php if ($this->_tpl_vars['u_id'] == 6): ?>   <!--职员浏览-->
            <table width="300" border="1" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF" class="big_td">
                <tr>
                    <td width="75" height="25" align="center" valign="middle" scope="col">编号</td>
                    <td width="75" align="center" valign="middle" scope="col">姓名</td>
                    <td width="75" align="center" valign="middle" scope="col">性别</td>
                    <td width="75" align="center" valign="middle" scope="col">部门</td>
                </tr>
                <?php unset($this->_sections['usr_id']);
$this->_sections['usr_id']['name'] = 'usr_id';
$this->_sections['usr_id']['loop'] = is_array($_loop=$this->_tpl_vars['usr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['usr_id']['show'] = true;
$this->_sections['usr_id']['max'] = $this->_sections['usr_id']['loop'];
$this->_sections['usr_id']['step'] = 1;
$this->_sections['usr_id']['start'] = $this->_sections['usr_id']['step'] > 0 ? 0 : $this->_sections['usr_id']['loop']-1;
if ($this->_sections['usr_id']['show']) {
    $this->_sections['usr_id']['total'] = $this->_sections['usr_id']['loop'];
    if ($this->_sections['usr_id']['total'] == 0)
        $this->_sections['usr_id']['show'] = false;
} else
    $this->_sections['usr_id']['total'] = 0;
if ($this->_sections['usr_id']['show']):

            for ($this->_sections['usr_id']['index'] = $this->_sections['usr_id']['start'], $this->_sections['usr_id']['iteration'] = 1;
                 $this->_sections['usr_id']['iteration'] <= $this->_sections['usr_id']['total'];
                 $this->_sections['usr_id']['index'] += $this->_sections['usr_id']['step'], $this->_sections['usr_id']['iteration']++):
$this->_sections['usr_id']['rownum'] = $this->_sections['usr_id']['iteration'];
$this->_sections['usr_id']['index_prev'] = $this->_sections['usr_id']['index'] - $this->_sections['usr_id']['step'];
$this->_sections['usr_id']['index_next'] = $this->_sections['usr_id']['index'] + $this->_sections['usr_id']['step'];
$this->_sections['usr_id']['first']      = ($this->_sections['usr_id']['iteration'] == 1);
$this->_sections['usr_id']['last']       = ($this->_sections['usr_id']['iteration'] == $this->_sections['usr_id']['total']);
?>
                <tr>
                    <td align="center" valign="middle"><?php echo $this->_tpl_vars['usr'][$this->_sections['usr_id']['index']]['id']; ?>
</td>
                    <td align="center" valign="middle"><?php echo $this->_tpl_vars['usr'][$this->_sections['usr_id']['index']]['u_name']; ?>
</td>
                    <td align="center" valign="middle"><?php echo $this->_tpl_vars['usr'][$this->_sections['usr_id']['index']]['u_sex']; ?>
</td>
                    <td align="center" valign="middle">&nbsp;
                    <?php unset($this->_sections['dep_id']);
$this->_sections['dep_id']['name'] = 'dep_id';
$this->_sections['dep_id']['loop'] = is_array($_loop=$this->_tpl_vars['dep']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dep_id']['show'] = true;
$this->_sections['dep_id']['max'] = $this->_sections['dep_id']['loop'];
$this->_sections['dep_id']['step'] = 1;
$this->_sections['dep_id']['start'] = $this->_sections['dep_id']['step'] > 0 ? 0 : $this->_sections['dep_id']['loop']-1;
if ($this->_sections['dep_id']['show']) {
    $this->_sections['dep_id']['total'] = $this->_sections['dep_id']['loop'];
    if ($this->_sections['dep_id']['total'] == 0)
        $this->_sections['dep_id']['show'] = false;
} else
    $this->_sections['dep_id']['total'] = 0;
if ($this->_sections['dep_id']['show']):

            for ($this->_sections['dep_id']['index'] = $this->_sections['dep_id']['start'], $this->_sections['dep_id']['iteration'] = 1;
                 $this->_sections['dep_id']['iteration'] <= $this->_sections['dep_id']['total'];
                 $this->_sections['dep_id']['index'] += $this->_sections['dep_id']['step'], $this->_sections['dep_id']['iteration']++):
$this->_sections['dep_id']['rownum'] = $this->_sections['dep_id']['iteration'];
$this->_sections['dep_id']['index_prev'] = $this->_sections['dep_id']['index'] - $this->_sections['dep_id']['step'];
$this->_sections['dep_id']['index_next'] = $this->_sections['dep_id']['index'] + $this->_sections['dep_id']['step'];
$this->_sections['dep_id']['first']      = ($this->_sections['dep_id']['iteration'] == 1);
$this->_sections['dep_id']['last']       = ($this->_sections['dep_id']['iteration'] == $this->_sections['dep_id']['total']);
?>
                        <?php if ($this->_tpl_vars['usr'][$this->_sections['usr_id']['index']]['u_depart'] == $this->_tpl_vars['dep'][$this->_sections['dep_id']['index']]['id']): ?>
                            <?php echo $this->_tpl_vars['dep'][$this->_sections['dep_id']['index']]['d_name']; ?>

                        <?php endif; ?>
                    <?php endfor; endif; ?>
                    </td>
                </tr>
                <?php endfor; endif; ?>
            </table>
        <?php elseif ($this->_tpl_vars['u_id'] == 4): ?>  <!--个人设定-->

            <?php unset($this->_sections['t_id']);
$this->_sections['t_id']['name'] = 't_id';
$this->_sections['t_id']['loop'] = is_array($_loop=$this->_tpl_vars['t_user']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t_id']['show'] = true;
$this->_sections['t_id']['max'] = $this->_sections['t_id']['loop'];
$this->_sections['t_id']['step'] = 1;
$this->_sections['t_id']['start'] = $this->_sections['t_id']['step'] > 0 ? 0 : $this->_sections['t_id']['loop']-1;
if ($this->_sections['t_id']['show']) {
    $this->_sections['t_id']['total'] = $this->_sections['t_id']['loop'];
    if ($this->_sections['t_id']['total'] == 0)
        $this->_sections['t_id']['show'] = false;
} else
    $this->_sections['t_id']['total'] = 0;
if ($this->_sections['t_id']['show']):

            for ($this->_sections['t_id']['index'] = $this->_sections['t_id']['start'], $this->_sections['t_id']['iteration'] = 1;
                 $this->_sections['t_id']['iteration'] <= $this->_sections['t_id']['total'];
                 $this->_sections['t_id']['index'] += $this->_sections['t_id']['step'], $this->_sections['t_id']['iteration']++):
$this->_sections['t_id']['rownum'] = $this->_sections['t_id']['iteration'];
$this->_sections['t_id']['index_prev'] = $this->_sections['t_id']['index'] - $this->_sections['t_id']['step'];
$this->_sections['t_id']['index_next'] = $this->_sections['t_id']['index'] + $this->_sections['t_id']['step'];
$this->_sections['t_id']['first']      = ($this->_sections['t_id']['iteration'] == 1);
$this->_sections['t_id']['last']       = ($this->_sections['t_id']['iteration'] == $this->_sections['t_id']['total']);
?>
                <table width="765" border="1" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF" class="big_td">
                    <form name="form1" method="post" action="personnel_air_chk.php">
                        <tr>
                            <td width="100" height="25" align="right" valign="middle" scope="col"><span class="STYLE1">*</span>员工昵称：</td>
                            <td width="150" height="25" align="left" valign="middle" scope="col"><input name="u_user" type="text" size="10" value="<?php echo $this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['u_user']; ?>
" readonly="readonly" /></td>
                            <td width="100" height="25" align="right" valign="middle" scope="col"><span class="STYLE1">*</span>姓名：</td>
                            <td width="300" height="25" align="left" valign="middle" scope="col"><input type="text" name="u_name" size="15" value="<?php echo $this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['u_name']; ?>
" /></td>
                        </tr>
                        <tr>
                            <td width="100" height="25" align="right" valign="middle">性别：</td>
                            <td width="150" height="25" align="left" valign="middle">
                                <select name="u_sex">
                                <?php if ($this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['u_sex'] == "男"): ?>
                                <option value="男" selected="selected">男</option>
                                <option value="女">女</option>
                                <?php else: ?>
                                <option value="男">男</option>
                                <option value="女" selected="selected">女</option>
                                <?php endif; ?>
                                </select>
                            </td>
                            <td width="100" height="25" align="right" valign="middle">出生日期：</td>
                            <td width="300" align="left" valign="middle"><input type="text" name="u_birth" size="15" value="<?php echo $this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['u_birth']; ?>
"  /></td>
                        </tr>
                        <tr>
                            <td width="100" height="25" align="right" valign="middle">E-mail：</td>
                            <td width="150" height="25" align="left" valign="middle">
                                <input type="text" name="u_email" size="15" value="<?php echo $this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['u_email']; ?>
" />
                            </td>
                            <td width="100" height="25" align="right" valign="middle">员工电话：</td>
                            <td width="300" height="25" align="left" valign="middle">
                                <input type="text" name="u_tel" size="15" value="<?php echo $this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['u_tel']; ?>
"  />
                            </td>
                        </tr>
                        <tr>
                            <td height="25" colspan="2" align="center" valign="middle">
                                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['id']; ?>
" />
                                <input name="submit" type="submit" value="修改" />
                                <input name="reset" type="reset" value="重置" />
                            </td>
                            <td height="25" align="right" valign="middle">地址：      </td>
                            <td height="25" align="left" valign="middle">
                                <input type="text" name="u_address" size="40" value="<?php echo $this->_tpl_vars['t_user'][$this->_sections['t_id']['index']]['u_address']; ?>
" />
                            </td>
                        </tr>
                    </form>
                </table>
            <?php endfor; endif; ?>
        <?php endif; ?>
    </td>
    </tr>
</table>
</body>
</html>