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
	信息管理-{$cfg.title}-分类管理-<if condition="$dataInfo.id gt 0 ">修改类别<else />添加类别</if>
</div>
<div class="wid1000">
<form id="editForm" name="editForm" action="{:U('NewsClass/save')}" method="post" class="editForm">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
    <input type="hidden" name="parent_id" value="{$dataInfo.parent_id}" />
    <input type="hidden" name="rid" id="rid" value="{$rid}" />
    <input type="hidden" name="back_url" value="{$back_url}" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
           <td width="112" height="36">中文名称：</td>
           <td><input type="text" class="text400bg" name="class_name" id="class_name" value="{$dataInfo.class_name}" /><span class="Validform_checktip"></span></td>
		</tr>
        
        <if condition="$rid eq 3">
        <tr>
           <td width="112" height="36">英文名称：</td>
           <td><input type="text" class="text400bg" name="class_name_en" id="class_name_en" value="{$dataInfo.class_name_en}" /><span class="Validform_checktip"></span></td>
		</tr>
        </if>
        <if condition="$cfg.is_class_pic eq 1 and !in_array($rid ,array(3,4))">
		<tr>
		  <td width="146" height="66">图片：</td>
		  <td>
          <input type="hidden" name="pic_path" id="{$cfg.class_pic_value}_path" size="50" value="{$dataInfo.pic_path}" />
          <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type={$cfg.class_pic_value}&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
          </td>
		</tr>
        </if>
        
        <if condition="in_array($rid ,array(3,4))">
        <tr>
		  <td width="112" height="36">图片1<if condition="$rid eq 3">(国旗)<elseif condition="$rid eq 4"/>(标题文字)</if>：</td>
		  <td>
          <input type="hidden" name="pic_path" id="common_path" size="50" value="{$dataInfo.pic_path}" />
          <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type=common&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
          </td>
		</tr>
        
        <tr>
		  <td width="112" height="36">图片2<if condition="$rid eq 3">(国家)<elseif condition="$rid eq 4"/>(标题图片)</if>：</td>
		  <td>
          <input type="hidden" name="pic_paths" id="commons_path" size="50" value="{$dataInfo.pic_paths}" />
          <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type=commons&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
          </td>
		</tr>
        </if>
        
        <if condition="$cfg.is_class_introduce eq 1">
		<tr>
			<td width="146" height="66">介绍：</td>
			<td>
             <textarea id="content" name="content" cols="100" rows="5">{$dataInfo.content}</textarea>
			</td>
		</tr>
        </if>
		<tr>
		  <td width="146" height="66">排序：</td>
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
		ele:"#title:eq(0)",
		datatype:"*",
		nullmsg:"请填写标题",
	},
	{
		ele:"#list_order:eq(0)",
		datatype:"n1-6",
		nullmsg:"请填写排序",
	}]);
});
</script>
</body>
</html>