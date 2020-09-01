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
	留言系统-招商加盟
</div>
<div class="funcform">
    <form name="search" method="get" action="__URL__/index">
    关键词：
    <input type="text" name="sh_q" value="{$shArray.sh_q}" />
    
    时间段：
      <input name="from_time"  value="{$shArray['from_time']?$shArray['from_time']:''}" type="text" id="from_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'%y-%M-{%d}'})"/>
        		到：
      <input name="to_time"  value="{$shArray['to_time']?$shArray['to_time']:''}" type="text" id="to_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:from_time.value,maxDate:'%y-%M-{%d}'})"/>
      <input type="submit" class="linkcommon2" value="提交" />
  </form>
</div>

<div class="sin_form">
    <form method="post" name="myform" id="myform">
    <input type="hidden" name="classid" value="{$classid}" />
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
        <tr>
			<td width="33" height="36" align="center" bgcolor="#eeeeee">选中</td>
		  <td width="87" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="152" align="center" bgcolor="#eeeeee">姓名</td>
		  <td width="152" align="center" bgcolor="#eeeeee">电话</td>
		  <td width="248" align="center" bgcolor="#eeeeee">IP记录</td>
		  <td width="252" align="center" bgcolor="#eeeeee">发布时间</td>
		  <td width="121" align="center" bgcolor="#eeeeee">管理操作</td>
		</tr>
        <foreach name="list" item="item">
		<tr>
			<td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="{$item.id}" /></td>
			<td align="center" bgcolor="#ffffff">{$item.id}</td>
		  <td align="center" bgcolor="#ffffff">{$item.nickname}</td>
		  <td align="center" bgcolor="#ffffff">{$item.mobile}</td>
			<td align="center" bgcolor="#ffffff">{$item.webip}</td>
			<td align="center" bgcolor="#ffffff">{$item.addtime|date='Y-m-d H:i:s',###} </td>
			<td align="center" bgcolor="#ffffff">
				<a href="{:U('Cooper/view?id='.$item['id'].'')}" title="查看留言" ><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                <a href="{:U('Cooper/del?id='.$item['id'].'')}" onclick="if(confirm('你确认删除吗？')){return;}else{return false;}" title="删除留言" ><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
			</td>
		</tr>
        </foreach>
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="44" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
		  <td width="1112"><input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('Cooper/del')?>';myform.submit();}"></td>
	  </tr>
    </table>
    </form>
    <div class="pageout">{$page}</div>

</div>

<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('Msg/ajaxList'))}"></script>
</body>
</html>
