<?php
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
?>
<script src="js/register.js"></script>
<table width="558" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="567" height="46" valign="bottom"><div align="center"><font style="color:#000000; font-size:24px; padding-top:20px; ">�� �� �� ¼ �� ��</font> </div></td>
  </tr>
  <tr>
    <td><table border="0" width="559" height="94" align="center" cellpadding="0" cellspacing="0">
         <form name="list" method="post" action="?action=give&id=<?php echo $_GET['id'];?>">
              <tr>
                <td height="15" colspan="2">&nbsp;</td>
                </tr>
              <tr valign="top">
                <td width="100" height="30">
                  <div align="right" >�����ˣ�</div></td>
                <td width="325" height="30"><input name="toname" type="text"  id="toname" size="30" class="usual"></td>
              </tr>
              <tr>
                <td height="30" valign="top"><div align="right" >ף���</div></td>
                <td height="80" valign="top"><textarea name="remark" cols="40" rows="5"  id="remark"></textarea></td>
              </tr>
              <tr>
                <td height="40" colspan="2"><div align="center">
					<input name="id" type="hidden" value="<?php echo isset($_GET['id'])?$_GET['id']:"" ?>">
                    <input name="Submit" type="button"  value="  ��  ��  " onClick="return register()">
                    <input name="Submit2" type="button"  value="  ��  ��  " onClick="javascript:top.window.close()">
                </div></td>
                </tr> 
		</form>
    </table></td>
  </tr>
</table>

<?php
	if(isset($_POST['toname']) && $_POST['toname'] <> ""){//���toname����ֵ��Ϊ��
	$sql="select * from tb_account where name='".$_POST['toname']."'";//�����ѯ���
	$result=$pdo->prepare($sql);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	if(!$rst=$result->fetch(PDO::FETCH_NUM)){//�����ѯ�����Ϊ��
		echo "<script>alert('�û�Ա�����ڣ����������룡');</script>";//������ʾ��Ϣ
		exit();//�˳�����
	}
	$id=$_POST['id'];//Ϊ������ֵ
	$toname=$_POST['toname'];//Ϊ������ֵ
	$from=$_SESSION['name'];//Ϊ������ֵ
	$remark=$_POST['remark'];//Ϊ������ֵ
	$sql="insert into tb_register values('',".$id.",'".$from."','".$toname."','".$remark."','".date("Y-m-d H:i:s")."')";//����������
	$rst = $pdo->exec($sql);//ִ�����
?>
<script language="javascript">
<?php
	if(!($rst == false)){	
?>
		alert("�����Ϣ����ɹ�");//�����Ի���
<?php
	}else{
?>
		alert("���ʧ��");//�����Ի���
<?php
}
?>
	top.opener.location.reload();//ˢ�¸�����
	top.window.close();//�رյ�ǰҳ��
</script>	
<?php 
}
?>