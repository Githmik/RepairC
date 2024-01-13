<?php require_once('connection.php');?>
<?php

      //check for the form submission
      if(isset($_POST['submit'])){

        $errors = array();

        //check the username and password has been enterd
        if(!isset($_POST['email'])  or strlen(trim($_POST['email']))   <1   ){
            $errors[] = "Username is Missing or Invalid";

        }

        if(!isset($_POST['password'])  or strlen(trim($_POST['password']))   <1   ){
            $errors[] = "Password is Missing or Invalid";

        }

       


    }



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.css">
        <title>User Login</title>

    </head>
    <body>
        
        <div class="container">

            <h2 class="head">Sign In</h2>
            <form action="" method="post" autocomplete="off">

           
                <div class="txtf">
                <input type="text" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" id="myInput" required>        
                </div>
                
                <div class="checkBox">
                    <label>Show Password</label>
                    <input type="checkbox" name="" onclick="myfunction()" id="show">
                    
                </div>

                    <div class="pass"><a href="forgotpass.php"> Forgot Password?</a></div>

                    <input type="submit" name="submit" value="Login">

                    <div class="signuplink">
                        Not a member? <a href="signUp.php">SignUp</a>
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
    </body>
</html>
<?php mysqli_close($conn);?>