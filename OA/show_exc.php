<?php

include "inc/check.php";
include("system/system.inc.php");
$sqlstr = "select s_id from tb_superson where id = ".$_GET['id'];
$result=$admindb->ExecSQL($sqlstr,$conn);
$num = split(",",$result[0]['s_id']);
?>
