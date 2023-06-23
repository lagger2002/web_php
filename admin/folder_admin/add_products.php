<?php
include("includes/header.php") 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products<h4>
                </div>
                <div class="card-body">
                    <form action ="add_product.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                             <label for ="">Product Name</label>
                            <input type="text" name = "product_name"class="form-control" placeholder=" Enter the product ">
                        </div>
                        <div class="col-md-6">
                             <label for ="">Price</label>
                            <input type="text" name = "price" class="form-control" placeholder=" Enter the Price ">
                        </div>
                        <div class="col-md-12">
                             <label for ="">Detail</label>
                            <textarea row ="4" name = "detail"class="form-control" placeholder=" Enter the Detail "></textarea>
                        </div>
                        <div class="col-md-6">
                             <label for ="">Category</label>
                            <input type="text" name = "category_id"class="form-control" placeholder=" Enter the Category ">
                        </div>
                        <div class="col-md-6">
                            <label for ="">Upload Image</label>
                            <input type="text" name ="img" class="form-control" placeholder=" Enter the Image ">
                        </div>
                        <div class="col-md-6">
                            
                            <button type="submit" class="btn btn-primary" name="add_product">Save</button>
                        </div>
                    </div>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if(isset($_SESSION['message'])){ ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?= $_SESSION['message'] ?>');
    <?php } ?>
   
        
  </script>
<?php
include("includes/footer.php") 
?>