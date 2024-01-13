<?php require_once('connection.php');
session_start();

if(isset($_POST['add'])){

    $date = $_POST['date'];
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    
    
    $sql = "INSERT INTO check_out (Date, CategoryId, qty)
                        VALUES ( '".$date."', '".$id."', '".$qty."')";
    $result= mysqli_query($conn,$sql); 
    
    
    if ($result) {
    
        $_SESSION['message'] = "Data Inserted Successfully";
        header('location: checkOut.php');                            
        exit(0);
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    
        
    }
?>


     


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Check Out Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include('msg.php'); ?>


<div class="container">

<div class="card">
                    <div class="card-header">
                        <h2>Add Check Out Items
                            <a href="userHM.php" class="btn btn-danger float-end">BACK</a>
                        </h2>
                    </div>


  
  <form method="post">
    <div class="form-group">
      
    
   
   <input type="date" class="form-control" id="date" placeholder="Enter Date"  name="date" required>
 </div>

 <div class="form-group">
 
   <input type="text" class="form-control" id="id" placeholder="Enter Category ID"  name="id" required>
 </div>

 <div class="form-group">

   <input type="text" class="form-control" id="qty" placeholder="Quantity"  name="qty" required>
 </div>


      

    
    
    <button type="submit" class="btn btn-primary" name="add">Add</button>
  </form>
</div>

<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Category ID</th>
                <th>Quantity</th>
                

            </tr>
        </thead>
    
<?php
    $sql = "SELECT id, date, CategoryId, qty FROM check_out";
$result = $conn->query($sql);
?>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id= $row["id"];
    $date= $row["date"];
    $cat= $row["CategoryId"];  
    $qt= $row["qty"];
    
   
     echo
       ' <tr>
             <td scope="row">'.$id.' </td>
             <td> '.$date.'</td>
             <td>'.$cat.'</td>
             <td>'.$qt.'</td>
             

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