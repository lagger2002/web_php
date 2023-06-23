<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'web_php';
//creating db
$connect = mysqli_connect($host, $username, $password, $database);
//checking 
if(!$connect)
{
    die("connect fail:".mysqli_connect_error());
}
else{
    echo'';
}

?>