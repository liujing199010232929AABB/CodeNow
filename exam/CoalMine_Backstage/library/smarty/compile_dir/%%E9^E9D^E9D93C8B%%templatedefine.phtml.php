<?php /* Smarty version 2.6.19, created on 2016-09-27 16:01:45
         compiled from templatedefine.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'templatedefine.phtml', 20, false),)), $this); ?>
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
        <DIV class="right_con_form">
            <form name="form_templatedefine" method="post" action="" onsubmit="return chktemplate(this)">
                <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">

                    <br />
                    <br />
                    模板名称：<input type="text" id="templatename" name="templatename" size="30" class="input"/><br/><br/>
                    分数和分数线：
                    <select name="passscore">
                        <option value="">请选择</option>
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayScore']), $this);?>

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
                            <?php  echo $i; ?>、<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['tID']['index']]['chinese']; ?>
:<input type="text" name="<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['tID']['index']]['english']; ?>
num" value="" class="input"/><br/><br/>
                        </DIV>
                        <?php  $i++; ?>
                        <?php endfor; endif; ?>
                        <br/>
                        <br/>
                    <input type="submit" name="submit" value="添加" />&nbsp;&nbsp;<input type="reset" value="重置" />
                </div>
            </form>
        </DIV>
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