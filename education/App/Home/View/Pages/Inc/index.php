<include file="Inc/head"/>
		<div class="site_i_t_wrapper">
			<div class="w1002_wrapper">
				<img class="t_f_img" src="{$country_pic}" width="48" height="34" alt="{$classname}"/>
				<p class="t_f_title_text">{$navName}</p>
				<p class="t_f_crumbs">当前位置：{$navStr}</p>
			</div>
		</div>
		<div class="site_i_cont01_box">
			<div class="s_c_fl_n_box">
				<div class="s_c_title_box">
					<h4>新闻资讯</h4>
					<a href="{:U($mark.'/news_list')}" title="查看更多">查看更多</a>
				</div>
				<ul>
                  <foreach name="newslist" item="item" empty="暂无信息">
					<li><a href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=18}</a></li>
				  </foreach>
				</ul>
			</div>

			<div class="s_i_banner">

				<img src="{$banner_pic}" width="480" height="318" alt="{$classname}"/>

			</div>

			<div class="s_i_e_box">

				<div class="s_i_e_title">

					<h4>最新案例</h4>

					<a href="{:U($mark.'/case_list')}" title="查看更多">查看更多</a>

				</div>

				<ul>

                  <foreach name="caselist" item="item" empty="暂无信息">

					<li>						

						<div class="n_c_r_item_h_box">

							<div class="n_c_r_hn_img">

								<a href="{$item.url}" title="{$item.title}"><img src="{$item.pic}" width="88" height="88" alt="{$item.title}"></a>

							</div>

							<h4><a href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=9}</a></h4>

							<p>{$item.introduce|FSubstr=33}</p>

						</div>

					</li>

				  </foreach>

				</ul>

			</div>

		</div>

		

		<div class="site_i_cont02_box">

			<div class="s_i_cont_title">

				<h4>留学专业</h4>

				<a href="{:U($mark.'/class_list')}" title="查看更多">查看更多</a>

			</div>

			<ul class="s_i_ex_list">

			  <foreach name="classlist" item="item" empty="暂无信息">

				<li>

					<a href="{$item.url}" title="{$item.title}">						

                        <div>

                            <img src="{$item.pic}" width="56" height="56" alt="{$item.title}"/>

                        </div>

                        <p class="s_i_ex_p01">{$item.title}</p>

                        <p class="s_i_ex_p02">{$item.title_en}</p>

					</a>

				</li>

			  </foreach>

			</ul>

			<script type="text/javascript">

				$(".s_i_ex_list li:nth-child(4n)").css({"margin-right":0,"border-right":"none"});

			</script>

		</div>

		

		<div class="site_i_cont03_box">

			<div class="s_i_intro_box">

				<div class="s_i_cont_title">

					<if condition="in_array($navName,array('香港','韩国','德国','法国','意大利','西班牙'))">
                      <h4>{$navName}风土人情</h4>
                    <else/>
                      <h4>{$navName}高中</h4>
                    </if>

					<a class="c_gray" href="{$url1}" title="查看更多">查看更多</a>

				</div>

				<div class="s_i_cont_d">

					{$info1|FSubstr=210}

				</div>

			</div>

			<div class="s_i_intro_box">

				<div class="s_i_cont_title">

					<h4>{$navName}本科</h4>

					<a class="c_gray" href="{$url2}" title="查看更多">查看更多</a>

				</div>

				<div class="s_i_cont_d">

					{$info2|FSubstr=210}

				</div>

			</div>

			<div class="s_i_intro_box mr_n">

				<div class="s_i_cont_title">

					<h4>{$navName}研究生</h4>

					<a class="c_gray" href="{$url3}" title="查看更多">查看更多</a>

				</div>

				<div class="s_i_cont_d">

					{$info3|FSubstr=210}

				</div>

			</div>

		</div>

		

		<div class="site_i_cont04_box">

			<div class="s_i_c04_l">

				<div class="s_i_cont_title">

					<h4>留学方案</h4>

					<a href="{:U($mark.'/plan_list')}" title="查看更多">查看更多</a>

				</div>

				<ul>

					<li>

                       <php>if(!empty($planlist[0])){</php>

						<div>

							<h4><a href="{$planlist[0]['url']}" title="{$planlist[0]['title']}">{$planlist[0]['title']|FSubstr=18}</a></h4>

							<p>{$planlist[0]['introduce']|FSubstr=45}</p>

						</div>

                       <php>}</php>

                       <foreach name="planlist" item="item" key="key" empty="本栏目暂无信息">

                        <php>if($key==0){continue;}if($key==6){break;}</php>

						<p><a href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=18}</a></p>

					   </foreach>

					</li>

					<li>

                      <php>if(!empty($planlist[6])){</php>

						<div>

							<h4><a href="{$planlist[6]['url']}" title="{$planlist[6]['title']}">{$planlist[6]['title']|FSubstr=18}</a></h4>

							<p>{$planlist[6]['introduce']|FSubstr=45}</p>

						</div>

                       <php>}</php>

						<foreach name="planlist" item="item" key="key">

                        <php>if($key<7){continue;}</php>

						<p><a href="{$item.url}" title="{$item.title}">{$item.title|FSubstr=18}</a></p>

					   </foreach>

					</li>

				</ul>

			</div>

			<div class="s_i_c04_r">

				<div class="s_i_cont_title">

					<h4>留学院校</h4>

					<a href="{:U($mark.'/school_list')}" title="查看更多">查看更多</a>

				</div>

				<ul>

				  <foreach name="schoollist" item="item" key="key" empty="本栏目暂无信息">

					<li><a href="{$item.url}" title="{$item.title}"><span class="fl"><b>·</b> {$item.title|FSubstr=11}</span><span class="fr">{$item.title_en|FSubstr=12}</span></a></li>

				  </foreach>

				</ul>

			</div>

		</div>

		

<include file="Inc/foot"/>