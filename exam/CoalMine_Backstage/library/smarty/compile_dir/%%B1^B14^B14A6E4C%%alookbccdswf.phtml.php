<?php /* Smarty version 2.6.19, created on 2016-11-30 18:04:19
         compiled from alookbccdswf.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'alookbccdswf.phtml', 5, false),array('modifier', 'replace', 'alookbccdswf.phtml', 220, false),)), $this); ?>
<link rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/examinations.css">
<!--右侧-->
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
 ——————<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&pid=<?php echo $this->_tpl_vars['arrayRadio']['pid']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='radio')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1"> 单选</a>  /  <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='checkbox')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1"> 多选</a>   /  <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='judgment')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1"> 判断</a> /  <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='fill')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1"> 填空</a>
<!--	 /  <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='answer')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1"> 问答</a>
        /  <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='answer')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1"> 简答</a>  /  <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='discourse')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1"> 论述</a><br>-->
        <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['radioTypeArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <span style="padding-left: 200px;"><a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&pid=<?php echo $this->_tpl_vars['arrayRadio']['pid']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='radio')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&radio_type=<?php echo $this->_tpl_vars['radioTypeArr'][$this->_sections['tID']['index']]['english']; ?>
" class="a1"><?php echo $this->_tpl_vars['radioTypeArr'][$this->_sections['tID']['index']]['name']; ?>
</a></span><br>
        <?php endfor; endif; ?>
        <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['checkboxTypeArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <span style="padding-left: 250px;"><a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayCheckbox']['first']; ?>
&pid=<?php echo $this->_tpl_vars['arrayCheckbox']['pid']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='checkbox')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&checkbox_type=<?php echo $this->_tpl_vars['checkboxTypeArr'][$this->_sections['tID']['index']]['english']; ?>
" class="a1"><?php echo $this->_tpl_vars['checkboxTypeArr'][$this->_sections['tID']['index']]['name']; ?>
</a></span><br>
        <?php endfor; endif; ?>
        <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['fillTypeArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <span style="padding-left: 280px;"><a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayFill']['first']; ?>
&pid=<?php echo $this->_tpl_vars['arrayFill']['pid']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='fill')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&fill_type=<?php echo $this->_tpl_vars['fillTypeArr'][$this->_sections['tID']['index']]['english']; ?>
" class="a1"><?php echo $this->_tpl_vars['fillTypeArr'][$this->_sections['tID']['index']]['name']; ?>
</a></span><br>
        <?php endfor; endif; ?>
        <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['judgmentTypeArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <span style="padding-left: 330px;"><a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayJudgment']['first']; ?>
&pid=<?php echo $this->_tpl_vars['arrayJudgment']['pid']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='judgment')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&judgment_type=<?php echo $this->_tpl_vars['judgmentTypeArr'][$this->_sections['tID']['index']]['english']; ?>
" class="a1"><?php echo $this->_tpl_vars['judgmentTypeArr'][$this->_sections['tID']['index']]['name']; ?>
</a></span><br>
        <?php endfor; endif; ?>
        <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['answerTypeArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <span style="padding-left: 370px;"><a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayAnswer']['first']; ?>
&pid=<?php echo $this->_tpl_vars['arrayAnswer']['pid']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='answer')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&answer_type=<?php echo $this->_tpl_vars['answerTypeArr'][$this->_sections['tID']['index']]['english']; ?>
" class="a1"><?php echo $this->_tpl_vars['answerTypeArr'][$this->_sections['tID']['index']]['name']; ?>
</a></span><br>
        <?php endfor; endif; ?>
        <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['discourseTypeArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <span style="padding-left: 410px;"><a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayDiscourse']['first']; ?>
&pid=<?php echo $this->_tpl_vars['arrayDiscourse']['pid']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp='discourse')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&discourse_type=<?php echo $this->_tpl_vars['discourseTypeArr'][$this->_sections['tID']['index']]['english']; ?>
" class="a1"><?php echo $this->_tpl_vars['discourseTypeArr'][$this->_sections['tID']['index']]['name']; ?>
</a></span><br>
        <?php endfor; endif; ?>
    </div>

    <div class="right_con_form">
      <table id="brand" width="100%" border="1" >
    <tr>
    <td>&nbsp;</td>
  </tr>
              <?php if ($this->_tpl_vars['Radio'] == T): ?>
  <tr>
    <td> <span style="width:700px; float:left; padding-left:10px; padding-right:10px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"><?php echo $this->_tpl_vars['radioTitle']; ?>
题（选择一个正确答案字母）每题<?php echo $this->_tpl_vars['radioFraction']; ?>
分，共<?php if ($this->_tpl_vars['arrayRadio']['countRs'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['arrayRadio']['countRs']; ?>
<?php endif; ?>题。</span></td>
  </tr>
   <?php unset($this->_sections['rad_id']);
$this->_sections['rad_id']['name'] = 'rad_id';
$this->_sections['rad_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayRadio']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id']['show'] = true;
$this->_sections['rad_id']['max'] = $this->_sections['rad_id']['loop'];
$this->_sections['rad_id']['step'] = 1;
$this->_sections['rad_id']['start'] = $this->_sections['rad_id']['step'] > 0 ? 0 : $this->_sections['rad_id']['loop']-1;
if ($this->_sections['rad_id']['show']) {
    $this->_sections['rad_id']['total'] = $this->_sections['rad_id']['loop'];
    if ($this->_sections['rad_id']['total'] == 0)
        $this->_sections['rad_id']['show'] = false;
} else
    $this->_sections['rad_id']['total'] = 0;
if ($this->_sections['rad_id']['show']):

            for ($this->_sections['rad_id']['index'] = $this->_sections['rad_id']['start'], $this->_sections['rad_id']['iteration'] = 1;
                 $this->_sections['rad_id']['iteration'] <= $this->_sections['rad_id']['total'];
                 $this->_sections['rad_id']['index'] += $this->_sections['rad_id']['step'], $this->_sections['rad_id']['iteration']++):
$this->_sections['rad_id']['rownum'] = $this->_sections['rad_id']['iteration'];
$this->_sections['rad_id']['index_prev'] = $this->_sections['rad_id']['index'] - $this->_sections['rad_id']['step'];
$this->_sections['rad_id']['index_next'] = $this->_sections['rad_id']['index'] + $this->_sections['rad_id']['step'];
$this->_sections['rad_id']['first']      = ($this->_sections['rad_id']['iteration'] == 1);
$this->_sections['rad_id']['last']       = ($this->_sections['rad_id']['iteration'] == $this->_sections['rad_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"><?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
、<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['content']; ?>
</span> </span> <span class="kt_a">
        <?php if ($this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span><span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span><span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="F" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span>
        <?php elseif ($this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span><span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span>
        <?php elseif ($this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['search_list'] == 4): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span>
        <?php elseif ($this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['search_list'] == 3): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <?php else: ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <?php endif; ?> </span> 
              <span class="kt"> <span class="kt_t">答案：<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['answer']; ?>
</span> </span>
              <?php if ($this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['resolve'] != ""): ?>
                <span class="kt"> <span class="kt_t">解析：<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['resolve']; ?>
</span> </span>
              <?php endif; ?>
              <span class="kt"> <span class="kt_t">考题类别（
               	<?php unset($this->_sections['typ_id']);
$this->_sections['typ_id']['name'] = 'typ_id';
$this->_sections['typ_id']['loop'] = is_array($_loop=$this->_tpl_vars['bccdNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['typ_id']['show'] = true;
$this->_sections['typ_id']['max'] = $this->_sections['typ_id']['loop'];
$this->_sections['typ_id']['step'] = 1;
$this->_sections['typ_id']['start'] = $this->_sections['typ_id']['step'] > 0 ? 0 : $this->_sections['typ_id']['loop']-1;
if ($this->_sections['typ_id']['show']) {
    $this->_sections['typ_id']['total'] = $this->_sections['typ_id']['loop'];
    if ($this->_sections['typ_id']['total'] == 0)
        $this->_sections['typ_id']['show'] = false;
} else
    $this->_sections['typ_id']['total'] = 0;
if ($this->_sections['typ_id']['show']):

            for ($this->_sections['typ_id']['index'] = $this->_sections['typ_id']['start'], $this->_sections['typ_id']['iteration'] = 1;
                 $this->_sections['typ_id']['iteration'] <= $this->_sections['typ_id']['total'];
                 $this->_sections['typ_id']['index'] += $this->_sections['typ_id']['step'], $this->_sections['typ_id']['iteration']++):
$this->_sections['typ_id']['rownum'] = $this->_sections['typ_id']['iteration'];
$this->_sections['typ_id']['index_prev'] = $this->_sections['typ_id']['index'] - $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['index_next'] = $this->_sections['typ_id']['index'] + $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['first']      = ($this->_sections['typ_id']['iteration'] == 1);
$this->_sections['typ_id']['last']       = ($this->_sections['typ_id']['iteration'] == $this->_sections['typ_id']['total']);
?>
           			<?php if ($this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['pro_class'] == $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['id']): ?>
          				<?php echo $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['typename']; ?>

					<?php endif; ?>
          		<?php endfor; endif; ?>
              ）&nbsp;&nbsp;&nbsp; 分数（<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['fraction']; ?>
）&nbsp;&nbsp;&nbsp; <a href="aeditbccdswf.php?page=<?php echo $_GET['page']; ?>
&pro_type=<?php echo $_GET['pro_type']; ?>
&edit=t&id=<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改考题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['arrayRadio']['data'][$this->_sections['rad_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改考题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></span></span> 
              </td>
  </tr>
   <?php endfor; endif; ?>
       <br /> 
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['arrayRadio']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['arrayRadio']['countRs']; ?>
题&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['arrayRadio']['pageSize']; ?>
题&nbsp;&nbsp;第<?php echo $this->_tpl_vars['arrayRadio']['page']; ?>
页/共<?php echo $this->_tpl_vars['arrayRadio']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&radio_type=<?php echo $this->_tpl_vars['radioType']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&radio_type=<?php echo $this->_tpl_vars['radioType']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&radio_type=<?php echo $this->_tpl_vars['radioType']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&radio_type=<?php echo $this->_tpl_vars['radioType']; ?>
" class="a1">尾页</a></strong> </div>
        <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['arrayRadio']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
        <div style="width:3px; height:22px; float:left"></div>
        <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['arrayRadio']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayRadio']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayRadio']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['arrayRadio']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayRadio']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['arrayRadio']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['arrayRadio']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayRadio']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div> 
            <?php endif; ?>
            
            
            <?php if ($this->_tpl_vars['Checkbox'] == T): ?>
  
  <tr>
    <td><span style="width:700px; float:left; padding-left:10px; padding-right:10px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php echo $this->_tpl_vars['checkboxTitle']; ?>
题（选择两个或两个以上正确答案字母）每题<?php echo $this->_tpl_vars['checkboxFraction']; ?>
分，共<?php if ($this->_tpl_vars['arrayCheckbox']['countRs'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['arrayCheckbox']['countRs']; ?>
<?php endif; ?>题</span> </td>
  </tr>
    <?php unset($this->_sections['chk_id']);
$this->_sections['chk_id']['name'] = 'chk_id';
$this->_sections['chk_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayCheckbox']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['chk_id']['show'] = true;
$this->_sections['chk_id']['max'] = $this->_sections['chk_id']['loop'];
$this->_sections['chk_id']['step'] = 1;
$this->_sections['chk_id']['start'] = $this->_sections['chk_id']['step'] > 0 ? 0 : $this->_sections['chk_id']['loop']-1;
if ($this->_sections['chk_id']['show']) {
    $this->_sections['chk_id']['total'] = $this->_sections['chk_id']['loop'];
    if ($this->_sections['chk_id']['total'] == 0)
        $this->_sections['chk_id']['show'] = false;
} else
    $this->_sections['chk_id']['total'] = 0;
if ($this->_sections['chk_id']['show']):

            for ($this->_sections['chk_id']['index'] = $this->_sections['chk_id']['start'], $this->_sections['chk_id']['iteration'] = 1;
                 $this->_sections['chk_id']['iteration'] <= $this->_sections['chk_id']['total'];
                 $this->_sections['chk_id']['index'] += $this->_sections['chk_id']['step'], $this->_sections['chk_id']['iteration']++):
$this->_sections['chk_id']['rownum'] = $this->_sections['chk_id']['iteration'];
$this->_sections['chk_id']['index_prev'] = $this->_sections['chk_id']['index'] - $this->_sections['chk_id']['step'];
$this->_sections['chk_id']['index_next'] = $this->_sections['chk_id']['index'] + $this->_sections['chk_id']['step'];
$this->_sections['chk_id']['first']      = ($this->_sections['chk_id']['iteration'] == 1);
$this->_sections['chk_id']['last']       = ($this->_sections['chk_id']['iteration'] == $this->_sections['chk_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"> <?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
、<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['content']; ?>
</span> </span> <span class="kt_a">
        <?php if ($this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['search_list'] == 8): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span><span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">G</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="H" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">H</span>
        <?php elseif ($this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['search_list'] == 7): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span><span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">G</span>
        <?php elseif ($this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span>
        <?php elseif ($this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <?php else: ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <?php endif; ?> </span> 
              <span class="kt"> <span class="kt_t">答案：<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['answer']; ?>
</span> </span>
              <?php if ($this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['resolve'] != ""): ?>
                <span class="kt"> <span class="kt_t">解析：<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['resolve']; ?>
</span> </span>
              <?php endif; ?>

                   <span class="kt"> <span class="kt_t">试题类别（
               	<?php unset($this->_sections['typ_id']);
$this->_sections['typ_id']['name'] = 'typ_id';
$this->_sections['typ_id']['loop'] = is_array($_loop=$this->_tpl_vars['bccdNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['typ_id']['show'] = true;
$this->_sections['typ_id']['max'] = $this->_sections['typ_id']['loop'];
$this->_sections['typ_id']['step'] = 1;
$this->_sections['typ_id']['start'] = $this->_sections['typ_id']['step'] > 0 ? 0 : $this->_sections['typ_id']['loop']-1;
if ($this->_sections['typ_id']['show']) {
    $this->_sections['typ_id']['total'] = $this->_sections['typ_id']['loop'];
    if ($this->_sections['typ_id']['total'] == 0)
        $this->_sections['typ_id']['show'] = false;
} else
    $this->_sections['typ_id']['total'] = 0;
if ($this->_sections['typ_id']['show']):

            for ($this->_sections['typ_id']['index'] = $this->_sections['typ_id']['start'], $this->_sections['typ_id']['iteration'] = 1;
                 $this->_sections['typ_id']['iteration'] <= $this->_sections['typ_id']['total'];
                 $this->_sections['typ_id']['index'] += $this->_sections['typ_id']['step'], $this->_sections['typ_id']['iteration']++):
$this->_sections['typ_id']['rownum'] = $this->_sections['typ_id']['iteration'];
$this->_sections['typ_id']['index_prev'] = $this->_sections['typ_id']['index'] - $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['index_next'] = $this->_sections['typ_id']['index'] + $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['first']      = ($this->_sections['typ_id']['iteration'] == 1);
$this->_sections['typ_id']['last']       = ($this->_sections['typ_id']['iteration'] == $this->_sections['typ_id']['total']);
?>
           			<?php if ($this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['pro_class'] == $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['id']): ?>
          				<?php echo $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['typename']; ?>

					<?php endif; ?>
          		<?php endfor; endif; ?>
              ）&nbsp;&nbsp;&nbsp;分数（<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['fraction']; ?>
）&nbsp;&nbsp;&nbsp; <a href="aeditbccdswf.php?page=<?php echo $_GET['page']; ?>
&pro_type=<?php echo $_GET['pro_type']; ?>
&edit=t&id=<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['arrayCheckbox']['data'][$this->_sections['chk_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></span></span>
              
              
              </td>
  </tr>
     <?php endfor; endif; ?>
     
       <br /> 
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['arrayCheckbox']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['arrayCheckbox']['countRs']; ?>
题&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['arrayCheckbox']['pageSize']; ?>
题&nbsp;&nbsp;第<?php echo $this->_tpl_vars['arrayCheckbox']['page']; ?>
页/共<?php echo $this->_tpl_vars['arrayCheckbox']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayCheckbox']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&checkbox_type=<?php echo $this->_tpl_vars['checkboxType']; ?>
"" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayCheckbox']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&checkbox_type=<?php echo $this->_tpl_vars['checkboxType']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayCheckbox']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&checkbox_type=<?php echo $this->_tpl_vars['checkboxType']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayCheckbox']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&checkbox_type=<?php echo $this->_tpl_vars['checkboxType']; ?>
" class="a1">尾页</a></strong> </div>
        <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['arrayCheckbox']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
        <div style="width:3px; height:22px; float:left"></div>
        <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['arrayCheckbox']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayCheckbox']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayCheckbox']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['arrayCheckbox']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayCheckbox']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['arrayCheckbox']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['arrayCheckbox']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayCheckbox']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div> 
     
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['Fill'] == T): ?>
  <tr>
    <td><span style="width:700px; float:left; padding-left:10px; padding-right:10px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"><?php echo $this->_tpl_vars['fillTitle']; ?>
题（每题<?php echo $this->_tpl_vars['fillFraction']; ?>
分，共<?php if ($this->_tpl_vars['arrayFill']['countRs'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['arrayFill']['countRs']; ?>
<?php endif; ?>题）</span> </td>
  </tr>
      <?php unset($this->_sections['fil_id']);
$this->_sections['fil_id']['name'] = 'fil_id';
$this->_sections['fil_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayFill']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fil_id']['show'] = true;
$this->_sections['fil_id']['max'] = $this->_sections['fil_id']['loop'];
$this->_sections['fil_id']['step'] = 1;
$this->_sections['fil_id']['start'] = $this->_sections['fil_id']['step'] > 0 ? 0 : $this->_sections['fil_id']['loop']-1;
if ($this->_sections['fil_id']['show']) {
    $this->_sections['fil_id']['total'] = $this->_sections['fil_id']['loop'];
    if ($this->_sections['fil_id']['total'] == 0)
        $this->_sections['fil_id']['show'] = false;
} else
    $this->_sections['fil_id']['total'] = 0;
if ($this->_sections['fil_id']['show']):

            for ($this->_sections['fil_id']['index'] = $this->_sections['fil_id']['start'], $this->_sections['fil_id']['iteration'] = 1;
                 $this->_sections['fil_id']['iteration'] <= $this->_sections['fil_id']['total'];
                 $this->_sections['fil_id']['index'] += $this->_sections['fil_id']['step'], $this->_sections['fil_id']['iteration']++):
$this->_sections['fil_id']['rownum'] = $this->_sections['fil_id']['iteration'];
$this->_sections['fil_id']['index_prev'] = $this->_sections['fil_id']['index'] - $this->_sections['fil_id']['step'];
$this->_sections['fil_id']['index_next'] = $this->_sections['fil_id']['index'] + $this->_sections['fil_id']['step'];
$this->_sections['fil_id']['first']      = ($this->_sections['fil_id']['iteration'] == 1);
$this->_sections['fil_id']['last']       = ($this->_sections['fil_id']['iteration'] == $this->_sections['fil_id']['total']);
?>
  <tr>
    <td><span class="kt" style="background-color:#FFFFFF; border:1px dashed #FF6600; color:#333333;"> <span style="padding-top:4px; float:left;"><?php echo $this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['id']; ?>
、<?php echo ((is_array($_tmp=$this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['content'])) ? $this->_run_mod_handler('replace', true, $_tmp, "()", " <span style=' line-height:22px; padding-left:2px; padding-right:2px;'><input name='fill[]' type='text'  style='width:80px; height:18px; line-height:18px; border:1px solid #DDDDDD;' id='fill' size='10' maxlength='50'></span>") : smarty_modifier_replace($_tmp, "()", " <span style=' line-height:22px; padding-left:2px; padding-right:2px;'><input name='fill[]' type='text'  style='width:80px; height:18px; line-height:18px; border:1px solid #DDDDDD;' id='fill' size='10' maxlength='50'></span>")); ?>
 </span> </span>
    
      <span class="kt"> <span class="kt_t">答案：<?php echo $this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['answer']; ?>
</span> </span>
              <?php if ($this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['resolve'] != ""): ?>
                <span class="kt"> <span class="kt_t">解析：<?php echo $this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['resolve']; ?>
</span> </span>
              <?php endif; ?>
              
           <span class="kt"> <span class="kt_t">试题类别（
               	<?php unset($this->_sections['typ_id']);
$this->_sections['typ_id']['name'] = 'typ_id';
$this->_sections['typ_id']['loop'] = is_array($_loop=$this->_tpl_vars['bccdNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['typ_id']['show'] = true;
$this->_sections['typ_id']['max'] = $this->_sections['typ_id']['loop'];
$this->_sections['typ_id']['step'] = 1;
$this->_sections['typ_id']['start'] = $this->_sections['typ_id']['step'] > 0 ? 0 : $this->_sections['typ_id']['loop']-1;
if ($this->_sections['typ_id']['show']) {
    $this->_sections['typ_id']['total'] = $this->_sections['typ_id']['loop'];
    if ($this->_sections['typ_id']['total'] == 0)
        $this->_sections['typ_id']['show'] = false;
} else
    $this->_sections['typ_id']['total'] = 0;
if ($this->_sections['typ_id']['show']):

            for ($this->_sections['typ_id']['index'] = $this->_sections['typ_id']['start'], $this->_sections['typ_id']['iteration'] = 1;
                 $this->_sections['typ_id']['iteration'] <= $this->_sections['typ_id']['total'];
                 $this->_sections['typ_id']['index'] += $this->_sections['typ_id']['step'], $this->_sections['typ_id']['iteration']++):
$this->_sections['typ_id']['rownum'] = $this->_sections['typ_id']['iteration'];
$this->_sections['typ_id']['index_prev'] = $this->_sections['typ_id']['index'] - $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['index_next'] = $this->_sections['typ_id']['index'] + $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['first']      = ($this->_sections['typ_id']['iteration'] == 1);
$this->_sections['typ_id']['last']       = ($this->_sections['typ_id']['iteration'] == $this->_sections['typ_id']['total']);
?>
           			<?php if ($this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['pro_class'] == $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['id']): ?>
          				<?php echo $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['typename']; ?>

					<?php endif; ?>
          		<?php endfor; endif; ?>
              ）&nbsp;&nbsp;&nbsp; 分数（<?php echo $this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['fraction']; ?>
）&nbsp;&nbsp;&nbsp;<a href="aeditbccdswf.php?page=<?php echo $_GET['page']; ?>
&pro_type=<?php echo $_GET['pro_type']; ?>
&edit=t&id=<?php echo $this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['arrayFill']['data'][$this->_sections['fil_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></span></span>
    </td>
  </tr>
    <?php endfor; endif; ?>
       <br /> 
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['arrayFill']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['arrayFill']['countRs']; ?>
题&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['arrayFill']['pageSize']; ?>
题&nbsp;&nbsp;第<?php echo $this->_tpl_vars['arrayFill']['page']; ?>
页/共<?php echo $this->_tpl_vars['arrayFill']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayFill']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&fill_type=<?php echo $this->_tpl_vars['fillType']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayFill']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&fill_type=<?php echo $this->_tpl_vars['fillType']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayFill']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&fill_type=<?php echo $this->_tpl_vars['fillType']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayFill']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&fill_type=<?php echo $this->_tpl_vars['fillType']; ?>
" class="a1">尾页</a></strong> </div>
        <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['arrayFill']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
        <div style="width:3px; height:22px; float:left"></div>
        <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['arrayFill']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayFill']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayFill']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['arrayFill']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayFill']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['arrayFill']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['arrayFill']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayFill']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div> 
    
    
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['Judgment'] == T): ?>
  <tr>
    <td><span style="width:700px; float:left; padding-left:10px; padding-right:10px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"><?php echo $this->_tpl_vars['judgmentTitle']; ?>
题（正确的选正确；错误的选错误）每题<?php echo $this->_tpl_vars['judgmentFraction']; ?>
分，共<?php if ($this->_tpl_vars['arrayJudgment']['countRs'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['arrayJudgment']['countRs']; ?>
<?php endif; ?>题</span> </td>
  </tr>
       <?php unset($this->_sections['jud_id']);
$this->_sections['jud_id']['name'] = 'jud_id';
$this->_sections['jud_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayJudgment']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jud_id']['show'] = true;
$this->_sections['jud_id']['max'] = $this->_sections['jud_id']['loop'];
$this->_sections['jud_id']['step'] = 1;
$this->_sections['jud_id']['start'] = $this->_sections['jud_id']['step'] > 0 ? 0 : $this->_sections['jud_id']['loop']-1;
if ($this->_sections['jud_id']['show']) {
    $this->_sections['jud_id']['total'] = $this->_sections['jud_id']['loop'];
    if ($this->_sections['jud_id']['total'] == 0)
        $this->_sections['jud_id']['show'] = false;
} else
    $this->_sections['jud_id']['total'] = 0;
if ($this->_sections['jud_id']['show']):

            for ($this->_sections['jud_id']['index'] = $this->_sections['jud_id']['start'], $this->_sections['jud_id']['iteration'] = 1;
                 $this->_sections['jud_id']['iteration'] <= $this->_sections['jud_id']['total'];
                 $this->_sections['jud_id']['index'] += $this->_sections['jud_id']['step'], $this->_sections['jud_id']['iteration']++):
$this->_sections['jud_id']['rownum'] = $this->_sections['jud_id']['iteration'];
$this->_sections['jud_id']['index_prev'] = $this->_sections['jud_id']['index'] - $this->_sections['jud_id']['step'];
$this->_sections['jud_id']['index_next'] = $this->_sections['jud_id']['index'] + $this->_sections['jud_id']['step'];
$this->_sections['jud_id']['first']      = ($this->_sections['jud_id']['iteration'] == 1);
$this->_sections['jud_id']['last']       = ($this->_sections['jud_id']['iteration'] == $this->_sections['jud_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"><?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['id']; ?>
、<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['content']; ?>
</span> </span><span class="kt_a"> <span class="kt_a_1">
              <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="正确" id="judgment<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1" style="width:35px;">正确</span><span class="kt_a_1">
              <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="错误" id="judgment<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1" style="width:35px;">错误</span></span>
                <span class="kt"> <span class="kt_t">答案：<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['answer']; ?>
</span> </span>
              <?php if ($this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['resolve'] != ""): ?>
                <span class="kt"> <span class="kt_t">解析：<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['resolve']; ?>
</span> </span>
              <?php endif; ?>
              
                  <span class="kt"> <span class="kt_t">试题类别（
               	<?php unset($this->_sections['typ_id']);
$this->_sections['typ_id']['name'] = 'typ_id';
$this->_sections['typ_id']['loop'] = is_array($_loop=$this->_tpl_vars['bccdNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['typ_id']['show'] = true;
$this->_sections['typ_id']['max'] = $this->_sections['typ_id']['loop'];
$this->_sections['typ_id']['step'] = 1;
$this->_sections['typ_id']['start'] = $this->_sections['typ_id']['step'] > 0 ? 0 : $this->_sections['typ_id']['loop']-1;
if ($this->_sections['typ_id']['show']) {
    $this->_sections['typ_id']['total'] = $this->_sections['typ_id']['loop'];
    if ($this->_sections['typ_id']['total'] == 0)
        $this->_sections['typ_id']['show'] = false;
} else
    $this->_sections['typ_id']['total'] = 0;
if ($this->_sections['typ_id']['show']):

            for ($this->_sections['typ_id']['index'] = $this->_sections['typ_id']['start'], $this->_sections['typ_id']['iteration'] = 1;
                 $this->_sections['typ_id']['iteration'] <= $this->_sections['typ_id']['total'];
                 $this->_sections['typ_id']['index'] += $this->_sections['typ_id']['step'], $this->_sections['typ_id']['iteration']++):
$this->_sections['typ_id']['rownum'] = $this->_sections['typ_id']['iteration'];
$this->_sections['typ_id']['index_prev'] = $this->_sections['typ_id']['index'] - $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['index_next'] = $this->_sections['typ_id']['index'] + $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['first']      = ($this->_sections['typ_id']['iteration'] == 1);
$this->_sections['typ_id']['last']       = ($this->_sections['typ_id']['iteration'] == $this->_sections['typ_id']['total']);
?>
           			<?php if ($this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['pro_class'] == $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['id']): ?>
          				<?php echo $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['typename']; ?>

					<?php endif; ?>
          		<?php endfor; endif; ?>
              ）&nbsp;&nbsp;&nbsp; 分数（<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['fraction']; ?>
）&nbsp;&nbsp;&nbsp; <a href="aeditbccdswf.php?page=<?php echo $_GET['page']; ?>
&pro_type=<?php echo $_GET['pro_type']; ?>
&edit=t&id=<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['arrayJudgment']['data'][$this->_sections['jud_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></span></span>
              </td>
  </tr>
       <?php endfor; endif; ?>
       
          <br /> 
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['arrayJudgment']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['arrayJudgment']['countRs']; ?>
题&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['arrayJudgment']['pageSize']; ?>
题&nbsp;&nbsp;第<?php echo $this->_tpl_vars['arrayJudgment']['page']; ?>
页/共<?php echo $this->_tpl_vars['arrayJudgment']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayJudgment']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&judgment_type=<?php echo $this->_tpl_vars['judgmentType']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayJudgment']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&judgment_type=<?php echo $this->_tpl_vars['judgmentType']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayJudgment']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&judgment_type=<?php echo $this->_tpl_vars['judgmentType']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayJudgment']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&judgment_type=<?php echo $this->_tpl_vars['judgmentType']; ?>
" class="a1">尾页</a></strong> </div>
        <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['arrayJudgment']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
        <div style="width:3px; height:22px; float:left"></div>
        <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['arrayJudgment']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayJudgment']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayJudgment']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['arrayJudgment']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayJudgment']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['arrayJudgment']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['arrayJudgment']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayJudgment']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div> 
       
       
            <?php endif; ?>

    <?php if ($this->_tpl_vars['Explain'] == T): ?>
    <tr>
        <td><span style="width:700px; float:left; padding-left:10px; padding-right:10px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> 名词解释题（每题<?php echo $this->_tpl_vars['explainFraction']; ?>
分，共<?php if ($this->_tpl_vars['arrayExplain']['countRs'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['arrayExplain']['countRs']; ?>
<?php endif; ?>题）</span> </td>
    </tr>
    <?php unset($this->_sections['exp_id']);
$this->_sections['exp_id']['name'] = 'exp_id';
$this->_sections['exp_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayExplain']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exp_id']['show'] = true;
$this->_sections['exp_id']['max'] = $this->_sections['exp_id']['loop'];
$this->_sections['exp_id']['step'] = 1;
$this->_sections['exp_id']['start'] = $this->_sections['exp_id']['step'] > 0 ? 0 : $this->_sections['exp_id']['loop']-1;
if ($this->_sections['exp_id']['show']) {
    $this->_sections['exp_id']['total'] = $this->_sections['exp_id']['loop'];
    if ($this->_sections['exp_id']['total'] == 0)
        $this->_sections['exp_id']['show'] = false;
} else
    $this->_sections['exp_id']['total'] = 0;
if ($this->_sections['exp_id']['show']):

            for ($this->_sections['exp_id']['index'] = $this->_sections['exp_id']['start'], $this->_sections['exp_id']['iteration'] = 1;
                 $this->_sections['exp_id']['iteration'] <= $this->_sections['exp_id']['total'];
                 $this->_sections['exp_id']['index'] += $this->_sections['exp_id']['step'], $this->_sections['exp_id']['iteration']++):
$this->_sections['exp_id']['rownum'] = $this->_sections['exp_id']['iteration'];
$this->_sections['exp_id']['index_prev'] = $this->_sections['exp_id']['index'] - $this->_sections['exp_id']['step'];
$this->_sections['exp_id']['index_next'] = $this->_sections['exp_id']['index'] + $this->_sections['exp_id']['step'];
$this->_sections['exp_id']['first']      = ($this->_sections['exp_id']['iteration'] == 1);
$this->_sections['exp_id']['last']       = ($this->_sections['exp_id']['iteration'] == $this->_sections['exp_id']['total']);
?>
    <tr>
        <td><span class="kt"> <span class="kt_t" style="word-wrap: break-word;"> <?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['id']; ?>
、<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px; padding-top:5px; padding-bottom:5px;">
              <textarea name="explain<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['id']; ?>
" id="explain<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:50px;" ></textarea>
              </span>
            <span class="kt"> <span class="kt_t">答案：<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['answer']; ?>
</span> </span>
            <?php if ($this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['resolve'] != ""): ?>
            <span class="kt"> <span class="kt_t">解析：<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['resolve']; ?>
</span> </span>
            <?php endif; ?>
                  <span class="kt"> <span class="kt_t">试题类别（
               	<?php unset($this->_sections['typ_id']);
$this->_sections['typ_id']['name'] = 'typ_id';
$this->_sections['typ_id']['loop'] = is_array($_loop=$this->_tpl_vars['bccdNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['typ_id']['show'] = true;
$this->_sections['typ_id']['max'] = $this->_sections['typ_id']['loop'];
$this->_sections['typ_id']['step'] = 1;
$this->_sections['typ_id']['start'] = $this->_sections['typ_id']['step'] > 0 ? 0 : $this->_sections['typ_id']['loop']-1;
if ($this->_sections['typ_id']['show']) {
    $this->_sections['typ_id']['total'] = $this->_sections['typ_id']['loop'];
    if ($this->_sections['typ_id']['total'] == 0)
        $this->_sections['typ_id']['show'] = false;
} else
    $this->_sections['typ_id']['total'] = 0;
if ($this->_sections['typ_id']['show']):

            for ($this->_sections['typ_id']['index'] = $this->_sections['typ_id']['start'], $this->_sections['typ_id']['iteration'] = 1;
                 $this->_sections['typ_id']['iteration'] <= $this->_sections['typ_id']['total'];
                 $this->_sections['typ_id']['index'] += $this->_sections['typ_id']['step'], $this->_sections['typ_id']['iteration']++):
$this->_sections['typ_id']['rownum'] = $this->_sections['typ_id']['iteration'];
$this->_sections['typ_id']['index_prev'] = $this->_sections['typ_id']['index'] - $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['index_next'] = $this->_sections['typ_id']['index'] + $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['first']      = ($this->_sections['typ_id']['iteration'] == 1);
$this->_sections['typ_id']['last']       = ($this->_sections['typ_id']['iteration'] == $this->_sections['typ_id']['total']);
?>
           			<?php if ($this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['pro_class'] == $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['id']): ?>
          				<?php echo $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['typename']; ?>

					<?php endif; ?>
          		<?php endfor; endif; ?>
              ）&nbsp;&nbsp;&nbsp;分数（<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['fraction']; ?>
）&nbsp;&nbsp;&nbsp; <a href="aeditbccdswf.php?page=<?php echo $_GET['page']; ?>
&pro_type=<?php echo $_GET['pro_type']; ?>
&edit=t&id=<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['arrayExplain']['data'][$this->_sections['exp_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></span></span>


        </td>
    </tr>
    <?php endfor; endif; ?>



    <br />
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['arrayExplain']['data'] != false): ?>
        <div style="height:22px;  float:left">
            <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['arrayExplain']['countRs']; ?>
题&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['arrayExplain']['pageSize']; ?>
题&nbsp;&nbsp;第<?php echo $this->_tpl_vars['arrayExplain']['page']; ?>
页/共<?php echo $this->_tpl_vars['arrayExplain']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayExplain']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&explain_type=<?php echo $this->_tpl_vars['arrayExplain']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayAnswer']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&explain_type=<?php echo $this->_tpl_vars['explainType']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayExplain']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&answer_type=<?php echo $this->_tpl_vars['explainType']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayExplain']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&explain_type=<?php echo $this->_tpl_vars['explainType']; ?>
" class="a1">尾页</a></strong> </div>
            <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['arrayExplain']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
            <div style="width:3px; height:22px; float:left"></div>
            <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['arrayExplain']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayExplain']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayExplain']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['arrayExplain']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayExplain']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['arrayExplain']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['arrayExplain']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayExplain']['page']): ?><?php endif; ?></a> </div>
            <?php endfor; endif; ?>
        </div>
        <?php endif; ?> </div>
    <?php endif; ?>


    <?php if ($this->_tpl_vars['Answer'] == T): ?>
  <tr>
    <td><span style="width:700px; float:left; padding-left:10px; padding-right:10px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php echo $this->_tpl_vars['answerTitle']; ?>
题（每题<?php echo $this->_tpl_vars['answerFraction']; ?>
分，共<?php if ($this->_tpl_vars['arrayAnswer']['countRs'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['arrayAnswer']['countRs']; ?>
<?php endif; ?>题）</span> </td>
  </tr>
     <?php unset($this->_sections['ans_id']);
$this->_sections['ans_id']['name'] = 'ans_id';
$this->_sections['ans_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayAnswer']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ans_id']['show'] = true;
$this->_sections['ans_id']['max'] = $this->_sections['ans_id']['loop'];
$this->_sections['ans_id']['step'] = 1;
$this->_sections['ans_id']['start'] = $this->_sections['ans_id']['step'] > 0 ? 0 : $this->_sections['ans_id']['loop']-1;
if ($this->_sections['ans_id']['show']) {
    $this->_sections['ans_id']['total'] = $this->_sections['ans_id']['loop'];
    if ($this->_sections['ans_id']['total'] == 0)
        $this->_sections['ans_id']['show'] = false;
} else
    $this->_sections['ans_id']['total'] = 0;
if ($this->_sections['ans_id']['show']):

            for ($this->_sections['ans_id']['index'] = $this->_sections['ans_id']['start'], $this->_sections['ans_id']['iteration'] = 1;
                 $this->_sections['ans_id']['iteration'] <= $this->_sections['ans_id']['total'];
                 $this->_sections['ans_id']['index'] += $this->_sections['ans_id']['step'], $this->_sections['ans_id']['iteration']++):
$this->_sections['ans_id']['rownum'] = $this->_sections['ans_id']['iteration'];
$this->_sections['ans_id']['index_prev'] = $this->_sections['ans_id']['index'] - $this->_sections['ans_id']['step'];
$this->_sections['ans_id']['index_next'] = $this->_sections['ans_id']['index'] + $this->_sections['ans_id']['step'];
$this->_sections['ans_id']['first']      = ($this->_sections['ans_id']['iteration'] == 1);
$this->_sections['ans_id']['last']       = ($this->_sections['ans_id']['iteration'] == $this->_sections['ans_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t" style="word-wrap: break-word;> <?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['id']; ?>
、<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px; padding-top:5px; padding-bottom:5px;">
              <textarea name="answer<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['id']; ?>
" id="answer<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:50px;" ></textarea>
              </span>
                  <span class="kt"> <span class="kt_t">答案：<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['answer']; ?>
</span> </span>
              <?php if ($this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['resolve'] != ""): ?>
                <span class="kt"> <span class="kt_t">解析：<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['resolve']; ?>
</span> </span>
              <?php endif; ?>
                  <span class="kt"> <span class="kt_t">试题类别（
               	<?php unset($this->_sections['typ_id']);
$this->_sections['typ_id']['name'] = 'typ_id';
$this->_sections['typ_id']['loop'] = is_array($_loop=$this->_tpl_vars['bccdNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['typ_id']['show'] = true;
$this->_sections['typ_id']['max'] = $this->_sections['typ_id']['loop'];
$this->_sections['typ_id']['step'] = 1;
$this->_sections['typ_id']['start'] = $this->_sections['typ_id']['step'] > 0 ? 0 : $this->_sections['typ_id']['loop']-1;
if ($this->_sections['typ_id']['show']) {
    $this->_sections['typ_id']['total'] = $this->_sections['typ_id']['loop'];
    if ($this->_sections['typ_id']['total'] == 0)
        $this->_sections['typ_id']['show'] = false;
} else
    $this->_sections['typ_id']['total'] = 0;
if ($this->_sections['typ_id']['show']):

            for ($this->_sections['typ_id']['index'] = $this->_sections['typ_id']['start'], $this->_sections['typ_id']['iteration'] = 1;
                 $this->_sections['typ_id']['iteration'] <= $this->_sections['typ_id']['total'];
                 $this->_sections['typ_id']['index'] += $this->_sections['typ_id']['step'], $this->_sections['typ_id']['iteration']++):
$this->_sections['typ_id']['rownum'] = $this->_sections['typ_id']['iteration'];
$this->_sections['typ_id']['index_prev'] = $this->_sections['typ_id']['index'] - $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['index_next'] = $this->_sections['typ_id']['index'] + $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['first']      = ($this->_sections['typ_id']['iteration'] == 1);
$this->_sections['typ_id']['last']       = ($this->_sections['typ_id']['iteration'] == $this->_sections['typ_id']['total']);
?>
           			<?php if ($this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['pro_class'] == $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['id']): ?>
          				<?php echo $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['typename']; ?>

					<?php endif; ?>
          		<?php endfor; endif; ?>
              ）&nbsp;&nbsp;&nbsp;分数（<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['fraction']; ?>
）&nbsp;&nbsp;&nbsp; <a href="aeditbccdswf.php?page=<?php echo $_GET['page']; ?>
&pro_type=<?php echo $_GET['pro_type']; ?>
&edit=t&id=<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['arrayAnswer']['data'][$this->_sections['ans_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></span></span>
              
              
              </td>
  </tr>
    <?php endfor; endif; ?>
    
    
     
      <br /> 
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['arrayAnswer']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['arrayAnswer']['countRs']; ?>
题&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['arrayAnswer']['pageSize']; ?>
题&nbsp;&nbsp;第<?php echo $this->_tpl_vars['arrayAnswer']['page']; ?>
页/共<?php echo $this->_tpl_vars['arrayAnswer']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayAnswer']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&answer_type=<?php echo $this->_tpl_vars['answerType']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayAnswer']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&answer_type=<?php echo $this->_tpl_vars['answerType']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayAnswer']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&answer_type=<?php echo $this->_tpl_vars['answerType']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayAnswer']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&answer_type=<?php echo $this->_tpl_vars['answerType']; ?>
" class="a1">尾页</a></strong> </div>
        <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['arrayAnswer']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
        <div style="width:3px; height:22px; float:left"></div>
        <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['arrayAnswer']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayAnswer']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayAnswer']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['arrayAnswer']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayAnswer']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['arrayAnswer']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['arrayAnswer']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayAnswer']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div> 
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['Discourse'] == T): ?>
  <tr>
    <td><span style="width:700px; float:left; padding-left:10px; padding-right:10px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"><?php echo $this->_tpl_vars['discourseTitle']; ?>
题（每题<?php echo $this->_tpl_vars['discourseFraction']; ?>
分，共<?php if ($this->_tpl_vars['arrayDiscourse']['countRs'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['arrayDiscourse']['countRs']; ?>
<?php endif; ?>题）</span> </td>
  </tr>
      <?php unset($this->_sections['dis_id']);
$this->_sections['dis_id']['name'] = 'dis_id';
$this->_sections['dis_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayDiscourse']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dis_id']['show'] = true;
$this->_sections['dis_id']['max'] = $this->_sections['dis_id']['loop'];
$this->_sections['dis_id']['step'] = 1;
$this->_sections['dis_id']['start'] = $this->_sections['dis_id']['step'] > 0 ? 0 : $this->_sections['dis_id']['loop']-1;
if ($this->_sections['dis_id']['show']) {
    $this->_sections['dis_id']['total'] = $this->_sections['dis_id']['loop'];
    if ($this->_sections['dis_id']['total'] == 0)
        $this->_sections['dis_id']['show'] = false;
} else
    $this->_sections['dis_id']['total'] = 0;
if ($this->_sections['dis_id']['show']):

            for ($this->_sections['dis_id']['index'] = $this->_sections['dis_id']['start'], $this->_sections['dis_id']['iteration'] = 1;
                 $this->_sections['dis_id']['iteration'] <= $this->_sections['dis_id']['total'];
                 $this->_sections['dis_id']['index'] += $this->_sections['dis_id']['step'], $this->_sections['dis_id']['iteration']++):
$this->_sections['dis_id']['rownum'] = $this->_sections['dis_id']['iteration'];
$this->_sections['dis_id']['index_prev'] = $this->_sections['dis_id']['index'] - $this->_sections['dis_id']['step'];
$this->_sections['dis_id']['index_next'] = $this->_sections['dis_id']['index'] + $this->_sections['dis_id']['step'];
$this->_sections['dis_id']['first']      = ($this->_sections['dis_id']['iteration'] == 1);
$this->_sections['dis_id']['last']       = ($this->_sections['dis_id']['iteration'] == $this->_sections['dis_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"><?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['id']; ?>
、<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['content']; ?>
</span> </span> <span style="float:left; padding-left:25px; padding-top:5px; padding-bottom:5px;">
              <textarea name="discourse<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['id']; ?>
" style="width:635px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:80px;" id="discourse<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['id']; ?>
" ></textarea>
              </span>
              
                  <span class="kt"> <span class="kt_t">答案：<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['answer']; ?>
</span> </span>
              <?php if ($this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['resolve'] != ""): ?>
                <span class="kt"> <span class="kt_t">解析：<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['resolve']; ?>
</span> </span>
              <?php endif; ?>
                  <span class="kt"> <span class="kt_t">试题类别（
               	<?php unset($this->_sections['typ_id']);
$this->_sections['typ_id']['name'] = 'typ_id';
$this->_sections['typ_id']['loop'] = is_array($_loop=$this->_tpl_vars['bccdNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['typ_id']['show'] = true;
$this->_sections['typ_id']['max'] = $this->_sections['typ_id']['loop'];
$this->_sections['typ_id']['step'] = 1;
$this->_sections['typ_id']['start'] = $this->_sections['typ_id']['step'] > 0 ? 0 : $this->_sections['typ_id']['loop']-1;
if ($this->_sections['typ_id']['show']) {
    $this->_sections['typ_id']['total'] = $this->_sections['typ_id']['loop'];
    if ($this->_sections['typ_id']['total'] == 0)
        $this->_sections['typ_id']['show'] = false;
} else
    $this->_sections['typ_id']['total'] = 0;
if ($this->_sections['typ_id']['show']):

            for ($this->_sections['typ_id']['index'] = $this->_sections['typ_id']['start'], $this->_sections['typ_id']['iteration'] = 1;
                 $this->_sections['typ_id']['iteration'] <= $this->_sections['typ_id']['total'];
                 $this->_sections['typ_id']['index'] += $this->_sections['typ_id']['step'], $this->_sections['typ_id']['iteration']++):
$this->_sections['typ_id']['rownum'] = $this->_sections['typ_id']['iteration'];
$this->_sections['typ_id']['index_prev'] = $this->_sections['typ_id']['index'] - $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['index_next'] = $this->_sections['typ_id']['index'] + $this->_sections['typ_id']['step'];
$this->_sections['typ_id']['first']      = ($this->_sections['typ_id']['iteration'] == 1);
$this->_sections['typ_id']['last']       = ($this->_sections['typ_id']['iteration'] == $this->_sections['typ_id']['total']);
?>
           			<?php if ($this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['pro_class'] == $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['id']): ?>
          				<?php echo $this->_tpl_vars['bccdNames'][$this->_sections['typ_id']['index']]['typename']; ?>

					<?php endif; ?>
          		<?php endfor; endif; ?>
              ）&nbsp;&nbsp;&nbsp;分数（<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['fraction']; ?>
）&nbsp;&nbsp;&nbsp; <a href="aeditbccdswf.php?page=<?php echo $_GET['page']; ?>
&pro_type=<?php echo $_GET['pro_type']; ?>
&edit=t&id=<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['arrayDiscourse']['data'][$this->_sections['dis_id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></span></span>
              </td>
  </tr>
     <?php endfor; endif; ?>
     
     
           <br /> 
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['arrayDiscourse']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['arrayDiscourse']['countRs']; ?>
题&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['arrayDiscourse']['pageSize']; ?>
题&nbsp;&nbsp;第<?php echo $this->_tpl_vars['arrayDiscourse']['page']; ?>
页/共<?php echo $this->_tpl_vars['arrayDiscourse']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayDiscourse']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&discourse_type=<?php echo $this->_tpl_vars['discourseType']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayDiscourse']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&discourse_type=<?php echo $this->_tpl_vars['discourseType']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayDiscourse']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&discourse_type=<?php echo $this->_tpl_vars['discourseType']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayDiscourse']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&discourse_type=<?php echo $this->_tpl_vars['discourseType']; ?>
" class="a1">尾页</a></strong> </div>
        <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['arrayDiscourse']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
        <div style="width:3px; height:22px; float:left"></div>
        <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['arrayDiscourse']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayDiscourse']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/alookbccdswf.php?page=<?php echo $this->_tpl_vars['arrayDiscourse']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&pro_type=<?php echo ((is_array($_tmp=$_GET['pro_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['arrayDiscourse']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayDiscourse']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['arrayDiscourse']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['arrayDiscourse']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['arrayDiscourse']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div> 
            <?php endif; ?>
</table>
      
     </div>
     </div>
</div>