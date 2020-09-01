<?php /* Smarty version 2.6.19, created on 2016-09-27 15:49:28
         compiled from fractionstatistics.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'fractionstatistics.phtml', 16, false),array('modifier', 'escape', 'fractionstatistics.phtml', 95, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<SCRIPT src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/word_print.js"></SCRIPT>
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
    <br />
    <br />
    <br />
    <DIV class="right_con_form">
        <br />
        <form id="form1" name="form1" method="post" action="" onSubmit="return chkselect(this)">
            考试名称：
        <select name="examid" id="examid" class="input1" onchange="setlink(this)">
            <option value="">请选择</option>
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['titles']), $this);?>

        </select>
            <br/>
            <br/>
            <input name="examination_id" type="hidden"  id="chkid" value="<?php echo $this->_tpl_vars['examination_id']; ?>
"/>

        <div  style="padding-top:18px; padding-bottom:4px; padding-left:6px;">成绩统计分析：<a href="" target="_blank" id="ape" onclick="return chkselect()">成绩统计与分析</a>&nbsp;&nbsp;<a href="" id="aepe" target="_blank" onclick="return chkselect()">考试通过率分析</a>&nbsp;&nbsp; <a id="aspe" href="" onclick="return chkselect()">部门成绩统计分析</a>&nbsp;&nbsp; <a href="" id="adpe" onclick="return chkselect()">部门通过率分析</a>
    </form>
    </DIV>
      <?php if ($this->_tpl_vars['pros'] == 'T'): ?>
      <DIV class="right_con_bt" style="width:725px; height:100px; line-height:22px; padding-left:10px; padding-top:5px; padding-bottom:5px;">
          <form name="form_addbccdbb" method="post" action="departments.php" target="_blank" enctype="multipart/form-data">
              <p>
                  <?php 
                  $i=0;
                   ?>
                  <?php unset($this->_sections['type_id']);
$this->_sections['type_id']['name'] = 'type_id';
$this->_sections['type_id']['loop'] = is_array($_loop=$this->_tpl_vars['pro']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['type_id']['show'] = true;
$this->_sections['type_id']['max'] = $this->_sections['type_id']['loop'];
$this->_sections['type_id']['step'] = 1;
$this->_sections['type_id']['start'] = $this->_sections['type_id']['step'] > 0 ? 0 : $this->_sections['type_id']['loop']-1;
if ($this->_sections['type_id']['show']) {
    $this->_sections['type_id']['total'] = $this->_sections['type_id']['loop'];
    if ($this->_sections['type_id']['total'] == 0)
        $this->_sections['type_id']['show'] = false;
} else
    $this->_sections['type_id']['total'] = 0;
if ($this->_sections['type_id']['show']):

            for ($this->_sections['type_id']['index'] = $this->_sections['type_id']['start'], $this->_sections['type_id']['iteration'] = 1;
                 $this->_sections['type_id']['iteration'] <= $this->_sections['type_id']['total'];
                 $this->_sections['type_id']['index'] += $this->_sections['type_id']['step'], $this->_sections['type_id']['iteration']++):
$this->_sections['type_id']['rownum'] = $this->_sections['type_id']['iteration'];
$this->_sections['type_id']['index_prev'] = $this->_sections['type_id']['index'] - $this->_sections['type_id']['step'];
$this->_sections['type_id']['index_next'] = $this->_sections['type_id']['index'] + $this->_sections['type_id']['step'];
$this->_sections['type_id']['first']      = ($this->_sections['type_id']['iteration'] == 1);
$this->_sections['type_id']['last']       = ($this->_sections['type_id']['iteration'] == $this->_sections['type_id']['total']);
?>
                  <?php 
                  $i++;
                   ?>
                  <label> <input type="checkbox" name="types[]" value="<?php echo $this->_tpl_vars['pro'][$this->_sections['type_id']['index']]['pro_class']; ?>
" id="types" <?php if($i<=9){ echo "checked='checked'";} ?> />
                      <?php echo $this->_tpl_vars['pro'][$this->_sections['type_id']['index']]['typename']; ?>
 </label>
                  <?php echo $this->_tpl_vars['pro'][$this->_sections['type_id']['index']]['counts']; ?>
 人
                  &nbsp;&nbsp;
                  <?php endfor; endif; ?> <br />
              </p>
              （注意：每次最多只能对9个部门的成绩进行统计分析！）
              <input name="examination_id" type="hidden"  id="" value="<?php echo $this->_tpl_vars['examination_id']; ?>
"/>
              <input type="submit" value="统计分析各部门的考核成绩">
              </p>
          </form>
      </div>
      <?php endif; ?>

      <?php if ($this->_tpl_vars['prof'] == 'F'): ?>
      <DIV class="right_con_bt" style="padding-left:10px; padding-top:5px; padding-bottom:5px; padding-right:10px;">
          <form name="form_addserver" method="post" action="department.php" target="_blank" enctype="multipart/form-data" style="margin:0px; padding:0px;">
              选择部门：
              <select name="pro_class" id="pro_class">
                  <option value=''>请选择</option>
                  <?php echo $this->_tpl_vars['displayType']; ?>


              </select>
              <input name="examination_id" type="hidden" value="<?php echo $this->_tpl_vars['examination_id']; ?>
" />
              <input type="submit" value="部门成绩统计分析" />

          </form>
      </DIV>
      <?php endif; ?>
      <BR>
  </div>
</div>

<script language="javascript">
    var chkid = document.getElementById("chkid").value;
    var s = document.getElementById("examid");
    if(chkid != ""){
        selectOption(s);
        setlink(s);
    }

    function chkselect(){
        if(s.value==''){
        alert('请选择考试名称！');
        s.focus();
        return false;
        }
        return true;
    }

    function selectOption(s){
        for(var i=0;i< s.options.length;i++){
            if(chkid == s.options[i].value){
                s.options[i].selected = true;
            }
        }
    }
    function setlink(s){
        var examid = s.value;
        document.getElementById('ape').href ="aeditbccdbbs.php?examination_id="+examid+"&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
";
        document.getElementById('aepe').href = "aaddbccdbbs.php?examination_id="+examid+"&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
";
        document.getElementById('aspe').href = "?pro=F&examination_id="+examid+"&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
";
        document.getElementById('adpe').href = "?pro=T&examination_id="+examid+"&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
";
    }
</script>