<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

//
//输出工种到下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id, typename from tb_types_work  order by addtime desc", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['typename'];
}
$smarty->assign('arrayBccdnames1', $bccdNames);
$smarty->assign('arrayBccdnames', $arrayBccdnames);

//
if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    $bcjyz = $adminDB->executeSQL("select * from tb_user where id='" . $_GET['id'] . "'", $connID);
    $smarty->assign('bcjyz', $bcjyz);
    $smarty->assign('edit', 't');
}

if(isset($_POST['submit']) && $_POST['submit']=="提交"){
	if ($adminDB->executeSQL("update tb_user set permissions='".$_POST['permissions']."', freeze='".$_POST['freeze']."', dates='".date("Y-m-d H:i:s")."' where  id='".$_POST['bcjyzid']."'", $connID)) {
		echo '<script>alert("权限更改成功！")</script>';
	} else {
  		echo '<script>alert("管理员添加失败！")</script>';
	}
}

//
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$bcjyzs = $pageDB->pageData("select * from tb_user where permissions!=0 order by permissions desc", $connID, 20, $page, 10);
$smarty->assign('bcjyzs', $bcjyzs);
//
$smarty->display('aeditadmin.phtml');