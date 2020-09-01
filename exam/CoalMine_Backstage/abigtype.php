<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';
$bccdNames = $adminDB->executeSQL("select * from tb_types_work", $connID);
$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);
//$smarty->assign('arrayBccdnames', $category);
if (isset($_POST['typename']) && $_POST['typename'] != '') {
    if (! $adminDB->executeSQL("select id, typename from tb_types_work where typename='" . trim($_POST['typename']) . "'", $connID)) {
        if (! $adminDB->executeSQL("insert into tb_types_work(typename, addtime, pid) values('" . trim($_POST['typename']) . "', '" . date('Y-m-d') . "',".$_POST['pro_class'].")", $connID)) {
            echo "<script>alert('类别添加失败！');</script>";
        } else {
            echo "<script>alert('类别添加成功！');</script>";
        }
    } else {
        echo "<script>alert('该类别已经添加！');</script>";
    }
    echo "<script>location=location</script>";
}
$smarty->display('abigtype.phtml');