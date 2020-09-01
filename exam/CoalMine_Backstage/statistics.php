<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//
//
$tools = new Tools();
$emtypes = $tools->getExamtypeIdArr();
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
    $i = 1;
} else {
    $page = $_GET['page'];
    $i = $_GET['i'];
}
$smarty->assign('i', $i);
$smarty->assign('emtypes', $emtypes);
$isshow = 'F';
$pid = 0;
if (isset($_POST['submit']) && $_POST['submit'] != '') {
    $examtypes = getExamtypes();
    if(isset($_POST['pro_class']) && $_POST['pro_class'] != 0){
        $pnsql = "select tw.typename,et.chinese,tp.pro_type,tp.pro_class,count(*) c from tb_exam_problem tp,tb_types_work tw,tb_exam_type et where tp.pro_class=".$_POST['pro_class'] ." and et.english=tp.pro_type and tw.id=tp.pro_class GROUP BY tp.pro_type";
        $exam_problem = $adminDB->executeSQL($pnsql, $connID);
        $pid = $_POST['pro_class'];
        $smarty->assign('exam_problem', $exam_problem);
        $isshow = "T";
    }
}


//
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
$allsql = "select tw.typename,et.chinese,tp.pro_type,tp.pro_class,count(*) c from tb_exam_problem tp,tb_types_work tw,tb_exam_type et where et.english=tp.pro_type and tw.id=tp.pro_class GROUP BY tp.pro_class,tp.pro_type order by tp.pro_class,field(tp.pro_type,'radio','checkbox','fill','judgment')";
$typenumArr = $adminDB->executeSQL($allsql, $connID);
$smarty->assign('typenumArr',$typenumArr);
$bcjyzs = $pageDB->pageData($allsql, $connID, 20, $page, 10);
$smarty->assign('bcjyzs', $bcjyzs);
$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames,$pid);
$smarty->assign('displayType',$displayType);

//
$tb_exam_type = array();
$examNames = $adminDB->executeSQL("select * from tb_exam_type  order by addtime", $connID);
$displayExamType = $tools->getExamType($examNames,'en');
$smarty->assign('tb_exam_type',  $displayExamType);
$smarty->assign('examNames',  $examNames);
$smarty->assign('isshow', $isshow);
$smarty->display('statistics.phtml');

function getExamtypes(){
    global $adminDB;
    global $connID;
    $examtypeArr = array();
    $examtypes = $adminDB->executeSQL("select * from tb_exam_type", $connID);
    foreach($examtypes as $examtype){
        $examtypeArr[$examtype['chinese']] = $examtype['english'];
    }
    return $examtypeArr;
}