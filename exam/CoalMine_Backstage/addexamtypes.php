<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

$tb_exam_type = array();
$examNames = $adminDB->executeSQL("select id, chinese,english,pid from tb_exam_type  where pid=0 order by addtime", $connID);
$tools = new Tools();
$displayExamType = $tools->getExamType($examNames,'id');
$smarty->assign('tb_exam_type',  $displayExamType);
if (isset($_POST['chinese']) && $_POST['chinese'] != '' && isset($_POST['english']) && $_POST['english'] != '') {
    if (! $adminDB->executeSQL("select id, chinese from tb_exam_type where english='".$_POST['english']."' or chinese='" . trim($_POST['chinese']) . "'", $connID)) {
        if (! $adminDB->executeSQL("insert into tb_exam_type(chinese,english, addtime, pid) values('" . trim($_POST['chinese']) . "','".trim($_POST['english'])."','" . date('Y-m-d') . "',".$_POST['pro_type'].")", $connID)) {
            echo "<script>alert('题型添加失败！');</script>";
        } else {
            echo "<script>alert('题型添加成功！');</script>";
            echo "<script>location=location;</script>";
        }
    } else {
        echo "<script>alert('该题型已经存在！');</script>";
    }
}
$smarty->display('addexamtypes.phtml');