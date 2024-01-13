<?php
include "connection.php" ;
session_start();

if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $sql = "DELETE from unit_faults where id=$id";
    $result=mysqli_query($conn,$sql);


    if($result){

        $_SESSION['message'] = "Fault Deleted Successfully";
        header('location:ViewFaults.php');
        exit(0);

    }else{
        die(mysqli_error($conn));
    }
}
?>