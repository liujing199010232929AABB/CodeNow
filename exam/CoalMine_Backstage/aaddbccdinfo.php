<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';
//
//
$bccdNames = $adminDB->executeSQL("select * from tb_knowledge_type  order by addtime", $connID);
foreach($bccdNames as $b){
    $ktypes[$b['id']] = $b['name'];
}
$smarty->assign("ktypes",$ktypes);

if (isset($_FILES["zlfilename"]["name"][0]) && $_FILES["zlfilename"]["name"][0] != '') {
	$dir = "./upfiles/Trainingmaterials";
    if (! is_dir($dir)) {
    	mkdir($dir);
    }
    $upfilename = $_FILES["zlfilename"]["name"];
    $imagename = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strpos($upfilename, "."), strlen($upfilename) - strpos($upfilename, "."));
    $address = $dir . "/" . $imagename;
    @move_uploaded_file($_FILES["zlfilename"]["tmp_name"], $address);
    if (! $adminDB->executeSQL("insert into tb_knowledge(titles,title, attachment, pro_class, addtime) values('".$_POST['titles']."','". $_POST['title'] . "', '" . $imagename . "','" . $_POST['pro_class'] . "', '" . date("Y-m-d") . "')", $connID)) {
        echo "<script>alert('培训内容添加失败！');</script>";
    } else {
        echo "<script>alert('培训内容添加成功！');</script>";
    }
}
//
$smarty->display('aaddbccdinfo.phtml');
