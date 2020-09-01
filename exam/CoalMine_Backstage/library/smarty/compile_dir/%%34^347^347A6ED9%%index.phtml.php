<?php /* Smarty version 2.6.19, created on 2016-09-27 09:19:03
         compiled from index.phtml */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>煤矿后台登录系统</title>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/login.js"></script>
<script language="javascript">
    if(top.location != self.location){
        top.location = self.location
    }

      function chk_login(form){
        if(form.name.value==''){
            alert('请输入帐号！');
            form.name.focus();
            return false; 
        }

        if(form.password.value==''){
            alert('请输入密码！');
            form.password.focus();
            return false; 
        }

        if(form.permissions.value==''){
            alert('请选择管理员权限！');
            form.permissions.focus();
            return false; 
        }
        return true; 
    }

</script>
</head>

<body onload="MM_preloadImages('images/8.jpg')">
<form id="form1" name="form1" method="post" action="" onsubmit="return chk_login(this)">
  <div id="box">
    <div class="bg">
      <div class="dl">
        <div class="dl_1"></div>
        <div class="dl_2">
          <div class="dl_0">
            <div class="dl_0_l">
              <ul>
                <li><span class="font1">账号：</span>
                  <input name="name" class="font2" type="text" value="" />
                </li>
                <li><span class="font1">密码：</span>
                  <input name="password" class="font2" type="password" value="" />
                </li>
                <li><span class="font1">权限：</span>
                  <select name="permissions" id="permissions" class="font2">
                    <option >请选择登录身份</option>
                    <option value="1" >队长</option>
                    <option value="2" >管理员</option>
                    <option value="3" selected="selected" >超级管理员</option>
                  </select>
                </li>
              </ul>
            </div>
            <div class="dl_0_r"><input type="image" name="sub_chk" id="sub_chk" src="images/7.jpg" /></div>
          </div>
        </div>
      </div>
    </div>
    <div style="width:1024px; padding-top:20px; text-align:center; margin:0 auto; color:#FFF; font-size:14px;">技术支持：吉林省明日科技有限公司 </div>
  </div>
</form>
</body>
</html>