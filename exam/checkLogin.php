<?php
//session_start();
if(!(isset($_SESSION['name']) && $_SESSION['name']!="")){
    echo "<script>alert('请正确登录！'); window.location.href='index.php';</script>";
}