<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
	session_start();//����Session
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
?>
<link rel="stylesheet" href="css/style.css">
<body>
<table width="558" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="567" height="26" align="center" valign="middle"><font style="font-size:13px; ">�� Ƶ �� �� �� ϸ �� ��</font></td>
  </tr>
  <tr>
    <td><table width="559" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="92">
		<table width="404" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="402" align="center" valign="middle">
<?php	$sql="select * from tb_video where id=".$_GET['id'];//�����ѯ���
		$result = $pdo->prepare($sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		if($rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�жϽ���Ƿ�Ϊ��
?>
		<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="15" colspan="2">&nbsp;</td>
                </tr>
              <tr>
                <td width="131" height="20" align="right" valign="middle">���ƣ�</td>
                <td width="269" height="20"><?php echo $rst[1]; ?></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle">��С��</td>
                <td height="20"><?php echo $rst[3]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">�ȼ���</td>
                <td height="20"><?php echo $rst[4]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">�����̣�</td>
                <td height="20"><?php echo $rst[5]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">��Ҫ��Ա��</td>
                <td height="20"><?php echo $rst[6]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">���ݣ�</td>
                <td height="20"><?php echo $rst[7]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">��Ƭ�ˣ�</td>
                <td height="20"><?php echo $rst[8]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">���ԣ�</td>
                <td height="20"><?php echo $rst[9]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">���</td>
                <td height="20"><?php echo $rst[11]; ?></td>
              </tr>
			  <tr>
                <td height="20" align="right" valign="middle">���й��ң�</td>
                <td height="20"><?php echo $rst[12]; ?></td>
              </tr>
			  <tr>
			    <td height="20" align="right" valign="middle">����ʱ�䣺</td>
			    <td height="20"><?php echo $rst[13]; ?></td>
			    </tr>
			  <tr>
			    <td height="20" align="right" valign="middle">��Ʒ��</td>
			    <td height="20"><?php echo $rst[22]; ?></td>
			    </tr>
			  <tr>
			    <td height="20" align="right" valign="middle">��Ҫ���ܣ�</td>
			    <td height="20">
			      <textarea name="textarea" cols="40" rows="5" readonly="readonly"><?php echo $rst[14]; ?></textarea>			    </td>
			  </tr>
			  
              <tr>
                <td height="30" colspan="2" align="center" valign="middle">
				<input name="Submit" type="submit" value="  ��  ��  "
				onclick="javascript:Wopen=open('operation.php?action=see&id=<?php echo $rst[16]; ?>','','height=700,width=665,scrollbars=no');">
				<input name="Submit" type="button" value="  ��  ��  " onClick="javascript:Wopen=location='download.php?action=video&id=<?php echo $rst[16]; ?>';">			                    
                <input name="Submit2" type="button" value="  ��  ��  " class="submit" onClick="javascript:top.window.close();"></td>
                </tr> 
            </table><?php } ?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>