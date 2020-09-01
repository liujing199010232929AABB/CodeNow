<?php

include "inc/check.php";
include("system/system.inc.php");

$sqlstr = "select * from tb_depart where up_depart != 0 order by up_depart desc";
$result = $admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("res",$result);

$sqlstr1 = "select id,d_name from tb_depart where id != 0 ";
$result1 = $admindb->ExecSQL($sqlstr1,$conn);
$smarty->assign("res1",$result1);


if(isset($_GET['d_id'])){	
    $p_sql = "select id,u_name from tb_users where u_depart = '".$_GET['d_id']."'";
    $psql  = $admindb->ExecSQL($p_sql,$conn);
    $smarty->assign("psql",$psql);
}
$smarty->display("qyjx/t_performance.html");
?>
