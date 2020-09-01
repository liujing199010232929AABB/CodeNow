<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
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
	分类管理 - 分类管理
</div>
<div class="funcform">
	<a href="<?php echo U('Category/edit');?>" class="addSinglepage btn_yellow">添加分类</a>
</div>
<div class="sin_form">
    <form method="post" name="myform" id="myform">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
            <tr>
              <td width="40" height="36" align="center" bgcolor="#eeeeee">选中</td>
              <td width="80" align="center" bgcolor="#eeeeee">ID</td>
              <td width="320" align="center" bgcolor="#eeeeee">分类名称</td>
              <td width="160" align="center" bgcolor="#eeeeee">分类图片</td>
              <td width="80" align="center" bgcolor="#eeeeee">是否推荐</td>
              <td width="80" align="center" bgcolor="#eeeeee">排序</td>
              <td width="210" align="center" bgcolor="#eeeeee">管理操作</td>
            </tr>
            <!-- 遍历获取数据 -->
            <?php if(is_array($list) && !empty($list) ): foreach($list as $key=>$item): ?><tr>
                    <td height="36" align="center" bgcolor="#ffffff">
                        <input type="checkbox" name="id[]" value="<?php echo ($item["id"]); ?>" />
                    </td>
                    <td align="center" bgcolor="#ffffff"><?php echo ($item["id"]); ?></td>
                    <td align="center" bgcolor="#ffffff" class="TextTd" name="title" rel="<?php echo ($item["id"]); ?>" isfresh="0" para="input"><?php echo ($item["cate_name"]); ?></td>
                    <td align="center" bgcolor="#ffffff">
                       <img src="/education/Upload/<?php echo ($item["pic_path"]); ?>" width="80" height="30" onerror=this.src='/education/App/Admin/Public/images/nopic.gif' class="preview" />
                    </td>
                    <td align="center" bgcolor="#ffffff">
                        <?php if(empty($item["is_recommend"])): ?>否<?php else: ?>是<?php endif; ?>
                    </td>
                    <td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="<?php echo ($item["id"]); ?>" isfresh="1" para="input"><?php echo ($item["list_order"]); ?></td>
                    <td align="center" bgcolor="#ffffff">
                        <a href="<?php echo U('edit','id='.$item['id']);?>"><img src="/education/App/Admin/Public/images/btns_07.jpg" class="opimg" /></a>
                        <a href="<?php echo U('del','id='.$item['id']);?>" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}">
                            <img src="/education/App/Admin/Public/images/btns_05.jpg" class="opimg" />
                        </a>
                    </td>
                </tr><?php endforeach; else: endif; ?>
        </table>
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
                <td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
                <td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('del')?>';myform.submit();}"></td>
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
<script src="/education/App/Admin/Public/js/AjaxList.js.php?action=ajaxlistinput&url=<?php echo urlencode(U('ajaxListInput'));?>"></script>
</body>
</html>