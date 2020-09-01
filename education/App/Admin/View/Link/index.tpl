<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
<import type="js" basepath="__JS__" file="jquery,admin,humane,My97DatePicker.WdatePicker" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	{$nameArr[$classid]}系统-{$nameArr[$classid]}管理
</div>
<div class="funcform">
	<a href="{:U('Link/index','classid='.$classid)}" class="addSinglepage">全部</a>
	<a href="{:U('Link/view','classid='.$classid)}" class="addSinglepage btn_yellow">添加</a>
    <form name="search" method="get" action="__URL__/index">
    关键词：
    <input type="text" name="sh_q" value="{$shArray.sh_q}" />
    状态：
    
    <select name="sh_status" class="selectTd select_color_{$shArray['sh_status']}">
        <option value="" class="select_color">请选择</option>
        <foreach name="statusArr" item="item" key="key">
        <option value="{$key}" <if condition="$key eq $shArray['sh_status'] && $shArray['sh_status'] neq ''"> selected </if> class="select_color_{$key}">{$item}</option>
        </foreach>
    </select>
    
    
    时间段：
      <input name="from_time"  value="{$shArray['from_time']?$shArray['from_time']:''}" type="text" id="from_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'%y-%M-{%d}'})"/>
        		到：
      <input name="to_time"  value="{$shArray['to_time']?$shArray['to_time']:''}" type="text" id="to_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:from_time.value,maxDate:'%y-%M-{%d}'})"/>
                
    <input type="submit" class="linkcommon2" value="提交" />
    </form>
</div>
<p class="opensys">&nbsp;</p>

<div class="sin_form">
    <form method="post" name="myform" id="myform">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
        <tr>
			<td width="50" height="36" align="center" bgcolor="#eeeeee">选中</td>
			<td width="70" align="center" bgcolor="#eeeeee">ID</td>
			<td width="320" align="center" bgcolor="#eeeeee">链接名称</td>
			<td width="320" align="center" bgcolor="#eeeeee">链接地址</td>
            <td width="100" align="center" bgcolor="#eeeeee">排序</td>
			<td width="160" align="center" bgcolor="#eeeeee">发布时间</td>
			<td width="90" align="center" bgcolor="#eeeeee">状态</td>
			<td width="150" align="center" bgcolor="#eeeeee">管理操作</td>
		</tr>
        <foreach name="list" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="{$item.id}" /></td>
			<td align="center" bgcolor="#ffffff">{$item.id}</td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="link_name" rel="{$item.id}" isfresh="0" para="input">{$item.link_name}</td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="link_url" rel="{$item.id}" isfresh="0" para="input">{$item.link_url}</td>
            <td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="{$item.id}" isfresh="1" para="input">{$item.list_order}</td>
			<td align="center" bgcolor="#ffffff">{$item.addtime|date='Y-m-d H:i:s',###} </td>
			<td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_{$item.status}" name="status" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="statusArr" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.status && $item.status neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select></td>
			<td align="center" bgcolor="#ffffff">
				<a href="{:U('Link/view?id='.$item['id'].'')}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                <a href="{:U('Link/del?id='.$item['id'].'')}" onclick="if(confirm('你确认删除吗？')){return;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
			</td>
		</tr>
        </foreach>
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
			<td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('Link/del')?>';myform.submit();}"></td>
		</tr>
    </table>
    </form>
    <div class="pageout">{$page}</div>

</div>

<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('Link/ajaxList'))}"></script>
</body>
</html>
