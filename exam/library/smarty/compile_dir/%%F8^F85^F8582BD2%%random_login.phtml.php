<?php /* Smarty version 2.6.19, created on 2016-09-27 09:21:02
         compiled from random_login.phtml */ ?>
<LINK rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/login.css">
<script language="javascript">
function chklogin(form){  
        if(form.name.value==''){
            alert('请输入用户名！');
            form.name.focus();
            return false; 
        }
          if(form.password.value==''){
            alert('请输入密码！');
            form.password.focus();
            return false; 
        }   
        return true;
    }
</script>
<div id="box">
  <div id="top2"></div>
    <div id="con">
    	<div class="con_c">
          <form id="form1" name="form1" method="post" action="" onsubmit="return chklogin(this)">
           	     
       	  <div class="con_c_l">
            	<ul>
                    <li><span class="font1">用 户 名：</span><input name="name" class="font2" type="text" value="明日科技"/></li>
                    <li><span class="font1">密 &nbsp;&nbsp; 码：</span><input name="password" class="font2" type="password" value="000000"/></li>
                    <li style="padding-left:140px;"><a href="updatepassword.php">修改密码</a> </li>
                </ul>
          </div>
            <div class="con_c_r">
            	<div class="con_c_r_a">
            	  <input type="image" name="submit" id="submit" src="images/login2.jpg" />
           	  </div>
            </div>
               </form>
        </div>
         
    </div>
     <div style="padding-left:40px; padding-top:-12px;"> <span> <br><br><br>完全模拟煤矿考试系统，熟悉、了解煤矿考试的过程。</span></div>
</div>