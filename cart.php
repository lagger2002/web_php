<?php


 
 include '../doan_web/component/header.php';
 
require('./control/connect_db.php');
$cart = "";
if (isset($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
}

$sum = 0;
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

    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('https://musichouse.vn/wp-content/uploads/2021/05/banner1.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php 
            
                if(is_array($cart) || is_object($cart))
                      foreach ($cart as $id => $each): ?>
						      <tr class="text-center">
						        <td class="product-remove">
								<a href="./control/delete_prd_cart.php?id=<?php echo $id ?>"  class="ion-ios-close"></a>
							</td>
						        
						        <td class="image-prod"><img src="<?php echo $each['img'] ?>" alt="" class="img"></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $each['product_name'] ?></h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        <td class="price"><?php echo $each['price'] ?></td>
						        
						        <td class="quantity">
								<div class="input-group-prepend">
                          			<a href="./control/slproduct.php?id=<?php echo $id ?>&type=decrea"class="btn btn-outline-primary ">
                                  -
                                </a>
                        		</div>
								<div>
								<?php echo $each['quantity'] ?>
								</div>
									
									<div class="input-group-append">
                          
                          		<a href="./control/slproduct.php?id=<?php echo $id ?>&type=incre" class="btn btn-outline-primary ">
                                          +
                                        </a>
                        		</div>
					          	
					          </td>
						        
						        <td class="total"> 
								<?php 
								$result = $each['price']  * $each['quantity']; 
								$sum += $result;
								 
					$formatted_result = number_format($result, 0, '.', ',');
					
					echo $formatted_result
								 ?> VNĐ</td>
						      </tr><!-- END TR-->
							  <?php endforeach ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng tiền giỏ hàng</h3>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Tổng tiền</span>
    						<span><?php 				 
					$formatted_sum = number_format($sum, 0, '.', ','); 
					
					echo $formatted_sum ?>VNĐ</span>
    					</p>
    				</div>
					<?php if(!empty($_SESSION['cart'] )) {?>
    				<p><a href="checkout.php" class="btn btn-primary py-3 px-4 d-flex justify-content-center align-items-center text-center ">Đặt hàng</a></p>
					<p><a href="checkout_momo_qr.php" class="btn btn-primary py-3 px-4 d-flex justify-content-center align-items-center text-center ">Đặt hàng & Thanh toán MOMO - QR</a></p>
					
					
					
					<p><a href="checkout_momo.php" class="btn btn-primary py-3 px-4 d-flex justify-content-center align-items-center text-center ">Đặt hàng & Thanh toán MOMO- ATM</a></p>
					<?php } ?>
                  
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
	include '../doan_web/component/footer.php';
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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>