<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

$pid = 0;

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

if (! isset($_GET['flag']) || $_GET['flag'] == '') {
    $flag = 'f';
} else {
    $flag = $_GET['flag'];
}

//判断是否执行查询操作
if(isset($_POST['submit']) && $_POST['submit']!="" || $flag == "t"){
    $where = " where id > 0 ";

    if(($_POST['name']!='' && $flag == 'f') || isset($_GET['name'])){
        if(isset($_GET['name']) && $_GET['name']!=''){
            $name =  $_GET['name'];
        }else{
            $name =  $_POST['name'];
        }
        $where.=" and name like '%".$name."%' ";
        $smarty->assign('sname', $name);
    }
    if((isset($_POST['tel']) && $_POST['tel']!='' && $flag == 'f') || isset($_GET['tel'])){
        if(isset($_GET['tel']) && $_GET['tel']!=''){
            $tel =  $_GET['tel'];
        }else{
            $tel =  $_POST['tel'];
        }
        $where.=" and tel like '%".$tel."%' ";
        $smarty->assign('stel', $tel);
    }
    if((isset($_POST['pro_class']) && $_POST['pro_class']!='-1' && $flag == 'f') || isset($_GET['pro_class'])){
        if(isset($_GET['pro_class']) && $_GET['pro_class']!=''){
            $pro_class =  $_GET['pro_class'];
        }else{
            $pro_class =  $_POST['pro_class'];
        }
        $where.=" and typework = '".$pro_class."' ";
        $pid = $pro_class;
        $smarty->assign('spro_class', $pro_class);
    }
    if((isset($_POST['address']) && $_POST['address']!='' && $flag == 'f') || isset($_GET['address'])){
        if(isset($_GET['address']) && $_GET['address']!=''){
            $address =  $_GET['address'];
        }else{
            $address =  $_POST['address'];
        }
        $where.=" and address like '%".$address."%' ";
        $smarty->assign('saddr', $address);
     }
	 
    if((isset($_POST['ID_number']) && $_POST['ID_number']!='' && $flag == 'f') || isset($_GET['ID_number'])){
        if(isset($_GET['ID_number']) && $_GET['ID_number']!=''){
            $ID_number =  $_GET['ID_number'];
        }else{
            $ID_number =  $_POST['ID_number'];
        }
        $where.=" and ID_number = '".$ID_number."' ";
        $smarty->assign('sidnum', $ID_number);
    }
    if((isset($_POST['admission']) && $_POST['admission']!='' && $flag == 'f') || isset($_GET['admission'])){
        if(isset($_GET['admission']) && $_GET['admission']!=''){
            $admission =  $_GET['admission'];
        }else{
            $admission =  $_POST['admission'];
        }
        $where.=" and admission = '".$admission."' ";
        $smarty->assign('sadmiss', $admission);
    }
    if((isset($_POST['post']) && $_POST['post']!='' && $flag == 'f') || isset($_GET['post'])){
        if(isset($_GET['post']) && $_GET['post']!=''){
            $post =  $_GET['post'];
        }else{
            $post =  $_POST['post'];
        }
        $where.=" and post = '".$post."' ";
        $smarty->assign('spost', $post);
    }
    if(($_POST['year']!='-1' && $flag == 'f') || $flag == 't'){

        if($flag == 't'){
            $syear =  $_GET['year'];
            $smonth = $_GET['month'];
            $sday = $_GET['day'];
            $syears = $_GET['years'];
            $smonths = $_GET['months'];
            $sdays = $_GET['days'];
        }else{
            $syear =  $_POST['year'];
            $smonth = $_POST['month'];
            $sday = $_POST['day'];
            $syears = $_POST['years'];
            $smonths = $_POST['months'];
            $sdays = $_POST['days'];
        }
        $f = $syear.'-'.$smonth.'-'.$sday;
        $t = $syears.'-'.$smonths.'-'.$sdays;
        $where.=" and dates >= '".$f."' and dates <= '".$t."' ";
        $yearparams = "&year=".$syear."&month=".$smonth."&day=".$sday."&years=".$syears."&months=".$smonths."&days=".$sdays;
        $smarty->assign('syear', $syear);
        $smarty->assign('smonth', $smonth);
        $smarty->assign('sday', $sday);
        $smarty->assign('syears', $syears);
        $smarty->assign('smonths', $smonths);
        $smarty->assign('sdays', $sdays);
        $smarty->assign('yearparams', $yearparams);

    }
    if((isset($_POST['units']) && $_POST['units']!='' && $flag == 'f') || isset($_GET['units'])){
        if(isset($_GET['units']) && $_GET['units']!=''){
            $units =  $_GET['units'];
        }else{
            $units =  $_POST['units'];
        }
        $where.=" and unit like '%".$units."%' ";
        $smarty->assign('sunits',$units);
    }
    $sql = "select * from tb_user ".$where." order by dates desc";
//    echo $sql;exit;
    $flag = "t";
}else{
    $sql="select * from tb_user order by id desc ";
}
$smarty->assign('flag',$flag);
$arrayBccdnames = array();		//完成类别的输出，输出到下拉列表
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['typename'];
}
$smarty->assign('arrayBccdnames1', $bccdNames);
$smarty->assign('arrayBccdnames', $arrayBccdnames);

$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames,$pid);
$smarty->assign('displayType',$displayType);
	$bcjyzs = $pageDB->pageData($sql, $connID, 20, $page, 10);
	$smarty->assign('bcjyzs', $bcjyzs);
	

//
$smarty->display('afindbccdserver.phtml');