<?php
session_start();
include("system/system.inc.php");
$big_list_sql = "select * from tb_big_list";
$big_lists    = $admindb->ExecSQL($big_list_sql,$conn);

$sql = "delete tb_list where id = 16";
foreach($big_lists as $vo){
    $list_sql    = "select * from tb_list where f_type_id = ".$vo['id'];
    $vo['child'] = $admindb->ExecSQL($list_sql,$conn);
    $left[]      = $vo;
}

$smarty->assign("left",$left);

$smarty->display("left.html");
?>
