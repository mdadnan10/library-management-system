<?php
    include "sconnection.php";
    include "snavbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <title>feedback</title>

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

         <style type="text/css">
          body
         {
            background-image: url("images/Feedback.jpg");
            background-size: cover;
         }
         .wap
         {
            padding: 10px;
            margin: -20px auto;
            width: 900px;
            height: 600px;
            background-color: black;
            opacity: .8;
            color: white;  
            } 
            .f
            {
              width: 180px;
            }  
            .t
            {
               width: 60%
            }  
            .scroll
            {
               width: 100%;
               height: 300px;
               overflow: auto;
            }  
    </style>
</head>
<body>

      <div class="wap">
         <h4>If you have any suggeions or question please comment below.</h4>
         <form style="" action="" method="post">
            
            <div class="t">
            <textarea class="form-control" type="text" name="comment" placeholder="Write something..." required=""></textarea>
            </div>
            <br>
            <div class="b">
            <input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">
            </div>
            </form>

           <br><br>
      <div class="scroll">
         <?php
            if(isset($_POST['submit']))
            {
               $sql="INSERT INTO `comments` VALUES('', 'user', '$_SESSION[login_user]', '$_POST[comment]');";
               if(mysqli_query($db,$sql))
               {
                  $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                  $res=mysqli_query($db,$q);
                  echo "<table class='table table-bordered'>";
                  while ($row=mysqli_fetch_assoc($res)) 
                  {
                    echo "<tr>";
                    echo "<td>"; echo $row['reply']; echo "</td>";
                    echo "<td>"; echo $row['name']; echo "</td>";
                    echo "<td>"; echo $row['comment']; echo "</td>";
                    echo "</tr>";
                  }
               }
          }

          else
          {
                  $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                  $res=mysqli_query($db,$q);
                  echo "<table class='table table-bordered'>";
                  while ($row=mysqli_fetch_assoc($res)) 
                  {
                    echo "<tr>";
                    echo "<td>"; echo $row['reply']; echo "</td>";
                    echo "<td>"; echo $row['name']; echo "</td>";
                    echo "<td>"; echo $row['comment']; echo "</td>";
                    echo "</tr>";
                  }
          }

      ?>
   </div>
   </div>

</body>
</html>