<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<import type="js" basepath="__JS__" file="jquery#min" />
	<title>留学专业_美国_长春留学中介 美国留学 英国留学 澳加留学申请 欧洲留学 日韩留学 </title>
	<link rel="stylesheet" type="text/css" href="/Education/Public/css/master.css" />
	<script type="text/javascript" src="__PUBLIC__/js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.tab.js"></script>
	<!--[if IE 6]>
		<import type="js" basepath="__JS__" file="DD_belatedPNG" />
	<![endif]-->
</head>
	<body>
<div class="logo_box" ></div>
<div class="nav_wrapper_box">
	<ul class="main_nav_box">
		<li>
			<a target="_blank" class="n_home main_nav_l" href="{:U('index/index')}">首页</a>
		</li>
		<volist name="navigation" id="vo">
			<li>
				<!--获取留学国家名称-->
				<a target="_blank" class="main_nav_l" href="javascript:;">{$vo.cate_name}</a>
				<div class="sub_nav_box">
					<ul class="sub_nav_list">
						<li>
							<!-- 遍历单页标题 -->
							<foreach name="vo.common" item="common">
								<p><a target="_blank" href="{:U('Country/common_view',array('cate_id'=>$vo['cate_id'],'id'=>$common['id']))}">
										{$common.title}
									</a>
								</p>
							</foreach>
						</li>
						<li>
							<!-- 遍历列表页标题 -->
							<foreach name="vo.news" item="news">
								<switch name="news.type">
									<case value="1">	<!-- 新闻资讯 -->
										<p><a target="_blank" href="{:U('Country/news_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']))}">{$news.title}</a></p>
									</case>
									<case value="2">	<!-- 留学专业 -->
										<p><a target="_blank" href="{:U('Country/class_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']))}">{$news.title}</a></p>
									</case>
									<case value="3">	<!-- 留学方案 -->
										<p><a target="_blank" href="{:U('Country/plan_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']))}">{$news.title}</a></p>
									</case>
									<case value="4">	<!-- 留学院校 -->
										<p><a target="_blank" href="{:U('Country/college_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']))}">{$news.title}</a></p>
									</case>
									<case value="5">	<!-- 新闻中心 -->
										<p><a target="_blank" href="{:U('Country/case_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']))}">{$news.title}</a></p>
									</case>
									<default />			<!-- 普通新闻 -->
									<p><a target="_blank" href="{:U('Country/news_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']))}">{$news.title}</a></p>
								</switch>
							</foreach>
						</li>
					</ul>
					<div class="sub_right_img_box">
						<img src="{$vo.pic_path|get_pic_url}" alt="{$vo.cate_name}"/>	<!-- 获取图片 -->
					</div>
				</div>
			</li>
		</volist>
		<!-- 新闻中心 -->
		<li>
			<a target="_blank" class="main_nav_l" href="javascript:;">新闻中心</a>
			<ul class="sub_nav_box s_s_02">
			  <foreach name="newsLists" item="item" empty="暂无分类">
				<li><a target="_blank" href="{:U('News/index_list',array('cid'=>$item['id']))}">
					{$item.class_name|FSubstr=6}
					</a>
				</li>
			  </foreach>
			</ul>
		</li>
		<!-- 关于我们 -->
		<li>
			<a target="_blank" class="main_nav_l" href="{:U('about/index')}">关于我们</a>
			<ul class="sub_nav_box s_s_02">
				<li><a target="_blank" href="{:U('about/index?id=1')}">公司简介</a></li>
				<li><a target="_blank" href="{:U('about/index?id=2')}">公司优势</a></li>
				<li><a target="_blank" href="{:U('about/consultant')}">顾问风采</a></li>
				<li><a target="_blank" href="{:U('about/index?id=3')}">联系我们</a></li>
			</ul>
		</li>
	</ul>
	<!--导航栏效果-->
	<script type="text/javascript">
		$(".sub_nav_list li:last-child").css("border-right", "none");
		$(".main_nav_box li").hover(function(){
			var _this = $(this);
			_this.find(".sub_nav_box").stop(true,true).slideDown();
		}, function(){
			var _this = $(this);
			_this.find(".sub_nav_box").hide();
		})
	</script>
</div>