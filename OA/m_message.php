<?php
    include "inc/check.php";            //判断用户权限
    include("system/system.inc.php");   //包含类的实例化文件
    $sqlstr = "select * from tb_person where id=".$_GET['id'];
    $res=$admindb->ExecSQL($sqlstr,$conn);  //执行查询
    $smarty->assign("res",$res);//将查询结果赋给模板变量
    $smarty->display("rsxx/m_message.html");//指定模板页
?>