<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
<import type="js" basepath="__JS__" file="jquery,admin,My97DatePicker.WdatePicker,humane,imgpre" />

</head>

<body>
<include file="Inc/head" />

<div class="position">
	图片管理 - 图片管理{$class_str}
</div>
<div class="funcform">
	<a href="{:U('Atm/edit','class_id='.$class_id)}" class="addSinglepage btn_yellow">添加图片</a>
</div>
<div class="sin_form">
<form method="post" name="myform" id="myform">
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
		<tr>
		  <td width="40" height="36" align="center" bgcolor="#eeeeee">选中</td>
		  <td width="80" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="320" align="center" bgcolor="#eeeeee">标题</td>
          <td width="160" align="center" bgcolor="#eeeeee">图片一</td>
		  <td width="80" align="center" bgcolor="#eeeeee">排序</td>
          <td width="80" align="center" bgcolor="#eeeeee">状态</td>
          <td width="210" align="center" bgcolor="#eeeeee">发布时间</td>
		  <td width="210" align="center" bgcolor="#eeeeee">管理操作</td>
	  </tr>
        <foreach name="list" item="item" >
            <tr>
                <td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="{$item.id}" /></td>
                <td align="center" bgcolor="#ffffff">{$item.id}</td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="title" rel="{$item.id}" isfresh="0" para="input">{$item.title}</td>
                <td align="center" bgcolor="#ffffff">
                   <img src="__UPLOAD__/{$item.pic_path}" width="80" height="30" onerror=this.src='__IMG__/nopic.gif' class="preview" />
                </td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="{$item.id}" isfresh="1" para="input">{$item.list_order}</td>
                <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_{$item.status}" name="status" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="statusArr" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.status && $item.status neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select>
                </td>
                <td align="center" bgcolor="#ffffff">{$item.addtime|date='Y-m-d H:i:s',###} </td>
                <td align="center" bgcolor="#ffffff">
                   <if condition="$cfg.is_album gt 0">
                    <a href="{:U('Photo/index?typeid=ad&fileType='.$cfg['album_value'].'&parentid='.$item["id"].'')}"><img src="__IMG__/btns_08.jpg" class="opimg" /></a>
                   </if>  
                    <a href="{:U('Atm/edit','class_id='.$item['class_id'].'&id='.$item['id'])}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                    <a href="{:U('Atm/del','id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
                </td>
            </tr>
		</foreach>
		
		
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
			<td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('Atm/del')?>';myform.submit();}"></td>
		</tr>
    </table>
    </form>

</div>

<div class="pageout">
	{$page}
</div>
<script>
imagePreview();
</script>
<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('Atm/ajaxListInput'))}"></script>
</body>
</html>