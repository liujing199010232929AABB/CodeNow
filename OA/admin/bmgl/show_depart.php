<?php
include "../inc/check.php"; //����Ȩ�޼���ļ�
include "../conn/conn.php"; //�������ݿ������ļ�
include "../inc/func.php";  //�����Զ��庯���ļ�
?>
<html>
<head>
<title>��״�����˵�</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<!--����JS�ű��ļ�-->
<script src="../js/admin_js.js"></script>
<!--�����ⲿCSS��ʽ-->
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<!--�鿴������Ϣ-->
<table width="765" height="450" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px;">
    <tr>
        <td align="center" valign="top" bgcolor="#DAE9EC">
            <table width="50%" height="25"  border="0" cellpadding="0" cellspacing="0">
                    <?php
                    //�ҵ�������
                    $sqlstr = "select * from tb_depart where top_depart = 0";
                    $result = sqlsrv_query($conn, $sqlstr);
                    //������id��
                    $m = 1;
                    //ѭ��������и�����
                    while($rows = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC)){
                        $wid = 300;
                        //�鿴��������
                        $sqlstr1 = "select * from tb_depart where up_depart = ".$rows[0];
                        $result1 = sqlsrv_query($conn,$sqlstr1);
                        $nu      = sqlsrv_has_rows ($result1);
                        //�����ǰ����û����������ʱ
                        if(!$nu){
                    ?>
                    <tr>
                        <td height="25">
                            <a href="#">
                                <img src="../Images/folder.gif" alt="չ��" name="img<?php echo $m; ?>" width="30" height="16" border="0" id="img<?php echo $m; ?>">&nbsp;<?php echo $rows[1]; ?>
                            </a>
                            ------------------
                            <a href="edit_depart.php?id=<?php echo $rows[0]; ?>">�޸�</a>||
                            <a href="del_depart_chk.php?id=<?php echo $rows[0] ?>" onClick="return cfm();">ɾ��</a>
                        </td>
                    </tr>
                        <?php
                        //�����ǰ��������������ʱ
                        }else{
                        ?>
                    <tr>
                        <td height="25">
                            <a href="Javascript:ShowTR(img<?php echo $m; ?>,OpenRep<?php echo $m; ?>)">
                                <img src="../Images/jia.gif" alt="չ��" name="img<?php echo $m; ?>" width="32" height="14" border="0" id="img<?php echo $m; ?>">&nbsp;
                                <?php echo $rows[1]; ?></a>
                            ------------------
                            <a href="edit_depart.php?id=<?php echo $rows[0]; ?>">�޸�</a>||ɾ��
                        </td>
                    </tr>
                    <?php
                        //���ͬ������
                        list_menu($rows[0],$wid,$m);
                            $m += 1;
                        }
                    }
                    ?>
            </table>
        </td>
    </tr>
</table>
</body>
</html>