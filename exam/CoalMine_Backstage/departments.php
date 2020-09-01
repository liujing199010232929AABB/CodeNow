<?php
/*require_once 'lzh.inc.php';
include ("library/src/jpgraph.php");
include ("library/src/jpgraph_pie.php");
include ("library/src/jpgraph_pie3d.php");

$datas=array();
$titles=array();
$tb_exams = $adminDB->executeSQL("select distinct pro_class from tb_examination_user ", $connID);					//从数据库中查询出考题数据

for($i=0; $i<count($tb_exams);$i++){
	$titles[]=iconv("utf-8","gbk",$tb_exams[$i]['pro_class']);
	$tb_exam = $adminDB->executeSQL("select count(*) from tb_examination_user where pro_class='".$tb_exams[$i]['pro_class']."' ", $connID);					//从数据库中查询出考题数据
	$zong=$tb_exam[0][0];
$tb_exam0 = $adminDB->executeSQL("select count(*) from tb_examination_user where pro_class='".$tb_exams[$i]['pro_class']."' and fraction>=90", $connID);					//从数据库中查询出考题数据
$you=$tb_exam0[0][0];
$tb_exam1 = $adminDB->executeSQL("select count(*) from tb_examination_user where pro_class='".$tb_exams[$i]['pro_class']."' and fraction>=80 and fraction<90", $connID);					//从数据库中查询出考题数据
$liang=$tb_exam1[0][0];

$tb_exam2 = $adminDB->executeSQL("select count(*) from tb_examination_user where pro_class='".$tb_exams[$i]['pro_class']."' and fraction>=70 and fraction<80", $connID);					//从数据库中查询出考题数据
$yiban=$tb_exam2[0][0];

$tb_exam3 = $adminDB->executeSQL("select count(*) from tb_examination_user where pro_class='".$tb_exams[$i]['pro_class']."' and fraction>=60 and fraction<70", $connID);					//从数据库中查询出考题数据
$cha=$tb_exam3[0][0];

$tb_exam4 = $adminDB->executeSQL("select count(*) from tb_examination_user where pro_class='".$tb_exams[$i]['pro_class']."' and fraction<60", $connID);					//从数据库中查询出考题数据
$no=$tb_exam4[0][0];
$data=array();
$data[]=number_format($you/$zong, 2);
$data[]=number_format($liang/$zong, 2);
$data[]=number_format($yiban/$zong, 2);
$data[]=number_format($cha/$zong, 2);
$data[]=number_format($no/$zong, 2);

$datas[]=$data;
}
print_r($datas);
for($m=0; $m<count($titles); $m++){
 	if($m<3){
   		$piepos[]=	0.15+0.3*$m;
		$piepos[]=	0.28;	
	}else if($m>=3 and $m<6){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15;	

	}else if($m>=6 and $m<9){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*2;	

	}else if($m>=9 and $m<12){
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*3;	

	}else if($m>=12 and $m<15){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*4;	

	}else if($m>=15 and $m<18){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*5;	

	}else if($m>=18 and $m<21){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*6;	

	}else if($m>=21 and $m<24){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*7;	

	}else if($m>=24 and $m<27){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*8;	

	}else if($m>=27 and $m<30){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*9;	

	}else if($m>=30 and $m<33){
		
	   	$piepos[]=	0.15+0.3*($m%3);
		$piepos[]=	0.28+0.15*10;	

	}

}
$n = count($piepos)/2;				//统计饼形图的个数
$graph = new PieGraph(950,850,'auto');		//创建图像

$graph->SetMargin(10,10,10,10);				//定义图像的边距
//$graph->SetMarginColor('navy');				//定义边距的颜色
$graph->SetShadow(false);

$graph->SetBackgroundImage('img/bg.jpg',BGIMG_FILLPLOT);	//添加背景图像

$graph->title->Set(iconv("utf-8","gb2312",'各部门通过率分析'));
$graph->title->SetFont(FF_SIMSUN, FS_BOLD,14);
//$graph->title->SetColor('white');

$p = array();					//定义空数组
for( $i=0; $i < $n; ++$i ) {		//根据饼形图的个数
    $d = "data$i";
    $p[] = new PiePlot3D($datas[$i]);	//创建3D饼形图
}

for( $i=0; $i < $n; ++$i ) {
    $p[$i]->SetCenter($piepos[2*$i],$piepos[2*$i+1]);	//定义饼形图的位置
}

for( $i=0; $i < $n; ++$i ) {				//循环输出饼形图的标题
    $p[$i]->title->Set($titles[$i]);			//输出标题
	
  //  $p[$i]->title->SetColor('white');			//定义颜色
    $p[$i]->title->SetFont(FF_SIMSUN, FS_BOLD,10);	//定义字体
}

for( $i=0; $i < $n; ++$i ) {					//循环读取饼形图的数据
    $p[$i]->value->SetFont(FF_SIMSUN, FS_BOLD,12);		//定义字体
 //   $p[$i]->value->SetColor('white');				//定义颜色
}
for( $i=0; $i < $n; ++$i ) {					//设置数据的输出阴影
    $p[$i]->value->Show();
}

for( $i=0; $i < $n; ++$i ) {						//定义输出数据的格式
    $p[$i]->value->SetFormat("%01.1f%%");				//数据的格式化
}
for( $i=0; $i < $n; ++$i ) {						//定义图像大小
    $p[$i]->SetSize(0.07);
}

for( $i=0; $i < $n; ++$i ) {					//定义分割的饼形图块
    $p[$i]->SetEdge(false);
    $p[$i]->ExplodeSlice(5);
}

$p[0]->SetLegends(array(iconv("utf-8","gbk",'优'),iconv("utf-8","gb2312",'良'),iconv("utf-8","gb2312",'一般'),iconv("utf-8","gb2312",'差'),iconv("utf-8","gb2312",'不合格')));		//定义注释内容
$graph->legend->Pos(0.03,0.03);					//定义注释的坐标
$graph->legend->SetFont(FF_SIMSUN, FS_BOLD,12);		//定义字体
$graph->legend->SetShadow(false);				

for( $i=0; $i < $n; ++$i ) {				//循环执行饼形图数据的添加操作
    $graph->Add($p[$i]);
}
$graph->Stroke();							//生成图像


require_once 'afooter.php';*/




