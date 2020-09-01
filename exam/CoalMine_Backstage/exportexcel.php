<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

$t = new Tools();
$filename = date("YmdHis") . mt_rand(1000, 9999);
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=".$filename.".xls");
$datas = $_SESSION['export_data'];
echo $t->convertStr1("准考证号")."\t";
echo $t->convertStr1("考试名称")."\t";
echo $t->convertStr1("姓名")."\t";
echo $t->convertStr1("身份证号")."\t";
echo $t->convertStr1("得分")."\t";
echo "\n";
if(count($datas)){
    foreach($datas as $data){
        echo "=\"".$t->convertStr1($data['admission'])."\""."\t";
        echo $t->convertStr1($data['title'])."\t";
        echo $t->convertStr1($data['name'])."\t";
        echo "=\"".$t->convertStr1($data['ID_number'])."\""."\t";
        echo $t->convertStr1($data['fraction'])."\t";
        echo "\n";
    }
}
