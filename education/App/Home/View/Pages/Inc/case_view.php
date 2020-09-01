<include file="Inc/head"/>
<include file="Inc/current_position"/>
	<div class="s_i_d_box">
		<p class="s_i_t_box b_l_blue">{$navName}留学案例</p>
		<div class="s_i_title_box">
			<h3>{$dataInfo.title|FSubstr=36}</h3>
			<p><span class="dt1">时间：{$dataInfo.addtime|date='Y-m-d',###}</span>　　
				<span class="dt2">阅读：{$clicks}次</span>
				<span class="dt3">栏目：{$navName}留学案例</span>
			</p>
		</div>
		<div class="s_i_contact_box">
			<p>联系电话：<span>{$webConfig.SiteTel.val}</span>　　　　　
				地址：{$webConfig.SiteAddr.val}
			</p>
		</div>
		<div class="s_i_d_tbox ex_d_box">
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
<include file="Inc/foot"/>