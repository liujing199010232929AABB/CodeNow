<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

//

//
if (isset($_POST['content']) && $_POST['content'] != '') {
    if (! $adminDB->executeSQL("insert into tb_bulletin(title, content, addtime, pro_class) values('" . $_POST['title'] . "', '" . $_POST['content'] . "', '" . date("Y-m-d H:i:s") . "','" . 2 . "')", $connID)) {
        echo "<script>alert('公告信息添加失败！');</script>";
    } else {
        echo "<script>alert('公告信息添加成功！');</script>";
    }
}
//
$smarty->display('aaddbccdbuding.phtml');