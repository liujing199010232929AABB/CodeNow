<?php
require_once 'lzh.inc.php';

$ansArr = array();
$str = "";
foreach($_POST['i'] as $ansstate){
    $typeArr = explode('@',$ansstate);
    $protype = $typeArr[0];
    $proid= $typeArr[1];
    $i = $typeArr[2];
    $flag = false;
    if($protype == 'checkbox' || $protype == 'fill'){
        if(isset($_POST[$protype.$proid]) && count($_POST[$protype.$proid])>0){
            foreach($_POST[$protype.$proid] as $pro){
                if($pro != ''){
                    $flag = true;
                }
            }
        }
        if($flag){
            $str.=$i.". <a href='#".$i."'>已答</a>&nbsp;";
        }else{
            $str.=$i .". <a href='#".$i."'>____</a>&nbsp;";
        }
    }else{
        if(isset($_POST[$protype.$proid]) && $_POST[$protype.$proid] != ''){
            $str.=$i.". <a href='#".$i."'>已答</a>&nbsp;";
        }else{
            $str.=$i .". <a href='#".$i."'>____</a>&nbsp;";
        }
    }
}
echo $str;