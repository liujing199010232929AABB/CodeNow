<?php
require_once 'top.php';
if(isset($_POST['searches']) && $_POST['searches']!=""){		//获取查询的关键字
	$_SESSION['searches']=$_POST['searches'];					//将查询的关键字赋给SESSION变量
}
$type=array();
$examTypes = $adminDB->executeSQL("select id,title,pro_class from tb_knowledge where title like '%" . $_SESSION['searches'] . "%' ", $connID);	//执行查询操作
for($i=0; $i<count($examTypes); $i++){
	$type[]=$examTypes[$i]['pro_class'];						//一级标题
}

$types=array_unique($type);							//去除重复数据
$smarty->assign('types', $types);					//输出考题题型
//print_r($types);exit;
$smarty->assign('examTypes', $examTypes);			//输出查询到的数据

//输出考题下拉列表
$typeNames = $adminDB->executeSQL("select id,typename from tb_types_work ", $connID);
$smarty->assign('typeNames', $typeNames);			//输出工种

//输出指定内容
if(isset($_GET['know_id']) && $_GET['know_id']!=""){
    $dir = "./CoalMine_Backstage/upfiles/Trainingmaterials/";
	$arrayExams = $adminDB->executeSQL("select * from tb_knowledge where id='".$_GET['know_id']."' ", $connID);
	$smarty->assign('arrayExams', $arrayExams);		//输出考题题型
//    $dir = "./CoalMine_Backstage/upfiles/Trainingmaterials/";
//    $source = $arrayExams[0]['attachment'];
//    $fileInfo = pathinfo($source);
//    $filename = $fileInfo['filename'];
//    $fname = $filename.".doc";
////    echo $fname;exit;
//    if(!file_exists($fname)){
//        copy($dir.$source,$dir.$fname);
//    }
    $smarty->assign('fname', $fname);
}else{
	$smarty->assign('array', "F");					//输出考题题型	
}

//指定模板页
$smarty->display('search_Training.phtml');
require_once 'bottom.php';
