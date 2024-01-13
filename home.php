<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8" >
        <style>
            *{
                padding: 0;
                margin: 0;
                font-family: sans-serif;
                
            }
            .nav{
                height: 80px;
                width: 100%;
                margin: auto;
                padding: 35px, 0;
                background: rgb(0,0,0,.5);
                display: flex;
                align-items: center;
                justify-content: space-between;
                
            }

            .nav h2{
                color: white;
                font-family: Arial ;
                justify-content: center;
            }

            ul li{
                list-style: none;
                float: left;
                margin-top: 20px;

                
            }

            ul li a{
                width: 150px;
                color: white;
                display: block;
                text-decoration: none;
                font-size: 16px;
                text-align: center;
                padding: 10px;
            }

            ul li a:hover{
                background: red;
                transition: all ease 0.7s;
            }

            .wrapper{
                background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(SLT-2.jpg);
                background-position: center;
                background-size: cover;
                height: 100vh;
                align-items: center;
                justify-content: center;
                padding: 20px;
                padding-bottom: 0px;
            }

            .wrapper .center{
                margin: auto;
                width: 50%;
                border: 3px transparent;
                padding: 200px 0;
                text-align: center;
            }
            .wrapper .center h1{
                font-size: 50px;
                color: #fff;

            }

            .wrapper .center h1 span{
                background: green;
                color: white;
                border-radius: 5px;

            }

            .wrapper .center h2{
                font-size: 50px;
                color: #fff;

            }

            .wrapper .center h1 span{
                background: green;
                color: white;
                border-radius: 5px;

            }

            .wrapper .center .button{
                display: inline-block;
                background: white;
                padding: 10px 20px;
                text-align: center;
                margin: 0px 5px;
                border-radius: 25px;
                font-weight: bold; 
                color: black;
                font-size: 20px;
            }

            
            .wrapper .center .button:hover {
                   background-color: red;
                   color: white;
}



            

        </style></head>
        <body>
            <div class="wrapper">
            <div class="nav">
            
            <h2>Repair Center Management System</h2>
            
             </div>
            
            <div class="center">
                
                   <a href="Login.php" class="button">Admin</a>
                   <a href="Login.php" class="button">User</a>
                   
                
                
            </div>
            </div>


        </body>
        </html>
            