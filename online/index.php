<?php
header("content-type:text/html;charset=utf-8");  //添加charset=utf-8
session_start();            			//启动Session
?>
<script src="js/chk.js"></script>
<script type="text/javascript">
	function chk_see(){
		var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//为变量赋值
		if(name == ""){             	//如果变量name的值为空
			alert('只有会员才能观看影片，请登录！');//弹出对话框
			return false;           		//返回false，使用户无法观看影片
		}else{
			return true;            		//返回true，会员可以观看影片
		}
	}
	function chk_listen(){
		var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//为变量赋值
		if(name == ""){             	//如果变量name的值为空
			alert('只有会员才能播放歌曲，请登录！');//弹出对话框
			return false;           		//返回false，使用户无法播放歌曲
		}else{
			return true;            		//返回true，会员可以播放歌曲
		}
	}
</script>

<link rel="stylesheet" href="css/style.css" />
<body onLoad="setInterval('changeimage()',3000)">
<?php
include "top.php";            			//引入logo、导航页面
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  <tr>
	  <td>&nbsp;</td>
    <td width="960" valign="top">
<?php
	include "main.php";			//引入主显示页面
?>
	</td>
	<td width="240" valign="top">
<?php
	include "right.php";			//引入电影榜、歌曲排行榜页面
?>
	</td>
	  <td>&nbsp;</td>
  </tr>
</table>
<?php
	include "bottom.php";			//引入版权信息、联系方式页面
?>
</body>

