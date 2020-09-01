<?php
require_once 'lzh.inc.php';
//输出考题下拉列表
$arrayBccdnames = array();
$bccdNames = $adminDB->executeSQL("select id,title, whether, dates from tb_examination order by id desc", $connID);
for ($i = 0; $i < count($bccdNames); $i ++) {
    $arrayBccdnames[$bccdNames[$i]['id']] = $bccdNames[$i]['title'];
}
$smarty->assign('arrayBccdnames', $arrayBccdnames);				//输出考题下拉列表

if(isset($_POST['admission']) && $_POST['admission']!="" ){		//完成对登录用户的判断
	$bccdNames = $adminDB->executeSQL("select * from tb_examination_user where admission='".$_POST['admission']."' and examination_id='".$_POST['select_exam']."' ", $connID);

	if ($bccdNames){
		$_SESSION['admission']=$_POST['admission'];		//定义登录用户准考证号
		$_SESSION['exam_id']=$_POST['select_exam'];		//定义登录用户选择的考试科目
		echo "<script> window.open('search_exam.php?id=".$bccdNames[0]['id']."'); window.close(); </script>";
	} else {
		echo "<script>alert('登录失败，请检查您填写的准考证号是否正确！'); window.location.href='search_examination.php'</script>";
	}
}
$smarty->display('search_examination.phtml');