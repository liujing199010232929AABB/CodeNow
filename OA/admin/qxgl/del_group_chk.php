<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include "../inc/check.php";
include "../conn/conn.php";
include "../inc/func.php";
$fields = read_field($conn,"tb_group","u_group",$_GET['id']);
/**删除用户组**/
$sqlstr = "delete from tb_group where id = ".$_GET['id'];
$result = sqlsrv_query($conn,$sqlstr);

/**删除list功能列表中相对应的组**/
$l_sqlstr = "select * from tb_list";
$l_result = sqlsrv_query($conn,$l_sqlstr);
while($l_rows = sqlsrv_fetch_array($l_result,SQLSRV_FETCH_NUMERIC)){
	if($l_rows[4] != "0"){
		/* 生成用户组列表 */
		$l_list = split(",",$l_rows[4]);
		$new_fields = "";
		for($num = 0; $num < (count($l_list) -1); $num++){
			if($fields != $l_list[$num]){
				$new_fields .= $l_list[$num].",";
			}
		}
		$n_sqlstr = "update tb_list set o_group = '".$new_fields."' where id = ".$l_rows[0];
		sqlsrv_query($conn,$n_sqlstr);
	}
}

if($result)
	echo "<script>alert('删除成功！');location='user_group.php';</script>";
else
	echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
?>
