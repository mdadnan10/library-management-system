<?php
include "sconnection.php";
include "snavbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>Student Registration</title>

  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">
   section
   {
     margin-top: -20px;
   }
  </style>
     

</head>
    <body>
   <section>
      <div class="reg_img">
          <div class="box2">
         <br>
        <h1 style="text-align: center; font-size: 45px;">Smart Library</h1><br>
        <h1 style="text-align: center;font-size: 22px;">Register here</h1>
        <form name="registration" action="" method="post">
         <br><br>
         <div class="registration">
           <input class="form-control" type="text" name="first" placeholder="Full Name" required="" title="write your full name">
         <br>
          <input class="form-control" type="text" name="username" placeholder="Create Login Id" required="" title="loginid like name@12">
         <br>
           <input class="form-control" type="password" name="password" placeholder="Password" required="" title="character and digit">
         <br>
           <input class="form-control" type="text" name="roll" placeholder="Roll No " required="" title="write your univerdity roll number">
         <br>
           <input class="form-control" type="text" name="course" placeholder="Stream" required="" title="write your stream like bsc(hons)">
         <br>
           <input class="form-control" type="text" name="batch" placeholder="Admission Batch" required="" title="write like 2016-19">
         <br>
           <textarea row="15" cols="21" class="form-control" name="address" placeholder="Address" required="" title="at/po , dist and pin required"></textarea>
         <br>
           <input class="form-control" type="text" name="contact" pattern="[0-9]{10}" placeholder="Mobile No" required="" title="enter your 10 digit mobile no">
         <br>
           <input class="form-control" type="text" name="email" placeholder="Email" required="" title="enter a valid email id">
         <br>
         <input class="form-control" type="file" name="pic"  required="">
         <br>
           <h2 style=" text-align: center;"><input class="btn btn-default" type="submit" name="submit" value="Register" style="color: black; width: 80px; height: 30px;"></h2>
           <br><br><br>

           </form>

           <p style="text-align: center; font-size: 15px;">
              Already Registered? &nbsp <b><a style="color: yellow;" href="student_login.php">login</a></b>

         </div>
      
   </section>

   <?php

   if(isset($_POST['submit']))
   {
       move_uploaded_file($_FILES['file']['tmp_name'],"profiles/".$_FILES['file']['name']);
    $count=0;
    $sql="SELECT username from student";
    $res=mysqli_query($db,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['username']==$_POST['username'])
      {
        $count=$count+1;
      }

    }

    
    if($count==0)
    {

        mysqli_query($db,"INSERT INTO `student` VALUES('','$_POST[first]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[course]', '$_POST[batch]', '$_POST[address]', '$_POST[contact]', '$_POST[email]', '$_POST[pic]');");

    ?>
      <script type="text/javascript">
      alert("Registration succesful");
      window.location="student_login.php";
    </script>
     <?php

   }

       else
       {

        ?>
     <script type="text/javascript">
      alert("The Username already exist.");
    </script>
       <?php

       }
 }
     
     ?>

   </body>
</html>