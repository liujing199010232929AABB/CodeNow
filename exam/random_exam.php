<?php
require_once 'top.php';
require_once "getonlineuser.php";

//*判断登录用户的权限*//

if(isset($_SESSION['user_id']) && $_SESSION['user_id']!="" && isset($_SESSION['admission']) && $_SESSION['admission']!="" && isset($_SESSION['name']) && $_SESSION['name']!=""){
	$bccdNames = $adminDB->executeSQL("select id,title, whether, start_exam, exam_user, over_exam from tb_examination where whether=2 and id='". $_GET['examination_id']."' ", $connID);

    if($bccdNames){
		$tim=time();
		$start_time=strtotime($bccdNames[0]['start_exam']);									//考试开始时间。		
		$after_time=strtotime("+900 seconds",strtotime($bccdNames[0]['start_exam']));		//设定进入考场的规定时间，开始15分钟后，不得在登录。
		$game_over=strtotime($bccdNames[0]['over_exam']);									//设定进入考场的规定时间，开始15分钟后，不得在登录。
        if($tim >= $start_time && $tim < $after_time && $tim < $game_over ){	//判断考试的开始时间，如果当前时间与系统设定时间相同，则开始考试
			$_SESSION['start_time']=strtotime($bccdNames[0]['start_exam']);									//考试开始时间
			$_SESSION['over_exam']=strtotime($bccdNames[0]['over_exam']);									//考试结束时间
			$times=(strtotime($bccdNames[0]['over_exam'])-strtotime($bccdNames[0]['start_exam']))/60;		//考试总时间
			$smarty->assign("over_exam",strtotime($bccdNames[0]['over_exam']));								//将考试结束时间赋给模板变量
			$smarty->assign("times",$times);																//将考试总时间赋给模板变量
			$smarty->assign("examination",$bccdNames);						//将考试内容赋给模板变量

//如果满足上述条件，则生成考试界面，可以进行考试。
//查询工种
$bccdNames = $adminDB->executeSQL("select id, typename from tb_types_work  order by addtime desc", $connID);
$smarty->assign('bccdNames', $bccdNames);
//查询生成的试卷，根据传递的ID值。
$bccdname = $adminDB->executeSQL("select * from tb_examination where id='" . $_GET['examination_id'] . "'", $connID);
$smarty->assign('bccdname', $bccdname);
$sub_answer=array();										//存储答案
$fraction=0;												//存储分数

if($bccdname[0]['radio']!=""){								//判断单选按钮是否为空
	$radio=	explode('@',$bccdname[0]['radio']);				//读取单选题的数据，将字符串拆分成数组
 	for ($i = 0; $i < count($radio); $i ++) {				//循环读取数组中存储的单选题的ID
		$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$radio[$i] ", $connID);		//从数据库中查询出对应类型的数据
		$arrayRadio[]=$tb_exam[0];							//将查询结果存储到数组中
	}
	
//获取表单提交的数据，并且将计算结果存储于数组中。
	for($m=0; $m < count($arrayRadio); $m++){
		if(isset($_POST['radio'.$arrayRadio[$m]['id']]) && $_POST['radio'.$arrayRadio[$m]['id']]!=""){
			$pro_id=$arrayRadio[$m]['id'];					//问题ID
			$answer=$arrayRadio[$m]['answer'];				//正确答案
			$sub=$_POST['radio'.$arrayRadio[$m]['id']];		//提交答案
			if($answer==$sub){
				$sub_answer[]=$pro_id."@radio@".$answer."@".$sub."@".$arrayRadio[$m]['fraction'];	
				$fraction=$fraction+$arrayRadio[$m]['fraction'];	
			}else{
				$sub_answer[]=$pro_id."@radio@".$answer."@".$sub."@"."0";	
				$fraction=$fraction+0;			
			}
		}else{
			$pro_id=$arrayRadio[$m]['id'];					//问题ID
			$answer=$arrayRadio[$m]['answer'];				//正确答案
			$sub_answer[]=$pro_id."@radio@".$answer."@"."NULL"."@"."0";
			$fraction=$fraction+0;				
		}
		
	}

//print_r($sub_answer);
//echo $fraction;
    $radioFraction = $arrayRadio[0]['fraction'];
    $smarty->assign('radioFraction', $radioFraction);
	$smarty->assign('Radio', "T");							//判断如果存在单选题则为其赋值为T
	$smarty->assign('Radios', count($arrayRadio));			//将查询到的单选题数组赋给指定的模板变量	
	$smarty->assign('arrayRadio', $arrayRadio);				//将查询到的单选题数组赋给指定的模板变量
}


if($bccdname[0]['checkbox']!=""){
	$checkbox=	explode('@',$bccdname[0]['checkbox']);
 	for ($i = 0; $i < count($checkbox); $i ++) {
		$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$checkbox[$i] ", $connID);
		$arrayCheckbox[] = $tb_exam[0];
	}
	
	//获取表单提交的数据，并且将计算结果存储于数组中。
	for($m=0; $m < count($arrayCheckbox); $m++){
		if(isset($_POST['checkbox'.$arrayCheckbox[$m]['id']]) && $_POST['checkbox'.$arrayCheckbox[$m]['id']]!=""){
			$pro_id=$arrayCheckbox[$m]['id'];									//问题ID
			$answer=$arrayCheckbox[$m]['answer'];								//正确答案
			$sub=implode(" ",$_POST['checkbox'.$arrayCheckbox[$m]['id']]);		//提交答案
			if($answer==$sub){
				$sub_answer[]=$pro_id."@checkbox@".$answer."@".$sub."@".$arrayCheckbox[$m]['fraction'];
				$fraction=$fraction+$arrayCheckbox[$m]['fraction'];		
			}else{
				$sub_answer[]=$pro_id."@checkbox@".$answer."@".$sub."@"."0";	
				$fraction=$fraction+0;				
			}
		}else{
			$pro_id=$arrayCheckbox[$m]['id'];									//问题ID
			$answer=$arrayCheckbox[$m]['answer'];								//正确答案
			$sub_answer[]=$pro_id."@checkbox@".$answer."@"."NULL"."@"."0";		
			$fraction=$fraction+0;			
		}
		
	}
    $checkboxFraction = $arrayCheckbox[0]['fraction'];
    $smarty->assign('checkboxFraction', $checkboxFraction);
	$smarty->assign('Checkbox', "T");
	$smarty->assign('Checkboxs', count($arrayCheckbox));	//将查询到的单选题数组赋给指定的模板变量	
	$smarty->assign('arrayCheckbox', $arrayCheckbox);	
}
	
if($bccdname[0]['fill']!=""){
	$fill=	explode('@',$bccdname[0]['fill']);
	for ($i = 0; $i < count($fill); $i ++) {
		$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$fill[$i] ", $connID);
		$arrayFill[] = $tb_exam[0];
	}
	
	//获取表单提交的数据，并且将计算结果存储于数组中。
	for($m=0; $m < count($arrayFill); $m++){
		if(isset($_POST['fill'.$arrayFill[$m]['id']]) && $_POST['fill'.$arrayFill[$m]['id']]!=""){
			$pro_id=$arrayFill[$m]['id'];										//问题ID
			$answer=explode(" ",$arrayFill[$m]['answer']);						//正确答案填空题正确答案通过空格进行分隔
			$sub=implode(" ",$_POST['fill'.$arrayFill[$m]['id']]);				//将提交答案存储到字符串中
			if($sub==""){
				$sub="NULL";
			}
			$count=count($answer);												//统计每题的填空个数
			for($an=0; $an<count($answer); $an++){								//循环输出每题的填空个数，并且判断提交的值与答案是否相同
				if($answer[$an]==$_POST['fill'.$arrayFill[$m]['id']][$an]){			
					$fraction=$fraction+($arrayFill[$m]['fraction']/$count);	//如果答案正确则加分
				}else{	
					$fraction=$fraction+0;				
				}
			}
			$sub_answer[]=$pro_id."@fill@".$arrayFill[$m]['answer']."@".$sub."@".$arrayFill[$m]['fraction'];				
		}else{
			$pro_id=$arrayFill[$m]['id'];										//问题ID
			$answer=$arrayFill[$m]['answer'];									//正确答案
			$sub_answer[]=$pro_id."@fill@".$answer."@"."NULL"."@"."0";	
			$fraction=$fraction+0;			
		}
		
	}

    $fillFraction = $arrayFill[0]['fraction'];
    $smarty->assign('fillFraction', $fillFraction);
	$smarty->assign('Fill', "T");			
	$smarty->assign('Fills', count($arrayFill));		//将查询到的单选题数组赋给指定的模板变量	
	$smarty->assign('arrayFill', $arrayFill);	
	
	
	
}
	
if($bccdname[0]['judgment']!=""){
	$judgment=	explode('@',$bccdname[0]['judgment']);
	for ($i = 0; $i < count($judgment); $i ++) {
		$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$judgment[$i] ", $connID);
		$arrayJudgment[] = $tb_exam[0];
	}
	
	
		
		//获取表单提交的数据，并且将计算结果存储于数组中。
	for($m=0; $m < count($arrayJudgment); $m++){
		if(isset($_POST['judgment'.$arrayJudgment[$m]['id']]) && $_POST['judgment'.$arrayJudgment[$m]['id']]!=""){
			$pro_id=$arrayJudgment[$m]['id'];								//问题ID
			$answer=$arrayJudgment[$m]['answer'];							//正确答案
			$sub=$_POST['judgment'.$arrayJudgment[$m]['id']];				//提交答案
			if($answer==$sub){
				$sub_answer[]=$pro_id."@judgment@".$answer."@".$sub."@".$arrayJudgment[$m]['fraction'];	
				$fraction=$fraction+$arrayJudgment[$m]['fraction'];			
			}else{
				$sub_answer[]=$pro_id."@judgment@".$answer."@".$sub."@"."0";	
				$fraction=$fraction+0;				
			}
		}else{
			$pro_id=$arrayJudgment[$m]['id'];								//问题ID
			$answer=$arrayJudgment[$m]['answer'];							//正确答案
			$sub_answer[]=$pro_id."@judgment@".$answer."@"."NULL"."@"."0";	
			$fraction=$fraction+0;				
		}
		
	}
    $judgmentFraction = $arrayJudgment[0]['fraction'];
    $smarty->assign('judgmentFraction', $judgmentFraction);
	$smarty->assign('Judgment', "T");
	$smarty->assign('Judgments', count($arrayJudgment));		//将查询到的单选题数组赋给指定的模板变量		
	$smarty->assign('arrayJudgment', $arrayJudgment);	
}

/*if($bccdname[0]['answer']!=""){
	$answer=explode('@',$bccdname[0]['answer']);
	for ($i = 0; $i < count($answer); $i ++) {
		$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$answer[$i] ", $connID);
		$arrayAnswer[] = $tb_exam[0];
	}
	
	
		
		//获取表单提交的数据，并且将计算结果存储于数组中。
	for($m=0; $m < count($arrayAnswer); $m++){
		if(isset($_POST['answer'.$arrayAnswer[$m]['id']]) && $_POST['answer'.$arrayAnswer[$m]['id']]!=""){
			$pro_id=$arrayAnswer[$m]['id'];							//问题ID
			$answer=$arrayAnswer[$m]['answer'];						//正确答案
			$sub=implode(" ",$_POST['answer'.$arrayAnswer[$m]['id']]);		//提交答案
			if($answer==$sub){
				$sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayAnswer[$m]['fraction'];	
				$fraction=$fraction+$arrayAnswer[$m]['fraction'];			
			}else{
				$sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";	
				$fraction=$fraction+0;			
			}
		}else{
			$pro_id=$arrayAnswer[$m]['id'];							//问题ID
			$answer=$arrayAnswer[$m]['answer'];						//正确答案
			$sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";	
			$fraction=$fraction+0;			
		}
		
	}
	
	$answerFraction = $arrayAnswer[0]['fraction'];
            $smarty->assign('answerFraction', $answerFraction);
	$smarty->assign('Answer', "T");		
	$smarty->assign('Answers', count($arrayAnswer));		
	$smarty->assign('arrayAnswer', $arrayAnswer);	
}
	
if($bccdname[0]['discourse']!=""){
	$discourse=	explode('@',$bccdname[0]['discourse']);
	for ($i = 0; $i < count($discourse); $i ++) {
		$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$discourse[$i] ", $connID);
		$arrayDiscourse[] = $tb_exam[0];
	}
	

			//获取表单提交的数据，并且将计算结果存储于数组中。
	for($m=0; $m < count($arrayDiscourse); $m++){
		if(isset($_POST['discourse'.$arrayDiscourse[$m]['id']]) && $_POST['discourse'.$arrayDiscourse[$m]['id']]!=""){
			$pro_id=$arrayDiscourse[$m]['id'];							//问题ID
			$answer=$arrayDiscourse[$m]['answer'];						//正确答案
			$sub=implode(" ",$_POST['discourse'.$arrayDiscourse[$m]['id']]);		//提交答案
			if($answer==$sub){
				$sub_answer[]=$pro_id."@".$answer."@".$sub."@".$arrayDiscourse[$m]['fraction'];		//将结果存储到数组中
				$fraction=$fraction+$arrayDiscourse[$m]['fraction'];		
			}else{
				$sub_answer[]=$pro_id."@".$answer."@".$sub."@"."0";									//将结果存储到数组中
				$fraction=$fraction+0;	
			}
		}else{
			$pro_id=$arrayDiscourse[$m]['id'];							//问题ID
			$answer=$arrayDiscourse[$m]['answer'];						//正确答案
			$sub_answer[]=$pro_id."@".$answer."@"."NULL"."@"."0";		//将结果存储到数组中
			$fraction=$fraction+0;	
		}
		
	}
	
	
				 $discourseFraction = $arrayDiscourse[0]['fraction'];
            $smarty->assign('discourseFraction', $discourseFraction);
	$smarty->assign('Discourse', "T");		
	$smarty->assign('Discourses', count($arrayDiscourse));	
	$smarty->assign('arrayDiscourse', $arrayDiscourse);	
}
*/

//完成考卷信息的提交
if(isset($_POST['title']) && $_POST['title']!="" && isset($_POST['name']) && $_POST['name']!="" && isset($_POST['admission']) && $_POST['admission']!="" && isset($_POST['pro_class']) && $_POST['pro_class']!=""){
	$admission1 = $adminDB->executeSQL("select admission from tb_examination_user where admission='".$_POST['admission']."' ", $connID);
	if($admission1){
		echo "<script>alert('您已经完成考试，不能重复提交！'); window.close();</script>";	
	}else{
		$insert=$adminDB->executeSQL("insert into tb_examination_user(title, examination_id, name, admission, pro_class, fraction, sub_answer, sub_time,nameid) values('" . $_POST['title'] . "','".$_GET['examination_id']."', '" . $_POST['name'] . "','". $_POST['admission'] ."', '". $_POST['pro_class'] ."','". $fraction ."','" . implode("*",$sub_answer) . "', '" . date("Y-m-d H:i:s") ."','".$_SESSION['user_id']."')", $connID);
		if($insert){

			echo "<script> alert('试卷提交成功！'); window.open('search_exam.php?id=".$connID->lastInsertId()."'); window.close(); </script>";
		}else{
			echo "<script>alert('试卷提交失败！');</script>";	
		}
	}
}




//循环输出答案
for($n=0; $n<count($sub_answer); $n++){
	$exam=explode("@",$sub_answer[$n]);
	//print_r($exam);
	$nn=$n+1;
	if($exam[3]=="NULL"){
		$str.=$nn .". <a href='#".$nn."'>____</a>&nbsp;";
	}else{
		$str.=$nn.". <a href='#".$nn."'>已答</a>&nbsp;";
	}
}
$smarty->assign('answer', $str);						//输出答案




//*生成考试界面*//
$smarty->display('random_exam.phtml');
		}else if($tim > $after_time && $tim < $game_over ){
			echo "<script> alert('考试已经开始超过15分钟，您不得进入考场');	window.close(); </script>";			
		}else if($tim > $game_over){
			echo "<script> alert('考试已经结束！'); window.close();	</script>";			
		}

	
	
	} else {
		echo "<script>alert('您选择的考试题不存在，请重新登录，选择！'); window.location.href='index.php'</script>";
	}
}else{
	echo "<script>alert('非考试人员不能进入！'); window.location.href='index.php'</script>";

}


//*判断登录用户的权限*//


require_once 'bottom.php';
