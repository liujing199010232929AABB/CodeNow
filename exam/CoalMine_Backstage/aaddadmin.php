<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';
//
//
//输出员工下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id, name from tb_user order by dates desc", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['name'];
}
$smarty->assign('arrayBccdnames', $arrayBccdnames);

//
if(isset($_POST['submit']) && $_POST['submit']=="提交"){
	if ($adminDB->executeSQL("update tb_user set permissions='".$_POST['permissions']."', freeze='".$_POST['freeze']."', dates='".date("Y-m-d H:i:s")."' where  id='".$_POST['name']."'", $connID)) {
		echo '<script>alert("管理员添加成功！")</script>';
	} else {
  		echo '<script>alert("管理员添加失败！")</script>';
	}
}
//
$smarty->display('aaddadmin.phtml');