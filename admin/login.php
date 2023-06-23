<?php 
session_start();
include('includes/header.php');?>


    <div class="container" style="margin-top:240px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php if(isset($_SESSION['message'])) 
                {?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                </div>
                <?php 
                unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login<h4>
                    </div>
                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your Email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password"placeholder="Enter your Password">
                            </div>
                            <button type="submit" class="btn btn-primary"name="login">Sign Up</button>
                        </form>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>


<?php include('includes/footer.php');?>