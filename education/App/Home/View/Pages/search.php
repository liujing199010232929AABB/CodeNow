<include file="Inc/head"/>

		

		<div class="site_i_t_wrapper">

			<div class="w1002_wrapper">

				<p class="t_f_title_text">搜索结果</p>

				<p class="t_f_crumbs">当前位置：<a target="_blank" href="{:U('index/index')}" title="网站首页">网站首页</a> &gt; 搜索结果</p>

			</div>

		</div>

		

		<div class="news_i_title">

			<h3>搜索内容【{$keywords}】</h3>

		</div>

		

		<div class="s_i_d_box">

			<ul class="in_case_list news_list">

              <foreach name="datalist" item="item" empty="查无符合信息">

				<li>

					<p class="i_c_l_date">{$item.addtime|date='Y-m-d',###}</p>

					<h4><a target="_blank" href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=45}</a></h4>

					<p class="i_c_l_intro">★{$item.introduce|FSubstr=62}</p>

					<div class="b_date">

						<p>{$item.addtime|date='d',###}</p>

						<span>{$item.addtime|date='Y-m',###}</span>

					</div>

				</li>

			  </foreach>

			</ul>

           <if condition="$page neq ''">

			<div class="pages">

				<span class="pageMoreTop">

				<ul>

				  {$page}

				</ul>

				</span>

			</div>

			<div class="clear"></div>

			<script>

				var w = $('.pages').width();

				var s = $('.in_case_list').width();

				$('.pages').css({'padding-left':(s-w)/2+'px'});

			</script>

          </if>

		</div>

		

<include file="Inc/foot"/>