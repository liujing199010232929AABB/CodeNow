<?php
require_once 'lzh.inc.php';
require_once 'reader.php';

handleExcel("G:\\1111.xls");
function handleExcel($filename){
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('gb2312');
    $data->read($filename);
    for ($i = 1; $i <=$data->sheets[0]['numRows']; $i++) {  //以下注释的for循环打印excel表数据
        for($j=1;$j<=2;$j++){
            $contentArr[$i][] = $data->sheets[0]['cells'][$i][$j];
//            echo iconv('gbk','utf-8',$data->sheets[0]['cells'][$i][$j]);echo iconv('gbk','utf-8',"<br/>");
        }
    }
    createNewExcel($contentArr,"G:\\ccc.xls");
//    for ($ii = 1; $ii <= $data->sheets[1]['numRows']; $ii++) {  //以下注释的for循环打印excel表数据
//        for($jj=1;$jj<=2;$jj++){
//            echo iconv('gbk','utf-8',$data->sheets[1]['cells'][$ii][$jj]);echo iconv('gbk','utf-8',"<br/>");
//        }
//    }
//    for ($iii = 1; $iii <= $data->sheets[2]['numRows']; $iii++) {  //以下注释的for循环打印excel表数据
//        for($jjj=1;$jjj<=2;$jjj++){
//            echo iconv('gbk','utf-8',$data->sheets[2]['cells'][$i][$j]);echo iconv('gbk','utf-8',"<br/>");
//        }
//    }
}

function createNewExcel($dataArr,$filepath){
    $fp = fopen($filepath,"a");
//    $s1 = "序号\t内容\t正确答案\t分析\t备注\t附件\t链接视频\t链接动画\n";
//    $s1 = iconv("utf-8","gbk",$s1);
//    $s2 = "";
//    if(count($dataArr)){
//        foreach($dataArr as $k=>$data){
//            if(iconv("gbk","utf-8",$data[1]) == "T" || iconv("gbk","utf-8",$data[1]) == 'V' || iconv("gbk","utf-8",$data[1]) == '√'){
//                $answer = 1;
//            }else{
//                $answer = 0;
//            }
//
//            $s2.= $k."\t".$data[0]."\t".$answer."\t\t\t\t\t\n";
//        }
//    }
    $s1 = "序号\t内容\t答案A\t答案B\t答案C\t答案D\t答案E\t答案F\t答案G\t答案H\t正确答案\t分析\t备注\t附件\t链接视频\t链接动画\n";
    $s1 = iconv("utf-8","gbk",$s1);
    $s2 = "";
    $k = 0;
        for($i=0;$i<count($dataArr)-2;$i=$i+2){
//            if(iconv("gbk","utf-8",$data[1]) == "T" || iconv("gbk","utf-8",$data[1]) == 'V' || iconv("gbk","utf-8",$data[1]) == '√'){
//                $answer = 1;
//            }else{
//                $answer = 0;
//            }
            $k++;
            $all = iconv("gbk","utf-8",$dataArr[$i][0]);
            $a1 = strpos($all,"A");
            $a2 = strpos($all,"B");
            $a3 = strpos($all,"C");
            $a4 = strpos($all,"D");
            $a5 = strpos($all,"E");
            $a6 = strpos($all,"F");
            $A = iconv("utf-8","gbk",substr($all,$a1,$a2));
            $B = iconv("utf-8","gbk",substr($all,$a2,$a2));
            $C = iconv("utf-8","gbk",substr($all,$a3,$a3));
            $D = iconv("utf-8","gbk",substr($all,$a4,$a4));
            $E = iconv("utf-8","gbk",substr($all,$a5,$a5));
            $F = iconv("utf-8","gbk",substr($all,$a6,$a6));
            $s2.= $k."\t".$dataArr[$i-1][0]."\t".$A."\t".$B."\t".$C."\t".$D."\t".$E."\t".$F."\t\t\t".$dataArr[$i-1][1]."\t\t\t\t\t\n";
        }
    if($fp){
        fwrite($fp,$s1.$s2);
    }
}