<?php
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
?>
<table width="380" height="440" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" valign="top"><table width="380" height="60" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" colspan="4" align="center" valign="middle">�� Ա �� �� �� ��</td>
        </tr>
        <tr>
          <td colspan="4"><table width="375" border="0" align="center" cellpadding="2" cellspacing="0">
              <tr>
                <td height="10" colspan="3" align="right" valign="middle"><a href="#" onclick="javacript:Wopen=open('operation.php?action=v_grade','��������','height=500,width=665,scrollbars=no');">��������</a></td>
              </tr>
              <tr>
                <td width="47" height="30" align="center" valign="middle">ID</td>
                <td height="30" align="center" valign="middle">��Ŀ����</td>
                <td height="30" align="center" valign="middle">��Ŀ����</td>
              </tr>
              	<?php		$a_sql="select * from tb_grade";//�����ѯ���
						$result = $pdo->prepare($a_sql);//׼����ѯ
						$result->execute();//ִ�в�ѯ
						while($a_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
				?>
              <tr>
                <td height="20" align="center" valign="middle"><?php echo $a_rst[0]; ?></td>
                <td height="20" align="center" valign="middle"><?php echo $a_rst[1]; ?></td>
                <td height="20" align="center" valign="middle"><?php echo $a_rst[2]; ?></td>
              </tr>
              	<?php
						}
				?>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>