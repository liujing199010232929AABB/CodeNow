<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';

if (isset($_POST['totalscore']) && $_POST['totalscore'] != '' && isset($_POST['passscore']) && $_POST['passscore'] != '' && (isset($_POST['addemattr']) && $_POST['addemattr'] != '')) {
    if (! $adminDB->executeSQL("select * from tb_examattribute where totalscore=" . trim($_POST['totalscore']) . " and passscore=".$_POST['passscore'], $connID)) {
        if (! $adminDB->executeSQL("insert into tb_examattribute(totalscore, passscore) values(" . trim($_POST['totalscore']) . ", " . trim($_POST['passscore']).")", $connID)) {
            echo "<script>alert('分数线添加失败！');</script>";
        } else {
            echo "<script>alert('分数线添加成功！');</script>";
        }
    } else {
        echo "<script>alert('该分数线已经添加过！');</script>";
    }
    echo "<script>location=location</script>";
}

if (isset($_GET['f']) && $_GET['f'] == 'del') {
    $sql = "delete from tb_examattribute where id=(".$_GET['id'].")";
    if($adminDB->executeSQL($sql,$connID)){
        echo "<script>alert('分数线删除成功！');</script>";
    }else{
        echo "<script>alert('分数线删除失败！');</script>";
    }
}
$isShow = 'F';
if ((isset($_GET['f']) && $_GET['f'] == 'edit') || (isset($_POST['f']) && $_POST['f'] == 'edit') && (isset($_POST['editemattr']) && $_POST['editemattr'] != '')) {
    if (isset($_POST['f']) && $_POST['f'] == 'edit') {
        if (! $adminDB->executeSQL("select * from tb_examattribute where totalscore=" . trim($_POST['totalscore']) . " and passscore=".$_POST['passscore'], $connID)) {

            if (! $adminDB->executeSQL("update tb_examattribute set totalscore='" . $_POST['totalscore'] . "', passscore=".$_POST['passscore']."  where id='" . $_POST['id'] . "'", $connID)) {
                echo "<script>alert('分数线更改失败！');</script>";
            } else {
                echo "<script>alert('分数线更改成功！');</script>";
            }
        }else{
            echo "<script>alert('该分数线已经添加！');</script>";
        }
        echo "<script>location=location;</script>";
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }
    $isShow = 'T';
    $bigtype = $adminDB->executeSQL("select * from tb_examattribute where id='" . $id . "'", $connID);
    $smarty->assign('bigtype', $bigtype);
}
$smarty->assign('isShow', $isShow);
//
$emattrArr = $adminDB->executeSQL("select * from tb_examattribute  order by id", $connID);

$smarty->assign('emattrArr',$emattrArr);

$smarty->display('addemattr.phtml');