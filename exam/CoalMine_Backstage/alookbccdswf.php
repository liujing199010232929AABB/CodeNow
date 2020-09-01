<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';
require_once 'Tools.php';
require_once 'Tree.php';

if (isset($_GET['delete']) && $_GET['delete'] == 't') {
    if ($adminDB->executeSQL("delete from tb_exam_problem where id='" . $_GET['id'] . "'", $connID)) {
        echo '<script>alert("试题删除成功！")</script>';
    } else {
        echo '<script>alert("试题删除失败！")</script>';
    }
}
//查询工种
$bccdNames = $adminDB->executeSQL("select id, typename from tb_types_work  order by addtime desc", $connID);
$smarty->assign('bccdNames', $bccdNames);
//查询生成的试卷，根据传递的ID值。


if (! isset($_GET['page']) || $_GET['page'] == '') {
    $page = '1';
} else {
    $page = $_GET['page'];
}
if (! isset($_GET['pro_type']) || $_GET['pro_type'] == '') {
    $pro_type = 'radio';
} else {
    $pro_type = $_GET['pro_type'];
}

if(isset($_GET['pid']) && $_GET['pid'] != ''){
    $pid = $_GET['pid'];
}else{
    $pid = 0;
}

if($pro_type=='radio'){
    $radioTypeIdArr = $adminDB->executeSQL("select id,chinese,english from tb_exam_type  where english='radio'", $connID);
    $radioTypeId = $radioTypeIdArr[0]['id'];
    $radioTitle = $radioTypeIdArr[0]['chinese'];
    $radioType =  $radioTypeIdArr[0]['english'];
    $bigtypes = $adminDB->executeSQL("select * from tb_exam_type  where pid=".$radioTypeId." order by addtime", $connID);
    for ($i = 0; $i < count($bigtypes); $i ++) {
        $arr[$i] = array(
            'id'        => $bigtypes[$i]['id'],
            'parentid' => $bigtypes[$i]['pid'],
            'name'     => $bigtypes[$i]['chinese'],
            'english'  =>$bigtypes[$i]['english'],
            'addtime'  =>$bigtypes[$i]['addtime']
        );
    }
    $tree = new Tree();
    $tree->tree($arr);
    $radioTypeArr = $tree->getArray($radioTypeId);

    $smarty->assign('radioTypeArr',$radioTypeArr);
    if(isset($_GET['radio_type']) && $_GET['radio_type'] != '' && $_GET['radio_type']!='radio'){
        $arrayRadio = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$_GET['radio_type']."' order by id desc", $connID, 20, $page, 10);
        $radioType = $arrayRadio['data'][0]['pro_type'];
        $radioTitle = $bigtypes[0]['chinese'];
    }else{
        $arrayRadio = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$pro_type."' order by id desc", $connID, 20, $page, 10);
    }
    $radioFraction = $arrayRadio['data'][0]['fraction'];
    $smarty->assign('radioFraction',$radioFraction);
    $smarty->assign('radioTitle',$radioTitle);
    $smarty->assign('radioType',$radioType);
    $smarty->assign('Radio', "T");								//判断如果存在单选题则为其赋值为T
	$smarty->assign('arrayRadio', $arrayRadio);               //将查询到的单选题数组赋给指定的模板变量
}


if($pro_type=='checkbox'){
    $checkboxTypeIdArr = $adminDB->executeSQL("select id,chinese,english from tb_exam_type  where english='checkbox'", $connID);
    $checkboxTypeId = $checkboxTypeIdArr[0]['id'];
    $checkboxTitle = $checkboxTypeIdArr[0]['chinese'];
    $checkboxType =  $checkboxTypeIdArr[0]['english'];
    $bigtypes = $adminDB->executeSQL("select * from tb_exam_type  where pid=".$checkboxTypeId." order by addtime", $connID);
    for ($i = 0; $i < count($bigtypes); $i ++) {
        $arr[$i] = array(
            'id'        => $bigtypes[$i]['id'],
            'parentid' => $bigtypes[$i]['pid'],
            'name'     => $bigtypes[$i]['chinese'],
            'english'  =>$bigtypes[$i]['english'],
            'addtime'  =>$bigtypes[$i]['addtime']
        );
    }
    $tree = new Tree();
    $tree->tree($arr);
    $checkboxTypeArr = $tree->getArray($checkboxTypeId);
    $smarty->assign('checkboxTypeArr',$checkboxTypeArr);
    if(isset($_GET['checkbox_type']) && $_GET['checkbox_type'] != '' && $_GET['checkbox_type']!='checkbox'){
        $arrayCheckbox = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$_GET['checkbox_type']."' order by id desc", $connID, 20, $page, 10);
        $checkboxType = $arrayCheckbox['data'][0]['pro_type'];
        $checkboxTitle = $bigtypes[0]['chinese'];
    }else{
        $arrayCheckbox = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$pro_type."' order by id desc", $connID, 20, $page, 10);
    }
    $checkboxFraction = $arrayCheckbox['data'][0]['fraction'];
    $smarty->assign('checkboxFraction',$checkboxFraction);
    $smarty->assign('checkboxTitle',$checkboxTitle);
    $smarty->assign('checkboxType',$checkboxType);
	$smarty->assign('Checkbox', "T");
	$smarty->assign('arrayCheckbox', $arrayCheckbox);
}

