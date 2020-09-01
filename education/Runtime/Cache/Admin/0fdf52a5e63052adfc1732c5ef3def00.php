<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" /><link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/humane/libnotify.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/admin.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/humane.js"></script>
<style>
#ClassAdd{width:97%; margin:0 auto; display:none;}/* height:1px; overflow:hidden; */
#class_title{ padding:10px 0;}
</style>
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
	图片管理
</div>
<div class="funcform">
</div>
<div class="sin_form">
    <if condition="$list">
    <form method="post" name="myform" id="myform">
        <input type="hidden" name="parentid" value="<?php echo I('parentid',0);?>" />
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
        <tr>
			<td width="361" height="36" align="center" bgcolor="#eeeeee">位置名称</td>
		  <td width="384" align="center" bgcolor="#eeeeee">位置说明</td>
			<td width="232" align="center" bgcolor="#eeeeee">展现形式</td>
		  <td width="157" align="center" bgcolor="#eeeeee">下级位置</td>
          <td width="151" align="center" bgcolor="#eeeeee">图片数量</td>
		  <td width="99" align="center" bgcolor="#eeeeee">管理操作</td>
		</tr>
        <?php if(is_array($list) && !empty($list) ): foreach($list as $key=>$item): ?><tr>
			<td height="36" align="center" bgcolor="#ffffff"><?php echo ($item["class_name"]); ?></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($item["content"]); ?></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($showType[$item['type_id']]); ?></td>
            <td align="center" bgcolor="#ffffff">
                <?php if($item['is_child'] && 2 > $item['depth']+1): ?><a href="<?php echo U('AtmClass/index?parentid='.$item['id'].'');?>" class="c-green">查看下级</a>
                <?php else: ?>
                    <span class="c-Grey">暂无</span><?php endif; ?>
            </td>
            <td align="center" bgcolor="#ffffff"><?php echo ($item["atm_count"]); ?></td>
			<td align="center" bgcolor="#ffffff">
				<a href="<?php echo U('Atm/index?class_id='.$item['id']);?>" title="图片管理">图片管理</a>
			</td>
		</tr><?php endforeach; else: endif; ?>
	</table>
    </form>
</div>
<script>
$('.classLevel').each(function(index, element) {
	var i = $(this).children('p').attr('class');
	var i = i.substring(5,7);
	$(this).children('p').css({'margin-left':16*i+'px'});
});
</script>
<script src="/education/App/Admin/Public/js/AjaxList.js.php?action=ajaxlistinput&url=<?php echo urlencode(U('AtmClass/ajaxListInput'));?>"></script>
</body>
</html>