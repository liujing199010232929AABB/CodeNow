<?php
	include "../inc/check.php";
	include "../conn/conn.php";
	include "../inc/func.php";
	//判断输入部门名称是否重复
	if(isbool($_POST['d_name'])){
		echo "<script>alert('名称已存在，请重新输入!!');history.go(-1);</script>";
		exit();
	}
	//添加部门，确定上级部门和根部门
	if($_POST['u_id'] != "0"){	//有上级部门
			$top_depart = $_POST['u_id'];
	}else{
		$top_depart = 0;	    //无上级部门
	}
    $sqlstr = "insert into tb_depart(d_name,top_depart,up_depart,remark) values('".$_POST['d_name']."',".$top_depart.",".$_POST['u_id'].",'".$_POST['remark']."')";
    $result = sqlsrv_query($conn,$sqlstr);
    //调用输出函数
    re_message($result,"show_depart.php");

?>
