<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.boldlight" />
<import type="js" basepath="__JS__" file="jquery,form,My97DatePicker.WdatePicker,AjaxFileUpload,humane,imgpre,ueditor/ueditor#config,ueditor/ueditor#all#min" />
<script language="javascript">
		function findNext(v , e){
			var selValue = parseInt(v);
			var areaNextId = parseInt(e+1);
			$("#area_"+areaNextId).remove();
			$("#area_"+e+" > select > option").each(function(i){
				if($(this).attr('value') == v){
					$(this).attr('selected',true);
				}
			});
			
			var data = { r: Math.random(),selValue: selValue,areaNextId: areaNextId };
			$.ajax({type:"GET", url:"<php>echo U('News/ajaxFindNext');</php>",data: data, dataType:"text",async:false,success:function (msg){
				r = msg;
			}}); 	
			if (r==0) {
				return false;
			} else {
				$('#area_'+e).append(r);
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
    
    信息管理-<if condition="$dataInfo.id gt 0 ">修改信息<else />添加信息</if>
    
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="{:U('News/save')}" method="post">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
    <input type="hidden" name="language" value="{:cookie('AUTH_USER_LANG')}" />
    <input type="hidden" name="rid" value="{$cfg.id}" />
    <input type="hidden" name="back_url" value="{$back_url}" size="100" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    
      <if condition="$cfg.is_class gt 0">
		<tr>
          <td width="112" height="36">信息分类：</td>
          <td>
               <span id="area_0">
                <select class="sel1" name="class_id[]" onchange="javascript:findNext(this.value , 0);">
                    <option value="">请选择分类</option>
                   <foreach name="classList" item="item">
                    <option value="{$item.id}">{$item.class_name}</option>
                   </foreach>
                </select>
               </span>  
          </td>
	    </tr>
       </if>
		<tr>
			<td width="112" height="36">信息标题：</td>
	      <td><input type="text" class="text400bg" name="title" id="title" value="{$dataInfo.title}" /><span class="Validform_checktip"></span></td>
        </tr> 
       <if condition="in_array($rid ,array(6,9,11,14,16,19,21,24,26,29,31,34,36,39,41,44,46,49,51,54,56,59,61,64))">
         <tr>
			<td width="112" height="36">英文标题：</td>
	      <td><input type="text" class="text400bg" name="title_en" id="title_en" value="{$dataInfo.title_en}" /><span class="Validform_checktip"></span></td>
        </tr> 
       </if>
       <if condition="$cfg.is_introduce gt 0">
		<tr>
			<td width="112" height="36">信息简介：</td>
            <td>
				<textarea class="textarea1" name="introduce" id="introduce">{$dataInfo.introduce}</textarea>
			</td>
		</tr>
       </if> 
        <if condition="$cfg.is_content gt 0">
		<tr>
			<td width="112" height="36">信息内容：</td>
     <td>
                 
                 <textarea name="content" id="container">{$dataInfo.content}</textarea>
				 
				<script>
                   $(function(){
                     var ue = UE.getEditor('container',{
                        serverUrl :"{:U('Admin/Common/ueditor')}",
                        initialFrameWidth:860, //初始化宽度
                        initialFrameHeight:500, //初始化高度
                     });
                   })
                </script>
                 
                  <p style="color:#990000">如需对文章内容进行分页，请进行 [page] 标签分割</p>
          
          </td>
		</tr>
        </if>
        <if condition="$cfg.is_pic gt 0">
		<tr>
		  <td width="112" height="36">图片：</td>
		  <td height="20">
          <input type="hidden" name="pic_path" id="{$cfg.pic_value}_path" size="50" value="{$dataInfo.pic_path}" />
          <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type={$cfg.pic_value}&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script> 
          </td>
		</tr>
        </if>
        
        <if condition="$cfg.is_link_video gt 0">
		<tr>
		  <td width="112" height="36">视频链接：</td>
		  <td height="20">
          <input type="text" name="link_video" id="{$cfg.link_video}_path" class="text400bg" size="50" value="{$dataInfo.link_video}" />
          </td>
		</tr>
        </if>
        
        <if condition="$cfg.is_file gt 0">
		<tr>
		  <td width="112" height="36">文件：</td>
		  <td height="20">
          <input type="hidden" name="file_path" id="{$cfg.file_value}_path" size="50" value="{$dataInfo.file_path}" />
           <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?fype={$cfg.file_value}&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
          </td>
		</tr>
        </if>
        
        <if condition="$cfg.is_video gt 0">
		<tr>
		  <td width="112" height="36">媒体：</td>
		  <td height="20">
          <input type="hidden" name="video_path" id="{$cfg.video_value}_path" size="50" value="{$dataInfo.video_path}" />
           <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?fype={$cfg.video_value}&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
          </td>
		</tr>
        </if>
       
        <tr>
			<td width="89" height="36">状态：</td>
			<td>
            	<select name="status" id="status">
                    <foreach name="statusArr" item="item">
                    <option value="{$key}" <if condition="$key eq $dataInfo['status']"> selected </if>>{$item}</option>
                    </foreach>
                </select>
            </td>
		</tr>
       
       <if condition="$rid neq 4">
        <tr>
			<td width="89" height="36">首页推荐：</td>
			<td>
            	<select name="is_home" id="is_home">
                    <foreach name="isHome" item="item">
                    <option value="{$key}" <if condition="$key eq $dataInfo['is_home']"> selected </if>>{$item}</option>
                    </foreach>
                </select>
            </td>
		</tr>
        </if>
        <if condition="$mobilePower gt 0">
        
			<td width="89" height="36">PM同步：</td>
			<td>
            	<select name="is_mobile" id="is_mobile">
                    <foreach name="isMobile" item="item">
                    <option value="{$key}" <if condition="$key eq $dataInfo['is_mobile']"> selected </if>>{$item}</option>
                    </foreach>
                </select>
            </td>
            
		</tr>
        
        </if>
        <!--<tr>
			<td width="112" height="36">来源：</td>
		  <td><input type="text" class="text400bg" name="source" id="source" value="{$dataInfo.source}"/></td>
		</tr>-->
        <if condition="!in_array($rid,array(1,3))">
		<tr>
			<td width="112" height="36">阅读量：</td>
		  <td><input type="text" class="text400bg" name="clicks" id="clicks" value="{$dataInfo.clicks}"/></td>
		</tr>
        </if>
        <if condition="$cfg.is_seo gt 0">
		<tr>
			<td width="112" height="36">页面关键词：</td>
		  <td><input type="text" class="text400bg" name="keywords" id="keywords" value="{$dataInfo.keywords}"/></td>
		</tr>
		<tr>
			<td width="112" height="36">页面描述：</td>
		  <td><input type="text" class="text400bg" name="description" id="description" value="{$dataInfo.description}"/></td>
		</tr>
        </if>
		<tr>
			<td width="112" height="36"><if condition="$cfg['id'] eq 3">发布时间<else/>添加时间</if>：</td>
		  <td><input type="text" class="text400bg" name="addtime" id="addtime" value="<if condition='$dataInfo.addtime gt 0 '>{$dataInfo.addtime|date='Y-m-d H:i:s',###}</if>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/></td>
		</tr>
		<tr>
		   <td width="112" height="42" align="right"></td>
		   <td>
            <input type="submit" class="linkcommon" value="保存" />
           </td>
		</tr>
	</table>
</form>    
</div>

<script language="javascript">
$(function(){	
		
		
var objForm=$(".editForm").Validform({
		tiptype:function(msg,o,cssctl){
			if(!o.obj.is("form")){ //验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
				var objtip=o.obj.siblings(".Validform_checktip");
				cssctl(objtip,o.type);
				objtip.text(msg);
			}
		}

	});
	
	objForm.addRule([{
		ele:"#title:eq(0)",
		datatype:"*",
		nullmsg:"请填写标题",
	}
	,
	{
		ele:".sel1:eq(0)",
		datatype:"*"
	}]);
		
		
		
		
});
</script>


</body>
</html>
