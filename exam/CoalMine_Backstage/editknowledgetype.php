<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';


$sid = isset($_GET['id'])?$_GET['id']:0;
if (isset($_GET['f']) && $_GET['f'] == 'del') {

    $sql = "delete from tb_knowledge_type where id =".$sid;
    if($adminDB->executeSQL($sql,$connID)){
        echo "<script>alert('类别删除成功！');</script>";
    }else{
        echo "<script>alert('类别删除失败！');</script>";
    }
}
$isShow = 'F';
if ((isset($_GET['f']) && $_GET['f'] == 'edit') || (isset($_POST['f']) && $_POST['f'] == 'edit')) {
    if (isset($_POST['f']) && $_POST['f'] == 'edit') {
  		if (! $adminDB->executeSQL("select id, name from tb_knowledge_type where name='" . trim($_POST['name']) . "'", $connID)) {

        	if (! $adminDB->executeSQL("update tb_knowledge_type set name='" . $_POST['name'] . "', addtime='".date("Y-m-d")."' where id='" . $_POST['id'] . "'", $connID)) {
            	echo "<script>alert('类别更改失败！');</script>";
        	} else {
            	echo "<script>alert('类别更改成功！');</script>";
        	}
		}else{
			  echo "<script>alert('该类别已经添加！');</script>";
		}
        echo "<script>location=location;</script>";
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }
    $isShow = 'T';
    $bigtype = $adminDB->executeSQL("select id, name from tb_knowledge_type where id='" . $id . "'", $connID);
    $smarty->assign('bigtype', $bigtype);
}
$smarty->assign('isShow', $isShow);
//
$bigtypes = $adminDB->executeSQL("select id, name, addtime from tb_knowledge_type  order by addtime", $connID);

$smarty->assign('bigtypes', $bigtypes);
$smarty->display('editknowledgetype.phtml');
