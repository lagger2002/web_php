<?php 
session_start();

$id="";
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}


if(empty($_SESSION['cart'][$id])){
	require 'connect_db.php';
	$sql = "select * from products
	where id = '$id'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
	$_SESSION['cart'][$id]['product_name'] = $each['product_name'];
	$_SESSION['cart'][$id]['img'] = $each['img'];
	$_SESSION['cart'][$id]['price'] = $each['price'];
	$_SESSION['cart'][$id]['detail'] = $each['detail'];
	$_SESSION['cart'][$id]['quantity'] = 1;
	header('location: ../cart.php');


} else {
	echo '<script language="javascript">alert("Bạn đã có sản phẩm này trong giỏ hàng !"); window.location="../shop.php"</script>';
}

print_r($_SESSION['cart']);

