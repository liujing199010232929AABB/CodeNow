<?php
require_once 'lzh.inc.php';
require_once 'Tree.php';
require_once 'checkLogin.php';


$sid = isset($_GET['id'])?intval($_GET['id']):0;
if (isset($_GET['f']) && $_GET['f'] == 'del') {
    $sids = $sid;
    $childrenIds = getChildrenIds($sid);
    if(!empty($childrenIds)){
        $sids.=$childrenIds;
    }
    $sql = "delete from tb_types_work where id in(".$sids.")";
    if($adminDB->executeSQL($sql,$connID)){
        echo "<script>alert('类别删除成功！');</script>";
    }else{
        echo "<script>alert('类别删除失败！');</script>";
    }
}
$isShow = 'F';
if ((isset($_GET['f']) && $_GET['f'] == 'edit') || (isset($_POST['f']) && $_POST['f'] == 'edit')) {
    if (isset($_POST['f']) && $_POST['f'] == 'edit') {
  		if (! $adminDB->executeSQL("select id, typename from tb_types_work where typename='" . trim($_POST['typename']) . "' and pid=".$_POST['pro_class'], $connID)) {

        	if (! $adminDB->executeSQL("update tb_types_work set typename='" . $_POST['typename'] . "', addtime='".date("Y-m-d")."',pid=".$_POST['pro_class']."  where id='" . $_POST['id'] . "'", $connID)) {
            	echo "<script>alert('类别更改失败！');</script>";
        	} else {
            	echo "<script>alert('类别更改成功！');</script>";
        	}
		}else{
			  echo "<script>alert('该类别已经添加！');</script>";
		}
        echo "<script>location=location;</script>";
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }
    $isShow = 'T';
    $bigtype = $adminDB->executeSQL("select id, typename from tb_types_work where id='" . $id . "'", $connID);
    $smarty->assign('bigtype', $bigtype);
}
$smarty->assign('isShow', $isShow);
//
$bigtypes = $adminDB->executeSQL("select id, typename, addtime,pid from tb_types_work  order by addtime", $connID);
$arr = array();
for ($i = 0; $i < count($bigtypes); $i ++) {
    $arr[$i] = array(
        'id'         => $bigtypes[$i]['id'],
        'parentid'  => $bigtypes[$i]['pid'],
        'name'       => $bigtypes[$i]['typename'],
        'addtime'    => $bigtypes[$i]['addtime'],
    );
}
$upid = 0;
if(isset($_GET['pid']) && $_GET['pid'] != ''){
    $upid = $_GET['pid'];
}
$tree = new Tree();
$tree->tree($arr);

$typeArr = $tree->getArray();
$displayType = $tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>",$upid);

$smarty->assign('displayType',$displayType);
$smarty->assign('typeArr',$typeArr);
$smarty->assign('bigtypes', $bigtypes);
$smarty->display('alistbigtype.phtml');
// get all the child note
function getChildrenIds($sid){
    global $adminDB;
    global $connID;
    $ids = '';
    $sql = "select * from tb_types_work where pid='".$sid."'";
    if($types = $adminDB->executeSQL($sql,$connID)){
        foreach($types as $type){
            $ids .= ','.$type['id'];
            $ids .= getChildrenIds($type['id']);
        }
    }
    return $ids;
}
