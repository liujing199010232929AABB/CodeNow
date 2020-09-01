<?php /* Smarty version 2.6.19, created on 2016-09-27 16:01:44
         compiled from addemattr.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'addemattr.phtml', 37, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<div id="con_right">
    <div class="right_con">
        <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
        <br />
        <br />
        <br />
        <DIV class="right_con_form">
            <form name="form_emttr" method="post" action="" onsubmit="return chkEmttr(this)">
                <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">
                    总分：<input type="text" name="totalscore" size="30" class="input"/><br /><br />
                    <br />
                    分数线：<input type="text" name="passscore" size="30" class="input"/><br /><br />
                    <input type="submit" name="addemattr" value="添加" />&nbsp;&nbsp;<input type="reset" value="重置" />
                </div>
            </form>
        </DIV>
        <BR>
        <DIV style="padding-left:56px; padding-top:56px;text-align: center">
            <DIV style="padding-left:6px; text-align: center">
                <UL>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">序号</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">总分</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">分数线</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">操作</LI>
                </UL>
            </DIV>
            <?php  $i = 1; ?>
            <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['emattrArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tID']['show'] = true;
$this->_sections['tID']['max'] = $this->_sections['tID']['loop'];
$this->_sections['tID']['step'] = 1;
$this->_sections['tID']['start'] = $this->_sections['tID']['step'] > 0 ? 0 : $this->_sections['tID']['loop']-1;
if ($this->_sections['tID']['show']) {
    $this->_sections['tID']['total'] = $this->_sections['tID']['loop'];
    if ($this->_sections['tID']['total'] == 0)
        $this->_sections['tID']['show'] = false;
} else
    $this->_sections['tID']['total'] = 0;
if ($this->_sections['tID']['show']):

            for ($this->_sections['tID']['index'] = $this->_sections['tID']['start'], $this->_sections['tID']['iteration'] = 1;
                 $this->_sections['tID']['iteration'] <= $this->_sections['tID']['total'];
                 $this->_sections['tID']['index'] += $this->_sections['tID']['step'], $this->_sections['tID']['iteration']++):
$this->_sections['tID']['rownum'] = $this->_sections['tID']['iteration'];
$this->_sections['tID']['index_prev'] = $this->_sections['tID']['index'] - $this->_sections['tID']['step'];
$this->_sections['tID']['index_next'] = $this->_sections['tID']['index'] + $this->_sections['tID']['step'];
$this->_sections['tID']['first']      = ($this->_sections['tID']['iteration'] == 1);
$this->_sections['tID']['last']       = ($this->_sections['tID']['iteration'] == $this->_sections['tID']['total']);
?>
            <DIV style="padding-left:6px; text-align: center">
                <UL>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER:#21de26 1px solid;"><?php echo $i; ?></LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER:#21de26 1px solid;"><?php echo $this->_tpl_vars['emattrArr'][$this->_sections['tID']['index']]['totalscore']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER:#21de26 1px solid;"><?php echo $this->_tpl_vars['emattrArr'][$this->_sections['tID']['index']]['passscore']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER:#21de26 1px solid;">
                        <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/addemattr.php?f=edit&id=<?php echo $this->_tpl_vars['emattrArr'][$this->_sections['tID']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
">更改</a>&nbsp;<a href="javascript:if(window.confirm('确定删除？')==true){window.location.href='<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/addemattr.php?f=del&id=<?php echo $this->_tpl_vars['emattrArr'][$this->_sections['tID']['index']]['id']; ?>
&big_type=<?php echo $_GET['big_type']; ?>
&small_type=<?php echo $_GET['small_type']; ?>
';}">删除</a>
                    </LI>
                </UL>
            </DIV>
            <?php  $i++; ?>
            <?php endfor; endif; ?>
        </DIV>
        <?php if ($this->_tpl_vars['isShow'] == 'T'): ?>
        <div class="right_con_form">
            <form name="form_editemattr" method="post" action="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/addemattr.php?big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" >
                <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">
                    总分：<input type="text" id="totalscore" name="totalscore" size="30" class="input" value="<?php echo $this->_tpl_vars['bigtype'][0]['totalscore']; ?>
"/><br /><br />
                    <br />
                    <br />
                    分数线：<input type="text" id="passscore" name="passscore" size="30" class="input" value="<?php echo $this->_tpl_vars['bigtype'][0]['passscore']; ?>
"/><br /><br />
                    <input type="hidden" name="f" value="edit" />
                    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['bigtype'][0]['id']; ?>
" />
                    <input type="submit" name="editemattr" value="更改" />
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>

<script language="javascript">
<?php echo '
    function chkEmttr (form) {
    if (form.totalscore.value == "") {
        alert("请输入总分！");
        form.totalscore.focus();
        return false;
    }
    if (isNaN(form.totalscore.value)) {
        alert("请输入数字！");
        form.totalscore.focus();
        return false;
    }
    if (form.passscore.value == "") {
        alert("请输入分数线！");
        form.totalscore.focus();
        return false;
    }
    if (isNaN(form.passscore.value)) {
        alert("请输入数字！");
        form.totalscore.focus();
        return false;
    }
    if (new Number(form.passscore.value) >= new Number(form.totalscore.value)) {
        alert("分数线不能大于等于总分，请重新填写！");
        form.totalscore.focus();
        return false;
    }
    return true;
    }

'; ?>

</script>