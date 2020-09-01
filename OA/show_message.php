<?php

include("system/system.inc.php");
$sqlstr = "select * from tb_person where id=".$_GET['id'];
$res=$admindb->ExecSQL($sqlstr,$conn);
$smarty->assign("res",$res);
$smarty->display("rsxx/show_message.html");
?>
