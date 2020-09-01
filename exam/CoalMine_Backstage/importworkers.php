<?php
require_once 'lzh.inc.php';
require_once 'reader.php';
require_once 'checkLogin.php';
require_once 'Tools.php';

$bigtypes = $adminDB->executeSQL("select id, typename, addtime,pid from tb_types_work  order by addtime", $connID);
$arr = array();
for ($i = 0; $i < count($bigtypes); $i ++) {
    $arr[$i] = array(
        'id'      => $bigtypes[$i]['id'],
        'parentid'=> $bigtypes[$i]['pid'],
        'name'    => $bigtypes[$i]['typename'],
    );
}
$tree = new Tree();
$tree->tree($arr);
$typeArr = $tree->getArray();
foreach($typeArr as $k=>$t){
    $typeArr[$k]['addtime'] = $brr[$t['id']];

}
$displayType = $tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>",$upid);
$smarty->assign('displayType',$displayType);

if (isset($_FILES["importfile"]["name"]) && $_FILES["importfile"]["name"] != '') {
    $dir = "./upfiles/import/workers";
    if (! is_dir($dir)) {
        mkdir($dir);
    }
    $upfilename = $_FILES['importfile']['name'];
    $filename = date("YmdHis") . mt_rand(1000, 9999) . substr($upfilename, strpos($upfilename, "."), strlen($upfilename) - strpos($upfilename, "."));
    $address = $dir . "/" . $filename;
    if(!@move_uploaded_file($_FILES['importfile']['tmp_name'],$address)){
        echo "<script>alert('上传文件失败！');</script>";
    }else{
        handleExcel($address);
    }
}
//function importworkers($filename){
//    global $smarty;
//    global $adminDB;
//    global $connID;
//    $handle = fopen($filename,"r");
//    $failed = false;
//    $count = 0;
//    $errornames = array();
//    while($data = fgetcsv($handle,1000,";")){
//        $count++;
//        if($count == 1) continue;
//
//        $name = convertStr($data[0]);
//        $certNo = convertStr($data[1]);
//        $password = convertStr($data[2]);
//        $typeId = convertStr($data[3]);
//        $post = convertStr($data[4]);
//        $unit = convertStr($data[5]);
//        $permission = convertStr($data[6]);
//        $address = convertStr($data[7]);
//        $tel = convertStr($data[8]);
//        $admission = convertStr($data[9]);
//        if (! $adminDB->executeSQL("select id, ID_number from tb_user where ID_number='" . $certNo . "'", $connID)) {
//            if (! $adminDB->executeSQL("insert into tb_user(name,ID_number,password, typework, post, simulation, assessment, unit, permissions, address,tel ,freeze,dates,admission) values('" . $name . "', '".$certNo."', '" . md5($password) . "', '".$typeId."', '" . $post . "' , 'null', 'null', '".$unit."','".$permission."', '" . $address . "', '" . $tel . "','0','".date("Y-m-d")."','$admission')", $connID)) {
//                $failed = true;
//            }
//        }else{
//            $errornames[] = $name;
//            $failed = true;
//        }
//        $count++;
//    }
//    if(!$failed){
//        echo "<script>alert('员工信息导入成功！');window.location.href='aeditbccdserver.php';</script>";
//    }else{
//        $namesstr = implode(',',$errornames);
//        $errormessage = $namesstr."的信息导入失败,系统里已有相同身份证号的员工存在!";
//        $smarty->assign('errormessage',  $errormessage);
//        echo "<script>alert('员工信息没有全部导入成功！');</script>";
//    }
//}
function convertStr($str){
    $str = iconv("gb2312","utf-8",$str);
    return $str;
}
function handleExcel($filename){
    global $smarty;
    global $adminDB;
    global $connID;
    $failed = false;
    $data = new Spreadsheet_Excel_Reader();
    // Set output Encoding.
    $data->setOutputEncoding('gbk');
//”data.xls”是指要导入到mysql中的excel文件
    $data->read($filename);
    for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {  //以下注释的for循环打印excel表数据
        if($i == 1) continue;

        $name =  convertStr($data->sheets[0]['cells'][$i][1]);
        $certNo = $data->sheets[0]['cells'][$i][2];
        $post =  convertStr($data->sheets[0]['cells'][$i][3]);
        $unit =  convertStr($data->sheets[0]['cells'][$i][4]);
        $permission = $data->sheets[0]['cells'][$i][5];
        $address =  convertStr($data->sheets[0]['cells'][$i][6]);
        $tel =  $data->sheets[0]['cells'][$i][7];
        $admission1 =  $data->sheets[0]['cells'][$i][8];
        $typeId = $_POST['pro_class'];
        if (! $adminDB->executeSQL("select id, ID_number from tb_user where ID_number='" . $certNo . "'", $connID)) {
            if (! $adminDB->executeSQL("insert into tb_user(name,ID_number,password, typework, post, simulation, assessment, unit, permissions, address,tel ,freeze,dates,admission) values('" . $name . "', '".$certNo."', '" . md5('000000') . "', '".$typeId."', '" . $post . "' , 'null', 'null', '".$unit."','".$permission."', '" . $address . "', '" . $tel . "','0','".date("Y-m-d")."','$admission1')", $connID)) {
                $failed = true;
            }
        }else{
            $errornames[] = $name;
            $failed = true;
        }
    }
    if(!$failed){
        echo "<script>alert('员工信息导入成功！');window.location.href='aeditbccdserver.php?big_type=员工花名册管理 & small_type=浏览员工信息';</script>";
    }else{
        $namesstr = implode(',',$errornames);
        $errormessage = $namesstr."的信息导入失败,系统里已有相同身份证号的员工存在!";
        $smarty->assign('errormessage',  $errormessage);
        echo "<script>alert('员工信息没有全部导入成功！');</script>";
    }
    @unlink($filename);
}

$smarty->display('importworkers.phtml');