<?php
include "connection.php";
include "navbar.php";
?>
           <?php
           if(isset($_POST['upload']))
           {
             if(isset($_SESSION['login_user']))
            {
              $file=$_FILES['file']['name'];
              $tmp_name=$_FILES['file']['tmp_name'];
              $path='uploads/'.$file;
              $file1=explode('.', $file);
              $ext=$file1['1'];
              $allowed=array('jpg','jpeg','png','gif','pdf','wmv');
              $id=$_POST['id'];
              if(in_array($ext,$allowed))
              {
                move_uploaded_file($tmp_name,$path);
                mysqli_query($db," UPDATE `books` SET file='$file' WHERE id='$id' ");
              }
          
             ?>
            


             <?php
           }
            else
         {
          ?>
            <script type="text/javascript">
              alert("Please Login First.");
            </script>
            <?php
          }
        }
       ?>
        
<!DOCTYPE html>
<html>
<head>
   <title>Books</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
     .search
     {
      padding-left: 1030px;
     }
     .delete
     {
      padding-left: 990px;
     }

      body {
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
                </div><br>
                
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


         <!--_________________________search bar___________________________-->

     <div class="search">
       <form class="navbar-form" method="post" name="form1">
        
            <input class="form-control" type="text" name="search" placeholder="Search books..." required="">
            <button style="background-color: #29AB87" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
       </form>
     </div>
    
      <h2>List of Books</h2>
       
       <?php

       if (isset($_POST['submit'])) 
         {
             $q=mysqli_query($db,"SELECT * FROM `books` WHERE name LIKE '%$_POST[search]%' or bid LIKE '%$_POST[search]%' or author LIKE '%$_POST[search]%' or edition LIKE  '%$_POST[search]%' or department LIKE  '%$_POST[search]%' or rack LIKE '%$_POST[search]%' ");

             if (mysqli_num_rows($q)==0) 
             {
               echo "<h2><b>";
               echo "Sorry! no book found. Try searching again.";
               echo "</h2></b>";
             }
             else
             {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color: #29AB87;' >";
      //table header
       echo "<th>"; echo "Sr.no"; echo "</th>";
       echo "<th>"; echo "Book id"; echo "</th>";
       echo "<th>"; echo "Book cover"; echo "</th>";
       echo "<th>"; echo "Book Name"; echo "</th>";
       echo "<th>"; echo "Author Name"; echo "</th>";
       echo "<th>"; echo "Edition"; echo "</th>";
       echo "<th>"; echo "Status"; echo "</th>";
       echo "<th>"; echo "Quantity"; echo "</th>";
       echo "<th>"; echo "Department"; echo "</th>";
       echo "<th>"; echo "Rack No"; echo "</th>";
       echo "<th>"; echo "Action"; echo "</th>";
       echo "</tr>";
       ?>

              <?php
             if(isset($_GET["delid"]))
             {
              if(isset($_SESSION['login_user']))
             {
               $delid=$_GET["delid"];
               mysqli_query($db,"DELETE FROM `books` WHERE id='$delid'");
             
            ?>
            <script type="text/javascript">
              alert("Book Deleted Successfully.");
              window.location="books.php"
            </script>
            
            <?php
             }
          else
         {  
          ?>
            <script type="text/javascript">
              alert("Please Login First.");
            </script>
            <?php
           }
          }
            ?>

            <?php

       while($row=mysqli_fetch_assoc($q))
       {
         echo "<tr>";
         echo "<td>"; echo $row['id']; echo "</td>";
         echo "<td>"; echo $row['bid']; echo "</td>";
         ?>
         <td><img src="uploads/<?php echo $row['file'] ?>" height="120px" width="120px">
         <br>
         <form method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
         <input type="file" name="file">
         <input type="submit" name="upload" value="upload image">
         </form>
         </td>
         <?php
         echo "<td>"; echo $row['name']; echo "</td>";
         echo "<td>"; echo $row['author']; echo "</td>";
         echo "<td>"; echo $row['edition']; echo "</td>";
         echo "<td>"; echo $row['status']; echo "</td>";
         echo "<td>"; echo $row['quantity']; echo "</td>";
         echo "<td>"; echo $row['department']; echo "</td>";
         echo "<td>"; echo $row['rack']; echo "</td>";
         ?>
         <td> <a href="editbooks.php ?edit=<?php echo $row["id"]?>"> Edit </a> &nbsp| &nbsp
         <a href="books.php ?delid=<?php echo $row["id"] ?>">delete</a></td>
         <?php
         echo "</tr>";
       }
       echo "</table>";
             }
         }
         

         /*-----------------if button is not found------------------*/
  
         else
         {
             $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`quantity` ASC ;");

      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color: #29AB87;' >";
      //table header
       echo "<th>"; echo "Sr.no"; echo "</th>";
       echo "<th>"; echo "Book Id"; echo "</th>";
       echo "<th>"; echo "Book cover"; echo "</th>";
       echo "<th>"; echo "Book Name"; echo "</th>";
       echo "<th>"; echo "Author Name"; echo "</th>";
       echo "<th>"; echo "Edition"; echo "</th>";
       echo "<th>"; echo "Status"; echo "</th>";
       echo "<th>"; echo "Quantity"; echo "</th>";
       echo "<th>"; echo "Department"; echo "</th>";
       echo "<th>"; echo "Rack No"; echo "</th>";
       echo "<th>"; echo "Action"; echo "</th>";
       echo "</tr>";

        ?>

            <?php
             if(isset($_GET["delid"]))
             {
              if(isset($_SESSION['login_user']))
             {
               $delid=$_GET["delid"];
               mysqli_query($db,"DELETE FROM `books` WHERE id='$delid'");
             
            ?>
            <script type="text/javascript">
              alert("Book Deleted Successfully.");
              window.location="books.php"
            </script>
            
            <?php
             }
          else
         {  
          ?>
            <script type="text/javascript">
              alert("Please Login First.");
            </script>
            <?php
           }
          }
            ?>
            <?php

       while($row=mysqli_fetch_assoc($res))
       {
         echo "<tr>";
         echo "<td>"; echo $row['id']; echo "</td>";
         echo "<td>"; echo $row['bid']; echo "</td>";
         ?>
         <td><img src="uploads/<?php echo $row['file'] ?>" height="120px" width="120px" >
          <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <input type="file" name="file">
          <input type="submit" name="upload" value="upload Image">
          </form>
         </td>
         <?php
         echo "<td>"; echo $row['name']; echo "</td>";
         echo "<td>"; echo $row['author']; echo "</td>";
         echo "<td>"; echo $row['edition']; echo "</td>";
         echo "<td>"; echo $row['status']; echo "</td>";
         echo "<td>"; echo $row['quantity']; echo "</td>";
         echo "<td>"; echo $row['department']; echo "</td>";
         echo "<td>"; echo $row['rack']; echo "</td>";
         ?>
         <td> <a href="editbooks.php ?edit=<?php echo $row["id"]?>"> Edit </a> &nbsp| &nbsp
          <a href="books.php ?delid=<?php echo $row["id"] ?>">Delete</a></td>
         <?php
         echo "</tr>";
       }
       echo "</table>";
         }
         ?>

    </div>

</body>
</html>