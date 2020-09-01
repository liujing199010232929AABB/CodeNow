<?php /* Smarty version 2.6.19, created on 2016-09-27 09:40:30
         compiled from updatepassword.phtml */ ?>
<LINK rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/login.css">
<!--<?php if ($this->_tpl_vars['update'] != 'T'): ?>-->
<!--<form name="form_updatepassword" method="post" action="" onSubmit="return chklogin(this)" >-->
<!--请输入您的准考证号：<input type="text" name="adminssion" value="" /><br>-->
<!--请输入密码：<input type="password" name="password" value="" />  <br>-->
<!--    <input type="submit" name="submit1" value="提交">-->
<!--</form>-->
<!--    -->
<!--<?php endif; ?>-->
<!--    <?php if ($this->_tpl_vars['update'] == 'T'): ?>-->
<!--<form name="form_updatepassword" method="post" action="" onSubmit="return chkupdate(this)">-->
<!--    请输入密码：<input type="text" name="password1" value="" /><br>-->
<!--    请输入重复输入密码：<input type="password" name="password2" value="" />  <br>-->
<!--    <input type="submit" name="submit2" value="提交">-->
<!--</form>-->
<!--    <?php endif; ?>-->
<div id="box">
    <div id="con">
        <div class="con_c">
            <?php if ($this->_tpl_vars['update'] != 'T'): ?>
            <form id="form1" name="form1" method="post" action="updatepassword.php" onsubmit="return chklogin(this)">

                <div class="con_c_l">
                    <ul>
                        <li><span class="font1">准考证号：</span><input name="admission" class="font2" type="text" value="" /></li>
                        <li><span class="font1">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input name="password" class="font2" type="password" value=""/></li>
                        <li><input type="submit" name="submit1"  value="登录" /></li>
                    </ul>
                </div>
            </form>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['update'] == 'T'): ?>
            <form id="form2" name="form2" method="post" action="updatepassword.php" onsubmit="return chkupdate(this)">

                <div class="con_c_l">
                    <ul>
                        <li><span class="font1">请输入密码：</span><input name="password1" class="font2" type="password" value="" /></li>
                        <li><span class="font1">请输入重复输入密码：</span><input name="password2" class="font2" type="password" value=""/></li>
                        <li>
                            <input type="hidden" name="admission"  value="<?php echo $this->_tpl_vars['admission']; ?>
" />
                            <input type="submit" name="submit2"  value="提交" />
                        </li>
                    </ul>
                </div>

            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--内容结束 -->
<script language="javascript">
    function chklogin(form){
        if(form.admission.value==''){
        alert('请输入准考证号！');
        form.admission.focus();
        return false;
        }
        if(form.password.value==''){
        alert('请输入密码！');
        form.password.focus();
        return false;
        }
        return true;
    }

    function chkupdate(form){
        if(form.password1.value==''){
        alert('请输入您要修改的密码！');
        form.password1.focus();
        return false;
        }
        if(form.password1.value.length < 6){
        alert('请输入6位以上密码！');
        form.password1.focus();
        return false;
        }
        if(form.password2.value==''){
        alert('请再输入一次！');
        form2.password2.focus();
        return false;
        }
        if(form.password2.value != form.password1.value){
        alert('请输入一致！');
        form.password2.focus();
        return false;
        }
        return true;
    }
</script>