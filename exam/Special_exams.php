<?php
require_once 'top.php';
require_once 'checkLogin.php';
$fraction=0;						//存储分数

$sub_answer=array();				//存储答案

$smarty->assign('pro_claes', $_GET['pro_class']);							//判断如果存在单选题则为其赋值为T
$smarty->assign('pro_type', $_GET['pro_type']);							//判断如果存在单选题则为其赋值为T	

if(isset($_GET['pro_class']) && $_GET['pro_class']!="" && isset($_GET['pro_type']) && $_GET['pro_type']!=""){		//完成对登录用户的判断	
	$arrayExams = $adminDB->executeSQL("select * from tb_exam_problem where pro_class='".$_GET['pro_class']."' and pro_type='".$_GET['pro_type']."'", $connID);
	if($arrayExams){
		$bccdNames = $adminDB->executeSQL("select typename from tb_types_work where id='".$_GET['pro_class']."' ", $connID);
		$smarty->assign('pro_class', $bccdNames[0][0]);							//将工种数据输出到模板页		
		
		if($_GET['pro_type']=="radio"){										//判断单选按钮是否为空
			//获取表单提交的数据，并且将计算结果存储于数组中。
			for($m=0; $m < count($arrayExams); $m++){
				if(isset($_POST['hid']) && $_POST['hid'] != ""){
                    if($arrayExams[$m]['id'] == $_POST['hid']){
                        $pro_id=$arrayExams[$m]['id'];								//问题ID
                        $answer=$arrayExams[$m]['answer'];							//正确答案
                        $sub=$_POST['radio'.$arrayExams[$m]['id']];					//提交答案
                        if($answer==$sub){
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/right.mp3";
                            $fraction=$fraction+$arrayExams[$m]['fraction'];
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayExams[$m]['fraction'];
                        }else{
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/wrong.mp3";
                            $fraction=$fraction+0;
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";
                        }
                            $lsql = "insert into tb_useranswer(username,questionid,answer,useranswer,type,questype,pro_class,addtime,content)values('".$_SESSION['name']."',".$pro_id.",'".$answer."','".$sub."','s','answer',".$_GET['pro_class'].",'".date("Y-m-d H:i:s")."','".$arrayExams[$m]['content']."')";
                            $adminDB->executeSQL($lsql, $connID);
                    }
				}else{
					$pro_id=$arrayExams[$m]['id'];							//问题ID
					$answer=$arrayExams[$m]['answer'];						//正确答案
					$sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";
				}
			}
            $radioFraction = $arrayExams[0]['fraction'];
            $smarty->assign('radioFraction', $radioFraction);
            $smarty->assign('Radio', "T");							//判断如果存在单选题则为其赋值为T
			$smarty->assign('Radios', count($arrayExams));			//将查询到的单选题数组赋给指定的模板变量	
			$smarty->assign('arrayRadio', $arrayExams);				//将查询到的单选题数组赋给指定的模板变量
		}
		if($_GET['pro_type']=='checkbox'){
			//获取表单提交的数据，并且将计算结果存储于数组中。
			for($m=0; $m < count($arrayExams); $m++){
                if(isset($_POST['hid']) && $_POST['hid'] != ""){
                    if($arrayExams[$m]['id'] == $_POST['hid']){
                        $pro_id=$arrayExams[$m]['id'];							//问题ID
                        $answer=$arrayExams[$m]['answer'];						//正确答案
                        $sub=implode(" ",$_POST['checkbox'.$arrayExams[$m]['id']]);		//提交答案
                        if($answer==$sub){
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/right.mp3";
                            $fraction=$fraction+$arrayExams[$m]['fraction'];
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayExams[$m]['fraction'];
                        }else{
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/wrong.mp3";
                            $arrayExams[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
                            $fraction=$fraction+0;
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";
                        }

                        if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
                            $lsql = "insert into tb_useranswer(username,questionid,answer,useranswer,type,questype,pro_class,addtime,content)values('".$_SESSION['name']."',".$pro_id.",'".$answer."','".$sub."','s','answer',".$_GET['pro_class'].",'".date("Y-m-d H:i:s")."','".$arrayExams[$m]['content']."')";
                            $adminDB->executeSQL($lsql, $connID);
                        }else{
                            echo "<script>alert('请重新登录！');window.open('Special_exercises.php','','width=490,height=340');window.open('','_parent','');window.close();</script>";
                        }
                    }else{
                        $pro_id=$arrayExams[$m]['id'];							//问题ID
                        $answer=$arrayExams[$m]['answer'];						//正确答案
                        $sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";
                    }
                }
			}
            $checkboxFraction = $arrayExams[0]['fraction'];
            $smarty->assign('checkboxFraction', $checkboxFraction);
			$smarty->assign('Checkbox', "T");
			$smarty->assign('Checkboxs', count($arrayExams));	//将查询到的单选题数组赋给指定的模板变量	
			$smarty->assign('arrayCheckbox', $arrayExams);	
		}
		if($_GET['pro_type']=='fill'){
			//获取表单提交的数据，并且将计算结果存储于数组中。
			for($m=0; $m < count($arrayExams); $m++){
                $ccc = 0;
				if(isset($_POST['fill'.$arrayExams[$m]['id']]) && !isEmptyArray($_POST['fill'.$arrayExams[$m]['id']])){
					$pro_id=$arrayExams[$m]['id'];							//问题ID
					$answer=explode(" ",$arrayExams[$m]['answer']);				//正确答案填空题正确答案通过空格进行分隔
                    $arr = array();
                    if(count($_POST['fill'.$arrayExams[$m]['id']])){
                        foreach($_POST['fill'.$arrayExams[$m]['id']] as $a){
                            if($a == ''){
                                $a = "NULL";
                            }
                            $arr[] = $a;
                        }
                    }
                    $sub=implode(" ",$arr);		//将提交答案存储到字符串中
					$count=count($answer);										//统计每题的填空个数

                    for($an=0; $an<count($answer); $an++){
                        if($answer[$an]===$_POST['fill'.$arrayExams[$m]['id']][$an]){	//循环输出每题的填空个数，并且判断提交的值与答案是否相同
                            $ccc++;
							$fraction=$fraction+($arrayExams[$m]['fraction']/$count);		//如果答案正确则加分
						}else{	
							$fraction=$fraction+0;				
						}
					}
                    if($ccc == count($answer)){
                        $arrayExams[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
                    }else{
                        $arrayExams[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
                    }
                    $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
					$sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayExams[$m]['fraction'];
                }else{
                    $pro_id=$arrayExams[$m]['id'];							//问题ID
                    $answer=$arrayExams[$m]['answer'];						//正确答案
                    $sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";
                }
			}
            $fillFraction = $arrayExams[0]['fraction'];
            $smarty->assign('fillFraction', $fillFraction);
			$smarty->assign('Fill', "T");			
			$smarty->assign('Fills', count($arrayExams));		//将查询到的单选题数组赋给指定的模板变量	
			$smarty->assign('arrayFill', $arrayExams);		
		}
		if($_GET['pro_type']=='judgment'){
			//获取表单提交的数据，并且将计算结果存储于数组中。

			for($m=0; $m < count($arrayExams); $m++){
                if(isset($_POST['hid']) && $_POST['hid'] != ""){
                    if($arrayExams[$m]['id'] == $_POST['hid']){
                        $pro_id=$arrayExams[$m]['id'];							//问题ID
                        $answer=$arrayExams[$m]['answer'];						//正确答案
                        $sub=$_POST['judgment'.$arrayExams[$m]['id']];		//提交答案
                        if($answer==$sub){
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/right.mp3";
                            $arrayExams[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
                            $fraction=$fraction+$arrayExams[$m]['fraction'];
                            $sub_answer[]=$pro_id."@judgment@".$answer."@".$sub."@".$arrayExams[$m]['fraction'];
                        }else{
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/wrong.mp3";
                            $arrayExams[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
                            $fraction=$fraction+0;
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";
                        }
                        if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
                            $lsql = "insert into tb_useranswer(username,questionid,answer,useranswer,type,questype,pro_class,addtime,content)values('".$_SESSION['name']."',".$pro_id.",'".$answer."','".$sub."','s','answer',".$_GET['pro_class'].",'".date("Y-m-d H:i:s")."','".$arrayExams[$m]['content']."')";
                            $adminDB->executeSQL($lsql, $connID);
                        }else{
                            echo "<script>alert('请重新登录！');window.open('Special_exercises.php','','width=490,height=340');window.open('','_parent','');window.close();</script>";
                        }
                    }
                }else{
                    $pro_id=$arrayExams[$m]['id'];							//问题ID
                    $answer=$arrayExams[$m]['answer'];						//正确答案
                    $sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";
                }
			}
            $judgmentFraction = $arrayExams[0]['fraction'];
            $smarty->assign('judgmentFraction', $judgmentFraction);
			$smarty->assign('Judgment', "T");
			$smarty->assign('Judgments', count($arrayExams));		//将查询到的单选题数组赋给指定的模板变量		
			$smarty->assign('arrayJudgment', $arrayExams);	
		}

        if($_GET['pro_type']=='explain'){
            //获取表单提交的数据，并且将计算结果存储于数组中。
            for($m=0; $m < count($arrayExams); $m++){
                if(isset($_POST['hid']) && $_POST['hid'] != ""){
                    if($arrayExams[$m]['id'] == $_POST['hid']){
                        $pro_id=$arrayExams[$m]['id'];							//问题ID
                        $answer=trim(strip_tags($arrayExams[$m]['answer']));						//正确答案
                        $sub=$_POST['explain'.$arrayExams[$m]['id']];		//提交答案
                        if($answer==$sub){
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/right.mp3";
                            $arrayExams[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
                            $fraction=$fraction+$arrayExams[$m]['fraction'];
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayExams[$m]['fraction'];
                        }else{
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/wrong.mp3";
                            $arrayExams[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
                            $fraction=$fraction+0;
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";
                        }

                        if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
                            $lsql = "insert into tb_useranswer(username,questionid,answer,useranswer,type,questype,pro_class,addtime,content)values('".$_SESSION['name']."',".$pro_id.",'".$answer."','".$sub."','s','answer',".$_GET['pro_class'].",'".date("Y-m-d H:i:s")."','".$arrayExams[$m]['content']."')";
                            $adminDB->executeSQL($lsql, $connID);
                        }else{
                            echo "<script>alert('请重新登录！');window.open('Special_exercises.php','','width=490,height=340');window.open('','_parent','');window.close();</script>";
                        }
                    }else{
                        $pro_id=$arrayExams[$m]['id'];							//问题ID
                        $answer=$arrayExams[$m]['answer'];						//正确答案
                        $sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";
                    }
                }
            }
            $explainFraction = $arrayExams[0]['fraction'];
            $smarty->assign('explainFraction', $explainFraction);
            $smarty->assign('Explain', "T");
            $smarty->assign('Explains', count($arrayExams));
            $smarty->assign('arrayExplain', $arrayExams);
        }

		if($_GET['pro_type']=='answer'){
			//获取表单提交的数据，并且将计算结果存储于数组中。
			for($m=0; $m < count($arrayExams); $m++){
                if(isset($_POST['hid']) && $_POST['hid'] != ""){
                    if($arrayExams[$m]['id'] == $_POST['hid']){
                        $pro_id=$arrayExams[$m]['id'];							//问题ID
                        $answer=trim(strip_tags($arrayExams[$m]['answer']));						//正确答案
                        $sub=$_POST['answer'.$arrayExams[$m]['id']];		//提交答案
                        if($answer==$sub){
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/right.mp3";
                            $arrayExams[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中
                            $fraction=$fraction+$arrayExams[$m]['fraction'];
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayExams[$m]['fraction'];
                        }else{
                            $arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
                            $arrayExams[$m]['sounds']="CoalMine_Backstage/upfiles/sounds/wrong.mp3";
                            $arrayExams[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中
                            $fraction=$fraction+0;
                            $sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";
                        }

                        if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
                            $lsql = "insert into tb_useranswer(username,questionid,answer,useranswer,type,questype,pro_class,addtime,content)values('".$_SESSION['name']."',".$pro_id.",'".$answer."','".$sub."','s','answer',".$_GET['pro_class'].",'".date("Y-m-d H:i:s")."','".$arrayExams[$m]['content']."')";
                            $adminDB->executeSQL($lsql, $connID);
                        }else{
                            echo "<script>alert('请重新登录！');window.open('Special_exercises.php','','width=490,height=340');window.open('','_parent','');window.close();</script>";
                        }
                    }else{
                        $pro_id=$arrayExams[$m]['id'];							//问题ID
                        $answer=$arrayExams[$m]['answer'];						//正确答案
                        $sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";
                    }
                }
            }
            $answerFraction = $arrayExams[0]['fraction'];
            $smarty->assign('answerFraction', $answerFraction);
			$smarty->assign('Answer', "T");		
			$smarty->assign('Answers', count($arrayExams));		
			$smarty->assign('arrayAnswer', $arrayExams);	
		}
		
		if($_GET['pro_type']=='discourse'){
			//获取表单提交的数据，并且将计算结果存储于数组中。
			for($m=0; $m < count($arrayExams); $m++){
				if(isset($_POST['discourse'.$arrayExams[$m]['id']]) && $_POST['discourse'.$arrayExams[$m]['id']]!=""){
					$pro_id=$arrayExams[$m]['id'];							//问题ID
					$answer=$arrayExams[$m]['answer'];						//正确答案
					$sub=$_POST['discourse'.$arrayExams[$m]['id']];		//提交答案
					if($answer==$sub){
						$arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
						$arrayExams[$m]['right_error']="<img src='images/right.jpg' border='0' />";		//将结果存储到数组中						
						$fraction=$fraction+$arrayExams[$m]['fraction'];
						$sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayExams[$m]['fraction'];		//将结果存储到数组中		
					}
					//else if($sub==""){
					//	$arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
					//	$arrayExams[$m]['right_error']="NULL";		//将结果存储到数组中				
					//}
					else{
						$arrayExams[$m]['sub']=$sub;		//将结果存储到数组中
						$arrayExams[$m]['right_error']="<img src='images/error.jpg' border='0' />";		//将结果存储到数组中						
						$fraction=$fraction+0;
						$sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";									//将结果存储到数组中	
					}
				}else{
					$pro_id=$arrayExams[$m]['id'];							//问题ID
					$answer=$arrayExams[$m]['answer'];						//正确答案
					$sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";		//将结果存储到数组中
				}
			}
            $discourseFraction = $arrayExams[0]['fraction'];
            $smarty->assign('discourseFraction', $discourseFraction);
			$smarty->assign('Discourse', "T");		
			$smarty->assign('Discourses', count($arrayExams));	
			$smarty->assign('arrayDiscourse', $arrayExams);	
		}
		$smarty->assign('fraction', $fraction);		
	}else{
		echo "<script>alert('无此类型试题！'); window.history.back();</script>";		
	}
}else{
	echo "<script>alert('非考试人员不能进入！'); window.location.href='index.php'</script>";
}

//完成考卷信息的提交
/*if(isset($_POST['pro_class']) && $_POST['pro_class']!=""){
	$admission = $adminDB->executeSQL("select examination_id from tb_mockexaminations_user where examination_id='".$_SESSION['exam_id']."' ", $connID);
	if($admission){
		echo "<script>alert('您已经完成考试，不能重复提交！'); window.close();</script>";	
	}else{
		$insert=$adminDB->executeSQL("insert into tb_mockexaminations_user(title, examination_id, name, pro_class, fraction, sub_answer, sub_time) values('" . $_POST['title'] . "','".$_SESSION['exam_id']."', '" . $_POST['name'] . "', '". $_POST['pro_class'] ."','". $fraction ."','" . implode(",",$sub_answer) . "', '" . date("Y-m-d H:i:s") . "')", $connID);
		if($insert){
			echo "<script>alert('试卷提交成功！'); window.close();</script>";	
		}else{
			echo "<script>alert('试卷提交失败！');</script>";	
		}
	}
}*/

//循环输出答案
$str = "";
for($n=0; $n<count($sub_answer); $n++){
	$exam=explode("@",$sub_answer[$n]);
	//print_r($exam);
	$nn=$n+1;
	if($exam[2]=="NULL"){
		$str.=$nn .". <a href='#".$nn."'>____</a>&nbsp;";
	}else{
		$str.=$nn.". <a href='#".$nn."'>已答</a>&nbsp;";
	}
}
$smarty->assign('answer', $str);						//输出答案
function delbr($params){
    extract($params);
    $str = str_replace("<br/>"," ",$str);
    $str = str_replace("A","<br/>A",$str);
    return $str;
}
$smarty->register_function('delbr','delbr');


//指定模板页
$smarty->display('Special_exams.phtml');
require_once 'bottom.php';

function isEmptyArray($arr){
    if(count($arr)){
        foreach($arr as $v){
            if(is_array($v)){
                if(count($v)){
                    if(!checkArray($v)){
                        return false;
                    }
                }
            }else{
                $v = trim($v);
                if(!empty($v)){
                    return false;
                }
            }
        }
    }
    return true;
}