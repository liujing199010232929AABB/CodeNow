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
	留言系统-招商加盟
</div>
<div class="wid1000">
	<form method="post" action="{:U('Msg/save')}" name="form1" class="editForm">
    <input type="hidden" name="back_url" value="{$back_url}">
    
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <input type="hidden" name="id" value="{$dataInfo.id}" />
        <tr>
			<td width="112" height="25">IP地址：</td>
		  <td>{$dataInfo.webip}</td>
		</tr>
		<tr>
			<td width="89" height="25">姓名：</td>
			<td>{$dataInfo.nickname}</td>
		</tr>
		<tr>
			<td width="89" height="25">联系电话：</td>
			<td>{$dataInfo.mobile}</td>
		</tr>
		<tr>
			<td width="89" height="25">留言内容：</td>
			<td>{$dataInfo.content}</td>
		</tr>
		<tr>
			<td width="89" height="25">提交时间：</td>
			<td>{$dataInfo.addtime|date='Y-m-d H:i:s',###}</td>
		</tr>
        <tr>
			<td width="89" height="25">&nbsp;</td>
			<td><input type="button" value="返回" class="linkcommon" onclick="javascript:history.back(-1);" /></td>
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
		datatype:"*"	
	},
	{
		ele:".inputxt:eq(2)",
		datatype:"zh1-6",
		errormsg:"请输入1到6个中文字符！",
	},
	{
		ele:".inputxt:eq(3)",
		datatype:"m",
		errormsg:"电话格式不正确，如13000000000"
		//recheck:"userpassword"
	}
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
