<?php
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
?>
<table width="380" height="440" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" valign="top"><table width="380" height="60" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" colspan="4" align="center" valign="middle">�� Ա �� �� �� ��</td>
        </tr>
        <tr>
          <td colspan="4"><table width="375" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="10" colspan="5" align="right" valign="middle"><a href="#" onClick="javacript:Wopen=open('operation.php?action=v_found','��������','height=500,width=665,scrollbars=no');">��Ա��Ϣ��ѯ</a></td>
              </tr>
              <tr>
                <td width="40" height="30" align="center" valign="middle">ID</td>
                <td width="54" height="30" align="center" valign="middle">�ȼ�</td>
                <td width="76" height="30" align="center" valign="middle">�û���</td>
                <td width="78" height="30" align="center" valign="middle">�ϴ�����</td>
                <td width="95" align="center" valign="middle">����</td>
              </tr>
<?php
			  	if(!isset($_GET['types']))//�������types��ֵΪ��
			  		$v_sqlstr="select * from tb_account";//�����ѯ���
				else{
					switch ($_GET['types']){//�жϲ���types��ֵ
						case "name"://�������ֵΪname
							$other="name like '%".$_GET['key']."%'";//�����ַ���
							break;//����switch���
						case "realname"://�������ֵΪrealname
							$other="realname like '%".$_GET['key']."%'";//�����ַ���
							break;//����switch���
						case "grade"://�������ֵΪgrade
							$other="grade='".$_GET['key']."'";//�����ַ���
							break;//����switch���
						case "counts"://�������ֵΪcounts
							$other="counts<='".$_GET['key']."'";//�����ַ���
							break;//����switch���
						case "sex"://�������ֵΪsex
							$other="sex='".$_GET['key']."'";//�����ַ���
							break;//����switch���
					}			
				$v_sqlstr="select * from tb_account where ".$other;//�����ѯ���
				} 
				$result = $pdo->prepare($v_sqlstr);//׼����ѯ
				$result->execute();//ִ�в�ѯ
				while($v_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
              <tr>
                <td height="18" align="center" valign="middle"><?php echo $v_rst[0]; ?></td>
                <td height="18" align="center" valign="middle"><?php echo $v_rst[12]; ?></td>
                <td height="18" align="center" valign="middle"><?php echo $v_rst[1]; ?></td>
                <td height="18" align="center" valign="middle"><?php echo $v_rst[11]; ?></td>
                                 <form name="form1" method="post" action="freeze_chk.php">
				 <td height="18" align="center" valign="middle">
<?php
	if($v_rst[13]=="1")//�����ѯ����е�18���ֶ�ֵΪ1
		$fd = "����"; //Ϊ������ֵ
	else 
		$fd = "�ⶳ";//Ϊ������ֵ
?>
					<input type="hidden" name="id" value="<?php echo $v_rst[0]; ?>">
					<input type="hidden" name="whether" value="<?php echo $v_rst[13]; ?>">
                    <input type="submit" name="Submit2" class="submit" value="<?php echo $fd; ?>">
					<a href="del_freeze_chk.php?id=<?php echo $v_rst[0]; ?>" onClick="return del_chk();">ɾ��</a>
                </td> 
				</form>
              </tr>
<?php
				}
?>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>