
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
    <title>
        Sign up</title>
        <link rel="stylesheet" href="style.css">

      
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
<br>




        
        
     
        
        </div>

<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                   






  <center>
 <div class="bg" style="width:30%;" >
   
 Create new user </div> </legend> 
                   
                   
                   
    

                    <label>First Name<sup>*</sup></label>
                   <input type="text" name="firstname" autocomplete="on"  placeholder="Enter Name" style=" text-transform :uppercase"  required><br>


                   <label>Last Name<sup>*</sup></label>
                   <input type="text" name="lastname" autocomplete="on"  placeholder="Enter Name" style=" text-transform :uppercase"  required><br>

                    <label>Email<sup>*</sup></label>
                     <input type="email"  autocomplete="on" name="email"  placeholder="Enter Email" required><br>

                     <label>Select Username<sup>*</sup></label>
                     <input type="text" placeholder="Select  Username" name="Username" required><br>

                     <label>Password<sup>*</sup></label>
                     <input type="password" placeholder="Select Password" name="Password"required><br>
                     <label>Confirm Password<sup>*</sup></label>
                     <input type="password" placeholder="Confirm Password" name="ConfirmPassword"required><br>
   



     </font>
     <button type="submit" name="submit">Sign Up</button>
        </center>





  


          </form>

    </body>

    </html>




    




<?php







        
if(isset($_POST['submit']))
 { //password is equal
   if ($_POST['Password']==$_POST['ConfirmPassword'])
   {
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];

       $email = $_POST['email'];
      
       $Username = $_POST['Username'];
       $Password = md5($_POST['Password']);   
       








       
       
     $sql="INSERT INTO `user` (`name`, `lastname`, `email`, `Username`, `Password`) VALUES ('$firstname', '$lastname', '$email', '$Username', '$Password')";
 
     if(!mysqli_query($conn,$sql)) {
       //echo "Error: Could not save the data to mysql database. Please try again.";
       echo "<script>alert('user not Add. Please try again.')</script>";

 //die(mysqli_error($conn));
   }
else
{ 
    echo "<script>alert('user Add is Sucessfully ')</script>";
   
   }

}
else{
   echo "<script>alert('Form is not submited . Please try again.')</script>";
}

} 



?>      