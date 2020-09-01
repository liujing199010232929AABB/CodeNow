<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'Tree.php';
require_once 'checkLogin.php';


$sid = isset($_GET['id'])?intval($_GET['id']):0;
if (isset($_GET['f']) && $_GET['f'] == 'del') {
    $sids = $sid;
    $childrenIds = getChildrenIds($sid);
    if(!empty($childrenIds)){
        $sids.=$childrenIds;
    }
    $sql = "delete from tb_exam_type where id in(".$sids.")";
    if($adminDB->executeSQL($sql,$connID)){
        echo "<script>alert('题型删除成功！');</script>";
    }else{
        echo "<script>alert('题型删除失败！');</script>";
    }
//    if (! $adminDB->executeSQL("delete from tb_types_work where id='" . $_GET['id'] . "'", $connID)) {
//		echo "<script>alert('类别删除失败！');</script>";
//    }else{
//		if($adminDB->executeSQL("select id, typename from tb_types_work where pid='" . $_GET['id'] . "' ", $connID)){
//			$del=$adminDB->executeSQL("delete from tb_types_work where pid='" . $_GET['id'] . "'", $connID);
//		}
//		echo "<script>alert('类别删除成功！');</script>";
//	}
}
$isShow = 'F';
if(isset($_GET['pid']) && $_GET['pid'] != ''){
    $pid = $_GET['pid'];
}else{
    $pid = 0;
}
if ((isset($_GET['f']) && $_GET['f'] == 'edit') || (isset($_POST['f']) && $_POST['f'] == 'edit')) {
    if (isset($_POST['f']) && $_POST['f'] == 'edit') {
  		if (! $adminDB->executeSQL("select id, chinese from tb_exam_type where english='".$_POST['english']."' and chinese='" . trim($_POST['chinese']) . "'", $connID)) {

        	if (! $adminDB->executeSQL("update tb_exam_type set chinese='" . $_POST['chinese'] . "',english='".$_POST['english'] . "', addtime='".date("Y-m-d")."',pid=".$_POST['protype']."  where id='" . $_POST['id'] . "'", $connID)) {
            	echo "<script>alert('题型更改失败！');</script>";
        	} else {
            	echo "<script>alert('题型更改成功！');</script>";
        	}
		}else{
			  echo "<script>alert('该题型已经添加！');</script>";
		}
        echo "<script>location=location</script>";
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }
    $isShow = 'T';
    $examtype = $adminDB->executeSQL("select * from tb_exam_type where id='" . $id . "'", $connID);
    $smarty->assign('examtype', $examtype);
}
$smarty->assign('isShow', $isShow);
//
$bigtypes = $adminDB->executeSQL("select * from tb_exam_type  order by addtime", $connID);
for ($i = 0; $i < count($bigtypes); $i ++) {
    $arr[$i] = array(
        'id'      => $bigtypes[$i]['id'],
        'parentid'=> $bigtypes[$i]['pid'],
        'name'    => $bigtypes[$i]['chinese'],
        'english'=>$bigtypes[$i]['english'],
        'addtime'=>$bigtypes[$i]['addtime']
    );
}
$upid = 0;
if(isset($_GET['pid']) && $_GET['pid'] != ''){
    $upid = $_GET['pid'];
}
$tools = new Tools();
$tree = new Tree();
$tree->tree($arr);
$typeArr = $tree->getArray();
$upid = 0;
if(isset($_GET['pid']) && $_GET['pid'] != ''){
    $upid = $_GET['pid'];
}
$displayExamType = $tools->getExamType($bigtypes,'id',$pid);

$smarty->assign('tb_exam_type',  $displayExamType);

//$bigtypes = $adminDB->executeSQL("select id, typename, addtime from tb_types_work  order by addtime", $connID);
$smarty->assign('bigtypes', $bigtypes);
$smarty->assign('typeArr',$typeArr);
$smarty->display('manageexamtypes.phtml');
// get all the child note
function getChildrenIds($sid){
    global $adminDB;
    global $connID;
    $ids = '';
    $sql = "select * from tb_exam_type where pid='".$sid."'";
    if($types = $adminDB->executeSQL($sql,$connID)){
        foreach($types as $type){
            $ids .= ','.$type['id'];
            $ids .= getChildrenIds($type['id']);
        }
    }
    return $ids;
}