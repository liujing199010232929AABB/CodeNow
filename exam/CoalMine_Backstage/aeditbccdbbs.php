<?php
require_once 'lzh.inc.php';
require_once 'checkLogin.php';
include ("library/src/jpgraph.php");
include ("library/src/jpgraph_line.php");
include ("library/src/jpgraph_scatter.php");

//
$tb_exam = $adminDB->executeSQL("select * from tb_examination_user where examination_id='".$_GET['examination_id']."'", $connID);					//从数据库中查询出考题数据
$name=array();
if(count($tb_exam[0])){

    for($i=0; $i<count($tb_exam); $i++){
        $name[]=iconv("utf-8","gbk",$tb_exam[$i]['name']);
        $fraction[]=$tb_exam[$i]['fraction'];
    }

    $graph = new Graph(1000,475);					//定义图像大小
    $graph->SetMarginColor('white');				//背景颜色
    $graph->SetScale("textlin");					//定义刻度值类型
    $graph->SetFrame(false);
    $graph->SetMargin(30,5,35,20);					//设置边距

    $graph->title->Set(iconv("utf-8","gb2312","成绩统计分析"));		//定义标题
    $graph->title->SetFont(FF_SIMSUN, FS_BOLD,14);						//设置标题字体
    $graph->xgrid->Show();					//设置阴影

    $graph->xaxis->SetTickLabels($name);	//定义X轴上的数据
    $graph->xaxis->SetFont(FF_SIMSUN, FS_BOLD,8);						//设置标题字体
    $p1 = new LinePlot($fraction);				//创建图像
    $p1->SetColor("navy");						//设置图像颜色
    $p1->mark->SetType(MARK_IMG,'images/tree_root.gif',0.5);		//设置标签的样式，使用图片

    $p1->value->SetFormat('%d '.iconv("utf-8","gb2312",'分'));				//格式化数据
    $p1->value->Show();							//输出阴影
    $p1->value->SetColor('darkred');				//定义颜色
    $p1->value->SetFont(FF_SIMSUN, FS_BOLD,10);	//设置字体
    $p1->value->SetMargin(10);						//设置位置、字体大小
    $p1->SetCenter();
    $graph->Add($p1);					//添加数据
    $graph->Stroke();						//生成图像
}else{
    echo "<script>alert('没有该考试的记录！');window.opener=null;window.open('','_self');window.close();</script>";
}
?>
