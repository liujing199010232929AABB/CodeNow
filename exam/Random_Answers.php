<?php
require_once 'top.php';

//输出考题下拉列表
$typeNames = $adminDB->executeSQL("select id,typename from tb_types_work ", $connID);
$smarty->assign('typeNames', $typeNames);		//输出工种

$examTypes = $adminDB->executeSQL("select id,chinese,english from tb_exam_type ", $connID);
$smarty->assign('examTypes', $examTypes);		//输出考题题型


if(isset($_POST['type_id']) && $_POST['type_id']!="" && isset($_POST['exam_id']) && $_POST['exam_id']!=""){

	$bccdNames = $adminDB->executeSQL("select typename from tb_types_work where id='".$_POST['type_id']."' ", $connID);		
	$smarty->assign('pro_class', $bccdNames[0][0]);							//将工种数据输出到模板页		
		
	$fraction=0;						//存储分数
    foreach($examTypes as $type){

        if($_POST['exam_id'] == $type['english']){				//判断单选按钮是否为空
            //获取表单提交的数据，并且将计算结果存储于数组中。
            $arrayExam=array();
            $arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$_POST['arrayValue']."' ", $connID);
            $pro_id=$arrayRadio[0]['id'];							//问题ID
            $answer=$arrayRadio[0]['answer'];						//正确答案
            if($_POST['exam_id'] == "checkbox"){
                $sub=implode(" ",$_POST['checkbox'.$arrayRadio[0]['id']]);		//提交答案
            }elseif($_POST['exam_id'] == "fill"){
                $sub=implode(" ",$_POST['fill'.$arrayRadio[0]['id']]);		//将提交答案存储到字符串中
				if($sub==""){
					$sub="NULL";
				}
            }else{
                $sub = $_POST[$type['english'].$arrayRadio[0]['id']];					//提交答案
            }
            if($answer==$sub){
                $arrayRadio[0]['sub']=$sub;		//将结果存储到数组中
                $arrayRadio[0]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
                $fraction=$fraction+$arrayRadio[0]['fraction'];
            }else{
                $arrayRadio[0]['sub']=$sub;		//将结果存储到数组中
                $arrayRadio[0]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
                $fraction=$fraction+0;
            }
//            for($m=0; $m < count($radio_rand); $m++){
//                $arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$radio_rand[$m]."' ", $connID);
//                $arrayExam[]=$arrayRadio[0];
//                if(isset($_POST['radio'.$arrayExam[$m]['id']]) && $_POST['radio'.$arrayExam[$m]['id']]!=""){
//                    $pro_id=$arrayExam[$m]['id'];								//问题ID
//                    $answer=$arrayExam[$m]['answer'];							//正确答案
//                    $sub=$_POST['radio'.$arrayExam[$m]['id']];					//提交答案
//                    if($answer==$sub){
//                        $arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//                        $arrayExam[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
//                        $fraction=$fraction+$arrayExam[$m]['fraction'];
//                    }else{
//                        $arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//                        $arrayExam[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
//                        $fraction=$fraction+0;
//                    }
//                }else{
//                    $pro_id=$arrayExam[$m]['id'];							//问题ID
//                    $answer=$arrayExam[$m]['answer'];						//正确答案
//                }
//            }
            $radioFraction = $arrayRadio[0]['fraction'];
            $smarty->assign($type['english'].'Fraction', $radioFraction);
            $smarty->assign(ucfirst($type['english']), "T");							//判断如果存在单选题则为其赋值为T
            $smarty->assign(ucfirst($type['english'])."s", 1);			//将查询到的单选题数组赋给指定的模板变量
            $smarty->assign('array'.ucfirst($type['english']), $arrayRadio);				//将查询到的单选题数组赋给指定的模板变量
        }
    }

