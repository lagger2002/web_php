<?php 
include("includes/header.php");
include("../config/dbcon.php");
include("../functions/myfunction.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
        
            if(isset($_GET['user_id']))
            {
                $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
                $query = "SELECT * FROM user WHERE user_id='$user_id' ";
                $query_run = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($query_run) > 0){
                    $data = mysqli_fetch_array($query_run);
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit User</h4>
                            </div>
                            <div class="card-body">
                                <form action ="process_user.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                 
                                    <div class="col-md-6">
                                        <label for ="">user_name</label>
                                        <input type="text" name = "user_name" value = "<?= $data['user_name'] ?>"class="form-control" placeholder=" Enter the product ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">email</label>
                                        <input type="text" name = "email" value = "<?= $data['email'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-12">
                                        <label for ="">password</label>
                                        <input type="text" name = "password" value = "<?= $data['password'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">phone</label>
                                        <input type="text" name = "phone" value = "<?= $data['phone'] ?>" class="form-control" placeholder=" Enter the Category ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">address</label>
                                        <input type="text" name = "address" value = "<?= $data['address'] ?>" class="form-control" placeholder=" Enter the Category ">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <input type="hidden" name="user_id" value="<?= $data['user_id']; ?>">
                                        <button type="submit" class="btn btn-primary" name="update_user">Update</button>
                                    </div>
                                </div>
                                </form>
                                    
                            </div>
                    </div>
                <?php
                }
                else
                {
                    echo"No product found";
                }
                
            }
            else{
                echo"id khong";
            }
             ?>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>