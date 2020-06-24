<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>contacted students</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
     .search
     {
      padding-left: 1030px;
     }
     .delete
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
  height: 900px;
  background-color: black;
  opacity: .7;
  color: white;
}
.scroll
{
  width: 100%;
  height: 700px;
  overflow: auto;
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
                </div><br>
                
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

       <!--_____________________________side nav end____________________________-->

       <div class="container">
       	<br>
        <h2 style="text-align: center;">HELP REQUESTS</h2>
        <br><br>

        <div class="scroll">
            <table class="table table-bordered">
            <tr style="background-color: #29AB87">
            <th>Sr.no</th>
            <th>Name</th>
            <th>Contact no</th>
            <th>Email</th>
            <th>Tittle</th>
            <th>Messages</th>
            <th>Delete</th>
            </tr>
            <?php
            if(isset($_GET["delid"]))
             {
               $delid=$_GET["delid"];
               mysqli_query($db,"DELETE FROM `CONTACT` WHERE id='$delid'");
             }
            ?>
            <?php
              $res=mysqli_query($db,"SELECT * FROM `contact`");
              while($row=mysqli_fetch_assoc($res))
              {
                echo "<tr>";
                echo "<td>"; echo $row["id"]; echo "</td>";
                echo "<td>"; echo $row["name"]; echo "</td>";
                echo "<td>"; echo $row["mobile"]; echo "</td>";
                echo "<td>"; echo $row["email"]; echo "</td>";
                echo "<td>"; echo $row["tittle"]; echo "</td>";
                echo "<td>"; echo $row["msg"]; echo "</td>";
                ?>
                <td><a href="contacted.php?delid=<?php echo $row["id"] ?>">Solved</a></td>
                <?php
                echo "</tr>";
              }
            ?>            
             </table>
           </div>
       	
       </div>

</body>
</html>