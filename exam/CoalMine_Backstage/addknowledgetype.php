<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';


if (isset($_POST['name']) && $_POST['name'] != '') {
    if (! $adminDB->executeSQL("select id, name from tb_knowledge_type where name='" . trim($_POST['name']) . "'", $connID)) {
        if (! $adminDB->executeSQL("insert into tb_knowledge_type(name, addtime) values('" . trim($_POST['name']) . "', '" . date('Y-m-d') ."')", $connID)) {
            echo "<script>alert('培训类别添加失败！');</script>";
        } else {
            echo "<script>alert('培训类别添加成功！');</script>";
        }
    } else {
        echo "<script>alert('该类别已经添加！');</script>";
    }
    echo "<script>location=location</script>";
}
$smarty->display('addknowledgetype.phtml');