<?php
	header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	$a_sql="select * from tb_manager where name='".$_POST['names']."'";//�����ѯ���
	$result = $pdo->prepare($a_sql);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	if($a_rst=$result->fetch(PDO::FETCH_NUM))//����ѯ������ص����鲢�жϽ���Ƿ�Ϊ��
		echo "<script>alert('�����ƵĹ���Ա�Ѿ����ڣ����������');history.go(-1);</script>";//�����Ի���
	else{
		$a_sqlstr="insert into tb_manager values('','".$_POST['names']."','".$_POST['password']."','".$_POST['grade']."','".$_POST['realname']."','".date("Y-m-d")."','1')";//����������
		if($pdo->exec($a_sqlstr)){//���ִ�в��������Ϊ��
?>
		<script>
			top.opener.location.reload(); 
			alert("����Ա��ӳɹ�");
			top.window.close();
		</script>
<?php
		}
		else
			echo "<script>alert('���ʧ��".$a_sqlstr."');history.go(-1);</script>";//�����Ի���
	}
?>	