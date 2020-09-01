<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//
if (isset($_GET['delete']) && $_GET['delete'] == 't') {
    	if ($adminDB->executeSQL("delete from tb_user where id='" . $_GET['id'] . "'", $connID)) {
            @unlink($_GET['imagename']);
        	echo '<script>alert("员工信息内容删除成功！")</script>';
    	} else {
        	echo '<script>alert("员工信息内容删除失败！")</script>';
    	}
}
//
//输出工种到下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['typename'];
}
$smarty->assign('arrayBccdnames1', $bccdNames);
$smarty->assign('arrayBccdnames', $arrayBccdnames);
$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);
//

//
if (isset($_POST['servername']) && $_POST['servername'] != '') {
	if($_SESSION['permissions']==2 or $_SESSION['permissions']==3){
   		$bcjyzid = $_POST['bcjyzid']; 
    	if(isset($_FILES["picture"]["name"]) && $_FILES["picture"]["name"]!=""){
        	$dir = "upfiles/userface";
        	if (! is_dir($dir)) {
            	mkdir($dir);
        	}
        	$upfilename = $_FILES["picture"]["name"];
        	$imagename = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strpos($upfilename, "."), strlen($upfilename) - strpos($upfilename, "."));
        	$address = $dir . "/" . $upfilename;
        	@move_uploaded_file($_FILES["picture"]["tmp_name"], $address);
            if ($adminDB->executeSQL("update tb_user set name='".$_POST['servername']."', ID_number='".$_POST['ID_number']."', picture='".$address."', password='".md5($_POST['password'])."', typework='".$_POST['pro_class']."',unit='".$_POST['units']."',permissions='".$_POST['permissions']."', address='".$_POST['address']."', tel='". $_POST['tel']."', freeze='".$_POST['freeze']."', dates='".date("Y-m-d")."' where  id='".$bcjyzid."'", $connID)) {
        		echo '<script>alert("员工信息更改成功！")</script>';
    		} else {
        		echo '<script>alert("员工信息更改失败！")</script>';
    		}
   		}else{
    		if ($adminDB->executeSQL("update tb_user set name='".$_POST['servername']."',ID_number='".$_POST['ID_number']."', password='".md5($_POST['password'])."', typework='".$_POST['pro_class']."',unit='".$_POST['units']."',permissions='".$_POST['permissions']."', address='".$_POST['address']."', tel='". $_POST['tel']."', freeze='".$_POST['freeze']."', dates='".date("Y-m-d")."' where  id='".$bcjyzid."'", $connID)) {
				$page=isset($_GET['page'])?$_GET['page']:1;
				echo "<script>alert('员工信息更改成功！');window.location.href='aeditbccdserver.php?page=".$page."&big_type=".$_GET['big_type']."&small_type=".$_GET['small_type']."';</script>";	
    		} else {
        		echo '<script>alert("员工信息更改失败！")</script>';
    		}
		}
	}else{
		echo "<script>alert('您不是管理员，不具备更改员工信息功能！！');window.location.href='aeditbccdserver.php?page=".$_GET['page']."&big_type=".$_GET['big_type']."&small_type=".$_GET['small_type']."';</script>";
	}
}
//
if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    $bcjyz = $adminDB->executeSQL("select * from tb_user where id='" . $_GET['id'] . "'", $connID);
    $smarty->assign('bcjyz', $bcjyz);
    $smarty->assign('edit', 't');
}
//
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$bcjyzs = $pageDB->pageData("select * from tb_user order by dates desc", $connID, 20, $page, 10);
$smarty->assign('bcjyzs', $bcjyzs);
//
$smarty->display('aeditbccdserver.phtml');