<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';
require_once 'Tools.php';
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

if (isset($_GET['f']) && $_GET['f'] == 'del') {
    $sql = "delete from tb_problemtemplate where id=".$_GET['id']."";
    if($adminDB->executeSQL($sql,$connID)){
        echo "<script>alert('模板删除成功！');</script>";
    }else{
        echo "<script>alert('模板删除失败！');</script>";
    }
}
$reg = '([A-Za-z]+@(\d+@*)+)';
$t = new Tools();
$examtypeArr = $t->getExamtypeArr();
$isShow = 'F';
if(isset($_GET['id']) || isset($_POST['id'])){
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = $_POST['id'];
}
}
if ((isset($_GET['f']) && $_GET['f'] == 'edit') || (isset($_POST['f']) && $_POST['f'] == 'edit') && (isset($_POST['updatetemp']) && $_POST['updatetemp'] != '')) {
    if (isset($_POST['f']) && $_POST['f'] == 'edit') {
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
        if($fraction != $total){
            echo "<script>alert('设置的题型总分数和分数线总分数不相等，请重新设置！');window.location.href='managetemplate.php?f=edit&id=$id&big_type=试卷管理&small_type=模板管理'; </script>";
        }else{
            $sql = "update tb_problemtemplate set name='".$_POST['templatename']."',emattrid=".$_POST['passscore'].",typedistribute='".$typedistributeStr."' where id=".$id;
            if($adminDB->executeSQL($sql,$connID)){
                echo "<script>alert('模板修改成功！');window.location.href='managetemplate.php?big_type=试卷管理&small_type=模板管理'</script>";
            }else{
                echo "<script>alert('模板修改失败！');</script>";
            }
        }
    }


    $isShow = 'T';
    $bigtype = $adminDB->executeSQL("select * from tb_problemtemplate where id='" . $id . "'", $connID);
    $smarty->assign('bigtype', $bigtype);
    $temp = array();
    $emid = $bigtype[0]['emattrid'];
    $typeStr = $bigtype[0]['typedistribute'];
    preg_match_all($reg,$typeStr,$out); // 截取字符串，得到类似 radio@2@ 或者judument@2 样式的字符串
    if(count($out[0])){
        foreach($out[0] as $ts){
            $tArr = explode('@',$ts);// 得到类型和数量的数组
            $temp[$tArr[0]] = $tArr[1];
        }
    }
    $temp['id'] = $bigtype[0]['id'];
    $temp['name'] = $bigtype[0]['name'];
    $temp['emattrid'] = $emid;
    $smarty->assign('temp', $temp);
}
$smarty->assign('isShow', $isShow);
//

$template = array();
$templateArr = $adminDB->executeSQL("select * from tb_problemtemplate  order by id", $connID);
if(count($templateArr[0])){
    foreach($templateArr as $k=>$tp){
        $typefinalStr = '';
        $emid = $tp['emattrid'];
        $ids = $adminDB->executeSQL("select * from tb_examattribute  where id=".$emid, $connID);
        $template[$k]['score'] = '总分：'.$ids[0]['totalscore'].'&nbsp;分数线：'.$ids[0]['passscore'];
        $typeStr = $tp['typedistribute'];
        preg_match_all($reg,$typeStr,$out); // 截取字符串，得到类似 radio@2@ 或者judument@2 样式的字符串
        if(count($out[0])){
            foreach($out[0] as $ts){
                $tArr = explode('@',$ts);// 得到类型和数量的数组
                $typefinalStr.= $examtypeArr[$tArr[0]].":".$tArr[1]."道  ";
            }
        }
        $template[$k]['id'] = $tp['id'];
        $template[$k]['name'] = $tp['name'];
        $template[$k]['type'] = $typefinalStr;
    }
}
$smarty->assign('template',$template);

$smarty->display('managetemplate.phtml');