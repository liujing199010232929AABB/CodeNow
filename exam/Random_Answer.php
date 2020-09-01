<?php
require_once 'top.php';

//输出考题下拉列表
$typeNames = $adminDB->executeSQL("select id,typename from tb_types_work ", $connID);
$smarty->assign('typeNames', $typeNames);		//输出工种

$examTypes = $adminDB->executeSQL("select id,chinese,english from tb_exam_type ", $connID);
$smarty->assign('examTypes', $examTypes);		//输出考题题型

if(isset($_GET['type_id']) && $_GET['type_id']!="" && isset($_GET['exam_id']) && $_GET['exam_id']!=""){

	$bccdNames = $adminDB->executeSQL("select typename from tb_types_work where id='".$_GET['type_id']."' ", $connID);		
	$smarty->assign('pro_class', $bccdNames[0][0]);							//将工种数据输出到模板页		
		
	$sub_answer=array();				//存储答案
    foreach($examTypes as $type){
        $arrayExams = $adminDB->executeSQL("select id from tb_exam_problem where pro_class='".$_GET['type_id']."' and pro_type='".$_GET['exam_id']."' order by rand() limit 1", $connID);
        if($arrayExams){
            if($_GET['exam_id'] == $type['english']){				//判断单选按钮是否为空
                //获取表单提交的数据，并且将计算结果存储于数组中。
                $arrayExam=array();
//               for($m=0; $m < count($radio_rand); $m++){
//				if($radio_rand==""){
//					$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$exam_id[0]."' ", $connID);
//					$arrayExam[]=$arrayRadio[0];
//					$arrayValue[]=$exam_id[0];
//				}else{
//					$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$exam_id[$radio_rand[$m]]."' ", $connID);
//					$arrayExam[]=$arrayRadio[0];
//					$arrayValue[]=$exam_id[$radio_rand[$m]];
//				}
//                }
                $arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$arrayExams[0]['id']."' ", $connID);
                $arrayExam[]=$arrayRadio[0];
                $arrayValue=$arrayExams[0]['id'];
                $arrayExams[0]['content'] = str_replace("　　　　","______",$arrayExam[0]['content']);
                ${$type['english'].'Fraction'} = $arrayRadio[0]['fraction'];
                $smarty->assign($type['english'].'Fraction', ${$type['english'].'Fraction'});
                $smarty->assign(ucfirst($type['english']), "T");							//判断如果存在单选题则为其赋值为T
                $smarty->assign(ucfirst($type['english'])."s", count($arrayExam));			//将查询到的单选题数组赋给指定的模板变量
                $smarty->assign("array".ucfirst($type['english']), $arrayExam);				//将查询到的单选题数组赋给指定的模板变量
            }
            $smarty->assign('type_id', $_GET['type_id']);
            $smarty->assign('exam_id', $_GET['exam_id']);
            $smarty->assign('arrayValue', $arrayValue);
        }else{
            echo "<script>alert('无此类型试题！'); window.location.href='Random_Answer.php';</script>";
        }
    }

	$smarty->assign('Random', "T");		//输出考题题型	
}else{
	$smarty->assign('Random', "F");		//输出考题题型	
}

//指定模板页
$smarty->display('Random_Answer.phtml');
require_once 'bottom.php';
