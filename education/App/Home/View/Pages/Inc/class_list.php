<include file="Inc/head"/>
<include file="Inc/current_position"/>
	<div class="s_i_d_box">
		<div class="in_cont_left fl">
			<p class="in_cont_l_title">{$navName}留学专业</p>
			<ul class="pro_list">
			  <foreach name="datalist" item="item" empty="暂无信息">
				<li>
					<div class="pro_t1">
						<img src="{$item.pic_path|get_pic_url}" width="56" height="56" alt="{$item.title}"/>
						<p class="pt5">{$item.title}</p>
						<p>{$item.title_en}</p>
					</div>
					<p class="pro_t2">{$item.introduce|FSubstr=88}</p>
					<a target="_blank" href="{:U('class_view',array('cate_id'=>$cate_id,'rid'=>$rid,'id'=>$item['id']))}">详情</a>
				</li>
			  </foreach>
			</ul>
		</div>
		<div class="in_s_cont_right fr">
			<div class="s_c_fl_n_box in_s_r">
				<div class="s_c_title_box">
					<h4>新闻资讯</h4>
					<a target="_blank" href="{:U('news_list',array('cate_id'=>$cate_id,'rid'=>$rid))}" title="查看更多">查看更多</a>
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