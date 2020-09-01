<include file="Inc/head"/>
<include file="Inc/current_position"/>
	<div class="s_i_d_box">
		<div class="in_cont_left fl">
			<p class="in_cont_l_title">{$navName}{$classname}</p>
			<ul class="in_case_list">
				  <foreach name="datalist" item="item" empty="暂无信息">
					<li>
						<p class="i_c_l_date">{$item.addtime|date='Y-m-d',###}</p>
						<h4><a target="_blank" href="{:U('news_view',array('cate_id'=>$cate_id,'rid'=>$rid,'id'=>$item['id']))}" title="{$item.title}">{$item.title|FSubstr=30}</a></h4>
						<p class="i_c_l_intro">★{$item.introduce|FSubstr=40}</p>
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
		<div class="in_s_cont_right fr">
			<div class="s_i_e_box" style="float: none;">
				<div class="s_i_e_title">
					<h4>最新案例</h4>
				</div>
					<ul>
					  <foreach name="caselist" item="item" empty="暂无信息">
						<li>
							<div class="n_c_r_item_h_box">
								<div class="n_c_r_hn_img">
									<a target="_blank" href="{:U('Country/case_view',array('id'=>$item['id']))}">
										<img src="{$item.pic_path|get_pic_url}" width="88" height="88" alt="{$item.title}">
									</a>
								</div>
								<h4><a target="_blank" href="{:U('Country/case_view',array('id'=>$item['id']))}">{$item.title|FSubstr=9}</a></h4>
								<p>{$item.introduce|FSubstr=33}</p>
							</div>
						</li>
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
								<a target="_blank" href="{:U('Country/class_view',array('id'=>$item['id']))}" title="{$item.title}">
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