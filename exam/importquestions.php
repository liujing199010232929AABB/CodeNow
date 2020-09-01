<?php
require_once 'lzh.inc.php';
require_once 'reader.php';
require_once 'Tools.php';


function convertStr($str){
    $str = iconv("gb2312","utf-8",$str);
    return $str;
}


function handleExcel($filename){
    global $adminDB;
    global $connID;
    $failed = false;
    $protype = 'checkbox';
    $proclass = 12;
    $data = new Spreadsheet_Excel_Reader();
    // Set output Encoding.
    $data->setOutputEncoding('gbk');
    $data->read($filename);
    for ($i = 1; $i <= 294; $i=$i+2) {  //以下注释的for循环打印excel表数据
        $search_list = 5;
        $content =  convertStr(trim($data->sheets[0]['cells'][$i][1]));
        $content1 = mb_substr($content,strpos($content,".")+1);
        $content2 = $content1."<br>".convertStr(trim($data->sheets[0]['cells'][$i+1][1]));
        $answer =  trim(convertStr($data->sheets[0]['cells'][$i][2]));

        if($protype == 'judgment'){
            if(trim($answer) == '0'){
                $answer = "错误";
            }else if(trim($answer) == '1'){
                $answer = "正确";
            }
        }
        $fraction =  3;
$resolve = "";
        if(!$adminDB->executeSQL("insert into tb_exam_problem(content,search_list,answer,fraction,pro_type, pro_class,upload_date,resolve) values('" . $content2. "', '" . $search_list . "','" . $answer . "', '" . $fraction . "','".$protype."', '".$proclass."', '" . date("Y-m-d ") . "', '".$resolve."')", $connID)){
            $failed = true;
        }
    }
    if(!$failed){
        echo "<script>alert('试题导入成功！');</script>";
    }else{
        echo "<script>alert('试题导入失败！');</script>";
    }
}

handleExcel('22.xls');