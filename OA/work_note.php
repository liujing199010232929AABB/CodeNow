<?php

include("inc/check.php");           //����Ȩ���ļ�
include("system/system.inc.php");   //�������ʵ�����ļ�

$sqlstr1 = "select f_name from tb_list where id = ".$_GET['u_id'];  //��tb_list��ɸѡf_name
$record1=$admindb->ExecSQL($sqlstr1,$conn);         //ִ�в�ѯ���
$smarty->assign("f_name",$record1[0]['f_name']);    //�������
$smarty->assign("u_id",$_GET['u_id']);              //�������
//��tb_register����ɸѡ����
$sqlstr = "select id,r_date,r_time,r_type,r_state,r_remark from tb_register where r_id = ".$_GET['u_id']." and p_id = ".$_SESSION['id']." order by id desc";
$rec=$admindb->ExecSQL($sqlstr,$conn);  //ִ�в�ѯ���
$smarty->assign("rec",$rec);            //�������
$smarty->display("kqgl/work_note.html");//��ʾģ��
?>