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
        单页管理
    </div>
    <div class="funcform">
        <a href="{:U('Common/edit')}" class="addSinglepage" title="增加栏目">增加单页</a>
    </div>
    <div class="sin_form">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
            <tr>
              <td width="99" height="36" align="center" bgcolor="#eeeeee">ID</td>
              <td width="580" align="center" bgcolor="#eeeeee">单页名称</td>
              <td width="428" align="center" bgcolor="#eeeeee">编辑器</td>
              <td width="428" align="center" bgcolor="#eeeeee">图片</td>
              <td width="428" align="center" bgcolor="#eeeeee">简介</td>
              <td width="322" align="center" bgcolor="#eeeeee">优化</td>
              <td width="428" align="center" bgcolor="#eeeeee">定向链接</td>
              <td width="279" align="center" bgcolor="#eeeeee">管理操作</td>
            </tr>
          
           <foreach name="dataList" item="item">
            <tr>
                <td height="36" align="center" bgcolor="#ffffff">{$item.id}</td>
                <td align="center" bgcolor="#ffffff"><a href="{:U('Common/manage','id='.$item['id'])}">{$item.title}</a></td>
                <td align="center" bgcolor="#ffffff">{$statusArr[$item['editor_used']]}</td>
                <td align="center" bgcolor="#ffffff">{$statusArr[$item['pic_used']]}</td>
                <td align="center" bgcolor="#ffffff">{$statusArr[$item['introduce_used']]}</td>
                <td align="center" bgcolor="#ffffff">{$statusArr[$item['is_seo']]}</td>
                <td align="center" bgcolor="#ffffff"><a href="{:U('Common/manage','id='.$item['id'])}">进入管理</a></td>
                <td align="center" bgcolor="#ffffff">
                    <a href="{:U('Common/edit','id='.$item['id'])}"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                    <a href="{:U('Common/del','id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
                </td>
            </tr>
            </foreach>
        </table>
    </div>

</body>
</html>
