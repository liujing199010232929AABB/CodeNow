<style type="text/css">
<!--
#reg .right_td #chk_name {
	background-color: #FFFFFF;
	height: 15px;
	width: 75px;
	border: 0px solid #FFFFFF;
	font-size: 12px;
	color: #990000;
}
-->
</style>
<script language="javascript">
function chkname(){
	name = document.reg.name.value;
	if(name==""){
		alert("�������û��ǳ�");
		document.reg.name.focus();
		return false;
	}else{
		open("chkname.php?name="+name+"" ,"CHK","height=50,width=200,scrollbars=no,top=200,left=200");
	}
}
</script>
<table width="500" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><table width="500" border="0" cellspacing="0" cellpadding="0">
 		<form id="reg" name="reg" method="post" enctype="multipart/form-data" action="register_chk.php">
 			<tr>
   			   <td width="50" rowspan="18" align="center" valign="top">&nbsp;</td>
   			   <td height="20" colspan="2" align="center" valign="top">&nbsp;</td>
   			   <td width="50" rowspan="18" align="center" valign="top">&nbsp;</td>
  			</tr>
  			<tr>
      			<td width="100" height="40" align="right" valign="middle" scope="col">�û�����</td>
   			  <td align="left" valign="middle" scope="col"><input type="text" name="name" id="name" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/><span class="STYLE1"> *</span>[<input type="button" name="chk_name" id="chk_name" value="����û���" onclick="return chkname()"/>]</td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">���룺</td>
   			  <td align="left" valign="middle"><input type="password" name="password" id="password" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/><span class="STYLE1"> *</span>(����3λ)</td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">ȷ�����룺</td>
   			  <td align="left" valign="middle"><input type="password" name="t_password" id="t_password" class="usual"onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''" /><span class="STYLE1"> *</span></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">������ʾ���⣺</td>
   			  <td align="left" valign="middle"><input type="text" name="question" id="question" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/><span class="STYLE1"> *</span></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">����𰸣�</td>
   			  <td align="left" valign="middle"><input type="text" name="answer" id="answer" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/><span class="STYLE1"> *</span></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">�Ա�</td>
      			<td align="left" valign="middle">
				<input name="sex" id="sex" type="radio" value="man" checked />��
				<input name="sex" id="sex" type="radio" value="male"/>Ů
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
     			<td align="left" valign="middle"><input type="text" name="age" id="age" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
			<tr>
				<td width="100" height="40" align="right" valign="middle">ְҵ��</td>
      			<td align="left" valign="middle"><input type="text" name="job" id="job" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">E-mail��</td>
      			<td align="left" valign="middle"><input type="text" name="email" id="email" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">��ϵ��ַ��</td>
      			<td align="left" valign="middle"><input type="text" name="address" id="address" class="usual" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="100" height="40" align="right" valign="middle">QQ��</td>
      			<td align="left" valign="middle"><input type="text" name="qq" id="qq" class="usual"onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''" /></td>
    		</tr>
    		<tr>
      			<td height="30" colspan="2" align="center" valign="middle">
				<input name="regi" type="submit" id="regi" value="ע��" onclick="return reg_chk();" />(<span class="STYLE1">*</span>��Ϊ������)
   			    <input name="reset" type="reset" id="reset" value="����" /></td>
    		</tr></form></table>
	</td></tr></table>