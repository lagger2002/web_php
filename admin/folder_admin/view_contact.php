<?php 
include("includes/header.php");
include("../functions/myfunction.php")

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Contact
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id<td>
                                    <td>Name<td>
                                    <td>phone<td>
                                    <td>email<td>
                                    <td>message<td>
                                    <td>Action<td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $contact = getAll("contact");
                                    if(mysqli_num_rows($contact) > 0) 
                                    {
                                        foreach($contact as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['id'] ?><td>
                                                    <td><?= $item['name'] ?><td>
                                                    <td><?= $item['phone'] ?><td>        
                                                    <td><?= $item['email'] ?><td>
                                                    <td><?= $item['message'] ?><td>
                                                 <td>
                                                        <form method="POST" action="process_contact.php">
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