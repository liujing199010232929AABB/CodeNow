<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
	if($_GET['action'] == "audiolist")//�������action��ֵΪaudiolist
		$t_name = "tb_audiolist";//Ϊ������ֵ
	else if($_GET['action'] == "videolist")//�����������action��ֵΪvideolist
		$t_name = "tb_videolist";//Ϊ������ֵ
	$sqlstr = "delete from ".$t_name." where id =".$_GET['id'];//����ɾ�����
	if(!$pdo->exec($sqlstr)){//���ִ��ɾ�������Ϊ��
		echo "<script>alert('ɾ������".$sqlstr."');history.go(-1);</script>";//�����Ի���
	}else
		echo "<script>alert('ɾ���ɹ�');location='".$_SERVER['HTTP_REFERER']."';</script>";//�����Ի���
?>