<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';
//
if (isset($_GET['years'])) {
    $years = $_GET['years'];
} else {
    $years = date('Y');
}
$smarty->assign('years', $years);

if (isset($_GET['months'])) {
    $months = $_GET['months'];
} else {
    $months = date('m');
}
$smarty->assign('months', $months);

if (isset($_GET['days'])) {
    $days = $_GET['days'];
} else {
    $days = date('d');
}
$smarty->assign('days', $days);

$arrayYear = array();

for ($i = 2000; $i < 2050; $i ++) {
    $arrayYear[$i] = $i;
}
for($m=1; $m<=12; $m++){
	if($m<10){
		$arrayMonth['0'.$m]="0".$m;
	}else{
		$arrayMonth[$m]=$m;
	}
}
for($d=1; $d<=31; $d++){
	if($d<10){
		$arrayDay['0'.$d]="0".$d;
	}else{
		$arrayDay[$d]=$d;
	}
}
for ($h=0; $h<=24; $h++){
	if($h<10){
		$arrayHour['0'.$h]='0'.$h;
	}else{
		$arrayHour[$h]=$h;
	}
}
for ($m=0; $m<=60; $m++){
	if($m<10){
		$arrayMinute['0'.$m]='0'.$m;
		$arraySecond['0'.$m]='0'.$m;
	}else{
		$arrayMinute[$m]=$m;
		$arraySecond[$m]=$m;
	}
}
$smarty->assign('arrayYear', $arrayYear);
$smarty->assign('arrayMonth', $arrayMonth);
$smarty->assign('arrayDay', $arrayDay);
$smarty->assign('arrayHour', $arrayHour);
$smarty->assign('arrayMinute', $arrayMinute);
$smarty->assign('arraySecond', $arraySecond);

//输出工种到下拉列表
//$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id, typename from tb_types_work  order by addtime desc", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['typename'];
}
$bccdNames = $adminDB->executeSQL("select * from tb_types_work", $connID);
$tools = new Tools();
$categoryArr = $tools->recursion($bccdNames,0,0);
for ($i = 0; $i < count($categoryArr); $i ++) {
    $category[$categoryArr[$i]['id']] = $categoryArr[$i]['typename'];
}
$bigtypes = $adminDB->executeSQL("select id, typename, addtime,pid from tb_types_work  order by addtime", $connID);
$arr = array();
for ($i = 0; $i < count($bigtypes); $i ++) {
    $arr[$i] = array(
        'id'      => $bigtypes[$i]['id'],
        'parentid'=> $bigtypes[$i]['pid'],
        'name'    => $bigtypes[$i]['typename'],
    );
}
$tree = new Tree();
$tree->tree($arr);
$typeArr = $tree->getArray();
/*$brr = array();
foreach($typeArr as $k=>$t){
    $typeArr[$k]['addtime'] = $brr[$t['id']];

}*/
$displayType = $tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>");
$smarty->assign('displayType',$displayType);
//$smarty->assign('arrayBccdnames', $arrayBccdnames);
$smarty->assign('arrayClass', $bccdNames);
//输出考题类型
$tb_exam_type = $adminDB->executeSQL("select * from tb_exam_type ", $connID);
$smarty->assign('tb_exam_type', $tb_exam_type);

//输出参考职工
$tb_user = $adminDB->executeSQL("select id,name,typework from tb_user where freeze!='1' ", $connID);
$smarty->assign('tb_user', $tb_user);

// 输出分数和分数线
$tb_scores = $adminDB->executeSQL("select * from tb_examattribute order by id", $connID);
$arrayScore = array();
if(count($tb_scores)){
    foreach($tb_scores as $tb_score){
        $arrayScore[$tb_score['id']] = '总分：'.$tb_score['totalscore'].'&nbsp;&nbsp;&nbsp;分数线：'.$tb_score['passscore'];
    }
}
$smarty->assign('arrayScore', $arrayScore);

