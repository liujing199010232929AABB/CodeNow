<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);

$titles = $adminDB->executeSQL("select id, title, exam_user from tb_examination", $connID);	//从试卷数据表中查询出指定的数据
$examArr = array();
$worktypeArr = getWorktypes();
foreach($titles as $title){
    $examArr[$title['id']] = $title['title'];
}
$smarty->assign('titles', $examArr);

$examination_id = isset($_GET['examination_id'])?$_GET['examination_id']:0;
$smarty->assign('examination_id', $examination_id);

if(isset($_GET['pro']) && $_GET['pro']=="T"){
    $pro = $adminDB->executeSQL("select distinct pro_class from tb_examination_user where examination_id='".$examination_id."' ", $connID);	//从数据库中查询出考题数据
    for($i=0; $i<count($pro);$i++){
        $tb_exam = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$examination_id."' and pro_class='".$pro[$i]['pro_class']."' ", $connID); //从数据库中查询出考题数据
        $pro[$i]['counts']=$tb_exam[0][0];
        $pro[$i]['typename']=$worktypeArr[$pro[$i]['pro_class']];
    }
    $smarty->assign('pro', $pro);
    $smarty->assign('pros', 'T');
}
if(isset($_GET['pro']) && $_GET['pro']=="F"){
    $smarty->assign('prof', 'F');
}

$smarty->display('fractionstatistics.phtml');
function getWorktypes(){
    global $adminDB;
    global $connID;
    $worktypeArr = array();
    $worktypes = $adminDB->executeSQL("select * from tb_types_work", $connID);
    foreach($worktypes as $worktype){
        $worktypeArr[$worktype['id']] = $worktype['typename'];
    }
    return $worktypeArr;
}