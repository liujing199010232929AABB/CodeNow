<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/jquery_slimscroll_min.js"></script>
</head>
<body>
    <div class="leftMenu">
        <div id="simTestContent" class="simScrollCont">
        <!-- 超级管理员 $m_id eq 1 -->
            <?php if($m_id == 1): if(is_array($subNav) && !empty($subNav) ): foreach($subNav as $key=>$one): ?><div class="aside">
                            <h2><span><?php echo ($one["navTitle"]); ?></span></h2>
                            <dl style="display:none;">
                                <?php if(is_array($one["secNav"]) && !empty($one["secNav"]) ): foreach($one["secNav"] as $key=>$two): ?><dd><a href="<?php echo U($two['secLink']);?>" target="main"><?php echo ($two["secTitle"]); ?></a></dd><?php endforeach; else: endif; ?>
                            </dl>
                        </div><?php endforeach; else: endif; ?>
            <!-- 普通用户 包括admin -->
            <?php else: ?>
                <?php if(is_array($subNav) && !empty($subNav) ): foreach($subNav as $a=>$one): if(in_array(($a), is_array($group_keys)?$group_keys:explode(',',$group_keys))): ?><div class="aside">
                            <h2><span><?php echo ($one["navTitle"]); ?></span></h2>
                            <dl style="display:none;">
                                <?php if(is_array($one["secNav"]) && !empty($one["secNav"]) ): foreach($one["secNav"] as $b=>$two): if(in_array(($b), is_array($group_keys)?$group_keys:explode(',',$group_keys))): ?><dd><a href="<?php echo U($two['secLink']);?>" target="main"><?php echo ($two["secTitle"]); ?></a></dd><?php endif; endforeach; else: endif; ?>
                            </dl>
                        </div><?php endif; endforeach; else: endif; endif; ?>
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