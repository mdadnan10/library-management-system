<?php
    include "sconnection.php";
    include "snavbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
     .search
     {
      padding-left: 1050px;
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
                <div class="h"><a href="sRequest.php">Requested Books</a></div>
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
         <?php

              if (isset($_SESSION['login_user'])) 
         {
             $q=mysqli_query($db,"SELECT * FROM issuebook WHERE username='$_SESSION[login_user]' ;");

             if (mysqli_num_rows($q)==0) 
             {
               echo "<br><br><br>";
              echo "<h2><b>";
               echo "There is no Pending Request.";
               echo "</b></h2>";
             }
             else
             {
      echo "<table class='table table-bordered table-hover'>";
      //table header
       echo "<tr style='background-color: #29AB87;'>";
       echo "<th>"; echo "Book Id"; echo "</th>";
       echo "<th>"; echo "Status"; echo "</th>";
       echo "<th>"; echo "Issue Date"; echo "</th>";
       echo "<th>"; echo "Return Date"; echo "</th>";
       echo "</tr>";

       while($row=mysqli_fetch_assoc($q))
       {
         echo "<tr>";
         echo "<td>"; echo $row['bid']; echo "</td>";
         echo "<td>"; echo $row['approve']; echo "</td>";
         echo "<td>"; echo $row['issue']; echo "</td>";
         echo "<td>"; echo $row['retorn']; echo "</td>";
         echo "</tr>";
       }
       echo "</table>";
             }
         }
         else
         {  
         	echo "<br><br><br>";
         	echo "<h2><b>";
         	echo "Please Login First to see the Request Information";
         	echo "</b></h2>";
         }
         ?>

</body>
</html>