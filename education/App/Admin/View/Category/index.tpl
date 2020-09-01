<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
    <import type="js" basepath="__JS__" file="jquery,admin,My97DatePicker.WdatePicker,humane,imgpre" />
</head>
<body>
<include file="Inc/head" />
<div class="position">
	分类管理 - 分类管理
</div>
<div class="funcform">
	<a href="{:U('Category/edit')}" class="addSinglepage btn_yellow">添加分类</a>
</div>
<div class="sin_form">
    <form method="post" name="myform" id="myform">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
            <tr>
              <td width="40" height="36" align="center" bgcolor="#eeeeee">选中</td>
              <td width="80" align="center" bgcolor="#eeeeee">ID</td>
              <td width="320" align="center" bgcolor="#eeeeee">分类名称</td>
              <td width="160" align="center" bgcolor="#eeeeee">分类图片</td>
              <td width="80" align="center" bgcolor="#eeeeee">是否推荐</td>
              <td width="80" align="center" bgcolor="#eeeeee">排序</td>
              <td width="210" align="center" bgcolor="#eeeeee">管理操作</td>
            </tr>
            <!-- 遍历获取数据 -->
            <foreach name="list" item="item" >
                <tr>
                    <td height="36" align="center" bgcolor="#ffffff">
                        <input type="checkbox" name="id[]" value="{$item.id}" />
                    </td>
                    <td align="center" bgcolor="#ffffff">{$item.id}</td>
                    <td align="center" bgcolor="#ffffff" class="TextTd" name="title" rel="{$item.id}" isfresh="0" para="input">{$item.cate_name}</td>
                    <td align="center" bgcolor="#ffffff">
                       <img src="__UPLOAD__/{$item.pic_path}" width="80" height="30" onerror=this.src='__IMG__/nopic.gif' class="preview" />
                    </td>
                    <td align="center" bgcolor="#ffffff">
                        <empty name="item.is_recommend">否<else/>是</empty>
                    </td>
                    <td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="{$item.id}" isfresh="1" para="input">{$item.list_order}</td>
                    <td align="center" bgcolor="#ffffff">
                        <a href="{:U('edit','id='.$item['id'])}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                        <a href="{:U('del','id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}">
                            <img src="__IMG__/btns_05.jpg" class="opimg" />
                        </a>
                    </td>
                </tr>
            </foreach>
        </table>
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
                <td width="38" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
                <td><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('del')?>';myform.submit();}"></td>
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
<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('ajaxListInput'))}"></script>
</body>
</html>