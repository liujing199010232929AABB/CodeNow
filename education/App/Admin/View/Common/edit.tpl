<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <import type="css" basepath="__CSS__" file="admin" />
    <import type="js" basepath="__JS__" file="jquery,form" />
</head>
<body>
<include file="Inc/head" />
<div class="position">
	单页管理-<if condition="$dataInfo.id gt 0 ">修改单页<else />添加单页</if>
</div>
<div class="wid1000">
<form class="editForm" id="editForm" name="editForm" action="{:U('Common/save')}" method="post">
    <input type="hidden" name="id" value="{$dataInfo.id}" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="131" height="36">单页名称：</td>
		    <td width="869">
                <input type="text" class="text400bg" name="title" id="title" value="{$dataInfo.title}" />
                <span class="Validform_checktip"></span>
            </td>
	    </tr>
        <tr>
            <td width="131" height="36">选择分类：</td>
            <td>
                <select id="cate_id" name="cate_id" style="width: 131px">
                    <option value="">请选择</option>
                    <foreach name="category" item="vo">
                        <option value="{$vo.id}" <if condition="($vo.id eq $dataInfo['cate_id'])">selected</if> >{$vo.cate_name}</option>
                    </foreach>
                </select>
                <span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
          <td width="131" height="36">编辑器：</td>
          <td>
          开启<input name="editor_used" type="radio" value="1" {$dataInfo['editor_used']?'checked':''}/>
          关闭<input name="editor_used" type="radio" value="0" {$dataInfo['editor_used']?'':'checked'}/>
          </td>
        </tr>
        <tr>
          <td width="131" height="36">图片：</td>
          <td>
          开启<input name="pic_used" type="radio" value="1" {$dataInfo['pic_used']?'checked':''}/>
          关闭<input name="pic_used" type="radio" value="0" {$dataInfo['pic_used']?'':'checked'}/>
          </td>
        </tr>  
        <tr>
          <td width="131" height="36">简介：</td>
          <td>
          开启<input name="introduce_used" type="radio" value="1" {$dataInfo['introduce_used']?'checked':''}/>
          关闭<input name="introduce_used" type="radio" value="0" {$dataInfo['introduce_used']?'':'checked'}/>
          </td>
        </tr> 
        <tr>
          <td width="131" height="36">优化：</td>
          <td>
          开启<input name="is_seo" type="radio" value="1" {$dataInfo['is_seo']?'checked':''}/>
          关闭<input name="is_seo" type="radio" value="0" {$dataInfo['is_seo']?'':'checked'}/>
          </td>
        </tr>         
 	    <tr>
			<td width="131" height="42"></td>
	        <td><input type="submit" class="linkcommon" value="保存" /></td>
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
	
	objForm.addRule([
        {
            ele:"#title:eq(0)",
            datatype:"*",
            nullmsg:"请填写单页名称",
	    },

    ]);

});
</script>

</body>
</html>