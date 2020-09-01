<?php
require_once 'top.php';

$examType = $adminDB->executeSQL("select distinct pro_class from tb_knowledge ", $connID);
$smarty->assign('examType', $examType);		//输出考题题型


$examTypes = $adminDB->executeSQL("select id,title,pro_class from tb_knowledge ", $connID);
$smarty->assign('examTypes', $examTypes);		//输出考题题型

if(isset($_GET['know_id']) && $_GET['know_id']!=""){
	$arrayExams = $adminDB->executeSQL("select * from tb_knowledge where id='".$_GET['know_id']."' ", $connID);
	$smarty->assign('arrayExams', $arrayExams);		//输出考题题型	
}else{
	$smarty->assign('array', "F");		//输出考题题型	
}

//指定模板页
$smarty->display('Training.phtml');
 require_once 'bottom.php';
