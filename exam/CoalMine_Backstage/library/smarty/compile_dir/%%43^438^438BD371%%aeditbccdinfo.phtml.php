<?php /* Smarty version 2.6.19, created on 2016-09-27 14:23:04
         compiled from aeditbccdinfo.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'aeditbccdinfo.phtml', 32, false),array('function', 'html_options', 'aeditbccdinfo.phtml', 67, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/checkbox.js"></script>
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
          <LI style="LINE-HEIGHT: 25px; WIDTH: 8%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">全选</LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">一级标题 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 37%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">二级标题 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">添加时间 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 19%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">操作 </LI>
        </UL>
      </DIV>
      <form method="post" name="form1" id="form1" action="">
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
          <LI style="LINE-HEIGHT: 23px; WIDTH: 8%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">  <input name="conn_id[]" type="checkbox" id="conn_id[]" value="<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
" />    
            <input type="hidden" name="images[]" id="images" value="<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['attachment']; ?>
" />
          </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"> <?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['titles'],0,12,"...");?>
</LI>
          
          <LI style="LINE-HEIGHT: 23px; WIDTH: 37%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"> <?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['title'],0,60,"...");?>
</LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['addtime']; ?>
 </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 19%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"> <a href="upfiles/Trainingmaterials/<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['attachment']; ?>
" target="_blank" class="a1">预览&nbsp;|&nbsp;<a href="?edit=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="?delete=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&imagename=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['attachment']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a></LI>
        </UL>
      </DIV>
      <?php endfor; endif; ?>
      <br />
 <img src="images/bg_19-20.jpg" onclick="checkAll(form1,status)" width="62" height="25" />&nbsp;&nbsp;<img src="images/bg_14-14.jpg" onclick="switchAll(form1,status)"  width="62" height="25" />&nbsp;&nbsp; <img src="images/bg_07-08.jpg" width="62" height="25" onclick="uncheckAll(form1,status)" /> &nbsp;&nbsp;<input type="image" name="imageField" src="images/bg_14.jpg" />
      </form>
   </DIV>
    <br />
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
篇&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
篇&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdinfo.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdinfo.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdinfo.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdinfo.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
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
/aeditbccdinfo.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
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
      <form name="form_addbcjyz" method="post" action="" enctype="multipart/form-data" onsubmit="return chkInputfile(this)">
        <br />
       一级标题
        <input type="text" name="titles" size="65" value="<?php echo $this->_tpl_vars['bcjyz'][0]['titles']; ?>
" class="input1" />
        <br />
        <br />
        二级标题：
        <input type="text" name="title" size="65" value="<?php echo $this->_tpl_vars['bcjyz'][0]['title']; ?>
" class="input1" />
          <br />
          <br />
          所属类别：
          <select name="pro_class" id="pro_class" class="input1" >
              <option value="">请选择</option>

              <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ktypes'],'selected' => $this->_tpl_vars['bcjyz'][0]['pro_class']), $this);?>


          </select>
          <br/>
          <br/>
        <br/>
        <br/>
        资料上传：
        <input name="zlfilename" type="file" class="input1" id="zlfilename" size="45" />
        <br/>
        <br/>
        <input type="hidden" name="bcjyzid" value="<?php echo $this->_tpl_vars['bcjyz'][0]['id']; ?>
">
        <input type="submit" name="submit" value="提交">
        <br />
        <br />
      </form>
    </div>
    <?php endif; ?> </div>
</div>