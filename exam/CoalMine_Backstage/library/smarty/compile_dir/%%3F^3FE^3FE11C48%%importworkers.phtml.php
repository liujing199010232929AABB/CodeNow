<?php /* Smarty version 2.6.19, created on 2012-10-19 13:50:10
         compiled from importworkers.phtml */ ?>
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
        <div id="message" style="color: red;margin-left: 50px;"><?php echo $this->_tpl_vars['errormessage']; ?>
</div>
       <form  method="post" action="" enctype="multipart/form-data" onsubmit="return chkInputfile(this)">
           <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">
                请选择您要导入的文件：<input type="file" name="importfile" size="30" class="input1"/><br /><br />
               <input type="hidden" name="MAX_FILE_SIZE" value="40000"></a>
               所属类别：
               <select name="pro_class" id="pro_class" class="input1" >
                   <option value="">请选择</option>

                   <?php echo $this->_tpl_vars['displayType']; ?>


               </select><br><br>
                <input type="submit" value="导入员工信息" />
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
    return true;
    }
</script>