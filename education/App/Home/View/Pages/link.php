<include file="Inc/head"/>

		

		<div class="site_i_t_wrapper">

			<div class="w1002_wrapper">

				<p class="t_f_title_text">友情链接</p>

				<p class="t_f_crumbs">当前位置：<a target="_blank" href="{:U('index/index')}" title="网站首页">网站首页</a> &gt; 友情链接</p>

			</div>

		</div>

        

		<ul class="fl_list fl_l_box">

			<foreach name="datalist" item="item" key="key" empty="暂无信息">

                <if condition="($key%3)==0"><li></if>

					<p><a target="_blank" href="{$item.link_url}" title="{$item.link_name}" target="_blank">{$item.link_name|FSubstr=16}</a></p>

				<if condition="(($key+1)%3)==0 || ($key+1)==$count"></li></if>

			</foreach>

		</ul>

		<script type="text/javascript">

			$(".fl_list li:nth-child(4n)").css("border-right","none");

		</script>



<include file="Inc/foot"/>