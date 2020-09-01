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
	图片管理
</div>
<div class="funcform">
</div>
<div class="sin_form">
    <if condition="$list">
    <form method="post" name="myform" id="myform">
        <input type="hidden" name="parentid" value="{:I('parentid',0)}" />
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
        <tr>
			<td width="361" height="36" align="center" bgcolor="#eeeeee">位置名称</td>
		  <td width="384" align="center" bgcolor="#eeeeee">位置说明</td>
			<td width="232" align="center" bgcolor="#eeeeee">展现形式</td>
		  <td width="157" align="center" bgcolor="#eeeeee">下级位置</td>
          <td width="151" align="center" bgcolor="#eeeeee">图片数量</td>
		  <td width="99" align="center" bgcolor="#eeeeee">管理操作</td>
		</tr>
        <foreach name="list" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff">{$item.class_name}</td>
            <td align="center" bgcolor="#ffffff">{$item.content}</td>
            <td align="center" bgcolor="#ffffff">{$showType[$item['type_id']]}</td>
            <td align="center" bgcolor="#ffffff">
                <if condition="$item['is_child'] && 2 gt $item['depth']+1">
                    <a href="{:U('AtmClass/index?parentid='.$item['id'].'')}" class="c-green">查看下级</a>
                <else/>
                    <span class="c-Grey">暂无</span>
                </if>
            </td>
            <td align="center" bgcolor="#ffffff">{$item.atm_count}</td>
			<td align="center" bgcolor="#ffffff">
				<a href="{:U('Atm/index?class_id='.$item['id'])}" title="图片管理">图片管理</a>
			</td>
		</tr>
        </foreach>
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
<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('AtmClass/ajaxListInput'))}"></script>
</body>
</html>