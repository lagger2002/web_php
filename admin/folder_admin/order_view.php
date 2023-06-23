<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Orders
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id<td>
                                    <td>id_user<td>
                                    <td>receiv_name<td>
                                    <td>receiv_phone<td>
                                    <td>receiv_address<td>
                                    <td>receiv_mail<td> 
                                    <td>status<td>
                                    <td>time<td>
                                    <td>total_price<td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $orders = getAll("orders");
                                    if(mysqli_num_rows($orders) > 0) 
                                    {
                                        foreach($orders as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['id'] ?><td>
                                                    <td><?= $item['id_user'] ?><td>
                                                    <td><?= $item['receiv_name'] ?><td>
                                                    <td><?= $item['receiv_phone'] ?></td>
                                                    <td></td>
                                                    <td><?= $item['receiv_address'] ?></td>
                                                    <td></td>
                                                    <td><?= $item['receiv_mail'] ?></td>
                                                    <td></td>
                                                    <td><?= $item['status'] ?><td> 
                                                    <td><?= $item['time'] ?><td>
                                                    <td><?= $item['total_price'] ?><td>     
                                                    <td>
                                                        <a href="edit_order.php?id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                                                        <form method="POST" action="process_orders.php">
                                                        <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" name ="delete_order">Delete<button>
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