<?php require_once('connection.php');
session_start();

?>

<?php

if(isset($_POST['add'])){
     $catg = $_POST['cat'];
     $id = $_POST['id'];
     $dec = $_POST['dec'];

    $sql = "INSERT INTO unit_faults (Category, Fault, Description) VALUES ('".$catg."', '".$id."', '".$dec."')";
    $result=mysqli_query($conn,$sql);

if ($result) {

    $_SESSION['message'] = "Fault Inserted Successfully";
    header('location: AddFaults.php');
    exit(0);
 

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Faults</title>
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
<?php include('msg.php'); ?>
<div class="nav">
<h2>Repair Center Management System</h2>
</div>
    
<div class="card">
                    <div class="card-header">
                        <h2>Add Unit Faults
                            <a href="userHM.php" class="btn btn-danger float-end">BACK</a>
                        </h2>
                    </div>

  <form method="post">
    <div class="form-group"> 

      <input type="text" class="form-control" id="cat" placeholder="Enter Category ID"  name="cat" required>
    </div>

    <div class="form-group">
    
      <input type="text" class="form-control" id="fau" placeholder="Enter Fault ID"  name="id" required>
    </div>

    <div class="form-group">
    
      <input type="text" class="form-control" id="des" placeholder="Enter Fault Description"  name="dec" required>
    </div>


    
    
    <button type="submit" class="btn btn-primary" name="add">Add</button>
  </form>
</div>
<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Fault ID</th>
                <th>Fault</th>
                

            </tr>
        </thead>
    
<?php
    $sql = "SELECT id, Category, Fault, Description FROM unit_faults";
$result = $conn->query($sql);
?>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
           
    $id= $row["id"];
    $cat= $row["Category"];  
    $fau=$row["Fault"];
    $des=$row["Description"];
   
     echo
       ' <tr>
             <td scope="row">'.$id.' </td>
             <td> '.$cat.'</td>
             <td>'.$fau.'></td>
             <td>'.$des.'></td>
             

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
