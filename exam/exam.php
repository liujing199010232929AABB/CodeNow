<?php
require_once 'top.php';
require_once 'lzh.inc.php';
//*判断登录用户的权限*//
if(isset($_SESSION['user_id']) && $_SESSION['user_id']!="" && isset($_SESSION['admission']) && $_SESSION['admission']!="" && isset($_SESSION['exam_id']) && $_SESSION['exam_id']!="" && isset($_SESSION['name']) && $_SESSION['name']!=""){

    $bccdNames = $adminDB->executeSQL("select id,title, start_exam, exam_user, over_exam from tb_examination where id='".$_SESSION['exam_id']."' ", $connID);
    if($bccdNames){
        $arrayUser=	explode('@',$bccdNames[0]['exam_user']);												//读取考试人员字段中的数据，将字符串拆分成数组
        $key = array_search($_SESSION['user_id'], $arrayUser); 												//检测登录用户是否在考试人员名单中
//        echo $key!==false;exit;
        if($key!==false){
            $_SESSION['start_time']=strtotime($bccdNames[0]['start_exam']);									//考试开始时间
            $_SESSION['over_exam']=strtotime($bccdNames[0]['over_exam']);									//考试结束时间
            $times=(strtotime($bccdNames[0]['over_exam'])-strtotime($bccdNames[0]['start_exam']))/60;		//考试总时间
            $smarty->assign("over_exam",strtotime($bccdNames[0]['over_exam']));								//将考试结束时间赋给模板变量
            $smarty->assign("times",$times);																//将考试总时间赋给模板变量
            $smarty->assign("examination",$bccdNames);														//将考试内容赋给模板变量

//如果满足上述条件，则生成考试界面，可以进行考试。
//查询工种
            $bccdNames = $adminDB->executeSQL("select id, typename from tb_types_work  order by addtime desc", $connID);
            $smarty->assign('bccdNames', $bccdNames);
//查询生成的试卷，根据传递的ID值。
            $bccdname = $adminDB->executeSQL("select * from tb_examination where id='" . $_GET['examination_id'] . "'", $connID);
            $smarty->assign('bccdname', $bccdname);
            $attr = $adminDB->executeSQL("select a.id,a.totalscore,t.id,t.emattrid from tb_examattribute a,tb_problemtemplate t where t.emattrid=a.id and t.id=".$bccdname[0]['templateid'], $connID);
            $smarty->assign('attr', $attr);
            $worktypes = getWorktypes();
            $procid = $bccdname[0]['pro_class'];
            $typename = $worktypes[$procid];
            $smarty->assign('typename', $typename);

            $sub_answer=array();										//存储答案
            $fraction=0;												//存储分数

            $reg = '((\d+@)+[^@]+)';
            $examtypeArr = getExamtypes();
            if($bccdname[0]['radio']!=""){
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
                $radioFraction = $arrayRadio[0]['fraction'];
                $smarty->assign('radioFraction', $radioFraction);
                $smarty->assign('Radio', "T");							//判断如果存在单选题则为其赋值为T
                $smarty->assign('Radios', count($arrayRadio));			//将查询到的单选题数组赋给指定的模板变量
                $smarty->assign('arrayRadio', $arrayRadio);				//将查询到的单选题数组赋给指定的模板变量
            }


            if($bccdname[0]['checkbox']!=""){
                if($bccdname[0]['checkbox']!='' && !strstr($bccdname[0]['checkbox'],'@')){
                    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=".$bccdname[0]['checkbox'], $connID);		//从数据库中查询出对应类型的数据
                    $arrayCheckbox=$tb_exam;
                }else{
                    $checkbox=	explode('@',$bccdname[0]['checkbox']);
                    for ($i = 0; $i < count($checkbox); $i ++) {
                        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$checkbox[$i] ", $connID);
                        $arrayCheckbox[] = $tb_exam[0];
                    }
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
                if($bccdname[0]['fill']!='' && !strstr($bccdname[0]['fill'],'@')){
                    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=".$bccdname[0]['fill'], $connID);		//从数据库中查询出对应类型的数据
                    $arrayFill=$tb_exam;
                }else{
                    $fill=	explode('@',$bccdname[0]['fill']);
                    for ($i = 0; $i < count($fill); $i ++) {
                        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$fill[$i] ", $connID);
                        $arrayFill[] = $tb_exam[0];
                    }
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
                            if(trim($answer[$an])==trim($_POST['fill'.$arrayFill[$m]['id']][$an])){
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
                if($bccdname[0]['judgment']!='' && !strstr($bccdname[0]['judgment'],'@')){
                    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=".$bccdname[0]['judgment'], $connID);		//从数据库中查询出对应类型的数据
                    $arrayJudgment=$tb_exam;
                }else{
                    $judgment=	explode('@',$bccdname[0]['judgment']);
                    for ($i = 0; $i < count($judgment); $i ++) {
                        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$judgment[$i] ", $connID);
                        $arrayJudgment[] = $tb_exam[0];
                    }
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

            /*if($bccdname[0]['explains']!=""){
                if($bccdname[0]['explains']!='' && !strstr($bccdname[0]['explains'],'@')){
                    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=".$bccdname[0]['explains'], $connID);		//从数据库中查询出对应类型的数据
                    $arrayExplain=$tb_exam;
                }else{
                    $texplain = explode('@',$bccdname[0]['explains']);
                    for ($i = 0; $i < count($texplain); $i ++) {
                        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$texplain[$i] ", $connID);
                        $arrayExplain[] = $tb_exam[0];
                    }
                }

                //获取表单提交的数据，并且将计算结果存储于数组中。
                for($m=0; $m < count($arrayExplain); $m++){
                    if(isset($_POST['explain'.$arrayExplain[$m]['id']]) && $_POST['explain'.$arrayExplain[$m]['id']]!=""){
                        $pro_id=$arrayExplain[$m]['id'];										//问题ID
                        $answer = trim(strip_tags($arrayExplain[$m]['answer']));				//正确答案填空题正确答案通过空格进行分隔
                        $sub=$_POST['explain'.$arrayExplain[$m]['id']];				//将提交答案存储到字符串中
                        if($sub==""){
                            $sub="NULL";
                        }
                        if($answer==$sub){
                            $sub_answer[]=$pro_id."@explain@".$answer."@".$sub."@".$arrayExplain[$m]['fraction'];
                            $fraction=$fraction+$arrayExplain[$m]['fraction'];
                        }else{
                            $sub_answer[]=$pro_id."@explain@".$answer."@".$sub."@"."0";
                            $fraction=$fraction+0;
                        }
                    }else{
                        $pro_id=$arrayExplain[$m]['id'];										//问题ID
                        $answer=$arrayExplain[$m]['explain'];									//正确答案
                        $sub_answer[]=$pro_id."@explain@".$answer."@"."NULL"."@"."0";
                    }
                }
                $explainFraction = $arrayExplain[0]['fraction'];
                $smarty->assign('explainFraction', $explainFraction);
                $smarty->assign('Explain', "T");
                $smarty->assign('Explains', count($arrayExplain));		//将查询到的单选题数组赋给指定的模板变量
                $smarty->assign('arrayExplain', $arrayExplain);
            }

            if($bccdname[0]['answer']!=""){
                if($bccdname[0]['answer']!='' && !strstr($bccdname[0]['answer'],'@')){
                    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=".$bccdname[0]['answer'], $connID);		//从数据库中查询出对应类型的数据
                    $arrayAnswer=$tb_exam;
                }else{
                    $tanswer = explode('@',$bccdname[0]['answer']);
                    for ($i = 0; $i < count($tanswer); $i ++) {
                        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$tanswer[$i] ", $connID);
                        $arrayAnswer[] = $tb_exam[0];
                    }
                }
                //获取表单提交的数据，并且将计算结果存储于数组中。
                for($m=0; $m < count($arrayAnswer); $m++){
                    if(isset($_POST['answer'.$arrayAnswer[$m]['id']]) && $_POST['answer'.$arrayAnswer[$m]['id']]!=""){
                        $pro_id=$arrayAnswer[$m]['id'];										//问题ID
                        $answer = trim(strip_tags($arrayAnswer[$m]['answer']));		//正确答案填空题正确答案通过空格进行分隔
                        $sub=$_POST['answer'.$arrayAnswer[$m]['id']];				//将提交答案存储到字符串中
                        if($sub==""){
                            $sub="NULL";
                        }
                        if($answer==$sub){
                            $sub_answer[]=$pro_id."@answer@".$answer."@".$sub."@".$arrayAnswer[$m]['fraction'];
                            $fraction=$fraction+$arrayAnswer[$m]['fraction'];
                        }else{
                            $sub_answer[]=$pro_id."@answer@".$answer."@".$sub."@"."0";
                            $fraction=$fraction+0;
                        }
                    }else{
                        $pro_id=$arrayAnswer[$m]['id'];										//问题ID
                        $answer=$arrayAnswer[$m]['answer'];									//正确答案
                        $sub_answer[]=$pro_id."@answer@".$answer."@"."NULL"."@"."0";
                    }
                }
                $answerFraction = $arrayAnswer[0]['fraction'];
                $smarty->assign('answerFraction', $answerFraction);
                $smarty->assign('Answer', "T");
                $smarty->assign('Answers', count($arrayAnswer));		//将查询到的单选题数组赋给指定的模板变量
                $smarty->assign('arrayAnswer', $arrayAnswer);
            }*/



            if($bccdname[0]['discourse']!=""){
                if($bccdname[0]['discourse']!='' && !strstr($bccdname[0]['discourse'],'@')){
                    $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=".$bccdname[0]['discourse'], $connID);		//从数据库中查询出对应类型的数据
                    $arrayDiscourse=$tb_exam;
                }else{
                    $tdiscourse=explode('@',$bccdname[0]['discourse']);
                    for ($i = 0; $i < count($tdiscourse); $i ++) {
                        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where id=$tdiscourse[$i] ", $connID);
                        $arrayDiscourse[] = $tb_exam[0];
                    }
                }

                //获取表单提交的数据，并且将计算结果存储于数组中。
                for($m=0; $m < count($arrayDiscourse); $m++){
                    if(isset($_POST['discourse'.$arrayDiscourse[$m]['id']]) && $_POST['discourse'.$arrayDiscourse[$m]['id']]!=""){
                        $pro_id=$arrayDiscourse[$m]['id'];										//问题ID
                        $answer=explode(" ",$arrayDiscourse[$m]['discourse']);						//正确答案填空题正确答案通过空格进行分隔
                        $sub=$_POST['discourse'.$arrayDiscourse[$m]['id']];				//将提交答案存储到字符串中
                        if($sub==""){
                            $sub="NULL";
                        }
                        $sub_answer[]=$pro_id."@discourse@".$arrayDiscourse[$m]['answer']."@".$sub."@"."0";
                    }else{
                        $pro_id=$arrayDiscourse[$m]['id'];										//问题ID
                        $answer=$arrayDiscourse[$m]['discourse'];									//正确答案
                        $sub_answer[]=$pro_id."@discourse@".$answer."@"."NULL"."@"."0";
                    }
                }
                $discourseFraction = $arrayDiscourse[0]['fraction'];
                $smarty->assign('discourseFraction', $discourseFraction);
                $smarty->assign('Discourse', "T");
                $smarty->assign('Discourses', count($arrayDiscourse));		//将查询到的单选题数组赋给指定的模板变量
                $smarty->assign('arrayDiscourse', $arrayDiscourse);
            }
//完成考卷信息的提交
            if(isset($_POST['title']) && $_POST['title']!="" && isset($_POST['name']) && $_POST['name']!="" && isset($_POST['admission']) && $_POST['admission']!="" && isset($_POST['pro_class']) && $_POST['pro_class']!=""){

                $admission1 = $adminDB->executeSQL("select admission from tb_examination_user where admission='".$_POST['admission']."' and examination_id='".$_GET['examination_id']."'", $connID);
                if($admission1){
                    echo "<script>alert('您已经完成考试，不能重复提交！'); window.close();</script>";
                }else{
                    $usertype = $adminDB->executeSQL("select typework from tb_user where admission='".$_POST['admission']."'", $connID);
                    $insert=$adminDB->executeSQL("insert into tb_examination_user(title, examination_id, name, admission, pro_class, fraction, sub_answer, sub_time,nameid) values('" . $_POST['title'] . "','".$_SESSION['exam_id']."', '" . $_POST['name'] . "','". $_POST['admission'] ."', '". $usertype[0][0] ."','". $fraction ."','" . implode("*",$sub_answer) . "', '" . date("Y-m-d H:i:s") ."',".$_SESSION['user_id']. ")", $connID);
                    if($insert){
                        echo "<script>alert('试卷提交成功！');</script>";
                        echo "<script>closeParent('search_exam.php?id=".$connID->lastInsertId()."');</script>";
                    }else{
                        echo "<script>alert('试卷提交失败！');</script>";
                    }
                }
            }



            $str = "";
//循环输出答案
            for($n=0; $n<count($sub_answer); $n++){
                $exam=explode("@",$sub_answer[$n]);
                $nn=$n+1;
                if($exam[3] == 'NULL'){
                    $str.=$nn .". <a href='#".$nn."'>____</a>&nbsp;";
                }else{
                    $str.=$nn.". <a href='#".$nn."'>已答</a>&nbsp;";
                }
            }
            $smarty->assign('answer', $str);						//输出答案
//*生成考试界面*//
            $smarty->display('exam.phtml');

        }else{
    echo "<script>alert('您不在考试名单中，请确认后在登录！'); window.location.href='index.php';</script>";
}
    } else {
    echo "<script>alert('您选择的考试题不存在，请重新登录，选择！'); window.location.href='index.php'</script>";
}
}else{
    echo "<script>alert('非考试人员不能进入！'); window.location.href='index.php'</script>";
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

//*判断登录用户的权限*//
function getExamtypes(){
    global $adminDB;
    global $connID;
    $examtypeArr = array();
    $examtypes = $adminDB->executeSQL("select * from tb_exam_type", $connID);
    foreach($examtypes as $examtype){
        $examtypeArr[$examtype['english']] = $examtype['chinese'];
    }
    return $examtypeArr;
}

require_once 'bottom.php';
