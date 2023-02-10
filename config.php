<?php

session_start();

$base_url = 'http://localhost/dev-society';
$db_name = 'dev-society';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';


$pdo = new PDO(
    "mysql:dbname=".$db_name."; host=".$db_host, 
    $db_user, 
    $db_password
);


