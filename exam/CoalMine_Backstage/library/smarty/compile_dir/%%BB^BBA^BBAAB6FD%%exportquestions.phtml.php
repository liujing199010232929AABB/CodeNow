<?php /* Smarty version 2.6.19, created on 2012-09-19 10:41:28
         compiled from exportquestions.phtml */ ?>
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
      <form name="form_exportquestiontypes" method="post" action="">
          <div style="width:100%; text-align:center; padding-top:5px; padding-left:50px">
              <input type="submit" name="submit" value="导出试题">
          </div>
      </form>
    </DIV>
    <BR>
  </div>
</div>