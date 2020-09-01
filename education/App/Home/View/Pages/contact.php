<include file="Inc/head"/>

		

		<div class="site_i_t_wrapper">

			<div class="w1002_wrapper">

				<p class="t_f_title_text">关于我们</p>

				<p class="t_f_crumbs">当前位置：<a target="_blank" href="{:U('index/index')}" title="网站首页">网站首页</a> &gt; <a target="_blank" href="{:U('about/index')}" title="关于我们">关于我们</a> &gt; {$classname}</p>

			</div>

		</div>

		

		<div class="in_main_box">

			<div class="in_s_menu">

				<ul>

					<li><a target="_blank" href="{:U('about/index?id=1')}" title="公司简介" <if condition="$id eq 1">class="cur"</if>>公司简介</a></li>

					<li><a target="_blank" href="{:U('about/index?id=2')}" title="公司优势" <if condition="$id eq 2">class="cur"</if>>公司优势</a></li>

					<li><a target="_blank" href="{:U('about/consultant')}" title="顾问风采" <if condition="$rid eq 1">class="cur"</if>>顾问风采</a></li>

					<li><a target="_blank" href="{:U('about/index?id=3')}" title="联系我们" <if condition="$id eq 3">class="cur"</if>>联系我们</a></li>

				</ul>

			</div>

			<div class="in_cont_r_box">

				<div class="contact_box">

					<div id="allmap" style="width:786px; height: 316px"></div>

						

				    <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>

                    <script type="text/javascript">

						var map = new BMap.Map("allmap");

						map.centerAndZoom(new BMap.Point({$webConfig.site_point.val}), 18);

						var marker1 = new BMap.Marker(new BMap.Point({$webConfig.site_point.val}));  // 创建标注

						map.addOverlay(marker1);              // 将标注添加到地图中

						marker1.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

						

						//创建信息窗口

						var infoWindow1 = new BMap.InfoWindow("{$webConfig.com_name.val}<br/>电话：{$webConfig.SiteTel.val}<br/>地址：{$webConfig.SiteAddr.val}");

						marker1.addEventListener("click", function(){this.openInfoWindow(infoWindow1);});

                    </script>

					

					<div class="contact_t_box">

						{$content}

					</div>

				</div>

			</div>

		</div>

		

<include file="Inc/foot"/>