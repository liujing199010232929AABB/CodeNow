<?php
	//�ж��ļ���׺
	//$f_type�������ļ��ĺ�׺����
	//$f_upfiles���ϴ��ļ���
	function f_postfix($f_type,$f_upfiles){
		$is_pass = false;
		$tmp_upfiles = explode(".",$f_upfiles);
		$tmp_num = count($tmp_upfiles);
		for($num = 0; $num < count($f_type);$num++){
			if(strtolower($tmp_upfiles[$tmp_num - 1]) == $f_type[$num])
				$is_pass = $f_type[$num];
		}
		return $is_pass;
	}
function Video(){//���庯��
include "conn/conn.php";//�������ݿ������ļ�
?>
<tr>
	<td width="131" height="30"><div align="right" ></div><div align="right">���ƣ�</div></td>
    <td width="300" height="30"><input name="names" type="text" id="names" size="30">* </td>
</tr>
<tr>
    <td height="30"><div align="right">�ȼ���</div></td>
    <td height="30">
        <select name="grade" id="grade" >
          <option value="һ��">һ��</option>
          <option value="����">����</option>
          <option value="����">����</option>
          <option value="�����Ƽ�">�����Ƽ�</option>
          <option value="��Ƭ">��Ƭ</option>
        </select>
            *</td>
</tr>
<tr>
	<td height="30"><div align="right">�����̣�</div></td>
    <td height="30">
      <input name="publisher" type="text"  id="publisher" size="30">
      *</td>
</tr>
<tr>
    <td height="30"><div align="right">��Ҫ��Ա��</div></td>
    <td height="30">
      <input name="actor" type="text"  id="actor" size="30">
      *</td>
</tr>
<tr>
    <td height="30"><div align="right">���ݣ�</div></td>
    <td height="30">
      <input name="director" type="text"  id="director" size="30">
      *</td>
</tr>
<tr>
    <td height="30"><div align="right">��Ƭ�ˣ�</div></td>
    <td height="30">
      <input name="marker" type="text"  id="marker" size="30">
      *</td>
</tr>
<tr>
    <td height="30"><div align="right">���ԣ�</div></td>
    <td height="30">
<div align="left" >
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
                      ���� *</div>
      </td>
</tr>
<tr>
    <td height="30"><div align="right">�������ࣺ</div></td>
    <td height="30">

        <select name="style"  id="style" >

        </select>
            *</td>
  </tr>
  <tr>
    <td height="30"><div align="right">һ�����ࣺ</div></td>
    <td height="30">

        <select name="type"  id="type" onchange="changetype(this.value,'<?php echo isset($_REQUEST['types'])?$_REQUEST['types']:"";?>')">
<?php
		$sql="select * from tb_videolist where grade='1'";//�����ѯ��� 
		$result = $pdo->prepare($sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		while($rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
		<option value="<?php echo $rst[2]; ?>"><?php echo $rst[2]; ?></option>
<?php
		}
?>
        </select>
            *</td>
  </tr>
  <tr>
    <td height="30"><div align="right">���й��ң�</div></td>
    <td height="30">
      <input name="from" type="text"  id="from" size="30">
      *</td>
  </tr>
  <tr>
    <td height="30"><div align="right">����ʱ�䣺</div></td>
    <td height="30">
      <input name="publishtime" type="text"  id="publishtime" size="30">
      *</td>
  </tr>
  <tr>
    <td height="30"><div align="right">��Ʒ��</div></td>
    <td height="30">
      <input name="news" type="radio"  value="1" checked>
      ��
      <input name="news" type="radio"  value="0">
      �� *</td>
  </tr>
  <tr>
    <td height="60"><div align="right">��Ҫ���ܣ�</div></td>
    <td height="60">
      <textarea name="remark" cols="35" rows="3"  id="remark"></textarea>
	  <input type="hidden" name="action" value="v" />
      *</td>
  </tr>
  <tr>
    <td height="30"><div align="right">ӰƬ���飺</div></td>
    <td height="30">
      <textarea name="intro" cols="35" rows="6"  id="intro"></textarea>
      *</td>
  </tr>
<?php 
}
/*  �ϴ���Ƶ�ļ�  */
function Audio(){//���庯��
include "conn/conn.php";//�������ݿ������ļ�
?>
<tr>
                          <td width="131" height="30"><div align="right" ></div>
                                <div align="right">���ƣ�</div>
                            </td>
                          <td width="300" height="30">
                            <input name="names" type="text"  id="names" size="30">
            * </td>
                        </tr>
                        </tr>
                        <tr>
                          <td height="30"><div align="right">�ݳ��ߣ�</div></td>
                          <td height="30">
                            <input name="actor" type="text"  id="grade" size="30">
            *</td>
                        </tr>
                        <tr>
                          <td height="30"><div align="right" >�ݳ������ͣ�</div></td>
                          <td height="30">
                            <div align="left">
                    <input type="radio" name="actortype" value="����" checked>
                    ����
                    <input type="radio" name="actortype" value="���">
���
<input type="radio" name="actortype" value="�ֶ�">
�ֶ�                    *</div> 
                            
</td>
                        </tr>
                        <tr>
                          <td height="30"><div align="right">���ʣ�</div></td>
                          <td height="30">
                            <input name="ci" type="text" >
*                          </td>
                        </tr>
                        <tr>
                          <td height="30"><div align="right">������</div></td>
                          <td height="30">
                            <input name="qu" type="text" >
*                          </td>
                        </tr>
                        <tr>
                          <td height="30"><div align="right">�����̣�</div></td>
                          <td height="30">
                            <input name="publisher" type="text"  id="publisher" size="30">
            *</td>
                        </tr>
                        <tr>
                          <td height="30"><div align="right">���ԣ�</div></td>
                          <td height="30">
                          <div align="left" >
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
                      ���� *</div>
            </td>
                        </tr>
						<tr>
                          <td height="30"><div align="right">һ�����ࣺ</div></td>
                          <td height="30">
        <select name="type" id="type" onchange="changetype(this.value,'<?php echo isset($_REQUEST['types'])?$_REQUEST['types']:"";?>')">
<?php $sql="select * from tb_audiolist where grade='1'";//�����ѯ���
		$result = $pdo->prepare($sql);//׼����ѯ
		$result->execute();//ִ�в�ѯ
		while($rst=$result->fetch(PDO::FETCH_NUM)){//ѭ�������ѯ���
?>
		<option value="<?php echo $rst[2]; ?>" <?php if(isset($_GET['type']) && $_GET['type'] == $rst[2]) echo "selected";?>><?php echo $rst[2]; ?></option>
<?php
		}
?>
        </select>
*</td>
                        </tr>
                        <tr>
                          <td height="30"><div align="right">�������ࣺ</div></td>
                          <td height="30">
        <select name="style"  id="style" >

        </select>
*</td>
                        </tr>
						                        
                        <tr>
                          <td height="30"><div align="right">���й��ң�</div></td>
                          <td height="30">
                            <input name="from" type="text"  id="from" size="30">
            *</td>
                        </tr>
                        <tr>
                          <td height="30"><div align="right">����ʱ�䣺</div></td>
                          <td height="30">
                            <input name="publishtime" type="text"  id="publishtime" size="30">
            *</td>
                        </tr>

                        <tr>
    					  <td height="30"><div align="right">��Ʒ��</div></td>
    					  <td height="30">
      						<input name="news" type="radio"  value="1" checked>
      						��
      						<input name="news" type="radio"  value="0">
      						�� *</td>
  						</tr>
						<tr>
                          <td height="30"><div align="right">��Ҫ���ܣ�</div></td>
                          <td height="30">
                            <textarea name="remark" cols="35" rows="3"  id="remark"></textarea>
							<input type="hidden" name="action" value="a" />
            *</td>
                        </tr>
<?php
}
?>
