<?php
include "../inc/check.php";
include "../conn/conn.php";
include "../inc/func.php";
//获取用户帐号
$fields = read_field($conn,"tb_users","u_name",$_GET['id']);
/*删除用户*/
$sqlstr = "delete from tb_users where id = ".$_GET['id'];
$result = sqlsrv_query($conn,$sqlstr);
/*******************************/
/*删除group组中相对应的用户*/
$l_sqlstr = "select * from tb_group";
$l_result = sqlsrv_query($conn,$l_sqlstr);
while($l_rows = sqlsrv_fetch_array($l_result,SQLSRV_FETCH_NUMERIC)){
	/* 生成用户组列表 */
	$l_list = split(",",$l_rows[2]);
	$new_fields = "";
	for($num = 0; $num < (count($l_list) -1); $num++){
		if($fields != $l_list[$num]){
			$new_fields .= $l_list[$num].",";
		}
	}
	$n_sqlstr = "update tb_group set u_member = '".$new_fields."' where id = ".$l_rows[0];
	sqlsrv_query($conn,$n_sqlstr);
}
/******************************/
if($result)
	echo "<script>alert('删除成功！');location='show_staf.php';</script>";
else
	echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
?>