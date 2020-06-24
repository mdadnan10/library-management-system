<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>expired list</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
     .search
     {
      padding-left: 1050px;
     }

      body {
        background-image: url("images/issue.jpg");
        background-size: cover;
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
  height: 950px;
  background-color: black;
  opacity: .7;
  color: white;
}
.srch
{
  padding-left: 840px;
}
.form-control
{
  width: 300px;
  height: 40px;
  background-color: black;
  color: white;
}
.scroll
{
  width: 100%;
  height: 550px;
  overflow: auto;
}
th,td
{
  width: 97px;
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

                <div class="h"><a href="addbooks.php">Add Books</a></div>
                <div class="h"><a href="request.php">Request of Books</a></div>
                <div class="h"><a href="issue.php">Issue Information</a></div>
                <div class="h"><a href="expired.php">Expired List</a></div>
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

              <!--_______________________side nav end____________________-->

              <div class="container">

                 <?php
                 if(isset($_SESSION['login_user']))
                 {
                  ?>
                  <br>
                  <div class="srch">
                    <!--<form method="post" action="" name="form1">
                      <input type="text" name="username" class="form-control" placeholder="Username" required="">-->
                       <form method="post" action="" name="form1">
                      <!--<input type="text" name="username" class="form-control" placeholder="Username" required="">-->
                      <select class="form-control" name="username">
                        <?php
                              $res=mysqli_query($db,"SELECT * FROM student ORDER BY `student`.`username` ASC ");
                              while($row=mysqli_fetch_array($res))
                              {
                                ?>
                                <option value="<?php echo $row["username"] ?>">
                                  <?php 
                                  echo $row["username"]. "(".$row["roll"] .")"."(".$row["course"] .")";
                                   ?>
                                </option>
                                <?php
                                 }
                              ?>
                            </select>
                      <br>
                      <input type="text" name="bid" class="form-control" placeholder="Book Id" required="">
                      <h2 style="text-align: right;"><button class="btn btn-default" name="submit" type="submit">SUBMITTED</button></h2>
                    </form>
                  </div>
                  <?php
                  if(isset($_POST['submit']))
                    {
                  mysqli_query($db,"UPDATE `issuebook` SET `approve`='RETURNED' WHERE username='$_POST[username]' AND bid='$_POST[bid]' ");

                  mysqli_query($db,"UPDATE books SET quantity = quantity+1 WHERE bid='$_POST[bid]' ");
                 }
               }
                 ?>
                <h2 style="text-align: center;">Date Expired list</h2>
                <br><br>

                <?php

                $c=0;
                 
                   if(isset($_SESSION['login_user']))
                {

                  $sql="SELECT student.username,first,roll,course,books.bid,name,author,edition,department,approve,issue,retorn FROM student inner join issuebook ON student.username=issuebook.username inner join books ON issuebook.bid=books.bid WHERE issuebook.approve!='' AND issuebook.approve!='Borrowed' ORDER BY issuebook.approve='RETURNED'  ASC ";

                 $res=mysqli_query($db,$sql);
                 
                  
                  echo "<table class='table table-bordered'>";
                  //table header
                   echo "<tr style='background-color: #29AB87;'>";
                   echo "<th>"; echo "USERNAME"; echo "</th>";
                   echo "<th>"; echo "STUDENT NAME"; echo "</th>";
                   echo "<th>"; echo "ROLL"; echo "</th>";
                   echo "<th>"; echo "COURSE"; echo "</th>";
                   echo "<th>"; echo "BOOK ID"; echo "</th>";
                   echo "<th>"; echo "BOOK NAME"; echo "</th>";
                   echo "<th>"; echo "AUTHOR"; echo "</th>";
                   echo "<th>"; echo "EDITION"; echo "</th>";
                   echo "<th>"; echo "DEPARTMENT"; echo "</th>";
                   echo "<th>"; echo "STATUS"; echo "</th>";
                   echo "<th>"; echo "ISSUE DATE"; echo "</th>";
                   echo "<th>"; echo "RETURN DATE"; echo "</th>";
                   echo "</tr>";

                   echo "</table>";
                  
                  echo "<div class='scroll'>";
                  echo "<table class='table table-bordered'>";

                   while($row=mysqli_fetch_assoc($res))
                   {
                     echo "<tr>";
                     echo "<td>"; echo $row['username']; echo "</td>";
                     echo "<td>"; echo $row['first']; echo "</td>";
                     echo "<td>"; echo $row['roll']; echo "</td>";
                     echo "<td>"; echo $row['course']; echo "</td>";
                     echo "<td>"; echo $row['bid']; echo "</td>";
                     echo "<td>"; echo $row['name']; echo "</td>";
                     echo "<td>"; echo $row['author']; echo "</td>";
                     echo "<td>"; echo $row['edition']; echo "</td>";
                     echo "<td>"; echo $row['department']; echo "</td>";
                     echo "<td>"; echo $row['approve']; echo "</td>";
                     echo "<td>"; echo $row['issue']; echo "</td>";
                     echo "<td>"; echo $row['retorn']; echo "</td>";
                     echo "</tr>";
                   }
                   echo "</table>";
                   echo "</div>";
                  }
                else
                {
                  ?>
                  <br><br><br><br><br>
                  <h1 style="text-align: center; color: red;">NEED TO LOGIN FIRST.</h1>
                  <?php
                }
              ?>
            </div>
          </div>
      </body>
      </html>