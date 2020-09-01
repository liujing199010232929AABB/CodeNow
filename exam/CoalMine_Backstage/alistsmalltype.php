<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

if (isset($_GET['f']) && $_GET['f'] == 'del') {
    if (! $adminDB->executeSQL("delete from tb_types_work where id='" . $_GET['id'] . "'", $connID)) {
        echo "<script>alert('类别删除失败！');</script>";
    }
}
$isShow = 'F';
if ((isset($_GET['f']) && $_GET['f'] == 'edit') || (isset($_POST['f']) && $_POST['f'] == 'edit')) {
    $btypes = $adminDB->executeSQL("select id, typename from tb_types_work where parentid='0' order by addtime", $connID);
    for ($i = 0; $i < count($btypes); $i ++) {
        $arrayBtypeOption[$btypes[$i]['id']] = $btypes[$i]['typename'];
    }
    $smarty->assign('arrayBtypeOption', $arrayBtypeOption);
    //
    if (isset($_POST['f']) && $_POST['f'] == 'edit') {
		
		if (! $adminDB->executeSQL("select id, typename from tb_types_work where typename='" . trim($_POST['typename']) . "' ", $connID)) {
			
        if (! $adminDB->executeSQL("update tb_types_work set typename='" . $_POST['typename'] . "', parentid='" . $_POST['bigtypeid'] . "',addtime='".date("Y-m-d")."'  where id='" . $_POST['id'] . "'", $connID)) {
            echo "<script>alert('类别更改失败！');</script>";
        } else {
            echo "<script>alert('类别更改成功！');</script>";
        }
		}else{
			  echo "<script>alert('该类别已经添加！');</script>";
		}
		
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }
    $isShow = 'T';
    $smalltype = $adminDB->executeSQL("select id, typename, parentid from tb_types_work where id='" . $id . "'", $connID);
    $smarty->assign('smalltype', $smalltype);
}
$smarty->assign('isShow', $isShow);
//

$bigtypes = $adminDB->executeSQL("select id, typename from tb_types_work where parentid='0' order by addtime", $connID);
$smarty->assign('bigtypes', $bigtypes);

$smalltypes = $adminDB->executeSQL("select * from tb_types_work order by addtime ", $connID);
$smarty->assign('smalltypes', $smalltypes);
$smarty->display('alistsmalltype.phtml');