if($pro_type=='fill'){
    $fillTypeIdArr = $adminDB->executeSQL("select id,chinese,english from tb_exam_type  where english='fill'", $connID);
    $fillTypeId = $fillTypeIdArr[0]['id'];
    $fillTitle = $fillTypeIdArr[0]['chinese'];
    $fillType =  $fillTypeIdArr[0]['english'];
    $bigtypes = $adminDB->executeSQL("select * from tb_exam_type  where pid=".$fillTypeId." order by addtime", $connID);
    for ($i = 0; $i < count($bigtypes); $i ++) {
        $arr[$i] = array(
            'id'        => $bigtypes[$i]['id'],
            'parentid' => $bigtypes[$i]['pid'],
            'name'     => $bigtypes[$i]['chinese'],
            'english'  =>$bigtypes[$i]['english'],
            'addtime'  =>$bigtypes[$i]['addtime']
        );
    }
    $tree = new Tree();
    $tree->tree($arr);
    $fillTypeArr = $tree->getArray($fillTypeId);
    $smarty->assign('fillTypeArr',$fillTypeArr);
    if(isset($_GET['fill_type']) && $_GET['fill_type'] != '' && $_GET['fill_type']!='fill'){
        $arrayFill = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$_GET['fill_type']."' order by id desc", $connID, 20, $page, 10);
        $fillType = $arrayFill['data'][0]['pro_type'];
        $fillTitle = $bigtypes[0]['chinese'];
    }else{
        $arrayFill = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$pro_type."' order by id desc", $connID, 20, $page, 10);
    }
    $fillFraction = $arrayFill['data'][0]['fraction'];
    $smarty->assign('fillFraction',$fillFraction);
    $smarty->assign('fillTitle',$fillTitle);
    $smarty->assign('fillType',$fillType);
    $smarty->assign('Fill', "T");
    $smarty->assign('arrayFill', $arrayFill);
}

if($pro_type=='judgment'){
    $judgmentTypeIdArr = $adminDB->executeSQL("select id,chinese,english from tb_exam_type  where english='judgment'", $connID);
    $judgmentTypeId = $judgmentTypeIdArr[0]['id'];
    $judgmentTitle = $judgmentTypeIdArr[0]['chinese'];
    $judgmentType =  $judgmentTypeIdArr[0]['english'];
    $bigtypes = $adminDB->executeSQL("select * from tb_exam_type  where pid=".$judgmentTypeId." order by addtime", $connID);
    for ($i = 0; $i < count($bigtypes); $i ++) {
        $arr[$i] = array(
            'id'        => $bigtypes[$i]['id'],
            'parentid' => $bigtypes[$i]['pid'],
            'name'     => $bigtypes[$i]['chinese'],
            'english'  =>$bigtypes[$i]['english'],
            'addtime'  =>$bigtypes[$i]['addtime']
        );
    }
    $tree = new Tree();
    $tree->tree($arr);
    $judgmentTypeArr = $tree->getArray($judgmentTypeId);
    $smarty->assign('judgmentTypeArr',$judgmentTypeArr);
    if(isset($_GET['judgment_type']) && $_GET['judgment_type'] != ''&& $_GET['judgment_type']!='judgment'){
        $arrayJudgment = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$_GET['judgment_type']."' order by id desc", $connID, 20, $page, 10);
        $judgmentType = $arrayJudgment['data'][0]['pro_type'];
        $judgmentTitle = $bigtypes[0]['chinese'];
    }else{
        $arrayJudgment = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$pro_type."' order by id desc", $connID, 20, $page, 10);
    }
    $judgmentFraction = $arrayJudgment['data'][0]['fraction'];
    $smarty->assign('judgmentFraction',$judgmentFraction);
    $smarty->assign('judgmentTitle',$judgmentTitle);
    $smarty->assign('judgmentType',$judgmentType);
    $smarty->assign('Judgment', "T");
    $smarty->assign('arrayJudgment', $arrayJudgment);
}

