<?php
	include "conn/conn.php";//�������ݿ������ļ�
	$m_sqlstr = "select * from tb_account where id = ".$_SESSION['id'];//�����ѯ���
	$result = $pdo->prepare($m_sqlstr);//׼����ѯ
	$result->execute();//ִ�в�ѯ
	if($m_rst=$result->fetch(PDO::FETCH_NUM)){//����ѯ������ص����鲢�ж��Ƿ�Ϊ��
?>
<table width="500" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><table width="500" border="0" cellspacing="0" cellpadding="0">
 		<form id="reg" name="reg" method="post" enctype="multipart/form-data" action="mod_vip_chk.php">
 			<tr>
   			   <td width="50" rowspan="18" align="center" valign="top">&nbsp;</td>
   			   <td height="20" colspan="2" align="center" valign="top">&nbsp;</td>
   			   <td width="50" rowspan="18" align="center" valign="top">&nbsp;</td>
  			</tr>
  			<tr>
      			<td width="100" height="40" align="right" valign="middle" scope="col">�û�����</td>
   			  <td align="left" valign="middle" scope="col"><input type="text" name="name" id="name" class="usual" value="<?php echo $m_rst[1]; ?>" readonly="readonly" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">���룺</td>
   			  <td align="left" valign="middle"><input type="password" name="password" id="password" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/><span class="STYLE1"> *</span>(����3λ)</td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">ȷ�����룺</td>
   			  <td align="left" valign="middle"><input type="password" name="t_password" id="t_password" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''" /><span class="STYLE1"> *</span></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">�Ա�</td>
      			<td align="left" valign="middle">
				<?php if($m_rst[5] == "��"){ ?>
				<input name="sex" id="sex" type="radio" value="��" checked />��
				<input name="sex" id="sex" type="radio" value="Ů"/>Ů
				<?php }else{?>
				<input name="sex" id="sex" type="radio" value="��" />��
				<input name="sex" id="sex" type="radio" value="Ů" checked />Ů
				<?php } ?>
				</td>
    		</tr>
			<tr>
      			<td width="100" height="40" align="right" valign="middle">�ϴ�ͷ��</td>
      			<td align="left" valign="middle">
				<input type="file" name="head" id="head" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/>
				</td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">���䣺</td>
     			<td align="left" valign="middle"><input type="text" name="age" id="age" class="usual" value="<?php echo $m_rst[6]; ?>" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">ְҵ��</td>
      			<td align="left" valign="middle"><input type="text" name="job" id="job" class="usual" value="<?php echo $m_rst[7]; ?>" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">E-mail��</td>
      			<td align="left" valign="middle"><input type="text" name="email" id="email" class="usual" value="<?php echo $m_rst[8]; ?>" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">��ϵ��ַ��</td>
      			<td align="left" valign="middle"><input type="text" name="address" id="address" class="usual" value="<?php echo $m_rst[9]; ?>" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">QQ��</td>
      			<td align="left" valign="middle"><input type="text" name="qq" id="qq" class="usual" value="<?php echo $m_rst[10]; ?>" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''" /></td>
    		</tr>
    		<tr>
      			<td height="30" colspan="2" align="center" valign="middle">
				<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
				<input type="hidden" name="oldhead" value="<?php echo $m_rst[14]; ?>" />
				<input name="regi" type="submit" id="regi" value="�޸�" onclick="return mod_chk();" />(<span class="STYLE1">*</span>��Ϊ������)
   			    <input name="reset" type="reset" id="reset" value="����" /></td>
    		</tr></form></table>
	</td></tr></table>
<?php
	}
?>
