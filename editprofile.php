<?php
   include "connection.php";
   include "navbar.php";
  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>editprofile</title>
  	<style type="text/css">
  		.wrapper
  		{
  			width: 400px;
  			margin: 0 auto;
  			color: white;
  		}
      .form-control
      {
        margin-left: 380px;
        width: 400px;
        height: 40px;
        background-color: black;
        color: white;
      }
  	</style>
  </head>
  <body style="background-color: green;">
  	<div class="container">

  		<div class="wrapper" >

  			<h2 style="text-align: center;">Update My Profile Data</h2>
  			
                  <?php
                   if(isset($_GET['edit']))
                      {
                        $edit=$_GET['edit'];
                        $update=mysqli_query($db,"SELECT * FROM `staff` WHERE id='$edit' ");
                        $row=mysqli_fetch_assoc($update);
                      }
                       ?>
                		</div>
                    <br>
                  <form class="staff" action="" method="post">
                   <h4 style="color: white; text-align: center;"> Staff id :</h4><input required="required" type="text" name="sid" value="<?php echo $row["sid"]; ?>" class="form-control">
                  
                   <h4 style="color: white; text-align: center;"> First Name :</h4><input required="required" type="text" name="first" value="<?php echo $row["first"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Last Name :</h4><input required="required" type="text" name="last" value="<?php echo $row["last"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Username :</h4><input style="color: black;" disabled="disabled" type="text" name="username" value="<?php echo $row["username"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Password :</h4><input required="required" type="text" name="password" value="<?php echo $row["password"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Email :</h4><input required="required" type="text" name="email" value="<?php echo $row["email"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Mobile No :</h4><input required="required" type="text" name="mobile" pattern="[0-9]{10}" value="<?php echo $row["mobile"]; ?>" class="form-control">
                    <br>
                  <p style="text-align: center;"> <button class="btn btn-default" type="submit" name="submit"> UPDATE </button> </p>
    
                  </form>
  	          	</div>
                   
                   <?php
                   if(isset($_POST['submit']))
                   {
                        mysqli_query($db,"UPDATE `staff` SET `sid`='$_POST[sid]',`first`='$_POST[first]',`last`='$_POST[last]',`password`='$_POST[password]',`email`='$_POST[email]',`mobile`='$_POST[mobile]' WHERE id='$edit' ");
                        ?>
                        <script type="text/javascript">
                          alert("Profile Updated.");
                          window.location="Profile.php";
                        </script>
                        <?php
                           }
                           ?>

  			</div>
   </div>
  </body>
  </html>