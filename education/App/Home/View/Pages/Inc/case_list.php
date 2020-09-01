<include file="Inc/head"/>
<include file="Inc/current_position"/>
		<div class="s_i_d_box">
			<div class="in_cont_left fl">
				<p class="in_cont_l_title">{$navName}{$classname}</p>
				<ul class="in_ex_list">
                  <foreach name="datalist" item="item" empty="暂无信息">
					<li>
						<a target="_blank" class="d_more" href="{:U('case_view',array('cate_id'=>$cate_id,'rid'=>$rid,'id'=>$item['id']))}">查看详情</a>
						<div class="fl">
							<a target="_blank" href="{:U('case_view',array('cate_id'=>$cate_id,'rid'=>$rid,'id'=>$item['id']))}"><img src="{$item.pic_path|get_pic_url}" width="84" height="84"/></a>
						</div>
						<h4><a target="_blank" href="{:U('case_view',array('cate_id'=>$cate_id,'rid'=>$rid,'id'=>$item['id']))}">{$item.title|FSubstr=30}</a></h4>
						<p>{$item.introduce|FSubstr=88}</p>
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
					var s = $('.in_ex_list').width();
					$('.pages').css({'padding-left':(s-w)/2+'px'});
				</script>
                </if>
			</div>
			<div class="in_s_cont_right fr">
				<div class="s_c_fl_n_box in_s_r">
					<div class="s_c_title_box">
						<h4>新闻资讯</h4>
					</div>
					<ul>
						<foreach name="newslist" item="item" empty="暂无信息">
							<li><a target="_blank" href="{:U('Country/news_view',array('id'=>$item['id']))}" title="{$item.title}">{$item.title|FSubstr=18}</a></li>
						</foreach>
					</ul>
				</div>
				<div class="in_s_pro">
					<div class="s_c_title_box">
						<h4>留学专业</h4>
					</div>
					<ul>
						<foreach name="classlist" item="item" empty="暂无信息">
							<li>
								<a target="_blank" href="{:U('Country/class_view',array('cate_id'=>$cate_id,'rid'=>$rid,'id'=>$item['id']))}" title="{$item.title}">
									<img src="{$item.pic_path|get_pic_url}" width="56" height="56" alt="{$item.title}"/>
									<p>{$item.title|FSubstr=5}</p>
								</a>
							</li>
						</foreach>
					</ul>
				</div>
			</div>
		</div>
<include file="Inc/foot"/>