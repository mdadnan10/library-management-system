<?php
include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <title>Books</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
     .search
     {
      padding-left: 1050px;
     }

      body {
  background-color: #8a6d3b;
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
.book
{
  width: 400px;
  margin: 0px auto;
}
.form-control
{
 background-color: #080707;
 color: white;
 height: 40px;
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
               
                <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>

                <div class="container" style="text-align: center;">

                  <h2 style="color: black; text-align: center;"><b>Update Book Details</b></h2>
                  <br>
                  <?php
                  if(isset($_SESSION['login_user']))
                     {
                      
                      if(isset($_GET['edit']))
                      {
                        $edit=$_GET['edit'];
                        $update=mysqli_query($db,"SELECT * FROM `books` WHERE id='$edit' ");
                        $row=mysqli_fetch_assoc($update);
                      }
                       ?>
                   <form class="book" action="" method="post">
                   <h4 style="color: white;"> Book id :</h4><input required="required" type="text" name="bid" value="<?php echo $row["bid"]; ?>" class="form-control">
                  
                   <h4 style="color: white;"> Book Name :</h4><input required="required" type="text" name="name" value="<?php echo $row["name"]; ?>" class="form-control">
                   
                   <h4 style="color: white;"> Author Name :</h4><input required="required" type="text" name="author" value="<?php echo $row["author"]; ?>" class="form-control">
                   
                   <h4 style="color: white;"> Edition :</h4><input required="required" type="text" name="edition" value="<?php echo $row["edition"]; ?>" class="form-control">
                   
                   <h4 style="color: white;"> Quantity :</h4><input required="required" type="text" name="quantity" value="<?php echo $row["quantity"]; ?>" class="form-control">
                   
                   <h4 style="color: white;"> Department :</h4><input required="required" type="text" name="department" value="<?php echo $row["department"]; ?>" class="form-control">
              
                   <h4 style="color: white;"> Rack No or Shelf No :</h4><input required="required" type="text" name="rack" value="<?php echo $row["rack"]; ?>" class="form-control">
                   <br>

                   <button class="btn btn-default" type="submit" name="submit"> UPDATE </button>
    
                  </form>

                <?php
                echo "</div>";

                   if(isset($_POST['submit']))
                   {
                        mysqli_query($db,"UPDATE `books` SET `bid`='$_POST[bid]',`name`='$_POST[name]',`author`='$_POST[author]',`edition`='$_POST[edition]',`status`='Available',`quantity`='$_POST[quantity]',`department`='$_POST[department]',`rack`='$_POST[rack]' WHERE id='$edit' ");
                        ?>
                        <script type="text/javascript">
                          alert("Book data editted succesfully.");
                          window.location="books.php";
                        </script>

                        <?php
                     }
                   }
                     else
                     {
                      ?>
                      <br><br><br><br><br>
                      <h1 style="text-align: center; color: yellow;">NEED TO LOGIN FIRST.</h1>
                      <?php
                     }
                ?>
              
              </div>
              <script>
              function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
              }

              function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
                document.body.style.backgroundColor = "#8a6d3b";
              }
              </script>
</body>
</html>