<include file="Inc/head"/>
<include file="Inc/current_position"/>
	<div class="s_i_d_box">
		<div class="in_cont_left fl">
			<p class="in_cont_l_title">{$navName}{$classname}</p>
			<div class="s_i_title_box">
				<h3>{$dataInfo.title|FSubstr=26}</h3>
				<p>
					<span class="dt1">时间：{$dataInfo.addtime|date='Y-m-d',###}</span>　　　　
					<span class="dt2">阅读：{$clicks}次</span>　　　
					<span class="dt3">栏目：{$navName}{$classname}</span>
				</p>
			</div>
			<div class="s_i_contact_box">
				<p>联系电话：<span>{$webConfig.SiteTel.val}</span>地址：{$webConfig.SiteAddr.val}</p>
			</div>
			<div class="s_i_d_tbox">
				{$content}
			</div>
			<div class="ra_l_box">
				<p>【上一页】：
					<notempty name="up_id">
						<a target="_blank" href="{:U('news_view',array('cate_id'=>$_GET['cate_id'],'rid'=>$_GET['rid'],'id'=>$up_id))}">{$up_title}</a>
					<else/>
						<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>
					</notempty>
				</p>
				<p>【下一页】：
					<notempty name="down_id">
						<a target="_blank" href="{:U('news_view',array('cate_id'=>$_GET['cate_id'],'rid'=>$_GET['rid'],'id'=>$down_id))}">{$down_title}</a>
					<else/>
						<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>
					</notempty>
				</p>
			</div>

		</div>
		<div class="in_s_cont_right fr">
			<div class="s_i_e_box" style="float: none;">
				<div class="s_i_e_title">
					<h4>最新案例</h4>
					<a target="_blank" href="{:U('case_list',array('cate_id'=>$cate_id,'rid'=>$rid))}" title="查看更多">查看更多</a>
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