<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

$tb_exam_type = $adminDB->executeSQL("select * from tb_exam_type order by id", $connID);
$smarty->assign('tb_exam_type', $tb_exam_type);
$pageSize = 20;

if($_POST['pro_class'] == 0){
    $sql = "select * from tb_exam_problem where isactive=1";
}elseif(isset($_POST['pro_class']) && $_POST['pro_class'] != 0){
    $sql = "select * from tb_exam_problem where isactive=1 and pro_class=".$_POST['pro_class'];
}


//$isCheckedArray = array();
$problem = array();
$count = array();
foreach($tb_exam_type as $etype){

    $cond = " and pro_type='".$etype['english']."' limit ".$pageSize;
    if($_POST['pro_class'] == 0){
        $countsql = "select count(*) from tb_exam_problem where pro_type='".$etype['english']."'";
    }else{
        $countsql = "select count(*) from tb_exam_problem where pro_type='".$etype['english']."' and pro_class=".$_POST['pro_class'];
    }
    $c = $adminDB->executeSQL($countsql, $connID);
    $count[$etype['english']] = $c[0][0];
    $problem[$etype['english']] = $adminDB->executeSQL($sql.$cond, $connID);
}


    $offset = $_POST['offset'];
    $size = ($offset - 1) * $pageSize;
    $problem[$_POST['type']] = $adminDB->executeSQL($sql." and pro_type='".$_POST['type']."' limit ".$size.",".$pageSize, $connID);
    $smarty->assign('problem', $problem);

    $smarty->assign('emtype', $_POST['type']);
    echo json_encode($count);//记录总数
    echo json_encode("***");
    echo $smarty->display('getproquestions.phtml');//数据记录
?>


