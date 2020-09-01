<?php
require_once 'lzh.inc.php';

if(isset($_POST['admission']) && $_POST['admission']!="" && isset($_POST['password']) && $_POST['password']!=""){	//完成对登录用户的判断
    $bccdNames = $adminDB->executeSQL("select id, name, password,admission,picture from tb_user where password='".md5($_POST['password'])."' and admission='".$_POST['admission']."' ", $connID);

    if ($bccdNames){
        $smarty->assign('update', "T");
        $smarty->assign('admission', $_POST['admission']);
    } else {
        echo "<script>alert('登录失败，请检查您填写的准考证号和密码是否正确！'); window.location.href='updatepassword.php'</script>";
    }
}

if(isset($_POST['submit2']) && $_POST['submit2']!="" ){
    $password = $_POST['password1'];
    $admission1 = $_POST['admission'];

    if ($adminDB->executeSQL("update tb_user set password='".md5($password)."' where admission='".$admission1   ."'", $connID)){
        echo "<script>alert('密码修改成功！'); window.close();</script>";
    } else {
        echo "<script>alert('密码修改失败！'); window.close();</script>";
    }
}
$smarty->display('updatepassword.phtml');
