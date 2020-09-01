<?php
include("inc/check.php");
include("system/system.inc.php");
if(isset($_GET['u_id'])){
    $smarty->assign("u_id",$_GET['u_id']);
    $sqlstr1 = "select f_name from tb_list where id = ".$_GET['u_id'];
    $record1=$admindb->ExecSQL($sqlstr1,$conn);
    $smarty->assign("f_name",$record1[0]['f_name']);

    $user_sql = "select id,u_name,u_sex,u_depart from tb_users";
    $user=$admindb->ExecSQL($user_sql,$conn);
    $smarty->assign("usr",$user);

    $sqldep = "select id,d_name from tb_depart";
    $dep=$admindb->ExecSQL($sqldep,$conn);
    $smarty->assign("dep",$dep);

    $t_sql = "select * from tb_users where u_user = '".$_SESSION['u_name']."'";
    $t_user=$admindb->ExecSQL($t_sql,$conn);
    $smarty->assign("t_user",$t_user);
    $smarty->display("zytd/personnel_air.html");
}else{
	echo "<script>alert('连接非法，请重新登录！！');location='index.php';</script>";
}
?>
