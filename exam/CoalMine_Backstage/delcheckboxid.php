<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';
$tb_exam_type = $adminDB->executeSQL("select * from tb_exam_type", $connID);
$id = $_POST['chid'];
if($id){
    foreach($tb_exam_type as $etype){
        if(count($_SESSION[$etype['english']])){
            foreach($_SESSION[$etype['english']] as $k=>$t){
                if($id == $t){
                    unset($_SESSION[$etype['english']][$k]);
                }
            }
        }
    }
}