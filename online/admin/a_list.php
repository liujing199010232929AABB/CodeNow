<?php
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
	$l_sqlstr = "select * from tb_audiolist";//�����ѯ���
	$result = $pdo->prepare($l_sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
?>
<table width="380" height="440" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" valign="top"><table width="380" height="60" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" colspan="4" align="center" valign="middle">�� Ƶ Ŀ ¼ �� ��</td>
        </tr>
        <tr>
          <td colspan="4"><table width="375" border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td height="10" colspan="5" align="right" valign="middle"><a href="#" onclick="javacript:Wopen=open('operation.php?action=audiolist','���Ŀ¼','height=500,width=665,scrollbars=no');">Ŀ¼���</a></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle">ID</td>
                <td height="30" align="center" valign="middle">�ȼ�</td>
                <td height="30" align="center" valign="middle">����</td>
                <td height="30" align="center" valign="middle">��������</td>
                <td height="30" align="center" valign="middle">����</td>
              </tr>
			  <?php
				while($l_rst = $result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
			  ?>
              <tr>
                <td height="18" align="center" valign="middle"><?php echo $l_rst[0]; ?></td>
                <td height="18" align="center" valign="middle"><?php echo $l_rst[1]; ?></td>
                <td height="18" align="center" valign="middle"><?php echo $l_rst[2]; ?></td>
                <td height="18" align="center" valign="middle"><?php echo $l_rst[3] ?></td>
                <td height="18" align="center" valign="middle"><a href="del_list_chk.php?action=audiolist&id=<?php echo $l_rst[0]; ?>" onclick="return del_chk();">ɾ��</a>
                </td>
              </tr>
              <?php
				}
			  ?>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>