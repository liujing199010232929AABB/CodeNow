<?php
session_start();
if(!isset($_SESSION['controller']))
	echo "<script>alert('您无权访问');location='../index.php';</script>";
if($_SERVER['HTTP_REFERER'] == "")
	echo "<script>alert('本系统不允许从地址栏访问');</script>";
	echo "<script>window.close();</script>";
?>