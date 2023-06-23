<?php

session_start();
require('../control/connect_db.php');
require_once('../senmail.php');
$cart = $_SESSION['cart'];

$amount = 1000;

header('Content-type: text/html; charset=utf-8');


function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo QR";

$orderId = time() ."";
$redirectUrl = "http://localhost/doan_web/Momo/Momo_return.php";
$ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
$extraData = "";




        
$requestId = time() . "";
$requestType = "captureWallet";
        
        
    $id_user = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $name = $_SESSION['user_name'];
    // $sql_amount = "SELECT total_price FROM orders WHERE id_user = $id_user";
    // $result = mysqli_query($connect, $sql_amount);
    // $row = mysqli_fetch_assoc($result);
    // $amount = $row['total_price'];
    
    $title = 'Thông tin hóa đơn bạn đã đặt hàng ';

    $content = "Thông tin thanh toán  " ." <br>";
    $content .= "Tên người đặt đặt : " . $_SESSION['user_name'] . "<br>";
    $content .= "Số điện thoại: " . $_SESSION['phone'] . "<br>";
    $content .= "Địa chỉ : " . $_SESSION['address'] . "<br>";
    $content .= "Tổng tiền : " . $amount . "<br>";
    sendmail($email, $name, $title, $content);
    $status = 1; //đặt hàng và thanh toán
    $order_id = $_GET['id'];
    $sql_onl = "UPDATE orders
    JOIN invoice_details ON invoice_details.order_id = orders.id
    SET orders.status = '$status'
    WHERE orders.id_user = '$id_user' AND invoice_details.order_id  = $order_id";
    mysqli_query($connect, $sql_onl);
        
 


  //before sign HMAC SHA256 signature
  $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
  $signature = hash_hmac("sha256", $rawHash, $secretKey);
  $data = array('partnerCode' => $partnerCode,
      'partnerName' => "Test",
      "storeId" => "MomoTestStore",
      'requestId' => $requestId,
      'amount' => $amount,
      'orderId' => $orderId,
      'orderInfo' => $orderInfo,
      'redirectUrl' => $redirectUrl,
      'ipnUrl' => $ipnUrl,
      'lang' => 'vi',
      'extraData' => $extraData,
      'requestType' => $requestType,
      'signature' => $signature);
  $result = execPostRequest($endpoint, json_encode($data));
  $jsonResult = json_decode($result, true);  // decode json

  //Just a example, please check more in there
 
 header('Location: ' . $jsonResult['payUrl']);

