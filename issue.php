<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>issue books</title>
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
  height: 800px;
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
  height: 600px;
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
              <div class="container">
                <h2 style="text-align: center;">Information of Borrowed Books</h2>
                <br><br>

                <?php
                  
                  $c=0;
                 
                   if(isset($_SESSION['login_user']))
                {
                  $sql="SELECT student.username,first,roll,course,books.bid,name,author,edition,department,issue,retorn FROM student inner join issuebook ON student.username=issuebook.username inner join books ON issuebook.bid=books.bid WHERE issuebook.approve='Borrowed' ORDER BY issuebook.retorn  ASC";

                 $res=mysqli_query($db,$sql);
                 
                  
                  echo "<table class='table table-bordered' style='width:100%'>";
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
                   echo "<th>"; echo "ISSUE DATE"; echo "</th>";
                   echo "<th>"; echo "RETURN DATE"; echo "</th>";

                   echo "</tr>";
                   echo "</table>";
                  
                  echo "<div class='scroll'>";
                  echo "<table class='table table-bordered'>";

                   while($row=mysqli_fetch_assoc($res))
                   {
                     
                     $d=date("d-m-y");
                    if($d > $row['retorn'])
                    {
                      $c=$c+1;
                      
                      mysqli_query($db,"UPDATE `issuebook` SET `approve`='EXPIRED' WHERE `retorn`= '$row[retorn]' AND approve='Borrowed' LIMIT $c;");
                    
                    echo $d."<br>";
                      }
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