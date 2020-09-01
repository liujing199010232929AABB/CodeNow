<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

$tb_exam_type = $adminDB->executeSQL("select * from tb_exam_type order by id", $connID);//获取题型
$smarty->assign('tb_exam_type', $tb_exam_type); // 赋予模板
$tb_scores = $adminDB->executeSQL("select * from tb_examattribute order by id", $connID); // 获取分数线信息
$arrayScore = array();
if(count($tb_scores)){
    foreach($tb_scores as $tb_score){
        $arrayScore[$tb_score['id']] = '总分：'.$tb_score['totalscore'].'&nbsp;&nbsp;&nbsp;分数线：'.$tb_score['passscore'];
    }
}
$smarty->assign('arrayScore', $arrayScore);
if (isset($_POST['passscore']) && $_POST['passscore'] != '' && isset($_POST['templatename']) && $_POST['templatename'] != '') {
    $typedistributeStr = "";
    $fraction = 0;
    $totalArr =$adminDB->executeSQL("select totalscore from tb_examattribute where id=".$_POST['passscore'],$connID);
    $total = $totalArr[0][0];
    foreach($tb_exam_type as $k=>$te){
        if($_POST[$te['english'].'num']){
            $fArr = $adminDB->executeSQL("select fraction from tb_exam_problem where pro_type='".$te['english']."' limit 1",$connID);
            if($k == count($tb_exam_type)-1){
                $typedistributeStr.= $te['english'].'@'.$_POST[$te['english'].'num'];
            }else{
                $typedistributeStr.= $te['english'].'@'.$_POST[$te['english'].'num']."@";
            }
            $fraction += $fArr[0][0]*$_POST[$te['english'].'num'];
        }else{
            if($k == count($tb_exam_type)-1){
                $typedistributeStr.= $te['english'].'@0';
            }else{
               $typedistributeStr.= $te['english'].'@0@';
            }
        }
    }
//    echo $fraction;echo "<br/>";
//    echo $total;exit;
    if($fraction != $total){
        echo "<script>alert('设置的题型总分数和分数线总分数不相等，请重新设置！');window.location.href='templatedefine.php?big_type=试卷管理&small_type=模板定义'; </script>";
    }else{
        $sql = "insert into tb_problemtemplate(name,emattrid,typedistribute)values('".$_POST['templatename']."',".$_POST['passscore'].",'".$typedistributeStr."')";
        if($adminDB->executeSQL($sql,$connID)){
            echo "<script>alert('模板添加成功！');window.location.href='managetemplate.php?big_type=试卷管理&small_type=模板管理'</script>";
        }else{
            echo "<script>alert('模板添加失败！');</script>";
        }
    }
}


$smarty->display('templatedefine.phtml');