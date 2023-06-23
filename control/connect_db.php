<?php


$connect = mysqli_connect('localhost', 'root','', 'web_php') or die("khong ket noi dc voi database");
mysqli_set_charset($connect,'utf8');
if($connect == false)
{
    die("Lỗi khong the ket noi".mysqli_connect_errno());
}