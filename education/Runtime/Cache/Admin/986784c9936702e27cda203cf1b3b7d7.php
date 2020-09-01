<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" /><link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/humane/boldlight.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/AjaxFileUpload.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/humane.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/imgpre.js"></script>
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
	站点配置-站点信息
</div>
<div class="wid1000">
	<form method="post" action="<?php echo U('Site/save');?>" name="form1" class="editForm">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php if(is_array($configArr) && !empty($configArr) ): foreach($configArr as $key=>$item): ?><tr>
			<td width="89" height="36"><input type="hidden" name="<?php echo ($key); ?>[title]" value="<?php echo ($item["title"]); ?>" /><?php echo ($item["title"]); ?></td>
			<td width="911">
                <!--根据不同类型，显示不同样式-->
                <?php switch($item["type"]): case "textarea": ?><textarea name="<?php echo ($key); ?>[val]" style="width:60%; height:60px; border:#CCC solid 1px;"><?php echo ($item["val"]); ?></textarea><?php break;?>
                    <?php case "video": ?><input type="hidden" name="<?php echo ($key); ?>[val]" id="video_path" size="50" value="<?php echo ($item["val"]); ?>" readonly="readonly" title="<?php echo ($item["val"]); ?>" />
                         <script type="text/javascript" src="/education/App/Admin/Public/js/AjaxFileUpload.js.php?fype=video&UpFile=<?php echo urlencode('/education/Upload');?>&tourl=<?php echo urlencode(U('Upload/upOne'));?>&url=/education"></script><?php break;?>
                    <?php default: ?>
                        <input type="text" class="text400bg inputxt" name="<?php echo ($key); ?>[val]" value="<?php echo ($item["val"]); ?>" /><?php endswitch;?>
                <span class="Validform_checktip"><?php echo (htmlspecialchars_decode($item["remarks"])); ?></span>
            </td>
            <input type="hidden" name="<?php echo ($key); ?>[remarks]" value='<?php echo ($item["remarks"]); ?>' />
            <input type="hidden" name="<?php echo ($key); ?>[type]" value="<?php echo ($item["type"]); ?>" />
		</tr><?php endforeach; else: endif; ?>
        <tr>
			<td width="89" height="36">&nbsp;</td>
			<td><input type="submit" value="提交" class="linkcommon" /></td>
		</tr>
	</table>
    </form>
</div>
</body>
</html>