/*if($pro_type=='explain'){
    $explainTypeIdArr = $adminDB->executeSQL("select id,chinese,english from tb_exam_type  where english='explain'", $connID);
    $explainTypeId = $explainTypeIdArr[0]['id'];
    $explainTitle = $explainTypeIdArr[0]['chinese'];
    $explainType =  $explainTypeIdArr[0]['english'];
    $bigtypes = $adminDB->executeSQL("select * from tb_exam_type  where pid=".$explainTypeId." order by addtime", $connID);
    for ($i = 0; $i < count($bigtypes); $i ++) {
        $arr[$i] = array(
            'id'        => $bigtypes[$i]['id'],
            'parentid' => $bigtypes[$i]['pid'],
            'name'     => $bigtypes[$i]['chinese'],
            'english'  =>$bigtypes[$i]['english'],
            'addtime'  =>$bigtypes[$i]['addtime']
        );
    }
    $tree = new Tree();
    $tree->tree($arr);
    $explainTypeArr = $tree->getArray($explainTypeId);
    $smarty->assign('explainTypeArr',$explainTypeArr);
    if(isset($_GET['explain_type']) && $_GET['explain_type'] != ''&& $_GET['explain_type']!='explain'){
        $arrayExplain = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$_GET['explain_type']."' order by id desc", $connID, 20, $page, 10);
        $explainType = $arrayExplain['data'][0]['pro_type'];
    }else{
        $arrayExplain = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$pro_type."' order by id desc", $connID, 20, $page, 10);
    }
    $explainFraction = $arrayExplain['data'][0]['fraction'];
    $smarty->assign('explainFraction',$explainFraction);
    $smarty->assign('explainType',$explainType);
    $smarty->assign('Explain', "T");
    $smarty->assign('arrayExplain', $arrayExplain);
}

if($pro_type=='answer'){
    $answerTypeIdArr = $adminDB->executeSQL("select id,chinese,english from tb_exam_type  where english='answer'", $connID);
    $answerTypeId = $answerTypeIdArr[0]['id'];
    $answerTitle = $answerTypeIdArr[0]['chinese'];
    $answerType =  $answerTypeIdArr[0]['english'];
    $bigtypes = $adminDB->executeSQL("select * from tb_exam_type  where pid=".$answerTypeId." order by addtime", $connID);
    for ($i = 0; $i < count($bigtypes); $i ++) {
        $arr[$i] = array(
            'id'        => $bigtypes[$i]['id'],
            'parentid' => $bigtypes[$i]['pid'],
            'name'     => $bigtypes[$i]['chinese'],
            'english'  =>$bigtypes[$i]['english'],
            'addtime'  =>$bigtypes[$i]['addtime']
        );
    }
    $tree = new Tree();
    $tree->tree($arr);
    $answerTypeArr = $tree->getArray($answerTypeId);
    $smarty->assign('answerTypeArr',$answerTypeArr);
    if(isset($_GET['answer_type']) && $_GET['answer_type'] != ''&& $_GET['answer_type']!='answer'){
        $arrayAnswer = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$_GET['answer_type']."' order by id desc", $connID, 20, $page, 10);
        $answerType = $arrayAnswer['data'][0]['pro_type'];
        $answerTitle = $bigtypes[0]['chinese'];
    }else{
        $arrayAnswer = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$pro_type."' order by id desc", $connID, 20, $page, 10);
    }
    $answerFraction = $arrayAnswer['data'][0]['fraction'];
    $smarty->assign('answerFraction',$answerFraction);
    $smarty->assign('answerTitle',$answerTitle);
    $smarty->assign('answerType',$answerType);
    $smarty->assign('Answer', "T");
    $smarty->assign('arrayAnswer', $arrayAnswer);
}

if($pro_type=='discourse'){
    $discourseTypeIdArr = $adminDB->executeSQL("select id,chinese,english from tb_exam_type  where english='discourse'", $connID);
    $discourseTypeId = $discourseTypeIdArr[0]['id'];
    $discourseTitle = $discourseTypeIdArr[0]['chinese'];
    $discourseType =  $discourseTypeIdArr[0]['english'];
    $bigtypes = $adminDB->executeSQL("select * from tb_exam_type  where pid=".$discourseTypeId." order by addtime", $connID);
    for ($i = 0; $i < count($bigtypes); $i ++) {
        $arr[$i] = array(
            'id'        => $bigtypes[$i]['id'],
            'parentid' => $bigtypes[$i]['pid'],
            'name'     => $bigtypes[$i]['chinese'],
            'english'  =>$bigtypes[$i]['english'],
            'addtime'  =>$bigtypes[$i]['addtime']
        );
    }
    $tree = new Tree();
    $tree->tree($arr);
    $discourseTypeArr = $tree->getArray($discourseTypeId);
    $smarty->assign('discourseTypeArr',$discourseTypeArr);
    if(isset($_GET['discourse_type']) && $_GET['discourse_type'] != ''&& $_GET['discourse_type']!='discourse'){
        $arrayDiscourse = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$_GET['discourse_type']."' order by id desc", $connID, 20, $page, 10);
        $discourseType = $arrayDiscourse['data'][0]['pro_type'];
        $discourseTitle = $bigtypes[0]['chinese'];
    }else{
        $arrayDiscourse = $pageDB->pageData("select * from tb_exam_problem where pro_type='".$pro_type."' order by id desc", $connID, 20, $page, 10);
    }
    $discourseFraction = $arrayDiscourse['data'][0]['fraction'];
    $smarty->assign('discourseFraction',$discourseFraction);
    $smarty->assign('discourseTitle',$discourseTitle);
    $smarty->assign('discourseType',$discourseType);
    $smarty->assign('Discourse', "T");
    $smarty->assign('arrayDiscourse', $arrayDiscourse);
}*/
//

$smarty->display('alookbccdswf.phtml');