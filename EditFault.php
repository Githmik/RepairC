<?php
include "connection.php" ;
session_start();

$id=$_GET['editid'];

$sql ="SELECT * from unit_faults where id=$id";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

    $cat= $row["Category"];  
    $fau= $row["Fault"];
    $des= $row["Description"];
    
   

if(isset($_POST['edit'])){

    $cat= $_POST['id'];  
    $fau= $_POST['name'];
    $des= $_POST['des'];
    
  

    $sql = "UPDATE unit_faults SET Category='".$cat."', Fault='".$fau."', Description='".$des."' WHERE id='".$id."'";
    $result=mysqli_query($conn,$sql);

    

    if($result){
        $_SESSION['message'] = "Item Updated Successfully";
        header('location:ViewFaults.php?updated');
        extit(0);

    }else{
        
        die(mysqli_error($conn));
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Faults</title>
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
    
  <h2>Edit Repaired Items</h2>
  <form method="post">
    <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> 

      <input type="text" class="form-control" id="cat" placeholder="Enter Category ID"  name="id" value="<?php echo $cat; ?>">
    </div>

    <div class="form-group">
    
      <input type="text" class="form-control" id="fau" placeholder="Enter Fault ID"  name="name" value="<?php echo $fau; ?>">
    </div>

    <div class="form-group">
    
      <input type="text" class="form-control" id="des" placeholder="Enter Fault Description"  name="des" value="<?php echo $des; ?>">
    </div>


    
    
    <button type="submit" class="btn btn-primary" name="edit">Update</button>
  </form>
</div>

</body>
</html>
