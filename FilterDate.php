<?php require_once('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter by date and category Monthly</title>
    <style>.nav{
                height: 80px;
                width: 100%;
                margin: auto;
                padding: 35px, 0;
                background: blue;
                display: flex;
                align-items: center;
                justify-content: space-between;
                
            }

            .nav h2{
                color: white;
                font-family: Arial ;
            }
            
            </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
    <div class="nav">
<h2>Repair Center Management System</h2>
</div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Monthly Repaired Equipments</h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category ID</label>
                                        <input type="text" name="cat" value="<?php if(isset($_GET['cat'])){ echo $_GET['cat']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        
                                      <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>Serial NO</th>
                                    <th>Fault</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php  
                               

                                if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['cat']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                    $cat = $_GET['cat'];

                                    $query = "SELECT serialNo, Fault FROM repaired_units WHERE date BETWEEN '$from_date' AND '$to_date' AND  Category='$cat' ";
                                    $result = $conn->query($query);

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                            <tr>
                                                
                                                <td><?= $row['serialNo']; ?></td>
                                                <td><?= $row['Fault']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                    
                                
                                
                              

<button id="print-button" class="btn btn-primary">Print</button>
<script>
document.getElementById("print-button").addEventListener("click", function() {
    window.print();
});
</script>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>