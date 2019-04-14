














<?php 
session_start();

require_once("connection.php"); 
if(!isset($_SESSION["user"] ))
{
    ?>
    <script> window.location="home.html"; </script>
    
    <?php
}
        
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">

</head>
<body>




<div id="navbar">

<div class="dropdown">
        <button onclick="window.location.href='userhome.php'"  class="dropbtn">HOME 
        
        </button>
    </div>
<div class="dropdown">
    <button onclick="window.location.href='questionadduser.php'"  class="dropbtn">Question 
    
    </button>
</div>

<div class="dropdown">
    <button onclick="window.location.href='getquestionpaperuser.php'"  class="dropbtn">Get Question Paper 
    
    </button>
</div>

<div class="dropdown" style="float:right;">
        <button onclick="window.location.href='userlogout.php'"    class="dropbtn">LOGOUT        
        </button>
    </div>
</div>
<br><br>













 
 


 <h1> Question paper Generator</h1>











 <?php 
 $user = $_SESSION['user']; 
$sql = "SELECT * FROM `user` WHERE `Username`  = '$user' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
   $username= $row["Username"];
    $name= $row["name"];
    $id= $row["id"];


?>











 </div>
</div>   
</body>
</html>