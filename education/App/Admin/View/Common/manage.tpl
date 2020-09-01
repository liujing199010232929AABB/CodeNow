<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <import type="css" basepath="__CSS__" file="admin,humane.boldlight" />
    <import type="js" basepath="__JS__" file="jquery,AjaxFileUpload,humane,imgpre,ueditor/ueditor#config,ueditor/ueditor#all#min" />
</head>
<body>
    <include file="Inc/head" />
    <div class="position">
        单页管理-{$dataInfo.title}
    </div>
    <div class="wid1000 m10">
    <form class="editForm" id="editForm" name="editForm" action="{:U('Common/save')}" method="post">
        <input type="hidden" name="id" value="{$dataInfo.id}" />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <if condition="$dataInfo.introduce_used gt 0">
                <tr>
                    <td width="112" height="36">简介：</td>
                    <td width="1047">
                        <textarea class="textarea1" name="introduce" id="introduce">{$dataInfo.introduce}</textarea>
                    </td>
                </tr>
            </if>

            <if condition="$dataInfo.editor_used gt 0">
                <tr>
                  <td width="112" height="36">内容：</td>
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
                  </td>
                </tr>
             </if>

             <if condition="$dataInfo.pic_used gt 0">
                <tr>
                  <td width="112" height="36">国家图标：</td>
                  <td>
                  <input type="hidden" name="pic_path" id="common_path" size="50" value="{$dataInfo.pic_path}" />
                  <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type=common&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
                  </td>
                </tr>
                <tr>
                  <td width="112" height="36">banner图：</td>
                  <td>
                  <input type="hidden" name="pic_paths" id="commons_path" size="50" value="{$dataInfo.pic_paths}" />
                  <script type="text/javascript" src="__JS__/AjaxFileUpload.js.php?type=commons&UpFile={:urlencode('__UPLOAD__')}&tourl={:urlencode(U('Upload/upOne'))}&url=__ROOT__"></script>
                  </td>
                </tr>
             </if>

            <if condition="$dataInfo.is_seo gt 0">
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
                <td width="112" height="42"></td>
              <td><input type="submit" class="linkcommon" value="保存" /></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
