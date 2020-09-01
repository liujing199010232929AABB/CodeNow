<?php
require_once 'lzh.inc.php';
include ("library/src/jpgraph.php");
include ("library/src/jpgraph_bar.php");
require_once 'checkLogin.php';

//
$tb_exam = $adminDB->executeSQL("select * from tb_examination_user where examination_id='".$_POST['examination_id']."' and pro_class='".$_POST['pro_class']."' ", $connID);					//从数据库中查询出考题数据
$name=array();
for($i=0; $i<count($tb_exam); $i++){
	$name[]=iconv("utf-8","gbk",$tb_exam[$i]['name']);
	$fraction[]=$tb_exam[$i]['fraction'];
}



$width=750; 		//定义图像宽
$height=650;		//定义图像高

$graph = new Graph($width,$height,'auto');		//创建图像
$graph->SetScale("textlin");		//定义刻度值类型
$top = 80;
$bottom = 30;
$left = 80;
$right = 50;
$graph->Set90AndMargin($left,$right,$top,$bottom);		//设置图像的边距

$graph->SetShadow();		//输出阴影
$worktypeArr = getWorktypes();
$graph->title->Set(iconv("utf-8","gb2312",$worktypeArr[$_POST['pro_class']]." 考试成绩统计分析"));		//定义标题
$graph->title->SetFont(FF_SIMSUN, FS_BOLD,14);				//设置标题字体
$graph->xaxis->SetTickLabels($name);		//定义X轴上的数据

$graph->xaxis->SetFont(FF_SIMSUN, FS_BOLD,12);	//设置字体
$graph->xaxis->SetLabelAlign('right','center');		//设置Y轴上字体右侧居中

$graph->yaxis->scale->SetGrace(1);					//设置Y轴间距
$graph->yaxis->SetLabelAlign('center','bottom');	//设置X轴字体居中，底部对齐
$graph->yaxis->SetLabelAngle(45);					//设置字体的倾斜度
$graph->yaxis->SetLabelFormat('%d');				//输出数据的格式
$graph->yaxis->SetFont(FF_SIMSUN, FS_BOLD,12);	//设置字体

$bplot = new BarPlot($fraction);						//创建图像
$bplot->SetFillColor("orange");						//定义图像颜色
$bplot->SetShadow();								//设置图像阴影
$bplot->value->Show();								//设置数据阴影
$bplot->value->SetFont(FF_SIMSUN, FS_BOLD,12);		//设置数据字体
$bplot->value->SetAlign('left','center');			//设置数据位置
$bplot->value->SetColor("black","darkred");			//设置数据颜色
$bplot->value->SetFormat('%d');				//格式化数据
$graph->Add($bplot);							//添加数据
$graph->Stroke();								//生成图像
function getWorktypes(){
    global $adminDB;
    global $connID;
    $worktypeArr = array();
    $worktypes = $adminDB->executeSQL("select * from tb_types_work", $connID);
    foreach($worktypes as $worktype){
        $worktypeArr[$worktype['id']] = $worktype['typename'];
    }
    return $worktypeArr;
}