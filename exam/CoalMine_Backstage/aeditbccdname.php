<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//循环输出试卷数据

if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$bcjyzs = $pageDB->pageData("select * from tb_examination order by id desc", $connID, 20, $page, 10);
$smarty->assign('bcjyzs', $bcjyzs);


//执行数据的删除操作
if (isset($_GET['delete']) && $_GET['delete'] == 't') {
    if ($adminDB->executeSQL("delete from tb_examination where id='" . $_GET['id'] . "'", $connID)) {
        echo '<script>alert("试卷删除成功！");window.location.href="aeditbccdname.php?big_type=试卷管理 & small_type=管理上岗考核试卷"</script>';
    } else {
        echo '<script>alert("试卷删除失败！")</script>';
    }
}
$tb_exam_type = $adminDB->executeSQL("select * from tb_exam_type ", $connID);
$smarty->assign('tb_exam_type', $tb_exam_type);
//对数据进行更改
if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    $tb_templates = $adminDB->executeSQL("select * from tb_problemtemplate order by id", $connID);
    $arrayTemplate = array();
    if(count($tb_templates)){
        foreach($tb_templates as $k=>$tb_template){
            $arrayTemplate[$tb_template['id']] = $tb_template['name'];
        }
    }
    $smarty->assign('tb_template', $arrayTemplate);
    $bccdname = $adminDB->executeSQL("select * from tb_examination where id='" . $_GET['id'] . "'", $connID);
    $_SESSION['bccdname'] = $bccdname;
    $templateid = $bccdname[0]['templateid'];
    $smarty->assign('templateid', $templateid);
    $arrayType = array();
    $arrayBccdnames=array();
    foreach($tb_exam_type as $et){
        if($bccdname[0][$et['english']] != ""){
            ${$et['english']} = explode('@',$bccdname[0][$et['english']]);
            foreach(${$et['english']} as $eet){
                ${"a".$et['english']}[] = $et['english']."[]".$eet;
            }
            $arrayType[] = ${"a".$et['english']};
        }
    }
//   	if($bccdname[0]['radio']!=""){
//		$radio=	explode('@',$bccdname[0]['radio']);
//		$arrayType[] = $radio;
//	}
//
//	if($bccdname[0]['checkbox']!=""){
//		$checkbox=	explode('@',$bccdname[0]['checkbox']);
//		$arrayType[] = $checkbox;
//	}
//
//	if($bccdname[0]['fill']!=""){
//		$fill=	explode('@',$bccdname[0]['fill']);
//		$arrayType[] = $fill;
//	}
//
//	if($bccdname[0]['judgment']!=""){
//		$judgment=	explode('@',$bccdname[0]['judgment']);
//		$arrayType[] = $judgment;
//	}
//
//	if($bccdname[0]['answer']!=""){
//		$answer=explode('@',$bccdname[0]['answer']);
//	$arrayType[] = $answer;
//	}
//
//	if($bccdname[0]['discourse']!=""){
//		$discourse=	explode('@',$bccdname[0]['discourse']);
//		$arrayType[] = $discourse;
//	}


    for ($i = 0; $i < count($arrayType); $i ++) {
        for ($ii = 0; $ii < count($arrayType[$i]); $ii ++) {
            $arrayBccdnames[] = $arrayType[$i][$ii];
        }
    }
    $exam_user = array();
    $typeStr = implode("@",$arrayBccdnames);
    $smarty->assign('arrayUser', $exam_user);
    $smarty->assign('typeStr', $typeStr);
    $smarty->assign('arrayType', $arrayBccdnames);
    $smarty->assign('bccdname', $bccdname);
    $smarty->assign('edit', 't');
}

//输出工种到下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['typename'];
}
$smarty->assign('arrayBccdnames1', $bccdNames);
$tools = new Tools();
if(isset($bccdname[0]['pro_class'])){
	$displayType = $tools->getWorktype($bccdNames,$bccdname[0]['pro_class']);
	$smarty->assign('displayType',$displayType);
}
//输出试题类型

//输出职工
$tb_user = $adminDB->executeSQL("select id,name,typework from tb_user where freeze!='1' ", $connID);
$smarty->assign('tb_user', $tb_user);


if(isset($bccdname[0]['pro_class'])){
//输出试题
	$tb_exam = $adminDB->executeSQL("select * from tb_exam_problem where pro_class=".$bccdname[0]['pro_class'], $connID);
	$smarty->assign('tb_exam', $tb_exam);
}
//
//$checkedquestionsArr = explode('@',$_POST['checkedquestions']);
//foreach($tb_exam_type as $k=>$et){
//    ${'a'.$et['english']} = array();
//    if(count($checkedquestionsArr)){
//        foreach($checkedquestionsArr as $c){
//            if(strpos($c,$et['english']) !== false){
//                $cr = explode('[]',$c);
//                $id = $cr[1];
//                ${'a'.$et['english']}[] = $id;
//            }
//        }
//    }
//    if(isset($_POST[$et['english']]) && $_POST[$et['english']] != ""){	//判断是否提交单选题数据
//        ${$et['english']}=implode('@',array_unique(array_merge($_POST[$et['english']],${'a'.$et['english']}))); 	 		//对提交的数据进行由数组到字符串的转换，以@为分隔符
//    }elseif(count(${'a'.$et['english']})){
//        ${$et['english']} = implode('@',${'a'.$et['english']});
//    }else{
//        ${$et['english']}="";
//    }
//}



if(isset($_POST['start_exam']) && $_POST['start_exam']!="" && isset($_POST['over_exam']) && $_POST['over_exam']!=""){
	$start_exam=$_POST['start_exam'];
	$over_exam=$_POST['over_exam'];	
}else{
	$start_exam="null";
	$over_exam="null";	
}


if (isset($_POST['title']) && $_POST['title'] != '') {
	if ($adminDB->executeSQL("update tb_examination set title='".$_POST['title']."', pro_class='".$_POST['pro_class']."', start_exam='".$start_exam."', over_exam='".$over_exam."', dates='".date("Y-m-d")."' where  id='".$_POST['exam_id']."'", $connID)) {
        echo "<script>alert('试卷更改成功！');window.location.href='aeditbccdname.php?page=".$page."&big_type=".$_GET['big_type']."&small_type=".$_GET['small_type']."';</script>";
    } else {
    	echo '<script>alert("试卷更改失败！")</script>';
   	}	
}

//

$smarty->display('aeditbccdname.phtml');