<?php
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
?>
<table width="400" height="440" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" valign="top"><table width="380" height="60" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" colspan="4" align="center" valign="middle">�� Ƶ �� �� �� ��</td>
        </tr>
        <tr>
          <td colspan="4" class="style1"><table width="395" border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td height="10" colspan="5" align="right" valign="middle"><a href="#" onclick="javacript:Wopen=open('operation.php?action=videoadd','�����Ƶ','height=700,width=665,scrollbars=no');">�������</a></td>
              </tr>
              <tr>
                <td width="22" height="30" align="center" valign="middle">ID</td>
                <td width="104" height="30" align="center" valign="middle">����</td>
                <td width="60" height="30" align="center" valign="middle">���</td>
                <td width="138" height="30" align="center" valign="middle">����</td>
                <td height="37" align="center" valign="middle">����</td>
              </tr>
              <?php
					$sqlstr = "select * from tb_video";//�����ѯ���
					$result = $pdo->prepare($sqlstr);//׼����ѯ
					$result->execute();//ִ�в�ѯ
					while($rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
				?>
              <tr>
                <td height="18" align="center" valign="middle"><?php echo $rst[0]; ?></td>
                <td height="18" align="center" valign="middle"><a href="#"><?php echo $rst[1]; ?></a></td>
				<td height="18" align="center" valign="middle"><?php echo $rst[11]; ?></td>
                <td height="18" align="center" valign="middle"><?php echo $rst[6]; ?></td>
				 <td height="18" align="center" valign="middle"><a href="del_video_chk.php?id=<?php echo $rst[0]; ?>" onclick="return del_chk();">ɾ��</a></td> 
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
