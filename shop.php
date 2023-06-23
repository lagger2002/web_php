<?php
include("../doan_web/control/connect_db.php");

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$no_of_records_per_page = 12; 
$offset = ($pageno-1) * $no_of_records_per_page; 


$total_pages_sql = "SELECT COUNT(*)  FROM products ";
$result = mysqli_query($connect,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page";
$result = mysqli_query($connect,$sql);

mysqli_close($connect);
?>



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
<?php
include '../doan_web/component/header.php';
?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('https://musichouse.vn/wp-content/uploads/2021/05/banner1.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="shop.php" class="active">All</a></li>
    					<li><a href="shop_piano.php" >Piano</a></li>
    					<li><a href="shop_guitar.php">Guitar</a></li>
    					<li><a href="shop_organ.php">Organ</a></li>
    					<li><a href="shop_drum.php">drum</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
        <?php foreach ($result as $each): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $each['img'] ?>" alt="Colorlib Template">
    						
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3 style="display: -webkit-box;
                            max-height: 3.2rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis; 
                            white-space: normal;
                            -webkit-line-clamp: 1;
                            line-height: 1.6rem;
                            margin-top: 10px;" > <?php echo $each['product_name'] ?> </h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span ><?php $price = $each ['price'];
					$formatted_price = number_format($price, 0, '.', ',');
					
					echo $formatted_price ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
                 
	    							<a href="product-single.php?id=<?php echo $each['id'] ?>"class="add-to-cart d-flex justify-content-center align-items-center text-center" >
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="./control/add_cart.php?id=<?php echo $each['id'] ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i> </span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
          <?php endforeach ?>
    			
    			
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
              <?php
                        for($i =1; $i<= $total_pages; $i++) 
                        { if($i== $pageno){ ?> 
                        <li class="active" ><span ><a href="?pageno=<?php echo $i ?>"><?php echo $i ?></a></span></li>
              
                <?php    }
                else { ?>
              <li ><span><a href="?pageno=<?php echo $i ?>"><?php echo $i ?></a></span></li>  
             <?php }}?> 
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
   <?php 
      include('../doan_web/component/footer.php')
   ?>
    
  

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