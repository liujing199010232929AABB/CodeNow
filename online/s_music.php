<?php
	include "conn/conn.php";//�������ݿ������ļ�
	$s_sqlstr="select * from tb_register where toName='".$_SESSION['name']."' order by issueDate Desc";//�����ѯ���
	$result = $pdo->prepare($s_sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
?>
<table width="558" height="110" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="567" height="46" align="center" valign="bottom" style="font-size:24px;">�� �� �� Ϣ �� �� </td>
  </tr>
  <tr>
    <td><table width="559" align="center" cellpadding="0" cellspacing="0" bordercolor="#9caab5">
      <tr>
        <td height="318"><table width="404" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="402" height="312" valign="top"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" width="400" valign="top">
<?php
if($s_rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص������в��жϽ���Ƿ�Ϊ��
    do{//ѭ�������ѯ���
?>
	    <table width="400" border="0" cellspacing="0" cellpadding="0">
            <tr valign="top">
                <td height="15" colspan="4">&nbsp;</td>
            </tr>
<?php
	    $s_sqlstr1="select * from tb_audio where id=".$s_rst[1];//�����ѯ���
	    $result1 = $pdo->prepare($s_sqlstr1);//׼����ѯ
	    $result1->execute();//ִ�в�ѯ
	    if($s_rst1 = $result1->fetch(PDO::FETCH_NUM)){//����ѯ����������鲢�ж��Ƿ�Ϊ��
?>	
            <tr valign="top">
                <td width="110" height="30">�������ƣ�</td>
                <td width="185" height="30"><a href="operation.php?action=dotlisten&id=<?php echo $s_rst[0]; ?>&name=<?php echo $s_rst1[16]; ?>"><?php echo $s_rst1[1]; ?></a></td>
                <td width="75" height="30">����ˣ�</td>
                <td width="103" height="30">
                    <?php echo $s_rst[2]; ?></td>
            </tr>
            <tr valign="top">
                <td width="110">ף�</td>
                        <td height="55" colspan="3">
                              <textarea name="textarea" cols="40" rows="3" ><?php echo $s_rst[4]; ?></textarea>
                        </td>
                        </tr>
                    </table>
					<?php
						}
					}while($s_rst=$result->fetch(PDO::FETCH_NUM));
				}else{
					echo "���޵����Ϣ��";
				}
					?></td>
                </tr>
              <tr>
                <td height="30"><div align="center">
                    <input name="Submit2" type="button" value="  ��  ��  " onClick="javascript:window.open('','_self');window.close()"></div>
                </td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>