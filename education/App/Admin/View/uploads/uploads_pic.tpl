<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body style="background-color:transparent; padding-top:5px;">

<form action="{:U('Upload/upOne?fileUrl='.$fileUrl.'&fileType='.$fileType.'')}" enctype="multipart/form-data" method="post">
    <input type="hidden" name="fileUrl" value="{$fileUrl}" />
    <input type="hidden" name="fileType"  value="{$fileType}" />
    <span id="uploadImg">
        <input type="file" id="file" name="file" onchange="fileName.innerHTML=file.value" size="1" multiple="multiple" >
        <a href="#">上传图片</a>
    </span>
    <input type="submit" value="提交" id="submit" ><span id="fileName">&nbsp;</span>
</form>
<?php exit; ?>
</body>
</html>