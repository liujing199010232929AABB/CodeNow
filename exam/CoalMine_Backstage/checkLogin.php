<?php
if(!(isset($_SESSION['user_id']) && $_SESSION['user_id']!="")){
    echo "<script>alert('请正确登录！'); window.location.href='index.php';</script>";
}