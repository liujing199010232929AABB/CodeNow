<?php
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/func.php";//���������ļ�
?>
<table width="558" height="110" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="567" height="46" valign="bottom"><div align="center"><font style="color:#000000; font-size:24px; padding-top:20px;">�� �� �� ��</font></div></td>
  </tr>
  <tr>
    <td><table width="559" height="94" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="92"><table width="404" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="402" valign="top"><table width="400" height="300" border="0" align="center" cellpadding="0" cellspacing="0">
              
              <tr>
                <td colspan="2" valign="top"><table width="404" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="402" valign="top"><table width="400" height="480" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="15" colspan="2">&nbsp;</td>
                        </tr>
						<form action="trans_chk.php" method="post" enctype="multipart/form-data" name="list">
						<tr>
                          <td height="30" align="right" valign="middle">��Ϣ���ͣ�</td>
                          <td height="30">
                            <select name="types" onchange="window.location='operation.php?action=trans&types=' + this.value;">
                              <option value="Video" <?php if (isset($_REQUEST['types']) && $_REQUEST['types']=="Video" or !isset($_REQUEST['types'])) echo "selected"; ?>>��Ƶ</option>
                              <option value="Audio" <?php if (isset($_REQUEST['types']) && ($_REQUEST['types']=="Audio")) echo "selected"; ?>>��Ƶ</option>
                            </select>							</td>
                        </tr>
                        <tr>
                          <td height="30" align="right" valign="top">ͼƬ��Ϣ��</td>
                          <td height="30" valign="top">
						      <input name="picture" type="file" />
						      <br /><font color="red">(�ϴ�ͼƬ��С���ܳ���700K��ͼƬ��ʽҪ��jpg��jpeg��bmp��gif)</font></td>
                        </tr>
                        <tr>
                          <td height="30" align="right" valign="top">�ϴ����ݣ�</td>
                          <td height="30" valign="top">						 
						      <input name="address" type="file" />
						      <br /><font color="red">(��Ƶ�ļ����ܳ���10M����Ƶ�ļ����ܳ���300M���ļ���ʽҪ��avi��rm��rmvb��wav��mp3��mpg��mp4��wmv)</font></td>
                        </tr>
				<?php 
				

						switch (isset($_REQUEST['types'])?$_REQUEST['types']:""){
							case "Audio"://���types������ֵΪAudio
								Audio();//ִ��Audio()����
								break;//����switch���
						 	case "Video"://���types������ֵΪVideo
						 		Video();//ִ��Video()����
								break; //����switch���
							default:
						 		Video();//ִ��Video()����
								break; //����switch���
						}
				?>
                        <tr>
                          <td height="30" colspan="2"><div align="center">
                              <input name="Submit" type="submit"  value="  ��  ��">
                              ��*Ϊ�����
                              <input name="Submit2" type="button"  value="��  ��  " onClick="javascript:window.open('','_self');window.close()"> </div>                         </td>
                        </tr>
						 </form>
                    </table></td>
                  </tr>
                </table></td>
                </tr> 
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
changetype(list.type.value,"<?php echo isset($_REQUEST['types'])?$_REQUEST['types']:"";?>");
</script>