<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunction.php");

if(isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);
    $user_name = mysqli_real_escape_string($connect, $_POST['user_name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    

    $query = "UPDATE user SET user_name='$user_name', email='$email', password='$password', phone='$phone', address='$address' WHERE user_id='$user_id'";
    $query_run = mysqli_query($connect, $query);

    if($query_run) {
        $_SESSION['message'] = "success";
        header("location: view_user.php");
        exit;
    } else {
        $_SESSION['message'] = "fail";
        header("location: edit_user.php?user_id=$user_id");
        exit;
    }
}
if(isset($_POST["delete"])){
    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);

    $del_query = "DELETE FROM user WHERE user_id = '$user_id'";
    $del_query_run = mysqli_query($connect, $del_query);

    if($del_query_run)
    {
        $_SESSION['message'] = "success";
        header("location:../folder_admin/view_user.php");
        exit;
    }
    else{
        $_SESSION['message'] = "Fail";
        header("location:../folder_admin/view_user.php");
        exit;
    }
}
?>