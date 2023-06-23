<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        ADMIN
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id<td>
                                    <td>name<td>
                                    <td>email<td>
                                    <td>password<td>
                                    <td>level<td>
                                    <td>Action<td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $admin = getAll("admin");
                                    if(mysqli_num_rows($admin) > 0) 
                                    {
                                        foreach($admin as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['id'] ?><td>
                                                    <td><?= $item['name'] ?><td>
                                                    <td><?= $item['email'] ?><td>        
                                                    <td><?= $item['password'] ?><td>
                                                    <td><?= $item['level'] ?><td>
                                                 <td>
                                                        <form method="POST" action="process_admin.php">
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