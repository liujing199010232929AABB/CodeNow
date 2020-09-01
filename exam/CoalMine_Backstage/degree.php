<?php
require_once 'lzh.inc.php';
if (isset($_POST['degreename']) && $_POST['degreename'] != '' && isset($_POST['adddegree']) && $_POST['adddegree'] != '') {
    if (! $adminDB->executeSQL("select * from tb_degree where name=" . trim($_POST['degreename']), $connID)) {
        if (! $adminDB->executeSQL("insert into tb_degree(name) values('" . trim($_POST['degreename']) ."')", $connID)) {
            echo "<script>alert('试题难度添加失败！');</script>";
        } else {
            echo "<script>alert('试题难度添加成功！');</script>";
        }
    } else {
        echo "<script>alert('该试题难度已经添加过！');</script>";
    }
    echo "<script>location=location</script>";
}

if (isset($_GET['f']) && $_GET['f'] == 'del') {
    $sql = "delete from tb_degree where id=(".$_GET['id'].")";
    if($adminDB->executeSQL($sql,$connID)){
        echo "<script>alert('试题难度删除成功！');</script>";
    }else{
        echo "<script>alert('试题难度删除失败！');</script>";
    }
}
$isShow = 'F';
if ((isset($_GET['f']) && $_GET['f'] == 'edit') || (isset($_POST['f']) && $_POST['f'] == 'edit') && (isset($_POST['editdegree']) && $_POST['editdegree'] != '')) {
    if (isset($_POST['f']) && $_POST['f'] == 'edit') {
        if (! $adminDB->executeSQL("select * from tb_degree where name='" . trim($_POST['试题难度'])."'", $connID)) {

            if (! $adminDB->executeSQL("update tb_degree set name='" . $_POST['degreename'] . "' where id="   . $_POST['id'] , $connID)) {
                echo "<script>alert('试题难度更改失败！');</script>";
            } else {
                echo "<script>alert('试题难度更改成功！');</script>";
            }
        }else{
            echo "<script>alert('该试题难度已经添加！');</script>";
        }
        echo "<script>location=location;</script>";
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }
    $isShow = 'T';
    $bigtype = $adminDB->executeSQL("select * from tb_degree where id=" . $id, $connID);
    $smarty->assign('bigtype', $bigtype);
}
$smarty->assign('isShow', $isShow);
//
$degreeArr = $adminDB->executeSQL("select * from tb_degree  order by id", $connID);

$smarty->assign('degreeArr',$degreeArr);

$smarty->display('degree.phtml');