<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	if(!isset($_SESSION['id']) or !isset($_SESSION['name'])){//���Session����id����Session����nameû��ֵ
		echo "<script>alert('��û�е�¼��ʱ');window.close();</script>";//�����Ի���
		exit();//�˳�����
	}
?>