<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';


if (isset($_GET['years'])) {
    $years = $_GET['years'];
} else {
    $years = date('Y');
}
$smarty->assign('years', $years);

if (isset($_GET['months'])) {
    $months = $_GET['months'];
} else {
    $months = date('m');
}
$smarty->assign('months', $months);

if (isset($_GET['days'])) {
    $days = $_GET['days'];
} else {
    $days = date('d');
}
$smarty->assign('days', $days);


$arrayYear = array();
for ($i = 1980; $i < 2050; $i ++) {
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

//判断分页变量是否存在
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}

//判断是否执行查询操作
if(isset($_POST['submit']) && $_POST['submit']!=""){
    $where = " where id > 0 ";
    
    if($_POST['pro_class']!=''){
        $where.=" and pro_class like '%".$_POST['pro_class']."%' ";
    }
    if($_POST['title']!=''){
        $where.=" and title like '%".$_POST['title']."%' ";
    }
    if($_POST['year']!='-1'){
        $f = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
        $t = $_POST['years'].'-'.$_POST['months'].'-'.$_POST['days']; 
        $where.=" and addtime >= '".$f."' and addtime <= '".$t."' ";
    }
    $sql = "select * from tb_knowledge ".$where." order by addtime desc";
	$smarty->assign('sql', $sql);	//将定义的SQL语句赋给模板变量
}else{
	//如果不是执行查询操作，则判断超级链接是否提交了查询变量
	//如果查询变量sql存在，则根据超级链接传递的SQL执行查询操作，否则执行默认的查询语句
	if(isset($_GET['sql']) && $_GET['sql']!=""){
		$sql= stripcslashes($_GET['sql']);			//对超级链接传递的SQL语句进行转义
	}else{
		$sql="select * from tb_knowledge order by id desc ";
	}	
	$smarty->assign('sql', $sql);
}
	$bcjyzs = $pageDB->pageData($sql, $connID, 20, $page, 10);
	$smarty->assign('bcjyzs', $bcjyzs);
	

//
$smarty->display('afindbccdinfo.phtml');