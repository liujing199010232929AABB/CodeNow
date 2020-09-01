<include file="Inc/head"/>
	<div class="site_i_t_wrapper">
		<div class="w1002_wrapper">
			<p class="t_f_title_text">新闻中心</p>
			<p class="t_f_crumbs">当前位置：<a target="_blank" href="{:U('index/index')}" title="网站首页">网站首页</a>  新闻中心</p>
		</div>
	</div>
		<div class="news_c_box">
			<div class="news_l_s_box">

				<div class="news_l_b_item">
					<div class="news_l_title">
						<h3>最新活动</h3>
						<a target="_blank" href="{:U('news/index_list?cid=1')}" title="查看更多">查看更多</a>
					</div>
					<notempty name="activities">
						<div class="news_h_box">
							<h4><a target="_blank" href="{$activities[0]['id']|get_news_url}">{$activities[0].title|FSubstr=15}</a></h4>
							<p>{$activities[0].introduce|FSubstr=38}</p>
						</div>
                    </notempty>
					<ul class="news_l_list">
						<foreach name="activities" item="item" key="key" empty="本栏目暂无信息">
							<php>if($key==0){continue;}if($key==8){break;}</php>
							<li><a target="_blank" href="{$item.id|get_news_url}"><b>·</b> {$item.title|FSubstr=18}</a></li>
						</foreach>
					</ul>

					<notempty name="experience">
						<div class="news_h_box">
							<h4><a target="_blank" href="{$experience[0]['id']|get_news_url}">{$experience[0].title|FSubstr=18}</a></h4>
							<p>{$datalist1[8].introduce|FSubstr=45}</p>
						</div>
                    </notempty>
					<ul class="news_l_list">
						<foreach name="experience" item="vo" key="k">
                        <php>if($k<9)continue;</php>
						<li><a target="_blank" href="{$vo['id']|get_news_url}"><b>·</b> {$v.title|FSubstr=18}</a></li>
					  </foreach>
					</ul>
				</div>

				<div class="news_l_b_item mt10">

					<div class="news_l_title">

						<h3>留学专题</h3>

						<a target="_blank" href="{:U('news/index_list?cid=3')}" title="查看更多">查看更多</a>

					</div>

					<php>if(!empty($datalist3[0])){</php>

					<div class="news_h_box">

						<h4><a target="_blank" href="{$datalist3[0].url}" title="{$datalist3[0].title}">{$datalist3[0].title|FSubstr=18}</a></h4>

						<p>{$datalist3[0].introduce|FSubstr=45}</p>

					</div>

                    <php>}</php>

					<ul class="news_l_list">

						<foreach name="datalist3" item="item" key="key" empty="本栏目暂无信息">

                        <php>if($key==0){continue;}if($key==8){break;}</php>

						<li><a target="_blank" href="{$item.url}" title="{$item.title}"><b>·</b> {$item.title|FSubstr=18}</a></li>

					  </foreach>

					</ul>

					<php>if(!empty($datalist3[8])){</php>

					<div class="news_h_box">

						<h4><a target="_blank" href="{$datalist3[8].url}" title="{$datalist3[8].title}">{$datalist3[8].title|FSubstr=18}</a></h4>

						<p>{$datalist3[8].introduce|FSubstr=45}</p>

					</div>

                    <php>}</php>

					<ul class="news_l_list">

						<foreach name="datalist3" item="v" key="k">

                        <php>if($k<9)continue;</php>

						<li><a target="_blank" href="{$v.url}" title="{$v.title}"><b>·</b> {$v.title|FSubstr=18}</a></li>

					  </foreach>

					</ul>

				</div>

			</div>

			<div class="news_r_s_box">

				<div class="news_l_title">
					<h3>申请经验</h3>
					<a target="_blank" href="{:U('news/index_list?cid=2')}" title="查看更多">查看更多</a>
				</div>
				<div class="n_r_t_box">
					<!-- 申请经验  -->
				  <div class="n_r_t_box_item fl">
					<notempty name="experience1">
						<div class="news_h_box">
							<h4><a target="_blank" href="{$experience1[0].id|get_news_url}">{$experience1[0].title|FSubstr=18}</a></h4>
							<p>{$experience[0].introduce|FSubstr=45}</p>
						</div>
					</notempty>
					<ul class="news_l_list">
						<foreach name="experience" item="item" key="key" empty="本栏目暂无信息">
                        <php>if($key==0){continue;}if($key==8){break;}</php>
						<li><a target="_blank" href="{$item.id|get_news_url}"><b>·</b> {$item.title|FSubstr=18}</a></li>
					  </foreach>
					</ul>
				  </div>

				  <div class="n_r_t_box_item fr">						

					 <php>if(!empty($datalist2[8])){</php>

					   <div class="news_h_box">

						<h4><a target="_blank" href="{$datalist2[8].url}" title="{$datalist2[8].title}">{$datalist2[8].title|FSubstr=18}</a></h4>

						<p>{$datalist2[8].introduce|FSubstr=45}</p>

					   </div>

                     <php>}</php>

					 <ul class="news_l_list">

					   <foreach name="datalist2" item="v" key="k">

                        <php>if($k<9)continue;</php>

						<li><a target="_blank" href="{$v.url}" title="{$v.title}"><b>·</b> {$v.title|FSubstr=18}</a></li>

					   </foreach>

					 </ul>

				  </div>

				</div>

				<div class="news_r_box_item mt10">

					<div class="news_r_item_title t1">

						<span>聚焦</span>

						<a target="_blank" href="{:U('news/index_list?cid=4')}" title="查看更多">查看更多</a>

					</div>

					<div class="news_s_list_box">

						<div class="news_s_img">

							<img class="nsi01" src="__IMG__/news_i_img_01.jpg" width="183" height="105" alt="聚焦"/>

							<img src="__IMG__/news_i_img_02.jpg" width="183" height="105" alt="聚焦"/>

						</div>

						<ul>

						  <foreach name="datalist4" item="item" key="key" empty="本栏目暂无信息">

							<li><a target="_blank" href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=16}</a></li>

						  </foreach>

						</ul>

					</div>

				</div>

				<div class="news_r_box_item">

					<div class="news_r_item_title t2">

						<span>推荐</span>

						<a target="_blank" href="{:U('news/index_list?cid=5')}" title="查看更多">查看更多</a>

					</div>

					<div class="news_s_list_box">

						<div class="news_s_img">

							<img class="nsi01" src="__IMG__/news_i_img_03.jpg" width="183" height="105" alt="推荐"/>

							<img src="__IMG__/news_i_img_04.jpg" width="183" height="105" alt="推荐"/>

						</div>

						<ul>

						  <foreach name="datalist5" item="item" key="key" empty="本栏目暂无信息">

							<li><a target="_blank" href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=16}</a></li>

						  </foreach>

						</ul>

					</div>

				</div>

				<div class="news_r_box_item">

					<div class="news_r_item_title t3">

						<span>考试</span>

						<a target="_blank" href="{:U('news/index_list?cid=6')}" title="查看更多">查看更多</a>

					</div>

					<div class="news_s_list_box">

						<div class="news_s_img">

							<img class="nsi01" src="__IMG__/news_i_img_05.jpg" width="183" height="105" alt="考试"/>

							<img src="__IMG__/news_i_img_06.jpg" width="183" height="105" alt="考试"/>

						</div>

						<ul>

						  <foreach name="datalist6" item="item" key="key" empty="本栏目暂无信息">

							<li><a target="_blank" href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=16}</a></li>

						  </foreach>

						</ul>

					</div>

				</div>

			</div>

		</div>

		

<include file="Inc/foot"/>