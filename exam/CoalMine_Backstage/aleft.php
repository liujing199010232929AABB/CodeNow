<?php
require_once 'lzh.inc.php';
$mockexaminations = $adminDB->executeSQL("select id, title from tb_mockexaminations order by id desc", $connID);
$smarty->assign('mockexaminations', $mockexaminations);

$examination = $adminDB->executeSQL("select id, title from tb_examination  order by id desc", $connID);
$smarty->assign('examination', $examination);

$smarty->display('aleft.phtml');