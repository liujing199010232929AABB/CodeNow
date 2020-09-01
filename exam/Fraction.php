<?php
require_once 'top.php';

//输出上岗考核内容
$Examination = $adminDB->executeSQL("select id,title, dates from tb_examination", $connID);
$smarty->assign('Examination', $Examination);		//输出上岗考核内

//输出上岗考核分数
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$Fraction = $pageDB->pageData("select id, name, pro_class, fraction, examination_id, sub_time from tb_examination_user where examination_id='".$_GET['fra_id']."' order by fraction desc", $connID, 20, $page, 10);
$smarty->assign('Fraction', $Fraction);


//指定模板页
$smarty->display('Fraction.phtml');
require_once 'bottom.php';
