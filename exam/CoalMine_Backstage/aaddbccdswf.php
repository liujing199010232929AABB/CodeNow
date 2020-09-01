<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//输出工种到下拉列表
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);

//
$tb_exam_type = array();
$examNames = $adminDB->executeSQL("select id, chinese,english,pid,addtime from tb_exam_type  order by addtime", $connID);

$displayExamType = $tools->getExamType($examNames,'en');
$smarty->assign('tb_exam_type',  $displayExamType);

$degreeArr = array();
$degree = $adminDB->executeSQL("select * from tb_degree  order by id", $connID);

if(count($degree)){
    foreach($degree as $d){
        $degreeArr[$d['id']] = $d['name'];
    }
}
$smarty->assign('degreeArr',  $degreeArr);

//
//echo "insert into tb_exam_problem(content,answer,fraction,pro_type, pro_class,upload_date,resolve) values('" . $_POST['content'] . "', '" . $_POST['answer'] . "', '" . $_POST['fraction'] . "','".$_POST['pro_type']."', '".$_POST['pro_class']."', '" . date("Y-m-d ") . "', '".$_POST['resolve']."')";
$address = "";
if (isset($_POST['content']) && $_POST['content'] != '') {
	if(isset($_POST['search_list']) && $_POST['search_list']!=""){
		$search_list=$_POST['search_list'];
	}else{
		$search_list=0;
	}
    if (isset($_FILES["sound"]["name"]) && $_FILES["sound"]["name"] != '') {
        $dir = "./upfiles/sounds";
        if (! is_dir($dir)) {
            mkdir($dir);
        }
        $upfilename = $_FILES["sound"]["name"];
        $soundname = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strrpos($upfilename, "."), strlen($upfilename) - strrpos($upfilename, "."));
        $address = $dir . "/" . $soundname;
        @move_uploaded_file($_FILES["sound"]["tmp_name"], $address);
    }
	if (! $adminDB->executeSQL("insert into tb_exam_problem(content,search_list,answer,fraction,pro_type, pro_class,upload_date,resolve,isactive,degreeid,sound,mustknown) values('" . $_POST['content'] . "', '" . $search_list . "','" . $_POST['answer'] . "', '" . $_POST['fraction'] . "','".$_POST['pro_type']."', '".$_POST['pro_class']."', '" . date("Y-m-d ") . "', '".$_POST['resolve']."','".$_POST['isactive']."',".$_POST['degree'].",'".$address."',".$_POST['mustknow'].")", $connID)) {
        echo "<script>alert('考题信息添加失败！');</script>";
    } else {
        echo "<script>alert('考题信息添加成功！');</script>";
    }
    echo "<script>location=location;</script>";
}
//
$smarty->display('aaddbccdswf.phtml');