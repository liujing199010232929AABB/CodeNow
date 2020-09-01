<?php
session_start();					//初始化SESSION
date_default_timezone_set("utc");	//设置当前时间的时区
$ti=time();							//获取当前时间戳
$tem=$_SESSION['over_exam']-$ti;	//计算剩余时间戳

$dayst = 3600*24;
$cday = floor(($_SESSION['over_exam']-$ti)/$dayst);
if($cday == 0){
    echo "剩余时间：". date("H:i:s",$tem);
}else{
    echo "剩余时间：";
    echo "<br>";
    echo $cday."天".date("H",$tem)."小时".date("i",$tem)."分".date("s",$tem)."秒";
}
?>