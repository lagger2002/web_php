<?php 
include("includes/header.php");
include("../config/dbcon.php");
include("../functions/myfunction.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
        
            if(isset($_GET['id']))
            {
                $id = mysqli_real_escape_string($connect, $_GET['id']);
                $query = "SELECT * FROM orders WHERE id='$id' ";
                $query_run = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($query_run) > 0){
                    $data = mysqli_fetch_array($query_run);
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Orders</h4>
                            </div>
                            <div class="card-body">
                                <form action ="process_orders.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                 
                                    <div class="col-md-6">
                                        <label for ="">id_user</label>
                                        <input type="text" name = "id_user" value = "<?= $data['id_user'] ?>"class="form-control" placeholder=" Enter the product ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">receiv_name</label>
                                        <input type="text" name = "receiv_name" value = "<?= $data['receiv_name'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">receiv_phone</label>
                                        <input type="text" name = "receiv_phone" value = "<?= $data['receiv_phone'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">receiv_address</label>
                                        <input type="text" name = "receiv_address" value = "<?= $data['receiv_address'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">receiv_mail</label>
                                        <input type="text" name = "receiv_mail" value = "<?= $data['receiv_mail'] ?>" class="form-control" placeholder=" Enter the Category ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">status</label>
                                        <input type="text" name = "status" value = "<?= $data['status'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">time</label>
                                        <input type="text" name = "time" value = "<?= $data['time'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">total_price</label>
                                        <input type="text" name = "total_price" value = "<?= $data['total_price'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <button type="submit" class="btn btn-primary" name="update_orders">Update</button>
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