<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thanh toán Thành công</title>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    session_start();
    require('../control/connect_db.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
    
    $code_order = rand(0, 9999);  
    if (isset($_GET['partnerCode'])) {
        
        $partnerCode = $_GET['partnerCode'];
        $orderId = $_GET['orderId'];
        $amount  = $_GET['amount'];
        $orderInfo = $_GET['orderInfo'];
        $orderType = $_GET['orderType'];
        $transId = $_GET['transId'];
        $payType = $_GET['payType'];
        
        $sql = "INSERT INTO momo_pay(code_cart,partner_code, order_id, amount, order_info, order_type, trans_id, pay_type) VALUES ('$code_order','$partnerCode','$orderId','$amount','$orderInfo','$orderType','$transId','$payType')";
        $result = mysqli_query($connect, $sql);
        unset($_SESSION['cart']);
           
           

       

mysqli_close($connect);
    }
    ?>
     <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">Bạn đã đặt thanh toán thành công.</p>
            <p><a href="../shop.php" class="btn btn-sm btn-primary">Back to shop</a></p>
          </div>
        </div>
      </div>
    </div>

</body>

</html>