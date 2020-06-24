<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Send Message</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
     .search
     {
      padding-left: 1050px;
     }

      body {
        background-image: url("images/send.jpg");
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
  height: 900px;
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
  height: 440px;
  overflow: auto;
}
th,td
{
  width: 97px;
}
.form-control
{
  width: 430px;
}
.m
{
  margin-left: 360px;
}
.t 
{
  margin-left: 360px;
}
.b
{
  margin-left: 500px;
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
               
                <p style="color: white" ><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span></p>
              

              <script>
              function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
              }

              function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
                document.body.style.backgroundColor = "#E6E6FA";
              }
              </script>
              <br><br><br>

              <!--_______________________side nav end____________________-->

              <div class="container">

                
                <h1 style="text-align: center;"><b>SMART LIBRARY</b></h1>
                <br>

                  <?php
                 if(isset($_SESSION['login_user']))
                 {
                 echo "<h3 style='text-align: center;'><b>Send Message to Student</b></h3>";
                 echo "<br>";
                  ?>
                 <form method="post" action="" name="form1">
                        
                        <div class="m">
                       <select class="form-control" name="dusername">
                        <?php
                              $res=mysqli_query($db,"SELECT * FROM student ");
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
                           <input type="text" name="tittle" class="form-control" placeholder="Tittle" required="">
                           <br>
                           </div>
                           <div class="t">
                           <textarea type="text" name="msg" class="form-control" placeholder="Write a Message..." required=""></textarea>
                           </div>
                           <br><br>
                           <div class="b">
                           <button class="btn btn-default" name="submit" type="submit">send message</button></h2>
                         </div>
                    </form>
                    <?php
                    if(isset($_POST['submit']))
                    {
                      mysqli_query($db,"INSERT INTO `message` VALUES('', '$_SESSION[login_user]', '$_POST[dusername]', '$_POST[tittle]', '$_POST[msg]', 'sent')");
                      ?>
                          <script type="text/javascript">
                          alert("Message Send Sucessfully.");
                          window.location="message.php";
                        </script>
                      <?php
                    }
                    ?>
              <br><br>
            <div class="scroll">
            <table class="table table-bordered">
            <tr style="background-color: #29AB87">
            <th>Username</th>
            <th>Tittle</th>
            <th>Messages</th>
            <th>Status</th>
            </tr>
            <?php
              $res=mysqli_query($db,"SELECT * FROM `message` order by reed='seen' desc");
              while($row=mysqli_fetch_assoc($res))
              {
                echo "<tr>";
                echo "<td>"; echo $row["dusername"]; echo "</td>";
                echo "<td>"; echo $row["tittle"]; echo "</td>";
                echo "<td>"; echo $row["msg"]; echo "</td>";
                echo "<td>"; echo $row["reed"]; echo "</td>";
                echo "</tr>";
              }
            ?>            
             </table>
           </div>

               <?php
                  }
              else
                {
                  ?>
                  <br><br><br><br><br><br>
                  <h1 style="text-align: center; color: yellow;">NEED TO LOGIN FIRST.</h1>
                  <?php
                }
              

              ?>
             

              </div>
            </div>
       </body>
    </html>
      