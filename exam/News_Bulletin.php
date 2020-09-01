<?php
require_once 'top.php';

//输出新闻
$News = $adminDB->executeSQL("select id,title from tb_news ", $connID);
$smarty->assign('News', $News);				//输出工种
if(isset($_GET['news_id']) && $_GET['news_id']!=""){
	$arrayNews = $adminDB->executeSQL("select * from tb_news where id='".$_GET['news_id']."' ", $connID);
	$smarty->assign('arrayNews', $arrayNews);			//输出考题题型	
	$smarty->assign('Bulletin_New', "T");	//输出考题题型	
}

//输出公告
$Bulletin = $adminDB->executeSQL("select id,title from tb_bulletin ", $connID);
$smarty->assign('Bulletins', $Bulletin);				//输出工种
if(isset($_GET['bulletin_id']) && $_GET['bulletin_id']!=""){
	$arrayBulletin = $adminDB->executeSQL("select * from tb_bulletin where id='".$_GET['bulletin_id']."' ", $connID);
	$smarty->assign('arrayBulletin', $arrayBulletin);	//输出考题题型	
	$smarty->assign('Bulletin_New', "T");	//输出考题题型	
}	

//指定模板页
$smarty->display('News_Bulletin.phtml');
require_once 'bottom.php';
