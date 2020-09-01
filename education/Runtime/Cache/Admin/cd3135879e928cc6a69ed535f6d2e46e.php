<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" /><link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/humane/libnotify.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/admin.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/humane.js"></script>
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
	信息管理
</div>

<div class="funcform">
	<a href="<?php echo U('NewsConfig/edit');?>" class="addSinglepage" title="增加栏目">增加栏目</a>
</div>

<div class="sin_form">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
            <tr>
                <td width="80" height="36" align="center" bgcolor="#eeeeee">ID</td>
                <td width="483" align="center" bgcolor="#eeeeee">栏目名称</td>
                <td width="274" align="center" bgcolor="#eeeeee">添加时间</td>
                <td width="326" align="center" bgcolor="#eeeeee">定向链接</td>
                <td width="222" align="center" bgcolor="#eeeeee">管理操作</td>
           </tr>
          
           <?php if(is_array($dataList) && !empty($dataList) ): foreach($dataList as $key=>$item): ?><tr>
                <td height="36" align="center" bgcolor="#ffffff"><?php echo ($item["id"]); ?></td>
                <td align="center" bgcolor="#ffffff"><a href="<?php echo U('News/index','rid='.$item['id']);?>"><?php echo ($item["title"]); ?></a></td>
                <td align="center" bgcolor="#ffffff"><?php echo (date("Y-m-d",$item["addtime"])); ?></td>
                <td align="center" bgcolor="#ffffff"><a href="<?php echo U('News/index','rid='.$item['id']);?>">进入管理</a></td>
                <td align="center" bgcolor="#ffffff">
                	<a class="zy-upload" rel="<?php echo ($item["id"]); ?>" data="<?php echo urlencode(U('Upload/uphtml5?fileUrl=&fileType=listAll&dbname=news&rid='.$item['id'].'').'&');?>"  title="批量传资料"><img src="/education/App/Admin/Public/images/btns_077.jpg" class="opimg" /></a>
                    <a href="<?php echo U('NewsConfig/edit','id='.$item['id']);?>"><img src="/education/App/Admin/Public/images/btns_07.jpg" class="opimg" /></a>
                    <a href="<?php echo U('NewsConfig/del','id='.$item['id']);?>" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="/education/App/Admin/Public/images/btns_05.jpg" class="opimg" /></a>
                </td>
            </tr><?php endforeach; else: endif; ?>
        </table>

</div>
<script type="text/javascript">
    function alertSelect(){
        var alertBox = "<div class='alertBox'><img src='/education/App/Admin/Public/images/tu.jpg' width='700' height='281' /></div>";
        $("body").append(alertBox);
        $(".alertBox").click(function(){$(this).remove();});
    }
</script>

<script src="/education/App/Admin/Public/js/AjaxList.js.php?action=ajaxlistinput&url=<?php echo urlencode(U('NewsConfig/ajaxListInput'));?>"></script>
<!-- 上传处理 -->
<div id="classUp" class="uploadFile"><a href="javascript:;" class="zy-close"><i class="fa icon-close">关闭</i></a></div>
<link rel="stylesheet" href="/education/App/Admin/Public/js/uploadsFile/control/css/uploadsFile.css" type="text/css">
<script type="text/javascript" src="/education/App/Admin/Public/js/uploadsFile/core/uploadsFile.js"></script>
<script type="text/javascript" src="/education/App/Admin/Public/js/uploadsFile/control/js/uploadsFile.js"></script>
<script type="text/javascript">
$(function(){
	//显示组件
	$('.zy-upload').click(function (){
		var rid=$(this).attr("rel");
		var UpFileUrl = '<?php echo urlencode("/education/App/Admin/Public/js/uploadsFile/");?>';
		var url = $(this).attr("data");
		var jsurl="/education/App/Admin/Public/js/uploadsFile/upload.js.php?id=classUp&UpFileUrl="+UpFileUrl+"&url="+url+"&rand="+Math.random();
		$.getScript(jsurl);
		$('#classUp').fadeIn(500);
	});
	$('.zy-close').click(function (){
		setTimeout("$('#classUp').fadeOut(500); location.reload(false)", 500);
	});
	$('#rapidClose').click(function (){
		$('#classUp').fadeOut(300);
	});
});	
</script>
</body>
</html>