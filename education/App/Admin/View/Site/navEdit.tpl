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
	站点配置-修改导航
</div>
<div class="wid1000">
<form id="editForm" name="editForm" action="{:U('SiteNav/save')}" method="post" class="editForm">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
    <input type="hidden" name="parent_id" value="{$dataInfo.parent_id}" />
    <input type="hidden" name="back_url" value="{$back_url}" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
            <td width="146" height="36">导航名称：</td>
            <td width="854"><input type="text" class="text400bg" name="class_name" id="class_name" value="{$dataInfo.class_name}" /><span class="Validform_checktip"></span></td>
		</tr>
		<tr>
			<td width="89" height="36">导航地址：</td>
			<td><input type="text" class="text400bg inputxt" name="link_url" value="{$dataInfo.link_url}" /><span class="Validform_checktip"></span></td>
		</tr>
        
		<tr>
		  <td width="146" height="36">排序：</td>
		  <td><input type="text" class="text400bg" name="list_order" id="list_order" value="{$dataInfo.list_order}"/><span class="Validform_checktip"></span></td>
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
		nullmsg:"请填写名称",
	},
	{
		ele:".inputxt:eq(0)",
		datatype:"url",	
		nullmsg:"请填写导航地址",
		errormsg:"导航地址请加上http://",
	},
	{
		ele:"#list_order",
		datatype:"n1-6",
		nullmsg:"请填写排序值",
	}]);
});
</script>
</body>
</html>