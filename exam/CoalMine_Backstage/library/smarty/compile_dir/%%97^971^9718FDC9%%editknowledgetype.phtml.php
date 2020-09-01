<?php /* Smarty version 2.6.19, created on 2016-09-27 10:37:21
         compiled from editknowledgetype.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'editknowledgetype.phtml', 24, false),)), $this); ?>
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
          <LI style="LINE-HEIGHT: 25px; WIDTH: 63%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">类别名称 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">添加时间 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">操作 </LI>
        </UL>
      </DIV>
     <?php unset($this->_sections['tID']);
$this->_sections['tID']['name'] = 'tID';
$this->_sections['tID']['loop'] = is_array($_loop=$this->_tpl_vars['bigtypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <DIV style="padding-left:6px;">
        <UL>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 63%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bigtypes'][$this->_sections['tID']['index']]['name']; ?>
</LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bigtypes'][$this->_sections['tID']['index']]['addtime']; ?>
</LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"> 
           <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/editknowledgetype.php?f=edit&id=<?php echo $this->_tpl_vars['bigtypes'][$this->_sections['tID']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
">更改</a>&nbsp;<a href="javascript:if(window.confirm('确定删除？')==true){window.location.href='<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/editknowledgetype.php?f=del&id=<?php echo $this->_tpl_vars['bigtypes'][$this->_sections['tID']['index']]['id']; ?>
&big_type=<?php echo $_GET['big_type']; ?>
&small_type=<?php echo $_GET['small_type']; ?>
';}">删除</a>
          </LI>
        </UL>
      </DIV>
      <?php endfor; endif; ?> 
   </DIV>
    <br />
    <br />
    <br/>
     <?php if ($this->_tpl_vars['isShow'] == 'T'): ?>
    <div class="right_con_form">
      <form name="form_editbigtype" method="post" action="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/editknowledgetype.php?big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" >
            <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">

                  大类名称：<input type="text" name="name" size="30" class="input" value="<?php echo $this->_tpl_vars['bigtype'][0]['name']; ?>
"/><br /><br />
                  <input type="hidden" name="f" value="edit" /> 
                  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['bigtype'][0]['id']; ?>
" /> 
                <input type="submit" value="更改" />&nbsp;&nbsp;<input type="button" onclick="resetv()" value="重置" />
            </div> 
      </form>  
    </div>
    <?php endif; ?> </div>
</div>
<script language="javascript">
    function resetv(){
    document.getElementById("name").value = "";
    }
</script>