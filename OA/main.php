<?php
session_start();
include("system/system.inc.php");

$sqlper = "select * from tb_person where u_id = 18";
$per=$admindb->ExecSQL($sqlper,$conn);
$smarty->assign("per",$per);

$sqlpers = "select * from tb_person where u_id = 19 ";
$pers=$admindb->ExecSQL($sqlpers,$conn);
$smarty->assign("pers",$pers);

$p_sql = "select * from tb_plan where p_id = '".$_SESSION['id']."' order by id desc ";
$psql=$admindb->ExecSQL($p_sql,$conn);
$smarty->assign("psql",$psql);


$sqllist = "select * from tb_list order by id desc ";
$list=$admindb->ExecSQL($sqllist,$conn);
$smarty->assign("list",$list);

$a_sql = "select * from tb_iss where p_id = ".$_SESSION['id'];
$asql=$admindb->ExecSQL($a_sql,$conn);
$smarty->assign("asql",$asql);

$smarty->display("main.html");
?>
