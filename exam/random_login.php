<?php

require_once 'lzh.inc.php';
if(isset($_POST['name']) && $_POST['name']!="" && isset($_POST['password']) && $_POST['password']!=""){
$bccdNames = $adminDB->executeSQL("select id, name, password,picture from tb_user where password='".md5($_POST['password'])."' and name='".$_POST['name']."' ", $connID);
	if ($bccdNames){
		$typeNames = $adminDB->executeSQL("select id, typename from tb_types_work where id='".$bccdNames[0]['id']."'", $connID);
		$_SESSION['name']=$bccdNames[0]['name'];		//定义登录用户姓名

		echo "<script>window.open('Random_Answer.php','_blank');</script>";
	} else {
		echo "<script>alert('登录失败，请检查您填写的准考证号和密码是否正确！'); </script>";
	}
}
$smarty->display('random_login.phtml');