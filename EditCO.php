<?php
include "connection.php" ;
session_start();

$id=$_GET['editid'];

$sql ="SELECT * from check_out where id=$id";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

    $dat= $row["Date"];  
    $cat= $row["CategoryId"];
    $qt= $row["qty"];
   

if(isset($_POST['edit'])){

    $date= $_POST['date'];  
    $ca= $_POST['ca'];
    $qty= $_POST['qty'];
    
  

    $sql = "UPDATE check_out SET Date='".$date."', CategoryId='".$ca."', qty='".$qty."' WHERE id='".$id."'";
    $result=mysqli_query($conn,$sql);

    

    if($result){
        
      $_SESSION['message'] = "Check Out Updated Successfully";
        header('location:ViewCO.php?updated');
        exit(0);

    }else{
        
        die(mysqli_error($conn));
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Check Out Items </title>
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

  <h2>Edit Check Out Items </h2>
  <form method="post">
    <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> 

      <input type="date" class="form-control" id="date" placeholder="Enter date"  name="date" value="<?php echo $dat; ?>">
    </div>

    <div class="form-group">
    
      <input type="text" class="form-control" id="ca" placeholder="Enter CategoryId"  name="ca" value="<?php echo $cat; ?>">
    </div>

    <div class="form-group">
    
      <input type="text" class="form-control" id="qty" placeholder="Enter CategoryId"  name="qty" value="<?php echo $qt; ?>">
    </div>

    
    
    <button type="submit" class="btn btn-primary" name="edit">Update</button>
  </form>
</div>

</body>
</html>
