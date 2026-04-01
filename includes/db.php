<?php

$user = "root";
$pass = "";
$database = "geldlift_db";
$host = "127.0.0.1";

$db = mysqli_connect($host, $user, $pass, $database);

if(!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
