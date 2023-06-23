
<?php  session_start(); ?>
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
						<div class="col-md-2 pr-4 d-flex topper align-items-center">
						<?php if(isset($_SESSION['user_id'] )) {?>
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-user"></span></div>
						    <span class="text " >  </span>
							
								
								<h10 class="text " id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > <?php echo $_SESSION['user_name']  ?></span></h10> <div  class="text nav-link dropdown-toggle"></div>
								<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a href="user_infor.php" class="dropdown-item"> Tài khoản</a>
								<a href="./control/log_out.php" class=" dropdown-item"> Đăng Xuất </a>
								</div>
								
								<?php } 
                 else {?>
					 <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-user"></span></div>
							<div><a href="Login.php" class="text "> Login</a></div>
							
							
							<a href="Register.php" class="text ">/Register</a>
							<?php }?>
							
					    </div>
					    
					
						
							
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Yomate</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="shop.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="shop_piano.php">Piano</a>
				<a class="dropdown-item" href="shop_guitar.php">Guitar</a>
				<a class="dropdown-item" href="shop_drum.php">Drum</a>
				<a class="dropdown-item" href="shop_organ.php">Organ</a>
              </div>
            </li>
	          
	          
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[ <?php  if (isset($_SESSION['cart'])) { 
                                $cart = $_SESSION['cart'];
                                echo count($cart);
                                } else{
									echo 0;
								}
                            ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->