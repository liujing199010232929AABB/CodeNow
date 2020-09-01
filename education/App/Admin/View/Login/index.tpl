<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理-登录</title>
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,admin,FormValid,FormBlur" />

<script type="text/javascript">
	FormValid.showError = function(errMsg,errName,formName) {
		if (formName=='loginForm') {
			return true;
		}
	};

	var r = null;
	//检测用户名
	function ckname (inp) {
		var data = { username: inp.value,r: Math.random() };
		$.ajax({
			type:"GET",
			url:"{:U('Login/ajaxCheckUser')}",
			data: data,
			dataType:"text",
			async:false,success:function (msg){
				r = msg;
			}});
		if (r==0 || r==null) {
			$("#icon_admin_username").html('<img src="__IMG__/ico5_16.jpg" width="34" height="32" />');
			return false;
		} else {
			$("#icon_admin_username").html('<img src="__IMG__/ico4.jpg" width="34" height="32" />');
			return true;
		}
	}
	//检测密码
	function ckpwd (inp) {
		var username = document.getElementById('admin_username').value;
		var data = { username: username,password: inp.value,r: Math.random() }
		$.ajax({
			type:"GET",
			url:"{:U('Login/ajaxCheckPwd')}",
			data: data,
			dataType:"text",
			async:false,
			success:function (msg){
				r = msg;
			}
		});
		if (r==0 || r==null) {
			$("#icon_admin_password").html('<img src="__IMG__/ico5_16.jpg" width="34" height="32" />');
			return false;
		} else {
			$("#icon_admin_password").html('<img src="__IMG__/ico4.jpg" width="34" height="32" />');
			return true;
		}
	}
	//检测验证码
	function ckvaild (inp) {
		var data = { valid: inp.value,r: Math.random() }
		$.ajax({
			type:"GET",
			url:"{:U('Login/ajaxCheckValid')}",
			data: data,
			dataType:"text",
			async:false,
			success:function (msg){
				r = msg;
			}
		});
		if (r==0) {
			$("#icon_admin_valid").html('<img src="__IMG__/ico5_16.jpg" width="34" height="32" />');
			$("#valid").attr('src','{:U("Login/sendAdminValid?r=")}?r='+Math.random());
			return false;
		} else {
			$("#icon_admin_valid").html('<img src="__IMG__/ico4.jpg" width="34" height="32" />');
			return true;
		}
	}
	//更改验证码
	function changeValid(){
		$("#valid").attr('src','{:U("Login/sendAdminValid?r=")}?r='+Math.random());
	}

</script>
	
</head>
<body>
	<div class="login_out">
		<div class="login_in">
			<div class="log_top">
			  <p>明日科技有限公司</p>
			</div>
			<div class="log_btm">
				<div class="log_logo">
					<a href="http://study.mingrisoft.com" target="_blank">
						<img src="__IMG__/logo.jpg" width="220" height="150" />
					</a>
				</div>
				<div class="log_r"  id="login1_r">
					<form action="{:U('Login/userLogin')}" method="post" name="loginForm" id="loginForm">
						<input name="action" type="hidden" value="login" />
						<table width="365" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="60" height="36" align="center"><img src="__IMG__/ico1.jpg" width="28" height="26" /></td>
								<td width="232"><input type="text" class="text220" id="admin_username" name="admin_username" valid="custom" custom="ckname" /></td>
								<td align="center" id="icon_admin_username"></td>
							</tr>
							<tr>
								<td height="36" align="center"><img src="__IMG__/ico2.jpg" width="28" height="26" /></td>
								<td><input type="password" class="text220" id="admin_password" name="admin_password" valid="custom" custom="ckpwd" /></td>
								<td align="center" id="icon_admin_password"></td>
							</tr>
							<tr>
								<td height="36" align="center"><img src="__IMG__/ico3_11.jpg" width="28" height="26" /></td>
								<td><input type="text" class="text105" id="admin_valid" name="admin_valid" valid="custom" custom="ckvaild" maxlength="4" />
								<img src='{:U("Login/sendAdminValid")}' id='valid' onclick='javascript:changeValid()' align="absmiddle" />
								</td>
								<td align="center" id="icon_admin_valid"></td>
							</tr>
							<tr>
							<td height="46">&nbsp;</td>
							<td><img src="__IMG__/php4.0_14.jpg" width="231" height="35" id="loginbtn"  onclick="javascript:if (validator(document.loginForm)){document.loginForm.submit();}" /></td>
							<td>&nbsp;</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
<script>
$(function(){
	$('#loginbtn').hover(function(){
		$(this).stop(true,true).animate({opacity:'0.8'},200);	
	},function(){
		$(this).stop(true,true).animate({opacity:'1'},200);		
	});	
});
</script>
<script type="text/javascript">
initValid(document.loginForm);
</script>
</body>
</html>
