<?php

include("inc/check.php");
include("system/system.inc.php");

$sqlstr1 = "select f_name from tb_list where id = ".$_GET['u_id'];
$record1 = $admindb->ExecSQL($sqlstr1,$conn);
$smarty->assign("f_name",$record1[0]['f_name']);

$l_sql = "select id,l_title,l_content,l_time,is_replay,r_back from tb_lyb order by id desc";
$rec   = $admindb->ExecSQL($l_sql,$conn);
$smarty->assign("rec",$rec);

$smarty->assign("str","人事部");

$smarty->display("zytd/lyb.html");
?>
