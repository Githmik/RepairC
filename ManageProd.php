<?php require_once('connection.php');
session_start();

if(isset($_POST['add'])){

$cat_no = $_POST['id'];
$date = $_POST['date'];
$serial = $_POST['sn'];
$fid = $_POST['fauid'];

$sql = "INSERT INTO repaired_units (Category, date, serialNo, Fault)
                    VALUES ('".$cat_no."', '".$date."', '".$serial."', '".$fid."')";
$result=mysqli_query($conn,$sql);

if ($result) {

    $_SESSION['message'] = "Item Inserted Successfully";
    header('location: ManageProd.php');
    exit(0);

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
} 


}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('msg.php'); ?>

<div class="nav">
<h2>Repair Center Management System</h2>
</div>

    <div class="container">
    

    <div class="card">
                    <div class="card-header">
                        <h2>Add Repaired Units
                            <a href="userHM.php" class="btn btn-danger float-end">BACK</a>
                        </h2>
                    </div>

    <form method="post">
    <div class="form-group">
    

      <input type="text" class="form-control" id="cat" placeholder="Enter Category ID"  name="id" required>
    </div>

    <div class="form-group">
    
      <input type="date" class="form-control" id="dat" placeholder="Enter Date"  name="date" required>
    </div>

    <div class="form-group">
      
      <input type="text" class="form-control" id="sn" placeholder="Enter Serial No"  name="sn" required>
    </div>

    <div class="form-group">
    <input type="text" class="form-control" id="fau" placeholder="Enter FaultID"  name="fauid" required>
    </div>
    
    <button type="submit" class="btn btn-primary" name="add">Add</button>
  </form>
</div>

<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Repaired Date</th>
                <th>Serial No</th>
                <th>Fault</th>
                

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