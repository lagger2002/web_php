<?php
header('Content-type: text/html; charset=utf-8');
session_start();
require('../control/connect_db.php');
require_once('../senmail.php');
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
$amount = 0;
foreach ($cart as $item) {
    $amount += $item['price'] * $item['quantity'];
}

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
$orderInfo = "Thanh toán qua MoMo";

$orderId = time() ."";
$redirectUrl = "http://localhost/doan_web/Momo/Momo_return.php";
$ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
$extraData = "";



if (!empty($_POST)) {
   
    $requestId = time() . "";
    $requestType = "payWithATM";
    
if (isset($_POST['momo_atm'])) {
    $name_receiver = $phone_number_receiver = $address_receiver = "";
    if (isset($_POST['name_receiv'])) {
        $name_receiver = $_POST['name_receiv'];
    }
    if (isset($_POST['phone_receiv'])) {
        $phone_number_receiver = $_POST['phone_receiv'];
    }
    if (isset($_POST['address_receiv'])) {
        $address_receiver = $_POST['address_receiv'];
    }
    if (isset($_POST['email_receiv'])) {
    $email_receiver = $_POST['email_receiv'];
    }
}

$id_user = $_SESSION['user_id'];
$email = $_SESSION['email'];
$name = $name_receiver;
$title = 'Thông tin hóa đơn bạn đã thanh toán ';

$content = "Thông tin đặt hàng " ." <br>";
$content .= "Tên người đặt đặt : " . $name_receiver . "<br>"; 
$content .= "Số điện thoại: " . $phone_number_receiver . "<br>";
$content .= "Địa chỉ : " . $address_receiver . "<br>";
$content .= "Tổng tiền : " . $amount . "<br>";
sendmail($email, $name, $title, $content);
$status = 1; //đặt hàng và thanh toán
    
$sql = "insert into `orders` (id_user, receiv_name, receiv_phone, receiv_address, receiv_mail ,status	,total_price)
values ('$id_user', '$name_receiver', '$phone_number_receiver', '$address_receiver', '$email_receiver','$status', '$amount')";
mysqli_query($connect,$sql);
        
$sql_order = "select max(id) from `orders` where id_user = '$id_user'";

$result_order = mysqli_query($connect,$sql_order);
$order_id = mysqli_fetch_array($result_order)['max(id)'];
        
foreach($cart as $product_id => $each){
    $quantity = $each['quantity'];
    $product_name = $each['product_name'];
    $sql_invoice = "insert into invoice_details(order_id, product_id, name_product,quantity)
    values('$order_id', '$product_id', '$product_name' ,'$quantity')";
    mysqli_query($connect,$sql_invoice);
    }

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
}
?>