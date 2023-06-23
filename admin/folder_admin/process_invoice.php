<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunction.php");



if(isset($_POST["delete"])){
    $order_id = mysqli_real_escape_string($connect, $_POST['order_id']);

    $del_query = "DELETE FROM invoice_details WHERE order_id = '$order_id'";
    $del_query_run = mysqli_query($connect, $del_query);

    if($del_query_run)
    {
        $_SESSION['message'] = "success";
        header("location:../folder_admin/view_invoice.php");
        exit;
    }
    else{
        $_SESSION['message'] = "Fail";
        header("location:../folder_admin/view_invoice.php");
        exit;
    }
}
?>