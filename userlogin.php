<html>
    <head>
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">

 

<body>



<?php @session_start();
require_once("connection.php") ?>


        </div>
    <center>
        <font>       
        <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
  <div class="bg"> User login</div>
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="Username" required="">
        <br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Password"required="">
        </font>
    <br>
        <button type="submit" name="submit"><font>Login</font></button><br> </span>
    </center>
</form>







</body>

</html>




<?php
?>
    <?php

    if(isset($_POST['submit']))
    {
    echo $username =mysqli_real_escape_string($conn,$_POST['Username']);
    echo $password =mysqli_real_escape_string($conn,md5($_POST['Password']));

      
        $count=0;
        $sqlq = "SELECT * FROM `user`  where Username= '$username' && Password= '$password'";
       
        $sql=mysqli_query($conn, $sqlq);
    
        $count=mysqli_num_rows($sql);
       echo $count;
        
    
    if($count==0)
        {
           
            echo "<script>alert('InvalidUSERNAME AND PASSWORD')</script>";

                    }
                    else{    $_SESSION["user"] = $username;
                        header('Location: userhome.php');
                     
                    }
                }?>
    