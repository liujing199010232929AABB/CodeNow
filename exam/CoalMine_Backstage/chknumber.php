<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
//
$tb_exam_type = $adminDB->executeSQL("select * from tb_exam_type  order by id", $connID);
$t = new Tools();
$examtypeArr = $t->getExamtypeArr();
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
$message = "";
if(isset($_POST['flag']) && $_POST['flag'] == 1){
    $checkedquestionsArr = explode('@',$_POST['checkedquestions']);
    foreach($tb_exam_type as $et){
        ${'a'.$et['english']} = array();
        if(count($checkedquestionsArr)){
            foreach($checkedquestionsArr as $c){
                if(strpos($c,$et['english']) !== false){
                    $cr = explode('[]',$c);
                    $id = $cr[1];
                    ${'a'.$et['english']}[] = $id;
                }
            }
        }
        if(isset($_POST[$et['english']]) && $_POST[$et['english']] != ""){	//判断是否提交单选题数据
            $count = count(array_unique(array_merge($_POST[$et['english']],${'a'.$et['english']})));
        }elseif(count(${'a'.$et['english']})){
            $count = count(${'a'.$et['english']});
        }else{
            $count = 0;
        }
        if($count != $typedisArr[$et['english']]){
            $message.=$examtypeArr[$et['english']]."题数量错误，应为".$typedisArr[$et['english']]."道，您选择了".$count."道\n";
        }
    }
echo $message;
}
if( $_POST['flag'] == 0){
    $typeArr = array("radio"=>"单选","checkbox"=>"多选","fill"=>"填空","judgment"=>"判断");
    foreach($typeArr as $k=>$v){
        $sql = "select count(*) as ".$k."num"." from tb_exam_problem where pro_type='$k' and isactive=1 and pro_class=".$_POST['pro_class'];
        $tmp = $adminDB->executeSQL($sql, $connID);
        ${$k."num"} = $tmp[0][0];
        if(${$k."num"} < $typedisArr[$k]){
            $message.=$v."题数量小于模板中该题型的数量，请重新选择模板\n";
        }
    }
    echo $message;
}