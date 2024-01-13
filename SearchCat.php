<?php require_once('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Category Details</title>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Search Product Category<a href="userHM.php" class="btn btn-danger float-end">BACK</a></h4>
                    </div>

                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="POST">
                                    <div class="form-grop">
                                    <input type="text" name="get_cn" placeholder="Enter Category No" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <?php 
                                    
                                    if(isset($_POST['search']))
                                    {
                                        $cat = $_POST['get_cn'];

                                        $query = "SELECT Category, CategoryName FROM unit_category where Category='$cat' ";
                                        $result = $conn->query($query);

                                        
                                    
                                   
                                ?>


                        <div class="table_responsive">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>Category No</th>
                                    <th>Category Name</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php

                                       if(mysqli_num_rows($result) > 0)
                                       
                                       {
                                        while($row = mysqli_fetch_array($result))
                                         {
                                    ?>
                                <tr>
                                    <td><?php echo $row["Category"] ?></td>
                                    <td><?php echo $row["CategoryName"] ?></td>
                                    

                                </tr>
                                    <?php
                                         }
                                        }
                                        else
                                        {
                                            ?>
                                            <tr>
                                                <td colspan="2">No Record Found</td>
                                            </tr>
                                            <?php    
                                            
                                        }   
                                    ?>
                                </tbody>

                            </table>  

                        </div>
                         <?php
                                    }
                         ?>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                               

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php mysqli_close($conn);?>
