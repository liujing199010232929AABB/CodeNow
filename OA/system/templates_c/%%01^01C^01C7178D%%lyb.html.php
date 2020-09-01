<?php /* Smarty version 2.6.19, created on 2016-07-23 14:14:27
         compiled from zytd/lyb.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>意见箱</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
</head>

<body>
    <table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
        <tr>
            <td height="33" background="images/list.jpg" id="list"><?php echo $this->_tpl_vars['f_name']; ?>
</td>
        </tr>
    </table>
    <table width="765" border="0" cellspacing="0" cellpadding="0" bgcolor="#DEEBEF" class="big_td">
        <tr>
            <td width="15%" height="30" align="left" valign="middle" scope="col">
                2016-1-1
            </td>
            <td align="center" valign="middle" scope="col">注意事项</td>
            <td width="15%" align="center" valign="middle" scope="col"></td>
        </tr>
        <tr>
            <td height="100" colspan="3" align="left" valign="middle" scope="col">
            如果对公司有好的建议或意见，请在这里提出。此处发言，完全为匿名，请不要有任何顾虑~
            <p><font color=red>注意：不允许进行人身攻击。否则删帖!!</font>
            </td>
        </tr>
        <?php unset($this->_sections['rec_id']);
$this->_sections['rec_id']['name'] = 'rec_id';
$this->_sections['rec_id']['loop'] = is_array($_loop=$this->_tpl_vars['rec']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rec_id']['show'] = true;
$this->_sections['rec_id']['max'] = $this->_sections['rec_id']['loop'];
$this->_sections['rec_id']['step'] = 1;
$this->_sections['rec_id']['start'] = $this->_sections['rec_id']['step'] > 0 ? 0 : $this->_sections['rec_id']['loop']-1;
if ($this->_sections['rec_id']['show']) {
    $this->_sections['rec_id']['total'] = $this->_sections['rec_id']['loop'];
    if ($this->_sections['rec_id']['total'] == 0)
        $this->_sections['rec_id']['show'] = false;
} else
    $this->_sections['rec_id']['total'] = 0;
if ($this->_sections['rec_id']['show']):

            for ($this->_sections['rec_id']['index'] = $this->_sections['rec_id']['start'], $this->_sections['rec_id']['iteration'] = 1;
                 $this->_sections['rec_id']['iteration'] <= $this->_sections['rec_id']['total'];
                 $this->_sections['rec_id']['index'] += $this->_sections['rec_id']['step'], $this->_sections['rec_id']['iteration']++):
$this->_sections['rec_id']['rownum'] = $this->_sections['rec_id']['iteration'];
$this->_sections['rec_id']['index_prev'] = $this->_sections['rec_id']['index'] - $this->_sections['rec_id']['step'];
$this->_sections['rec_id']['index_next'] = $this->_sections['rec_id']['index'] + $this->_sections['rec_id']['step'];
$this->_sections['rec_id']['first']      = ($this->_sections['rec_id']['iteration'] == 1);
$this->_sections['rec_id']['last']       = ($this->_sections['rec_id']['iteration'] == $this->_sections['rec_id']['total']);
?>
        <tr>
            <td width="15%" height="30" align="left" valign="middle" scope="col"><?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['l_time']; ?>
</td>
            <td align="left" valign="middle" scope="col">主题：<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['l_title']; ?>
</td>
            <td width="15%" align="center" valign="middle" scope="col">
                <?php if ($_SESSION['u_depart'] == $this->_tpl_vars['str']): ?>
                    <a href="t_back.php?u_id=<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['id']; ?>
">回复</a>&nbsp;&nbsp;<a href="del_ly_chk.php?id=<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['id']; ?>
" onclick="return del_mess()">删除</a>
                <?php endif; ?>&nbsp;
            </td>
        </tr>
        <tr>
            <td height="75" colspan="3" align="left" valign="middle" scope="col" >
            <?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['l_content']; ?>

            </td>
        </tr>
        <?php if ($this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['is_replay'] == 1): ?>
            <tr>
            <td height="25" colspan="3" align="left" valign="middle" headers="50" scope="col" onmouseover="this.style.backgroundColor='#FFEEBC'" onmouseout="this.style.backgroundColor=''">
            <font color="#FF0000">
                <?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['r_back']; ?>

            </font>
            </td>
            </tr>
        <?php endif; ?>
        <?php endfor; endif; ?>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" bgcolor="#DEEBEF">
        <form id="lyb" name="lyb" method="post" action="lyb_chk.php">
            <tr>
                <td width="10%" height="30" align="right" valign="middle" scope="col">主题：</td>
                <td align="left" valign="middle" scope="col"><input type="text" name="l_title" size="30"></td>
            </tr>
            <tr>
                <td align="right" valign="middle" scope="col">内容：</td>
                <td height="150" align="left" valign="middle"><textarea name="l_content" cols="75" rows="10"></textarea></td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" valign="middle">
                    <input type="submit" value="提交" onclick="return add_lyb();">&nbsp;&nbsp;<input  type="reset" value="重置">
                </td>
            </tr>
        </form>
    </table>
</body>
</html>