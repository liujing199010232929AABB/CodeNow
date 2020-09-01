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
	站点配置-导航管理
</div>
<div id="ClassAdd">
	<div id="class_title">所属导航：<strong></strong></div>
    <form method="post" action="{:U('SiteNav/saveAll')}" name="form1" class="registerform">
    	<input type="hidden" name="parent_id" id="parent_id" />
        <input type="hidden" name="depth" id="depth" />
        <textarea style="width:90%; height:100px; float:left;" name="class_name" id="class_name"></textarea>
        <input type="submit" value="确定提交" class="linkcommon" />
    </form>
    <div style="line-height:30px; font-weight:bold; color:#F00; clear:both;">注意：可以使用 | 对导航名称与导航地址进行分割，例如 百度|http://www.baidu.com</div>
</div>
<div class="funcform">
   <if condition="$parentid gt 0">
	<input type="button" name="delete" value="添加导航" class="choosedel mou-p addSinglepage" onclick="addClass({$parentid},'{$parentinfo.class_name}',{$parentinfo['depth']+1})">
   <else />
	<input type="button" name="delete" value="添加导航" class="choosedel mou-p addSinglepage" onclick="addClass(0,'无',0)">
   </if>
	<if condition="$parentid"><input type="button" name="delete" value="返回上一步" title="返回上一步" class="btn_white mou-p" onclick="javascript:history.go(-1)"></if>

</div>
<div class="sin_form">
    <if condition="$list">
    <form method="post" name="myform" id="myform">
        <input type="hidden" name="parentid" value="{:I('parentid',0)}" />
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
        <tr>
			<td width="34" height="36" align="center" bgcolor="#eeeeee">选中</td>
		  <td width="96" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="233" align="center" bgcolor="#eeeeee">导航名称</td>
		  <td width="357" align="center" bgcolor="#eeeeee">导航地址</td>
          <td width="145" align="center" bgcolor="#eeeeee">状态</td>
		  <td width="138" align="center" bgcolor="#eeeeee">查看下级</td>
          <td width="113" align="center" bgcolor="#eeeeee">添加子导航</td>
		  <td width="144" align="center" bgcolor="#eeeeee">排序</td>
		  <td width="121" align="center" bgcolor="#eeeeee">管理操作</td>
		</tr>
        <foreach name="list" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="{$item.id}" /></td>
			<td align="center" bgcolor="#ffffff">{$item.id}</td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="class_name" rel="{$item.id}" isfresh="0" para="input">{$item.class_name}</td>
			<td align="left" bgcolor="#ffffff" class="TextTd" name="link_url" rel="{$item.id}" isfresh="0" para="input">{$item.link_url}</td>
            <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_{$item.status}" name="status" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="statusArr" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.status && $item.status neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select>
            </td>
            <td align="center" bgcolor="#ffffff">
                <if condition="$item['is_parentid'] && 2 gt $item['depth']+1">
                    <a href="{:U('SiteNav/index?parentid='.$item['id'].'')}" class="c-green">查看下级</a>
                <else/>
                    <span class="c-Grey">无下级导航</span>
                </if>
            </td>
            <td align="center" bgcolor="#ffffff">
            <if condition="2 gt $item['depth']+1">
            <a href="javascript:void(0)" onclick="addClass({$item.id},'{$item.class_name}',{$item['depth']+1})">添加子导航</a>
            <else/>
                <span class="c-Grey">--</span>
            </if>
            </td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="{$item.id}" isfresh="1" para="input">{$item.list_order}</td>

			<td align="center" bgcolor="#ffffff">
				<a href="{:U('SiteNav/view?id='.$item['id'].'')}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                <a href="{:U('SiteNav/delList?parentid='.I('parentid',0).'&id='.$item['id'].'')}" onclick="if(confirm('你确认删除吗？')){return;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
			</td>
		</tr>
        </foreach>
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
			<td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('SiteNav/delList')?>';myform.submit();}"></td>
		</tr>
    </table>
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
<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('SiteNav/ajaxListInput'))}"></script>
</body>
</html>