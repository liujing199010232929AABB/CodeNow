<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,admin" />
<script language="javascript">
function searchIndex(value , array){
	for(i=0; i<array.length; i++){
		if(array[i]==value)return i;
	}
}
function startCreat(mark , allmark){
	var globalmark = 0;    ////初始值
	var startid=$("#startid").val();
	var endid=$("#endid").val();
	if(startid>0 && endid<1){alert("生成条数必须大于0");return false;}
	var  data = { rand: Math.random(),mark: mark,startid: startid,endid: endid };
	$.ajax( {type: "get",url: "<php>echo U('Build/startMobileCreat');</php>",cache: false,data:data ,dataType: "json",async:true
		,error: function() { alert("Error loading document"); }
		,success: function(data) {
			if(data==0 || data==null){
				alert("参数有误！");return false;
			}
			jsonCode = data.ids;
			if(data==0 || jsonCode==null){
				alert("没有信息不需要生成静态页！");return false;
			}
			jsonCodeLength = jsonCode.length;
			var start = 0;
			var htmlUrl=data.htmlUrl;
			var t = setInterval( function() {
				if ( start <  jsonCodeLength) {
					objId = jsonCode[start].id;
					data = { rand: Math.random(),id: objId };
					$.ajax({type:"GET", url:htmlUrl , data:data ,  dataType:"text",async:true,success:function(data){
						pct = parseInt(start/jsonCodeLength*100);
						$(".progress-number").html(mark + "栏目已完成" + pct + "%");
						$(".pct-gif,.pct-gif-shadow").css({"width":pct/100 * 384+"px"});
					}});
					start++;
				}else {
					window.clearInterval(t);
					$(".progress-number").html(mark + "栏目已完成100%");
					$(".pct-gif,.pct-gif-shadow").css({"width":"384px"});
					if(allmark != null){
						var markArray = allmark.split("#");
						var markLength = markArray.length;	
						var markIndex = searchIndex(mark,markArray);	
						if(markIndex < markLength-1){
							startCreat(markArray[markIndex+1] , allmark);
							return false;
						}
					}
					alert('全部生成完毕!!');
					//$(".progress-number").html("全部生成完毕！");
				}
			} , 500 );
			
		} // success
		
	} );

}
</script>
</head>

<body>
<include file="Inc/head" />
<if condition="$mobilePower gt 0">
<div class="pcmobile">
<a href="{:U('Build/creatHtml')}">PC 站</a>
<a href="{:U('Build/creatMobileHtml')}" class="hover">手机站</a>
</div>
</if>
<p class="progress-number" id="progress-number"></p>
<div class="pct-gif-box1">
    <div class="pct-gif"></div>
</div>
<div class="pct-gif-box2">
    <div class="pct-gif-shadow"></div>
</div>
<div class="creat-html-btns">
	开始位置：<input type="text" name="startid" id="startid" value="0" style="cursor:auto" />
    生成条数：<input type="text" name="endid" id="endid" value="0" style="cursor:auto" />
    <BR />
    <foreach name="htmlArray" key="key" item="item">
        <input type="button" class="mou-p" value="{$item['title']}({$key})" onclick="javascript:startCreat('{$key}');" id="btn_{$key}" />
    </foreach>
    <input type="button" class="mou-p" value="全部生成" onclick="javascript:startCreat('{$markArray[0]}','{$markArray|implode='#'}');" />
</div>
</body>
</html>
