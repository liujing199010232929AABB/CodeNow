<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
<import type="js" basepath="__JS__" file="jquery,admin,humane" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	信息管理
</div>

<div class="funcform">
	<a href="{:U('NewsConfig/edit')}" class="addSinglepage" title="增加栏目">增加栏目</a>
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
          
           <foreach name="dataList" item="item">
            <tr>
                <td height="36" align="center" bgcolor="#ffffff">{$item.id}</td>
                <td align="center" bgcolor="#ffffff"><a href="{:U('News/index','rid='.$item['id'])}">{$item.title}</a></td>
                <td align="center" bgcolor="#ffffff">{$item.addtime|date="Y-m-d",###}</td>
                <td align="center" bgcolor="#ffffff"><a href="{:U('News/index','rid='.$item['id'])}">进入管理</a></td>
                <td align="center" bgcolor="#ffffff">
                	<a class="zy-upload" rel="{$item.id}" data="{:urlencode(U('Upload/uphtml5?fileUrl=&fileType=listAll&dbname=news&rid='.$item['id'].'').'&')}"  title="批量传资料"><img src="__IMG__/btns_077.jpg" class="opimg" /></a>
                    <a href="{:U('NewsConfig/edit','id='.$item['id'])}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                    <a href="{:U('NewsConfig/del','id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
                </td>
            </tr>
            </foreach>
        </table>

</div>
<script type="text/javascript">
    function alertSelect(){
        var alertBox = "<div class='alertBox'><img src='__IMG__/tu.jpg' width='700' height='281' /></div>";
        $("body").append(alertBox);
        $(".alertBox").click(function(){$(this).remove();});
    }
</script>

<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('NewsConfig/ajaxListInput'))}"></script>
<!-- 上传处理 -->
<div id="classUp" class="uploadFile"><a href="javascript:;" class="zy-close"><i class="fa icon-close">关闭</i></a></div>
<link rel="stylesheet" href="__JS__/uploadsFile/control/css/uploadsFile.css" type="text/css">
<script type="text/javascript" src="__JS__/uploadsFile/core/uploadsFile.js"></script>
<script type="text/javascript" src="__JS__/uploadsFile/control/js/uploadsFile.js"></script>
<script type="text/javascript">
$(function(){
	//显示组件
	$('.zy-upload').click(function (){
		var rid=$(this).attr("rel");
		var UpFileUrl = '{:urlencode("__JS__/uploadsFile/")}';
		var url = $(this).attr("data");
		var jsurl="__JS__/uploadsFile/upload.js.php?id=classUp&UpFileUrl="+UpFileUrl+"&url="+url+"&rand="+Math.random();
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
