<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/admin.js"></script>
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
        单页管理
    </div>
    <div class="funcform">
        <a href="<?php echo U('Common/edit');?>" class="addSinglepage" title="增加栏目">增加单页</a>
    </div>
    <div class="sin_form">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
            <tr>
              <td width="99" height="36" align="center" bgcolor="#eeeeee">ID</td>
              <td width="580" align="center" bgcolor="#eeeeee">单页名称</td>
              <td width="428" align="center" bgcolor="#eeeeee">编辑器</td>
              <td width="428" align="center" bgcolor="#eeeeee">图片</td>
              <td width="428" align="center" bgcolor="#eeeeee">简介</td>
              <td width="322" align="center" bgcolor="#eeeeee">优化</td>
              <td width="428" align="center" bgcolor="#eeeeee">定向链接</td>
              <td width="279" align="center" bgcolor="#eeeeee">管理操作</td>
            </tr>
          
           <?php if(is_array($dataList) && !empty($dataList) ): foreach($dataList as $key=>$item): ?><tr>
                <td height="36" align="center" bgcolor="#ffffff"><?php echo ($item["id"]); ?></td>
                <td align="center" bgcolor="#ffffff"><a href="<?php echo U('Common/manage','id='.$item['id']);?>"><?php echo ($item["title"]); ?></a></td>
                <td align="center" bgcolor="#ffffff"><?php echo ($statusArr[$item['editor_used']]); ?></td>
                <td align="center" bgcolor="#ffffff"><?php echo ($statusArr[$item['pic_used']]); ?></td>
                <td align="center" bgcolor="#ffffff"><?php echo ($statusArr[$item['introduce_used']]); ?></td>
                <td align="center" bgcolor="#ffffff"><?php echo ($statusArr[$item['is_seo']]); ?></td>
                <td align="center" bgcolor="#ffffff"><a href="<?php echo U('Common/manage','id='.$item['id']);?>">进入管理</a></td>
                <td align="center" bgcolor="#ffffff">
                    <a href="<?php echo U('Common/edit','id='.$item['id']);?>"><img src="/education/App/Admin/Public/images/btns_07.jpg" class="opimg" /></a>
                    <a href="<?php echo U('Common/del','id='.$item['id']);?>" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="/education/App/Admin/Public/images/btns_05.jpg" class="opimg" /></a>
                </td>
            </tr><?php endforeach; else: endif; ?>
        </table>
    </div>

</body>
</html>