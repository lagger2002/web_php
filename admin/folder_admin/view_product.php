<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Product
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id<td>
                                    <td>Name<td>
                                    <td>Img<td>
                                    <td>Detail<td>
                                    <td>Price<td>
                                    <td>Category<td>
                                    <td>Action<td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $products = getAll("products");
                                    if(mysqli_num_rows($products) > 0) 
                                    {
                                        foreach($products as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['id'] ?><td>
                                                    <td><?= $item['product_name'] ?><td>
                                                    <td ><img  src="<?= $item['img'] ?>" style = "width:100px" alt=""><td>
                                                    <td><textarea><?= $item['detail'] ?></textarea></td>
                                                    <td></td>
                                                    <td><?= $item['price'] ?><td>
                                                    
                                                    <td><?= $item['category_id'] ?><td>
                                                    <td>
                                                        <a href="edit_product.php?id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                                                        <form method="POST" action="add_product.php">
                                                        <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" name ="delete">Delete<button>
                                                        </form>
                                                    <td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else{
                                        echo"No Found!";
                                    }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>