
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

<html>
    <head><title>Branch Add</title>
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




        
      <h1> Branch</h1>
    <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
        <label>Branch</label>
    <input type="text" placeholder="Enter Branch" name="Branch" style=" text-transform :uppercase" >
   
    <br><button type="submit" name="Add">Add</button>

  <?php
$sql = "SELECT * FROM `branch`";
$result = mysqli_query($conn, $sql);
    
      echo "          
 <table>
       <tr >         
           
            <th>Branch Name</th>
            
           
            <th>Action</th>  
                

              </div></tr>"; while($row = mysqli_fetch_array($result) )
              {
             echo "<tr >
              
            <td>";echo $row["b_name"]; echo "</td>";
          echo" <td> <button value='"; echo $row["id"];echo"' name='delete'>DELETE</button></td>";
          
            
              }
            
                     echo "</table>";
                     ?> 
    
    
  
  
  
  <?php
        
if(isset($_POST['Add'])&&!empty($_POST['Branch']))
{ 
  

      $name = $_POST['Branch'];
     
      

       

      $sql="INSERT INTO `branch` (`id`, `b_name`) VALUES (NULL, '$name') ";
   if(!mysqli_query($conn,$sql)) {
       //echo "Error: Could not save the data to mysql database. Please try again.";
       echo "<script>alert('Branch not Add. Please try again.')</script>";

 //die(mysqli_error($conn));
}
  
   else 
   {
           echo "<script>alert('Branch Add is Sucessfully ')</script>";

    echo '<script type="text/javascript"> window.location = "branch.php" </script>';
   }
}



if(isset($_POST['delete']))
          {
            $id = $_POST['delete'];
            $sql="DELETE FROM `branch` WHERE `branch`.`id` = $id ";
            if(!mysqli_query($conn,$sql)) {
                echo "Error: Could not save the data to mysql database. Please try again.";
         
          die(mysqli_error($conn));

         }
         else 
   {
    echo '<script type="text/javascript"> window.location = "branch.php" </script>';
   }
          }



?>

</form>

  </body>
  </html>
  