<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<import type="js" basepath="__JS__" file="jquery,tipDialog" />
<import type="css" basepath="__CSS__" file="tipDialog" />
</head>
<body>
<a href="<?php echo($jumpUrl); ?>" id="href"></a>
<script>
	var href = document.getElementById('href').href;
</script>
    <?php if(isset($message)) {?>
        <script>
            $(function(){
                tipDialog('<?php echo $message ?>','ok','',1);//调用当前效果删除“parent”
                setTimeout(function(){
                    location.href=href;
                },1500);
            })    
        </script>
    <?php }else{ ?>
        <script>
            $(function(){
                tipDialog('<?php echo $error ?>','error','',1);//调用当前效果删除“parent”
                setTimeout(function(){
                    location.href=href;
                },1500);
            })    
        </script>
    <?php } ?>
 </body>
 </html>
