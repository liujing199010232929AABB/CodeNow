<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	站点配置-二维码生成
</div>
<div class="wid1000">
    
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="89" height="36">{$configArr.SiteDomain.title}:</td>
			<td width="911">{$configArr.SiteDomain.val}</td>
		</tr>
		<tr>
			<td width="89" height="36">二维码图片:</td>
			<td width="911"><img src="{:U('Site/creatCode','domain='.$configArr['SiteDomain']['val'])}" width="193" height="193" /></td>
		</tr>
        
	</table>

</div>
</body>
</html>
