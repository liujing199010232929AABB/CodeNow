<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//

$proclass = 0;
if (isset($_GET['delete']) && $_GET['delete'] == 't') {
    if ($adminDB->executeSQL("delete from tb_knowledge where id='" . $_GET['id'] . "'", $connID)) {
		@unlink("./upfiles/TrainingMaterials/".$_GET['imagename']);
        echo '<script>alert("培训内容删除成功！")</script>';
    } else {
        echo '<script>alert("培训内容删除失败！")</script>';
    }
}
if(isset($_POST['conn_id']) && $_POST['conn_id']!=""){			//判断POST方法中传递的数据是否为空
	foreach($_POST['conn_id'] as $key=>$value){  //以POST方法中的数组做循环，输出键和值
		$search=$adminDB->executeSQL("select attachment from tb_knowledge where id='" . $value . "'", $connID);
		if($search){
			if(@unlink("./upfiles/TrainingMaterials/".$search[0]['attachment'])){
   				$adminDB->executeSQL("delete from tb_knowledge where id='" . $value . "'", $connID);
			}
		}
    }
	echo '<script>alert("培训内容删除成功！")</script>';
}

//
//
if(isset($_POST['submit']) && $_POST['submit']=="提交"){
	$bcjyzid = $_POST['bcjyzid']; 
	if (isset($_FILES["zlfilename"]["name"][0]) && $_FILES["zlfilename"]["name"][0] != '') {
		$dir = "./upfiles/TrainingMaterials";
    	if (! is_dir($dir)) {
    		mkdir($dir);
    	}
    	$upfilename = $_FILES["zlfilename"]["name"];
    	$imagename = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strpos($upfilename, "."), strlen($upfilename) - strpos($upfilename, "."));
    	$address = $dir . "/" . $imagename;
    	@move_uploaded_file($_FILES["zlfilename"]["tmp_name"], $address);
		if ($adminDB->executeSQL("update tb_knowledge set titles='".$_POST['titles']."',title='".$_POST['title']."', attachment='".$imagename."', pro_class='".$_POST['pro_class']."', addtime='". date("Y-m-d")."' where  id='".$bcjyzid."'", $connID)) {
			echo '<script>alert("培训内容更改成功！")</script>';
    	} else {
    		echo '<script>alert("培训内容更改失败！")</script>';
            unset($_GET['edit']);
    	}
	}else{
		if ($adminDB->executeSQL("update tb_knowledge set titles='".$_POST['titles']."',title='".$_POST['title']."', pro_class='".$_POST['pro_class']."', addtime='". date("Y-m-d")."' where  id='".$bcjyzid."'", $connID)) {
			echo '<script>alert("培训内容更改成功！")</script>';
    	} else {
    		echo '<script>alert("培训内容更改失败！")</script>';
    	}
	}
    unset($_GET['edit']);
}
//
if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    $bcjyz = $adminDB->executeSQL("select * from tb_knowledge where id='" . $_GET['id'] . "'", $connID);
    $smarty->assign('bcjyz', $bcjyz);
    $smarty->assign('edit', 't');
    $proclass = $bcjyz[0]['pro_class'];
}
//
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
$bccdNames = $adminDB->executeSQL("select * from tb_knowledge_type  order by addtime", $connID);
foreach($bccdNames as $b){
    $ktypes[$b['id']] = $b['name'];
}
$smarty->assign('ktypes',$ktypes);
$bcjyzs = $pageDB->pageData("select * from tb_knowledge order by addtime desc", $connID, 20, $page, 5);
$smarty->assign('bcjyzs', $bcjyzs);
//
$smarty->display('aeditbccdinfo.phtml');
