<?php
require_once 'lzh.inc.php';
include ("library/src/jpgraph.php");
include ("library/src/jpgraph_pie.php");
include ("library/src/jpgraph_pie3d.php");
require_once 'checkLogin.php';

$sql = "select ea.totalscore,ea.passscore from tb_examination_user me,tb_user u ,tb_examination tm,tb_problemtemplate tt,tb_examattribute ea where u.id=me.nameid and tm.id=me.examination_id and tm.templateid=tt.id and tt.emattrid=ea.id and examination_id=".$_GET['examination_id'];
$attributeArr = $adminDB->executeSQL($sql,$connID);
$fraction = $attributeArr[0]['totalscore'];
$passscore = $attributeArr[0]['passscore'];
$tb_exam = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_GET['examination_id']."' ", $connID);					//从数据库中查询出考题数据
$zong=$tb_exam[0][0][0];
$tb_exam0 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_GET['examination_id']."' and fraction>=".(0.9*$fraction), $connID);					//从数据库中查询出考题数据
$you=$tb_exam0[0][0][0];

$tb_exam1 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_GET['examination_id']."' and fraction>=".(0.8*$fraction)." and fraction<".(0.9*$fraction), $connID);					//从数据库中查询出考题数据
$liang=$tb_exam1[0][0][0];

$tb_exam2 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_GET['examination_id']."' and fraction>=".(0.7*$fraction)." and fraction<".(0.8*$fraction), $connID);					//从数据库中查询出考题数据
$yiban=$tb_exam2[0][0][0];

$tb_exam3 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_GET['examination_id']."' and fraction>=".$passscore." and fraction<".(0.7*$fraction), $connID);					//从数据库中查询出考题数据
$cha=$tb_exam3[0][0][0];

$tb_exam4 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_GET['examination_id']."' and fraction<".$passscore, $connID);					//从数据库中查询出考题数据
$no=$tb_exam4[0][0][0];



$data=array();
$data[]=number_format($you/$zong, 2);
$data[]=number_format($liang/$zong, 2);
$data[]=number_format($yiban/$zong, 2);
$data[]=number_format($cha/$zong, 2);
$data[]=number_format($no/$zong, 2);


$graph = new PieGraph(850,650,"auto");			//创建图像
$graph->SetShadow();							//创建图像阴影


$graph->tabtitle->Set(iconv("utf-8","gb2312",'考试成绩合格率统计分析') );				//输出标题
$graph->tabtitle->SetFont(FF_SIMSUN, FS_BOLD,14);		//设置标题字体
$graph->title->SetColor("darkblue");				//定义标题颜色
$graph->legend->Pos(0.1,0.4);					//控制注释文字的位置
$graph->legend->SetFont(FF_SIMSUN, FS_BOLD,12);		//设置标题字体

$p1 = new PiePlot3d($data);				//创建图像
$p1->SetTheme("sand");					//控制图像颜色
$p1->SetCenter(0.4);					//设置图像位置
$p1->SetSize(0.4);					//设置图像大小
$p1->SetHeight(30);					//设置饼形图高度

$p1->SetAngle(45);						//设置图像倾斜角度

$p1->Explode(array(5,40,10,30,20));		//控制饼形图的分割

$p1->value->SetFont(FF_SIMSUN, FS_BOLD,12);		//设置字体

$p1->SetLegends(array(iconv("utf-8","gbk",'优'),iconv("utf-8","gb2312",'良'),iconv("utf-8","gb2312",'一般'),iconv("utf-8","gb2312",'差'),iconv("utf-8","gb2312",'不合格')));

$graph->Add($p1);		//添加数据
$graph->Stroke();		//生成图像