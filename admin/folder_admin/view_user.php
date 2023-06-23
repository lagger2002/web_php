<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        User
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>user_id<td>
                                    <td>user_name<td>
                                    <td>email<td>
                                    <td>password<td>
                                    <td>phone<td>
                                    <td>address<td> 
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $user = getAll("user");
                                    if(mysqli_num_rows($user) > 0) 
                                    {
                                        foreach($user as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['user_id'] ?><td>
                                                    <td><?= $item['user_name'] ?><td>
                                                    <td><?= $item['email'] ?><td>
                                                    <td><?= $item['password'] ?></td>
                                                    <td></td>
                                                    <td><?= $item['phone'] ?></td>
                                                    <td></td>
                                                    <td><?= $item['address'] ?></td>
                                                    <td></td>
                                                    <td>
                                                        <a href="edit_user.php?user_id=<?= $item['user_id'] ?>" class="btn btn-primary">Edit</a>
                                                        <form method="POST" action="process_user.php">
                                                        <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
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