<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,admin" />
</head>

<body>
<include file="Inc/head" />
<div class="mainarea">
	<div class="menutop">
		<p>综合设定</p>
	</div>
	<div style="padding-top:5px;width:100%;">
			<div class="menulist">
				<ul>
					<li><a href="{:U('Build/langShow')}"><span>①</span><p>语言版本</p></a></li>
					<li><a href="{:U('ShopConfig/index')}"><span>②</span><p>购物管理</p></a></li>
					<li><a href="{:U('AtmConfig/index')}"><span>③</span><p>广告管理</p></a></li>
                    <li><a href="{:U('Build/sendShow')}"><span>④</span><p>邮件内容</p></a></li>
					<div class="clear"></div>
				</ul>
			</div>
		<div class="clear"></div>
	</div>
	<div class="menutop">
		<p>开关设定</p>
	</div>
	<div style="padding-top:5px;width:100%;">
			<div class="menulist">
				<ul>
					<li><a href="{:U('Build/changePower?field=language&val='.$langLock)}"><span>①</span><p>多语言（{$powerArray[$langLock]}）</p></a></li>
					<li><a href="{:U('Build/changePower?field=mobile&val='.$mobilePower)}"><span>②</span><p>手机站（{$powerArray[$mobilePower]}）</p></a></li>
					<div class="clear"></div>
				</ul>
			</div>
		<div class="clear"></div>
	</div>
</div>


</body>
</html>