//	if($_POST['exam_id']=="radio"){				//判断单选按钮是否为空
//		//获取表单提交的数据，并且将计算结果存储于数组中。
//		$arrayExam=array();
//		for($m=0; $m < count($radio_rand); $m++){
//			$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$radio_rand[$m]."' ", $connID);
//			$arrayExam[]=$arrayRadio[0];
//			if(isset($_POST['radio'.$arrayExam[$m]['id']]) && $_POST['radio'.$arrayExam[$m]['id']]!=""){
//				$pro_id=$arrayExam[$m]['id'];								//问题ID
//				$answer=$arrayExam[$m]['answer'];							//正确答案
//				$sub=$_POST['radio'.$arrayExam[$m]['id']];					//提交答案
//				if($answer==$sub){
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+$arrayExam[$m]['fraction'];
//				}else{
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+0;
//				}
//			}else{
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//			}
//		}
//        $radioFraction = $arrayRadio[0]['fraction'];
//        $smarty->assign('radioFraction', $radioFraction);
//		$smarty->assign('Radio', "T");							//判断如果存在单选题则为其赋值为T
//		$smarty->assign('Radios', count($arrayExam));			//将查询到的单选题数组赋给指定的模板变量
//		$smarty->assign('arrayRadio', $arrayExam);				//将查询到的单选题数组赋给指定的模板变量
//	}
//	if($_POST['exam_id']=='checkbox'){
//		//获取表单提交的数据，并且将计算结果存储于数组中。
//		$arrayExam=array();
//		for($m=0; $m < count($radio_rand); $m++){
//			$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$radio_rand[$m]."' ", $connID);
//			$arrayExam[]=$arrayRadio[0];
//			if(isset($_POST['checkbox'.$arrayExam[$m]['id']]) && $_POST['checkbox'.$arrayExam[$m]['id']]!=""){
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//				$sub=implode(" ",$_POST['checkbox'.$arrayExam[$m]['id']]);		//提交答案
//				if($answer==$sub){
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+$arrayExam[$m]['fraction'];
//				}else{
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+0;
//				}
//			}else{
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//			}
//		}
//        $checkboxFraction = $arrayRadio[0]['fraction'];
//        $smarty->assign('checkboxFraction', $checkboxFraction);
//		$smarty->assign('Checkbox', "T");
//		$smarty->assign('Checkboxs', count($arrayExam));	//将查询到的单选题数组赋给指定的模板变量
//		$smarty->assign('arrayCheckbox', $arrayExam);
//	}
//	if($_POST['exam_id']=='fill'){
//		//获取表单提交的数据，并且将计算结果存储于数组中。
//		$arrayExam=array();
//		for($m=0; $m < count($radio_rand); $m++){
//			$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$radio_rand[$m]."' ", $connID);
//			$arrayExam[]=$arrayRadio[0];
//			if(isset($_POST['fill'.$arrayExam[$m]['id']]) && $_POST['fill'.$arrayExam[$m]['id']]!=""){
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=explode(" ",$arrayExam[$m]['answer']);				//正确答案填空题正确答案通过空格进行分隔
//				$sub=implode(" ",$_POST['fill'.$arrayExam[$m]['id']]);		//将提交答案存储到字符串中
//				if($sub==""){
//					$sub="NULL";
//				}
//				$count=count($answer);										//统计每题的填空个数
//				for($an=0; $an<count($answer); $an++){						//循环输出每题的填空个数，并且判断提交的值与答案是否相同
//					if($answer[$an]==$_POST['fill'.$arrayExam[$m]['id']][$an]){
//						$arrayExam[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
//						$fraction=$fraction+($arrayExam[$m]['fraction']/$count);		//如果答案正确则加分
//					}else{
//						$arrayExam[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
//						$fraction=$fraction+0;
//					}
//				}
//				$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//			}else{
//				$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//				$arrayExam[$m]['right_error']="NULL";		//将结果存储到数组中
//			}
//		}
//        $fillFraction = $arrayRadio[0]['fraction'];
//        $smarty->assign('fillFraction', $fillFraction);
//		$smarty->assign('Fill', "T");
//		$smarty->assign('Fills', count($arrayExam));		//将查询到的单选题数组赋给指定的模板变量
//		$smarty->assign('arrayFill', $arrayExam);
//	}
//	if($_POST['exam_id']=='judgment'){
//		//获取表单提交的数据，并且将计算结果存储于数组中。
//		$arrayExam=array();
//		for($m=0; $m < count($radio_rand); $m++){
//			$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$radio_rand[$m]."' ", $connID);
//			$arrayExam[]=$arrayRadio[0];
//			if(isset($_POST['judgment'.$arrayExam[$m]['id']]) && $_POST['judgment'.$arrayExam[$m]['id']]!=""){
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//				$sub=$_POST['judgment'.$arrayExam[$m]['id']];		//提交答案
//				if($answer==$sub){
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+$arrayExam[$m]['fraction'];
//				}else{
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+0;
//				}
//			}else{
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//			}
//		}
//        $judgmentFraction = $arrayRadio[0]['fraction'];
//        $smarty->assign('judgmentFraction', $judgmentFraction);
//		$smarty->assign('Judgment', "T");
//		$smarty->assign('Judgments', count($arrayExam));		//将查询到的单选题数组赋给指定的模板变量
//		$smarty->assign('arrayJudgment', $arrayExam);
//	}
//
//	if($_POST['exam_id']=='answer'){
//		//获取表单提交的数据，并且将计算结果存储于数组中。
//		$arrayExam=array();
//		for($m=0; $m < count($radio_rand); $m++){
//			$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$radio_rand[$m]."' ", $connID);
//			$arrayExam[]=$arrayRadio[0];
//			if(isset($_POST['answer'.$arrayExam[$m]['id']]) && $_POST['answer'.$arrayExam[$m]['id']]!=""){
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//				$sub=$_POST['answer'.$arrayExam[$m]['id']];		//提交答案
//				if($answer==$sub){
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+$arrayExam[$m]['fraction'];
//				}else{
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+0;
//				}
//			}else{
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//			}
//		}
//        $answerFraction = $arrayRadio[0]['fraction'];
//        $smarty->assign('answerFraction', $answerFraction);
//		$smarty->assign('Answer', "T");
//		$smarty->assign('Answers', count($arrayExam));
//		$smarty->assign('arrayAnswer', $arrayExam);
//	}
//
//	if($_POST['exam_id']=='discourse'){
//		//获取表单提交的数据，并且将计算结果存储于数组中。
//		$arrayExam=array();
//		for($m=0; $m < count($radio_rand); $m++){
//			$arrayRadio = $adminDB->executeSQL("select * from tb_exam_problem where id='".$radio_rand[$m]."' ", $connID);
//			$arrayExam[]=$arrayRadio[0];
//			if(isset($_POST['discourse'.$arrayExam[$m]['id']]) && $_POST['discourse'.$arrayExam[$m]['id']]!=""){
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//				$sub=$_POST['discourse'.$arrayExam[$m]['id']];		//提交答案
//				if($answer==$sub){
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+$arrayExam[$m]['fraction'];
//				}else{
//					$arrayExam[$m]['sub']=$sub;		//将结果存储到数组中
//					$arrayExam[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
//					$fraction=$fraction+0;
//				}
//			}else{
//				$pro_id=$arrayExam[$m]['id'];							//问题ID
//				$answer=$arrayExam[$m]['answer'];						//正确答案
//			}
//		}
//        $discourseFraction = $arrayRadio[0]['fraction'];
//        $smarty->assign('discourseFraction', $discourseFraction);
//		$smarty->assign('Discourse', "T");
//		$smarty->assign('Discourses', count($arrayExam));
//		$smarty->assign('arrayDiscourse', $arrayExam);
//	}
	$smarty->assign('fraction', $fraction);
    $smarty->assign('type_id', $_POST['type_id']);
    $smarty->assign('exam_id', $_POST['exam_id']);
}else{
	echo "<script>alert('请您正确提交数据');window.location.href='Random_Answer.php';</script>";
}

//指定模板页
$smarty->display('Random_Answers.phtml');
require_once 'bottom.php';
