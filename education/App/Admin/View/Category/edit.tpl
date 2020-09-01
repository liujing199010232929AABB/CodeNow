<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<import type="css" basepath="__CSS__" file="admin,humane.boldlight" />
	<import type="js" basepath="__JS__" file="jquery,form,My97DatePicker.WdatePicker,AjaxFileUpload,humane,imgpre" />
</head>
<body>
<include file="Inc/head" />
<div class="position">
	图片管理 - 图片管理{$class_str} - <if condition="$dataInfo.id gt 0 ">修改<else />添加</if>
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="{:U('save')}" method="post">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
    <input type="hidden" name="class_id" value="{$class_id}" />
    <input type="hidden" name="back_url" value="{$back_url}" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="146" height="36">分类名称：</td>
		    <td width="854"><input type="text" class="text400bg" name="cate_name" id="title" value="{$dataInfo.cate_name}" /><span class="Validform_checktip"></span></td>
	    </tr>
		<tr>
		  <td width="146" height="50">图片：</td>
		  <td height="20">
          <input type="hidden" name="pic_path" id="category_path" size="50" value="{$dataInfo.pic_path}" />
          <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type=category&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
          </td>
		</tr>
		<tr>
			<td width="131" height="36">是否推荐：</td>
			<td>
				否<input name="is_recommend" type="radio" value="0"  {$dataInfo['is_recommend']?'':'checked'}/>
				是<input name="is_recommend" type="radio" value="1"  {$dataInfo['is_recommend']?'checked':''}/>
			</td>
		</tr>
		<tr>
			<td width="146" height="36">排序：</td>
		  <td><input type="text" class="text70px" name="list_order" id="list_order" value="{$dataInfo['list_order']?$dataInfo['list_order']:10}"/></td>
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
		ele:"#title",
		datatype:"*",
		nullmsg:"名称必填",
	},
	{
		ele:".sel1:eq(0)",
		datatype:"*"
	}
	]);

});
</script>
</body>
</html>
