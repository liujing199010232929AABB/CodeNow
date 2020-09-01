<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" /><link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/humane/libnotify.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/admin.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/My97DatePicker/WdatePicker.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/humane.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/imgpre.js"></script>

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
	图片管理 - 图片管理<?php echo ($class_str); ?>
</div>
<div class="funcform">
	<a href="<?php echo U('Atm/edit','class_id='.$class_id);?>" class="addSinglepage btn_yellow">添加图片</a>
</div>
<div class="sin_form">
<form method="post" name="myform" id="myform">
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
		<tr>
		  <td width="40" height="36" align="center" bgcolor="#eeeeee">选中</td>
		  <td width="80" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="320" align="center" bgcolor="#eeeeee">标题</td>
          <td width="160" align="center" bgcolor="#eeeeee">图片一</td>
		  <td width="80" align="center" bgcolor="#eeeeee">排序</td>
          <td width="80" align="center" bgcolor="#eeeeee">状态</td>
          <td width="210" align="center" bgcolor="#eeeeee">发布时间</td>
		  <td width="210" align="center" bgcolor="#eeeeee">管理操作</td>
	  </tr>
        <?php if(is_array($list) && !empty($list) ): foreach($list as $key=>$item): ?><tr>
                <td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="<?php echo ($item["id"]); ?>" /></td>
                <td align="center" bgcolor="#ffffff"><?php echo ($item["id"]); ?></td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="title" rel="<?php echo ($item["id"]); ?>" isfresh="0" para="input"><?php echo ($item["title"]); ?></td>
                <td align="center" bgcolor="#ffffff">
                   <img src="/education/Upload/<?php echo ($item["pic_path"]); ?>" width="80" height="30" onerror=this.src='/education/App/Admin/Public/images/nopic.gif' class="preview" />
                </td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="<?php echo ($item["id"]); ?>" isfresh="1" para="input"><?php echo ($item["list_order"]); ?></td>
                <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_<?php echo ($item["status"]); ?>" name="status" rel="<?php echo ($item["id"]); ?>" isfresh="0" para="select">
                <?php if(is_array($statusArr) && !empty($statusArr) ): foreach($statusArr as $key=>$items): ?><option value="<?php echo ($key); ?>" <?php if($key == $item["status"] && $item["status"] != ''): ?>selected<?php endif; ?> class="select_color_<?php echo ($key); ?>"><?php echo ($items); ?></option><?php endforeach; else: endif; ?>
                </select>
                </td>
                <td align="center" bgcolor="#ffffff"><?php echo (date('Y-m-d H:i:s',$item["addtime"])); ?> </td>
                <td align="center" bgcolor="#ffffff">
                   <?php if($cfg["is_album"] > 0): ?><a href="<?php echo U('Photo/index?typeid=ad&fileType='.$cfg['album_value'].'&parentid='.$item["id"].'');?>"><img src="/education/App/Admin/Public/images/btns_08.jpg" class="opimg" /></a><?php endif; ?>  
                    <a href="<?php echo U('Atm/edit','class_id='.$item['class_id'].'&id='.$item['id']);?>"><img src="/education/App/Admin/Public/images/btns_07.jpg" class="opimg" /></a>
                    <a href="<?php echo U('Atm/del','id='.$item['id']);?>" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="/education/App/Admin/Public/images/btns_05.jpg" class="opimg" /></a>
                </td>
            </tr><?php endforeach; else: endif; ?>
		
		
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
			<td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('Atm/del')?>';myform.submit();}"></td>
		</tr>
    </table>
    </form>

</div>

<div class="pageout">
	<?php echo ($page); ?>
</div>
<script>
imagePreview();
</script>
<script src="/education/App/Admin/Public/js/AjaxList.js.php?action=ajaxlistinput&url=<?php echo urlencode(U('Atm/ajaxListInput'));?>"></script>
</body>
</html>