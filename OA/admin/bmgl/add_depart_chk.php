<?php
	include "../inc/check.php";
	include "../conn/conn.php";
	include "../inc/func.php";
	//�ж����벿�������Ƿ��ظ�
	if(isbool($_POST['d_name'])){
		echo "<script>alert('�����Ѵ��ڣ�����������!!');history.go(-1);</script>";
		exit();
	}
	//��Ӳ��ţ�ȷ���ϼ����ź͸�����
	if($_POST['u_id'] != "0"){	//���ϼ�����
			$top_depart = $_POST['u_id'];
	}else{
		$top_depart = 0;	    //���ϼ�����
	}
    $sqlstr = "insert into tb_depart(d_name,top_depart,up_depart,remark) values('".$_POST['d_name']."',".$top_depart.",".$_POST['u_id'].",'".$_POST['remark']."')";
    $result = sqlsrv_query($conn,$sqlstr);
    //�����������
    re_message($result,"show_depart.php");

?>
