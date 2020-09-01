<?php /* Smarty version 2.6.19, created on 2016-09-27 16:01:47
         compiled from managetemplate.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'managetemplate.phtml', 29, false),array('function', 'html_options', 'managetemplate.phtml', 48, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<SCRIPT src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/jquery.js"></SCRIPT>
<div id="con_right">
    <div class="right_con">
        <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
        <br />
        <br />
        <br />
        <DIV style="padding-left:56px; padding-top:56px;">
            <DIV style="padding-left:6px; ">
                <UL>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">序号</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">模板名称</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">分数线</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">试题分布</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER:#21de26 1px solid;">操作</LI>
                </UL>
            </DIV>
            <?php  $i = 1; ?>
            <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['template']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <DIV style="padding-left:6px; ">
                <UL>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 73px; BORDER:#21de26 1px solid;"><?php echo $i; ?></LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 73px; BORDER:#21de26 1px solid;"><?php echo $this->_tpl_vars['template'][$this->_sections['tID']['index']]['name']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 73px; BORDER:#21de26 1px solid;"><?php echo $this->_tpl_vars['template'][$this->_sections['tID']['index']]['score']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 73px; BORDER:#21de26 1px solid;"><?php echo $this->_tpl_vars['template'][$this->_sections['tID']['index']]['type']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 73px; BORDER:#21de26 1px solid;">
                        <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/managetemplate.php?f=edit&id=<?php echo $this->_tpl_vars['template'][$this->_sections['tID']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
">更改</a>&nbsp;<a href="javascript:if(window.confirm('确定删除？')==true){window.location.href='<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/managetemplate.php?f=del&id=<?php echo $this->_tpl_vars['template'][$this->_sections['tID']['index']]['id']; ?>
&big_type=<?php echo $_GET['big_type']; ?>
&small_type=<?php echo $_GET['small_type']; ?>
';}">删除</a>
                    </LI>
                </UL>
            </DIV>
            <?php  $i++; ?>
            <?php endfor; endif; ?>
        </DIV>
        <BR>
        <?php if ($this->_tpl_vars['isShow'] == 'T'): ?>
        <DIV class="right_con_form">
            <form name="form_templateupdate" method="post" action="" onsubmit="return chktemplate(this)">
                <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">

                    <br />
                    <br />
                    模板名称：<input type="text" id="templatename" name="templatename" size="30" class="input" value="<?php echo $this->_tpl_vars['temp']['name']; ?>
"/><br/><br/>
                    分数和分数线：
                    <select name="passscore">
                        <option value="">请选择</option>
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayScore'],'selected' => $this->_tpl_vars['temp']['emattrid']), $this);?>

                    </select>
                    <br/>
                    <br/>
                    <DIV style="padding-left:6px; padding-top:26px;">
                        请输入题型个数（不填写代表0）<br/><br/>
                        <?php  $i = 1; ?>
                        <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam_type']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <DIV >
                            <?php $this->assign('kk', $this->_tpl_vars['tb_exam_type'][$this->_sections['tID']['index']]['english']); ?>
                            <?php  echo $i; ?>、<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['tID']['index']]['chinese']; ?>
:<input type="text" name="<?php echo $this->_tpl_vars['kk']; ?>
num" value="<?php echo $this->_tpl_vars['temp'][$this->_tpl_vars['kk']]; ?>
" class="input"/><br/><br/>
                        </DIV>
                        <?php  $i++; ?>
                        <?php endfor; endif; ?>
                        <br/>
                        <br/>
                        <input type="hidden" name="f" value="edit" />
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['bigtype'][0]['id']; ?>
" />
                        <input type="submit" name="updatetemp" value="更改" />
                    </div>
            </form>
        </DIV>
        <?php endif; ?>
    </div>
</div>


<script language="javascript">
<?php echo '
    function chktemplate (form) {
        if (form.templatename.value == "") {
            alert("请输入模板名称！");
            form.templatename.focus();
            return false;
        }
        if (form.passscore.value == "") {
            alert("请选择分数线！");
            form.passscore.focus();
            return false;
        }
        $(":input[type=text][id!=\'templatename\']").each(function(){
            if(isNaN(this.value)){
                alert("请输入数字！");
                this.focus();
                return false;
            }
        })
        return true;
    }
'; ?>

</script>