<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

      	  <link rel="stylesheet" type="text/css" href="style.css">
      	  <meta charset="utf-8">
      	  <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	 <nav class="navbar navbar-inverse">
       	<div class="container-fluid">
		 <div class="navbar-header">
         <a class="navbar-brand active" >SMART LIBRARY MANAGEMENT SYSTEM</a>
         </div>

               <?php
                  if(isset($_SESSION['login_user']))
                  {
                     ?>
                      
                      <ul class="nav navbar-nav">
                      <li><a href="stuhome.php"><span class="glyphicon glyphicon-home"> HOME</span></a></li>
                     </ul>

                     <ul class="nav navbar-nav">
                     <li><a href="sbooks.php">BOOKS</a></li>
                     </ul>

                     <ul class="nav navbar-nav">
                     <li><a href="sfeedback.php">FEEDBACK</a></li>
                     </ul>

                     <ul class="nav navbar-nav">
                     <li><a href="contactus.php">CONTACT US</a></li>
                     </ul>

                     <ul class="nav navbar-nav navbar-right">
                      <?php
                       $tot=0;
                       $result=mysqli_query($db,"SELECT * FROM message WHERE dusername='$_SESSION[login_user]' && reed='sent' ;");
                       $tot=mysqli_num_rows($result);
                      ?>
                     <li><a href="smessage.php"><span class="glyphicon glyphicon-bell" style="font-size: 28px"><span class="badge bg-green"> <?php echo $tot; ?> </span></span></a></li>
                      <li><a href="sprofile.php">
                        <div style="color: white">
                      <?php
                         echo "<img class='img-circle profile_img' height=35 width=35 src='profiles/".$_SESSION['pic']."'>";
                         echo " ". $_SESSION['login_user'];
                     ?>
                  </div>
                    </a></li>
                    <li><a href="slogout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT </span></a></li>
                 </ul>
                    <?php
                  }
                  else
                  {
                     ?>
                             <ul class="nav navbar-nav">
                             <li><a href="index.php"><span class="glyphicon glyphicon-home"> HOME</span></a></li>
                             <li><a href="sbooks.php">BOOKS</a></li>
                             <li><a href="scontactus.php">CONTACT US</a></li>
                             </ul>

                             <ul class="nav navbar-nav navbar-right">

                             <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>

                              </ul>

                  <?php
               }
               ?>

         	</div>
         </nav>

</body>
</html>