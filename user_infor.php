<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Yomate - của hàng nhạc cụ số 1 việt nam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<?php include('../doan_web/component/header.php') ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('https://musichouse.vn/wp-content/uploads/2021/05/banner1.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Người dùng </span></p>
            <h1 class="mb-0 bread">Thông tin tài khoản</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 ftco-animate">
        <div class="row">
          <div class="col-md-12">
            <!-- Phần ảnh -->
            <div class="blog-entry align-self-stretch d-md-flex">
              <img src="images/img_1.jpg" class="block-20" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <!-- Phần nút thao tác -->
            <div class="blog-entry align-self-stretch d-md-flex">
              <div class="d-block pl-md-4">
                <p><a href="user_infor.php" class="btn btn-primary py-2 px-3 d-flex justify-content-center align-items-center text-center">Thông tin người dùng</a></p>
                <p><a href="order_info.php" class="btn btn-primary py-2 px-3 d-flex justify-content-center align-items-center text-center">Thông tin đặt hàng và thanh toán</a></p>
                <p><a href="./control/log_out.php" class="btn btn-primary py-2 px-3 d-flex justify-content-center align-items-center text-center">Đăng xuất</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ftco-animate">
        <!-- Phần thông tin -->
        <div class="blog-entry align-self-stretch d-md-flex">
          <div class="d-block pl-md-4">
            <h2>Thông tin người dùng</h2>
          
            <hr>
            <h4>Tên người dùng:  <?php echo $_SESSION['user_name']; ?></h4>
            
              <h4>Địa chỉ: <?php echo $_SESSION['address'];  ?></h4>
              <h4>Số điện thoại: <?php echo $_SESSION['phone'];  ?></h4>
              <h4>Gmail: <?php echo $_SESSION['email'];  ?></h4>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <?php  include('../doan_web/component/footer.php')?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>