<?php
require("system.smarty.inc.php");	//包含Smarty配置类
require("system.class.inc.php");	//包含数据库连接和操作类

$connobj=new ConnDB("sqlsrv","localhost","sa","123456","db_office");//数据库连接类实例化
$conn=$connobj->GetConnId();		//执行连接操作，返回连接标识

$admindb=new AdminDB();//数据库操作类实例化


$usefun=new UseFun();//使用常用函数类实例化

$smarty=new SmartyProject();//调用smarty模板


function unhtml($params){
  extract($params);
  $text=$content;
  global $usefun;
  return $usefun->UnHtml($text);
}
$smarty->register_function("unhtml","unhtml");		//注册模板函数

function charsetUTF8($params) {							//创建模板函数
	extract($params);									//读取数据
	$str=iconv("gb2312","utf-8",$text);
	return $str;										//返回截取结果
}
$smarty->register_function("Util", "charsetUTF8");	   				//注册模板函数

function chkGroup($params){							//创建模板函数
	extract($params);									//读取数据
	$p_list = split(",",$text);
	for($i=0;$i<count($p_list);$i++){
		if($_SESSION['u_group'] == $p_list[$i]){
			$bool = "";
			break;
		}else if($_SESSION['u_group'] != $p_list[$i] && $p_list[$i]=='0'){
			$bool = "";
			break;
		}else{
			$bool = "none";		
		}
	}	
	return $bool;										//返回截取结果
}
$smarty->register_function("Group", "chkGroup");	   				//注册模板函数
?>