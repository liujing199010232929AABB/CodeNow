<?php if(isset($_POST['action']) && $_POST['action']=="search"){//�������action��ֵΪsearch
?>
	<script language="javascript">
		top.opener.location="main.php?action=member&types=<?php echo $_POST['types1']; ?>&key=<?php echo $_POST['keyword']; ?>";
		top.window.close();
	</script>
<?php 
exit;//�˳�����
} 
?>
<?php
	include "conn/conn.php";//�������ݿ������ļ�
	include "inc/chec.php";//�����ж��û�Ȩ���ļ�
	
?>
<table width="558" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="567" height="26" align="center" valign="middle"><font style="font-size:13px; ">�� Ա �� Ϣ �� ѯ</font></td>
  </tr>
  <tr>
    <td><table width="559" height="94" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="92"><table width="404" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="402" valign="top"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
             
              <tr>
                <td height="15" colspan="2">&nbsp;</td>
                </tr> <form name="list" method="post" action="<?php isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:""; ?>">
              <tr>
                <td width="150" height="40" align="right" valign="middle">�� ѯ �� ʽ ��</td>
                <td width="250" height="40" align="left" valign="middle"><select name="types" onChange="javascript:list.submit()">
                  <option value="name" <?php  if(isset($_POST['types']) && ($_POST['types']=="name") or !isset($_POST['types'])) echo "selected"; ?>>���û���</option>
				  <option value="grade" <?php if(isset($_POST['types']) && $_POST['types']=="grade") echo "selected"; ?>>����Ա�ȼ�</option>
                  <option value="counts" <?php if(isset($_POST['types']) && $_POST['types']=="counts") echo "selected"; ?>>���ϴ�����</option>
                  <option value="sex" <?php if(isset($_POST['types']) && $_POST['types']=="sex") echo "selected" ?>>���Ա�</option>
                </select></td>
              </tr> </form>
			  <form name="list1" method="post" action="v_found.php">
<?php switch (isset($_POST['types'])?$_POST['types']:""){ //�жϲ���types��ֵ
			case ""://�������ֵΪ��
				names() ;//ִ��names()����
				break;//����switch���
			case "name"://�������ֵΪname
				 names();//ִ��names()����
				 break;//����switch���
			case "grade"://�������ֵΪgrade
				 grade();//ִ��grade()����
				 break;//����switch���
			case "counts"://�������ֵΪcounts
				 counts();//ִ��counts()����
				 break;//����switch���
			case "sex"://�������ֵΪsex
				 sex();//ִ��sex()����
				 break;//����switch���
			default:
				 names();//ִ��names()����
				 break;//����switch���
		}
?> 
				<input name="types1" type="hidden" value="<?php if(!isset($_POST['types'])) echo "name"; else echo $_POST['types']; ?>">
				<input type="hidden" name="action" value="search">
              <tr>
                <td height="30" colspan="2" align="center" valign="middle">
                    <input name="Submit" type="submit" class="submit" value="  ��  ѯ  ">
                    <input name="Submit2" type="button" class="submit" value="  ��  ��  " onClick="javascript:top.window.close()"></td>
                </tr> </form>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
 function names(){//����names()����
?>
              <tr>
                <td height="40" align="right" valign="middle">                  
                  �� �� �� �� </td>
                <td height="40"><input name="keyword" type="text" id="name"></td>
              </tr>
<?php
}
function grade(){//����grade()����
?>
<tr>
<td height="40" align="right" valign="middle">�� Ա �� �� ��</td>
                <td height="40">
                  <input name="keyword" type="radio" value="��ͨ��Ա" checked>
                  ��ͨ��Ա
                    <input type="radio" name="keyword" value="�߼���Ա"> 
                    �߼���Ա</td></tr>
<?php
}
function counts(){//����counts()����
?>
              <tr>
                <td height="40" align="right" valign="middle">�� �� �� �� ��</td>
                <td height="40">
					<input name="keyword" type="text" id="name">����
                  </td>
              </tr>
<?php
}
function sex(){//����sex()����
?>
              <tr>
                <td height="40" align="right" valign="middle">�� �� ��</td>
                <td height="40">
                  <input type="radio" name="keyword" value="man"> 
                  ��
                  <input name="keyword" type="radio" value="male" checked>
Ů                  </td>
              </tr>
<?php
}
?>
