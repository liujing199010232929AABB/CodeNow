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
	图片管理 - 图片管理{$class_str} - <if condition="$dataInfo.id gt 0 ">修改<else />添加</if>
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="{:U('Atm/save')}" method="post">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
    <input type="hidden" name="class_id" value="{$class_id}" />
    <input type="hidden" name="back_url" value="{$back_url}" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="146" height="36">名称：</td>
		    <td width="854"><input type="text" class="text400bg" name="title" id="title" value="{$dataInfo.title}" /><span class="Validform_checktip"></span></td>
	    </tr> 
		<tr>
			<td width="146" height="36">网址：</td>
		  <td><input type="text" class="text400bg" name="weburl" id="weburl" value="{$dataInfo.weburl}"/><span class="Validform_checktip"></span></td>
		</tr>
		<tr>
		  <td width="146" height="50">图片：</td>
		  <td height="20">
          <input type="hidden" name="pic_path" id="atm_path" size="50" value="{$dataInfo.pic_path}" />
          <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type=atm&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
          </td>
		</tr>
        
        <tr>
			<td width="146" height="36">状态：</td>
			<td>
            	<select name="status" id="status">
                    <foreach name="statusArr" item="item">
                    <option value="{$key}" <if condition="$key eq $dataInfo['status']"> selected </if>>{$item}</option>
                    </foreach>
                </select>
            </td>
		</tr>
		<!--<tr>
			<td width="146" height="36">点击量：</td>
		  <td><input type="text" class="text70px" name="clicks" id="clicks" value="{$dataInfo['clicks']?$dataInfo['clicks']:0}"/></td>
		</tr>-->
        <tr>
			<td width="146" height="36">排序：</td>
		  <td><input type="text" class="text70px" name="list_order" id="list_order" value="{$dataInfo['list_order']?$dataInfo['list_order']:10}"/></td>
		</tr>
		
		<tr>
			<td width="146" height="36">创建时间：</td>
		  <td><input type="text" class="text400bg" name="addtime" id="addtime" value="<if condition='$dataInfo.addtime gt 0 '>{$dataInfo.addtime|date='Y-m-d H:i:s',###}</if>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/></td>
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
	}
	/*,{
		ele:"#weburl",
		datatype:"url",	
		nullmsg:"请填写广告网址",
		errormsg:"广告网址请加上http://",
	}*/
	,{
		ele:".sel1:eq(0)",
		datatype:"*"
	}
	
	]);
		
		
		
		
});
</script>


</body>
</html>
