<?php /* Smarty version 2.6.19, created on 2016-09-27 13:24:36
         compiled from aaddbccdserver.phtml */ ?>
<script src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<SCRIPT src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/jquery.js"></SCRIPT>
<SCRIPT src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/common.js"></SCRIPT>
<SCRIPT src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/fun.js"></SCRIPT>
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
   <form name="form_addserver" method="post" action="" enctype="multipart/form-data" onsubmit="return chkinputaddserver(this,1)" style="margin:0px; padding:0px;">
                <p>员工名称：
                <input type="text" name="servername" id="servername" size="60" class="input1" /><br/><br/>
                身份证号：
                <input name="ID_number" type="text" id="ID_number" size="50" class="input1" />
                </p>
                <p>所属工种：
  <select name="pro_class" id="pro_class">
    <option value=''>请选择工种</option>
    
                         <?php echo $this->_tpl_vars['displayType']; ?>

                     
  </select>
                  <br /><br />
                  员工职务：<input type="text" name="post" id="post" size="60" class="input1" /><br/><br/>               
                  服务人员照片：<input type="file" name="picture" id="picture" size="60" class="input1" /><br/><br/>   
                  <br/><br/>
                  
                  所属单位：<input type="text" name="units" id="units" size="60" class="input1" /><br/><br/>               
                  家庭地址：<input type="text" name="address" id="address" size="60" class="input1" /><br/><br/>               
                  电话：<input type="text" name="tel" id="tel" size="60" class="input1" /><br/><br/>               
                  <input type="submit" value="提交" />&nbsp;&nbsp;<input type="reset" value="重写" />
                </p>
     </form>     
    </DIV>
    <BR>
  </div>
</div>