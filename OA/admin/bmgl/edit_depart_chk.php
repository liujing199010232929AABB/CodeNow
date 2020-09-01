<?php
include "../inc/check.php";	//包含权限检查文件
include "../conn/conn.php";	//包含数据库链接文件
include "../inc/func.php";	//包含自定义函数文件
//修改部门，确定上级部门和根部门
if($_POST['u_id'] != 0){
	//从top_depart表筛选top_depart字段
	$sqlstr = "select top_depart from tb_depart where id = ".$_POST['u_id'];
	$result = sqlsrv_query($conn,$sqlstr);						//连接数据库
	$rows   = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);	//执行查询
	/*如果存在上级部门，就取得上级部门的根部门*/
	if ($rows['top_depart'] != 0)
		$top_depart = $rows['top_depart'];
	/*如果不存在，将上级部门作为根部门*/
	else
		$top_depart = $_POST['u_id'];
}else
	/* 如果没有上级部门，那么就将自身定为根部门*/
	$top_depart = 0;
	/*创建、执行修改部门的SQL语句*/
	$sqlstr = "update tb_depart set d_name = '".$_POST['d_name']."',top_depart = ".$top_depart.", up_depart = ".$_POST['u_id'].", remark = '".$_POST['remark']."' where id = ".$_POST['id'];
	$result = sqlsrv_query($conn,$sqlstr);
	re_message($result,"show_depart.php");
?>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
