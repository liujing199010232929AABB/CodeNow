<?php
include "./function.php";        		//�����Զ��庯���ļ�
include "./conn/conn.php";       		//��������Դ�ļ�
$query = mysqli_query($connID,"select * from tb_room where id= '".$_GET['roomid']."'");          //����ָ����Ϸ����ŵ���Ϣ
$result=mysqli_fetch_array($query);	//����ѯ��������ص�������
if(!@mysqli_num_rows($query))     						//���δ��������ؼ�¼
    die("ended");                 						//���������ʾ��Ϣ
$chess = $result['chess'];       						//��ȡ���������̵�λ��
$flag = $result['flag'];            					//��ȡ�û����������ǿͻ�
$moved = $result['moved'];       						//��ȡ�û���ǰ�ƶ�������λ��
$eated = $result['eated'];       						//��ȡ���Ե�������
$guest = $result['guest'];       						//��ȡ�ͻ������죩����
$host = $result['host'];            					//��ȡ���������죩����
$guest = iconv("gbk","utf-8",$guest);					//����ת��
$host = iconv("gbk","utf-8",$host);					//����ת��
$time_guest = $result['time_guest'];   				//��ȡ�ͻ������죩��¼��ʱ��
$time_host = $result['time_host']; 					//��ȡ���������죩��¼��ʱ��
$guest_win = $result['guest_win']; 					//��ȡ�ͻ������죩ʤ�ֵĴ���
$host_win = $result['host_win'];      					//��ȡ���������죩ʤ�ֵĴ���
$message_guest = $result['message_guest'];    			//��ȡ�ͻ������죩�����͵���Ϣ
$message_host = $result['message_host'];         		//��ȡ���������죩�����͵���Ϣ
mysqli_query($connID,"update tb_room set time = '".time()."' where ID = '".$_GET['roomid']."' limit 1");   						//���¼�¼��Ϣ
echo $chess."|".$flag."|".$moved."|".$eated."|".$guest."|".$host."|".$guest_win."|".$host_win."|".$message_guest."|".$message_host;       					//����������µ���Ϣ
?>