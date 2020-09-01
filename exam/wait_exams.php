<?php
require_once 'lzh.inc.php';
$bccdNames = $adminDB->executeSQL("select id,title, whether, start_exam, over_exam from tb_mockexaminations where whether=0 and id='".$_SESSION['exam_id']."' ", $connID);
if ($bccdNames) {
		$tim=time();
		$before_time=strtotime("-2100 seconds",strtotime($bccdNames[0]['start_exam']));		//设定进入考场的规定时间，开始前35分钟，可以登录。		
		$start_time=strtotime($bccdNames[0]['start_exam']);									//考试开始时间。		
		$after_time=strtotime("+900 seconds",strtotime($bccdNames[0]['start_exam']));		//设定进入考场的规定时间，开始15分钟后，不得在登录。
		$game_over=strtotime($bccdNames[0]['over_exam']);									//设定进入考场的规定时间，开始15分钟后，不得在登录。

    if($tim<$before_time){
        echo "<script>alert('考试系统未开通，请开通后在登录');window.close();</script>";
    }else if($tim > $start_time && $tim < $game_over ){	//判断考试的开始时间，如果当前时间与系统设定时间相同，则开始考试
        echo "<script> window.open('exams.php?examination_id=".$_SESSION['exam_id']."'); window.close(); </script>";
    }else if($tim > $game_over){
        echo "<script> alert('考试已经结束！'); window.close();	</script>";
    }

		$smarty->assign("before_time",strtotime("-2100 seconds",strtotime($bccdNames[0]['start_exam'])));	//设定进入考场的规定时间，开始前35分钟，可以登录。		
		$smarty->assign("start_time",strtotime($bccdNames[0]['start_exam']));								//考试开始时间。		
		$smarty->assign("after_time",strtotime("+900 seconds",strtotime($bccdNames[0]['start_exam'])));		//设定进入考场的规定时间，开始15分钟后，不得在登录。
		$smarty->assign("game_over",strtotime($bccdNames[0]['over_exam']));									//设定进入考场的规定时间，开始15分钟后，不得在登录。
		$smarty->display('wait_exams.phtml');
	
} else {
	echo "<script>alert('您选择的考试题不存在，请重新登录选择！');window.open('index.php'); window.close(); </script>";
}