$pageSize = 20;
$sql = "select * from tb_exam_problem where isactive=1";
$problem = array();
foreach($tb_exam_type as $etype){
    $cond = " and pro_type='".$etype['english']."' limit ".$pageSize;
    $problem[$etype['english']] = $adminDB->executeSQL($sql.$cond, $connID);
}
$smarty->assign('problem', $problem);
if(isset($_POST['template']) && $_POST['template'] != ''){
    $reg = '([A-Za-z]+@(\d+@*)+)';
    $tinfo = $adminDB->executeSQL("select * from tb_problemtemplate where id=".$_POST['template'], $connID);
    $typeStr = $tinfo[0]['typedistribute'];
    $typedisArr = array();
    preg_match_all($reg,$typeStr,$out); // 截取字符串，得到类似 radio@2@ 或者judument@2 样式的字符串
    if(count($out[0])){
        foreach($out[0] as $ts){
            $tArr = explode('@',$ts);// 得到类型和数量的数组
            $typedisArr[$tArr[0]] = $tArr[1];
        }
    }
}
$fill="";
$radioArr = array();
$checkboxArr = array();
$fillArr = array();
$judgmentArr = array();
$answerArr = array();
$explainArr = array();
$tb_templates = $adminDB->executeSQL("select * from tb_problemtemplate order by id", $connID);
$arrayTemplate = array();
if(count($tb_templates)){
    foreach($tb_templates as $k=>$tb_template){
        $arrayTemplate[$tb_template['id']] = $tb_template['name'];
    }
}
$smarty->assign('tb_template', $arrayTemplate);

    if(isset($_POST['submit2']) && $_POST['submit2']=="随机生成试卷"){
        $radio_max_num = 40;
        $checkbox_max_num = 30;
        $fill_max_num = 30;
        $judgment_max_num = 30;
        $answer_max_num = 10;
        $discourse_max_num = 10;
        $tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where pro_class=".$_POST['pro_class']." and isactive=1", $connID);	//查询考题数据
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
        }

        if(count($radios) && isset($typedisArr['radio']) && $typedisArr['radio'] && $typedisArr['radio'] != '' && $typedisArr['radio'] != 0){
            if(count($radios)<$typedisArr['radio']){
                if(count($radios)<$radio_max_num){
                    $radio_rand=array_rand($radios,count($radios));
                }else{
                    $radio_rand=array_rand($radios,$radio_max_num);
                }
            }else{
                $radio_rand=array_rand($radios,$typedisArr['radio']);
            }
            if(count($radio_rand) == 1){
                $radio = $radios[$radio_rand];
            }else{
                for($i=0; $i<count($radio_rand); $i++){				//循环读取获取的键值
                    $radio_exam[]=$radios[$radio_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
                }
                $radio=implode('@',$radio_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
            }
        }

        if(count($checkboxs) && isset($typedisArr['checkbox']) && $typedisArr['checkbox'] != '' && $typedisArr['checkbox'] != 0){
            if(count($checkboxs)<$typedisArr['checkbox']){
                if(count($checkboxs)<$checkbox_max_num){
                    $checkbox_rand=array_rand($checkboxs,count($checkboxs));
                }else{
                    $checkbox_rand=array_rand($checkboxs,$checkbox_max_num);
                }
            }else{
                $checkbox_rand=@array_rand($checkboxs,$typedisArr['checkbox']);					//随机提取考题，获取其键值
            }
            if(count($checkbox_rand) == 1){
                $checkbox = $checkboxs[$checkbox_rand];
            }else{
                for($i=0; $i<count($checkbox_rand); $i++){				//循环读取获取的键值
                    $checkbox_exam[]=$checkboxs[$checkbox_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
                }
                $checkbox=implode('@',$checkbox_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
            }
        }
        //生成随机填空题
        if(isset($fills) && isset($typedisArr['fill']) && $typedisArr['fill'] != '' && $typedisArr['fill'] != 0){
            if(count($fills)<$typedisArr['fill']){
                if(count($fills)<$fill_max_num){
                    $fill_rand=array_rand($fills,count($fills));
                }else{
                    $fill_rand=array_rand($fills,$fill_max_num);
                }
            }else{
                $fill_rand=array_rand($fills,$typedisArr['fill']);					//随机提取考题，获取其键值
            }
            if(count($fill_rand) == 1){
                $fill = $fills[$fill_rand];
            }else{
                for($i=0; $i<count($fill_rand); $i++){				//循环读取获取的键值
                    $fill_exam[]=$fills[$fill_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
                }
                $fill=implode('@',$fill_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
            }
        }

        //生成随机判断题
        if(count($judgments) && isset($typedisArr['judgment']) && $typedisArr['judgment'] != '' && $typedisArr['judgment'] !=0){
            if(count($judgments)<$typedisArr['judgment']){
                if(count($judgments)<$judgment_max_num){
                    $judgment_rand=array_rand($judgments,count($judgments));
                }else{
                    $judgment_rand=array_rand($judgments,$judgment_max_num);
                }
            }else{
                $judgment_rand=array_rand($judgments,$typedisArr['judgment']);					//随机提取考题，获取其键值
            }
            if(count($judgment_rand) == 1){
                $judgment = $judgments[$judgment_rand];
            }else{
                for($i=0; $i<count($judgment_rand); $i++){				//循环读取获取的键值
                    $judgment_exam[]=$judgments[$judgment_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
                }
                $judgment=implode('@',$judgment_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
            }
        }

        /*if(count($explains) && $typedisArr['explain'] && $typedisArr['explain'] != '' && $typedisArr['explain'] != 0){
            if(count($explains)<$typedisArr['explain']){
                if(count($explains)<$explain_max_num){
                    $explain_rand=array_rand($explains,count($explains));
                }else{
                    $explain_rand=array_rand($explains,$explain_max_num);
                }
            }else{
                $explain_rand=array_rand($explains,$typedisArr['explain']);					//随机提取考题，获取其键值
            }
            if(count($explain_rand) == 1){
                $explain = $explains[$explain_rand];
            }else{
                for($i=0; $i<count($explain_rand); $i++){				//循环读取获取的键值
                    $explain_exam[]=$explains[$explain_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
                }
                $explain=implode('@',$explain_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
            }
        }*/

        //生成随机简答题
        /*if(count($answers) && isset($typedisArr['answer']) && $typedisArr['answer'] != '' && $typedisArr['answer'] !=0){
            if(count($answers)<$typedisArr['answer']){
                if(count($answers)<$answer_max_num){
                    $answer_rand=array_rand($answers,count($answers));
                }else{
                    $answer_rand=array_rand($answers,$answer_max_num);
                }
            }else{
                $answer_rand=array_rand($answers,$typedisArr['answer']);					//随机提取考题，获取其键值
            }
            if(count($answer_rand) == 1){
                $answer = $answers[$answer_rand];
            }else{
                for($i=0; $i<count($answer_rand); $i++){				//循环读取获取的键值
                    $answer_exam[]=$answers[$answer_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
                }
                $answer=implode('@',$answer_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
            }
        }*/
//
//        //生成随机论述题
//        if(count($discourses) && isset($_POST['dis']) && $_POST['dis'] != '' && $_POST['dis'] != 0){
//            if(count($discourses)<$_POST['dis']){
//                if(count($discourses)<$discourse_max_num){
//                    $discourse_rand=array_rand($discourses,count($discourses));
//                }else{
//                    $discourse_rand=array_rand($discourses,$discourse_max_num);
//                }
//            }else{
//                $discourse_rand=array_rand($discourses,$_POST['dis']);					//随机提取考题，获取其键值
//            }
//            if(count($discourse_rand) == 1){
//                $discourse = $discourses[$discourse_rand];
//            }else{
//                for($i=0; $i<count($discourse_rand); $i++){				//循环读取获取的键值
//                    $discourse_exam[]=$discourses[$discourse_rand[$i]];			//根据键值从对应的考题数组中获取指定的随机考题，并且添加到指定的随机考题数组中
//                }
//                $discourse=implode('@',$discourse_exam); 	 				//对生成的随机考题数组进行由数组到字符串的转换，以@为分隔符
//            }
//        }
    }


if(isset($_POST['pro_class']) && $_POST['pro_class']!=""){
    $pro_class = $_POST['pro_class'];
    $sql = "select id from tb_user where typework=".$pro_class;
    $proArr = $adminDB->executeSQL($sql,$connID);
    foreach($proArr as $p){
        $idArr[] = $p['id'];
    }
	$exam_user=implode('@',$idArr); 	 				//获取要考试的职工，以@为分隔符
}else{
	$exam_user="null";
}


if(isset($_POST['years']) && $_POST['years']!="" && isset($_POST['year']) && $_POST['year']!=""){
	$start_exam=$_POST['years'].'-'.$_POST['months'].'-'.$_POST['days'].' '.$_POST['hours'].':'.$_POST['minutes'].':'.$_POST['seconds'];
	$over_exam=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'].' '.$_POST['hour'].':'.$_POST['minute'].':'.$_POST['second'];
}else{
	$start_exam="null";
	$over_exam="null";
}
if (isset($_POST['title']) && $_POST['title'] != '') {
    if (! $adminDB->executeSQL("insert into tb_examination(title, pro_class, exam_user,start_exam, over_exam, radio, checkbox, fill, judgment, dates,templateid) values('" . $_POST['title'] . "', '" . $_POST['pro_class'] . "','".$exam_user."', '".$start_exam."','".$over_exam."','" . $radio . "','" . $checkbox . "','" . $fill . "','" . $judgment . "', '".date("Y-m-d ")."',".$_POST['template']. ")", $connID)){
        echo "<script>alert('试卷添加失败！');</script>";
    } else {
        echo "<script>alert('试卷添加成功！');window.location.href='aeditbccdname.php?big_type=试卷管理 & small_type=管理上岗考核试卷'</script>";
    }
}
$smarty->display('aaddbccdname.phtml');

function getEnglishname(){
    global $adminDB;
    global $connID;
    $englishnameArr = array();
    $englishnames = $adminDB->executeSQL("select pid,english from tb_exam_type order by id", $connID);
    foreach($englishnames as $english){
        $englishnameArr[] = array($english['english'],$english['pid']);
    }
    return $englishnameArr;
}