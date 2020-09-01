<?php
require_once 'lzh.inc.php';
//输出员工下拉列表
$typeNames = $adminDB->executeSQL("select id,typename from tb_types_work ", $connID);
$smarty->assign('typeNames', $typeNames);		//输出工种
//输出新闻
$News = $adminDB->executeSQL("select id,title from tb_news where id order by id desc limit 4 ", $connID);
$smarty->assign('News', $News);					//输出新闻
//输出公告
$Bulletin = $adminDB->executeSQL("select id,title from tb_bulletin where id order by id desc limit 4  ", $connID);
$smarty->assign('Bulletins', $Bulletin);		//输出公告
//输出培训内容
$Training = $adminDB->executeSQL("select id,title,pro_class from tb_knowledge where id order by id desc limit 8 ", $connID);
$smarty->assign('Training', $Training);			//输出培训内容
//输出上岗考核内容
$Examination = $adminDB->executeSQL("select id,title, dates from tb_examination  order by id desc limit 8", $connID);
$smarty->assign('Examination', $Examination);	//输出上岗考核内容
//输出上岗考核分数
$Fraction = $adminDB->executeSQL("select eu.id, eu.name, eu.pro_class,w.typename, fraction from tb_examination_user eu,tb_types_work w where eu.pro_class=w.id and eu.id order by fraction desc limit 7", $connID);
$smarty->assign('Fraction', $Fraction);			//输出上岗考核分数
//循环输出工种
$workTypes = $adminDB->executeSQL("select id,typename from tb_types_work where id order by id limit 10 ", $connID);
$smarty->assign('workTypes', $workTypes);		//输出工种
$proclass = 0;
// 判断是否提交
if($_POST){
    $keys = array_keys($_POST);
    foreach($keys as $key){
        if(strpos($key,'radio') !== false){ // 获取单选按钮的name，以获取exam id
            $examId = substr($key,strpos($key,'o')+1);
            $problemArr = $adminDB->executeSQL("select answer,pro_class from tb_exam_problem where id=".$examId, $connID);
            $proclass = $problemArr[0]['pro_class']; // 获取工种id
        }
    }
}
//输出一个工种
$workTypes1 = $adminDB->executeSQL("select id,typename from tb_types_work where id order by id limit 1 ", $connID);
$smarty->assign('workTypes1', $workTypes1);		//输出工种
//输出一个考题
if($proclass == $workTypes1[0]['id']){
    $exam_problem1 = $adminDB->executeSQL("select id,content,answer from tb_exam_problem where id=".$examId, $connID);
    $answer = $problemArr[0]['answer'];
    $sub=$_POST['radio'.$examId];
    if($answer==$sub){
        $exam_problem1[0]['subs']=$answer;		//将结果存储到数组中
        $exam_problem1[0]['sub']=$sub;		//将结果存储到数组中
        $exam_problem1[0]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
    }else{
        $exam_problem1[0]['subs']=$answer;		//将结果存储到数组中
        $exam_problem1[0]['sub']=$sub;		//将结果存储到数组中
        $exam_problem1[0]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
    }
}else{
    $exam_problem1 = $adminDB->executeSQL("select id,content,answer ,pro_class,pro_type from tb_exam_problem where pro_type='judgment' and pro_class=".$workTypes1[0]['id'], $connID);
    @shuffle($exam_problem1);
}
$smarty->assign('exam_problem1', $exam_problem1);	//输出考题
//输出判断题
$workTypes2 = $adminDB->executeSQL("select id,typename from tb_types_work where id order by id limit 1,9 ", $connID);
$count=count($workTypes2);
for($i=0; $i<$count;$i++){
    if($workTypes2[$i]['id'] == $proclass){
        $exam_problem = $adminDB->executeSQL("select id,content,answer from tb_exam_problem where id=".$examId, $connID);
        $answer = $problemArr[0]['answer'];
        $sub=$_POST['radio'.$examId];
        if($answer==$sub){
            $workTypes2[$i]['subs']=$answer;		//将结果存储到数组中
            $workTypes2[$i]['sub']=$sub;		//将结果存储到数组中
            $workTypes2[$i]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
        }else{
            $workTypes2[$i]['subs']=$answer;		//将结果存储到数组中
            $workTypes2[$i]['sub']=$sub;		//将结果存储到数组中
            $workTypes2[$i]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
        }
    }else{
        $exam_problem = $adminDB->executeSQL("select id,content,answer from tb_exam_problem where pro_type='judgment' and pro_class=".$workTypes2[$i]['id'], $connID);
        @shuffle($exam_problem);
    }
    $workTypes2[$i]['exa_id']=$exam_problem[0]['id'];//获取试题id
	$workTypes2[$i]['exa_content']=$exam_problem[0]['content'];//获取试题内容
}
$smarty->assign('workTypes2', $workTypes2);			//输出工种
$smarty->display('index.phtml');//输出模板文件
require_once 'bottom.php';//包含页面底部文件

