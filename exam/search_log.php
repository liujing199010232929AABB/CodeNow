<?php
require_once 'lzh.inc.php';


    $years = date('Y');

$smarty->assign('years', $years);

    $months = date('m');

$smarty->assign('months', $months);


    $days = date('d');

$smarty->assign('days', $days);

$arrayYear = array();

for ($i = 2000; $i < 2050; $i ++) {
    $arrayYear[$i] = $i;
}
for($m=1; $m<=12; $m++){
    if($m<10){
        $arrayMonth['0'.$m]="0".$m;
    }else{
        $arrayMonth[$m]=$m;
    }
}
for($d=1; $d<=31; $d++){
    if($d<10){
        $arrayDay['0'.$d]="0".$d;
    }else{
        $arrayDay[$d]=$d;
    }
}

$smarty->assign('arrayYear', $arrayYear);
$smarty->assign('arrayMonth', $arrayMonth);
$smarty->assign('arrayDay', $arrayDay);
$exam_type = array(
    "radio"=>"单选",
"checkbox"=>"多选",
"judgment"=>"判断",
"explain"=>"名词解释",
"answer"=>"问答"
);
$types = array("s"=>"专项练习","r"=>"随机问答");
$smarty->assign('exam_type', $exam_type);
$smarty->assign('types', $types);
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
if(isset($_POST['submit']) && $_POST['submit'] !="" || (isset($_GET['page']) && $_GET['page'] != '')){
	$years=isset($_POST['years'])?$_POST['years']:"";
	$months=isset($_POST['months'])?$_POST['months']:"";
	$days=isset($_POST['days'])?$_POST['days']:"";
	$year=isset($_POST['year'])?$_POST['year']:"";
	$month=isset($_POST['month'])?$_POST['month']:"";
	$day=isset($_POST['day'])?$_POST['day']:"";
    $start_time1=$years.'-'.$months.'-'.$days;
    $end_time1=$year.'-'.$month.'-'.$day;
    $start_time = isset($_GET['start_time'])?$_GET['start_time']:$start_time1;
    $end_time = isset($_GET['end_time'])?$_GET['end_time']:$end_time1;
    $sql = "select * from tb_useranswer where addtime >='".$start_time."' and addtime <='".$end_time."' order by addtime desc";
//    $logs = $adminDB->executeSQL($sql, $connID);
    $bcjyzs = $pageDB->pageData($sql, $connID, 20, $page, 10);
//    $smarty->assign('logs', $logs);
    $smarty->assign('bcjyzs', $bcjyzs);
    $smarty->assign('start_time', $start_time);
    $smarty->assign('end_time', $end_time);
	$smarty->assign('Search', "T");		//输出考题题型
}else{
	$smarty->assign('Search', "F");		//输出考题题型
}

//指定模板页
$smarty->display('search_log.phtml');
