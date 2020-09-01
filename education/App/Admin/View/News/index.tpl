<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
<import type="js" basepath="__JS__" file="jquery,admin,My97DatePicker.WdatePicker,humane,imgpre" />
<script language="javascript">
		
		function findNext(v , e , dom){
			var selValue = parseInt(v);
			var areaNextId = parseInt(e+1);
			$("#"+dom+"_"+areaNextId).remove();
			$("#"+dom+"_"+e+" > select > option").each(function(i){
				if($(this).attr('value') == v){
					$(this).attr('selected',true);
				}
			});
			var data = { r: Math.random(),selValue: selValue,areaNextId: areaNextId,dom: dom };
			$.ajax({type:"GET", url:"<php>echo U('News/ajaxFindNext');</php>",data: data, dataType:"text",async:false,success:function (msg){
				r = msg;
			}}); 	
			if (r==0) {
				return false;
			} else {
				$("#"+dom+"_"+e).append(r);
				return true;
			}		
		}
		
		$(function(){
			{$content}	
		});

</script>
</head>

<body>
<include file="Inc/head" />

<div class="position">
   信息管理-{$cfg.title} 
</div>
<div class="funcform">
<if condition="$cfg.is_class gt 0">
    <a href="{:U('News/index','rid='.$cfg['id'])}" class="addSinglepage">全部</a>
	<a href="{:U('NewsClass/index','rid='.$cfg['id'])}" class="addSinglepage btn_white">分类管理</a>
</if> 
   
	<a href="{:U('News/edit','rid='.$cfg['id'])}" class="addSinglepage btn_yellow">添加文章</a>

    <form name="search" method="get" action="__URL__/index">
    <input type="hidden" name="rid" value="{$cfg.id}" />
    关键词：
    <input type="text" name="sh_q" value="{$shArray.sh_q}" />
    <if condition="$cfg.is_class gt 0">
    分类：<span id="area_0">
        <select class="sel1" name="class_id[]" onchange="javascript:findNext(this.value , 0 ,'area');">
            <option value="">请选择分类</option>
           <foreach name="classList" item="item">
            <option value="{$item.id}">{$item.class_name}</option>
           </foreach>
        </select>
       </span>
    </if>
    时间段：
      <input name="from_time"  value="{$shArray['from_time']?$shArray['from_time']:''}" type="text" id="from_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'%y-%M-{%d}'})"/>
        		到：
      <input name="to_time"  value="{$shArray['to_time']?$shArray['to_time']:''}" type="text" id="to_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:from_time.value,maxDate:'%y-%M-{%d}'})"/>
                
    <input type="submit" class="linkcommon2" value="提交" />
    </form>
</div>
<div class="sin_form">
<form method="post" name="myform" id="myform">
<input type="hidden" name="rid" value="{$cfg.id}" />
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
		<tr>
			<td width="50" height="36" align="center" bgcolor="#eeeeee">选中</td>
		  <td width="80" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="400" align="center" bgcolor="#eeeeee">信息标题</td>
		  <td width="90" align="center" bgcolor="#eeeeee">排序</td>
          <td width="90" align="center" bgcolor="#eeeeee">状态</td>
          <if condition="$rid neq 4">
          <td width="100" align="center" bgcolor="#eeeeee">首页推荐</td>
          </if>
          <if condition="$mobilePower gt 0">
          <td width="70" align="center" bgcolor="#eeeeee">PM同步</td>
          </if>
          <td width="220" align="center" bgcolor="#eeeeee">发布时间</td>
		  <if condition="$cfg.is_pic gt 0"><td width="101" align="center" bgcolor="#eeeeee">图片</td></if>
		  <td width="180" align="center" bgcolor="#eeeeee">管理操作</td>
	  </tr>
        <foreach name="list" item="item" >
            <tr>
                <td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="{$item.id}" /></td>
              <td align="center" bgcolor="#ffffff">{$item.id}</td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="title" rel="{$item.id}" isfresh="0" para="input">{$item.title}</td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="{$item.id}" isfresh="1" para="input">{$item.list_order}</td>
                <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_{$item.status}" name="status" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="statusArr" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.status && $item.status neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select>                </td>
                
                <if condition="$rid neq 4">
                <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_{$item.is_home}" name="is_home" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="isHome" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.is_home && $item.is_home neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select>                
                </td>
                </if>
               
                <if condition="$mobilePower gt 0">
                <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_{$item.is_mobile}" name="is_mobile" rel="{$item.id}" isfresh="0" para="select">
                <foreach name="isMobile" item="items" key="key">
                <option value="{$key}" <if condition="$key eq $item.is_mobile && $item.is_mobile neq ''"> selected </if> class="select_color_{$key}">{$items}</option>
                </foreach>
                </select>                </td>
                </if>
                
                
                <td align="center" bgcolor="#ffffff">{$item.addtime|date='Y-m-d H:i:s',###} </td>
                <if condition="$cfg.is_pic gt 0"><td align="center" bgcolor="#ffffff">
                   <img src="__UPLOAD__/{$item.pic_path}" width="80" height="30" rel="__UPLOAD__/{$item.pic_path}" class="preview" onerror="this.src='__IMG__/nopic.gif'"/>                </td></if>
                <td align="center" bgcolor="#ffffff">
                  <div class="zznews"> 
                   <if condition="$cfg.is_msg gt 0">
                    <a href="{:U('NewsMsg/index?sh_news_id='.$item['id'].'')}" title="查看评论">
                     <img src="__IMG__/btns_10.jpg" class="opimg" />
                    </a>
                   </if>
                   <if condition="$cfg.is_album gt 0">
                    <a href="{:U('Photo/index?typeid=news&fileType='.$cfg['album_value'].'&parentid='.$item["id"].'')}" title="批量图片管理">
                    <img src="__IMG__/btns_08.jpg" class="opimg" />
                    </a>
                   </if>  
                    <a href="{:U('News/edit','rid='.$item['rid'].'&id='.$item['id'])}" title="修改内容"><img src="__IMG__/btns_07.jpg" class="opimg" /></a>
                    <a href="{:U('News/del','rid='.$item['rid'].'&id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a></div>              </td>
            </tr>
		</foreach>
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="35" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
		    <td width="29"><div align="center">全选</div></td>
	      <td width="1086">
		    <div class="pltime">
		      <input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('News/del','rid='.$cfg['id'])?>';myform.submit();}" />
            <if condition="$cfg.is_class gt 0">
                <span>批量移动到：</span>
                <span id="areaD_0">
                    <select name="class_id[]" onchange="javascript:findNext(this.value , 0 ,'areaD');">
                        <option value="">请选择分类</option>
                       <foreach name="classList" item="item">
                        <option value="{$item.id}">{$item.class_name}</option>
                       </foreach>
                    </select>
                </span>
                <input type="button" value=" 批量移动 " class="choosedel" onclick="if(confirm('你确认移动选中的条目么？')){myform.action='<?=U('News/upClass','rid='.$cfg['id'])?>';myform.submit();}" />
            </if>
            <strong>批量修改发布时间：</strong>  
          <p><input name="addtime" type="text" id="addtime" size="20" readonly="readonly" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/> </p>  <input type="button" name="subaddtime" value=" 提交 " class="choosedel" onclick="if(confirm('确定批量修改时间么？')){myform.action='<?=U('News/addtime')?>';myform.submit();}"></div>   </td>
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
<script src="__JS__/AjaxList.js.php?action=ajaxlistinput&url={:urlencode(U('News/ajaxListInput'))}"></script>
</body>
</html>