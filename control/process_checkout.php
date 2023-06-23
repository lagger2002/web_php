<?php



require 'connect_db.php';
require_once('../senmail.php');
session_start();
$name_receiver = $_POST['name_receiv'];
$phone_receiver = $_POST['phone_receiv'];
$address_receiver = $_POST['address_receiv'];

$email_receiver = $_POST['email_receiv'];
	$cart = $_SESSION['cart'];

	$total_price = 0;
	foreach ($cart as $each) {
		$total_price += $each['quantity'] * $each['price'];
	}
	$customer_id = $_SESSION['user_id'];
	$status = 0; //đặt hàng không thanh toán

	$sql = "insert into `orders` (id_user, receiv_name, receiv_phone, receiv_address, receiv_mail	, status, 	total_price)
values ('$customer_id', '$name_receiver', '$phone_receiver', '$address_receiver', '$email_receiver' ,'$status', '$total_price')";
	mysqli_query($connect, $sql);
	$email = $_SESSION['email'];
	$name = $name_receiver;
	$title = 'Thông tin hóa đơn bạn đã đặt hàng ';

	$content = "bạn đã đặt hàng ";
	


sendmail($email, $name, $title, $content);

	$sql_1= "select max(id) from `orders` where id_user = '$customer_id'";

	$result = mysqli_query($connect, $sql_1);
	$order_id = mysqli_fetch_array($result)['max(id)'];

	foreach ($cart as $product_id => $each) {
		$quantity = $each['quantity'];
        $product_name = $each['product_name'];
		$sql_2 = "insert into invoice_details(order_id, product_id,  name_product,quantity)
	values('$order_id', '$product_id','$product_name', '$quantity')";
		mysqli_query($connect, $sql_2);
	}

	mysqli_close($connect);
	unset($_SESSION['cart']);

	header('location:../thankyou.php');


