<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.boldlight" />
<import type="js" basepath="__JS__" file="jquery,AjaxFileUpload,humane,imgpre" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	站点配置-站点信息
</div>
<div class="wid1000">
	<form method="post" action="{:U('Site/save')}" name="form1" class="editForm">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <foreach name="configArr" item="item" key="key">
		<tr>
			<td width="89" height="36"><input type="hidden" name="{$key}[title]" value="{$item.title}" />{$item.title}</td>
			<td width="911">
                <!--根据不同类型，显示不同样式-->
                <switch name="item.type">
                    <case value="textarea"><textarea name="{$key}[val]" style="width:60%; height:60px; border:#CCC solid 1px;">{$item.val}</textarea></case>
                    <case value="video">
                         <input type="hidden" name="{$key}[val]" id="video_path" size="50" value="{$item.val}" readonly="readonly" title="{$item.val}" />
                         <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?fype=video&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
                    </case>
                    <default />
                        <input type="text" class="text400bg inputxt" name="{$key}[val]" value="{$item.val}" />
                </switch>
                <span class="Validform_checktip">{$item.remarks|htmlspecialchars_decode}</span>
            </td>
            <input type="hidden" name="{$key}[remarks]" value='{$item.remarks}' />
            <input type="hidden" name="{$key}[type]" value="{$item.type}" />
		</tr>
	</foreach>
        <tr>
			<td width="89" height="36">&nbsp;</td>
			<td><input type="submit" value="提交" class="linkcommon" /></td>
		</tr>
	</table>
    </form>
</div>
</body>
</html>
