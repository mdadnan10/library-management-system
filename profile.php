<?php
   include "connection.php";
   include "navbar.php";
  ?>

          <?php
           if(isset($_POST['upload']))
           {
              $file=$_FILES['file']['name'];
              $tmp_name=$_FILES['file']['tmp_name'];
              $path='profiles/'.$file;
              $file1=explode('.', $file);
              $ext=$file1['1'];
              $allowed=array('jpg','jpeg','png','gif','pdf');
              $id=$_POST['id'];
              if(in_array($ext,$allowed))
              {
                move_uploaded_file($tmp_name,$path);
                mysqli_query($db," UPDATE `staff` SET `pic`='$file' WHERE id='$id' ");
              }
             }
             ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>profile</title>
  	<style type="text/css">
  		.wrapper
  		{
  			width: 400px;
        height: 600px;
  			margin: 0 auto;
  			color: white;
  		}
      .ped
      {
        margin-left: 290px;
      }
      .f
      {
        padding-left: 110px;
      }
      .up
      {
        padding-left: 70px;
      }
  	</style>
  </head>
  <body style="background-color: green;">
  		<div class="wrapper" >
  			<?php
  			$q=mysqli_query($db,"SELECT * FROM `staff` where username='$_SESSION[login_user]' ;");
  			?>

  			<h2 style="text-align: center;">My Profile</h2>
  			<?php
  			$row=mysqli_fetch_assoc($q);

            echo "<div style='text-align:center'>
                  <img class='img-circle Profile-img' height=110 width=120 src='profiles/".$row['pic']."'>
            </div>";
       
  			?>
        <br>
               <table>
               <form method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
               <div class="f">
               <input type="file" name="file">
               </div>
               <div class="up">
               <p style="color: black;"><input type="submit" name="upload" value="update image"></p>
               </div>
               </form>
               </td>
               </table>
 
        <br>
  			<div style="text-align: center;"><b>Welcome</b>
  			<h4>
  				<?php
  				echo $_SESSION['login_user'];
  				?>
  			</h4>
  		</div>

  		<?php  
  		     echo "<b>";
  		     echo "<table class='table table-bordered'>";

             echo "<tr>";
	             echo "<td>";
	                echo "<b>Saff Id : </b>";
	             echo "</td>";

	             echo "<td>";
	                echo $row['sid'];
	             echo "</td>";
             echo "</tr>";

             echo "<tr>";
                 echo "<td>";
                 	echo "<b>Fisrt Name : </b>";
	             echo "</td>";

	             echo "<td>";
	                echo $row['first'];
	             echo "</td>";
             echo "</tr>";

             echo "<tr>";
                 echo "<td>";
                    echo "<b>Last Name : </b>";
	             echo "</td>";

	             echo "<td>";
	                echo $row['last'];
	             echo "</td>";
             echo "</tr>";

             echo "<tr>";
                 echo "<td>";
                    echo "<b>Username : </b>";
	             echo "</td>";

	             echo "<td>";
	                echo $row['username'];
	             echo "</td>";
             echo "</tr>";

             echo "<tr>";
                 echo "<td>";
                    echo "<b>Password : </b>";
	             echo "</td>";

	             echo "<td>";
	                echo $row['password'];
	             echo "</td>";
             echo "</tr>";

             echo "<tr>";
                 echo "<td>";
                    echo "<b>Email : </b>";
	             echo "</td>";

	             echo "<td>";
	                echo $row['email'];
	             echo "</td>";
             echo "</tr>";

             echo "<tr>";
                 echo "<td>";
                    echo "<b>Mobile No : </b>";
	             echo "</td>";

	             echo "<td>";
	                echo $row['mobile'];
	             echo "</td>";
             echo "</tr>";
             echo "<br>";
             echo "</table>";
           echo "</b>";
             ?>
             

             <div class="ped">
             <table class="table table-bordered " style="width: 110px;">
             <tr style="background-color: white">
             <td style="text-align: center;"> <a href="editprofile.php ?edit=<?php echo $row["id"]?>"> Edit Profile</a></td>
             </tr>
           	 </table>
             </div>
        
  		</div>
  </body>
  </html>