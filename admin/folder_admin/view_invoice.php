<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Invoice
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>order_id<td>
                                    <td>product_id<td>
                                    <td>name_product<td>
                                    <td>quantity<td>
                                    <td>Action<td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $invoice_details = getAll("invoice_details");
                                    if(mysqli_num_rows($invoice_details) > 0) 
                                    {
                                        foreach($invoice_details as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['order_id'] ?><td>
                                                    <td><?= $item['product_id'] ?><td>
                                                    
                                                    <td><?= $item['name_product'] ?><td>
                                                    
                                                    <td><?= $item['quantity'] ?><td>
                                                    <td>
                                                        <form method="POST" action="process_invoice.php">
                                                        <input type="hidden" name="order_id" value="<?= $item['order_id']; ?>">
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