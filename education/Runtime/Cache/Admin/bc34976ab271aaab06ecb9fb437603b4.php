<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" />
    <script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/form.js"></script>
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
	单页管理-<?php if($dataInfo["id"] > 0 ): ?>修改单页<?php else: ?>添加单页<?php endif; ?>
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="<?php echo U('Common/save');?>" method="post">
    <input type="hidden" name="id" value="<?php echo ($dataInfo["id"]); ?>" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="131" height="36">单页名称：</td>
		    <td width="869">
                <input type="text" class="text400bg" name="title" id="title" value="<?php echo ($dataInfo["title"]); ?>" />
                <span class="Validform_checktip"></span>
            </td>
	    </tr>
        <tr>
            <td width="131" height="36">选择分类：</td>
            <td>
                <select id="cate_id" name="cate_id" style="width: 131px">
                    <option value="">请选择</option>
                    <?php if(is_array($category) && !empty($category) ): foreach($category as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"] == $dataInfo['cate_id'])): ?>selected<?php endif; ?> ><?php echo ($vo["cate_name"]); ?></option><?php endforeach; else: endif; ?>
                </select>
                <span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
          <td width="131" height="36">编辑器：</td>
          <td>
          开启<input name="editor_used" type="radio" value="1" <?php echo ($dataInfo['editor_used']?'checked':''); ?>/>
          关闭<input name="editor_used" type="radio" value="0" <?php echo ($dataInfo['editor_used']?'':'checked'); ?>/>
          </td>
        </tr>
        <tr>
          <td width="131" height="36">图片：</td>
          <td>
          开启<input name="pic_used" type="radio" value="1" <?php echo ($dataInfo['pic_used']?'checked':''); ?>/>
          关闭<input name="pic_used" type="radio" value="0" <?php echo ($dataInfo['pic_used']?'':'checked'); ?>/>
          </td>
        </tr>  
        <tr>
          <td width="131" height="36">简介：</td>
          <td>
          开启<input name="introduce_used" type="radio" value="1" <?php echo ($dataInfo['introduce_used']?'checked':''); ?>/>
          关闭<input name="introduce_used" type="radio" value="0" <?php echo ($dataInfo['introduce_used']?'':'checked'); ?>/>
          </td>
        </tr> 
        <tr>
          <td width="131" height="36">优化：</td>
          <td>
          开启<input name="is_seo" type="radio" value="1" <?php echo ($dataInfo['is_seo']?'checked':''); ?>/>
          关闭<input name="is_seo" type="radio" value="0" <?php echo ($dataInfo['is_seo']?'':'checked'); ?>/>
          </td>
        </tr>         
 	    <tr>
			<td width="131" height="42"></td>
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
	
	objForm.addRule([
        {
            ele:"#title:eq(0)",
            datatype:"*",
            nullmsg:"请填写单页名称",
	    },

    ]);

});
</script>

</body>
</html>