<?php require_once('connection.php');

session_start();


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
    <title>Repair Products Details</title>

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
</head>
<body>

    
    <div class="container">
    <div class="nav">
<h2>Repair Center Management System </h2>
</div>
    <?php include('msg.php'); ?>
    <div class="card">
                    <div class="card-header">
                        <h2>Repaired Units 
                            <a href="AdminHM.php" class="btn btn-danger float-end">BACK</a>
                        </h2>
                    </div>
                    <button class="btn btn-primary"><a href=ManageProd.php class="text-light"> Add New</a></button>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Repaired Date</th>
                <th>Serial No</th>
                <th>Fault</th>
                <th>Action</th>

            </tr>
        </thead>
    
<?php
    $sql = "SELECT id, Category, date, serialNo, Fault FROM repaired_units";
$result = $conn->query($sql);
?>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id= $row["id"];
    $cat= $row["Category"];  
    $dat= $row["date"];
    $sn=$row["serialNo"];
    $fau=$row["Fault"];
   
     echo
       ' <tr>
             <td scope="row">'.$id.' </td>
             <td> '.$cat.'</td>
             <td>'.$dat.'</td>
             <td>'.$sn.'></td>
             <td>'.$fau.'></td>
             <td>
             
              <button class="btn btn-primary"><a href="EditRep.php?editid='.$id.'" class="text-light">Update</a></button>
              <button Onclick="delete()" class="btn btn-danger"><a href="DelRep.php?delid='.$id.'" class="text-light" >Delete</a></button>
             </td> 

        </tr>';
?>


<?php
    

    
  }

} else {
  echo "0 results";
}
 ?>
 </div>
 </table>
    
</body>


</html>
<?php mysqli_close($conn);?>

