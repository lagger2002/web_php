<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        MOMO
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id_momo<td>
                                    <td>code_cart<td>
                                    <td>partner_code<td>
                                    <td>order_id<td>
                                    <td>amount<td>
                                    <td>order_info<td>
                                    <td>order_type<td>
                                    <td>order_time<td>
                                    <td>trans_id<td>
                                    <td>pay_type<td>
                                    <td>Action<td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $momo_pay = getAll("momo_pay");
                                    if(mysqli_num_rows($momo_pay) > 0) 
                                    {
                                        foreach($momo_pay as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['id_momo'] ?><td>
                                                    <td><?= $item['code_cart'] ?><td>
                                                    <td><?= $item['partner_code'] ?><td>                               
                                                    <td><?= $item['order_id'] ?><td>
                                                    <td><?= $item['amount'] ?><td>
                                                    <td><?= $item['order_info'] ?><td>
                                                    <td><?= $item['order_type'] ?><td>
                                                    <td><?= $item['order_time'] ?><td>
                                                    <td><?= $item['trans_id'] ?><td>
                                                    <td><?= $item['pay_type'] ?><td>
                                                    <td>
                                                        <form method="POST" action="process_momo.php">
                                                        <input type="hidden" name="id_momo" value="<?= $item['id_momo']; ?>">
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