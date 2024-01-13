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
    <title>PSTN Report</title>
    <style>
    .split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #111;
}

.right {
  right: 0;
  background-color: red;
}

</style>
</head>
<body>
<div class="split left">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h6>PSTN REPORT ACORDING TO FAULT <a href="AdminHM.php" class="btn btn-danger float-end">BACK</a></h6>
                    </div>

                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="POST">
                                    <div class="form-grop">
                                        <label>Enter Fault ID</lable>
                                    <input type="text" name="get_fid" value="<?php if(isset($_GET['get_fid'])){ echo $_GET['get_fid']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="PROCESS" class="btn btn-primary">PROCESS</button>
                                </div>
                            </div>
                        </form>

                        <?php 
                                    
                                    if(isset($_POST['PROCESS']))
                                    {
                                        $sn = $_POST['get_fid'];

                                        $query = "SELECT Date, SerialNo FROM  pstn where FaultID='$sn' ";
                                        $result = $conn->query($query);
  
                                   
                                ?>


        
                                
                              


                        <div class="table_responsive">
                            <table class="table">
                                <thead>
                                  <tr>
                                    
                                    <th> Date</th>
                                    <th>Serial No</th>
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
                                    
                                    <td><?php echo $row["Date"] ?></td>
                                    <td><?php echo $row["SerialNo"] ?></td>

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
                         <?php
    if(isset($_POST['PROCESS']))
    {
        $fn = $_POST['get_fid'];

        $query = "SELECT COUNT(Fault) AS total FROM  pst where Fault='$fn' ";
        $result = $conn->query($query);
        $values =mysqli_fetch_assoc($result);
                                        $numr = $values['total'];
                                        echo " TOTAL IS " . $numr . "<br>";

    }
                                
                                
                                
                                ?>

<button id="print-button" class="btn btn-primary">Print</button>
<script>
document.getElementById("print-button").addEventListener("click", function() {
    window.print();
});
</script>
                                


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
</div>

<div class="split right">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h6>PSTN REPORT ACORDING TO DATE <a href="AdminHM.php" class="btn btn-danger float-end">BACK</a></h6>
                    </div>

                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="POST">
                                    <div class="form-grop">
                                    <input type="date" name="get_dt" placeholder="Enter Date" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="pr" class="btn btn-primary">PROCESS</button>
                                </div>
                            </div>
                        </form>

                        <?php 
                                    
                                    if(isset($_POST['pr']))
                                    {
                                        $sn = $_POST['get_dt'];

                                        $query = "SELECT SerialNo, FaultID FROM  pstn where Date='$sn' ";
                                        $result = $conn->query($query);
  
                                   
                                ?>


        
                                
                              


                        <div class="table_responsive">
                            <table class="table">
                                <thead>
                                  <tr>
                                    
                                   
                                    <th>Serial No</th>
                                    <th>Fault ID </th>
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
                                    
                                    <td><?php echo $row["SerialNo"] ?></td>
                                    <td><?php echo $row["FaultID"] ?></td>

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
                         <?php
    if(isset($_POST['pr']))
    {
        $fn = $_POST['get_dt'];

        $query = "SELECT COUNT(Date) AS total FROM  pstn where date='$fn' ";
        $result = $conn->query($query);
        $values =mysqli_fetch_assoc($result);
                                        $numr = $values['total'];
                                        echo " TOTAL IS " . $numr . "<br>";

    }
                                
                                
                                
                                ?>

<button id="print-button" class="btn btn-primary">Print</button>
<script>
document.getElementById("print-button").addEventListener("click", function() {
    window.print();
});
</script>
                                


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
</div>
    
                                

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php mysqli_close($conn);?>
