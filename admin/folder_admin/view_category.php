<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Category
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id_cate<td>
                                    <td>type<td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $category = getAll("category");
                                    if(mysqli_num_rows($category) > 0) 
                                    {
                                        foreach($category as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['id_cate'] ?><td>
                                                    <td><?= $item['type'] ?><td>
                                                    <td>
            
                                                        <form method="POST" action="process_category.php">
                                                        <input type="hidden" name="id_cate" value="<?= $item['id_cate']; ?>">
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