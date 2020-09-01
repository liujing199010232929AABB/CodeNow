<?php /* Smarty version 2.6.19, created on 2016-09-27 15:49:30
         compiled from aaddadmin.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'aaddadmin.phtml', 12, false),)), $this); ?>
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
    <div class="right_con_form">
      <form name="form" method="post" id="form" action="" onsubmit="return chklogin(this)" >
        <p>选择员工：
          <select name="name" id="name">
          <option selected>请选择员工</option>
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayBccdnames']), $this);?>
       
          </select>
          <br />
          <br />
          权限： 
          <input name="permissions" type="radio" id="permissions" value="1" />
          队长
          <input name="permissions" type="radio" id="permissions" value="2"  />
          管理员
          <input name="permissions" type="radio" id="permissions" value="3"  />
          超级管理员<br/>
          <br/>
          冻结/解冻：
          <input type="radio" name="freeze" id="freeze" value="1"  />
          冻结
          <input name="freeze" type="radio" id="freeze" value="0" checked  />
          解冻 <br/>
          <br/>
          <input type="submit" name="submit" id="submit" value="提交" />
          &nbsp;&nbsp;
          <input type="reset" value="重写" />
        </p>
      </form>
    </div>
   </div>
</div>
<script language="javascript">
function chklogin(form){  
	if(form.name.value=='' ){
    	alert('请选择管理员！');
        form.name.focus();
        return false; 
  	}
	if(form.permissions.value=='' ){
    	alert('请设置管理员权限！');
        form.permissions.focus();
        return false; 
  	}
    	return true;
}
</script>