<?php
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	include "conn/conn.php";//�������ݿ������ļ�
?>
<script src="js/riq.js" language="javascript"></script>
<table width="558" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="567" height="26" align="center" valign="middle"><font style="font-size:13px; ">�� Ƶ �� �� �� ��</font></td>
  </tr>
  <tr>
    <td><table width="559" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="92"><table width="404" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="402" valign="top"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
              <form name="list" id="list" method="post" action="dataadd_chk.php" enctype="multipart/form-data">
              <tr>
                <td height="15" colspan="2">&nbsp;</td>
                </tr>
               <tr>
    <td width="131" height="26" align="right" valign="middle">���ƣ�</td>
    <td width="269" height="26" align="left" valign="middle">
      <input name="names" type="text" id="names" size="30"> *</td>
  </tr>
               <tr>
                 <td height="26" align="right" valign="middle">����ͼƬ��</td>
                 <td height="26" align="left" valign="middle"><input name="picture" type="file" id="picture" size="15">
                 *(���700K)</td>
               </tr>
               <tr>
                 <td height="26" align="right" valign="middle">��Դ�ϴ���</td>
                 <td height="26" align="left" valign="middle"><input name="address" type="file" id="address" size="15">
                 *(���300M)</td>
               </tr>
  <tr>
    <td height="26" align="right" valign="middle">�ȼ���</td>
    <td height="26" align="left" valign="middle">

     <select name="grade" id="grade">
          <option value="һ��">һ��</option>
          <option value="����">����</option>
          <option value="����">����</option>
          <option value="�����Ƽ�" selected="selected">�����Ƽ�</option>
          <option value="��Ƭ">��Ƭ</option>
        </select>
            *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">�����̣�</td>
    <td height="26" align="left" valign="middle"><input name="publisher" type="text" id="publisher" size="30">
      *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">��Ҫ��Ա��</td>
    <td height="26" align="left" valign="middle">
		  <input name="actor" type="text" id="actor" size="30">
      *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">���ݣ�</td>
    <td height="26" align="left" valign="middle">
      <input name="director" type="text"  id="director" size="30">
      *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">��Ƭ�ˣ�</td>
    <td height="26" align="left" valign="middle">
      <input name="marker" type="text" id="marker" size="30">
      *</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">���ԣ�</td>
    <td height="30" align="left" valign="middle">
                      <input type="radio" name="language" value="����" checked> 
                      ����
                      <input type="radio" name="language" value="Ӣ��">
                      Ӣ��
                      <input type="radio" name="language" value="����"> 
                      ����
                      <br>
                      <input type="radio" name="language" value="����"> 
                      ����
                      <input type="radio" name="language" value="����">
                      ����
                      <input type="radio" name="language" value="����"> 
                      ���� *      </td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">�������ࣺ</td>
    <td height="26" align="left" valign="middle">

        <select name="style" id="style" >
<?php
			$a_sqlstr = "select * from tb_videolist where grade='2'";//�����ѯ��� 
			$result = $pdo->prepare($a_sqlstr);//׼����ѯ
			$result->execute();//ִ�в�ѯ
			while($a_rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
		<option value="<?php echo $a_rst[2]; ?>"><?php echo $a_rst[2]; ?></option>
<?php
			}
?>
        </select>
            *</td>
  </tr>
  <tr>
  	<td height="26" align="right" valign="middle">һ�����ࣺ</td>
	<td height="26" align="left" valign="middle">
	<select name="type" id="type">
<?php
			$t_sql = "select * from tb_videolist where grade = '1'";//�����ѯ���		
			$result1 = $pdo->prepare($t_sql);//׼����ѯ
			$result1->execute();//ִ�в�ѯ
			while($t_rst=$result1->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
			<option value="<?php echo $t_rst[2]; ?>"><?php echo $t_rst[2]; ?></option>
<?php
			}
?>
	</select>
	</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">���й��ң�</td>
    <td height="26" align="left" valign="middle">
      <input name="from" type="text" id="from" size="30">
      *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">����ʱ�䣺</td>
    <td height="26" align="left" valign="middle">
      <input name="publishtime" type="text" id="publishtime" size="15" readonly="readonly"><input type="button" value="ѡ������" onClick="loadCalendar(document.getElementById('list').publishtime);">
      *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">��Ʒ��</td>
    <td height="26" align="left" valign="middle">
      <input name="news" type="radio" value="1" checked>
      ��
      <input name="news" type="radio" value="0">
      �� *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="middle">��Ҫ���ܣ�</td>
    <td height="26" align="left" valign="middle">
		<input name="remark" type="text" id="remark" size="30"> *</td>
  </tr>
  <tr>
    <td height="26" align="right" valign="top">��ϸ���ܣ�</td>
    <td height="26" align="left" valign="middle">  
        <textarea name="intro" cols="35" rows="5" id="intro"></textarea> *</td>
  </tr>
              <tr>
                <td height="30" colspan="2" align="center" valign="middle">
					<input type="hidden" name="action" value="v">
                    <input name="Submit" type="submit" value="��  ��" class="submit" onclick="return a_chk();">
                    ��*Ϊ�����                    
                    <input name="Submit2" type="button" value="��  ��" class="submit" onClick="javascript:top.window.close()"></td>
                </tr> </form>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>