<?php /* Smarty version 2.6.19, created on 2016-09-27 14:23:02
         compiled from aaddbccdinfo.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'aaddbccdinfo.phtml', 24, false),)), $this); ?>
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
        <br />
        一级标题：
        <input type="text" name="titles" size="70" class="input1" />
        <br />
        <br />
        二级标题：
        <input type="text" name="title" size="70" class="input1" />
        <br/>
        <br/>
          所属类别：
          <select name="pro_class" id="pro_class" class="input1" >
              <option value="">请选择</option>

              <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ktypes']), $this);?>


          </select>
          <br/>
          <br/>
        选择上传内容：
        <input name="zlfilename" type="file" class="input1" id="zlfilename" size="50" />
        <br/>
         <br/>
        注意：请将word文档的内容另存为“.mht”格式进行上传
        <br/>
         <br/>
        <input type="submit" value="提交">
        <br />
        <br />
      </form>
    </DIV>
    <BR>
  </div>
</div>
<script language="javascript">
    function chkinputbccdinfo(form){
        if(form.titles.value==''){
            alert('请输入一级标题！');
            form.titles.focus();
            return false; 
        }
        if(form.title.value==''){
            alert('请输入二级标题！');
            form.title.focus();
            return false; 
        }
           
        return true; 
    }

</script> 