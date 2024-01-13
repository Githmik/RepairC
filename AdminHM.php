<?php require_once('connection.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .wrapper{
                background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(SLT-2.jpg);
                background-position: center;
                background-size: cover;
                height: 100vh;
                align-items: center;
                justify-content: center;
            }

            body{
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

            ul li ul{
                position: absolute;
                top: 60px;
                display: none;

            }

            ul li:hover> ul{
                display: block;
            }

        

            ul li ul li{
                width: 60px;
                float: none;
                display: list-item;
                position: relative;
            }

            .wrapper .center{
                margin: auto;
                width: 50%;
                border: 3px transparent;
                padding: 200px 0;
                text-align: center;
            }

            .wrapper .center h2{
                font-size: 30px;
                color: #fff;

            }

            .wrapper .center h2 span{
                background: green;
                color: white;
                border-radius: 5px;

            }

            .wrapper .center .button{
                display: inline-block;
                background: white;
                padding: 5px 30px;
                text-align: center;
                margin: 0px 5px;
                border-radius: 25px;
                font-weight: bold; 
                color: black;
                font-size: 20px;
                position: relative;
            }

            .wrapper .center .button:hover {
                   background-color: red;
                   color: white;
}



        </style>

    </head>

    <body>
        <div class="wrapper">

        <div class="nav">
            
             <h2>Repair Center Management System</h2>
            <ul>
                <li><a href="#">Category</a>
                  <ul>
                    
                    <li> <a href="ViewCategory.php">View Category</a></li>
                    <li> <a href="SearchCat.php">Search Category</a></li>
                  </ul>
                </li>  
                <li><a href="#">Faults</a>
                  <ul>
                    
                    <li><a href="ViewFaults.php">View Faults</a> </li>
                    <li> <a href="SearchFault.php">Search Faults</a></li>
                  </ul>
                </li>  
                <li><a href="#">Products</a>
                    <ul>
                        
                        <li><a href="ViewRep.php">View Product</a> </li>
                        <li><a href="SearchProd.php">Search Product</a> </li>
                        <li><a href="ViewCI.php">View Check In</a> </li>
                        <li><a href="ViewCO.php">View Check Out</a> </li>
                        
                        
                    </ul>
                </li>

                <li><a href="#">Reports</a>
                    <ul>
                        <li><a href="filterdaily.php">Daily Report</a> </li>
                        <li><a href="filterDate.php">Monthly Report</a> </li>
                        <li><a href="filterfault.php">Fault Report</a> </li>
                        
                        
                    </ul>
                </li>
                
                
            </ul>

            
        </div>
        <div class="center">
                  <h2>Hi,<span>admin</span></h2>
                  
                  
                     <a href="home.php" class="button">Home</a>
                     
                     <a href="Login.php" class="button">Logout</a>
                  
                  
              </div>
       
        </div>
    </body>
</html>