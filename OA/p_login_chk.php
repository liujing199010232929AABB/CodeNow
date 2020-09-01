<?php
include("inc/check.php");
include("system/system.inc.php");

/**根据u_type判断上、下、加班，0：正点 1：迟到
 * 取出正点上班时间
 **/
if(isset($_POST['r_id'])){
	if($_POST['r_id'] == "23" or $_POST['r_id'] == "25" ){
		if($_POST['u_type'] == 0)                               //下班签退
			$t_sql = "select * from tb_setup where id = 2";
		else if($_POST['u_type'] == 1)                          //上班签到
			$t_sql = "select * from tb_setup where id = 1";
		else if($_POST['u_type'] == 2)                          //加班签到
			$t_sql = "select * from tb_setup where id = 3";
		else if($_POST['u_type'] == 3)                          //加班签退
			$t_sql = "select * from tb_setup where id = 4";	
		$rec    = $admindb->ExecSQL($t_sql,$conn);
		$s_time = $rec[0]['l_time'];
		$now_time = date("h:i:s");
        if(strtotime($now_time) - strtotime($s_time) > 0){  //当前时间登记大于设定时间，晚点
            $state = 1;
        }else{
            $state = 0;                                     //当前时间登记小于设定时间，晚点
        }
		$l_sql = "insert into tb_register (r_date,r_time,r_type,r_state,r_remark,r_id,p_id) values('".date("Y-m-d")."','".date("H:i:s")."',".$_POST['u_type'].",".$state.",'".$_POST['r_remark']."',".$_POST['r_id'].",".$_SESSION['id'].")";
	}else if($_POST['r_id'] == "24"){
		$l_sql = "insert into tb_register (r_date,r_time,r_type,r_state,r_remark,r_id,p_id) values('".date("Y-m-d")."','".date("H:i:s")."','".$_POST['u_type']."','3','".$_POST['r_remark']."',".$_POST['r_id'].",".$_SESSION['id'].")";
	}else{
		echo "<script>alert('错误');history.go(-1);</script>";
	}
	$l_rst = $admindb->ExecSQL($l_sql,$conn);
	if($l_rst){
		echo "<script>alert('登记完成');window.close();</script>";
	}else{
		echo "<script>alert('错误');history.go(-1);</script>";
	}
}
?>