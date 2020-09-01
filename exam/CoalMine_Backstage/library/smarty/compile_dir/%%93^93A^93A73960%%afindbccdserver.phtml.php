<?php /* Smarty version 2.6.19, created on 2016-09-27 14:06:14
         compiled from afindbccdserver.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'afindbccdserver.phtml', 46, false),array('modifier', 'escape', 'afindbccdserver.phtml', 102, false),)), $this); ?>
<link rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/examinations.css">
<script type="text/javascript">
function chksearch(form){  
	if(form.pro_class.value=='-1' && form.name.value==''&& form.ID_number.value==''&& form.tel.value==''&& form.admission.value==''&& form.post.value==''&& form.units.value==''&& form.address.value==''&& form.year.value=='-1'){
		alert('请输入查询条件！');
        form.name.focus();
        return false; 
   	}
    return true;
}
</script>
<!--右侧-->
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
    <div class="right_con_bt" style=" height:35px; padding-top:4px; padding-bottom:4px; padding-left:6px; ">
      <form id="form1" name="form1" method="post" action="afindbccdserver.php?big_type=<?php echo $_GET['big_type']; ?>
&small_type=<?php echo $_GET['small_type']; ?>
" onsubmit="return chksearch(this)" >
          姓名：
        <input name="name" id="name" type="text" size="10"  value="<?php echo $this->_tpl_vars['sname']; ?>
"/>
        身份证号码：
        <input name="ID_number" id="ID_number" type="text" size="15"  value="<?php echo $this->_tpl_vars['sidnum']; ?>
"/>
        电话：
        <input name="tel" id="tel" type="text" size="5"  value="<?php echo $this->_tpl_vars['stel']; ?>
"/>
        地址：
        <input name="address" id="address" type="text" size="20" value="<?php echo $this->_tpl_vars['saddr']; ?>
"/>
       <br />     
        准考证号：
        <input name="admission" id="admission" type="text" size="35"  value="<?php echo $this->_tpl_vars['sadmiss']; ?>
"/>
             <br />  
          所属工种：
        <select name="pro_class" id="pro_class" class="input1" >
          <option value="-1">请选择</option>     
    	<?php echo $this->_tpl_vars['displayType']; ?>

        </select>
          职务：
        <input name="post" id="post" type="text" size="15"  value="<?php echo $this->_tpl_vars['spost']; ?>
"/>
        所属单位：
        <input name="units" id="units" type="text" size="20" value="<?php echo $this->_tpl_vars['sunits']; ?>
"/>
 
       
          <br />  
        入职时间：
        <select name="year" id="year">
          <option value="-1">请选择</option>
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayYear'],'selected' => $this->_tpl_vars['syear']), $this);?>

                
        </select>
        年
        <select name="month" id="month">
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMonth'],'selected' => $this->_tpl_vars['smonth']), $this);?>

                
        </select>
        月
        <select name="day" id="day">
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayDay'],'selected' => $this->_tpl_vars['sday']), $this);?>

                
        </select>
        日
        <select name="years" id="years">
            <option value="-1">请选择</option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayYear'],'selected' => $this->_tpl_vars['syears']), $this);?>

                
        </select>
        年
        <select name="months" id="months">

                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMonth'],'selected' => $this->_tpl_vars['smonths']), $this);?>

                
        </select>
        月
        <select name="days" id="days">
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayDay'],'selected' => $this->_tpl_vars['sdays']), $this);?>

                
        </select>
        日
        <input type="submit" id="submit" value="查询" name="submit">
      </form>
    </div>
    <div> <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
      <DIV style="padding-left:6px;">
        <UL>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 6%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">ID</LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 42%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">姓名（电话）—准考证号</LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 31%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">工种（职务）—级别</LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">操作 </LI>
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
          <LI style="LINE-HEIGHT: 23px; WIDTH: 6%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"> <?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
 </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 42%; FLOAT: left; padding-left:10px; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['name']; ?>
（<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['tel']; ?>
）—<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['admission']; ?>
</LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 31%; FLOAT: left; padding-left:10px; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php unset($this->_sections['bccdnameids']);
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
            <?php endfor; endif; ?><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['pro_type']; ?>
（<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['post']; ?>
）—<?php if ($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['permissions'] == 0): ?>员工<?php elseif ($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['permissions'] == 1): ?>队长<?php elseif ($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['permissions'] == 2): ?>管理员<?php else: ?>超级管理员<?php endif; ?></LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"> <a href="aeditbccdserver.php?edit=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改员工信息')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="aeditbccdserver.php?delete=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改员工信息')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a> </LI>
        </UL>
      </DIV>
      <?php endfor; endif; ?>
      <div style="padding-left:6px; padding-top:6px; padding-bottom:6px;">
        <div style="height:22px;  float:left">
          <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
篇&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
篇&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdserver.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['name'] != ''): ?>&name=<?php echo $this->_tpl_vars['name']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sname'] != ''): ?>&name=<?php echo $this->_tpl_vars['sname']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['stel'] != ''): ?>&tel=<?php echo $this->_tpl_vars['stel']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['spro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['saddr'] != ''): ?>&address=<?php echo $this->_tpl_vars['saddr']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sidnum'] != ''): ?>&ID_number=<?php echo $this->_tpl_vars['sidnum']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sadmiss'] != ''): ?>&admission=<?php echo $this->_tpl_vars['sadmiss']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spost'] != ''): ?>&post=<?php echo $this->_tpl_vars['spost']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sunits'] != ''): ?>&units=<?php echo $this->_tpl_vars['sunits']; ?>
<?php endif; ?>&flag=<?php echo $this->_tpl_vars['flag']; ?>
<?php if ($this->_tpl_vars['yearparams'] != ''): ?><?php echo $this->_tpl_vars['yearparams']; ?>
<?php endif; ?>" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdserver.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['name'] != ''): ?>&name=<?php echo $this->_tpl_vars['name']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sname'] != ''): ?>&name=<?php echo $this->_tpl_vars['sname']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['stel'] != ''): ?>&tel=<?php echo $this->_tpl_vars['stel']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['spro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['saddr'] != ''): ?>&address=<?php echo $this->_tpl_vars['saddr']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sidnum'] != ''): ?>&ID_number=<?php echo $this->_tpl_vars['sidnum']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sadmiss'] != ''): ?>&admission=<?php echo $this->_tpl_vars['sadmiss']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spost'] != ''): ?>&post=<?php echo $this->_tpl_vars['spost']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sunits'] != ''): ?>&units=<?php echo $this->_tpl_vars['sunits']; ?>
<?php endif; ?>&flag=<?php echo $this->_tpl_vars['flag']; ?>
<?php if ($this->_tpl_vars['yearparams'] != ''): ?><?php echo $this->_tpl_vars['yearparams']; ?>
<?php endif; ?>" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdserver.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['name'] != ''): ?>&name=<?php echo $this->_tpl_vars['name']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sname'] != ''): ?>&name=<?php echo $this->_tpl_vars['sname']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['stel'] != ''): ?>&tel=<?php echo $this->_tpl_vars['stel']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['spro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['saddr'] != ''): ?>&address=<?php echo $this->_tpl_vars['saddr']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sidnum'] != ''): ?>&ID_number=<?php echo $this->_tpl_vars['sidnum']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sadmiss'] != ''): ?>&admission=<?php echo $this->_tpl_vars['sadmiss']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spost'] != ''): ?>&post=<?php echo $this->_tpl_vars['spost']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sunits'] != ''): ?>&units=<?php echo $this->_tpl_vars['sunits']; ?>
<?php endif; ?>&flag=<?php echo $this->_tpl_vars['flag']; ?>
<?php if ($this->_tpl_vars['yearparams'] != ''): ?><?php echo $this->_tpl_vars['yearparams']; ?>
<?php endif; ?>" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdserver.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['name'] != ''): ?>&name=<?php echo $this->_tpl_vars['name']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sname'] != ''): ?>&name=<?php echo $this->_tpl_vars['sname']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['stel'] != ''): ?>&tel=<?php echo $this->_tpl_vars['stel']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['spro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['saddr'] != ''): ?>&address=<?php echo $this->_tpl_vars['saddr']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sidnum'] != ''): ?>&ID_number=<?php echo $this->_tpl_vars['sidnum']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sadmiss'] != ''): ?>&admission=<?php echo $this->_tpl_vars['sadmiss']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spost'] != ''): ?>&post=<?php echo $this->_tpl_vars['spost']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sunits'] != ''): ?>&units=<?php echo $this->_tpl_vars['sunits']; ?>
<?php endif; ?>&flag=<?php echo $this->_tpl_vars['flag']; ?>
<?php if ($this->_tpl_vars['yearparams'] != ''): ?><?php echo $this->_tpl_vars['yearparams']; ?>
<?php endif; ?>" class="a1">尾页</a></strong> </div>
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
/afindbccdserver.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['name'] != ''): ?>&name=<?php echo $this->_tpl_vars['name']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sname'] != ''): ?>&name=<?php echo $this->_tpl_vars['sname']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['stel'] != ''): ?>&tel=<?php echo $this->_tpl_vars['stel']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['spro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['saddr'] != ''): ?>&address=<?php echo $this->_tpl_vars['saddr']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sidnum'] != ''): ?>&ID_number=<?php echo $this->_tpl_vars['sidnum']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sadmiss'] != ''): ?>&admission=<?php echo $this->_tpl_vars['sadmiss']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['spost'] != ''): ?>&post=<?php echo $this->_tpl_vars['spost']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['sunits'] != ''): ?>&units=<?php echo $this->_tpl_vars['sunits']; ?>
<?php endif; ?>&flag=<?php echo $this->_tpl_vars['flag']; ?>
<?php if ($this->_tpl_vars['yearparams'] != ''): ?><?php echo $this->_tpl_vars['yearparams']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?><?php endif; ?></a> </div>
          <?php endfor; endif; ?> </div>
      </div>
      <?php endif; ?> </div>
  </div>
</div>