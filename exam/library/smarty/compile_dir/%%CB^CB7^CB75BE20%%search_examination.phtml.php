<?php /* Smarty version 2.6.19, created on 2016-09-27 09:17:59
         compiled from search_examination.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'search_examination.phtml', 30, false),)), $this); ?>
<LINK rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/login.css">
<script language="javascript">
function chklogin(form){  
        if(form.admission.value==''){
            alert('请输入准考证号！');
            form.admission.focus();
            return false; 
        }
		   if(form.select_exam.value==''){
            alert('请选择正确的考试题！');
            form.select_exam.focus();
            return false; 
        }   
        return true; 
    }
</script>
<div id="box">
  <div id="top1"></div>
    <div id="con">
    	<div class="con_c">
          <form id="form1" name="form1" method="post" action="" onsubmit="return chklogin(this)">
           	     
       	  <div class="con_c_l">
            	<ul>
                    <li><span class="font1">准考证号：</span><input name="admission" class="font2" type="text" value="" /></li>
                                <li><span class="font1">选择考题：</span>
                      <select name="select_exam" id="select_exam" class="font2">
                        <option value="" selected="selected">请选择正确的考试题</option>       
                      
                         <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayBccdnames']), $this);?>

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