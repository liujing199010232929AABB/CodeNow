<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
<import type="js" basepath="__JS__" file="jquery,admin,humane" />
<style>
.display_success{ width:99%; margin:0 auto; border:#3184d2 solid 1px; font-family:'微软雅黑'; height:90px; font-size:14px; margin-top:10px;}
.display_title{ width:100%; line-height:30px; font-size:16px; background:#60a7e9; color:#FFF; font-weight:bold; text-align:center;}
.symbol{ font-size:40px; color:#F00; display:block; float:left; width:50px; padding-top:5px; text-align:center;}
.display_con{ padding-top:5px; line-height:160%; display:block; float:left;}
.display_con a{ color:#F60}
</style>
</head>

<body>
<include file="Inc/head" />

<?php if($paras['act']=='success') {?>
<div class="display_success">
    <div class="display_title">操作提示</div>
    <span class="symbol">√</span>
    <span class="display_con"><?php echo($paras["title"])?>完毕<BR /><?php if($paras["back_url"]){?><a href="<?php echo($paras["back_url"])?>">返回管理</a>　<?php }?><?php if($paras["jump_url"]){?>或　<a href="<?php echo($paras["jump_url"] )?>">继续<?php echo($paras["title"])?></a><?php }?> </span>
</div>
<?php }else{ ?>
<div class="display_success">
    <div class="display_title">操作提示</div>
    <span class="symbol">×</span>
    <span class="display_con"><?php echo($paras["title"])?>失败<BR /><a href='<?php echo($paras["back_url"])?>'>请返回</a></span>
</div>
<?php } ?>
<?php exit;?>

<a href="{$paras.back_url}" title="返回列表">返回列表</a>  
<a href="{$paras.jump_url}" title="继续{$paras.act}">继续{$paras.act}</a>

</body>
</html>
