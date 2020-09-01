<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//

$smarty->assign('years', date('Y'));

$smarty->assign('months', date('m'));

$smarty->assign('days',date('d'));

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

//输出工种到下拉列表
$bccdNames = $adminDB->executeSQL("select id, typename,pid from tb_types_work  order by addtime", $connID);
$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);

if(isset($_GET['examination_id']) && $_GET['examination_id']!=""){
	$examination_id=$_GET['examination_id'];			//获取对应试卷的ID
}else{
	$examination_id=$_POST['examination_id'];			//获取对应试卷的ID
}

$titles = $adminDB->executeSQL("select id, title, exam_user from tb_mockexaminations where id='".$examination_id."'", $connID);		//从试卷数据表中查询出指定的数据
$smarty->assign('titles', $titles);

if (isset($_POST['submit']) && $_POST['submit']) {
	
	  $where = " where examination_id='".$_POST['examination_id']."' ";
    
    if($_POST['pro_class']!=''){
        $where.=" and pro_class like '%".$_POST['pro_class']."%' ";
    }
    if($_POST['name']!=''){
        $where.=" and name like '%".$_POST['name']."%' ";
    }
    if($_POST['years']!=''){
    	$sub_time=$_POST['years'].'-'.$_POST['months'].'-'.$_POST['days']; 
        $where.=" and sub_time like '".$sub_time."%' ";
    }
	$sql = "select * from tb_mockexaminations_user ".$where;
	$search=$adminDB->executeSQL($sql, $connID);
	if ($search) {
		$smarty->assign("search_count",count($search));														//将查询结果数量赋给模板变量	
		$smarty->assign("search_res",$search);														//将考题内容赋给模板变量	
    	$smarty->assign('search', 't');	
    } else {
        echo '<script>alert("查询结果为空！")</script>';
    }
}

if (isset($_POST['no_submit']) && $_POST['no_submit'] != '' ) {
    $search=$adminDB->executeSQL("select * from tb_mockexaminations_user where examination_id='".$_POST['examination_id']."' and fraction < '" . $_POST['no'] . "' order by fraction desc ", $connID);
	if ($search) {
		$smarty->assign("search_count",count($search));														//将查询结果数量赋给模板变量	
		$smarty->assign("search_res",$search);														//将考题内容赋给模板变量	
    	$smarty->assign('search', 't');	
    } else {
        echo '<script>alert("查询结果为空！")</script>';
    }
}

//
//

if (isset($_GET['delete']) && $_GET['delete'] == 't' && isset($_GET['id']) && $_GET['id']!="") {

if($_SESSION['permissions']==2 or $_SESSION['permissions']==3){
    if ($adminDB->executeSQL("delete from tb_mockexaminations_user where id='" . $_GET['id'] . "'", $connID)) {
        echo '<script>alert("试卷删除成功！"); window.location.href="alookmockexaminations.php?examination_id='.$_GET['examination_id'].'&big_type='.$_GET['big_type'].'&small_type='.$_GET['small_type'].'";</script>';
    } else {
        echo '<script>alert("试卷删除失败！")</script>';
    }

}else{
	echo '<script>alert("您不是管理员，不具备删除试卷功能！"); window.location.href="alookmockexaminations.php?examination_id='.$_GET['examination_id'].'&big_type='.$_GET['big_type'].'&small_type='.$_GET['small_type'].'";</script>';
}

}


//
if (isset($_GET['edit']) && $_GET['edit'] == 't') {	
	$bccdNames = $adminDB->executeSQL("select * from tb_mockexaminations_user where id='" . $_GET['id'] . "'", $connID);	//查询出指定人员的考试数据

	$smarty->assign("name",$bccdNames[0]['name']);	//将他的成绩赋给模板变量				
	$smarty->assign("title",$bccdNames[0]['title']);	//将他的成绩赋给模板变量				
	$smarty->assign("fraction",$bccdNames[0]['fraction']);	//将他的成绩赋给模板变量				
	$smarty->assign("pro_class",$bccdNames[0]['pro_class']);	//将他的成绩赋给模板变量
					
	$sub_answer=$bccdNames[0]['sub_answer'];
	$smarty->assign("Radios",substr_count($sub_answer,"radio"));
	$smarty->assign("Checkboxs",substr_count($sub_answer,"checkbox"));
	$smarty->assign("Fills",substr_count($sub_answer,"fill"));
	$smarty->assign("Judgments",substr_count($sub_answer,"judgment"));


	$ar=explode("*",$sub_answer);					//拆分输出考试题和答案
	
	$array_answer=array();							//创建数组，存储答案数据
	for($i=0; $i<count($ar); $i++){					//循环读取每道题的数据
		$dates=explode("@",$ar[$i]);				//将每题的数据存储到数组中
		$array_type[]=$dates[1];					//将题型存储到数组中
		$answer[]=$dates[3];						//将提交的答案存储到数组中
		$answers[]=$dates[2];						//将正确的答案存储到数组中
		$array_answer[]=$dates;						//将每题的数据存储到数组中
	}
		
	//循环输出答案
	
	$array_type=array_unique($array_type);				//去除数组中重复的元素
	$smarty->assign("pro_type",$array_type);			//将考试内容赋给模板变量
	$smarty->assign("examination",$array_answer);		//将考试内容赋给模板变量

	$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem", $connID);					//从数据库中查询出考题数据
	$smarty->assign("tb_exam",$tb_exam);														//将考题内容赋给模板变量	
    $smarty->assign('edit', 't');
}
//
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$bcjyzs = $pageDB->pageData("select * from tb_mockexaminations_user where examination_id='".$_GET['examination_id']."' order by sub_time desc", $connID, 20, $page, 10);
$smarty->assign('bcjyzs', $bcjyzs);
//查询考生
$exam_user = $adminDB->executeSQL("select * from tb_user ", $connID);	//查询出指定人员的考试数据
$smarty->assign('exam_user', $exam_user);
//


$smarty->display('alookmockexaminations.phtml');