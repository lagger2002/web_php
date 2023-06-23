<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunction.php");

if(isset($_POST['add_product'])){
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $category = $_POST['category_id'];
    $img = $_POST['img'];

    $add_product_querry = "INSERT INTO products (product_name,price,detail,category_id,img) VALUES ('$name','$price','$detail','$category','$img')";

    $add_run = mysqli_query($connect,$add_product_querry);
    if($add_run)
    {
        $_SESSION['message'] = "success";
        header("location:../folder_admin/add_products.php");
        exit;
    }
    else{
        $_SESSION['message'] = "Fail";
        header("location:../folder_admin/add_products.php");;
        exit;
    }
} 
if(isset($_POST['update_product'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $name = mysqli_real_escape_string($connect, $_POST['product_name']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $detail = mysqli_real_escape_string($connect, $_POST['detail']);
    $category = mysqli_real_escape_string($connect, $_POST['category_id']);
    $img = mysqli_real_escape_string($connect, $_POST['img']);

    $query = "UPDATE products SET product_name='$name', price='$price', detail='$detail', category_id='$category', img='$img' WHERE id='$id'";
    $query_run = mysqli_query($connect, $query);

    if($query_run) {
        $_SESSION['message'] = "success";
        header("location: view_product.php");
        exit;
    } else {
        $_SESSION['message'] = "fail";
        header("location: edit_product.php?id=$id");
        exit;
    }
}
if(isset($_POST["delete"])){
    $id = mysqli_real_escape_string($connect, $_POST['id']);

    $del_query = "DELETE FROM products WHERE id = '$id'";
    $del_query_run = mysqli_query($connect, $del_query);

    if($del_query_run)
    {
        $_SESSION['message'] = "success";
        header("location:../folder_admin/view_product.php");
        exit;
    }
    else{
        $_SESSION['message'] = "Fail";
        header("location:../folder_admin/view_product.php");
        exit;
    }
}
?>