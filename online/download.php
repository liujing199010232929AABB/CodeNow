<?php
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	$address = $_GET['id'];//Ϊ������ֵ
	if($_GET['action'] == "audio"){//���action����ֵ����audio
		$a_sql = "select address,downTime from tb_audio where address = '".$address."'";//�����ѯ���
		$result = $pdo->prepare($a_sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		$a_rst = $result->fetch(PDO::FETCH_NUM);//����ѯ������ص�����
		if($a_rst){//�������Ϊ��
			$u_dql = "update tb_audio set downTime=".($a_rst[1]+1)." where address = '".$address."'";//����������
			$pdo->exec($u_dql);//ִ�����
			$path= "upfiles/audio/".$address;//�����ļ�·��
		}
	}else if($_GET['action'] == "video"){//���action����ֵ����video
		$a_sql = "select address,downTime from tb_video where address = '".$address."'";//�����ѯ���
		$result = $pdo->prepare($a_sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		$a_rst = $result->fetch(PDO::FETCH_NUM);//����ѯ������ص�����
		if($a_rst){//�������Ϊ��
			$u_dql = "update tb_video set downTime=".($a_rst[1]+1)." where address = '".$address."'";//����������
			$pdo->exec($u_dql);//ִ�����
			$path = "upfiles/video/".$address;//�����ļ�·��
		}
	}
if(file_exists($path)==false)//����ļ�������
{
 echo "<script>alert('�������ļ���ɾ�����������Ա��ϵ��');history.back();</script>";//�����Ի���
 exit;//�˳�����
}
$filename=preg_replace('/^.+[\\\\\\/]/','',$path);//��ȡ�����ļ���
$file=fopen($path,"r");//���ļ�
//���ļ���������
header("Content-type:application/octet-stream");
header("Content-ranges:bytes");
header("Content-length:".filesize($path));
header("Content-Disposition:attachment;filename=".$filename);
readfile($path);
fclose($file);
exit;
?>