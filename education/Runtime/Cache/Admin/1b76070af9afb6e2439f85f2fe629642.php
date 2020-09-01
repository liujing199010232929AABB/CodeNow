<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/highcharts/jquery.js"></script>
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
    <div class="box">
        <div class="content" style="padding:10px 20px 0px 30px; margin:10px 0px 0px 15px;">
            <div class="menulist">
                <ul>
                    <?php if(is_array($subNav) && !empty($subNav) ): foreach($subNav as $a=>$one): if(in_array(($a), is_array($group_keys)?$group_keys:explode(',',$group_keys))): if(is_array($one["secNav"]) && !empty($one["secNav"]) ): foreach($one["secNav"] as $b=>$two): $k++; ?>
                                <?php if(in_array(($b), is_array($group_keys)?$group_keys:explode(',',$group_keys))): ?><li><a href="<?php echo U($two['secLink']);?>" target="main"><span><?php echo ($k); ?></span><p><?php echo ($two["secTitle"]); ?></p></a></li><?php endif; endforeach; else: endif; endif; endforeach; else: endif; ?>
                </ul>
            </div>
        </div>
        <div class="content1">
            <div class="shuju f1">二维码生成</div>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="20"><?php echo ($configArr["SiteUrl"]["title"]); ?>:</td>
                    <td align="left"><?php echo ($configArr["SiteUrl"]["val"]); ?></td>
                </tr>
                <tr>
                    <td height="36">二维码图片:</td>
                    <td align="left">
                        <?php if(empty($configArr["SiteUrl"]["val"])): ?>配置信息里没有设置网址
                        <?php else: ?>
                            <img src="<?php echo U('Site/creatCode','domain='.$configArr['SiteUrl']['val']);?>" width="193" height="193" /><?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="content1">
            <div class="shuju f2">联系我们</div>
            <div class="contact">
                <img src="/education/App/Admin/Public/images/ercode.jpg" width="265px"/>
                <p>tel：0431-81309315<br />
                    公司邮箱：mingrisoft@mingrisoft.com
                </p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        //当浏览器窗口的大小发生变化时，设置右侧二维码相应变动
        $(window).resize(function () {gwgoW()});
        function gwgoW(){
            $(".content").css("width",$(document).width()-$(".content1").width()-150);
        }
        gwgoW();
    </script>
</body>
</html>