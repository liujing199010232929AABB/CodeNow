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
	{$nameArr[$classid]}系统-{$nameArr[$classid]}添加/修改
</div>
<div class="wid1000">
	<form method="post" action="{:U('Link/save')}" name="form1" class="editForm">
    <input type="hidden" name="back_url" value="{$back_url}">
    <input type="hidden" name="classid" value="{$classid}">
    
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
		<tr>
			<td width="89" height="36">链接名称：</td>
			<td width="911"><input type="text" class="text400bg inputxt" name="link_name" value="{$dataInfo.link_name}" /><span class="Validform_checktip"></span></td>
		</tr>
		<!--<tr>
			<td width="89" height="36">图片：</td>
			<td><input type="hidden" name="pic_path" id="pic_path" size="50" value="{$dataInfo.pic_path}" />
          <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type=pic&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
            </td>
		</tr>-->
		<tr>
			<td width="89" height="36">链接地址：</td>
			<td><input type="text" class="text400bg inputxt" name="link_url" value="{$dataInfo.link_url}" /><span class="Validform_checktip"></span></td>
		</tr>
		<tr>
			<td width="89" height="36">打开方式：</td>
			<td>
              <select name="open_style" id="open_style">
                <option value="_blank" <if condition="$dataInfo['open_style'] eq '_blank'"> selected </if>>新窗口</option>
                <option value="_parent" <if condition="$dataInfo['open_style'] eq '_parent'"> selected </if>>当前窗口</option>
              </select>
            </td>
		</tr>
        <tr>
			<td width="89" height="36">排序：</td>
			<td><input type="text" class="text400bg inputxt" name="list_order" value="{$dataInfo.list_order}" /></td>
		</tr>
        <tr>
			<td width="89" height="36">状态：</td>
			<td>
            	<select name="status" id="status">
                    <foreach name="statusArr" item="item">
                    <option value="{$key}" <if condition="$key eq $dataInfo['status']"> selected </if>>{$item}</option>
                    </foreach>
                </select>
            </td>
		</tr>
        <tr>
			<td width="89" height="36">&nbsp;</td>
			<td><input type="submit" name="submit" value="提交" class="linkcommon" /></td>
		</tr>
        
	</table>
    </form>
</div>


<script type="text/javascript">
$(function(){
		
	var objForm=$(".editForm").Validform({
		tiptype:function(msg,o,cssctl){
			if(!o.obj.is("form")){ //验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
				var objtip=o.obj.siblings(".Validform_checktip");
				cssctl(objtip,o.type);
				objtip.text(msg);
			}
		},
		datatype:{
			"phone":function(gets,obj,curform,regxp){
				var reg1=/^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/
				if(reg1.test(gets)){return true;}
				return false;
			},
			"zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/
		},
		showAllError:true
	});
	
	objForm.tipmsg.w["zh1-6"]="请输入1到06个中文字符！";
	objForm.addRule([{
		ele:".inputxt:eq(0)",
		datatype:"*"
	},
	{
		ele:".inputxt:eq(1)",
		datatype:"url",	
		nullmsg:"请填写链接地址",
		errormsg:"链接地址请加上http://",
	},
	/*,
	{
		ele:"select",
		datatype:"*"
	},
	{
		ele:":radio:first",
		datatype:"*"
	},
	{
		ele:":checkbox:first",
		datatype:"*"
	}*/
	]);
})
</script>


</body>
</html>
