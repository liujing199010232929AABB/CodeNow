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
	功能栏目管理-<if condition="$dataInfo.id gt 0 ">修改信息<else />添加信息</if>
</div>
<div class="wid1000">
<form id="editForm" name="editForm" action="{:U('Photo/save')}" method="post" class="editForm">
	<input type="hidden" name="id" value="{$dataInfo.id}" />
    <input type="hidden" name="typeid" value="{$typeid}" />
    <input type="hidden" name="parentid" value="{$parentid}" />
    <input type="hidden" name="parentType" value="{$parentType}" />
    <input type="hidden" name="back_url" value="{$back_url}" />
    <input type="hidden" name="language" value="{$language}" />
<!--[if lte IE 9]>
<div style='padding:10px 0px; color:red; font-size:16px; font-weight:bold'>
    检测到你正在使用较低本版的浏览器，如果能正常使用上传插件必须使用IE9以上、Chrome、Firefox等浏览器进行访问
</div>
<![endif]-->
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
            <td width="146" height="36">所属栏目：</td>
            <td width="854">{$PInfo.title}</td>
		</tr>
		<tr>
            <td width="146" height="36">图片标题：</td>
            <td width="854"><input type="text" class="text400bg inputxt" name="title" id="title" value="{$dataInfo.title}" /><span class="Validform_checktip"></span></td>
		</tr>
		<tr>
		  <td width="146" height="36">排序：</td>
		  <td><input type="text" class="text70px inputxt" name="list_order" id="list_order" value="<if condition="$dataInfo.list_order gt 0"> {$dataInfo.list_order}<else/>10</if>"/><span class="Validform_checktip"></span></td>
		</tr>
        
        <tr>
		  <td width="146" height="36">是否显示：</td>
		  <td>
              <select name="islock" id="islock">
                <option value="1"<if condition="$dataInfo.islock eq 1"> selected</if>>显示</option>
                <option value="2"<if condition="$dataInfo.islock eq 2"> selected</if>>锁定</option>
              </select>
              <span class="Validform_checktip"></span>
          </td>
		</tr>
        <input type="hidden" name="pic_path" value="{$dataInfo.pic_path}" />
        <if condition="$dataInfo.id lt 1 ">
		<tr>
		  <td width="146" height="36">图片：</td>
		  <td id="pic_upload"><input type="button" value="上传图片" class="zy-upload" /></td>
		</tr>
        </if>
		<tr>
			<td width="146" height="42" align="right"></td>
		  <td><input type="submit" class="linkcommon" value="保存" /></td>
		</tr>
	</table>
</form>    
</div>
<style>
.tulist{ width:100%;  padding-top:5px; border-top:2px solid #999;}
.tulist dl{ width:100px; height:110px; float:left; padding:0 0px 0 7px; margin:0px; position:relative;}
.tulist dl dt{ width:100px; padding:0px; margin:0px; text-align:center;}
.tulist dl dd{ width:100px; height:22px; line-height:22px; word-spacing:23px; padding:0px; margin:0px; text-align:center;}
.tulist dl dt .zt1{ position:absolute; right:0px; top:0; color:#fff; padding:0 2px; background-color:#060;}
.tulist dl dt .zt2{ position:absolute; right:0px; top:0; color:#fff; padding:0 2px; background-color:red;}
.fenye{ width:100%; clear:both; text-align:center;}
.fenye table{ text-align:center;}

</style>
<div class="tulist" id="tulist">
<foreach name="list" item="item">
	<dl>
    	<dt><if condition="$item.islock eq 1"><span class="zt1">正常</span><else/><span class="zt2">锁定</span></if><a href="__UPLOAD__/{$item.pic_path}" title="111" target="_blank"><img src="{$upload}/{$item.pic_path}" width="100" height="80" alt="111" /></a></dt>
        <dd><a href="{:U('Photo/index?typeid='.$item['typeid'].'&parentid='.$item['parentid'].'&fileType='.$fileType.'&id='.$item['id'].'')}" class="s1">编辑</a> <a href="{:U('Photo/delList?typeid='.$item['typeid'].'&parentid='.$item['parentid'].'&fileType='.$fileType.'&id='.$item['id'].'')}" title="删除" onclick="if(confirm('你确认要删除么？')){return true;}else{return false;}" class="s2">删除</a></dd>
    </dl>
</foreach>
</div>
<div class="fenye">{$page}</div>
<!-- 上传处理 -->
<div id="{$typeid}" class="uploadFile"><a href="javascript:;" class="zy-close"><i class="fa icon-close">关闭</i></a></div>

<!-- 引用控制层插件样式 -->
<link rel="stylesheet" href="__JS__/uploadsFile/control/css/uploadsFile.css" type="text/css">
<!-- 引用核心层插件 -->
<script type="text/javascript" src="__JS__/uploadsFile/core/uploadsFile.js"></script>
<!-- 引用控制层插件 -->
<script type="text/javascript" src="__JS__/uploadsFile/control/js/uploadsFile.js"></script>

<script type="text/javascript">
//上传处理
$(function(){
	var jsurl="__JS__/uploadsFile/upload.js.php?id={$typeid}&UpFileUrl={:urlencode('__JS__/uploadsFile/')}&url={:urlencode(U('Upload/uphtml5?fileUrl='.$fileUrl.'&fileType='.$fileType.''))}&rand="+Math.random();
	//显示组件
	$('.zy-upload').click(function (){
		$.getScript(jsurl); 
		$('#{$typeid}').fadeIn(500);
	});
	//关闭上传组件
	$('.zy-close').click(function (){
		setTimeout("$('#{$typeid}').fadeOut(500); location.reload(false)", 500);
	});
	$('#rapidClose').click(function (){
		$('#{$typeid}').fadeOut(300);
		//setTimeout("$('#{$typeid}').fadeOut(500); location.reload(false)", 500);
	});
});	
</script>
<!--<script type="text/javascript" src="__JS__/uploadsFile/upload.js.php?id={$typeid}&UpFileUrl={:urlencode('__JS__/uploadsFile/')}&url={:urlencode(U('Upload/uphtml5?fileUrl='.$fileUrl.'&fileType='.$fileType.''))}"></script>-->


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
		showAllError:true
	});
	objForm.addRule([{
		ele:".inputxt:eq(0)",
		datatype:"*"
	},
	{
		ele:".inputxt:eq(1)",
		datatype:"n",
		errormsg:"请填写数字！",
	}
	,
	{
		ele:"#islock",
		datatype:"*"
	},
	/*{
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