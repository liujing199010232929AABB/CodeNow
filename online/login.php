<?php
	session_start();//����Session
	if(isset($_SESSION['name'])){//���Session����name��ֵ������
		echo "<script>alert('���Ѿ���¼��');history.back();</script>";//�����Ի���
	}
?>
<title>�û���¼</title>
<script src="js/chk.js" language="javascript"></script>
<link rel="stylesheet" href="css/style.css" />
<center>
<?php
	include "top.php";			//banner
?>
<table width="265" border="0" cellspacing="0" cellpadding="0" style="margin-top: 40px; margin-bottom: 40px;">
	<form name="loginform" id="loginform" action="login_chk.php" method="post">
      <tr>
        <td height="30" colspan="2" align="center" valign="top" background="images/login.jpg">&nbsp;</td>
        </tr>
		<tr>
		  <td height="20" colspan="2" align="center" valign="middle" class="l_td">&nbsp;</td>
		  </tr>
      <tr>
        <td width="93" height="35" align="right" valign="middle" class="l_td"><strong>�û�����</strong></td>
        <td width="180" height="35" align="left" valign="middle" class="l_td"><input type="text" id="name" name="name" size="15" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''" /></td>
      </tr>
      <tr>
        <td height="35" align="right" valign="middle" class="l_td"><strong>�� &nbsp;�룺</strong></td>
        <td height="35" align="left" valign="middle" class="l_td"><input type="password" id="password" name="password"  size="15" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
      </tr>
      <tr>
        <td height="40" align="left" valign="middle" class="l_td">
		<input type="submit" name="login" id="login" value="" onclick="return chk_log();"/></td>
		<td height="40" align="left" valign="middle" class="l_td"><a href="operation.php?action=found" id="dw" class="b" target="_blank">[��������]</a></td>
      </tr>
		<tr>
		  <td height="20" colspan="2" align="center" valign="middle" class="l_td">&nbsp;</td>
		  </tr>
		</form>
    </table>
<?php
	include "bottom.php";			//��ϵ����
?>
</center>