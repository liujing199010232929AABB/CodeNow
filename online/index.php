<?php
header("content-type:text/html;charset=utf-8");  //���charset=utf-8
session_start();            			//����Session
?>
<script src="js/chk.js"></script>
<script type="text/javascript">
	function chk_see(){
		var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//Ϊ������ֵ
		if(name == ""){             	//�������name��ֵΪ��
			alert('ֻ�л�Ա���ܹۿ�ӰƬ�����¼��');//�����Ի���
			return false;           		//����false��ʹ�û��޷��ۿ�ӰƬ
		}else{
			return true;            		//����true����Ա���Թۿ�ӰƬ
		}
	}
	function chk_listen(){
		var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//Ϊ������ֵ
		if(name == ""){             	//�������name��ֵΪ��
			alert('ֻ�л�Ա���ܲ��Ÿ��������¼��');//�����Ի���
			return false;           		//����false��ʹ�û��޷����Ÿ���
		}else{
			return true;            		//����true����Ա���Բ��Ÿ���
		}
	}
</script>

<link rel="stylesheet" href="css/style.css" />
<body onLoad="setInterval('changeimage()',3000)">
<?php
include "top.php";            			//����logo������ҳ��
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  <tr>
	  <td>&nbsp;</td>
    <td width="960" valign="top">
<?php
	include "main.php";			//��������ʾҳ��
?>
	</td>
	<td width="240" valign="top">
<?php
	include "right.php";			//�����Ӱ�񡢸������а�ҳ��
?>
	</td>
	  <td>&nbsp;</td>
  </tr>
</table>
<?php
	include "bottom.php";			//�����Ȩ��Ϣ����ϵ��ʽҳ��
?>
</body>

