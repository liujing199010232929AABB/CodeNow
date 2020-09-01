<include file="Inc/head"/>
	<!-- 当前位置 -->
	<div class="site_i_t_wrapper">
		<div class="w1002_wrapper">
			<p class="t_f_title_text">关于我们</p>
			<p class="t_f_crumbs">当前位置：<a target="_blank" href="{:U('index/index')}">网站首页</a> >
				<a target="_blank" href="{:U('about/index')}" title="关于我们">关于我们</a> >
				{$classname}
			</p>
		</div>
	</div>

	<div class="in_main_box">
		<div class="in_s_menu">
			<ul>
				<li><a target="_blank" href="{:U('about/index?id=1')}" title="公司简介" <if condition="$id eq 1">class="cur"</if>>公司简介</a></li>
				<li><a target="_blank" href="{:U('about/index?id=2')}" title="公司优势" <if condition="$id eq 2">class="cur"</if>>公司优势</a></li>
				<li><a target="_blank" href="{:U('about/consultant')}" title="顾问风采" class="cur">顾问风采</a></li>
				<li><a target="_blank" href="{:U('about/index?id=3')}" title="联系我们" <if condition="$id eq 3">class="cur"</if>>联系我们</a></li>
			</ul>
		</div>
		<div class="in_cont_r_box">
			<ul class="adviser_list">
			  <foreach name="datalist" item="item" empty="此栏目暂无信息">
				<li>
					<div class="fl">
						<a target="_blank" href="{:U('About/view',array('id'=>$item['id']))}">
							<img src="{$item.pic_path|get_pic_url}" width="158" height="158"/>
						</a>
					</div>
					<div class="fr">
						<h4>{$item.title|FSubstr=11}</h4>
						<p>{$item.introduce|FSubstr=62}</p>
						<a target="_blank" href="{:U('About/view',array('id'=>$item['id']))}" >查看详情</a>
					</div>
				</li>
			  </foreach>
			</ul>
		</div>
	</div>

<include file="Inc/foot"/>