<?php
	//�ж�Ŀ¼���Ƿ��ظ�
	//$f_fields���ֶ���
	//$tablename�����ݱ���
	//$f_str��Ҫ���ҵ��ֶ�
	function is_chk($f_fields,$tablename,$f_str){
		$is_chk = true;//��ʼ������
		include "../conn/conn.php";//�������ݿ������ļ�
		$is_sqlstr = "select $f_fields from $tablename";//�����ѯ���
		$result = $pdo->prepare($is_sqlstr);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		while($is_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
			if($f_str == $is_rst[0]){//�������ֵ���
				$is_chk = false;//Ϊ������ֵ
				break;//����ѭ��
			}
		}
		return $is_chk;//���ر�����ֵ
	}
	//�ж��ļ���׺
	//$f_type�������ļ��ĺ�׺����
	//$f_upfiles���ϴ��ļ���
	function f_postfix($f_type,$f_upfiles){
		$is_pass = false;
		$tmp_upfiles = explode(".",$f_upfiles);
		$tmp_num = count($tmp_upfiles);
		for($num = 0; $num < count($f_type);$num++){
			if(strtolower($tmp_upfiles[$tmp_num - 1]) == $f_type[$num]){
				$is_pass = $f_type[$num];
			}
		}
		return $is_pass;
	}
?>