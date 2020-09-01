<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<script type="text/javascript" src="/education/Public/js/jquery.min.js"></script>
	<title>留学专业_美国_长春留学中介 美国留学 英国留学 澳加留学申请 欧洲留学 日韩留学 </title>
	<link rel="stylesheet" type="text/css" href="/Education/Public/css/master.css" />
	<script type="text/javascript" src="/education/Public/js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="/education/Public/js/jquery.tab.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="/education/Public/js/DD_belatedPNG.js"></script>
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
		<script type="text/javascript">
            $(document).ready(function(){
                $('.t_banner_01_list').bxSlider({
                    pagerCustom: '.bp1',
                    controls: false,
                    autoHover: true,
                    auto: true
                });
                $('.t_banner_02_list').bxSlider({
                    pagerCustom: '.bp2',
                    speed: 1000,
                    nextSelector: '.b_next',
                    prevSelector: '.b_prve',
                    autoHover: true,
                    auto: true
                });
                $('.t_banner_03_list').bxSlider({
                    pagerCustom: '.bp3',
                    controls: false,
                    autoHover: true,
                    auto: true
                });
                $("#nt01, #nt02, #nt03, #nt04").jqtab({
                    active: 'hover'
                });
            });
			
		   function check(){
	            var keyword = document.getElementById('keyword').value;
		        if(keyword==''){ document.getElementById('keyword').focus();return false; }
	       }
        </script>
		<div class="banner_box">
			<div class="t_banner_01">
				<!-- 小幻灯片 -->
				<ul class="t_banner_01_list">
					<?php if(is_array($small_slide) && !empty($small_slide) ): foreach($small_slide as $key=>$small): ?><li>
							<?php if(small.weburl): ?><a target="_blank" href="<?php echo ($small["weburl"]); ?>" title="<?php echo ($small["title"]); ?>">
									<img src="/education/Upload/<?php echo ($small["pic_path"]); ?>" alt="<?php echo ($small["title"]); ?>" width="286" height="292"/>
								</a>
							<?php else: ?>
								<img src="/education/Upload/<?php echo ($small["pic_path"]); ?>" alt="<?php echo ($small["title"]); ?>" width="286" height="292"/><?php endif; ?>
						</li><?php endforeach; else: echo "<center class=\"nolist\">暂无信息</center>"; endif; ?>
				</ul>
				<div class="b_pager bp1">
                  <?php if(is_array($small_slide) && !empty($small_slide) ): foreach($small_slide as $key=>$item): ?><a target="_blank" class="pngFix" data-slide-index="<?php echo ($key); ?>" href="javacsript:" title="<?php echo ($item["title"]); ?>"></a><?php endforeach; else: endif; ?>
				</div>
			</div>
			<!-- 大幻灯片 -->
			<div class="t_banner_02">
				<div class="b_next"></div>
				<div class="b_prve"></div>
				<ul class="t_banner_02_list">
					<?php if(is_array($big_slide) && !empty($big_slide) ): foreach($big_slide as $key=>$item): ?><li>
							<?php if(small.weburl): ?><a target="_blank" href="<?php echo ($item["weburl"]); ?>" title="{<?php echo ($item["title"]); ?>}">
									<img src="/education/Upload/<?php echo ($item["pic_path"]); ?>" alt="{<?php echo ($item["title"]); ?>}" width="700" height="292"/>
								</a>
							<?php else: ?>
								<img src="/education/Upload/<?php echo ($item["pic_path"]); ?>" alt="{<?php echo ($item["title"]); ?>}" width="700" height="292"/><?php endif; ?>
						</li><?php endforeach; else: endif; ?>
				</ul>
				<div class="b_pager bp2">
					  <?php if(is_array($big_slide) && !empty($big_slide) ): foreach($big_slide as $key=>$item): ?><a target="_blank" class="pngFix" data-slide-index="<?php echo ($key); ?>" href="javacsript:" title="<?php echo ($item["title"]); ?>"></a><?php endforeach; else: endif; ?>
				</div>
			</div>
		</div>
		<div class="news_cont_01">
			<div class="n_c_l_01" id="nt01">
				<div class="n_c_l_title gm_tabs_head">
					<a target="_blank" href="<?php echo U('news/index_list?cid=1');?>" title="最新活动">最新活动</a>
					<a target="_blank" href="<?php echo U('news/index_list?cid=3');?>" title="留学专题">留学专题</a>
				</div>
				<div class="n_c_l_cont">
					<!--最新活动--->
					<div class="n_c_l_citem gm_tabs_content">
						<?php if(!empty($activities)): ?><div>
								<h3><a target="_blank" href="<?php echo (get_news_url($activities[0]['id'])); ?>" title="<?php echo ($activities[0]["title"]); ?>"><?php echo (fsubstr($activities[0]["title"],15)); ?></a></h3>
								<p><?php echo (fsubstr($activities[0]["introduce"],38)); ?></p>
							</div><?php endif; ?>
						<ul>
							<?php if(is_array($activities) && !empty($activities) ): foreach($activities as $key=>$item): if($key==0){continue;} ?>
								<li><a target="_blank" href="<?php echo (get_news_url($item["id"])); ?>" title="<?php echo ($item["title"]); ?>"><b>·</b> <?php echo (fsubstr($item["title"],16)); ?></a></li><?php endforeach; else: echo "<center class=\"nolist\">本栏目暂无信息</center>"; endif; ?>
						</ul>
					</div>
					<!-- 留学专题 -->
					<div class="n_c_l_citem gm_tabs_content">
						<?php if(!empty($study_info)): ?><div>
								<h3><a target="_blank" href="<?php echo (get_news_url($study_info[0]['id'])); ?>" title="<?php echo ($study_info[0]["title"]); ?>"><?php echo (fsubstr($study_info[0]["title"],15)); ?></a></h3>
								<p><?php echo (fsubstr($study_info[0]["introduce"],38)); ?></p>
							</div><?php endif; ?>
						<ul>
						  <?php if(is_array($study_info) && !empty($study_info) ): foreach($study_info as $key=>$item): if($key==0){continue;} ?>
						    <li><a target="_blank" href="<?php echo (get_news_url($item["id"])); ?>" title="<?php echo ($item["title"]); ?>"><b>·</b> <?php echo (fsubstr($item["title"],16)); ?></a></li><?php endforeach; else: echo "<center class=\"nolist\">本栏目暂无信息</center>"; endif; ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="n_c_l_02">
				<!-- 聚焦 -->
				<div class="n_c_l_02_item">
					<a target="_blank" class="n_c_more" href="<?php echo ($more_focus_url); ?>" title="more">more</a>
					<h3>
                      <a target="_blank" class="n_c_c_link_01" href="<?php echo ($more_focus_url); ?>" title="聚焦">聚焦</a>
                      <?php if(!empty($focus_info)): ?><a target="_blank" class="n_c_n_title" href="<?php echo (get_news_url($focus_info[0]['id'])); ?>" title="<?php echo ($focus_info[0]["title"]); ?>"><?php echo (fsubstr($focus_info[0]["title"],22)); ?></a><?php endif; ?>
                    </h3>
					<ul>
						<?php if(is_array($focus_info) && !empty($focus_info) ): foreach($focus_info as $key=>$item): if($key==0){continue;} ?>
						   <li><a target="_blank" href="<?php echo (get_news_url($item["id"])); ?>" title="<?php echo ($item["title"]); ?>"><?php echo (fsubstr($item["title"],16)); ?></a></li><?php endforeach; else: echo "<center class=\"nolist\">本栏目暂无信息</center>"; endif; ?>
					</ul>
				</div>

				<div class="n_c_l_02_item">
					<a target="_blank" class="n_c_more" href="<?php echo ($more_recommend_url); ?>" title="more">more</a>
					<h3>
                        <a target="_blank" class="n_c_c_link_02" href="<?php echo ($more_recommend_url); ?>" title="推荐">推荐</a>
						<?php if(!empty($recommend)): ?><a target="_blank" class="n_c_n_title" href="<?php echo (get_news_url($recommend[0]["id"])); ?>" title="<?php echo ($recommend[0]["title"]); ?>"><?php echo (fsubstr($recommend[0]["title"],22)); ?></a><?php endif; ?>
                    </h3>
					<ul>
						<?php if(is_array($recommend) && !empty($recommend) ): foreach($recommend as $key=>$item): if($key==0){continue;} ?>
						   <li><a target="_blank" href="<?php echo (get_news_url($item["id"])); ?>" title="<?php echo ($item["title"]); ?>"><?php echo (fsubstr($item["title"],16)); ?></a></li><?php endforeach; else: echo "<center class=\"nolist\">本栏目暂无信息</center>"; endif; ?>
					</ul>
				</div>

				<div class="n_c_l_02_item">
					<a target="_blank" class="n_c_more" href="<?php echo U('news/index_list?cid=6');?>" title="more">more</a>
					<h3>
                        <a target="_blank" class="n_c_c_link_03" href="<?php echo U('news/index_list?cid=6');?>" title="考试">考试</a>

						<?php if(!empty($exam)): ?><a target="_blank" class="n_c_n_title" href="<?php echo ($more_exam_url); ?>" title="<?php echo ($exam[0]["title"]); ?>"><?php echo (fsubstr($exam[0]["title"],22)); ?></a><?php endif; ?>
                    </h3>
					<ul>
						<?php if(is_array($exam) && !empty($exam) ): foreach($exam as $key=>$item): if($key==0){continue;} ?>
						   <li><a target="_blank" href="<?php echo (get_news_url($item["id"])); ?>" title="<?php echo ($item["title"]); ?>"><?php echo (fsubstr($item["title"],16)); ?></a></li><?php endforeach; else: echo "<center class=\"nolist\">本栏目暂无信息</center>"; endif; ?>
					</ul>
				</div>
			</div>

		</div>

        <!-- 顾问风采 -->
		<div class="team_cont_01">
			<p class="cont_title">顾问风采</p>
			<ul class="t_banner_03_list">
			  <?php if(is_array($consultant) && !empty($consultant) ): foreach($consultant as $key=>$item): if(($key%3)==0): ?><li><ul class="team_list"><?php endif; ?>
						<li>
							<div class="t_fl_img">
								<a target="_blank" href="<?php echo U('About/view',array('id'=>$item['id']));?>" title="<?php echo ($item["title"]); ?>">
									<img src="<?php echo (get_pic_url($item["pic_path"])); ?>" width="158" height="158"/>
								</a>
							</div>
							<h3><a target="_blank" href="<?php echo U('About/view',array('id'=>$item['id']));?>"><?php echo ($item["title"]); ?></a></h3>
							<p><?php echo (fsubstr($item["introduce"],62)); ?></p>
						</li>
				 <?php if((($key+1)%3)==0 || ($key+1)==$count): ?></ul></li><?php endif; endforeach; else: echo "<center class=\"nolist\">本栏目暂无信息</center>"; endif; ?>
			</ul>
            <!-- 幻灯片样式 -->
			<div class="b_pager bp3">
                <?php $__FOR_START_18562__=0;$__FOR_END_18562__=$count/3;for($i=$__FOR_START_18562__;$i < $__FOR_END_18562__;$i+=1){ ?><a target="_blank" class="pngFix" data-slide-index="<?php echo ($i); ?>" href="javacsript:;"></a><?php } ?>
            </div>
			<script type="text/javascript">
				$(".team_list li:nth-child(3n)").css("margin-right",0);
			</script>
		</div>

        <!-- 留学专业 -->
		<div class="news_cont_02">
			<div class="fl">
				<p class="n_c02_l_title">留学专业</p>
				<div class="q_f_box" id="nt03">
					<!-- 左侧国旗图片 -->
					<div class="f_title gm_tabs_head">
						<?php if(is_array($category) && !empty($category) ): foreach($category as $key=>$vo): ?><p><a target="_blank" href="#" title="<?php echo ($vo["cate_name"]); ?>"><img src="<?php echo (get_pic_url($vo["pic_path"])); ?>" width="33" height="24" alt="<?php echo ($vo["cate_name"]); ?>"/></a></p><?php endforeach; else: endif; ?>
					</div>
					<!-- 右侧专业图片 -->
					<div class="f_d_cont">
						<?php if(is_array($profession) && !empty($profession) ): foreach($profession as $key=>$vo): ?><div class="f_d_c_item gm_tabs_content">
								<ul>
									<?php if(is_array($vo) && !empty($vo) ): foreach($vo as $key=>$item): ?><li>
											<a target="_blank" href="<?php echo ($item["url"]); ?>" title="<?php echo ($item["title"]); ?>">
												<img src="<?php echo (get_pic_url($item["pic_path"])); ?>" width="56" height="56" alt="<?php echo ($item["title"]); ?>"/>
												<p><?php echo (fsubstr($item["title"],5)); ?></p>
											</a>
										</li><?php endforeach; else: endif; ?>
								</ul>
							</div><?php endforeach; else: echo "<center class=\"nolist\">暂无信息</center>"; endif; ?>
					</div>
				</div>
				<script type="text/javascript">
					$(".f_d_c_item ul li:nth-child(4n)").css("margin-right",0)
				</script>
			</div>
			<div class="fl" style="padding-left: 100px">
				<p class="n_c02_l_title" style="width:570px">申请经验</p>
                <div class="n_c02_l_cont">
                    <div class="n_c_r_item gm_tabs_content" style="display: block;width:584px">
                        <ul>
                            <?php if(is_array($experience) && !empty($experience) ): foreach($experience as $key=>$item): ?><li><a target="_blank" href="<?php echo (get_news_url($item["id"])); ?>" title="<?php echo ($item["title"]); ?>"><b>·</b><?php echo (fsubstr($item["title"],46)); ?></a></li><?php endforeach; else: echo "<center class=\"nolist\">本栏目暂无信息</center>"; endif; ?>
                        </ul>
                    </div>
                </div>
			</div>
		</div>
	<div class="foot_wrapper">
			<div class="foot_box">
				<div class="fl">
					<a target="_blank" href="<?php echo U('index/index');?>" title="<?php echo ($webConfig["site_name"]["val"]); ?>"><img class="f_logo" src="/education/Public/images/f_logo_img_23.png" alt="<?php echo ($webConfig["site_name"]["val"]); ?>"/></a>
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
					<img src="/education/Public/images/qq_ico_03.png" alt="美加咨询"/>美加咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<?php echo $_SERVER['HTTP_HOST']; ?>&Menu=yes" title="美加咨询">
					<img src="/education/Public/images/qq_ico_03.png" alt="美加咨询"/>美加咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<?php echo $_SERVER['HTTP_HOST']; ?>&Menu=yes" title="英港澳新咨询">
					<img src="/education/Public/images/qq_ico_03.png" alt="英港澳新咨询"/>英港澳新咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<?php echo $_SERVER['HTTP_HOST']; ?>&Menu=yes" title="欧洲咨询">
					<img src="/education/Public/images/qq_ico_03.png" alt="欧洲咨询"/>欧洲咨询
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