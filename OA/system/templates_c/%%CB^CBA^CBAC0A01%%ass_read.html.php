<?php /* Smarty version 2.6.19, created on 2016-07-22 17:32:28
         compiled from qyjx/ass_read.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8" />
    <title>绩效评定</title>
    <link   href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
    <script src="js/riq.js"></script>
    <script src="js/laydate/laydate.js"></script>
</head>
<body>
    <table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
        <tr>
            <td height="33" background="images/list.jpg" id="list">绩效评比</td>
        </tr>
    </table>
    <form name="form1" method="post" action="ass_read_chk.php">
        <table width="450" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
            <tr>
                <td height="25" colspan="3" align="center" valign="middle" scope="col">从
                    <input name="s_fmonth" placeholder="请输入开始日期" class="laydate-icon" readonly="readonly" onclick="laydate()">
                    到
                    <input name="s_lmonth" placeholder="请输入结束日期" class="laydate-icon" readonly="readonly" onclick="laydate()">
                </td>
            </tr>
            <tr>
                <td width="189" align="right" valign="middle">
                    <SELECT name="left" size="10" multiple style="width:100px; ">
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
                    <option value="<?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['res'][$this->_sections['res_id']['index']]['u_name']; ?>
</option>
                    <?php endfor; endif; ?>
                    </SELECT>
                </td>
                <td width="96" align="center" valign="middle">
                    <a href="#" onClick="moveSelected(document.form1.left,document.form1.right)">优秀员工&gt;&gt;</a><br>
                    <br>
                    <a href="#" onClick="moveSelected(document.form1.right,document.form1.left)">&lt;&lt;删除员工</a>
                </td>
                <td align="left" valign="middle">
                    <select name="right" size="10" multiple style="width:100px; "></select>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="3" align="center" valign="middle">
                    <input type="hidden" name="s_id" />
                    <input type="submit" value="添加" onClick="return glist()" />
                    <input type="reset"  value="重置" />
                </td>
            </tr>
        </table>
    </form>

</body>
</html>