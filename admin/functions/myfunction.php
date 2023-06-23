<?php 
include("../config/dbcon.php");
function getAll($table)
{
    global $connect;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($connect,$query);
}

function getByID($table, $id) {
    global $connect;
    $id = mysqli_real_escape_string($connect, $id);
    $query = "SELECT * FROM $table WHERE id ='$id'";
    return $query_run = mysqli_query($connect,$query);
}
function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('location:'.$url);
    exit();
}


?>