require_once 'lzh.inc.php';
include ("library/src/jpgraph.php");
include ("library/src/jpgraph_pie.php");
include ("library/src/jpgraph_pie3d.php");
require_once 'checkLogin.php';

$datas=array();
$titles=array();
$worktypesArr = getWorktypes();
$sql = "select ea.totalscore,ea.passscore from tb_examination_user me,tb_user u ,tb_examination tm,tb_problemtemplate tt,tb_examattribute ea where u.id=me.nameid and tm.id=me.examination_id and tm.templateid=tt.id and tt.emattrid=ea.id and examination_id=".$_POST['examination_id'];
$attributeArr = $adminDB->executeSQL($sql,$connID);
$fraction = $attributeArr[0]['totalscore'];
$passscore = $attributeArr[0]['passscore'];
if(count($_POST['types'])<=9){
for($i=0; $i<count($_POST['types']);$i++){
	$titles[]=iconv("utf-8","gbk",$worktypesArr[$_POST['types'][$i]]);

	$tb_exam = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_POST['examination_id']."' and pro_class='".$_POST['types'][$i]."' ", $connID);					//从数据库中查询出考题数据
	$zong=$tb_exam[0][0];
	$tb_exam0 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_POST['examination_id']."' and pro_class='".$_POST['types'][$i]."' and fraction>=".(0.9*$fraction), $connID);
//从数据库中查询出考题数据
	$you=$tb_exam0[0][0];
	$tb_exam1 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_POST['examination_id']."' and pro_class='".$_POST['types'][$i]."' and fraction>=".(0.8*$fraction)." and fraction<".(0.9*$fraction), $connID);					//从数据库中查询出考题数据
	$liang=$tb_exam1[0][0];

	$tb_exam2 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_POST['examination_id']."' and pro_class='".$_POST['types'][$i]."' and fraction>=".(0.7*$fraction)." and fraction<".(0.8*$fraction), $connID);					//从数据库中查询出考题数据
	$yiban=$tb_exam2[0][0];

	$tb_exam3 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_POST['examination_id']."' and pro_class='".$_POST['types'][$i]."' and fraction>=".$passscore." and fraction<".(0.7*$fraction), $connID);					//从数据库中查询出考题数据
	$cha=$tb_exam3[0][0];

	$tb_exam4 = $adminDB->executeSQL("select count(*) from tb_examination_user where examination_id='".$_POST['examination_id']."' and pro_class='".$_POST['types'][$i]."' and fraction<".$passscore, $connID);									//从数据库中查询出考题数据
	$no=$tb_exam4[0][0];
	$data=array();

