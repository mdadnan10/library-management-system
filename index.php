<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>library management system
    </title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <style type="text/css">

    nav
    {
      float: right;
    }
     #container h3
        {
            margin: 15px auto;
            padding-right: 50px;
        } 
      #container ul li
        {
            background-color: black;
            width: 93px;
            height: 28px;
            float: left;
            line-height: 28px;
            text-align: center;
            font-size: 17px;
            margin: 35px auto;
            padding: 2px;
            padding-right: 30px;
        }
        #container ul li:hover
        {
          background-color: #00544c;
        }  
        #container ul ul li
        {
            display: none;
            margin: 0px;
        }
        #container ul li:hover li 
        {
            display: block;
            position: relative;
        }
    </style>
</head>

 <body>
     <div class="wrapper">
     <header>
        
             <div class="logo">

            <img src="images/1.jpg">
         <h2 style="color: white; font-size: 20px;">SMART LIBRARY MANAGEMENT SYSTEM</h2>
         </div>

            <?php

            if(isset($_SESSION['login_user']))
               
               {
                ?>
               
                <nav>
                    
                   <div id="container">
                    <h3 style="color: white;">Ops !!! looks like session is expired.Need to logout and login Again.</h3>
                <ul>
                    
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
                   </div>
                </nav>

            <?php
               }
               else
               {
                ?>

                                    <nav>
                                            <div id="container">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="index.php">Login</a>
                                            <ul>
                                                <li><a href="staff_login.php">Admin</a></li>
                                                <li><a href="student_login.php">Student</a></li>
                                            </ul>
                                            </li>
                                            <li><a href="scontactus.php">Contact_us</a></li>
                                        </ul>
                                            </div>
                                    </nav>

                 <?php
               }
            
            ?>
             

                    
         </header>
         <section>

                                    <?php

                    if(isset($_SESSION['login_user']))
                       
                       {
                        ?>
                              <div class="first_img" >
                               <br><br><br>

                            <div class="box_in">
                            <br><br><br>
                         <h1 style="text-align: center; font-size: 35px;">Welcome to Smart Library</h1>
                         <br>
                          <h2 style="text-align: center; font-size: 25px;">If you want to get laid, go to college. If you want an education, go to the library.</h2>
                        </div>

                    
                    <?php
                       }
                       else
                       {
                        ?>
                        <div class="sec_image">
                         <br><br><br>
                     <div class="box">
                    <br><br><br>
                 <h1 style="text-align: center; font-size: 35px;">Welcome to Smart Library</h1>
                 <br>
                 <h1 style="text-align: center;font-size: 25px;">opens at:&nbsp 10:00 AM</h1><br>
                 <h1 style="text-align: center;font-size: 25px;">closes at:&nbsp 05:00 PM</h1><br>
                </div>

                         <?php
                       }
                    
                    ?>

         </section>

    </div>
    <?php
      include "lower.php";
    ?>
</body>
</html>