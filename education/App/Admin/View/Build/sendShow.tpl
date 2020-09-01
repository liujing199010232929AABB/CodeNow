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
	开发人员平台-邮件内容
</div>
<div class="funcform">
	<a href="{:U('Build/sendEdit')}" class="addSinglepage" title="增加内容">增加内容</a>
</div>
<div class="sin_form">
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
		<tr>
			<td width="80" height="36" align="center" bgcolor="#eeeeee">ID</td>
			<td width="705" align="center" bgcolor="#eeeeee">标题</td>
		  <td width="222" align="center" bgcolor="#eeeeee">管理操作</td>
	  </tr>
      
       <foreach name="dataList" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff">{$item.id}</td>
			<td align="center" bgcolor="#ffffff" class="TextTd" name="title" rel="{$item.id}" isfresh="0" para="input">{$item.title}</td>
			<td align="center" bgcolor="#ffffff">
                    <a href="{:U('Build/sendEdit','id='.$item['id'])}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                    <a href="{:U('Build/sendDel','id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
			</td>
		</tr>
        </foreach>
        
        
	</table>

</div>

<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('Build/sendAjaxList'))}"></script>
</body>
</html>
