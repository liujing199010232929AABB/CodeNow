<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
session_start();//启动session
include("conn/conn.php");//包含数据库连接文件
if(isset($_SESSION['username'])){//如果用户已登录
	$sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");//执行查询操作
	$info=mysqli_fetch_array($sql);//将查询结果返回到数组中
	if($info!=false){//如果查询结果不为假
		$id=$info['id'];//获取登录用户id
		$truename=$info['truename'];//获取登录用户的真实姓名
		$pwd=$info['pwd1'];//获取登录用户的密码
		$tel=$info['tel'];//获取登录用户电话
		$email=$info['email'];//获取登录用户email地址
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr"
      class="com_content view-featured itemid-593 j35 mm-hover no-touch" slick-uniqueid="3">
<head>
    <meta http-equiv="content-type" content="text/html; charset=gbk">
    <title>修改信息-神奇布克</title>
    <link rel="stylesheet" href="css/t3-01.css" type="text/css">
    <link rel="stylesheet" href="css/t3-02.css" type="text/css">
    <link rel="stylesheet" href="css/t3-03.css" type="text/css">
    <link rel="stylesheet" href="css/t3-04.css" type="text/css">
    <script src="js/jsArr01.js" type="text/javascript"></script>
    <script src="js/module.js" type="text/javascript"></script>
    <script src="js/jsArr02.js" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(window).on('load', function () {
            new JCaption('img.caption');
        });
        if (typeof acymailing == 'undefined') {
            var acymailing = Array();
        }
        acymailing['NAMECAPTION'] = 'Name';
        acymailing['NAME_MISSING'] = 'Please enter your name';
        acymailing['EMAILCAPTION'] = 'E-mail';
        acymailing['VALID_EMAIL'] = 'Please enter a valid e-mail address';
        acymailing['ACCEPT_TERMS'] = 'Please check the Terms and Conditions';
        acymailing['CAPTCHA_MISSING'] = 'The captcha is invalid, please try again';
        acymailing['NO_LIST_SELECTED'] = 'Please select the lists you want to subscribe to';

        jQuery(function ($) {
            $('.hasTip').each(function () {
                var title = $(this).attr('title');
                if (title) {
                    var parts = title.split('::', 2);
                    var mtelement = document.id(this);
                    mtelement.store('tip:title', parts[0]);
                    mtelement.store('tip:text', parts[1]);
                }
            });
            var JTooltips = new Tips($('.hasTip').get(), {"maxTitleChars": 50, "fixed": false});
        });
        jQuery(document).ready(function () {
            jQuery('.hasTooltip').tooltip({"html": true, "container": "body"});
        });
    </script>


    <!-- META FOR IOS & HANDHELD -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style type="text/stylesheet">
        @-webkit-viewport {
            width: device-width;
        }
        @-moz-viewport {
            width: device-width;
        }
        @-ms-viewport {
            width: device-width;
        }

        @-o-viewport {
            width: device-width;
        }

        @viewport {
            width: device-width;
        }
    </style>
    <script type="text/javascript">
        //<![CDATA[
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement("style");
            msViewportStyle.appendChild(
                    document.createTextNode("@-ms-viewport{width:auto!important}")
            );
            document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
        }
        //]]>
    </script>
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="YES">
    <!-- //META FOR IOS & HANDHELD -->

    <!-- Le HTML5 shim and media query for IE8 support -->
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->

    <link href="css/tab.css" type="text/css"
          rel="stylesheet">
    <link href="css/style.css"
          type="text/css" rel="stylesheet">
    <script src="js/tab.js"
            type="text/javascript"></script>

    <link href="css/index01.css" type="text/css">
    <link href="css/index02.css" type="text/css">
    <style>
        .com_users .page-header {
            border-color: #eeeeee
        }

        .com_users .login-wrap {
            margin-bottom: 60px
        }

        .com_users .login-wrap .login {
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #eeeeee
        }

        .com_users .login-wrap .login fieldset {
            padding-top: 20px
        }

        .com_users .login-wrap .page-header {
            padding: 20px
        }

        .com_users .login-wrap .page-header h1 {
            font-size: 15px;
            text-transform: none;
            color: #f0141e
        }

        .com_users .login-description {
            padding: 0 20px;
            margin-bottom: 20px
        }

        .com_users .other-links {
            padding: 20px;
            margin: 0;
            border-top: 1px solid #eeeeee
        }

        .com_users .other-links ul {
            margin: 0;
            padding: 0
        }

        .com_users .other-links ul li {
            list-style: none
        }

    </style>

    <style type="text/css">.t3-megamenu.animate .animating > .mega-dropdown-menu, .t3-megamenu.animate.slide .animating > .mega-dropdown-menu > div {
        transition-duration: 400ms !important;
        -webkit-transition-duration: 400ms !important;
    }</style>

</head>

<body>
<!-- Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->
<div class="t3-wrapper">
<!-- // Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->
<div id="toolbar">
    <div class="container">
        <div class="row">
            <div class="toolbar-ct col-xs-12 col-md-6  hidden-sm hidden-xs">
                <div class="toolbar-ct-1">
                    <div class="t3-module module " id="Mod87">
                        <div class="module-inner">
                            <div class="module-ct">

                                <div class="custom">
                                    <p><i class="fa fa-phone"></i> <span>电话：400-675-1066</span></p></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="toolbar-ct toolbar-ct-right col-xs-12 col-md-6">
                <div class="toolbar-ct-3 ">
                    <div class="btn-group active">
                        <button onclick='javascript:window.location.href="login.php";' style="padding-right: 10px" type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown"
                                aria-expanded="false">
                            登录
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- HEADER -->
<header id="t3-header" class="wrap t3-header">
    <div class="container">
        <div class="row">
            <!--LOGO-->
            <div class="col-xs-12 col-md-3 logo col-sm-6">
                <div class="logo-image">
                    <a href="index.php" title="JoomlArt Demo Site">
                        <img class="logo-img" src="images/logo.png" alt="神奇布克">
                    </a>
                    <small class="site-slogan hidden-xs"></small>
                </div>
            </div>
            <!-- //LOGO -->

            <nav id="t3-mainnav" class="col-xs-12 col-md-6 t3-mainnav navbar navbar-default">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                </div>
				<?php
					include("common-navi.php");//包含导航页面
				?>
            </nav>
            
        </div>
    </div>
</header>
<!-- //HEADER -->

<div id="t3-mainbody" class="container t3-mainbody">
    <div class="row">
        <!-- MAIN CONTENT -->
        <div id="t3-content" class="t3-content col-xs-12">
            <div id="system-message-container" style="display: none;">
            </div>

            <div class="registration col-sm-6 col-sm-offset-3">

                <form id="member-registration" action="modifyMember_deal.php"  onsubmit="return regis();"
                      method="post" class="form-validate form-horizontal">
                    <fieldset>
                        <legend style="color:#0885B1;font-size: 31px">修改用户信息</legend>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <div class="control-label">
                                <label id="jform_name-lbl" for="jform_name" class="hasTooltip required" title=""
                                       data-original-title="请输入你的账户名">
                                    账户</label>
                            </div>
                            <input type="text" name="username" id="username" value="<?php echo $_SESSION['username'];?>" class="required" size="30"
                                    aria-required="true">
                        </div>
                        
                        <div class="form-group">
                            <div class="control-label">
                                <label id="jform_password1-lbl" for="jform_password1" class="hasTooltip required"
                                       title=""
                                       data-original-title="请输入你的密码">
                                    原密码<span class="star">&nbsp;*</span></label>
                            </div>
                            <input type="password" name="pwd" id="pwd" value=""
                                   autocomplete="off" class="validate-password required" size="30" maxlength="99"
                                   required="required" aria-required="true">
                        </div>
                        <div class="form-group">
                            <div class="control-label">
                                <label id="jform_username-lbl" for="jform_username" class="hasTooltip required" title=""
                                       data-original-title="请输入你的真实姓名">
                                    真实姓名</label>
                            </div>
                            <input type="text" name="truename" id="jform_username" value="<?php echo $truename;?>"
                                   class="validate-username required" size="30" 
                                   aria-required="true">
                        </div>
                        <div class="form-group">
                            <div class="control-label">
                                <label id="jform_password2-lbl" for="jform_password2" class="hasTooltip required"
                                       title=""
                                       data-original-title="请输入你的新密码">
                                    新密码</label>
                            </div>
                            <input type="password" name="newPwd" id="newPwd" value=""
                                   autocomplete="off" class="validate-password required" size="30" maxlength="99"
                                    aria-required="true">
                        </div>
                        <div class="form-group">
                            <div class="control-label">
                                <label id="jform_email1-lbl" for="jform_email1" class="hasTooltip required" title=""
                                       data-original-title="请输入你的联系电话">
                                    联系电话</label>
                            </div>
                            <input type="text" name="tel" class="validate-email " id="tel"
                                   value="<?php echo $tel;?>" size="30" autocomplete="email"  aria-required="true">
                        </div>
                        <div class="form-group">
                            <div class="control-label">
                                <label id="jform_email2-lbl" for="jform_email2" class="hasTooltip required" title=""
                                       data-original-title="请再一次输入你的密码">
                                    确认新密码</label>
                            </div>
                            <input type="password" name="newPwd2" id="newPwd2"  class="validate-email" id="jform_email2"
                                   value="" size="30"  aria-required="true">
                        </div>
                        <div class="form-group">
                            <div class="control-label">
                                <label id="jform_email2-lbl" for="jform_email2" class="hasTooltip required" title=""
                                       data-original-title="请输入你的邮箱">
                                    邮箱</label>
                            </div>
                            <input type="email" name="email" class="validate-email" id="jform_email2"
                                   value="<?php echo $email;?>" size="30"  aria-required="true">
                        </div>
                    </fieldset>
                    <input name="id" type="hidden" value="<?php echo $id;?>">
                    <div class="form-actions clearfix">
                        <button type="submit" class="btn btn-primary pull-left">提交</button>
                        <button type="button" onClick="javascript:history.go(-1)" class="btn btn-primary pull-left">取消</button>
                   </div>
                </form>
            </div>

        </div>
        <!-- //MAIN CONTENT -->

    </div>
</div>


<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">

    <section class="t3-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8 copyright ">
                    <small>
                        Copyright &nbsp;<a href="http://www.mingrisoft.com/" target="_blank">吉林省明日科技有限公司</a>
                    </small>
                    <small>
                        公司邮箱：mingrisoft@mingrisoft.com &nbsp;&nbsp;电话：400-675-1066
                    </small>
                    <small>
                        公司地址：吉林省长春市卫星广场财富领域5A15室
                    </small>
                </div>
            </div>
        </div>
    </section>

</footer>
</div>
</body>
<script src="js/jquery.1.3.2.js" type="text/javascript"></script>
<script>
	function regis(){
		
		if(/^[\u4e00-\u9fa5]+$/.test($('#username').val())){
			alert("账户不能输入汉字！");
			return false;
		  }
		
		if (isNaN($('#tel').val())) { 
	　　　　alert("联系电话请输入数字"); 
	　　　　return false;
　　		} 
		
		
		var pwd=document.getElementById("newPwd").value;
		var pwd2=document.getElementById("newPwd2").value;
		if(pwd!==pwd2){
			alert('修改后密码前后不一致！');
			return false;
		}
		return true;
	}
</script>
</html>
<?php
mysqli_close($conn);//关闭数据库连接
}else{
	echo "<script>alert('请先登录，再修改个人信息!');window.location.href='index.php';</script>";//弹出提示信息
}
?>