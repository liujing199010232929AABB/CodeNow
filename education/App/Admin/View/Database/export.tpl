<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,admin" />
</head>

<body>
<include file="Inc/head" />

<div class="sin_form">

    <!-- 标题栏 -->
    <div class="main-title">
        <h2 class="fc">数据备份</h2>     <div class="cf">
        <a id="export" class="btn" href="javascript:;" autocomplete="off">立即备份</a>
  </div>      <div class="clear ">
    </div>
    
    </div>
    <!-- /标题栏 -->

   

    <!-- 应用列表 -->
    <div class="data-table table-striped">
        <form id="export-form" method="post" action="{:U('export')}">
            <table width="1393">
 		 <thead>
                    <tr>
                        <th width="78 " align="center" class="data-text"><input class="check-all" checked="chedked" type="checkbox" value=""></th>
                        <th width="379" align="center"  class="data-text">表名</th>
                      <th width="224" align="center"  class="data-text">数据量</th>
                        <th width="285" align="center"  class="data-text">数据大小</th>
                      <th width="232" align="center"  class="data-text">创建时间</th>
                      <th width="167" align="center"  class="data-text">备份状态</th>
          </tr>
                </thead>
                <tbody>
                    <volist name="list" id="table">
                        <tr>
                            <td class="num" align="center">
                                <input class="ids" checked="chedked" type="checkbox" name="tables[]" value="{$table.name}">
                            </td>
                            <td align="center">{$table.name}</td>
                            <td align="center">{$table.rows}</td>
                            <td align="center">{$table.data_length|format_bytes}</td>
                            <td align="center">{$table.create_time}</td>
                            <td class="info" align="center">未备份</td>
                        </tr>
                    </volist>
                </tbody>
            </table>
      </form>
    </div>
    <!-- /应用列表 -->

<block name="script">
    <script type="text/javascript">
	$(function(){
			//全选的实现
			$(".check-all").click(function(){
				$(".ids").prop("checked", this.checked);
			});
			$(".ids").click(function(){
				var option = $(".ids");
				option.each(function(i){
					if(!this.checked){
						$(".check-all").prop("checked", false);
						return false;
					}else{
						$(".check-all").prop("checked", true);
					}
				});
			});
	});
	
	
    (function($){
        var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");

        $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if(data.status){
                    updateAlert(data.info,'alert-success');
                } else {
                    updateAlert(data.info,'alert-error');
                }
                setTimeout(function(){
	                $('#top-alert').find('button').click();
	                $(that).removeClass('disabled').prop('disabled',false);
	            },1500);
            }, "json");
            return false;
        });

        $export.click(function(){
            $export.parent().children().addClass("disabled");
            $export.html("正在发送备份请求...");
            $.post(
                $form.attr("action"),
                $form.serialize(),
                function(data){
                    if(data.status){
                        tables = data.tables;
                        $export.html(data.info + "开始备份，请不要关闭本页面！");
                        backup(data.tab);
                        window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                    } else {
                        updateAlert(data.info,'alert-error');
                        $export.parent().children().removeClass("disabled");
                        $export.html("立即备份");
                        setTimeout(function(){
        	                $('#top-alert').find('button').click();
        	                $(that).removeClass('disabled').prop('disabled',false);
        	            },1500);
                    }
                },
                "json"
            );
            return false;
        });

        function backup(tab, status){
            status && showmsg(tab.id, "开始备份...(0%)");
            $.get($form.attr("action"), tab, function(data){
                if(data.status){
                    showmsg(tab.id, data.info);

                    if(!$.isPlainObject(data.tab)){
                        $export.parent().children().removeClass("disabled");
                        $export.html("备份完成，点击重新备份");
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                    backup(data.tab, tab.id != data.tab.id);
                } else {
                    updateAlert(data.info,'alert-error');
                    $export.parent().children().removeClass("disabled");
                    $export.html("立即备份");
                    setTimeout(function(){
    	                $('#top-alert').find('button').click();
    	                $(that).removeClass('disabled').prop('disabled',false);
    	            },1500);
                }
            }, "json");

        }

        function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
    })(jQuery);
    </script>
</block>
</div>


</body>
</html>