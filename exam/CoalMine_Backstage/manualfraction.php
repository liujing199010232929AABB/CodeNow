<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

//
//
 if(isset($_GET['examination_id']) && $_GET['examination_id']!=""){
    $examination_id=$_GET['examination_id'];			//获取对应试卷的ID
}
if(isset($_GET['id']) && $_GET['id']!=""){
    $euid=$_GET['id'];			//获取对应试卷的ID
}

$smarty->assign('aid', $_GET['id']);
$titles = $adminDB->executeSQL("select id, title, exam_user from tb_examination", $connID);	//从试卷数据表中查询出指定的数据
$examArr = array();
if(sizeof($titles) > 0){
    foreach($titles as $title){
        $examArr[$title['id']] = $title['title'];
    }
    $smarty->assign('titles', $examArr);
}
//判断分页变量是否存在
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}

if (isset($_POST['submit']) && $_POST['submit']) {
    $sql = "select *,me.id meid from tb_examination_user me,tb_user u  where u.id=me.nameid and me.examination_id='".$_POST['examid']."'";
    $search=$adminDB->executeSQL($sql, $connID);
    if ($search) {
        $smarty->assign("search_count",count($search));										//将考题内容赋给模板变量														//将查询结果数量赋给模板变量
        $smarty->assign("search_res",$search);
        $smarty->assign('search', 't');									//将考题内容赋给模板变量
        $smarty->assign('examsid', $_POST['examid']);
        unset($_GET['edit']);
    } else {
        echo '<script>alert("没有这个考试的记录！")</script>';
    }
}

if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    if(isset($_GET['search']) && $_GET['search'] == 't'){
        $sql = "select *,me.id meid from tb_examination_user me,tb_user u  where u.id=me.nameid and me.id='" . $_GET['id'] . "'";
        $sql1 = "select *,me.id meid from tb_examination_user me,tb_user u  where u.id=me.nameid and me.examination_id='".$examination_id."'";
        $searchT = $adminDB->executeSQL($sql1, $connID);
        $smarty->assign("search",'t');
    }else{
        $sql = "select * from tb_examination_user where id='" . $_GET['id'] . "'";
    }
    $worktypes = getWorktypes();
    $bccdNames = $adminDB->executeSQL($sql, $connID);	//查询出指定人员的考试数据
    $smarty->assign("name",$bccdNames[0]['name']);	//将他的成绩赋给模板变量
    $smarty->assign("title",$bccdNames[0]['title']);	//将他的成绩赋给模板变量
    $smarty->assign("fraction",$bccdNames[0]['fraction']);	//将他的成绩赋给模板变量
    $smarty->assign("pro_class",$worktypes[$bccdNames[0]['pro_class']]);	//将他的工种赋给模板变量

    $sub_answer=$bccdNames[0]['sub_answer'];
    $smarty->assign("Radios",substr_count($sub_answer,"radio"));
    $smarty->assign("Checkboxs",substr_count($sub_answer,"checkbox"));
    $smarty->assign("Fills",substr_count($sub_answer,"fill"));
    $smarty->assign("Judgments",substr_count($sub_answer,"judgment"));
    $smarty->assign("Answers",substr_count($sub_answer,"answer"));
    $smarty->assign("Discourses",substr_count($sub_answer,"discourse"));


    $ar=explode("*",$sub_answer);					//拆分输出考试题和答案
    $array_answer=array();							//创建数组，存储答案数据
    for($i=0; $i<count($ar); $i++){					//循环读取每道题的数据
        $dates=explode("@",$ar[$i]);				//将每题的数据存储到数组中
        $array_type[]=$dates[1];					//将题型存储到数组中
        $answer[]=$dates[3];						//将提交的答案存储到数组中
        $answers[]=$dates[2];						//将正确的答案存储到数组中
        $array_answer[]=$dates;						//将每题的数据存储到数组中
    }
