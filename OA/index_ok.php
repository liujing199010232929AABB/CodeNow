<?php
session_start();

include("system/system.inc.php");
/** 根据用户名密码，查找users表 **/
$sqlstr = "select id,u_name,u_depart,is_on from tb_users where u_user = '".$_POST['username']."' and u_pwd = '".$_POST['pwd']."'";
$record=$admindb->ExecSQL($sqlstr,$conn);

if($record[0]['is_on'] == 1){
	/** 检测用户组是否正确 **/
	$sqlstrs = "select u_member from tb_group where id = ".$_POST['u_group'];
	$records=$admindb->ExecSQL($sqlstrs,$conn);
	$num = split(",",$records[0]['u_member']);
	$bool = false;
	for($i = 0;$i < count($num);$i++){
		if($record[0]['u_name'] == $num[$i])
			$bool = true;	
	}
    /** 记录用户登录信息 **/
	if($bool){
		$_SESSION["id"]     = $record[0]['id'];		//id存入session
		$_SESSION["u_name"] = $_POST['username'];	//用户名存入session
		$sqlstr1 = "select d_name from tb_depart where id = ".$record[0]['u_depart'];
		$record1 =$admindb->ExecSQL($sqlstr1,$conn);
		$_SESSION["u_depart"] = $record1[0]['d_name'];
		$sqlstr2 = "select u_group from tb_group where id = ".$_POST['u_group'];
		$record2 = $admindb->ExecSQL($sqlstr2,$conn);
		$_SESSION["u_group"] = $record2[0]['u_group'];
		$filename = "./admin/log.txt";
		$f_open   = fopen($filename,"a+");  //打开文件
		$str      = $_SESSION['u_name'].",".date("Y-m-d H:i:s").",".$_SERVER['REMOTE_ADDR'].",".$_POST['action']."\n";
		fwrite($f_open,$str);   //写入文件
		fclose($f_open);        //关闭文件
		echo "<script>alert('欢迎光临');location='pub_main.php';</script>";
	}else{
		echo "<script>alert('用户名或密码错误');history.go(-1);</script>";  //登录失败，返回上一页
	}
}else{
	echo "<script>alert('该用户已被禁用');history.go(-1);</script>";   //登录失败，返回上一页
}
?>