<?php
require_once 'login.inc.php';

if(isset($_POST['name']) && $_POST['name']!="" && isset($_POST['password']) && $_POST['password']!="" && isset($_POST['permissions']) && $_POST['permissions']!=""){			//完成对登录用户的判断
	$bccdNames = $adminDB->executeSQL("select id, name, password,admission,freeze,permissions,last_login_date from tb_user where password='".md5($_POST['password'])."' and name='".$_POST['name']."' and permissions='".$_POST['permissions']."'", $connID);
	if ($bccdNames){
        if($bccdNames[0]['freeze'] == 1){
            echo "<script>alert('您的帐户已冻结，请和管理员联系！'); window.location.href='index.php';</script>";
        }
		$_SESSION['user_id']=$bccdNames[0]['id'];		//定义登录用户ID
		$_SESSION['back_name']=$bccdNames[0]['name'];		//定义登录用户ID
		$_SESSION['admission']=$bccdNames[0]['admission'];		//定义登录用户准考证号
		$_SESSION['permissions']=$bccdNames[0]['permissions'];		//定义登录用户选择的权限
		$_SESSION['last_login_date']=$bccdNames[0]['last_login_date'];		//定义登录用户选择的权限
		echo "<script>alert('欢迎进入煤矿后台管理系统'); window.location.href='aindex.php';</script>";
		$bccdNames = $adminDB->executeSQL("update tb_user set last_login_date = '".date("Y-m-d H:i:s")."' where id ='".$bccdNames[0]['id']."'", $connID);
	} else {
		echo "<script>alert('登录失败，请检查您填写信息是否正确！'); window.location.href='index.php'</script>";
	}
}
$smarty->display('index.phtml');