<?php
$server_name = "localhost";
$server_user = "root";
$server_pass = "18054218";
$server_db = "web";

$link = mysqli_connect($server_name,$server_user,$server_pass,$server_db);

if (!$link) {
    die('Connect Error: ' . mysqli_connect_errno());
}

mysqli_query($link,"set names utf8");

?>
