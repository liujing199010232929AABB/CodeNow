<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';


$arrayBccdnames = array();		//完成类别的输出，输出到下拉列表
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);

for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['typename'];
}
$smarty->assign('arrayBccdnames1', $bccdNames);

$tools = new Tools();
$pid = 0;

//判断分页变量是否存在
if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}

$sql = "select ep.*,et.english,et.chinese from tb_exam_problem ep,tb_exam_type et where ep.pro_type=et.english";
$where = "";
    if(isset($_GET['id']) && $_GET['id']!="" ){			//如果提交ID值，则执行精确查询
        $where.= " and ep.id=".$_GET['id'];
        $smarty->assign('id', $_GET['id']);
    }
        //如果提交的是类别和内容则执行下面的查询
        if(isset($_GET['pro_type']) && $_GET['pro_type']!=""){
            $where.=" and pro_type='".$_GET['pro_type']."'";
            $smarty->assign('pro_type', $_GET['pro_type']);
        }
        if(isset($_GET['content']) && $_GET['content']!=""){
            $where.=" and content like'%".$_GET['content']."%'";
            $smarty->assign('content', $_GET['content']);
        }
        if(isset($_GET['pro_class']) && $_GET['pro_class']!=""){
            $where.=" and pro_class=".$_GET['pro_class'];
            $pid = $_GET['pro_class'];
            $smarty->assign('pro_class', $_GET['pro_class']);
        }
    $sql = $sql.$where;
    if(isset($_GET['inactive']) && $_GET['inactive'] != ""){
        $ids = implode(',',$_GET['isactive']);
        if($adminDB->executeSQL("update tb_exam_problem set isactive=0 where id in(".$ids.")", $connID)){
            echo "<script>alert('试题禁用成功！');</script>";
        }else{
            echo "<script>alert('试题禁用失败！');</script>";
        }
    }
    if(isset($_GET['active']) && $_GET['active'] != ""){
        $ids = implode(',',$_GET['isactive']);
        if($adminDB->executeSQL("update tb_exam_problem set isactive=1 where id in(".$ids.")", $connID)){
            echo "<script>alert('试题启用成功！');</script>";
        }else{
            echo "<script>alert('试题启用失败！');</script>";
        }
    }
    if(isset($_GET['deltogether']) && $_GET['deltogether'] != ""){
        $ids = implode(',',$_GET['isactive']);
        if($adminDB->executeSQL("delete from  tb_exam_problem where id in(".$ids.")", $connID)){
            echo "<script>alert('试题删除成功！');</script>";
        }else{
            echo "<script>alert('试题删除失败！');</script>";
        }
    }
    //如果不是执行查询操作，则判断超级链接是否提交了查询变量
    //如果查询变量sql存在，则根据超级链接传递的SQL执行查询操作，否则执行默认的查询语句
    if($where == ''){
        if(isset($_SESSION['back_permissions']) && $_SESSION['back_permissions'] == 1){
            $sql="select ep.*,et.english,et.chinese from tb_exam_problem ep,tb_exam_type et where ep.pro_type=et.english and ep.pro_class=".$_SESSION['back_pro_class']." order by ep.id desc ";
            $pid = $_SESSION['back_pro_class'];
        }elseif(isset($_SESSION['back_permissions']) && $_SESSION['back_permissions'] == 2){
            $listids = $tools->getTypeIds();
            $sql="select ep.*,et.english,et.chinese from tb_exam_problem ep,tb_exam_type et where ep.pro_type=et.english and ep.pro_class in(".$listids.") order by ep.id desc ";
        }else{
            $sql="select ep.*,et.english,et.chinese from tb_exam_problem ep,tb_exam_type et where ep.pro_type=et.english order by ep.id desc ";
        }
    }

$displayType = $tools->getWorktype($bccdNames,$pid);
$smarty->assign('displayType',$displayType);

$bcjyzs = $pageDB->pageData($sql, $connID, 20, $page, 10);
$smarty->assign('bcjyzs', $bcjyzs);
$smarty->display('afindbccdswf.phtml');