if($you!=0 and $zong!=0){
	$data[]=number_format($you/$zong, 2);
}else{
	$data[]="0.00";
}


if($liang!=0 and $zong!=0){
	$data[]=number_format($liang/$zong, 2);
}else{
	$data[]="0.00";
}


if($yiban!=0 and $zong!=0){
	$data[]=number_format($yiban/$zong, 2);
}else{
	$data[]="0.00";
}


if($cha!=0 and $zong!=0){
	$data[]=number_format($cha/$zong, 2);
}else{
	$data[]="0.00";
}


if($no!=0 and $zong!=0){
	$data[]=number_format($no/$zong, 2);


}else{
	$data[]="0.00";
}
$datas[]=$data;
}

for($m=0; $m<count($titles); $m++){
 	if($m<3){
   		$piepos[]=	0.17+0.33*$m;
		$piepos[]=	0.28;
	}else if($m>=3 and $m<6){
		
	   	$piepos[]=	0.17+0.33*($m%3);
		$piepos[]=	0.28+0.25;

	}else if($m>=6 and $m<9){
		
	   	$piepos[]=	0.17+0.33*($m%3);
		$piepos[]=	0.28+0.25*2;

	}else if($m>=9 and $m<12){
	   	$piepos[]=	0.17+0.33*($m%3);
		$piepos[]=	0.28+0.25*3;

	}
}
$n = count($piepos)/2;				//统计饼形图的个数
$graph = new PieGraph(950,750,'auto');		//创建图像

$graph->SetMargin(10,10,10,10);				//定义图像的边距
//$graph->SetMarginColor('navy');				//定义边距的颜色
$graph->SetShadow(false);

$graph->SetBackgroundImage('images/bg.jpg',BGIMG_FILLPLOT);	//添加背景图像

$graph->title->Set(iconv("utf-8","gb2312",'各部门通过率分析'));
$graph->title->SetFont(FF_SIMSUN, FS_BOLD,14);
//$graph->title->SetColor('white');

$p = array();					//定义空数组
for( $i=0; $i < $n; ++$i ) {		//根据饼形图的个数
    $d = "data$i";
    $p[] = new PiePlot3D($datas[$i]);	//创建3D饼形图
}

for( $i=0; $i < $n; ++$i ) {
    $p[$i]->SetCenter($piepos[2*$i],$piepos[2*$i+1]);	//定义饼形图的位置
}

for( $i=0; $i < $n; ++$i ) {				//循环输出饼形图的标题
    $p[$i]->title->Set($titles[$i]);			//输出标题
	
  //  $p[$i]->title->SetColor('white');			//定义颜色
    $p[$i]->title->SetFont(FF_SIMSUN, FS_BOLD,10);	//定义字体
}

for( $i=0; $i < $n; ++$i ) {					//循环读取饼形图的数据
    $p[$i]->value->SetFont(FF_SIMSUN, FS_BOLD,12);		//定义字体
 //   $p[$i]->value->SetColor('white');				//定义颜色
}
for( $i=0; $i < $n; ++$i ) {					//设置数据的输出阴影
    $p[$i]->value->Show();
}

for( $i=0; $i < $n; ++$i ) {						//定义输出数据的格式
    $p[$i]->value->SetFormat("%01.1f%%");				//数据的格式化
}
for( $i=0; $i < $n; ++$i ) {						//定义图像大小
    $p[$i]->SetSize(0.15);
}

for( $i=0; $i < $n; ++$i ) {					//定义分割的饼形图块
    $p[$i]->SetEdge(false);
    $p[$i]->ExplodeSlice(5);
}

$p[0]->SetLegends(array(iconv("utf-8","gbk",'优'),iconv("utf-8","gb2312",'良'),iconv("utf-8","gb2312",'一般'),iconv("utf-8","gb2312",'差'),iconv("utf-8","gb2312",'不合格')));		//定义注释内容
$graph->legend->Pos(0.03,0.03);					//定义注释的坐标
$graph->legend->SetFont(FF_SIMSUN, FS_BOLD,12);		//定义字体
$graph->legend->SetShadow(false);				

for( $i=0; $i < $n; ++$i ) {				//循环执行饼形图数据的添加操作
    $graph->Add($p[$i]);
}
$graph->Stroke();							//生成图像
}else{
	echo "<script>alert('每次查看的部门不能超过9个！'); window.history.back();</script>";
}
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