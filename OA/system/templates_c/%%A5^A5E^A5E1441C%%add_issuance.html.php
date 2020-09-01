<?php /* Smarty version 2.6.19, created on 2016-07-23 11:30:35
         compiled from shps/add_issuance.html */ ?>
<!DOCTYPE html >
<html>
<head>
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/client_js.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>发布审核</title>
</head>

<body>
    <table width="765" border="1" cellpadding="0" cellspacing="0" class="big_td">
        <tr>
            <td height="33" background="images/list.jpg" id="list">发布审核</td>
        </tr>
    </table>
    <form name="form1" method="post" action="add_issuance_chk.php">
        <table  border="0" cellspacing="0" cellpadding="0" bgcolor="#DEEBEF">
            <tr>
                <td width="100" height="30" align="right" valign="middle" scope="col">主题：</td>
                <td height="30" align="left" valign="middle" scope="col">
                    <input type="text" name="a_title">
                </td>
            </tr>
            <tr>
                <td align="right" valign="middle">内容：</td>
                <td align="left" valign="middle">
                    <textarea name="a_content" cols="30" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" valign="middle">
                <input type="submit" value="发布"></td>
            </tr>
        </table>
    </form>
</body>
</html>