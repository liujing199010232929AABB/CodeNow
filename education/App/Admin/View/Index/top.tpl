<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery" />
</head>

<body>
<div class="top">
	<span class="topname">MrSoft</span>
	<a class="shrink" href="javascript:void(0);"  title="收起/展开" onclick="appoenWindow()"></a>
		<a href="javascript:void(0);" onclick="javascript:top.window.main.location.reload();" title="刷新页面" class="top_refresh"></a>
		<a  href="{:U('Index/addMain')}" target="main" title="后台首页" class="home"></a>
	<script>
		var myscreen = false , width = 221 , movemar;
		//展开收起
		function appoenWindow() {
			if ( myscreen ) {
				movemar = setInterval( function() {
					width += 7;
					window.parent.document.getElementById("midContent").cols = width + ",*";
					if ( width >= 221 ) {
						clearInterval(movemar);
						width = 221;
						window.parent.document.getElementById("midContent").cols = "221,*";
						myscreen = false;
					}
				} , 1 );
			}
			else {
				movemar = setInterval( function() {
					width -= 7;
					window.parent.document.getElementById("midContent").cols = width + ",*";
					if ( width <= 0 ) {
						clearInterval(movemar);
						width = 0;
						window.parent.document.getElementById("midContent").cols = "0,*";
						myscreen = true;
					}
				} , 1 );
			}
		}
	</script>
	<a href="{:U('Login/userLogout')}" class="logout" target="_top"></a>
	<ul class="topnavi">
    	
		<li><a href="__ROOT__/" target="_blank" >网站首页</a></li>
        <li><a href="{:U('Build/clearCache')}" target="main" onclick="if(confirm('确认要清除缓存，而且清理后不能还原？')){return ;}else{ return false;}" >清理缓存</a></li>
        <li><a href="{:U('Build/clearLogs')}" target="main" onclick="if(confirm('确认要清理日志，而且清理后不能还原？')){return ;}else{ return false;}" >清理日志</a></li>
		<li><a href="{:U('User/password')}" target="main">修改密码</a></li>
        <if condition="$adminLock eq 1 && $m_id eq 1">
		<li><a href="{:U('Build/index')}" target="main" >开发平台</a></li>
        </if>
		<div class="clear"></div>
	</ul>
    <script language="javascript">
    	$(function(){
			$(".topnavi>li>a").click(function(){
				$(".topnavi>li>a").removeClass('navion');
				$(this).addClass('navion');
			});
		});
    </script>
	<div class="clear"></div>
</div>
</body>
</html>
