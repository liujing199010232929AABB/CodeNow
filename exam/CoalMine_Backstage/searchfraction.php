<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//输出工种到下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
$proclass = 0;
if(isset($_POST['pro_class']) && $_POST['pro_class']!=""){
    $proclass = $_POST['pro_class'];			//获取对应试卷的ID
}
$tools = new Tools();

$displayType = $tools->getWorktype($bccdNames,$proclass);
$smarty->assign('displayType',$displayType);
if(isset($_GET['examination_id']) || isset($_POST['examination_id'])){
if(isset($_GET['examination_id']) && $_GET['examination_id']!=""){
    $examination_id=$_GET['examination_id'];			//获取对应试卷的ID
}else{
    $examination_id=$_POST['examination_id'];			//获取对应试卷的ID
}
}
$titles = $adminDB->executeSQL("select id, title, exam_user from tb_examination", $connID);	//从试卷数据表中查询出指定的数据
$mockexamArr = array();
foreach($titles as $title){
    $mockexamArr[$title['id']] = $title['title'];
}
$smarty->assign('titles', $mockexamArr);
//判断分页变量是否存在
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$examclass = 0;
if (isset($_POST['submit']) && $_POST['submit']) {

    $where = " where u.id=me.nameid and tm.id=me.examination_id";

    if($_POST['examid']!=''){
        $where.=" and tm.id=".$_POST['examid'];
    }
    if($_POST['pro_class']!=''){
        $examclass = $_POST['pro_class'];
        $where.=" and tm.pro_class=".$_POST['pro_class'];
    }
    if($_POST['name']!=''){
        $where.=" and u.name like '%".$_POST['name']."%' ";
    }

    $sql = "select *,me.id meid,u.name uname from tb_examination_user me,tb_user u ,tb_examination tm ".$where;
    $search=$adminDB->executeSQL($sql, $connID);
    $_SESSION['search_result'] = $search;
    if ($search) {
        $smarty->assign("search_count",count($search));														//将查询结果数量赋给模板变量
        $smarty->assign("search_res",$search);														//将考题内容赋给模板变量
        $smarty->assign('search', 't');								//将考题内容赋给模板变量
        $smarty->assign('examsid', $_POST['examid']);
    } else {
        $proclass = 0;
        echo '<script>alert("查询结果为空！")</script>';
    }
    unset($_GET['edit']);
}

if (isset($_POST['no_submit']) && $_POST['no_submit'] != '' ) {
    $where = " where u.id=me.nameid and tm.id=me.examination_id and tm.templateid=tt.id and tt.emattrid=ea.id and fraction < ea.passscore";

    if($_POST['examid']!=''){
        $where.=" and tm.id=".$_POST['examid'];
    }
    if($_POST['pro_class']!=''){
        $examclass = $_POST['pro_class'];
        $where.=" and tm.pro_class=".$_POST['pro_class'];
    }
    if($_POST['name']!=''){
        $where.=" and u.name like '%".$_POST['name']."%' ";
    }
    $where.= " order by fraction desc";
    $sql = "select *,me.id meid, u.name uname from tb_examination_user me,tb_user u ,tb_examination tm,tb_problemtemplate tt,tb_examattribute ea ".$where;
    $search=$adminDB->executeSQL($sql, $connID);
    $_SESSION['search_result'] = $search;
    if ($search) {
        $smarty->assign("search_count",count($search));														//将查询结果数量赋给模板变量
        $smarty->assign("search_res",$search);														//将考题内容赋给模板变量
        $smarty->assign('search', 't');								//将考题内容赋给模板变量
        $smarty->assign('examsid', $_POST['examid']);			//将考题内容赋给模板变量
    } else {
        echo '<script>alert("查询结果为空！")</script>';
    }
    unset($_GET['edit']);
}

$tools = new Tools();