if(in_array('answer',$array_type) || in_array('answer',$array_type)){
    $hasbutton = "T";
}else{
    $hasbutton = "F";
}
    //循环输出答案
    $array_type=array_unique($array_type);				//去除数组中重复的元素
    $smarty->assign("pro_type",$array_type);			//将考试内容赋给模板变量
    $smarty->assign("hasbutton",$hasbutton);	        // 显示提交按钮
    $smarty->assign("examination",$array_answer);		//将考试内容赋给模板变量

    if(isset($_GET['search']) && $_GET['search'] == 't'){
        $smarty->assign("search_count",count($searchT));										//将考题内容赋给模板变量														//将查询结果数量赋给模板变量
        $smarty->assign("search_res",$searchT);
        $smarty->assign('search', 't');													//将考题内容赋给模板变量
        $smarty->assign('examsid', $examination_id);
    }
    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem", $connID);					//从数据库中查询出考题数据
    $smarty->assign("tb_exam",$tb_exam);														//将考题内容赋给模板变量
    $smarty->assign('edit', 't');
}
if (isset($_POST['submit1']) && $_POST['submit1'] != '') { // if the fraction button is clicked
    $exam_user = $adminDB->executeSQL("select * from tb_examination_user where id='" . $_POST['aid'] . "'", $connID);	//查询出指定人员的考试数据
    $sub_answer1 = $exam_user[0]['sub_answer']; // find sub_answer
    $fraction = $exam_user[0]['fraction'];

    if(isset($_POST['ansfraction']) && $_POST['ansfraction']!=""){
        $ansfractions = $_POST['ansfraction']; // get every fraction
        $before = substr($sub_answer1,0,strpos($sub_answer1,'answer')); //  'answer' str before
        $after =  strstr($sub_answer1,'answer'); // after answer str
        $afternew = '';
        $after = explode("*",$after);          // get each answer

        foreach($after as $k=>$v){
            $vsplit = explode("@",$v);
            if($k==0){
                $vsplit[3] = $ansfractions[$k]; // set fraction
            }else{
                $vsplit[4] = $ansfractions[$k]; // set fraction
            }
            $fraction+= $ansfractions[$k];
            $s[] = implode("@",$vsplit); // merge


        }
        $afternew = implode("*",$s); // merge
        $newsubanswer =  $before.$afternew; // merge the new sub_answer
    }

    if(isset($_POST['disfraction']) && $_POST['disfraction']!=""){
        $disfractions = $_POST['disfraction']; // get every fraction
        $before = substr($newsubanswer,0,strpos($newsubanswer,'discourse')); //  'discourse' str before
        $after =  strstr($newsubanswer,'discourse'); // after answer str
        $afternew = '';
        $after = explode("*",$after);          // get each answer

        foreach($after as $k=>$v){
            $vsplit = explode("@",$v);
            if($k==0){
                $vsplit[3] = $disfractions[$k]; // set fraction
            }else{
                $vsplit[4] = $disfractions[$k]; // set fraction
            }
            $fraction+= $disfractions[$k];
            $s1[] = implode("@",$vsplit); // merge

        }
        $afternew = implode("*",$s1); // merge
        if($newsubanswer == ""){
            $newsubanswer1 = $sub_answer1;          // merge the new sub_answer
        }else{
            $newsubanswer1 =  $before.$afternew; // merge the new sub_answer
        }
    }
    $befraction = 0;
if(isset($_POST['befraction']) && $_POST['befraction']!=""){
    $befraction = array_sum($_POST['befraction']);
}
    $fraction = $fraction - $befraction;
    if($adminDB->executeSQL("update tb_examination_user set sub_answer='".$newsubanswer1."',fraction=".$fraction." where id='" . $_POST['aid'] . "'", $connID)){
        echo '<script>alert("评分成功！")</script>';
    }else{
        echo '<script>alert("评分失败！")</script>';
    }
    echo '<script>location=location;</script>';
}
$bcjyzs = $pageDB->pageData("select *,me.id meid from tb_examination_user me,tb_user u  where u.id=me.nameid", $connID, 20, $page, 10);
$smarty->assign('bcjyzs', $bcjyzs);
//
$smarty->display('manualfraction.phtml');
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