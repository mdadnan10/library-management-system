<?php
include "connection.php";
include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>

	<title>staff login</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	  
  <style type="text/css">
  	section
  	{
     margin-top: -20px;
  	}
  </style>

    </head>
    <body>
	<section>
		<div class="login_img">
			<br><br>
			 <div class="box1">
			 	<br>
 	     <h1 style="text-align: center; font-size: 45px;">Smart Library</h1>
 	     <br>
 	     <h1 style="text-align: center;font-size: 25px;">Admin login here</h1><br>
 	     <form name="login" action="" method="post">
        <br>

 	     	<div class="login">

 	     	<input class="form-control" type="text" name="username" placeholder="Username" required="" >
 	     	<br>
 	     	<input class="form-control" type="password" name="password" placeholder="password" required="">
        <br>
 	  
 	     </div>


 	     <h2 style=" text-align: center;"><input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 80px; height: 30px;"></h2>

 	     <br><br>
 	     	

 	     </form>

 	     <p style="color: white; text-align: center;">forgot password ? &nbsp <a style="color: yellow;" href="update_password.php">click here</a></p>
 	    </div>
	</div>
		
	</section>

    <?php

    if(isset($_POST['submit']))
    {
      $count=0;
     $res=mysqli_query($db,"SELECT * FROM `staff` WHERE username='$_POST[username]' AND password='$_POST[password]';");

     $row=mysqli_fetch_assoc($res);
     $count=mysqli_num_rows($res);

     if($count==0)
     {
      ?>
      
       <script type="text/javascript">
         alert("The Username and Password doesn't match.");
       </script>
     
      <?php
     }
     else
     {

          /*---------if username and password matches----*/

      $_SESSION['login_user'] = $_POST['username'];
      $_SESSION['pic']=$row['pic'];
      ?>
      <script type="text/javascript">
        window.location="staffhome.php"
      </script>
      <?php
     }
    }
    
    ?>

</body>
</html>