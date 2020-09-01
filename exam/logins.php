<?php
require_once 'lzh.inc.php';
//输出考题下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id,title, dates from tb_mockexaminations order by id desc", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['title'];
}
$smarty->assign('arrayBccdnames', $arrayBccdnames);		//输出考题下拉列表
if(isset($_POST['select_exam']) && $_POST['select_exam']!=""){
		$_SESSION['exam_id']=$_POST['select_exam'];		//定义登录用户选择的考试科目
        $_SESSION['proid'] = $_POST['select_exam'];
		echo "<script>window.location.href='wait_exams.php';</script>";
}
$smarty->display('logins.phtml');