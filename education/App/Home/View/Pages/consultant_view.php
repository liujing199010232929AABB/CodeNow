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

				<div class="adviser_d_img">

					<img src="{$pic}" width="343" height="343" alt="{$dataInfo.title}"/>

					<p>{$dataInfo.title}</p>

				</div>

				<div class="adviser_d_text">

					{$content}

				</div>

				<!--<a target="_blank" class="s_i_d_blink" href="javascript:history.back()" title="返回">返回</a>-->

                <div class="ra_l_box">

            	   <p>【上一页】：{$strU}</p>

            	   <p>【下一页】：{$strD}</p>

                </div>

			</div>

		</div>

		

<include file="Inc/foot"/>