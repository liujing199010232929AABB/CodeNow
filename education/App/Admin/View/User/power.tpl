<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,admin" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	系统管理 - 权限管理
</div>
<div class="funcform">
	<a href="{:U('User/powerEdit')}" class="addSinglepage" title="增加权限组">增加权限组</a>
</div>
<div class="sin_form">
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
		<tr>
			<td width="104" height="36" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="493" align="center" bgcolor="#eeeeee">权限组名称</td>
	      <td width="293" align="center" bgcolor="#eeeeee">操作</td>
	   </tr>
      
       <foreach name="dataList" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff">{$item.id}</td>
			<td align="center" bgcolor="#ffffff">{$item.group_name}</td>
            
            </td>
			<td align="center" bgcolor="#ffffff">
                    <a href="{:U('User/powerEdit','rid='.$item['rid'].'&id='.$item['id'])}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                    <a href="{:U('User/powerDel','id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
			</td>
		</tr>
        </foreach>
        
        
	</table>

</div>


</body>
</html>
