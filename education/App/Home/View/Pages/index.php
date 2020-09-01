<include file="Inc/head"/>
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
					<foreach name="small_slide" item="small" empty="暂无信息">
						<li>
							<if condition="small.weburl">
								<a target="_blank" href="{$small.weburl}" title="{$small.title}">
									<img src="__UPLOAD__/{$small.pic_path}" alt="{$small.title}" width="286" height="292"/>
								</a>
							<else/>
								<img src="__UPLOAD__/{$small.pic_path}" alt="{$small.title}" width="286" height="292"/>
							</if>
						</li>
					</foreach>
				</ul>
				<div class="b_pager bp1">
                  <foreach name="small_slide" item="item" key="key">
					<a target="_blank" class="pngFix" data-slide-index="{$key}" href="javacsript:" title="{$item.title}"></a>
				  </foreach>
				</div>
			</div>
			<!-- 大幻灯片 -->
			<div class="t_banner_02">
				<div class="b_next"></div>
				<div class="b_prve"></div>
				<ul class="t_banner_02_list">
					<foreach name="big_slide" item="item" key="key">
						<li>
							<if condition="small.weburl">
								<a target="_blank" href="{$item.weburl}" title="{{$item.title}}">
									<img src="__UPLOAD__/{$item.pic_path}" alt="{{$item.title}}" width="700" height="292"/>
								</a>
							<else/>
								<img src="__UPLOAD__/{$item.pic_path}" alt="{{$item.title}}" width="700" height="292"/>
							</if>
						</li>
					</foreach>
				</ul>
				<div class="b_pager bp2">
					  <foreach name="big_slide" item="item" key="key">
						<a target="_blank" class="pngFix" data-slide-index="{$key}" href="javacsript:" title="{$item.title}"></a>
					  </foreach>
				</div>
			</div>
		</div>
		<div class="news_cont_01">
			<div class="n_c_l_01" id="nt01">
				<div class="n_c_l_title gm_tabs_head">
					<a target="_blank" href="{:U('news/index_list?cid=1')}" title="最新活动">最新活动</a>
					<a target="_blank" href="{:U('news/index_list?cid=3')}" title="留学专题">留学专题</a>
				</div>
				<div class="n_c_l_cont">
					<!--最新活动--->
					<div class="n_c_l_citem gm_tabs_content">
						<notempty name="activities">
							<div>
								<h3><a target="_blank" href="{$activities[0]['id']|get_news_url}" title="{$activities[0].title}">{$activities[0].title|FSubstr=15}</a></h3>
								<p>{$activities[0].introduce|FSubstr=38}</p>
							</div>
						</notempty>
						<ul>
							<foreach name="activities" item="item" key="key" empty="本栏目暂无信息">
								<php>if($key==0){continue;}</php>
								<li><a target="_blank" href="{$item.id|get_news_url}" title="{$item.title}"><b>·</b> {$item.title|FSubstr=16}</a></li>
							</foreach>
						</ul>
					</div>
					<!-- 留学专题 -->
					<div class="n_c_l_citem gm_tabs_content">
						<notempty name="study_info">
							<div>
								<h3><a target="_blank" href="{$study_info[0]['id']|get_news_url}" title="{$study_info[0].title}">{$study_info[0].title|FSubstr=15}</a></h3>
								<p>{$study_info[0].introduce|FSubstr=38}</p>
							</div>
						</notempty>
						<ul>
						  <foreach name="study_info" item="item" key="key" empty="本栏目暂无信息">
                            <php>if($key==0){continue;}</php>
						    <li><a target="_blank" href="{$item.id|get_news_url}" title="{$item.title}"><b>·</b> {$item.title|FSubstr=16}</a></li>
					      </foreach>
						</ul>
					</div>
				</div>
			</div>

			<div class="n_c_l_02">
				<!-- 聚焦 -->
				<div class="n_c_l_02_item">
					<a target="_blank" class="n_c_more" href="{$more_focus_url}" title="more">more</a>
					<h3>
                      <a target="_blank" class="n_c_c_link_01" href="{$more_focus_url}" title="聚焦">聚焦</a>
                      <notempty name="focus_info">
						  <a target="_blank" class="n_c_n_title" href="{$focus_info[0]['id']|get_news_url}" title="{$focus_info[0].title}">{$focus_info[0].title|FSubstr=22}</a>
					  </notempty>
                    </h3>
					<ul>
						<foreach name="focus_info" item="item" key="key" empty="本栏目暂无信息">
                           <php>if($key==0){continue;}</php>
						   <li><a target="_blank" href="{$item.id|get_news_url}" title="{$item.title}">{$item.title|FSubstr=16}</a></li>
					    </foreach>
					</ul>
				</div>

				<div class="n_c_l_02_item">
					<a target="_blank" class="n_c_more" href="{$more_recommend_url}" title="more">more</a>
					<h3>
                        <a target="_blank" class="n_c_c_link_02" href="{$more_recommend_url}" title="推荐">推荐</a>
						<notempty name="recommend">
                        	<a target="_blank" class="n_c_n_title" href="{$recommend[0].id|get_news_url}" title="{$recommend[0].title}">{$recommend[0].title|FSubstr=22}</a>
						</notempty>
                    </h3>
					<ul>
						<foreach name="recommend" item="item" key="key" empty="本栏目暂无信息">
                           <php>if($key==0){continue;}</php>
						   <li><a target="_blank" href="{$item.id|get_news_url}" title="{$item.title}">{$item.title|FSubstr=16}</a></li>
					    </foreach>
					</ul>
				</div>

				<div class="n_c_l_02_item">
					<a target="_blank" class="n_c_more" href="{:U('news/index_list?cid=6')}" title="more">more</a>
					<h3>
                        <a target="_blank" class="n_c_c_link_03" href="{:U('news/index_list?cid=6')}" title="考试">考试</a>

						<notempty name="exam">
                        	<a target="_blank" class="n_c_n_title" href="{$more_exam_url}" title="{$exam[0].title}">{$exam[0].title|FSubstr=22}</a>
						</notempty>
                    </h3>
					<ul>
						<foreach name="exam" item="item" key="key" empty="本栏目暂无信息">
                           <php>if($key==0){continue;}</php>
						   <li><a target="_blank" href="{$item.id|get_news_url}" title="{$item.title}">{$item.title|FSubstr=16}</a></li>
					    </foreach>
					</ul>
				</div>
			</div>

		</div>

        <!-- 顾问风采 -->
		<div class="team_cont_01">
			<p class="cont_title">顾问风采</p>
			<ul class="t_banner_03_list">
			  <foreach name="consultant" item="item" key="key" empty="本栏目暂无信息">
                 <if condition="($key%3)==0"><li><ul class="team_list"></if>
						<li>
							<div class="t_fl_img">
								<a target="_blank" href="{:U('About/view',array('id'=>$item['id']))}" title="{$item.title}">
									<img src="{$item.pic_path|get_pic_url}" width="158" height="158"/>
								</a>
							</div>
							<h3><a target="_blank" href="{:U('About/view',array('id'=>$item['id']))}">{$item.title}</a></h3>
							<p>{$item.introduce|FSubstr=62}</p>
						</li>
				 <if condition="(($key+1)%3)==0 || ($key+1)==$count"></ul></li></if>
			  </foreach>
			</ul>
            <!-- 幻灯片样式 -->
			<div class="b_pager bp3">
                <for start="0"  end="$count/3" name="i">
                    <a target="_blank" class="pngFix" data-slide-index="{$i}" href="javacsript:;"></a>
                </for>
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
						<foreach name="category" item="vo">
							<p><a target="_blank" href="#" title="{$vo.cate_name}"><img src="{$vo.pic_path|get_pic_url}" width="33" height="24" alt="{$vo.cate_name}"/></a></p>
						</foreach>
					</div>
					<!-- 右侧专业图片 -->
					<div class="f_d_cont">
						<foreach name="profession" item="vo">
							<div class="f_d_c_item gm_tabs_content">
								<ul>
									<foreach name="vo" item="item" empty="暂无信息">
										<li>
											<a target="_blank" href="{$item.url}" title="{$item.title}">
												<img src="{$item.pic_path|get_pic_url}" width="56" height="56" alt="{$item.title}"/>
												<p>{$item.title|FSubstr=5}</p>
											</a>
										</li>
									</foreach>
								</ul>
							</div>
						</foreach>
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
                            <foreach name="experience" item="item" empty="本栏目暂无信息">
                                <li><a target="_blank" href="{$item.id|get_news_url}" title="{$item.title}"><b>·</b>{$item.title|FSubstr=46}</a></li>
                            </foreach>
                        </ul>
                    </div>
                </div>
			</div>
		</div>
<include file="Inc/foot"/>