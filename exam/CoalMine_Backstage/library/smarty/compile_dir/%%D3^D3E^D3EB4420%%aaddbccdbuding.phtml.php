<?php /* Smarty version 2.6.19, created on 2016-09-27 14:33:23
         compiled from aaddbccdbuding.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'aaddbccdbuding.phtml', 15, false),)), $this); ?>
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
    <form name="form_addbccdinfo" method="post" action="" enctype="multipart/form-data" onsubmit="return chkinputbccdinfo(this)">
   <!-- <br />
    所属类别：
    <select name="pro_class" id="pro_class">
   	  <option value="">请选择</option>
    	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayBccdnames']), $this);?>

    </select>-->
    <br /><br />
    公告标题 ：
    <input name="title" type="text" class="input1" id="title" size="65" />
    <br/>
<br/>
公告内容：<?php echo $this->_reg_objects['util'][0]->editor('content',"","90%",'230');?>

<br/> 
<br />
    <input type="submit" value="提交"> <br />
    <br />
    </form>
    </DIV>
    <BR>
  </div>
</div>
<script language="javascript">
    function chkinputbccdinfo(form){
      /*  if(form.pro_class.value==''){
            alert('请选择所属类别！');
            form.pro_class.focus();
            return false; 
        }*/

        if(form.title.value==''){
            alert('请填写公告标题！');
            form.title.focus();
            return false; 
        }
	   
        return true; 
    }
</script>