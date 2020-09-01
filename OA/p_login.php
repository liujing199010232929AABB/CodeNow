<?php
session_start();

include("system/system.inc.php");
$smarty->assign("uc",$_GET['r_id']);
$smarty->display("kqgl/p_login.html");
?>