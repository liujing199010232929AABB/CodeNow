<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

//
if (isset($_GET['delete']) && $_GET['delete'] == 't') {
    if ($adminDB->executeSQL("delete from tb_bulletin where id='" . $_GET['id'] . "'", $connID)) {
        echo '<script>alert("公告内容删除成功！")</script>';
    } else {
        echo '<script>alert("公告内容删除失败！")</script>';
    }
}

//
if (isset($_POST['content']) && $_POST['content'] != '') {
    if ($adminDB->executeSQL("update tb_bulletin set  title='".$_POST['title']."', content='".$_POST['content']."',addtime='".date("Y-m-d H:i:s")."' where id='".$_POST['bcjyzid']."'", $connID)) {
        echo '<script>alert("公告更改成功！")</script>';
    } else {
        echo '<script>alert("公告更改失败！")</script>';
    }
}
//
if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    $bcjyz = $adminDB->executeSQL("select * from tb_bulletin where id='" . $_GET['id'] . "'", $connID);
    $smarty->assign('bcjyz', $bcjyz);
    $smarty->assign('edit', 't');
}
//
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$bcjyzs = $pageDB->pageData("select * from tb_bulletin order by addtime desc", $connID, 20, $page, 5);
$smarty->assign('bcjyzs', $bcjyzs);
//
$smarty->display('aeditbccdbuding.phtml');