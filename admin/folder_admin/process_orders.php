<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunction.php");

if(isset($_POST['update_orders'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $id_user = mysqli_real_escape_string($connect, $_POST['id_user']);
    $receiv_name = mysqli_real_escape_string($connect, $_POST['receiv_name']);
    $receiv_phone = mysqli_real_escape_string($connect, $_POST['receiv_phone']);
    $receiv_address = mysqli_real_escape_string($connect, $_POST['receiv_address']);
    $receiv_mail = mysqli_real_escape_string($connect, $_POST['receiv_mail']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $total_price = mysqli_real_escape_string($connect, $_POST['total_price']);

    

    $query = "UPDATE orders SET id_user='$id_user', receiv_name='$receiv_name', receiv_phone='$receiv_phone', receiv_address='$receiv_address', receiv_mail='$receiv_mail',status ='$status',time = '$time', total_price ='$total_price' WHERE id='$id'";
    $query_run = mysqli_query($connect, $query);

    if($query_run) {
        $_SESSION['message'] = "success";
        header("location: order_view.php");
        exit;
    } else {
        $_SESSION['message'] = "fail";
        header("location: order_view.php?id=$id");
        exit;
    }
}
if(isset($_POST["delete_order"])){
    $id = mysqli_real_escape_string($connect, $_POST['id']);

    $del_query = "DELETE FROM orders WHERE id = '$id'";
    $del_query_run = mysqli_query($connect, $del_query);

    if($del_query_run)
    {
        $_SESSION['message'] = "success";
        header("location:../folder_admin/order_view.php");
        exit;
    }
    else{
        $_SESSION['message'] = "Fail";
        header("location:../folder_admin/order_view.php");
        exit;
    }
}
?>