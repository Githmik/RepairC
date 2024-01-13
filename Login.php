<?php require_once('connection.php');


if(isset($_POST['sub'])){

    $email = $_POST['email'];
    $pw =  $_POST['password'];


$errors = array();

//check the username and password has been enterd
if(!isset($_POST['email'])  or strlen(trim($_POST['email']))   <1   ){
    $errors[] = "Email is Missing or Invalid";

}

if(!isset($_POST['password'])  or strlen(trim($_POST['password']))   <1   ){
    $errors[] = "Password is Missing or Invalid";

}

$sql = "SELECT * FROM userlog WHERE email='$email' AND password='$pw'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if($row["usertype"] == 'user'){

    header('location: userHM.php');

}elseif($row["usertype"] == 'admin'){

    header('location: AdminHM.php');
 
}else{

    echo 'Usernme or Password is incorrect';
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Loginnew.css">
    <title>Login Page</title>
</head>
<body>
    <section>
        <div class="form-box">
          <div class="form-value">
            <form action="" method="POST">
             <h2>Login</h2>
            <div class="inputbox">
                
                <input type="text" name="email"  >   
                <label>Email </label>    
                </div>
                
                <div class="inputbox">
                           
                <input type="password" name="password"  id="myInput" >  
                <label>Password</label>          
                </div>
                
                <div class="checkBox">
                    
                    <input type="checkbox" name="" onclick="myfunction()" id="show">
                    <label>Show Password -- <a href="forgotpass.php"> Forgot Password?</a>  </label> 
                     
                </div>
              
                    <button type="submit" name="sub"> Login </button>
                
                    <div class="signuplink">
                        Not a member? <a href="Sign.php">SignUp</a>
                    </div>
            </form>

          </div>
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