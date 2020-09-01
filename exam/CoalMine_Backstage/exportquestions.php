<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

$t = new Tools();
    $numArr = array(
        1=>"一",
        2=>"二",
        3=>"三",
        4=>"四",
        5=>"五",
        6=>"六",
        7=>"七",
        8=>"八",
        9=>"九",
        10=>"十",
        11=>"十一",
        12=>"十二",
        13=>"十三",
        14=>"十四",
        15=>"十五",
    );
    $examtypeAllArr = $t->getExamtypeArr();
    $emtype = $t->getExamtypeIdArr();
    $worktype = $t->getworktypeIdArr();
    if ($questions = $adminDB->executeSQL("select * from tb_exam_problem order by pro_type", $connID)) {
        header("Content-Type:application/doc");
        header("Content-Disposition:attachment;filename=questions.doc");
        header("Pragma:no-cache");
        header("Expires:0");
        $output = "<table border='0' width='90%' align='center'>";
        $output .= "<tr><th align='center'>考试题库</th></tr>";
        for($k=0;$k<count($emtype);$k++){
            $n = 1;
            $output.= "<tr><td>".$numArr[$k+1]."、".$emtype[$k]['chinese']."题</td></tr>";
            for($m=0;$m<count($worktype);$m++){
                $fractionFlag = 0;
                foreach($questions as $question){
                    if($question['pro_type'] == $emtype[$k]['english'] && $question['pro_class'] == $worktype[$m]['id']){
                        $content = $question['content'];
                        $answer = $question['answer'];
                        $franction = $question['fraction'];
                        $protype = $question['pro_type'];
                        $chinese = $examtypeAllArr[$protype];
                        if($fractionFlag == 0){
                            $output.= "<tr><td>".$worktype[$m]['typename']."    每题".$franction."分</td></tr>";
                            $fractionFlag = 1;
                        }
                        $output .= "<tr><td>".$n."、".$content."<br/>答案：".$answer."</td></tr><tr></tr>";
                        $n++;
                    }
                }
            }
        }
        $output.="</table>";
        echo $output;
        exit;
    }else{
        echo "<script>alert('没有试题！');</script>";
    }
