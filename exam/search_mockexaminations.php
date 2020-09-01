<?php
require_once 'top.php';
//*判断登录用户的权限*//
if(isset($_SESSION['exam_id']) && $_SESSION['exam_id']!="" ){
    if(!is_numeric($_SESSION['exam_id'])){
        $examIdArr = $adminDB->executeSQL("select id from tb_examination where exam_user='".$_SESSION['admission']."' ", $connID);
        $examination_id = $examIdArr[0][0];
    }else{
        $examination_id = $_SESSION['exam_id'];
    }
	$examtypeArray = array("radio","checkbox","fill","judgment");
	$bccdNames = $adminDB->executeSQL("select * from tb_mockexaminations_user where id='".$_GET['id']."' ", $connID);	//查询出指定人员的考试数据
    $examtype = $adminDB->executeSQL("select * from tb_mockexaminations where id='".$_SESSION['exam_id']."' ", $connID);
    foreach($examtypeArray as $et){
        ${$et."str"} = $examtype[0][$et];
        if(${$et."str"} != ''){
            ${$et."idArray"} = explode("@",${$et."str"});
            ${$et."idstr"} = implode(",",${$et."idArray"});
            ${$et."problems"} = $adminDB->executeSQL("select * from tb_exam_problem where id in (".${$et."idstr"}.")", $connID);		//查询指定用户
            $smarty->assign($et."problems",${$et."problems"});	// 将每个题型的问题赋予模板变量
        }
    }
    $smarty->assign("title",$bccdNames[0]['title']);	//将他的标题赋给模板变量
	$smarty->assign("fraction",$bccdNames[0]['fraction']);	//将他的成绩赋给模板变量

    $worktypes = getWorktypes();
    $smarty->assign("pro_class",$worktypes[$examtype[0]['pro_class']]);	//将他的类型赋给模板变量
					
	$sub_answer=$bccdNames[0]['sub_answer'];
	$smarty->assign("Radios",substr_count($sub_answer,"radio"));
	$smarty->assign("Checkboxs",substr_count($sub_answer,"checkbox"));
	$smarty->assign("Fills",substr_count($sub_answer,"fill"));
	$smarty->assign("Judgments",substr_count($sub_answer,"judgment"));
    $smarty->assign("Explains",substr_count($sub_answer,"explain"));
    $smarty->assign("Answers",substr_count($sub_answer,"answer"));

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
	$str="";
	for($n=0; $n<count($answer); $n++){
		$nn=$n+1;
		if($answer[$n]=="NULL"){
			$str.=$nn .". <a href='#".$nn."'>____</a>&nbsp;";
		}else{
			if($answer[$n]==$answers[$n]){
				$str.=$nn.". <a href='#".$nn."'>正确</a>&nbsp;";
			}else{
				$str.=$nn.". <a href='#".$nn."'>错误</a>&nbsp;";			
			}
		}
	}
	$smarty->assign('answer', $str);					//输出答案

	$array_type=array_unique($array_type);				//去除数组中重复的元素
	$smarty->assign("pro_type",$array_type);			//将考试内容赋给模板变量
	$smarty->assign("examination",$array_answer);		//将考试内容赋给模板变量

    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem", $connID);					//从数据库中查询出考题数据
	$smarty->assign("tb_exam",$tb_exam);														//将考题内容赋给模板变量
	$smarty->display('search_mockexaminations.phtml');	
}else{
	echo "<script>alert('您不具备查询成绩的权限！'); window.location.href='index.php';</script>";	
}

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
    $typeSql = "select ".$str." from tb_mockexaminations where id=".$examid;
//    echo $typeSql;
    $typeArr = $adminDB->executeSQL($typeSql, $connID);
    $typeproblemIdStr = $typeArr[0][0];
    if(!strstr($typeproblemIdStr,'@')){
        $firstProblemId = $typeproblemIdStr;
    }else{
        $firstProblemId = substr($typeproblemIdStr,0,strpos($typeproblemIdStr,'@'));
    }
//    Tools::printlog($typeproblemIdStr);
//    Tools::printlog($firstProblemId.'/////////');
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

require_once 'bottom.php';
