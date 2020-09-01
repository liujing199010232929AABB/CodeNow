<?php /* Smarty version 2.6.19, created on 2016-09-27 14:33:19
         compiled from aaddbccdupdate.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'aaddbccdupdate.phtml', 15, false),)), $this); ?>
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
  <!--  <br />
    所属类别：
    <select name="pro_class" id="pro_class">
   	  <option value="">请选择</option>
    	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayBccdnames']), $this);?>

    </select>-->
    <br /><br />
    新闻标题 ：
    <input name="title" type="text" class="input1" id="title" size="65" />
    <br/>
<br/>
新闻内容：<?php echo $this->_reg_objects['util'][0]->editor('content',"","90%",'230');?>

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
        if(form.title.value==''){
            alert('请输入新闻标题！');
            form.title.focus();
            return false; 
        }       
	   
        return true; 
    }

</script>