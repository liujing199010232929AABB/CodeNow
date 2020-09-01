<?php
    include "inc/check.php";                                //包含权限文件
    include("system/system.inc.php");                       //包含类的实例化文件
    $sqlstr = "select id,p_time,p_title from tb_person";    //定义SQL语句
    $res    = $admindb->ExecSQL($sqlstr,$conn);             //执行SQL语句
    $smarty->assign("res",$res);                            //将查询结果赋给模板变量
    $smarty->display("rsxx/p_manage.html");                 //指定模板页
?>