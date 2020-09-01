<?php
$adminDB->executeSQL("delete from tb_onlineuser where second + 30 < '" . time() . "'", $connID);
if (isset($_SESSION['admission']) && $_SESSION['admission']!="") {
    if (! $adminDB->executeSQL("select id, netname from tb_onlineuser where netname='".$_SESSION['admission']."'", $connID)) {
        $adminDB->executeSQL("insert into tb_onlineuser(netname, second) values('".$_SESSION['admission']."', '" . time() . "')", $connID);
    } else {
        $adminDB->executeSQL("update tb_onlineuser set second='" . time() . "' where netname='".$_SESSION['admission']."'", $connID);
    }
}