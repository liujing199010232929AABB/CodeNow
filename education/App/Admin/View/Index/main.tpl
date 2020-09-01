<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__/highcharts" file="jquery" />
</head>
<body>
    <include file="Inc/head" />
    <div class="box">
        <div class="content" style="padding:10px 20px 0px 30px; margin:10px 0px 0px 15px;">
            <div class="menulist">
                <ul>
                    <foreach name="subNav" item="one" key="a" >
                        <in name="a" value="$group_keys">
                            <foreach  name="one.secNav" item="two" key="b">
                                <php>$k++;</php>
                                <in name="b" value="$group_keys">
                                    <li><a href="{:U($two['secLink'])}" target="main"><span>{$k}</span><p>{$two.secTitle}</p></a></li>
                                </in>
                            </foreach>
                        </in>
                    </foreach>
                </ul>
            </div>
        </div>
        <div class="content1">
            <div class="shuju f1">二维码生成</div>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="20">{$configArr.SiteUrl.title}:</td>
                    <td align="left">{$configArr.SiteUrl.val}</td>
                </tr>
                <tr>
                    <td height="36">二维码图片:</td>
                    <td align="left">
                        <empty name="configArr.SiteUrl.val">
                            配置信息里没有设置网址
                        <else />
                            <img src="{:U('Site/creatCode','domain='.$configArr['SiteUrl']['val'])}" width="193" height="193" />
                        </empty>
                    </td>
                </tr>
            </table>
        </div>

        <div class="content1">
            <div class="shuju f2">联系我们</div>
            <div class="contact">
                <img src="__IMG__/ercode.jpg" width="265px"/>
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
