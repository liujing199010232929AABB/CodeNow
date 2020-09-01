<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
<import type="js" basepath="__JS__" file="jquery,admin,humane" />
<style>
#ClassAdd{width:97%; margin:0 auto; display:none;}/* height:1px; overflow:hidden; */
#class_title{ padding:10px 0;}
</style>
</head>

<body>
<include file="Inc/head" />
<div class="position">
	信息管理-{$cfg.title}-分类管理
</div>
<div id="ClassAdd">
	<div id="class_title">所属类别：<strong></strong></div>
    <form method="post" action="{:U('NewsClass/saveAll')}" name="form1" class="registerform">
    	<input type="hidden" name="rid" value="{:I('rid',0,'int')}" />
    	<input type="hidden" name="parent_id" id="parent_id" />
        <input type="hidden" name="depth" id="depth" />
        <textarea style="width:90%; height:100px; float:left;" name="class_name" id="class_name"></textarea>
        <input type="submit" value="确定提交" class="linkcommon" />
    </form>
    <div style="line-height:30px; font-weight:bold; color:#F00; clear:both;">注意：需要添加多个类别用回车换行</div>
</div>
<div class="funcform">
	<input type="button" name="delete" value="添加类别" class="choosedel mou-p addSinglepage" onclick="addClass(0,'无',0)">
	<a href="{:U('NewsClass/index','rid='.$rid)}" class="addSinglepage btn_white">分类首页</a>
	<if condition="$parentid"><input type="button" name="delete" value="返回上一步" title="返回上一步" class="btn_white mou-p" onclick="javascript:history.go(-1)"></if>
    <a href="{:U('News/index','rid='.$rid)}" class="addSinglepage choosedel">信息列表</a>
    <if condition="$cfg['id'] neq 3">
    <a href="{:U('News/edit','rid='.$rid)}" class="addSinglepage btn_yellow">添加信息</a>
    </if>
</div>
<div class="sin_form">
    <if condition="$list">
    <form method="post" name="myform" id="myform">
    	<input type="hidden" name="p" value="{:I('p',1)}" />
        <input type="hidden" name="rid" value="{:I('rid',0,'int')}" />
        <input type="hidden" name="parentid" value="{:I('parentid',0)}" />
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
        <tr>
			<td width="38" height="36" align="center" bgcolor="#eeeeee">选中</td>
			<td width="63" align="center" bgcolor="#eeeeee">ID</td>
			<td align="left" bgcolor="#eeeeee">中文名称</td>
            <if condition="$rid eq 3">
            <td align="left" bgcolor="#eeeeee">英文名称</td>
            </if>
            <td width="90" align="center" bgcolor="#eeeeee">状态</td>
			<td width="130" align="center" bgcolor="#eeeeee">查看下级</td>
            <td width="130" align="center" bgcolor="#eeeeee">添加子分类</td>
			<td width="100" align="center" bgcolor="#eeeeee">排序</td>
            <!--<td width="90" align="center" bgcolor="#eeeeee">传资料</td>-->
			<td width="180" align="center" bgcolor="#eeeeee">管理操作</td>
		</tr>
        <foreach name="list" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="{$item.id}" /></td>
			<td align="center" bgcolor="#ffffff">{$item.id}</td>
			<td align="left" bgcolor="#ffffff" class="TextTd" name="class_name" rel="{$item.id}" isfresh="0" para="input">{$item.class_name}</td>
            <if condition="$rid eq 3">
            <td align="left" bgcolor="#ffffff" class="TextTd" name="class_name_en" rel="{$item.id}" isfresh="0" para="input">{$item.class_name_en}</td>
            </if>
            <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_{$item.status}" name="status" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="statusArr" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.status && $item.status neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select>
            </td>
            <td align="center" bgcolor="#ffffff">
                <if condition="$item['is_parentid'] && $cfg['class_depth'] gt $item['depth']+1">
                    <a href="{:U('NewsClass/index?rid='.$item['rid'].'&parentid='.$item['id'].'')}" class="c-green">查看下级</a>
                <else/>
                    <span class="c-Grey">无下级分类</span>
                </if>
            </td>
            <td align="center" bgcolor="#ffffff">
            <if condition="$cfg['class_depth'] gt $item['depth']+1">
            <a href="javascript:void(0)" onclick="addClass({$item.id},'{$item.class_name}',{$item['depth']+1})">添加子分类</a>
            <else/>
                <span class="c-Grey">--</span>
            </if>
            </td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="{$item.id}" isfresh="1" para="input">{$item.list_order}</td>
            <!--<td align="center" bgcolor="#ffffff"><a class="zy-upload" rel="{$item.id}">传资料</a></td>-->
			<td align="center" bgcolor="#ffffff">
            
            <if condition="$_COOKIE['AUTH_USER_NAME'] eq 'administrator'">
                <a class="zy-upload" data="{:urlencode(U('Upload/uphtml5?fileUrl=&fileType=listAll&dbname=news&rid='.$item['rid'].'&classid='.$item['id'].'').'&')}" title="批量上传资料"><img src="__IMG__/btns_077.jpg" class="opimg" /></a>        
            </if>
				<a href="{:U('NewsClass/view?id='.$item['id'].'&rid='.$item['rid'].'')}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
            <if condition="!in_array($rid , array(2))">
                <a href="{:U('NewsClass/delList?rid='.$item['rid'].'&p='.I('p',1).'&parentid='.I('parentid',0).'&id='.$item['id'].'')}" onclick="if(confirm('你确认删除吗？')){return;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
            </if>
			</td>
		</tr>
        </foreach>
	</table>
    <!--<table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
			<td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('NewsClass/delList')?>';myform.submit();}"></td>
		</tr>
    </table>-->
    </form>
    <div class="pageout">{$page}</div>
    <else/>
        <center>暂无相关信息</center>
    </if>
</div>
<script>
$('.classLevel').each(function(index, element) {
	var i = $(this).children('p').attr('class');
	var i = i.substring(5,7);
	$(this).children('p').css({'margin-left':16*i+'px'});
});
</script>
<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('NewsClass/ajaxListInput'))}"></script>
<!-- 上传处理 -->
<div id="classUp" class="uploadFile"><a href="javascript:;" class="zy-close"><i class="fa icon-close">关闭</i></a></div>
<link rel="stylesheet" href="__JS__/uploadsFile/control/css/uploadsFile.css" type="text/css">
<script type="text/javascript" src="__JS__/uploadsFile/core/uploadsFile.js"></script>
<script type="text/javascript" src="__JS__/uploadsFile/control/js/uploadsFile.js"></script>
<script type="text/javascript">
$(function(){
	//显示组件
	$('.zy-upload').click(function (){
		/*var classid=$(this).attr("rel");
		var jsurl="__JS__/uploadsFile/upload.js.php?id=classUp&UpFileUrl={:urlencode('__JS__/uploadsFile/')}&url={:urlencode(U('Upload/uphtml5?fileUrl=&fileType=listAll&dbname=news&rid='.$rid.'').'&')}classid="+classid+"&rand="+Math.random();*/
		//-----------------------
		var UpFileUrl = '{:urlencode("__JS__/uploadsFile/")}';
		var url = $(this).attr("data");
		var jsurl="__JS__/uploadsFile/upload.js.php?id=classUp&UpFileUrl="+UpFileUrl+"&url="+url+"&rand="+Math.random();
		
		
		$.getScript(jsurl)
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