<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,form" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	开发人员平台-语言管理-<if condition="$dataInfo.id gt 0 ">修改语言<else />添加语言</if>
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="{:U('Build/langSave')}" method="post">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
	<table width="1000" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="131" height="36">语言名称：</td>
		  <td width="869"><input type="text" class="text400bg" name="title" id="title" value="{$dataInfo.title}" /><span class="Validform_checktip"></span></td>
	    </tr>

		<tr>
			<td width="131" height="36">语言标识：</td>
		  <td width="869"><input type="text" class="text400bg" name="lang" id="lang" value="{$dataInfo.lang}" /><span class="Validform_checktip"></span></td>
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
		
		
var objForm=$(".editForm").Validform({
		tiptype:function(msg,o,cssctl){
			if(!o.obj.is("form")){ //验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
				var objtip=o.obj.siblings(".Validform_checktip");
				cssctl(objtip,o.type);
				objtip.text(msg);
			}
		}

	});
	
	objForm.addRule([{
		ele:"#title:eq(0)",
		datatype:"*",
		nullmsg:"请填写语言名称",
	}
	,
	{
		ele:"#lang:eq(0)",
		datatype:"*",
		nullmsg:"请填写语言标识",
	}]);
		
		
		
		
});
</script>


</body>
</html>