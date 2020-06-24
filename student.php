<?php
include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <title>Student information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
     .search
     {
      padding-left: 1000px;
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

       <!--___________________________sidenav_____________________-->

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
                
               <div class="h"><a href="addbooks.php">Add Books</a></div>
                <div class="h"><a href="request.php">Request of Books</a></div>
                <div class="h"><a href="issue.php">Issue Information</a></div>
                <div class="h"><a href="expired.php">Expired & Returned</a></div>
                <div class="h"><a href="message.php">Message to Student</a></div>
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

  <!--_________________________search bar___________________________-->

     <div class="search">
       <form class="navbar-form" method="post" name="form1">
        
            <input class="form-control" type="text" name="search" placeholder="Search a student..." required="">
            <button style="background-color: #3CB371" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        
         
       </form>
     </div>


      <h2>List of Students</h2>
       
       <?php

       if (isset($_POST['submit'])) 
         {
             $q=mysqli_query($db,"SELECT id,first,username,roll,course,batch,address,contact,email FROM `student` WHERE first LIKE '%$_POST[search]%'  or username LIKE '%$_POST[search]%' or roll LIKE '%$_POST[search]%' or course LIKE '%$_POST[search]%' or batch LIKE '%$_POST[search]%' ");

             if (mysqli_num_rows($q)==0) 
             {
              echo "<h2><b>";
               echo "Sorry! no student found. Try searching again.";
               echo "</h2></b>";
             }
             else
             {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color: #FF0000;' >";
      //table header
      echo "<th>"; echo "Sr No"; echo "</th>";
       echo "<th>"; echo "Full Name"; echo "</th>";
       echo "<th>"; echo "User Name"; echo "</th>";
       echo "<th>"; echo "Roll No"; echo "</th>";
       echo "<th>"; echo "Stream"; echo "</th>";
       echo "<th>"; echo "Batch"; echo "</th>";
       echo "<th>"; echo "Adress"; echo "</th>";
       echo "<th>"; echo "Mobile No"; echo "</th>";
       echo "<th>"; echo "Email id"; echo "</th>";
       echo "<th>"; echo "Student profile"; echo "</th>";
       echo "</tr>";

       while($row=mysqli_fetch_assoc($q))
       {
         echo "<tr>";
         echo "<td>"; echo $row['id']; echo "</td>";
         echo "<td>"; echo $row['first']; echo "</td>";
         echo "<td>"; echo $row['username']; echo "</td>";
         echo "<td>"; echo $row['roll']; echo "</td>";
         echo "<td>"; echo $row['course']; echo "</td>";
         echo "<td>"; echo $row['batch']; echo "</td>";
         echo "<td>"; echo $row['address']; echo "</td>";
         echo "<td>"; echo $row['contact']; echo "</td>";
         echo "<td>"; echo $row['email']; echo "</td>";
         ?>
         <td><img src="profiles/<?php echo $row['pic'] ?>" height="120px" width="120px"></td>
         <?php

         echo "</tr>";
       }
       echo "</table>";
             }
         }
         /* if button is not presed*/

         else
         {
             $res=mysqli_query($db,"SELECT id,first,username,roll,course,batch,address,contact,email,pic FROM `student` ;");

      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color: #3CB371;' >";
      //table header
       echo "<th>"; echo "Sr No"; echo "</th>";
       echo "<th>"; echo "Full Name"; echo "</th>";
       echo "<th>"; echo "User Name"; echo "</th>";
       echo "<th>"; echo "Roll No"; echo "</th>";
       echo "<th>"; echo "Stream"; echo "</th>";
       echo "<th>"; echo "Batch"; echo "</th>";
       echo "<th>"; echo "Adress"; echo "</th>";
       echo "<th>"; echo "Mobile No"; echo "</th>";
       echo "<th>"; echo "Email id"; echo "</th>";
       echo "<th>"; echo "Student profile"; echo "</th>";
       echo "</tr>";

       while($row=mysqli_fetch_assoc($res))
       {
         echo "<tr>";
         echo "<td>"; echo $row['id']; echo "</td>";
         echo "<td>"; echo $row['first']; echo "</td>";
         echo "<td>"; echo $row['username']; echo "</td>";
         echo "<td>"; echo $row['roll']; echo "</td>";
         echo "<td>"; echo $row['course']; echo "</td>";
         echo "<td>"; echo $row['batch']; echo "</td>";
         echo "<td>"; echo $row['address']; echo "</td>";
         echo "<td>"; echo $row['contact']; echo "</td>";
         echo "<td>"; echo $row['email']; echo "</td>";
         ?>
         <td><img src="profiles/<?php echo $row['pic'] ?>" height="120px" width="120px"></td>
         <?php

         echo "</tr>";
       }
       echo "</table>";
         }

     ?>


</body>
</html>