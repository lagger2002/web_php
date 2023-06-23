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
                $query = "SELECT * FROM products WHERE id='$id' ";
                $query_run = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($query_run) > 0){
                    $data = mysqli_fetch_array($query_run);
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Products</h4>
                            </div>
                            <div class="card-body">
                                <form action ="add_product.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                 
                                    <div class="col-md-6">
                                        <label for ="">Product Name</label>
                                        <input type="text" name = "product_name" value = "<?= $data['product_name'] ?>"class="form-control" placeholder=" Enter the product ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">Price</label>
                                        <input type="text" name = "price" value = "<?= $data['price'] ?>" class="form-control" placeholder=" Enter the Price ">
                                    </div>
                                    <div class="col-md-12">
                                        <label for ="">Detail</label>
                                        <textarea rows ="4" name = "detail"  class="form-control" placeholder=" Enter the Detail "><?= $data['detail'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">Category</label>
                                        <input type="text" name = "category_id" value = "<?= $data['category_id'] ?>" class="form-control" placeholder=" Enter the Category ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="">Upload Image</label>
                                        <input type="text" name ="img" value = "<?= $data['img'] ?>" class="form-control" placeholder=" Enter the Image ">
                                        <label for ="">Current Image</label>
                                        <img src = "<?= $data['img'] ?>" style ="width:100px">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <button type="submit" class="btn btn-primary" name="update_product">Update</button>
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