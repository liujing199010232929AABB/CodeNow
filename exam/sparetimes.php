<?php
session_start();					//初始化SESSION
date_default_timezone_set("utc");	//设置当前时间的时区
$ti=time();							//获取当前时间戳
$tem=$ti-$_SESSION['start_time'];	//计算剩余时间戳
$array=date("H:i:s",$tem);
$dayst = 3600*24;
$cday = floor(($ti-$_SESSION['start_time'])/$dayst);
if($cday == 0){
    echo "计时：". $array;
}else{
    echo "计时：";
    echo $cday."天".date("H",$tem)."小时".date("i",$tem)."分".date("s",$tem)."秒";
}
?>