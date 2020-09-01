<include file="Inc/head"/>
		<div class="site_i_t_wrapper">
			<div class="w1002_wrapper">
				<p class="t_f_title_text">新闻中心</p>
				<p class="t_f_crumbs">当前位置：<a target="_blank" href="{:U('index/index')}" title="网站首页">网站首页</a> &gt;
					<a target="_blank" href="{:U('news/index_list',array('cid'=>1))}" title="新闻中心">新闻中心</a> &gt;
					{$classname}
				</p>
			</div>
		</div>
		<div class="news_i_title">
			<p>{$classname}</p>
		</div>
		<div class="s_i_d_box">
			<div class="s_i_title_box news_title_box">
				<h3>{$dataInfo.title|FSubstr=36}</h3>
				<p>
					<span class="dt1">时间：{$dataInfo.addtime|date='Y-m-d',###}</span>　　　　
					<span class="dt2">阅读：{$clicks}次</span>　　　　
					<span class="dt3">栏目：{$classname}</span>
				</p>
			</div>
			<div class="s_i_contact_box">
				<p>联系电话：<span>{$webConfig.SiteTel.val}</span>　　　　　地址：{$webConfig.SiteAddr.val}</p>
			</div>
			<div class="s_i_d_tbox news_d_box">
				{$content}
			</div>
            <div class="ra_l_box">
            	<p>【上一页】：{$strU}</p>
            	<p>【下一页】：{$strD}</p>
            </div>
		</div>

<include file="Inc/foot"/>