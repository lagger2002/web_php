<?php
$email = $_POST['email'];
$password = $_POST['password'];


require 'connect_db.php';
$sql = "select * from user  where email = '$email' and password = '$password' ";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if($number_rows==1)
{
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION['user_id'] = $each['user_id'];
    $_SESSION['email'] = $each['email'];
    $_SESSION['user_name'] = $each['user_name'];
    $_SESSION['phone'] = $each['phone'];
    $_SESSION['address'] = $each['address'];
    header('location: ../index.php');
    
}else
{
    echo '<script language="javascript">alert("Đăng nhập không thành công vui lòng kiểm tra lại thông tin "); window.location="../Login.php";</script>';
     
}