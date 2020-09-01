<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

//查询工种
$bccdNames = $adminDB->executeSQL("select id, typename from tb_types_work  order by addtime desc", $connID);
$smarty->assign('bccdNames', $bccdNames);
//查询生成的试卷，根据传递的ID值。
$bccdname = $adminDB->executeSQL("select * from tb_mockexaminations where id='" . $_GET['id'] . "'", $connID);
$smarty->assign('bccdname', $bccdname);
$times=(strtotime($bccdname[0]['over_exam'])-strtotime($bccdname[0]['start_exam']))/60;		//考试总时间
$smarty->assign("times",$times);															//将考试总时间赋给模板变量

$count=0;

if($bccdname[0]['radio']!=""){								//判断单选按钮是否为空
    $radio=	explode('@',$bccdname[0]['radio']);				//读取单选题的数据，将字符串拆分成数组
    $radiofractionArr = $adminDB->executeSQL("select fraction from tb_exam_problem where id=$radio[0] ", $connID);
    $radiofraction = $radiofractionArr[0][0];
    for ($i = 0; $i < count($radio); $i ++) {				//循环读取数组中存储的单选题的ID
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$radio[$i] ", $connID);		//从数据库中查询出对应类型的数据
        $arrayRadio[]=$tb_exam[0];							//将查询结果存储到数组中
    }
    $count_radio=count($arrayRadio);						//统计题目总数
    $smarty->assign('Radio', "T");							//判断如果存在单选题则为其赋值为T
    $smarty->assign('Radios', $count_radio);				//将查询到的单选题数组赋给指定的模板变量
    $smarty->assign('arrayRadio', $arrayRadio);				//将查询到的单选题数组赋给指定的模板变量
    $smarty->assign('radiofraction', $radiofraction);			// radio fraction
    $count=$count + $count_radio;
}

if($bccdname[0]['checkbox']!=""){
    $checkbox=	explode('@',$bccdname[0]['checkbox']);
    $checkboxfractionArr = $adminDB->executeSQL("select fraction from tb_exam_problem where id=$checkbox[0] ", $connID);
    $checkboxfraction = $checkboxfractionArr[0][0];
    for ($i = 0; $i < count($checkbox); $i ++) {
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$checkbox[$i] ", $connID);
        $arrayCheckbox[] = $tb_exam[0];
    }
    $count_checkbox=count($arrayCheckbox);
    $smarty->assign('Checkbox', "T");
    $smarty->assign('Checkboxs', $count_checkbox);	//将查询到的单选题数组赋给指定的模板变量
    $smarty->assign('arrayCheckbox', $arrayCheckbox);
    $smarty->assign('checkboxfraction', $checkboxfraction);			// Checkbox fraction
    $count=$count + $count_checkbox;
}

if($bccdname[0]['fill']!=""){
    $fill=	explode('@',$bccdname[0]['fill']);
    $fillfractionArr = $adminDB->executeSQL("select fraction from tb_exam_problem where id=$fill[0] ", $connID);
    $fillfraction = $fillfractionArr[0][0];
    for ($i = 0; $i < count($fill); $i ++) {
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$fill[$i] ", $connID);
        $arrayFill[] = $tb_exam[0];
    }
    $count_fill=count($arrayFill);
    $smarty->assign('Fill', "T");
    $smarty->assign('Fills', $count_fill);			//将查询到的单选题数组赋给指定的模板变量
    $smarty->assign('arrayFill', $arrayFill);
    $smarty->assign('fillfraction', $fillfraction);			// Fill fraction
    $count=$count + $count_fill;
}

if($bccdname[0]['judgment']!=""){
    $judgment=	explode('@',$bccdname[0]['judgment']);
    $judgmentfractionArr = $adminDB->executeSQL("select fraction from tb_exam_problem where id=$judgment[0] ", $connID);
    $judgmentfraction = $judgmentfractionArr[0][0];
    for ($i = 0; $i < count($judgment); $i ++) {
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$judgment[$i] ", $connID);
        $arrayJudgment[] = $tb_exam[0];
    }
    $count_judgment=count($arrayJudgment);
    $smarty->assign('Judgment', "T");
    $smarty->assign('Judgments', $count_judgment);	//将查询到的单选题数组赋给指定的模板变量
    $smarty->assign('arrayJudgment', $arrayJudgment);
    $smarty->assign('judgmentfraction', $judgmentfraction);			// Judgment fraction
    $count=$count + $count_judgment;
}

/*if($bccdname[0]['explains']!=""){
    $explain = explode('@',$bccdname[0]['explains']);
    for ($i = 0; $i < count($explain); $i ++) {
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$explain[$i] ", $connID);
        $arrayExplain[] = $tb_exam[0];
    }
    $count_explain=count($arrayExplain);
    $smarty->assign('Explain', "T");
    $smarty->assign('Explains', $count_explain);
    $smarty->assign('arrayExplain', $arrayExplain);
    $count=$count + $count_explain;
}

if($bccdname[0]['answer']!=""){
    $answer=explode('@',$bccdname[0]['answer']);
    for ($i = 0; $i < count($answer); $i ++) {
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$answer[$i] ", $connID);
        $arrayAnswer[] = $tb_exam[0];
    }
    $count_answer=count($arrayAnswer);
    $smarty->assign('Answer', "T");
    $smarty->assign('Answers', $count_answer);
    $smarty->assign('arrayAnswer', $arrayAnswer);
    $count=$count + $count_answer;
}*/

if($bccdname[0]['discourse']!=""){
    $discourse=	explode('@',$bccdname[0]['discourse']);
    for ($i = 0; $i < count($discourse); $i ++) {
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$discourse[$i] ", $connID);
        $arrayDiscourse[] = $tb_exam[0];
    }
    $count_discourse=count($arrayDiscourse);
    $smarty->assign('Discourse', "T");
    $smarty->assign('Discourses', $count_discourse);
    $smarty->assign('arrayDiscourse', $arrayDiscourse);
    $count=$count + $count_discourse;
}
$smarty->assign('counts', $count);
//

$smarty->display('look_examinations.phtml');