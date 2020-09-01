<?php
$conn=mysql_connect("localhost","root","111");		//连接数据库服务器
mysql_select_db("db_colliery",$conn);					//连接指定的数据库
mysql_query("set names utf8");						//对数据库中的编码格式进行转换,避免出现中文乱码的问题

define('PATH',$_SERVER['DOCUMENT_ROOT']);						//服务器目录
define('ROOT','/meikuang/');								//论坛根目录
define('ADMIN','CoalMine_Backstage/');									//后台目录
define('BAK','sqlbak/');									//备份目录
define('MYSQLPATH','F:/AppServ/MySQL/bin/');	//mysql执行文件路径
define('MYSQLDATA','db_colliery');								//mysql数据库
define('MYSQLHOST','localhost');							//mysql服务器ip
define('MYSQLUSER','root');									//mysql账号
define('MYSQLPWD','111');									//mysql密码

function show_file($f_name){
	$d_open = opendir($f_name);
	$num = 0;
	while($file = readdir($d_open)){
		$filename[$num] = $file;
		$num++; 
	}
	closedir($d_open);
	return $filename;
}
?>