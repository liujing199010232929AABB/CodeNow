<?php

include("inc/check.php");           //包含权限文件
include("system/system.inc.php");   //包含类的实例化文件

$sqlstr1 = "select f_name from tb_list where id = ".$_GET['u_id'];  //从tb_list表筛选f_name
$record1=$admindb->ExecSQL($sqlstr1,$conn);         //执行查询语句
$smarty->assign("f_name",$record1[0]['f_name']);    //分配变量
$smarty->assign("u_id",$_GET['u_id']);              //分配变量
//从tb_register表中筛选数据
$sqlstr = "select id,r_date,r_time,r_type,r_state,r_remark from tb_register where r_id = ".$_GET['u_id']." and p_id = ".$_SESSION['id']." order by id desc";
$rec=$admindb->ExecSQL($sqlstr,$conn);  //执行查询语句
$smarty->assign("rec",$rec);            //分配变量
$smarty->display("kqgl/work_note.html");//显示模板
?>