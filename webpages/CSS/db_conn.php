<?php

$sname = "localhost";
$uname = "root";
$Password = "";

$db_name = "test_db";

$conn = mysqli_connect($sname,$uname,$Password, $db_name);
if(!$conn){
    echo"Connection Failed";
}


