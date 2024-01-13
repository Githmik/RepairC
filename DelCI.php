<?php
include "connection.php" ;
session_start();

if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $sql = "DELETE from check_in where id=$id";
    $result=mysqli_query($conn,$sql);

    

    if($result){

        $_SESSION['message'] = "Record Deleted Successfully";
        header('location:ViewCI.php');
        exit(0);

    }else{
        die(mysqli_error($conn));
    }
}


?>