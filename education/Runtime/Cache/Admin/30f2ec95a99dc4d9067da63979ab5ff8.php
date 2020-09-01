<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" /><link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/humane/libnotify.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/admin.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/My97DatePicker/WdatePicker.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/humane.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/imgpre.js"></script>
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
			$.ajax({type:"GET", url:"<?php echo U('News/ajaxFindNext'); ?>",data: data, dataType:"text",async:false,success:function (msg){
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
			<?php echo ($content); ?>	
		});

</script>
</head>

<body>
<div class="main_top">
	<span id="localtime" class="localtime">
		<script type="text/javascript" src="/education/App/Admin/Public/js/time.js"></script>
	</span>
    <font> <a href="javascript:void(0);" onclick="javascript:history.back(-1);"></a> </font>
	<em class="welinfo">
		 <b><?php echo cookie('AUTH_USER_NAME');?> (<strong><?php if($m_id == 1): ?>超级管理员<?php else: echo ($group_name); endif; ?></strong>)</b>您好，欢迎访问本站。
	</em>
</div>

<div class="position">
   信息管理-<?php echo ($cfg["title"]); ?> 
</div>
<div class="funcform">
<?php if($cfg["is_class"] > 0): ?><a href="<?php echo U('News/index','rid='.$cfg['id']);?>" class="addSinglepage">全部</a>
	<a href="<?php echo U('NewsClass/index','rid='.$cfg['id']);?>" class="addSinglepage btn_white">分类管理</a><?php endif; ?> 
   
	<a href="<?php echo U('News/edit','rid='.$cfg['id']);?>" class="addSinglepage btn_yellow">添加文章</a>

    <form name="search" method="get" action="/education/admin.php/News/index">
    <input type="hidden" name="rid" value="<?php echo ($cfg["id"]); ?>" />
    关键词：
    <input type="text" name="sh_q" value="<?php echo ($shArray["sh_q"]); ?>" />
    <?php if($cfg["is_class"] > 0): ?>分类：<span id="area_0">
        <select class="sel1" name="class_id[]" onchange="javascript:findNext(this.value , 0 ,'area');">
            <option value="">请选择分类</option>
           <?php if(is_array($classList) && !empty($classList) ): foreach($classList as $key=>$item): ?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["class_name"]); ?></option><?php endforeach; else: endif; ?>
        </select>
       </span><?php endif; ?>
    时间段：
      <input name="from_time"  value="<?php echo ($shArray['from_time']?$shArray['from_time']:''); ?>" type="text" id="from_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'%y-%M-{%d}'})"/>
        		到：
      <input name="to_time"  value="<?php echo ($shArray['to_time']?$shArray['to_time']:''); ?>" type="text" id="to_time" size="15" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:from_time.value,maxDate:'%y-%M-{%d}'})"/>
                
    <input type="submit" class="linkcommon2" value="提交" />
    </form>
