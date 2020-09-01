<?php /* Smarty version 2.6.19, created on 2016-09-27 09:14:26
         compiled from Special_exercises.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'Special_exercises.phtml', 39, false),)), $this); ?>
<LINK rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/login.css">
<script language="javascript">
function chklogin(form){  
        if(form.pro_class.value==''){
            alert('请选择类别！');
            form.pro_class.focus();
            return false; 
        }
          if(form.pro_type.value==''){
            alert('请选择题型！');
            form.pro_type.focus();
            return false;
        }
	    return true;
    }
</script>
<div id="box">
  <div id="top3"></div>
    <div id="con">
    	<div class="con_c">
          <form id="form1" name="form1" method="post" target="_blank" onsubmit="return chklogin(this)">
           	     
       	  <div class="con_c_l">
            	<ul>
                    <?php if ($_SESSION['name'] == ''): ?>
                    <li><span class="font1">用户名称：</span>
                        <input name="netname" class="font2" type="text"/></li>
                    <li><span class="font1">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input name="password" class="font2" type="password" /></li>
                    <?php endif; ?>
                    <li><span class="font1">选择类别：</span>
						<select name="pro_class" id="pro_class" class="font2">
                        	<option value="" selected="selected">请选择类别</option>
                            <?php echo $this->_tpl_vars['displayType']; ?>

                      	</select>
                    </li>
                    <li><span class="font1">选择题型：</span>
                      	<select name="pro_type" id="pro_type" class="font2">
                        	<option value="" selected="selected">请选择题型</option>
                         	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayTypes']), $this);?>

                      	</select>
                    </li>
                    <li style="padding-left:140px;"><a href="updatepassword.php">修改密码</a> </li>
                </ul>
          </div>
            <div class="con_c_r">
            	<div class="con_c_r_a">
            	  <input type="image" name="submit" id="submit" src="images/34.jpg" />
           	  </div>
            </div>
               </form>
        </div>
       
    </div>
</div>