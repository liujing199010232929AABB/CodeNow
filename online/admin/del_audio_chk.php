<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	$file_path = "../upfiles/audio/";//������Ƶ�ļ�·��
	$s_sqlstr = "select * from tb_audio where id = ".$_GET['id'];//�����ѯ���
	$result = $pdo->prepare($s_sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	if($s_rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�жϽ���Ƿ�Ϊ��
		if(file_exists($file_path.$s_rst[16])){//����ļ�����
			if(unlink($file_path.$s_rst[16]) and unlink($file_path.$s_rst[2])){//ɾ���ļ�����ӦͼƬ���жϽ���Ƿ�Ϊ��
				$d_sqlstr = "delete from tb_audio where id = ".$_GET['id'];//����ɾ�����
				if($pdo->exec($d_sqlstr)){//���ִ��ɾ�������Ϊ��
					echo "<script>alert('ɾ���ɹ�');location='main.php?action=audio';</script>";//�����Ի���
					exit();//�˳�����
				}else{
					echo "<script>alert('ɾ��ʧ��');history.go(-1);</script>";//�����Ի���
					exit();//�˳�����
				}
			}
		}else{
			$d_sqlstr = "delete from tb_audio where id = ".$_GET['id'];//����ɾ�����
			if($pdo->exec($d_sqlstr)){//���ִ��ɾ�������Ϊ��
				echo "<script>alert('���ļ���ɾ��~');location='main.php?action=audio';</script>";//�����Ի���
				exit();//�˳�����
			}else{
				echo "<script>alert('ɾ��ʧ��');history.go(-1);</script>";//�����Ի���
				exit();//�˳�����
			}
		}
	}
	else
		echo "<script>alert('ɾ��ʧ��');history.go(-1);</script>";//�����Ի���
?>