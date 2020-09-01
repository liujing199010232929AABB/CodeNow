<?php /* Smarty version 2.6.19, created on 2016-09-27 11:20:36
         compiled from aeditadmin.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'aeditadmin.phtml', 32, false),)), $this); ?>
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
          <LI style="LINE-HEIGHT: 25px; WIDTH: 43%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">姓名（工种）</LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">权限 </LI>
          
          <LI style="LINE-HEIGHT: 25px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">状态 </LI>
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
          <LI style="LINE-HEIGHT: 23px; WIDTH: 43%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"> <?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['name']; ?>
（
             <?php unset($this->_sections['bccdnameids']);
$this->_sections['bccdnameids']['name'] = 'bccdnameids';
$this->_sections['bccdnameids']['loop'] = is_array($_loop=$this->_tpl_vars['arrayBccdnames1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bccdnameids']['show'] = true;
$this->_sections['bccdnameids']['max'] = $this->_sections['bccdnameids']['loop'];
$this->_sections['bccdnameids']['step'] = 1;
$this->_sections['bccdnameids']['start'] = $this->_sections['bccdnameids']['step'] > 0 ? 0 : $this->_sections['bccdnameids']['loop']-1;
if ($this->_sections['bccdnameids']['show']) {
    $this->_sections['bccdnameids']['total'] = $this->_sections['bccdnameids']['loop'];
    if ($this->_sections['bccdnameids']['total'] == 0)
        $this->_sections['bccdnameids']['show'] = false;
} else
    $this->_sections['bccdnameids']['total'] = 0;
if ($this->_sections['bccdnameids']['show']):

            for ($this->_sections['bccdnameids']['index'] = $this->_sections['bccdnameids']['start'], $this->_sections['bccdnameids']['iteration'] = 1;
                 $this->_sections['bccdnameids']['iteration'] <= $this->_sections['bccdnameids']['total'];
                 $this->_sections['bccdnameids']['index'] += $this->_sections['bccdnameids']['step'], $this->_sections['bccdnameids']['iteration']++):
$this->_sections['bccdnameids']['rownum'] = $this->_sections['bccdnameids']['iteration'];
$this->_sections['bccdnameids']['index_prev'] = $this->_sections['bccdnameids']['index'] - $this->_sections['bccdnameids']['step'];
$this->_sections['bccdnameids']['index_next'] = $this->_sections['bccdnameids']['index'] + $this->_sections['bccdnameids']['step'];
$this->_sections['bccdnameids']['first']      = ($this->_sections['bccdnameids']['iteration'] == 1);
$this->_sections['bccdnameids']['last']       = ($this->_sections['bccdnameids']['iteration'] == $this->_sections['bccdnameids']['total']);
?>
    	<?php if ($this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameids']['index']]['id'] == $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['typework']): ?>
       <?php echo $this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameids']['index']]['typename']; ?>

        <?php endif; ?>
        <?php endfor; endif; ?>）
 </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php if ($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['freeze'] == 1): ?>冻结<?php else: ?>正常<?php endif; ?> </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php if ($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['permissions'] == 1): ?>队长<?php elseif ($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['permissions'] == 2): ?>管理员<?php elseif ($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['permissions'] == 3): ?>超级管理员<?php else: ?>员工<?php endif; ?> </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"> <a href="?edit=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&imagename=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['picture']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改</a></LI>
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
/aeditadmin.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditadmin.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditadmin.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditadmin.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
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
/aeditadmin.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
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
     <form name="form_addserver" method="post" enctype="multipart/form-data" style="margin:0px; padding:0px;">         
                <p>员工名称：
                <input type="text" name="servername" id="servername" value="<?php echo $this->_tpl_vars['bcjyz'][0]['name']; ?>
" size="60" class="input1" /><br/><br/>
                             
                                                                    权限：
                                                                    <input name="permissions" type="radio" id="permissions" value="1" <?php if ($this->_tpl_vars['bcjyz'][0]['permissions'] == 1): ?> checked="checked"<?php endif; ?>  />
                                                                    队长 <input name="permissions" type="radio" id="permissions" value="2" <?php if ($this->_tpl_vars['bcjyz'][0]['permissions'] == 2): ?> checked="checked"<?php endif; ?>  />
                                                                    管理员
                                                                     <input name="permissions" type="radio" id="permissions" value="3" <?php if ($this->_tpl_vars['bcjyz'][0]['permissions'] == 3): ?> checked="checked"<?php endif; ?>  />
                                                                    超级管理员<br/><br/>    
                                                                    冻结/解冻：
    <input type="radio" name="freeze" id="freeze" value="1" <?php if ($this->_tpl_vars['bcjyz'][0]['freeze'] == 1): ?> checked="checked"<?php endif; ?> />
    冻结
    <input type="radio" name="freeze" id="freeze" value="0" <?php if ($this->_tpl_vars['bcjyz'][0]['freeze'] == 0): ?> checked="checked"<?php endif; ?> />
    解冻
                  <br/><br/>                                                      

    <input type="hidden" name="bcjyzid" value="<?php echo $this->_tpl_vars['bcjyz'][0]['id']; ?>
">
         <input type="submit" name="submit" id="submit" value="提交" />&nbsp;&nbsp;<input type="reset" value="重写" />
                </p>
  </form> 
    </div>
    <?php endif; ?> </div>
</div>