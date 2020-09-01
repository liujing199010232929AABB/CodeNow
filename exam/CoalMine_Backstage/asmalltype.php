<?php
require_once 'lzh.inc.php';
$btypes = $adminDB->executeSQL("select id, typename from tb_types_work where parentid='0' order by addtime", $connID);
for ($i = 0; $i < count($btypes); $i ++) {
    $arrayBtypeOption[$btypes[$i]['id']] = $btypes[$i]['typename'];
}
$smarty->assign('arrayBtypeOption', $arrayBtypeOption);
if (isset($_POST['typename']) && $_POST['typename'] != '') {
    if (! $adminDB->executeSQL("select id, typename from tb_types_work where typename='" . trim($_POST['typename']) . "' and parentid='0' ", $connID)) {
        if (! $adminDB->executeSQL("insert into tb_types_work(typename, addtime, parentid) values('" . trim($_POST['typename']) . "','" . date('Y-m-d H:i:s') . "', '" . trim($_POST['bigtypeid']) . "')", $connID)) {
            echo "<script>alert('类别添加失败！');</script>";
        } else {
            echo "<script>alert('类别添加成功！');</script>";
        }
    } else {
        echo "<script>alert('该类别已经添加！');</script>";
    }
}
$smarty->display('asmalltype.phtml');