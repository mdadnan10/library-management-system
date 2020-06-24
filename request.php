<?php
    include "connection.php";
    include "navbar.php";
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
        background-image: url("images/handing.jpg");
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
  height: 750px;
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
.s
{
  text-align: center;
  color: yellow;
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
              <br>
<!--_________________________________sidenav end______________________-->


               
              <div class="container">

                 <?php
                 if(isset($_SESSION['login_user']))
                 {
                  ?>
                <br>
                  <div class="srch">
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
                      <h2 style="text-align: right;"><button class="btn btn-default" name="submit" type="submit">APPROVE</button></h2>
                    </form>
                  </div>
                   <?php
                   }
                 ?>

                <h3 style="text-align: center;">Request of Books</h3>
                <br>

         <?php
         
           if (isset($_SESSION['login_user']))

           {
        $sql="SELECT student.username,first,roll,course,books.bid,name,author,edition,status,department FROM student inner join issuebook ON student.username=issuebook.username inner join books ON issuebook.bid=books.bid WHERE issuebook.approve=''";
            $res=mysqli_query($db,$sql);
        
            if (mysqli_num_rows($res)==0) 
             {
              echo "<br><br><br>";
              echo "<div class='s'>";
              echo "<h2><b>";
               echo "There is no Pending Request.";
               echo "</b></h2>";
               echo "</div>";
             }
             else
             {
              echo "<table class='table table-bordered'>";
      echo "<tr style='background-color: #29AB87;' >";
      //table header

       echo "<th>"; echo "USERNAME"; echo "</th>";
       echo "<th>"; echo "STUDENT NAME"; echo "</th>";
       echo "<th>"; echo "ROLL"; echo "</th>";
       echo "<th>"; echo "COURSE"; echo "</th>";
       echo "<th>"; echo "BOOK ID"; echo "</th>";
       echo "<th>"; echo "BOOK NAME"; echo "</th>";
       echo "<th>"; echo "AUTHOR"; echo "</th>";
       echo "<th>"; echo "EDITION"; echo "</th>";
       echo "<th>"; echo "STATUS"; echo "</th>";
       echo "<th>"; echo "DEPARTMENT"; echo "</th>";
       
       echo "</tr>";

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
         echo "<td>"; echo $row['status']; echo "</td>";
         echo "<td>"; echo $row['department']; echo "</td>";
         

         echo "</tr>";
       }
       echo "</table>";
             }

        }
        else
          {
            ?>
            <br><br><br>
            <h4 style="text-align: center; color: yellow;">You Need to Login to See the Requests.</h4>
            <?php
          }

          if(isset($_POST['submit']))
            {
              $_SESSION['st_name']=$_POST['username'];
              $_SESSION['bid']=$_POST['bid'];
         ?>
         <script type="text/javascript">
           window.location="approve.php";
         </script>
         <?php
       }
       ?>
      </div>
    </div>

</body>
</html>