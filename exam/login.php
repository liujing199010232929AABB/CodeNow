<?php
require_once 'lzh.inc.php';
//输出考题下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id,title,pro_class,dates from tb_examination order by id desc", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['title'];
}
$examid = 0;
if(isset($_GET['examid']) && $_GET['examid'] != ''){
    $examid = $_GET['examid'];
}

$smarty->assign('arrayBccdnames', $arrayBccdnames);		//输出考题下拉列表
$smarty->assign('examid', $examid);
if(isset($_POST['admission']) && $_POST['admission']!="" && isset($_POST['password']) && $_POST['password']!=""){	//完成对登录用户的判断
$bccdNames = $adminDB->executeSQL("select id, name, password,admission,picture,typework from tb_user where password='".md5($_POST['password'])."' and admission='".$_POST['admission']."' ", $connID);
	$typeNames = $adminDB->executeSQL("select * from tb_types_work where id='".$bccdNames[0]['typework']."'", $connID);
    $userproid = $bccdNames[0]['typework'];
	if ($bccdNames){
		if($_POST['select_exam']=="随机生成试卷"){
			if($check_user = $adminDB->executeSQL("select * from tb_examination where exam_user='".$_POST['admission']."' ", $connID)){
                $_SESSION['userproid'] = $userproid;
				echo "<script>alert('您已经生成过一次试卷，确定后将直接登录'); window.open('random_exam.php?examination_id=".$check_user[0]['id']."'); window.close(); </script>";
			}else{
			$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where isactive=1 and answer != '' and pro_class=".$userproid, $connID);	//查询考题数据
			for($m=0;$m < count($tb_exam); $m++){				//循环读取考题数据
				if($tb_exam[$m]['pro_type']=="radio"){			//判断考题数据是否是单选类型
					$radios[]=$tb_exam[$m]['id'];						//将获取到的单选类型考题的ID添加到指定的考题数组中
				}else if($tb_exam[$m]['pro_type']=="checkbox"){
					$checkboxs[]=$tb_exam[$m]['id'];	
				}else if($tb_exam[$m]['pro_type']=="fill"){
					$fills[]=$tb_exam[$m]['id'];	
				}else if($tb_exam[$m]['pro_type']=="judgment"){
					$judgments[]=$tb_exam[$m]['id'];	
				}
//                else if($tb_exam[$m]['pro_type']=="answer"){
//					$answers[]=$tb_exam[$m]['id'];
//				}else if($tb_exam[$m]['pro_type']=="discourse"){
//					$discourses[]=$tb_exam[$m]['id'];
//				}
			}
                $radionum = 10;
                $checkboxnum = 5;
                $fillnum = 15;
                $judgmentnum = 10;
	//生成随机单选题
                if(count($radios)>$radionum){
                    $radio_rand=array_rand($radios,$radionum);					//随机提取考题，获取其键值
                    for($i=0; $i<count($radio_rand); $i++){				//循环读取获取的键值
                        $radio_exam[]=$radios[$radio_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
                    }
                    $radio=implode('@',$radio_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
                }else{
                    echo "<script>alert('此类别单选题不足".$radionum."道，不能生成试卷');window.close();</script>";
                    exit();
                }


	//生成随机多选题
    if(count($checkboxs)>$checkboxnum){
        $checkbox_rand=array_rand($checkboxs,$checkboxnum);					//随机提取考题，获取其键值
        for($i=0; $i<count($checkbox_rand); $i++){				//循环读取获取的键值
            $checkbox_exam[]=$checkboxs[$checkbox_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
        }
        $checkbox=implode('@',$checkbox_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
    }else{
        echo "<script>alert('此类别多选题不足".$checkboxnum."道，不能生成试卷');window.close();</script>";
        exit();
    }

	//生成随机填空题
    if(count($fills)>$checkboxnum){
        $fill_rand=array_rand($fills,$fillnum);					//随机提取考题，获取其键值
        for($i=0; $i<count($fill_rand); $i++){				//循环读取获取的键值
            $fill_exam[]=$fills[$fill_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
        }
        $fill=implode('@',$fill_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
    }else{
        echo "<script>alert('此类别填空题不足".$fillnum."道，不能生成试卷');window.close();</script>";
        exit();
    }

	//生成随机判断题
    if(count($judgments)>$judgmentnum){
        $judgment_rand=array_rand($judgments,$judgmentnum);					//随机提取考题，获取其键值
        for($i=0; $i<count($judgment_rand); $i++){				//循环读取获取的键值
            $judgment_exam[]=$judgments[$judgment_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
        }
        $judgment=implode('@',$judgment_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
    }else{
        echo "<script>alert('此类别判断题不足".$judgmentnum."道，不能生成试卷');window.close();</script>";
        exit();
    }

//	//生成随机简答题
//	$answer_rand=array_rand($answers,10);					//随机提取考题，获取其键值
//	for($i=0; $i<count($answer_rand); $i++){				//循环读取获取的键值
//		$answer_exam[]=$answers[$answer_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
//	}
//	$answer=implode('@',$answer_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
//
//	//生成随机论述题
//	$discourse_rand=array_rand($discourses,5);					//随机提取考题，获取其键值
//	for($i=0; $i<count($discourse_rand); $i++){				//循环读取获取的键值
//		$discourse_exam[]=$discourses[$discourse_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
//	}
//	$discourse=implode('@',$discourse_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符

	
	$exam_user=$_POST['admission'];
	$adminDB->executeSQL("select id from ",$connID);

	$start_exam=date("Y-m-d H:i:s");
	$over_exam= date("Y-m-d H:i:s",mktime(date("H")+1,date("i")+30,date("s"), date("m") , date("d"), date("Y")));
    $worktypeArr = getWorktypes();
    if (! $adminDB->executeSQL("insert into tb_examination(title, pro_class, exam_user,start_exam, over_exam, radio, checkbox, fill, judgment, answer, discourse,  dates) values('".'随机考试试题'.$start_exam."', '" . $userproid . "','".$exam_user."', '".$start_exam."','".$over_exam."','" . $radio . "','" . $checkbox . "','" . $fill . "','" . $judgment . "', '".$answer."', '".$discourse."', '" . date("Y-m-d ") . "')", $connID)) {
        echo "<script>alert('试卷添加失败！');</script>";
    } else {
			$_SESSION['user_id']=$bccdNames[0]['id'];		//定义登录用户ID
			$_SESSION['admission']=$_POST['admission'];		//定义登录用户准考证号
			$_SESSION['exam_id']=$_POST['select_exam'];		//定义登录用户选择的考试科目
			$_SESSION['name']=$bccdNames[0]['name'];		//定义登录用户姓名
			$_SESSION['picture']=$bccdNames[0]['picture'];	//定义登录用户照片
            $_SESSION['typename']=$typeNames[0]['typename'];	//定义登录用户工种
            $_SESSION['userproid'] = $userproid;
	        echo "<script> window.open('random_exam.php?examination_id=".$connID->lastInsertId()."');window.close();</script>";
    }

			}
			
		}else{
			$_SESSION['user_id']=$bccdNames[0]['id'];		//定义登录用户ID
			$_SESSION['admission']=$_POST['admission'];		//定义登录用户准考证号
			$_SESSION['exam_id']=$_POST['select_exam'];		//定义登录用户选择的考试科目
			$_SESSION['name']=$bccdNames[0]['name'];		//定义登录用户姓名
			$_SESSION['picture']=$bccdNames[0]['picture'];	//定义登录用户照片
            $_SESSION['typename']=$typeNames[0]['typename'];	//定义登录用户工种
            $_SESSION['proid'] = $_POST['select_exam'];
			echo "<script>window.location.href='wait_exam.php';</script>";
		}
	} else {
		echo "<script>alert('登录失败，请检查您填写的准考证号和密码是否正确！'); window.location.href='login.php'</script>";
	}
}
$smarty->display('login.phtml');

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