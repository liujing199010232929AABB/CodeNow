<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,jquery_slimscroll_min" />
</head>
<body>
    <div class="leftMenu">
        <div id="simTestContent" class="simScrollCont">
        <!-- 超级管理员 $m_id eq 1 -->
            <if condition="$m_id eq 1">
                <foreach name="subNav" item="one">
                        <div class="aside">
                            <h2><span>{$one.navTitle}</span></h2>
                            <dl style="display:none;">
                                <foreach  name="one.secNav" item="two">
                                          <dd><a href="{:U($two['secLink'])}" target="main">{$two.secTitle}</a></dd>
                                </foreach >
                            </dl>
                        </div>
                </foreach>
            <!-- 普通用户 包括admin -->
            <else />
                <foreach name="subNav" item="one" key="a" >
                    <in name="a" value="$group_keys">
                        <div class="aside">
                            <h2><span>{$one.navTitle}</span></h2>
                            <dl style="display:none;">
                                <foreach  name="one.secNav" item="two" key="b">
                                     <in name="b" value="$group_keys">
                                          <dd><a href="{:U($two['secLink'])}" target="main">{$two.secTitle}</a></dd>
                                     </in>
                                </foreach>
                            </dl>
                        </div>
                    </in>
                </foreach>
            </if>
        </div>
    </div>

    <script>
        $('#simTestContent').slimScroll({
            width: '221px',
            height: '800px',
            alwaysVisible: false
        });
       /* $('.aside').each(function(index, element) {
            var _this = $(this);
            _this.children('h2').click(function(){
                _this.children('dl').slideToggle(300);
            });
        });*/
        $('.aside h2').click(function(){
            var _this = $(this);
            _this.toggleClass("hover").find("span").toggleClass("down");
            _this.next('dl').slideToggle(300);
        });
        $('.aside dl a').click(function(){
            $('.aside dl a').removeClass("menuon");
            $(this).toggleClass("menuon");
        });
        $(".slimScrollBar").hide();
    </script>
</body>
</html>