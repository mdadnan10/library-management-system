<?php
  include "sconnection.php";
  include "snavbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>contact us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 <style type="text/css">
     .search
     {
      padding-left: 1030px;
     }
     .request
     {
      padding-left: 990px;
     }

      body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
  margin-left: 20px;
}
.h:hover
{
   color: white;
   width: 300px;
   height: 45px;
   background-color: #00544c;
}
.container
{
  height: 600px;
  background-color: black;
  opacity: .7;
  color: white;
}
.m
{
  margin-left: 10px;
  width: 400px;
  height: 40px;
  background-color: black;
  color: white;
  padding-left: 60px;
}
.form-control
{

  margin-left: 10px;
  width: 400px;
  height: 40px;
  background-color: black;
  color: white;
}
.c
{
  
  float: right;
  }
.c h3
{
  padding-right: 130px;
}
.c h5
{
  padding-left: 125px; 
}
.c p
{
  padding-left: 10px;
}

   </style>
</head>
<body>

      <!--_________________________side navigation____________-->


                 <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


                 <div style="color: white; margin-left: 60px; font-size: 20px;">
                      <?php
                      if(isset($_SESSION['login_user']))
                       {
                        echo "<img class='img-circle profile_img' height=120 width=120 src='profiles/".$_SESSION['pic']."'>";
                         echo "<br><br>";
                         echo "Welcome ".$_SESSION['login_user'];
                       }
                     ?>
                  </div><br><br>
                  <?php
                      if(isset($_SESSION['login_user']))
                       {
                        echo "<div class='h'><a href='sprofile.php'>My Profile</a></div>";
                        }
                     ?>

                <div class="h"><a href="sbooks.php">Books Information</a></div>
                <div class="h"><a href="srequest.php">Requested Books</a></div>
                <div class="h"><a href="sissue.php">Issue Information</a></div>
              </div>

              <div id="main">
               
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
              

              <script>
              function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
              }

              function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
                document.body.style.backgroundColor = "white";
              }
              </script>
              <br>

      <!--_________________________side nav end_____________________-->

      <div class="container">
        <br>
        <h2 style="text-align: center;">CONTACT US</h2>
        <br><br><br>

         <div class="c">
          <br><br><br>
        

                <h3>Response time - 10:00 AM - 05:00 PM</h3>
                        <h5>(Except sunday & public holidays)</h5>

                <p><i class="fa fa-map-marker" aria-hidden="true"></i><b> &nbsp at/po , dist , pin </b></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i><b> &nbsp ourlibrary@gmail.com </b></p>
                
                 <p><i class="fa fa-volume-control-phone" aria-hidden="true"></i><b> &nbsp 9178649035 </b></p>
              </div>
                
               

             <div class="m"> 
        
               
        <form class="" action="" method="post">
          <input class="form-control" type="text" name="name" placeholder="Full Name" required="required" title="write your full name if registerd then write user name">
          <br>
          <input class="form-control" type="text" name="mobile" pattern="[0-9]{10}" placeholder="Mobile no" required="required" title="write your 10digit mobile no">
          <br>
          <input class="form-control" type="text" name="email" placeholder="Enter email" title="write your email optional">
          <br>
          <input class="form-control" type="text" name="tittle" required="required" placeholder="Give a tittle" title="give a reason for contact">
          <br>
          <textarea class="form-control" type="text" name="msg" required="required" placeholder="Write a message..." title="give brieft description"></textarea>
          <br>
          <p style="text-align: center;"><button class="btn btn-default" type="submit" name="send"><p style="color: black; text-align: center;" >SEND MESSAGE</p></button></p>
        </form>    
         <?php
                    if(isset($_POST['send']))
                    {
                      mysqli_query($db,"INSERT INTO `contact` VALUES('','$_POST[name]', '$_POST[mobile]', '$_POST[email]', '$_POST[tittle]', '$_POST[msg]')");
                      ?>
                          <script type="text/javascript">
                          alert("Message Sent.");
                          window.location="contactus.php";
                        </script>
                      <?php
                    }
                    ?>
      </div>
        
    </div>
</body>
</html>