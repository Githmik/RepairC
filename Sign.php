<?php require_once('connection.php');


if(isset($_POST['sub'])){

$name = $_POST['un'];
$email = $_POST['email'];
$pw =  $_POST['password'];
$cpw = $_POST['cp'];
$type =  $_POST['utype'];

$pwh = password_hash($pw, PASSWORD_DEFAULT);

$error = array();

if(empty($name) OR empty($email) OR empty($pw) OR empty($cpw) OR empty($type)){
    array_push($error, "-!-All fields are required-!-");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($error, "-!-Email is not valid-!-");
}

if(strlen($pw)<8){
    array_push($error, "-!-Password must be eight characters long-!-");
}

if($pw !== $cpw){
    array_push($error, "-!-Password not match-!-");
}
 
$sq = "SELECT * FROM userlog WHERE email='$email'";
$res=mysqli_query($conn,$sq);
$row = mysqli_num_rows($res);

if($row>0){
    array_push($error, "-!-Email already exit-!-");
}




if(count($error)>0){

    foreach($error as $error){
        echo '<span class= "errmsg">'.$error.'</span>';
    }
}else{

    $sql = "INSERT INTO userlog (uname, email, password, usertype) VALUES ('".$name."', '".$email."', '".$pw."', '".$type."')";
    $result=mysqli_query($conn,$sql);

    if ($result) {

        echo '<div class= alert alert-success>You are registered successfully</div>';
       /* header('location: Login.php');  */                          
    
    } else{

    die("Somthing went wrong");
    }


}

/*$sql = "INSERT INTO log (uname, email, password, confirmpw, usertype) VALUES ('".$name."', '".$email."', '".$pw."', '".$cpw."', '".$type."')";
$result=mysqli_query($conn,$sql);

if ($result) {

    $_SESSION['message'] = "Category Inserted Successfully";
    header('location: AddCategory.php');                            
    exit(0);

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
} */




    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sign.css">
    <title>Sign Up Page</title>
</head>
<body>
    <section>
        <div class="form-box">
          
            <form method="post">
             <h2>Sign Up</h2>

            

                 <div class="inputbox">

                 <input type="text" name="un"  >   
                <label>Username </label>    
                </div>

                <div class="inputbox">
                <input type="text" name="email"  >   
                <label>Email </label>    
                </div>
                
                <div class="inputbox">
                           
                <input type="password" name="password"  id="myInput" >  
                <label>Password</label>
                </div>

                <div class="checkbox">
                <label>Show Password</label>        
                <input type="checkbox" name="" onclick="myfunction()" id="show">
                </div>

                <div class="inputbox">
                <input type="password" name="cp"  > 
                  
                <label>Confirm Password </label>    
                </div>

                <div class="inputbox">
                <input type="text" name="utype"  > 
                  
                <label>User Type </label>    
                </div>
                
                
                
                    <button type="submit" name="sub"> Submit </button>
                
                    <div class="login">
                        Already a member? <a href="Login.php">Sign In</a>
                    </div>
            </form>

            <script type="text/javascript">
                    function myfunction(){
                        var x= document.getElementById("myInput");

                        if(x.type==="password"){
                            x.type = "text";

                        }
                        else{
                            x.type = "password";

                        }
                    }
                </script>

        </div>
    </section>
</body>
</html>