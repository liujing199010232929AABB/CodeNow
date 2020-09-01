<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include "../inc/check.php";	//包含权限检查文件
?>
<!--引入JS脚本文件-->
<script src="../js/admin_js.js"></script>
<!--引入外部CSS样式文件-->
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<table width="765" height="450" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px;">
<tr>
	<td align="center" valign="middle">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" height="30" align="center" valign="middle">
				<a href="del_slog_chk.php" onClick="return del_chk();">清除日志</a>
			</td>
		</tr>
		<tr>
			<td height="25" align="center">登录账号</td>
			<td height="25" align="center">登录时间</td>
			<td height="25" align="center">登录IP</td>
			<td height="25" align="center">登录操作</td>
		</tr>
		<?php
			$filename =  "../log.txt";				//日志文件路径

			if($f_open = fopen($filename,"r"))		//是否以只读形式打开文件
			{
				while($str = fgets($f_open,255)){	//按行读取日志文件内容
					$chr = split(",",$str);
					echo "<tr>";
					for($i = 0; $i < count($chr); $i++){	//循环输出字段值
						echo "<td align='center' height='25'>".$chr[$i]."</td>";
					}
					echo "</tr>";
				}
				fclose($f_open);	//关闭文件
			}
			else					//如果没有日志文件时
				echo "<script>alert('还没有日志文件！');history.go(-1);</script>";
		?>
	</table>
</td>
</tr>
</table>
</body>
</html>
