<?php /* Smarty version 2.6.19, created on 2016-09-27 14:33:25
         compiled from aeditbccdbuding.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'aeditbccdbuding.phtml', 24, false),array('function', 'html_options', 'aeditbccdbuding.phtml', 51, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<!--右侧-->
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
    <br />
    <br />
    <br />
    <DIV>
      <DIV style="padding-left:6px;">
        <UL>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 63%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">标题 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">添加时间 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">操作 </LI>
        </UL>
      </DIV>
      <?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['bcjyzs']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
      <DIV style="padding-left:6px;">
        <UL>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 63%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"> <?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['title'],0,60,"...");?>

           </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['addtime']; ?>
 </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"><a href="?edit=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="?delete=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></LI>
        </UL>
      </DIV>
      <?php endfor; endif; ?> 
   </DIV>
     <br />
    <br />
    <br />
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
篇&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
篇&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdbuding.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdbuding.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdbuding.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdbuding.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">尾页</a></strong> </div>
        <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['bcjyzs']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdbuding.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div>
    <br/>
    <?php if ($this->_tpl_vars['edit'] == 't'): ?>
    <div class="right_con_form">
      <form name="form_addbcjyz" method="post" action="aeditbccdbuding.php?big_type=<?php echo $_GET['big_type']; ?>
&small_type=<?php echo $_GET['small_type']; ?>
" enctype="multipart/form-data">
      <!--所属类别：<select name="pro_class" id="pro_class">
       <?php unset($this->_sections['bccdnameid']);
$this->_sections['bccdnameid']['name'] = 'bccdnameid';
$this->_sections['bccdnameid']['loop'] = is_array($_loop=$this->_tpl_vars['arrayBccdnames1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bccdnameid']['show'] = true;
$this->_sections['bccdnameid']['max'] = $this->_sections['bccdnameid']['loop'];
$this->_sections['bccdnameid']['step'] = 1;
$this->_sections['bccdnameid']['start'] = $this->_sections['bccdnameid']['step'] > 0 ? 0 : $this->_sections['bccdnameid']['loop']-1;
if ($this->_sections['bccdnameid']['show']) {
    $this->_sections['bccdnameid']['total'] = $this->_sections['bccdnameid']['loop'];
    if ($this->_sections['bccdnameid']['total'] == 0)
        $this->_sections['bccdnameid']['show'] = false;
} else
    $this->_sections['bccdnameid']['total'] = 0;
if ($this->_sections['bccdnameid']['show']):

            for ($this->_sections['bccdnameid']['index'] = $this->_sections['bccdnameid']['start'], $this->_sections['bccdnameid']['iteration'] = 1;
                 $this->_sections['bccdnameid']['iteration'] <= $this->_sections['bccdnameid']['total'];
                 $this->_sections['bccdnameid']['index'] += $this->_sections['bccdnameid']['step'], $this->_sections['bccdnameid']['iteration']++):
$this->_sections['bccdnameid']['rownum'] = $this->_sections['bccdnameid']['iteration'];
$this->_sections['bccdnameid']['index_prev'] = $this->_sections['bccdnameid']['index'] - $this->_sections['bccdnameid']['step'];
$this->_sections['bccdnameid']['index_next'] = $this->_sections['bccdnameid']['index'] + $this->_sections['bccdnameid']['step'];
$this->_sections['bccdnameid']['first']      = ($this->_sections['bccdnameid']['iteration'] == 1);
$this->_sections['bccdnameid']['last']       = ($this->_sections['bccdnameid']['iteration'] == $this->_sections['bccdnameid']['total']);
?>
       <?php if ($this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameid']['index']]['id'] == $this->_tpl_vars['bcjyz'][0]['pro_class']): ?>
        <option selected="selected" value="<?php echo $this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameid']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameid']['index']]['typename']; ?>
</option>
        <?php endif; ?>
        <?php endfor; endif; ?>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayBccdnames']), $this);?>

    </select>-->
    <br /><br />
    公告标题 ：<input type="text" name="title" size="65" value="<?php echo $this->_tpl_vars['bcjyz'][0]['title']; ?>
" class="input1" />　
<br/><br/> 
公告内容：<?php echo $this->_reg_objects['util'][0]->editor('content',$this->_tpl_vars['bcjyz'][0]['content'],"90%",'230');?>
 
<br/> <br />
  
    <input type="hidden" name="bcjyzid" value="<?php echo $this->_tpl_vars['bcjyz'][0]['id']; ?>
">
    <input type="submit" value="提交"> <br />
    <br />
    </form>
    </div>
    <?php endif; ?> </div>
</div>