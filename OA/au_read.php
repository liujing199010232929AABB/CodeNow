<?php
include("system/system.inc.php");
$a_sql = "select * from tb_iss order by i_state desc";
$rec=$admindb->ExecSQL($a_sql,$conn);
$smarty->assign("rec",$rec);
$smarty->display("shps/au_read.html");
?>