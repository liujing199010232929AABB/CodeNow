<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <import type="css" basepath="__CSS__" file="admin" />
    <import type="js" basepath="__JS__" file="jquery,form" />
    <script language="javascript">
    function con_album_value(val){
       if(val==1){
        $(".album_value").show();
        }else{
        $(".album_value").hide();
        }
    }
    function con_pic_value(val){
       if(val==1){
        $(".pic_value").show();
        }else{
        $(".pic_value").hide();
        }
    }
    function con_class_pic_value(val){
       if(val==1){
        $(".class_pic_value").show();
        }else{
        $(".class_pic_value").hide();
        }
    }


    function con_video_value(val){
       if(val==1){
        $(".video_value").show();
        }else{
        $(".video_value").hide();
        }
    }
    function con_file_value(val){
       if(val==1){
        $(".file_value").show();
        }else{
        $(".file_value").hide();
        }
    }
    </script>
</head>

<body>
    <include file="Inc/head" />
    <div class="position">
        信息管理-<if condition="$dataInfo.id gt 0 ">修改信息栏目<else />添加信息栏目</if>
    </div>
    <div class="wid1000">
        <form class="editForm" id="editForm" name="editForm" action="{:U('NewsConfig/save')}" method="post">
            <input type="hidden" name="id" value="{$dataInfo.id}" />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="131" height="36">选择国家分类：</td>
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
                    <td width="131" height="36">选择新闻类型：</td>
                    <td>
                        <select id="type" name="type" style="width: 131px">
                            <option value="0" <eq name="dataInfo.type" value="0"> selected </eq> >请选择    </option>
                            <option value="1" <eq name="dataInfo.type" value="1"> selected </eq> >新闻资讯  </option>
                            <option value="2" <eq name="dataInfo.type" value="2"> selected </eq> >留学专业  </option>
                            <option value="3" <eq name="dataInfo.type" value="3"> selected </eq> >留学方案  </option>
                            <option value="4" <eq name="dataInfo.type" value="4"> selected </eq> >留学院校  </option>
                            <option value="5" <eq name="dataInfo.type" value="5"> selected </eq> >新闻中心  </option>
                            <option value="6" <eq name="dataInfo.type" value="6"> selected </eq> >顾问风采  </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="112" height="36">栏目名称：</td>
                    <td><input type="text" class="text400bg" name="title" id="title" value="{$dataInfo.title}" /><span class="Validform_checktip"></span></td>
                </tr>
                <tr>
                  <td height="36">评论开关：</td>
                  <td>
                  开<input name="is_msg" type="radio" value="1" {$dataInfo['is_msg']?'checked':''} />
                  关<input name="is_msg" type="radio" value="0" {$dataInfo['is_msg']?'':'checked'} />
                  </td>
                </tr>
                <tr>
                  <td height="36">栏目相册：</td>
                  <td>
                  是<input name="is_album" type="radio" value="1" {$dataInfo['is_album']?'checked':''}  onclick="javascript:con_album_value(this.value)"/>
                  否<input name="is_album" type="radio" value="0" {$dataInfo['is_album']?'':'checked'}  onclick="javascript:con_album_value(this.value)"/>
                  </td>
                </tr>
                <tr class="album_value" {$dataInfo['is_album']?'':'style="display:none;"'}>
                  <td height="36">相册图片数组：</td>
                  <td>
                  <input name="album_value" type="text" id="album_value" size="50" value="{$dataInfo.album_value}"  />
                  <font color="#ff0000">(图片上传配置数组)</font></td>
                </tr>

                <tr>
                  <td height="36">信息分类：</td>
                  <td>
                  是<input name="is_class" type="radio" value="1" {$dataInfo['is_class']?'checked':''} />
                  否<input name="is_class" type="radio" value="0" {$dataInfo['is_class']?'':'checked'} />
                  </td>
                </tr>
                <tr>
                  <td height="36">分类级数：</td>
                  <td>
                  <select name="class_depth">
                  <for start="1" end="10">
                    <option value="{$i}" {$i==$dataInfo['class_depth']?'selected':''}>{$i}级</option>
                  </for>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td height="36">分类介绍：</td>
                  <td>
                  是<input name="is_class_introduce" type="radio" value="1" {$dataInfo['is_class_introduce']?'checked':''} />
                  否<input name="is_class_introduce" type="radio" value="0" {$dataInfo['is_class_introduce']?'':'checked'} />
                  </td>
                </tr>


                <tr class="class_info">
                  <td height="36">分类图片：</td>
                  <td>
                  是<input name="is_class_pic" type="radio" value="1" {$dataInfo['is_class_pic']?'checked':''} onclick="javascript:con_class_pic_value(this.value)" />
                  否<input name="is_class_pic" type="radio" value="0" {$dataInfo['is_class_pic']?'':'checked'} onclick="javascript:con_class_pic_value(this.value)"  />
                  </td>
                </tr>

                <tr class="class_pic_value class_info" {$dataInfo['is_class_pic']?'':'style="display:none;"'}>
                  <td height="36">分类图片数组：</td>
                  <td>
                  <input name="class_pic_value" type="text" id="class_pic_value" size="50" value="{$dataInfo.class_pic_value}"  />
                  (<font color="#FF0000">图片上传配置数组</font>)</td>
                </tr>


                <tr>
                  <td height="36">文章简介：</td>
                  <td>
                  是<input name="is_introduce" type="radio" value="1" {$dataInfo['is_introduce']?'checked':''} />
                  否<input name="is_introduce" type="radio" value="0" {$dataInfo['is_introduce']?'':'checked'} />
                  </td>
                </tr>
                <tr>
                  <td height="36">文章内容：</td>
                  <td>
                  是<input name="is_content" type="radio" value="1" {$dataInfo['is_content']?'checked':''} />
                  否<input name="is_content" type="radio" value="0" {$dataInfo['is_content']?'':'checked'} />
                  </td>
                </tr>
                <tr>
                  <td height="36">外链视频：</td>
                  <td>
                  是<input name="is_link_video" type="radio" value="1" {$dataInfo['is_link_video']?'checked':''} />
                  否<input name="is_link_video" type="radio" value="0" {$dataInfo['is_link_video']?'':'checked'} />
                  </td>
                </tr>
                <tr>
                  <td height="36">网站优化：</td>
                  <td>
                  是<input name="is_seo" type="radio" value="1" {$dataInfo['is_seo']?'checked':''} />
                  否<input name="is_seo" type="radio" value="0" {$dataInfo['is_seo']?'':'checked'} />
                  </td>
                </tr>
                <tr>
                  <td>文章图片：</td>
                  <td height="36">
                  是<input name="is_pic" type="radio" value="1" {$dataInfo['is_pic']?'checked':''} onclick="javascript:con_pic_value(this.value)" />
                  否<input name="is_pic" type="radio" value="0" {$dataInfo['is_pic']?'':'checked'} onclick="javascript:con_pic_value(this.value)"  />
                  </td>
                </tr>
                <tr class="pic_value" {$dataInfo['is_pic']?'':'style="display:none;"'}>
                  <td height="36">图片数组：</td>
                  <td>
                  <input name="pic_value" type="text" id="pic_value" size="50" value="{$dataInfo.pic_value}"  />
                  <font color="#FF0000">(图片上传配置数组)</font></td>
                </tr>
                <tr>
                  <td height="36">视频上传：</td>
                  <td>
                  是<input name="is_video" type="radio" value="1" {$dataInfo['is_video']?'checked':''} onclick="javascript:con_video_value(this.value)" />
                  否<input name="is_video" type="radio" value="0" {$dataInfo['is_video']?'':'checked'} onclick="javascript:con_video_value(this.value)"  />
                  </td>
                </tr>
                <tr class="video_value" {$dataInfo['is_video']?'':'style="display:none;"'}>
                  <td height="36">视频数组：</td>
                  <td>
                  <input name="video_value" type="text" id="video_value" size="50" value="{$dataInfo.video_value}"  />
                  <font color="#FF0000">(视频上传配置数组)</font></td>
                </tr>
                <tr>
                  <td height="36">附件上传：</td>
                  <td>
                  是<input name="is_file" type="radio" value="1" {$dataInfo['is_file']?'checked':''} onclick="javascript:con_file_value(this.value)" />
                  否<input name="is_file" type="radio" value="0" {$dataInfo['is_file']?'':'checked'} onclick="javascript:con_file_value(this.value)"  />
                  </td>
                </tr>
                <tr class="file_value" {$dataInfo['is_file']?'':'style="display:none;"'}>
                  <td height="36">附件数组：</td>
                  <td>
                  <input name="file_value" type="text" id="file_value" size="50" value="{$dataInfo.file_value}"  />
                  <font color="#FF0000">(附件上传配置数组)</font></td>
                </tr>

                <tr>
                    <td height="42"></td>
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
	objForm.addRule([{
		ele:"#title:eq(0)",
		datatype:"*",
		nullmsg:"请填写栏目名称",
	}]);

});
</script>
</body>
</html>
