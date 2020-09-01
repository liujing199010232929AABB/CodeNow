<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
$bccdNames = $adminDB->executeSQL("select * from tb_types_work", $connID);

$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);


$arrayTypes = array();
$Types = $adminDB->executeSQL("select id,chinese,english from tb_exam_type ", $connID);
for ($i = 0; $i < count($Types); $i ++) {
    $arrayTypes[$Types[$i]['english']] = $Types[$i]['chinese'];
}
$smarty->assign('arrayTypes', $arrayTypes);		//输出考题题型
$map = "";
function getLastId($username,$questype,$pro_class){
    global $adminDB;
    global $connID;
    $lastsql = "select questionid from tb_useranswer where username='".$username."' and type='s' and questype='".$questype."' and pro_class='".$pro_class."' order by addtime desc limit 1";
    $lastIdArr = $adminDB->executeSQL($lastsql, $connID);
    $lastId = $lastIdArr[0][0];
    if($lastId != ''){
        $map = '#'.$lastId;
    }else{
        $map = '';
    }
    return $map;
}


if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
    if(isset($_POST['pro_class']) && $_POST['pro_class']!="" && isset($_POST['pro_type']) && $_POST['pro_type']!=""){		//完成对登录用户的判断
        $arrayExams = $adminDB->executeSQL("select * from tb_exam_problem where pro_class='".$_POST['pro_class']."' and pro_type='".$_POST['pro_type']."' ", $connID);
        if($arrayExams){
            $map = getLastId($_SESSION['name'],$_POST['pro_type'],$_POST['pro_class']);
            echo "<script>window.location.href='Special_exams.php?pro_class=".$_POST['pro_class']."&pro_type=".$_POST['pro_type'].$map."'</script>";
        }else{
            echo "<script>alert('无此类型试题！'); window.close();</script>";
        }
    }
}elseif(isset($_POST['netname']) && $_POST['netname']!="" && isset($_POST['password']) && $_POST['password']!=""){
    $bccdNames = $adminDB->executeSQL("select id, name, password,admission,picture,typework from tb_user where password='".md5($_POST['password'])."' and name='".$_POST['netname']."' ", $connID);
    if ($bccdNames){
        $_SESSION['name'] = $bccdNames[0]['name'];		//定义登录用户ID
        if(isset($_POST['pro_class']) && $_POST['pro_class']!="" && isset($_POST['pro_type']) && $_POST['pro_type']!=""){		//完成对登录用户的判断
            $arrayExams = $adminDB->executeSQL("select * from tb_exam_problem where pro_class='".$_POST['pro_class']."' and pro_type='".$_POST['pro_type'].$map."' ", $connID);
            if($arrayExams){
                $map = getLastId($_POST['netname'],$_POST['pro_type'],$_POST['pro_class']);
                echo "<script>window.location.href='Special_exams.php?pro_class=".$_POST['pro_class']."&pro_type=".$_POST['pro_type'].$map."'</script>";
            }else{
                echo "<script>alert('无此类型试题！'); window.close();</script>";
            }
        }
    }else{
        echo "<script>alert('账号或密码错误，请重新登录！'); window.close();</script>";
    }
}



$smarty->display('Special_exercises.phtml');