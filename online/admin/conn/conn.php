<?php
/*Ӧ��PDO�������ݿ�*/
$dbms = "mysql";
$host = "localhost";
$dbname = "db_online";
$user = "root";
$pwd = "root";
$dsn = "$dbms:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $user, $pwd);
$pdo->query("set names gb2312");
?>