<?php /* Smarty version 2.6.19, created on 2016-09-27 10:37:39
         compiled from importquestions.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'importquestions.phtml', 10, false),)), $this); ?>
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
       <form  method="post" action="importquestions.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='试题导入')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" enctype="multipart/form-data" onsubmit="return chkInputfile(this)">
           <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">
                请选择您要导入的文件：<input type="file" name="importfile" size="30" class="input1"/><br /><br />
               所属类别：
               <select name="pro_class" id="pro_class" class="input1" >
                   <option value="">请选择</option>

                   <?php echo $this->_tpl_vars['displayType']; ?>


               </select><br><br>
               请选择要导入的试题类型:<select name="pro_type" id="pro_type">
                   <option value="">请选择</option>
                   <?php echo $this->_tpl_vars['tb_exam_type']; ?>

               </select><br><br>
               请输入该题型的分数:<input type="text" name="fraction" size="10" class="input1"/><br><br>
               <input type="hidden" name="MAX_FILE_SIZE" value="40000"></a>
                <input type="submit" value="导入试题" />
            </div>
       </form>
    </DIV>
    <BR>
  </div>
</div>

<script language="javascript">
    function chkInputfile (form) {
    if (form.importfile.value == "") {
    alert("请选择您要导入的文件！");
    form.importfile.focus();
    return false;
    }
    str = form.importfile.value.split(".");
    extname = str[str.length-1];
    if(!(extname == 'xls' || extname == 'xlsx')){
    alert("您上传的文件格式不对！");
    form.importfile.focus();
    return false;
    }
    if (form.pro_class.value == "") {
    alert("请选择类别！");
    form.pro_class.focus();
    return false;
    }
    if (form.pro_type.value == "") {
    alert("请选择试题类型！");
    form.pro_type.focus();
    return false;
    }
    if (form.fraction.value == "") {
    alert("请输入分数！");
    form.fraction.focus();
    return false;
    }
    if(isNaN(form.fraction.value) || form.fraction.value<=0){
    alert('分数输入错误,请重新输入');
    form.fraction.focus();
    return false;
    }
    return true;
    }
</script>