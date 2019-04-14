

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
<html>
<head>

    <title>Get Question paper</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>


    <script> 

function sub(datavalue)
{
    $.ajax({

        url:'ajaxchaptercheck.php',
        type:'POST',
        data: {subject: datavalue },
        success:function(result)
        {
            $('#getchapter').html(result);
        }
    });
}


</script>

    
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







<?php 
 $user = $_SESSION['user']; 
$sql = "SELECT * FROM `user` WHERE `Username`  = '$user' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
   $username= $row["Username"];
    $name= $row["name"];
    $uid= $row["id"];


?>



    <h1>Get Question Paper </h1>
<form name="form" action="paper.php" method="POST" enctype="multipart/form-data">



<label> subject
                    </label>
                    <?php $sql = "SELECT * FROM `subject`";
                    $subject = mysqli_query($conn, $sql);
                    
                    echo "<select onchange='sub(this.value)' name='subject'> <option></option>";
                    while($row1 = mysqli_fetch_array($subject) )
                    { 
                    echo " <option value='";echo $row1["id"];echo "'>";echo $row1["s_name"];echo "</option>";}
                    echo "</select>";
                    ?> <br>


<label>Difficulty Of Question </label>
    <select name="difficultyofquestion">
    <option> </option>
            <option>Easy </option>
            <option>Moderate </option>
            <option>Hard</option>
        </select>
        <br>
        


        <label> chapter
            </label>
            <div id='getchapter'>
            
            <input type="checkbox" checked>select any  <br>
                </div>
            <br>


<label> Total  Marks</label>
<select name="totalmarks" placeholder="Enter totalmarks">
         
            <option>25</option>
             <option>100</option>
        </select>


<br>

<label>  Time
</label>

<select name="time" placeholder="Enter time">
            <option>30 minutes</option>
            <option>1 Hour </option>
            <option>1 Hours 30 minutes</option>
            <option>2 Hours </option>
            <option>2 Hours 30 minutes</option>
            <option>3 Hours</option>
            <option>3 Hours 30 minutes</option>
        </select><br>

<label> Instructions </label>
<textarea name="instructions" style="width:75%;height:100px;"></textarea>
<br>
<button type="submit" name="get">GET</button><br>




































</body>
</html>