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
        <h2  class="fc">数据还原</h2>
        <div class="clear"></div>
    </div>
    <!-- /标题栏 -->

    <!-- 应用列表 -->
    <div class="data-table table-striped">
        <table width="100%">
<thead>
                <tr>
                    <th width="22%" height="25"  align="center" class="data-text">备份名称</th>
                  <th width="14%"  align="center" class="data-text">卷数</th>
                  <th width="10%"  align="center" class="data-text">压缩</th>
                  <th width="14%"  align="center" class="data-text">数据大小</th>
                  <th width="14%"  align="center" class="data-text">备份时间</th>
                  <th width="10%"  align="center" class="data-text">状态</th>
                  <th width="16%"  align="center" class="data-text">操作</th>
        </tr>
            </thead>
            <tbody>
                <volist name="list" id="data">
                    <tr>
                        <td height="22" align="center"><span  class="data-red">{$data.time|date='Ymd-His',###}<span></td>
                        <td align="center">{$data.part}</td>
                        <td align="center">{$data.compress}</td>
                        <td align="center">{$data.size|format_bytes}</td>
                        <td align="center">{$key}</td>
                        <td align="center">-</td>
                        <td class="action" align="center">
                        <div class="zcq">
                            <a href="__DATA__/{$data.time|date='Ymd-His',###}-{$data.part}.sql.gz" target="_blank" class="data-a3">下载</a>&nbsp;
                            <a class="db-import data-a1" href="{:U('import?time='.$data['time'])}" >还原</a>&nbsp;
                            <a class="ajax-get confirm data-a2" href="{:U('del?time='.$data['time'])}" onclick="if(confirm('你确认删除吗？')){return;}else{return false;}"  >删除</a>
                            </div>
                        </td>
                    </tr>
                </volist>
            </tbody>
        </table>
  </div>

<block name="script">
    <script type="text/javascript">
        $(".db-import").click(function(){
			if(!confirm('你确认还原吗？')){return false;}
            var self = this, status = ".";
            $.get(self.href, success, "json");
            window.onbeforeunload = function(){ return "正在还原数据库，请不要关闭！" }
            return false;
        
            function success(data){
			
                if(data.status){
                    if(data.gz){
                        data.info += status;
                        if(status.length === 5){
                            status = ".";
                        } else {
                            status += ".";
                        }
                    }
                    $(self).parent().parent().prev().text(data.info);
					
                    if(data.part){
                        $.get(self.href, 
                            {"part" : data.part, "start" : data.start}, 
                            success, 
                            "json"
                        );
                    }  else {
                        window.onbeforeunload = function(){ return null; }
                    }
                } else {
					alert(data.info);
					return false;
                }
            }
        });
    </script>
</block>
</div>


</body>
</html>