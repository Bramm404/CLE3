<?php

$user = "root";
$pass = "";
$db = "geldlift_db";
$host = "127.0.0.1";

mysqli_connect($host, $user, $pass, $db);

if(!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
