<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,form,passwordStrength-min" />
</head>

<body>
<include file="Inc/head" />

<p class="wid1000 sysfield">管理员密码修改</p>

<div class="wid1000">
<form class="pwdForm" id="pwdForm" name="pwdForm" action="{:U('User/editPassword')}" method="post">

	<table width="1000" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="89" height="42" align="right">原始密码：</td>
			<td width="206"><input type="password" class="text400bg" name="oldpwd" id="oldpwd" /></td>
            <td width="705">
            <div class="Validform_checktip"></div>
            
</td>
	  </tr>
		<tr>
			<td width="89" height="42" align="right">新密码：</td>
			<td><input type="password" class="text400bg" name="newpwd" id="newpwd"  /></td>
            <td>
            <div class="Validform_checktip"></div>
            <div class="passwordStrength" style="display:none;"><b>密码强度：</b> <span>弱</span><span>中</span><span class="last">强</span></div>
            </td>
		</tr>
		<tr>
			<td width="89" height="42" align="right">确认密码：</td>
			<td><input type="password" class="text400bg" name="chkpwd" id="chkpwd" /></td>
            <td><div class="Validform_checktip"></div></td>
		</tr>
		<tr>
			<td width="89" height="42" align="right"></td>
			<td><input type="submit" class="linkcommon" value="保存" /></td>
            <td></td>
		</tr>
	</table>
    
</form>    
</div>
<script language="javascript">
$(function(){	
		
		
var obj=$(".pwdForm").Validform({
		tiptype:2,
		usePlugin:{
			passwordstrength:{
				minLen:5,//设置密码长度最小值，默认为0;
				maxLen:15,//设置密码长度最大值，默认为30;
				trigger:function(obj,error){
					//该表单元素的keyup和blur事件会触发该函数的执行;
					//obj:当前表单元素jquery对象;
					//error:所设密码是否符合验证要求，验证不能通过error为true，验证通过则为false;
					
					//console.log(error);
					if(error){
						obj.parent().next().find(".Validform_checktip").show();
						obj.parent().next().find(".passwordStrength").hide();
					}else{
						obj.parent().next().find(".Validform_checktip").hide();
						obj.parent().next().find(".passwordStrength").show();	
					}
				}
			}
		}

	});
	
	obj.addRule([{
		ele:"#oldpwd:eq(0)",
		datatype:"*5-15",
		ajaxurl:"{:U('User/ajaxCheckUserPass')}",
		nullmsg:"请填写原始密码",
		errormsg:"密码长度为5-15位",
	}
	,
	{
		ele:"#newpwd:eq(0)",
		datatype:"*5-15",
		nullmsg:"请填写新密码",
		errormsg:"密码长度为5-15位",
		plugin:"passwordStrength"
	}
	,
	{
		ele:"#chkpwd:eq(0)",
		datatype:"*5-15",
		nullmsg:"请填写确认密码",
		errormsg:"两次密码输入不一致",
		recheck:"newpwd"
	}]);
		
		
		
		
});
</script>



</body>
</html>
