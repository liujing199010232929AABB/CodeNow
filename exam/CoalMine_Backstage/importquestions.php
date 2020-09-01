<?php
require_once 'lzh.inc.php';
require_once 'reader.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

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
foreach($typeArr as $k=>$t){
    $typeArr[$k]['addtime'] = $brr[$t['id']];

}
$displayType = $tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>",$upid);
$smarty->assign('displayType',$displayType);

if (isset($_FILES["importfile"]["name"]) && $_FILES["importfile"]["name"] != '') {
    $dir = "./upfiles/import/questions";
    if (! is_dir($dir)) {
        mkdir($dir);
    }
    $upfilename = $_FILES['importfile']['name'];
    $filename = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strpos($upfilename, "."), strlen($upfilename) - strpos($upfilename, "."));
    $address = $dir . "/" . $filename;
    if(!@move_uploaded_file($_FILES['importfile']['tmp_name'],$address)){
        echo "<script>alert('上传文件失败！');</script>";
    }else{
        handleExcel($address);
    }
}
// output exam type
$tb_exam_type = array();
$examNames = $adminDB->executeSQL("select id, chinese,english,pid,addtime from tb_exam_type  order by addtime", $connID);

$displayExamType = $tools->getExamType($examNames,'en');
$smarty->assign('tb_exam_type',  $displayExamType);

function convertStr($str){
    $str = iconv("gb2312","utf-8",$str);
    return $str;
}


function handleExcel($filename){
    global $adminDB;
    global $connID;
    global $tools;
    $failed = false;
//    $worktypeArr = getWorktypes();
    $protype = $_POST['pro_type'];
    $proclass = $_POST['pro_class'];
    $data = new Spreadsheet_Excel_Reader();
    $startnum = 3;
    $radio_max_search_num = 6;
    $checkbox_max_search_num = 8;
    // Set output Encoding.
    $data->setOutputEncoding('gbk');
    $data->read($filename);
    for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {  //以下注释的for循环打印excel表数据
        if($i == 1) continue;
$finalanswer = "";
        $search_list = 0;
        $content =  trim(convertStr($data->sheets[0]['cells'][$i][2]));
        if($content == '') continue;

        $contentArr = array();
        $contentArr[] = $content;
        if($protype == 'radio'){
            $loop = $answernum = $startnum+$radio_max_search_num;
         }elseif($protype == 'checkbox'){
            $loop = $answernum = $startnum+$checkbox_max_search_num;
         }else{
            $loop = $answernum = $startnum;
         }
        for($j = $startnum;$j < $loop;$j++){
            $ar = trim(convertStr($data->sheets[0]['cells'][$i][$j]));
            if($ar != ''){
                $contentArr[] = substr(convertStr($data->sheets[0]['cells'][1][$j]),-1)."、".$ar;
                $search_list++;
            }
        }
        $finalcontent = implode("<br/>",$contentArr);
        $answer =  trim(convertStr($data->sheets[0]['cells'][$i][$answernum]));
        if($protype == 'checkbox'){
            for($kk=0;$kk<strlen($answer);$kk++){
                $finalanswer .= $answer[$kk]." ";
            }
            $answer = trim($finalanswer);
        }
        if($protype == 'judgment'){
            if(trim($answer) == '0'){
                $answer = "错误";
            }else if(trim($answer) == '1'){
                $answer = "正确";
            }
        }
        $fraction =  $_POST['fraction'];
        $resolve =  trim(convertStr($data->sheets[0]['cells'][$i][++$answernum]));
//        $note = trim(convertStr($data->sheets[0]['cells'][$i][++$answernum]));
//        $vurl = trim(convertStr($data->sheets[0]['cells'][$i][++$answernum]));
//        $flashurl = trim(convertStr($data->sheets[0]['cells'][$i][$answernum++]));
        if(!$adminDB->executeSQL("insert into tb_exam_problem(content,search_list,answer,fraction,pro_type, pro_class,upload_date,resolve) values('" . $finalcontent. "', '" . $search_list . "','" . $answer . "', '" . $fraction . "','".$protype."', '".$proclass."', '" . date("Y-m-d ") . "', '".$resolve."')", $connID)){
            $failed = true;
        }
    }
    if(!$failed){
        echo "<script>alert('试题导入成功！');</script>";
    }else{
        echo "<script>alert('试题导入失败！');</script>";
    }
    @unlink($filename);
}
$smarty->display('importquestions.phtml');