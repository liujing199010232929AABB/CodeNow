<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,form,passwordStrength-min" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	系统管理 - 账户管理 - 编辑账户
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="{:U('User/save')}" method="post">
	<table width="1000" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="131" height="36">权限组：</td>
		  	<td width="869">
				<select class="sel1" name="group_id" id="group_id">
					<option value="">请选择</option>
					<foreach name="powerList" item="pp">
						<option value="{$pp.id}">{$pp.group_name}</option>
					</foreach>
				</select>
          <span class="Validform_checktip"></span></td>
	    </tr>
		<tr>
			<td width="131" height="36">账户名称：</td>
		  	<td width="869">
				<input type="text" class="text400bg" name="username" id="username" />
				<span class="Validform_checktip"></span>
			</td>
	    </tr>
		<tr>
			<td width="131" height="36">账户密码：</td>
			<td width="869"><input type="password" class="text400bg" name="password" id="password" />
				<span class="Validform_checktip"></span>
            	<span class="passwordStrength" style="display:none;">
					<b>密码强度：</b>
					<span>弱</span><span>中</span><span class="last">强</span>
				</span>
            </td>
	    </tr>
		<tr>
			<td width="131" height="36">确认密码：</td>
		    <td width="869"><input type="password" class="text400bg" name="chkpwd" id="chkpwd" /><span class="Validform_checktip"></span></td>
	    </tr>
  		<tr>
			<td width="131" height="42" align="right"></td>
	    	<td><input type="submit" class="linkcommon" value="保存" /></td>
		</tr>
	</table>
</form>    
</div>

<script language="javascript">
$(function(){	
	var obj=$(".editForm").Validform({
		tiptype:function(msg,o,cssctl){
			if(!o.obj.is("form")){ //验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
				var objtip=o.obj.siblings(".Validform_checktip");
				cssctl(objtip,o.type); //内置的提示信息样式控制函数
				objtip.text(msg);
			}
		},
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
						obj.parent().find(".Validform_checktip").show();
						obj.parent().find(".passwordStrength").hide();
					}else{
						obj.parent().find(".Validform_checktip").hide();
						obj.parent().find(".passwordStrength").show();	
					}
				}
			}
		}

	});
	
	//验证规则
	obj.addRule([
		{
			ele:"#group_id:eq(0)",
			datatype:"*",
			errormsg:"请选择权限组"
		}
		,
		{
			ele:"#username:eq(0)",
			datatype:"*5-10",
			ajaxurl:"{:U('User/ajaxCheckUsername')}",
			nullmsg:"请填写账户名称",
			errormsg:"账户名称长度为5-10位",
		}
		,
		{
			ele:"#password:eq(0)",
			datatype:"*5-15",
			nullmsg:"请填写账户密码",
			errormsg:"账户密码长度为5-15位",
			plugin:"passwordStrength"  //使用passwordStrength插件
		}
		,
		{
			ele:"#chkpwd:eq(0)",
			datatype:"*5-15",
			nullmsg:"请填写确认密码",
			errormsg:"两次密码输入不一致",
			recheck:"password"
	}]);
});
</script>
</body>
</html>
