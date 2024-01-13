<?php
include "connection.php" ;
session_start();

if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $sql = "DELETE from unit_category where id=$id";
    $result=mysqli_query($conn,$sql);

    

    if($result){

        $_SESSION['message'] = "Ctegory Deleted Successfully";
        header('location:ViewCategory.php');
        exit(0);

    }else{
        die(mysqli_error($conn));
    }
}


?>