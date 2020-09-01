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
	开发平台-广告管理
</div>
<div id="ClassAdd">
	<div id="class_title">所属位置：<strong></strong></div>
    <form method="post" action="{:U('AtmConfig/saveAll')}" name="form1" class="registerform">
    	<input type="hidden" name="parent_id" id="parent_id" />
        <input type="hidden" name="depth" id="depth" />
        <textarea style="width:90%; height:100px; float:left;" name="class_name" id="class_name"></textarea>
        <input type="submit" value="确定提交" class="linkcommon" />
    </form>
    <div style="line-height:30px; font-weight:bold; color:#F00; clear:both;">注意：需要添加多个类别用回车换行</div>
</div>
<div class="funcform">
	<input type="button" name="delete" value="添加位置" class="choosedel mou-p addSinglepage" onclick="addClass(0,'无',0)">
	<if condition="$parentid"><input type="button" name="delete" value="返回上一步" title="返回上一步" class="btn_white mou-p" onclick="javascript:history.go(-1)"></if>
</div>
<div class="sin_form">
    <if condition="$list">
    <form method="post" name="myform" id="myform">
        <input type="hidden" name="parentid" value="{:I('parentid',0)}" />
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
        <tr>
			<td width="30" height="36" align="center" bgcolor="#eeeeee">选中</td>
		  <td width="80" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="293" align="center" bgcolor="#eeeeee">广告位名称</td>
		  <td width="274" align="center" bgcolor="#eeeeee">广告位说明</td>
			<td width="232" align="center" bgcolor="#eeeeee">展现形式</td>
		  <td width="205" align="center" bgcolor="#eeeeee">下级位置</td>
          <td width="164" align="center" bgcolor="#eeeeee">添加操作</td>
		  <td width="104" align="center" bgcolor="#eeeeee">管理操作</td>
		</tr>
        <foreach name="list" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="{$item.id}" /></td>
			<td align="center" bgcolor="#ffffff">{$item.id}</td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="class_name" rel="{$item.id}" isfresh="0" para="input">{$item.class_name}</td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="content" rel="{$item.id}" isfresh="0" para="input">{$item.content}</td>
			<td align="center" bgcolor="#ffffff">

                <select class="selectTd select_color_{$item.type_id}" name="type_id" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="showType" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.type_id && $item.type_id neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select>            
            
            
            </td>
            <td align="center" bgcolor="#ffffff">
                <if condition="$item['is_child'] && 2 gt $item['depth']+1">
                    <a href="{:U('AtmConfig/index?parentid='.$item['id'].'')}" class="c-green">查看下级</a>
                <else/>
                    <span class="c-Grey">暂无</span>
                </if>
            </td>
            <td align="center" bgcolor="#ffffff">
            <if condition="2 gt $item['depth']+1">
            <a href="javascript:void(0)" onclick="addClass({$item.id},'{$item.class_name}',{$item['depth']+1})">添加位置</a>
            <else/>
                <span class="c-Grey">--</span>
            </if>
            </td>
			<td align="center" bgcolor="#ffffff">
				<a href="{:U('AtmConfig/view?id='.$item['id'])}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                <a href="{:U('AtmConfig/delList?parentid='.I('parentid',0).'&id='.$item['id'].'')}" onclick="if(confirm('你确认删除吗？')){return;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
			</td>
		</tr>
        </foreach>
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
			<td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('AtmConfig/delList')?>';myform.submit();}"></td>
		</tr>
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
<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('AtmConfig/ajaxListInput'))}"></script>
</body>
</html>