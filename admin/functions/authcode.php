<?php
session_start();
include "../config/dbcon.php";
(isset($_POST["login"]));
{   
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $login_query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $login_query_run = mysqli_query($connect, $login_query);
    if(mysqli_num_rows($login_query_run) > 0) 
    {
    $_SESSION['message'] = "success";
    header("location:../folder_admin/index.php");
    die();
    } 
    else 
    {
    $_SESSION['message'] = "Co loi xay ra";
    header("location: ../login.php");
    die();
}
}
?>