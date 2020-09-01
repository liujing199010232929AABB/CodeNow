<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//
//输出工种到下拉列表
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);

$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);
//
if (isset($_POST['servername']) && $_POST['servername'] != '') {
    $dir = "upfiles/userface";
    if (! is_dir($dir)) {
        mkdir($dir);
    }
    $upfilename = $_FILES["picture"]["name"];
    if(isset($_FILES["picture"]["name"]) && $_FILES["picture"]["name"]!=""){	
		$face = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strpos($upfilename, "."), strlen($upfilename) - strpos($upfilename, "."));
    	$pic_address = $dir . "/" . $upfilename;
    	@move_uploaded_file($_FILES["picture"]["tmp_name"], $pic_address);
    	$pic_path = $pic_address;
    } else {
        $pic_path = "";
    }
	$admission=date("YmdHis") . mt_rand(1000, 9999);
	if (! $adminDB->executeSQL("insert into tb_user(name,ID_number, picture, password, typework, post, simulation, assessment, unit, permissions, address,tel ,freeze,dates,admission) values('" . $_POST['servername'] . "', '".$_POST['ID_number']."', '" . $pic_path . "', '".md5("000000")."', '" . $_POST['pro_class'] . "', '" . $_POST['post'] . "', 'null', 'null', '".$_POST['units']."', '0', '" . $_POST['address'] . "', '" . $_POST['tel'] . "','0','".date("Y-m-d")."','$admission')", $connID)) {
    	echo "<script>alert('员工信息添加失败！');</script>";
    } else {
        echo "<script>alert('员工信息添加成功！');</script>";
    }
}
//
$smarty->display('aaddbccdserver.phtml');