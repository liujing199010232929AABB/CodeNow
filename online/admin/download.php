<?php
	include "conn/conn.php";//�������ݿ������ļ�
	$address = $_GET['id'];//Ϊ������ֵ
	if($_GET['action'] == "audio"){//�������action��ֵΪaudio
		$a_sql = "select address,downTime from tb_audio where address = '".$address."'";//�����ѯ���
		$result = $pdo->prepare($a_sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		if($a_rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�жϽ���Ƿ�Ϊ��
			$u_sql = "update tb_audio set downTime=".($a_rst[1] + 1)." where address = '".$address."'";//����������
			$pdo->exec($u_sql);//ִ�����
			$path= "../upfiles/audio/".$address;//����������Ƶ�ļ���·��
		}
	}else if($_GET['action'] == "video"){//�����������action��ֵΪvideo
		$a_sql = "select address,downTime from tb_video where address = '".$address."'";//�����ѯ���
		$result = $pdo->prepare($a_sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		if($a_rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�жϽ���Ƿ�Ϊ��
			$u_sql = "update tb_video set downTime=".($a_rst[1] + 1)." where address = '".$address."'";//����������
			$pdo->exec($u_sql);//ִ�����
			$path = "../upfiles/video/".$address;//����������Ƶ�ļ���·��
		}
	}
if(file_exists($path)==false)//����ļ�������
{
 echo "<script>alert('�������ļ���ɾ�����������Ա��ϵ��');history.back();</script>";//�����Ի���
 exit;//�˳�����
}
$filename=preg_replace('/^.+[\\\\\\/]/','',$path);//��ȡ�����ļ���
//���ļ���������
$file=fopen($path,"r");
header("Content-type:application/octet-stream");
header("Content-ranges:bytes");
header("Content-length:".filesize($path));
header("Content-Disposition:attachment;filename=".$filename);
readfile($path);
fclose($file);
exit;
?>