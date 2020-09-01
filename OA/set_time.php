<?php
    include("system/system.inc.php");       //包含类的实例化文件
    $sqlstr = "select * from tb_setup";     //查找tb_setup表
    $rec=$admindb->ExecSQL($sqlstr,$conn);  //执行查询语句
    $smarty->assign("rec",$rec);            //将查询结果赋给模板变量
    $smarty->display("kqgl/set_time.html"); //指定模板页
?>
