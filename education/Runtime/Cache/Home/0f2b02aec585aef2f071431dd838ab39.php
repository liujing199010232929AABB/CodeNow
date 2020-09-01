<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<script type="text/javascript" src="/Education/Public/js/jquery.min.js"></script>
	<title>留学专业_美国_长春留学中介 美国留学 英国留学 澳加留学申请 欧洲留学 日韩留学 </title>
	<link rel="stylesheet" type="text/css" href="/Education/Public/css/master.css" />
	<script type="text/javascript" src="/Education/Public/js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="/Education/Public/js/jquery.tab.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="/Education/Public/js/DD_belatedPNG.js"></script>
	<![endif]-->
</head>
	<body>
<div class="logo_box" ></div>
<div class="nav_wrapper_box">
	<ul class="main_nav_box">
		<li>
			<a target="_blank" class="n_home main_nav_l" href="<?php echo U('index/index');?>">首页</a>
		</li>
		<?php if(is_array($navigation)): $i = 0; $__LIST__ = $navigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
				<!--获取留学国家名称-->
				<a target="_blank" class="main_nav_l" href="javascript:;"><?php echo ($vo["cate_name"]); ?></a>
				<div class="sub_nav_box">
					<ul class="sub_nav_list">
						<li>
							<!-- 遍历单页标题 -->
							<?php if(is_array($vo["common"]) && !empty($vo["common"]) ): foreach($vo["common"] as $key=>$common): ?><p><a target="_blank" href="<?php echo U('Country/common_view',array('cate_id'=>$vo['cate_id'],'id'=>$common['id']));?>">
										<?php echo ($common["title"]); ?>
									</a>
								</p><?php endforeach; else: endif; ?>
						</li>
						<li>
							<!-- 遍历列表页标题 -->
							<?php if(is_array($vo["news"]) && !empty($vo["news"]) ): foreach($vo["news"] as $key=>$news): switch($news["type"]): case "1": ?><!-- 新闻资讯 -->
										<p><a target="_blank" href="<?php echo U('Country/news_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']));?>"><?php echo ($news["title"]); ?></a></p><?php break;?>
									<?php case "2": ?><!-- 留学专业 -->
										<p><a target="_blank" href="<?php echo U('Country/class_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']));?>"><?php echo ($news["title"]); ?></a></p><?php break;?>
									<?php case "3": ?><!-- 留学方案 -->
										<p><a target="_blank" href="<?php echo U('Country/plan_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']));?>"><?php echo ($news["title"]); ?></a></p><?php break;?>
									<?php case "4": ?><!-- 留学院校 -->
										<p><a target="_blank" href="<?php echo U('Country/college_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']));?>"><?php echo ($news["title"]); ?></a></p><?php break;?>
									<?php case "5": ?><!-- 新闻中心 -->
										<p><a target="_blank" href="<?php echo U('Country/case_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']));?>"><?php echo ($news["title"]); ?></a></p><?php break;?>
									<?php default: ?>			<!-- 普通新闻 -->
									<p><a target="_blank" href="<?php echo U('Country/news_list',array('cate_id'=>$vo['cate_id'],'rid'=>$news['id']));?>"><?php echo ($news["title"]); ?></a></p><?php endswitch; endforeach; else: endif; ?>
						</li>
					</ul>
					<div class="sub_right_img_box">
						<img src="<?php echo (get_pic_url($vo["pic_path"])); ?>" alt="<?php echo ($vo["cate_name"]); ?>"/>	<!-- 获取图片 -->
					</div>
				</div>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<!-- 新闻中心 -->
		<li>
			<a target="_blank" class="main_nav_l" href="javascript:;">新闻中心</a>
			<ul class="sub_nav_box s_s_02">
			  <?php if(is_array($newsLists) && !empty($newsLists) ): foreach($newsLists as $key=>$item): ?><li><a target="_blank" href="<?php echo U('News/index_list',array('cid'=>$item['id']));?>">
					<?php echo (fsubstr($item["class_name"],6)); ?>
					</a>
				</li><?php endforeach; else: echo "<center class=\"nolist\">暂无分类</center>"; endif; ?>
			</ul>
		</li>
		<!-- 关于我们 -->
		<li>
			<a target="_blank" class="main_nav_l" href="<?php echo U('about/index');?>">关于我们</a>
			<ul class="sub_nav_box s_s_02">
				<li><a target="_blank" href="<?php echo U('about/index?id=1');?>">公司简介</a></li>
				<li><a target="_blank" href="<?php echo U('about/index?id=2');?>">公司优势</a></li>
				<li><a target="_blank" href="<?php echo U('about/consultant');?>">顾问风采</a></li>
				<li><a target="_blank" href="<?php echo U('about/index?id=3');?>">联系我们</a></li>
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
	<div class="site_i_t_wrapper">
		<div class="w1002_wrapper">
			<p class="t_f_title_text">新闻中心</p>
			<p class="t_f_crumbs">当前位置：
				<a target="_blank" href="<?php echo U('index/index');?>" title="网站首页">网站首页</a> &gt;
				<a target="_blank" href="javascript:;" title="新闻中心">新闻中心</a> &gt;
				<?php echo ($classname); ?>
			</p>
		</div>
	</div>
	<div class="news_i_title">
		<p><?php echo ($classname); ?></p>
	</div>
	<div class="s_i_d_box">
		<ul class="in_case_list news_list">
		  <?php if(is_array($datalist) && !empty($datalist) ): foreach($datalist as $key=>$item): ?><li>
				<p class="i_c_l_date"><?php echo (date('Y-m-d',$item["addtime"])); ?></p>
				<h4><a target="_blank" href="<?php echo ($item["url"]); ?>" title="<?php echo ($item["title"]); ?>"><?php echo (fsubstr($item["title"],45)); ?></a></h4>
				<p class="i_c_l_intro">★<?php echo (fsubstr($item["introduce"],62)); ?></p>
				<div class="b_date">
					<p><?php echo (date('d',$item["addtime"])); ?></p>
					<span><?php echo (date('Y-m',$item["addtime"])); ?></span>
				</div>
			</li><?php endforeach; else: echo "<center class=\"nolist\">此栏目暂无信息</center>"; endif; ?>
		</ul>
	   <?php if($page != ''): ?><div class="pages">
			<span class="pageMoreTop">
			<ul>
			  <?php echo ($page); ?>
			</ul>
			</span>
		</div>
		<div class="clear"></div>
		<script>
			var w = $('.pages').width();
			var s = $('.in_case_list').width();
			$('.pages').css({'padding-left':(s-w)/2+'px'});
		</script><?php endif; ?>
	</div>
	<div class="foot_wrapper">
			<div class="foot_box">
				<div class="fl">
					<a target="_blank" href="<?php echo U('index/index');?>" title="<?php echo ($webConfig["site_name"]["val"]); ?>"><img class="f_logo" src="/Education/Public/images/f_logo_img_23.png" alt="<?php echo ($webConfig["site_name"]["val"]); ?>"/></a>
					<ul class="foot_f_list" style="margin: 26px 0px 0px 54px;">
						<?php if(is_array($navigation) && !empty($navigation) ): foreach($navigation as $key=>$vo): ?><li>
								<a target="_blank" href="javascript:;">
									<img width="48px" height="35px" src="<?php echo (get_pic_url($vo["pic_path"])); ?>" alt="美国留学"/>
									<p><?php echo ($vo["cate_name"]); ?></p>
								</a>
							</li><?php endforeach; else: endif; ?>
					</ul>
				</div>
				<div class="f_adress_box">
					<div class="f_a_text_box">
						<p>咨询热线：（08:00-24:00）</p>
						<p class="f_t_tel"><?php echo ($webConfig["SiteTel"]["val"]); ?></p>
						<p class="f_t_adress"><?php echo ($webConfig["SiteAddr"]["val"]); ?></p>
						<p>邮编：<?php echo ($webConfig["SitePostcard"]["val"]); ?>　ICP备：<a target="_blank" href="http://www.miitbeian.gov.cn" target="_blank" title="<?php echo ($webConfig["IcpCode"]["val"]); ?>"><?php echo ($webConfig["IcpCode"]["val"]); ?></a></p>
						<p><?php echo ($webConfig["Copyright"]["val"]); ?>版权所有</p>
					</div>
				</div>
			</div>
		</div>
		<div class="float_r_box">
			<div class="float_r_l_box">
				<div class="f_r_item_box">
					<a target="_blank" class="f_go_top" href="javascript:" onClick="getPos(0)"></a>
				</div>
				<div class="f_r_item_box" id="f_menu">
					<a target="_blank" class="f_menu" href="javascript:"></a>
					<ul class="f_sub_menu_list">
						<li><a target="_blank" href="<?php echo U('index/index');?>" title="网站首页">网站首页</a></li>
						<li><a target="_blank" href="<?php echo U('news/index');?>" title="新闻中心">新闻中心</a></li>
						<li style="border-bottom: 1px solid #DEDEDE;"><a target="_blank" href="<?php echo U('about/index');?>" title="关于我们">关于我们</a></li>
					</ul>
				</div>
                <?php if(is_array($codeList) && !empty($codeList) ): foreach($codeList as $key=>$item): ?><div class="f_r_item_box">
                        <a target="_blank" class="f_ewm" href="javascript:" title="<?php echo ($item["title"]); ?>"></a>
                        <img class="ewm_img" src="<?php echo ($item["pic"]); ?>" alt="<?php echo ($item["title"]); ?>"/>
                    </div><?php endforeach; else: endif; ?>
			</div>
		</div>
		<div class="float_l_qq_box">
			<div class="f_qq_item">
				<a href="tencent://message/?uin=213213322&Site=<?php echo $_SERVER['HTTP_HOST']; ?>&Menu=yes" title="美加咨询">
					<img src="/Education/Public/images/qq_ico_03.png" alt="美加咨询"/>美加咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<?php echo $_SERVER['HTTP_HOST']; ?>&Menu=yes" title="美加咨询">
					<img src="/Education/Public/images/qq_ico_03.png" alt="美加咨询"/>美加咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<?php echo $_SERVER['HTTP_HOST']; ?>&Menu=yes" title="英港澳新咨询">
					<img src="/Education/Public/images/qq_ico_03.png" alt="英港澳新咨询"/>英港澳新咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<?php echo $_SERVER['HTTP_HOST']; ?>&Menu=yes" title="欧洲咨询">
					<img src="/Education/Public/images/qq_ico_03.png" alt="欧洲咨询"/>欧洲咨询
				</a>
			</div>
		</div>
		<script type="text/javascript">
			var h = $(".float_r_box").height();
			var q_h = $(".float_l_qq_box").height();
			$(".float_r_box").css("margin-top",-(h/2));
			$(".float_l_qq_box").css("margin-top",-(q_h/2));
			$("#f_menu").hover(function(){
				$(this).find(".f_sub_menu_list").stop(true,true).fadeIn();
			},function(){
				$(this).find(".f_sub_menu_list").stop(true,true).fadeOut();
			});
			$("#sg_h").hover(function(){
				$("#sg").stop(true,true).fadeIn();
			},function(){
				$("#sg").stop(true,true).fadeOut();
			});
			$(".f_ewm").hover(function(){
				$(this).next("img.ewm_img").stop(true,true).fadeIn();
			},function(){
				$(this).next("img.ewm_img").stop(true,true).fadeOut();
			});

			function getPos(pos) {
				$("html, body").stop().animate({
					scrollTop: pos
				}, 700);
			};
		</script>
	</body>
</html>