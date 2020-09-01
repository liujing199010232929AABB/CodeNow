	<div class="foot_wrapper">
			<div class="foot_box">
				<div class="fl">
					<a target="_blank" href="{:U('index/index')}" title="{$webConfig.site_name.val}"><img class="f_logo" src="__IMG__/f_logo_img_23.png" alt="{$webConfig.site_name.val}"/></a>
					<ul class="foot_f_list" style="margin: 26px 0px 0px 54px;">
						<foreach name="navigation" item="vo">
							<li>
								<a target="_blank" href="javascript:;">
									<img width="48px" height="35px" src="{$vo.pic_path|get_pic_url}" alt="美国留学"/>
									<p>{$vo.cate_name}</p>
								</a>
							</li>
						</foreach>
					</ul>
				</div>
				<div class="f_adress_box">
					<div class="f_a_text_box">
						<p>咨询热线：（08:00-24:00）</p>
						<p class="f_t_tel">{$webConfig.SiteTel.val}</p>
						<p class="f_t_adress">{$webConfig.SiteAddr.val}</p>
						<p>邮编：{$webConfig.SitePostcard.val}　ICP备：<a target="_blank" href="http://www.miitbeian.gov.cn" target="_blank" title="{$webConfig.IcpCode.val}">{$webConfig.IcpCode.val}</a></p>
						<p>{$webConfig.Copyright.val}版权所有</p>
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
						<li><a target="_blank" href="{:U('index/index')}" title="网站首页">网站首页</a></li>
						<li><a target="_blank" href="{:U('news/index')}" title="新闻中心">新闻中心</a></li>
						<li style="border-bottom: 1px solid #DEDEDE;"><a target="_blank" href="{:U('about/index')}" title="关于我们">关于我们</a></li>
					</ul>
				</div>
                <foreach name="codeList" item="item">
                    <div class="f_r_item_box">
                        <a target="_blank" class="f_ewm" href="javascript:" title="{$item.title}"></a>
                        <img class="ewm_img" src="{$item.pic}" alt="{$item.title}"/>
                    </div>
				</foreach>
			</div>
		</div>
		<div class="float_l_qq_box">
			<div class="f_qq_item">
				<a href="tencent://message/?uin=213213322&Site=<php>echo $_SERVER['HTTP_HOST'];</php>&Menu=yes" title="美加咨询">
					<img src="__IMG__/qq_ico_03.png" alt="美加咨询"/>美加咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<php>echo $_SERVER['HTTP_HOST'];</php>&Menu=yes" title="美加咨询">
					<img src="__IMG__/qq_ico_03.png" alt="美加咨询"/>美加咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<php>echo $_SERVER['HTTP_HOST'];</php>&Menu=yes" title="英港澳新咨询">
					<img src="__IMG__/qq_ico_03.png" alt="英港澳新咨询"/>英港澳新咨询
				</a>
			</div>
			<div class="f_qq_item">
				<a href="tencent://message/?uin=2237800782&Site=<php>echo $_SERVER['HTTP_HOST'];</php>&Menu=yes" title="欧洲咨询">
					<img src="__IMG__/qq_ico_03.png" alt="欧洲咨询"/>欧洲咨询
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