</div>
<div class="sin_form">
<form method="post" name="myform" id="myform">
<input type="hidden" name="rid" value="<?php echo ($cfg["id"]); ?>" />
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
		<tr>
			<td width="50" height="36" align="center" bgcolor="#eeeeee">选中</td>
		  <td width="80" align="center" bgcolor="#eeeeee">ID</td>
		  <td width="400" align="center" bgcolor="#eeeeee">信息标题</td>
		  <td width="90" align="center" bgcolor="#eeeeee">排序</td>
          <td width="90" align="center" bgcolor="#eeeeee">状态</td>
          <?php if($rid != 4): ?><td width="100" align="center" bgcolor="#eeeeee">首页推荐</td><?php endif; ?>
          <?php if($mobilePower > 0): ?><td width="70" align="center" bgcolor="#eeeeee">PM同步</td><?php endif; ?>
          <td width="220" align="center" bgcolor="#eeeeee">发布时间</td>
		  <?php if($cfg["is_pic"] > 0): ?><td width="101" align="center" bgcolor="#eeeeee">图片</td><?php endif; ?>
		  <td width="180" align="center" bgcolor="#eeeeee">管理操作</td>
	  </tr>
        <?php if(is_array($list) && !empty($list) ): foreach($list as $key=>$item): ?><tr>
                <td height="36" align="center" bgcolor="#ffffff"><input type="checkbox" name="id[]" value="<?php echo ($item["id"]); ?>" /></td>
              <td align="center" bgcolor="#ffffff"><?php echo ($item["id"]); ?></td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="title" rel="<?php echo ($item["id"]); ?>" isfresh="0" para="input"><?php echo ($item["title"]); ?></td>
                <td align="center" bgcolor="#ffffff" class="TextTd" name="list_order" rel="<?php echo ($item["id"]); ?>" isfresh="1" para="input"><?php echo ($item["list_order"]); ?></td>
                <td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_<?php echo ($item["status"]); ?>" name="status" rel="<?php echo ($item["id"]); ?>" isfresh="0" para="select">
                <?php if(is_array($statusArr) && !empty($statusArr) ): foreach($statusArr as $key=>$items): ?><option value="<?php echo ($key); ?>" <?php if($key == $item["status"] && $item["status"] != ''): ?>selected<?php endif; ?> class="select_color_<?php echo ($key); ?>"><?php echo ($items); ?></option><?php endforeach; else: endif; ?>
                </select>                </td>
                
                <?php if($rid != 4): ?><td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_<?php echo ($item["is_home"]); ?>" name="is_home" rel="<?php echo ($item["id"]); ?>" isfresh="0" para="select">
                <?php if(is_array($isHome) && !empty($isHome) ): foreach($isHome as $key=>$items): ?><option value="<?php echo ($key); ?>" <?php if($key == $item["is_home"] && $item["is_home"] != ''): ?>selected<?php endif; ?> class="select_color_<?php echo ($key); ?>"><?php echo ($items); ?></option><?php endforeach; else: endif; ?>
                </select>                
                </td><?php endif; ?>
               
                <?php if($mobilePower > 0): ?><td align="center" bgcolor="#ffffff">
                <select class="selectTd select_color_<?php echo ($item["is_mobile"]); ?>" name="is_mobile" rel="<?php echo ($item["id"]); ?>" isfresh="0" para="select">
                <?php if(is_array($isMobile) && !empty($isMobile) ): foreach($isMobile as $key=>$items): ?><option value="<?php echo ($key); ?>" <?php if($key == $item["is_mobile"] && $item["is_mobile"] != ''): ?>selected<?php endif; ?> class="select_color_<?php echo ($key); ?>"><?php echo ($items); ?></option><?php endforeach; else: endif; ?>
                </select>                </td><?php endif; ?>
                
                
                <td align="center" bgcolor="#ffffff"><?php echo (date('Y-m-d H:i:s',$item["addtime"])); ?> </td>
                <?php if($cfg["is_pic"] > 0): ?><td align="center" bgcolor="#ffffff">
                   <img src="/education/Upload/<?php echo ($item["pic_path"]); ?>" width="80" height="30" rel="/education/Upload/<?php echo ($item["pic_path"]); ?>" class="preview" onerror="this.src='/education/App/Admin/Public/images/nopic.gif'"/>                </td><?php endif; ?>
                <td align="center" bgcolor="#ffffff">
                  <div class="zznews"> 
                   <?php if($cfg["is_msg"] > 0): ?><a href="<?php echo U('NewsMsg/index?sh_news_id='.$item['id'].'');?>" title="查看评论">
                     <img src="/education/App/Admin/Public/images/btns_10.jpg" class="opimg" />
                    </a><?php endif; ?>
                   <?php if($cfg["is_album"] > 0): ?><a href="<?php echo U('Photo/index?typeid=news&fileType='.$cfg['album_value'].'&parentid='.$item["id"].'');?>" title="批量图片管理">
                    <img src="/education/App/Admin/Public/images/btns_08.jpg" class="opimg" />
                    </a><?php endif; ?>  
                    <a href="<?php echo U('News/edit','rid='.$item['rid'].'&id='.$item['id']);?>" title="修改内容"><img src="/education/App/Admin/Public/images/btns_07.jpg" class="opimg" /></a>
                    <a href="<?php echo U('News/del','rid='.$item['rid'].'&id='.$item['id']);?>" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="/education/App/Admin/Public/images/btns_05.jpg" class="opimg" /></a></div>              </td>
            </tr><?php endforeach; else: endif; ?>
	</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
			<td width="35" height="36" align="center"><input type="checkbox" id="checkAll" /></td>
		    <td width="29"><div align="center">全选</div></td>
	      <td width="1086">
		    <div class="pltime">
		      <input type="button" name="delete" value=" 批量删除 " class="choosedel" onclick="if(confirm('你确认删除选中的条目么？')){myform.action='<?=U('News/del','rid='.$cfg['id'])?>';myform.submit();}" />
            <?php if($cfg["is_class"] > 0): ?><span>批量移动到：</span>
                <span id="areaD_0">
                    <select name="class_id[]" onchange="javascript:findNext(this.value , 0 ,'areaD');">
                        <option value="">请选择分类</option>
                       <?php if(is_array($classList) && !empty($classList) ): foreach($classList as $key=>$item): ?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["class_name"]); ?></option><?php endforeach; else: endif; ?>
                    </select>
                </span>
                <input type="button" value=" 批量移动 " class="choosedel" onclick="if(confirm('你确认移动选中的条目么？')){myform.action='<?=U('News/upClass','rid='.$cfg['id'])?>';myform.submit();}" /><?php endif; ?>
            <strong>批量修改发布时间：</strong>  
          <p><input name="addtime" type="text" id="addtime" size="20" readonly="readonly" maxlength="10" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/> </p>  <input type="button" name="subaddtime" value=" 提交 " class="choosedel" onclick="if(confirm('确定批量修改时间么？')){myform.action='<?=U('News/addtime')?>';myform.submit();}"></div>   </td>
	  </tr>
    </table>

  </form>

</div>

<div class="pageout">
	<?php echo ($page); ?>
</div>
<script>
imagePreview();
</script>
<script src="/education/App/Admin/Public/js/AjaxList.js.php?action=ajaxlistinput&url=<?php echo urlencode(U('News/ajaxListInput'));?>"></script>
</body>
</html>