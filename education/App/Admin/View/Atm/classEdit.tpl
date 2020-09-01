<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.boldlight" />
<import type="js" basepath="__JS__" file="jquery,form,My97DatePicker.WdatePicker,AjaxFileUpload,humane,imgpre" />

</head>

<body>
<include file="Inc/head" />
<div class="position">
	广告管理<if condition="$dataInfo.id gt 0 ">修改广告位置<else />添加广告位置</if>
</div>
<div class="wid1000">
<form id="editForm" name="editForm" action="{:U('AtmClass/save')}" method="post" class="editForm">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
    <input type="hidden" name="parent_id" value="{$dataInfo.parent_id}" />
    <input type="hidden" name="back_url" value="{$back_url}" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
            <td width="146" height="36">位置名称：</td>
            <td width="854"><input type="text" class="text400bg" name="class_name" id="class_name" value="{$dataInfo.class_name}" /><span class="Validform_checktip"></span></td>
		</tr>
		<tr>
			<td width="146" height="36">位置介绍：</td>
			<td>
            <taglib name='html' />
            <html:textarea id="content" name="content" style="width:90%;height:200px;">{$dataInfo.content}</html:textarea>
			</td>
		</tr>

		<tr>
			<td width="146" height="42" align="right"></td>
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
		ele:"#class_name",
		datatype:"*",
		nullmsg:"请填写位置名称",
	}]);
});
</script>
</body>
</html>