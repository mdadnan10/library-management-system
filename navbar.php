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
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

         

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
                     <li><a href="staffhome.php"><span class="glyphicon glyphicon-home"></a></li>
                     </ul>

                     <ul class="nav navbar-nav">
                     <li><a href="books.php">BOOKS</a></li>
                     </ul>

                     <ul class="nav navbar-nav">
                     <li> <a href="contacted.php">CONTACT</a></li>
                     </ul>
                     
                     <ul class="nav navbar-nav">
                     <li><a href="feedback.php">FEEDBACK</span></a></li>
                     </ul>
                     
                     <ul class="nav navbar-nav">
                     <li> <a href="profile.php">PROFILE</a></li>
                     </ul>

                     <ul class="nav navbar-nav">
                     <li><a href="student.php">REGISTERD STUDENT</a></li>
                     </ul>
                     <ul class="nav navbar-nav navbar-right">
                      <li><a href="message.php"><span class="fa fa-send" style="font-size: 28px"></span></a></li>
                      <li><a href="profile.php">
                        <div style="color: white">
                      <?php
                       echo "<img class='img-circle profile_img' height=35 width=35 src='profiles/".$_SESSION['pic']."'>";
                         echo " ".$_SESSION['login_user'];
                     ?>
                  </div>
                    </a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT </span></a></li>
                 </ul>
                    <?php
                  }
                  else
                  {
                     ?>

                             <ul class="nav navbar-nav">
                             <li><a href="index.php"><span class="glyphicon glyphicon-home"> HOME</a></li>
                             </ul>
                             <ul class="nav navbar-nav navbar-right">

                             <li><a href="staff_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>

                              </ul>

                  <?php
               }
               ?>

         	</div>
         </nav>

</body>
</html>