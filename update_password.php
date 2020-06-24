<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style type="text/css">
		body
		{
			height: 650px;
			background-image: url("images/Password.png");
			background-size: cover; 
		}
   .rapper
   {
   	width: 400px;
   	height: 450px;
   	margin: 100px auto;
   	background-color: black;
   	opacity: .8;
   	color: white;
   }
   .form-control
   {
     width:  250px;
   }
	</style>
</head>
<body>
	<div class="rapper">
		<div style="text-align: center;">
		<br>
		<h1 style="text-align: center; font-size: 55px;">Smart Library</h1>
		<h1 style="text-align: center;font-size: 23px;">Change Your Password</h1><br>
	</div>
     
     <div style="padding-left: 75px">
	<form action="" method="post">
		<input type="text" name="username" class="form-control" placeholder="User Name" required=""><br>
		<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
		<input type="text" name="Password" class="form-control" placeholder="New Password" required=""><br>
   	 </div>
		<div style="padding-left: 155px;">
			<button class="btn btn-default" type="submit" name="submit" >Update</button>
			<br><br><br>
		</div>
	</form>

               <p style="color: white; text-align: center;"> Now You Can Login-> <b><a style="color: yellow;" href="staff_login.php">Login</a></style></b></p>
      </div>
         <?php
           
             if(isset($_POST['submit']))
             {
             	if(mysqli_query($db,"UPDATE `staff`  SET  password='$_POST[Password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
             	{
             		?>
             		<script type="text/javascript">
             		alert("The Password Updated Succesfully.");
                window.location="staff_login.php"
             	</script>
             		<?php
             	}
             }
            ?>
</body>
</html>