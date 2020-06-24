<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
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
  height: 600px;
  background-color: black;
  opacity: .7;
  color: white;
}
.form-control
{
  width: 300px;
  height: 40px;
  background-color: black;
  color: white;
}
.Approve
{
  margin-left: 430px;
}
.bt
{
  margin-left: 110px;
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

                <div class="h"><a href="books.php">All Data of Books</a></div>
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
              <div class="container">
                <h2 style="text-align: center;">SMART LIBRARY</h2>
               <br>
              <h3 style="text-align: center;">Approve Request</h3>
              <br><br>
              <form class="Approve" action="" method="post">
               <!-- <input class="form-control" type="text" name="approve" placeholder="Yes or No" required="">-->
                <input class="form-control" type="date" name="issue" placeholder="Issue Date dd-mm-yyyy" required="">
                <br>
                <input class="form-control" type="date" name="retorn" placeholder="Return Date dd-mm-yyyy" required="">
                <br><br>
                <div class="bt">
                <button class="btn btn-default" type="submit" name="submit">Approve</button>
              </form>
            </div>
          </div>
      </div>

      <?php
      if(isset($_POST['submit']))
      {
        mysqli_query($db," UPDATE `issuebook` SET `approve` = 'Borrowed', `issue` = '$_POST[issue]', `retorn` = '$_POST[retorn]' WHERE username='$_SESSION[st_name]' AND bid='$_SESSION[bid]'");

        mysqli_query($db,"UPDATE `books` SET quantity=quantity-1 WHERE bid='$_SESSION[bid]' ");

        $res=mysqli_query($db,"SELECT quantity FROM `books` WHERE bid='$_SESSION[bid]' ");

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['quantity']==0)
          {
            mysqli_query($db,"UPDATE `books` SET status='Unavailable' WHERE bid='$_SESSION[bid]'");
          }
        }
        ?>
        <script type="text/javascript">
          alert("Approval Succesfull.");
          window.location="request.php";
        </script>
        <?php
       }
      ?>
</body>
</html>