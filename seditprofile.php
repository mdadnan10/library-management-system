<?php
   include "sconnection.php";
   include "snavbar.php";
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
      
        width: 400px;
        height: 40px;
        background-color: black;
        color: white;
      }
    </style>
  </head>
  <body style="background-color: green;">

      <div class="wrapper" >

        <h2 style="text-align: center;">Update My Profile Data</h2>
        
                  <?php
                   if(isset($_GET['edit']))
                      {
                        $edit=$_GET['edit'];
                        $update=mysqli_query($db,"SELECT * FROM `student` WHERE id='$edit' ");
                        $row=mysqli_fetch_assoc($update);
                      }
                       ?>
                       <br>
        
                  <form class="student" action="" method="post">
                   <h4 style="color: white; text-align: center;"> Full Name :</h4><input required="required" type="text" name="first" value="<?php echo $row["first"]; ?>" class="form-control">
                  
                   <h4 style="color: white; text-align: center;"> User Name :</h4><input style="color: black;" disabled="disabled" type="text" name="username" value="<?php echo $row["username"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Password :</h4><input required="required" type="text" name="password" value="<?php echo $row["password"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Roll No :</h4><input required="required" type="text" name="roll" value="<?php echo $row["roll"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Stream :</h4><input required="required" type="text" name="course" value="<?php echo $row["course"]; ?>" class="form-control">

                   <h4 style="color: white; text-align: center;"> Batch :</h4><input required="required" type="text" name="batch" value="<?php echo $row["batch"]; ?>" class="form-control">

                   <h4 style="color: white; text-align: center;"> Address :</h4><input required="required" type="text" name="address" value="<?php echo $row["address"]; ?>" class="form-control">

                   <h4 style="color: white; text-align: center;"> Mobile No :</h4><input required="required" type="text" name="contact" pattern="[0-9]{10}" value="<?php echo $row["contact"]; ?>" class="form-control">
                   
                   <h4 style="color: white; text-align: center;"> Email :</h4><input required="required" type="text" name="email" value="<?php echo $row["email"]; ?>" class="form-control">
                   
                    <br>
                  <p style="text-align: center;"> <button class="btn btn-default" type="submit" name="update"> UPDATE </button> </p>
    
                  </form>
                   
                   <?php
                   if(isset($_POST['update']))
                   {
                        mysqli_query($db,"UPDATE `student` SET `first`='$_POST[first]', `password`='$_POST[password]', `roll`='$_POST[roll]', `course`='$_POST[course]', `batch`='$_POST[batch]', `address`='$_POST[address]', `contact`='$_POST[contact]',  `email`='$_POST[email]'  WHERE id='$edit' ");
                        ?>
                        <script type="text/javascript">
                          alert("Profile Updated.");
                          window.location="sProfile.php";
                        </script>
                        <?php
                           }
                           ?>
     
             </div>
      
  </body>
  </html>