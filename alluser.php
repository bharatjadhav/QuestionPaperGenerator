
<?php 
session_start();

require_once("connection.php"); 
if(!isset($_SESSION["admin"] ))
{
    ?>
    <script> window.location="home.html"; </script>
    
    <?php
}
        
?>

<!DOCTYPE html>
<html>
<head>
   
    <title>ALL user</title>
    <link rel="stylesheet" href="style.css">

    
</head>
<body>



<div id="navbar">




<div class="dropdown">
    <button onclick="window.location.href='adminhome.php'"  class="dropbtn">HOME 
    
    </button>
</div>





<div class="dropdown">
 <button class="dropbtn">user 
 
 </button>
 <div class="dropdown-content">
 <a href="createuser.php">Create new user             </a>
<br>
            <a href="alluser.php">ALL User </a>

 </div>
</div> 



<div class="dropdown">
    <button onclick="window.location.href='branch.php'"  class="dropbtn">Branch 
    
    </button>
</div>
<div class="dropdown">
    <button onclick="window.location.href='subject.php'"  class="dropbtn">Subject
    
    </button>
</div>

<div class="dropdown">
    <button onclick="window.location.href='chapter.php'"  class="dropbtn">Chapter
    
    </button>
</div>
<div class="dropdown">
    <button onclick="window.location.href='question.php'"  class="dropbtn">Question 
    
    </button>
</div>

<div class="dropdown">
    <button onclick="window.location.href='getquestionpaper.php'"  class="dropbtn">Get Question Paper 
    
    </button>
</div>

<div class="dropdown" style="float:right;">
        <button onclick="window.location.href='adminlogout.php'"    class="dropbtn">LOGOUT        
        </button>
    </div>
</div>
<br><br>


<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
<h1>ALL user</h1>
<?php
$sql = "SELECT * FROM `user`  ORDER BY `user`.`id` DESC";
$result = mysqli_query($conn, $sql);
    
      echo "          
 <table>
       <tr >         
       <th>Id</th>

            <th>Username Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username </th>

           
            <th>Action</th>  
                

              </div></tr>"; while($row = mysqli_fetch_array($result) )
              {
             echo "<tr >
              
            <td>";echo $row["id"]; echo "</td>
            <td>";echo $row["name"]; echo "</td>
            <td>";echo $row["lastname"]; echo "</td>
            <td>";echo $row["email"]; echo "</td>
            <td>";echo $row["Username"]; echo "</td>";

            
          echo" <td> <button value='"; echo $row["id"];echo"' name='delete'>DELETE</button></td>";
          
            
              }
            
                     echo "</table>";






if(isset($_POST['delete']))
{
  $id = $_POST['delete'];
  $sql="DELETE FROM `user` WHERE `user`.`id` = $id ";
  if(!mysqli_query($conn,$sql)) {
      echo "Error: Could not save the data to mysql database. Please try again.";

die(mysqli_error($conn));

}
else 
{
echo '<script type="text/javascript"> window.location = "alluser.php" </script>';
}
}

                     ?> 
    
    
  
  </form>   
</body>
</html>