<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" /><link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/humane/boldlight.css" />
	<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/form.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/My97DatePicker/WdatePicker.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/AjaxFileUpload.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/humane.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/imgpre.js"></script>
</head>
<body>
<div class="main_top">
	<span id="localtime" class="localtime">
		<script type="text/javascript" src="/education/App/Admin/Public/js/time.js"></script>
	</span>
    <font> <a href="javascript:void(0);" onclick="javascript:history.back(-1);"></a> </font>
	<em class="welinfo">
		 <b><?php echo cookie('AUTH_USER_NAME');?> (<strong><?php if($m_id == 1): ?>超级管理员<?php else: echo ($group_name); endif; ?></strong>)</b>您好，欢迎访问本站。
	</em>
</div>
<div class="position">
	图片管理 - 图片管理<?php echo ($class_str); ?> - <?php if($dataInfo["id"] > 0 ): ?>修改<?php else: ?>添加<?php endif; ?>
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="<?php echo U('save');?>" method="post">
    <input type="hidden" name="id" value="<?php echo ($dataInfo["id"]); ?>" />
    <input type="hidden" name="class_id" value="<?php echo ($class_id); ?>" />
    <input type="hidden" name="back_url" value="<?php echo ($back_url); ?>" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="146" height="36">分类名称：</td>
		    <td width="854"><input type="text" class="text400bg" name="cate_name" id="title" value="<?php echo ($dataInfo["cate_name"]); ?>" /><span class="Validform_checktip"></span></td>
	    </tr>
		<tr>
		  <td width="146" height="50">图片：</td>
		  <td height="20">
          <input type="hidden" name="pic_path" id="category_path" size="50" value="<?php echo ($dataInfo["pic_path"]); ?>" />
          <script type="text/javascript" src="/education/App/Admin/Public/js/AjaxFileUpload.js.php?type=category&UpFile=<?php echo urlencode('/education/Upload');?>&tourl=<?php echo urlencode(U('Upload/upOne'));?>&url=/education"></script>
          </td>
		</tr>
		<tr>
			<td width="131" height="36">是否推荐：</td>
			<td>
				否<input name="is_recommend" type="radio" value="0"  <?php echo ($dataInfo['is_recommend']?'':'checked'); ?>/>
				是<input name="is_recommend" type="radio" value="1"  <?php echo ($dataInfo['is_recommend']?'checked':''); ?>/>
			</td>
		</tr>
		<tr>
			<td width="146" height="36">排序：</td>
		  <td><input type="text" class="text70px" name="list_order" id="list_order" value="<?php echo ($dataInfo['list_order']?$dataInfo['list_order']:10); ?>"/></td>
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