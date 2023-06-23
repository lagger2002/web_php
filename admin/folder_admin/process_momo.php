<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunction.php");


if(isset($_POST["delete"])){
    $id_momo = mysqli_real_escape_string($connect, $_POST['id_momo']);

    $del_query = "DELETE FROM momo_pay WHERE id_momo = '$id_momo'";
    $del_query_run = mysqli_query($connect, $del_query);

    if($del_query_run)
    {
        $_SESSION['message'] = "success";
        header("location:../folder_admin/view_momo.php");
        exit;
    }
    else{
        $_SESSION['message'] = "Fail";
        header("location:../folder_admin/view_momo.php");
        exit;
    }
}
?>