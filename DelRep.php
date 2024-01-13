<?php
include "connection.php" ;
session_start();

if(isset($_GET['delid'])){
    $id = $_GET['delid'];

    $sql = "DELETE from repaired_units where id=$id";
    $result=mysqli_query($conn,$sql);

    
    if($result){
        $_SESSION['message'] = "Item Deleted Successfully";
        header('location:ViewRep.php');
        exit(0);

    }else{
        $_SESSION['message'] = "Item Not Deleted";
        die(mysqli_error($conn));
        exit(0);
    }
}


?>