$displayType = $tools->getWorktype($bccdNames,$proclass);
$smarty->assign('displayType',$displayType);
if (isset($_POST['fraction']) && $_POST['fraction'] != '') {
    $tzsql = "update tb_examination_user set fraction=".$_POST['fraction']." where id=".$_POST['fexam_id'];
    if($adminDB->executeSQL($tzsql, $connID)){
        echo '<script>alert("成绩调整成功！")</script>';
    }else{
        echo '<script>alert("成绩调整失败！")</script>';
    }
    unset($_GET['edit']);
}
if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    if(isset($_GET['search']) && $_GET['search'] == 't'){
        $smarty->assign("search_count",count($_SESSION['search_result']));										//将考题内容赋给模板变量														//将查询结果数量赋给模板变量
        $smarty->assign("search_res",$_SESSION['search_result']);									//将考题内容赋给模板变量
        $smarty->assign("search",'t');
        $smarty->assign('examsid', $_GET['examination_id']);
    }
    if(isset($_GET['lp']) && $_GET['lp'] == 't'){
        $smarty->assign("lp",'t');
        $smarty->assign("admiss",$_GET['admiss']);
        $smarty->assign("title",$_GET['title']);
        $smarty->assign("name",$_GET['name']);
        $smarty->assign("fraction",$_GET['fraction']);
        $smarty->assign("idnum",$_GET['idnum']);
        $smarty->assign("ffexam_id",$_GET['ffexam_id']);
        $smarty->assign("ffexamination_id",$_GET['ffexamination_id']);
    }
    $sql = "select * from tb_examination_user where id='" . $_GET['id'] . "'";

    $radioProblemId = getSingleTypeProblemId('radio',$examination_id);
    $checkboxProblemId = getSingleTypeProblemId('checkbox',$examination_id);
    $fillProblemId = getSingleTypeProblemId('fill',$examination_id);
    $judgmentProblemId = getSingleTypeProblemId('judgment',$examination_id);

    $radioFraction = getSingleTypeFraction($radioProblemId);
    $checkboxFraction = getSingleTypeFraction($checkboxProblemId);
    $fillFraction = getSingleTypeFraction($fillProblemId);
    $judgmentFraction = getSingleTypeFraction($judgmentProblemId);

    $smarty->assign("radioFraction",$radioFraction);
    $smarty->assign("checkboxFraction",$checkboxFraction);
    $smarty->assign("fillFraction",$fillFraction);
    $smarty->assign("judgmentFraction",$judgmentFraction);

    $worktypes = getWorktypes();
    $proclassArr = $adminDB->executeSQL("select pro_class from tb_examination where id='" . $examination_id . "'", $connID);	//查询出指定人员的考试数据
    $proclass = $proclassArr[0][0];
    $bccdNames = $adminDB->executeSQL($sql, $connID);	//查询出指定人员的考试数据
    $smarty->assign("name",$bccdNames[0]['name']);	//将他的成绩赋给模板变量
    $smarty->assign("title",$bccdNames[0]['title']);	//将他的成绩赋给模板变量
    $smarty->assign("fraction",$bccdNames[0]['fraction']);	//将他的成绩赋给模板变量
    $smarty->assign("pro_class",$worktypes[$proclass]);	//将他的成绩赋给模板变量

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
$bcjyzs = $pageDB->pageData("select *,me.id meid from tb_examination_user me,tb_user u  where u.id=me.nameid", $connID, 20, $page, 10);

if(isset($search) && count($search[0])){
    $_SESSION['export_data'] = $search;
}else{
    $sql = "select *,me.id meid from tb_examination_user me,tb_user u  where u.id=me.nameid";
    $search = $adminDB->executeSQL($sql, $connID);
    $_SESSION['export_data'] = $search;
}
$smarty->assign('bcjyzs', $bcjyzs);
$smarty->display('searchfraction.phtml');


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

function getSingleTypeProblemId($str,$examid){
    global $adminDB;
    global $connID;
    $typeSql = "select ".$str." from tb_examination where id=".$examid;
    $typeArr = $adminDB->executeSQL($typeSql, $connID);
    $typeproblemIdStr = $typeArr[0][0];
    if(!strstr($typeproblemIdStr,'@')){
        $firstProblemId = $typeproblemIdStr;
    }else{
        $firstProblemId = substr($typeproblemIdStr,0,strpos($typeproblemIdStr,'@'));
    }
    return $firstProblemId;
}

function getSingleTypeFraction($problemid){
    global $adminDB;
    global $connID;
    $fractionSql = "select fraction from tb_exam_problem where id=".$problemid;
    $fractionArr = $adminDB->executeSQL($fractionSql, $connID);
    $fraction = $fractionArr[0][0];
    return $fraction;
}