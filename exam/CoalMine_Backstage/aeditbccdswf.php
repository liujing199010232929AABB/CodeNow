<?php
require_once 'lzh.inc.php';
require_once 'Tools.php';
require_once 'checkLogin.php';

//
//输出工种到下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id, typename,pid,addtime from tb_types_work  order by addtime", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['typename'];
}
$smarty->assign('arrayBccdnames1', $bccdNames);
$tid = 0;
$tools = new Tools();
$displayType = $tools->getWorktype($bccdNames);
$smarty->assign('displayType',$displayType);

//

$degreeArr = array();
$degree = $adminDB->executeSQL("select * from tb_degree  order by id", $connID);

if(count($degree)){
    foreach($degree as $d){
        $degreeArr[$d['id']] = $d['name'];
    }
}
$smarty->assign('degreeArr',  $degreeArr);

$tb_exam_type = array();
$examNames = $adminDB->executeSQL("select id, chinese,english,pid,addtime from tb_exam_type  order by addtime", $connID);


//

//执行数据的更新操作
if (isset($_POST['pro_class']) && $_POST['pro_class'] != '') {
	$bcjyzid = $_POST['bcjyzid'];
	if(isset($_POST['search_list']) && $_POST['search_list']!=""){
		$search_list=$_POST['search_list'];
	}else{
		$search_list=0;
	}
    if (isset($_FILES["sound"]["name"]) && $_FILES["sound"]["name"] != '') {
        $dir = "./upfiles/sounds";
        if (! is_dir($dir)) {
            mkdir($dir);
        }
        $upfilename = $_FILES["sound"]["name"];
        $soundname = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strpos($upfilename, "."), strlen($upfilename) - strpos($upfilename, "."));
        $address = $dir . "/" . $soundname;
        @move_uploaded_file($_FILES["sound"]["tmp_name"], $address);
        if ($adminDB->executeSQL("update tb_exam_problem set content='".$_POST['content']."', search_list='".$search_list."', answer='".$_POST['answer']."', fraction='".$_POST['fraction']."' , pro_type='".$_POST['pro_type']."', pro_class='".$_POST['pro_class']."', upload_date='". date("Y-m-d ")."', resolve='".$_POST['resolve']."',isactive='".$_POST['isactive']."', degreeid=".$_POST['degree'].",sound='".$address."',mustknown=".$_POST['mustknow']." where  id='".$bcjyzid."'", $connID)) {
			$page=isset($_GET['page'])?$_GET['page']:1;
			$pro_type=isset($_GET['pro_type'])?$_GET['pro_type']:"";
            echo "<script>alert('试题更改成功！');window.location.href='alookbccdswf.php?page=".$page."&pro_type=".$pro_type."&big_type=".$_GET['big_type']."&small_type=".$_GET['small_type']."';</script>";
        } else {
            echo '<script>alert("试题更改失败！")</script>';
        }
    }else{
        if ($adminDB->executeSQL("update tb_exam_problem set content='".$_POST['content']."', search_list='".$search_list."', answer='".$_POST['answer']."', fraction='".$_POST['fraction']."' , pro_type='".$_POST['pro_type']."', pro_class='".$_POST['pro_class']."', upload_date='". date("Y-m-d ")."', resolve='".$_POST['resolve']."',isactive='".$_POST['isactive']."', degreeid=".$_POST['degree'].",mustknown=".$_POST['mustknow']." where  id='".$bcjyzid."'", $connID)) {
			$page=isset($_GET['page'])?$_GET['page']:1;
			$pro_type=isset($_GET['pro_type'])?$_GET['pro_type']:"";
            echo "<script>alert('试题更改成功！');window.location.href='alookbccdswf.php?page=".$page."&pro_type=".$pro_type."&big_type=".$_GET['big_type']."&small_type=".$_GET['small_type']."';</script>";
        } else {
            echo '<script>alert("试题更改失败！")</script>';
        }
    }
}
//
if (isset($_GET['edit']) && $_GET['edit'] == 't') {
    $bcjyz = $adminDB->executeSQL("select * from tb_exam_problem where id='" . $_GET['id'] . "'", $connID);
    $type = $bcjyz[0]['pro_type'];
    $tidArr = $adminDB->executeSQL("select id from tb_exam_type where english='".$type."'",$connID);
    $tid = $tidArr[0][0];
    $smarty->assign('bcjyz', $bcjyz);
    $smarty->assign('edit', 't');
    $smarty->assign('q', $_GET['q']);
}
$displayExamType = $tools->getExamType($examNames,'en',$tid);
$smarty->assign('tb_exam_type',  $displayExamType);

$smarty->display('aeditbccdswf.phtml');