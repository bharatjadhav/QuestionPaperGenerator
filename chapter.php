
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
    
    <title>chapter</title>
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

<h1> chapter </h1>


<label> subject
</label>
<?php $sql = "SELECT * FROM `subject`";
$subject = mysqli_query($conn, $sql);

echo "<select name='subject'>";
while($row1 = mysqli_fetch_array($subject) )
{ 
echo " <option value='";echo $row1["id"];echo "'>";echo $row1["s_name"];echo "</option>";}
echo "</select>";
?> <br>



<label>chapter number  
</label>
<input name="chapternumber" placeholder="Enter chapter number " min="1" value="1" type="number" ><br>

<label>chapter Name  </label>
<input name="chaptername" placeholder="Enter chapter Name" type="text"> 

<br><button type="submit" name="add">Add</button>














<?php
    if(isset($_POST['add'])){
    
if(isset($_POST['add'])&&!empty($_POST['subject'])&&!empty($_POST['chapternumber'])&&!empty($_POST['chaptername']))
{ 
  
    $id = $_POST['subject'];

$sql ="SELECT * FROM `subject` WHERE `id` = '$id'  "; 
$result2 = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result2) )
{
    $subject= $row["s_name"];

$semester= $row["semester"];
$branch= $row["branch"];


}

      $chaptername = $_POST['chaptername'];
     
      $chapternumber = $_POST['chapternumber']; 
     
      


      $sql="INSERT INTO `chapter` (`id`, `chapternumber`, `chaptername`, `subject`, `semester`, `branch`) VALUES (NULL, '$chapternumber', '$chaptername', '$subject', '$semester', '$branch')";
   if(!mysqli_query($conn,$sql)) {
       //echo "Error: Could not save the data to mysql database. Please try again.";
       echo "<script>alert('chapter is NOT Submit')</script>";

// die(mysqli_error($conn));
}
  
   else 
   {    echo "<script>alert('chapter is Sucessfully Submit')</script>";

    echo '<script type="text/javascript"> window.location = "chapter.php" </script>';
   }
} else 
{    echo "<script>alert('chapter is NOT Submit')</script>";

}
}
?>




<h1> ALL chapter </h1>


        <input  placeholder="Search Subject" type="text"  name="txtsearch">
        
          
       
        <select name='category'> 
            <option value="chapternumber"> chapter NUMBER</option>
        <option value="chaptername"> chapter Name</option>
        <option value="semester"> Semester</option>
        <option value="subject"> subject</option>

        <option value="branch"> Branch</option>
        </select>
  
     
         <button type="submit" name="search">Search</button><br>
     
 <?php 
          
           if(isset($_POST['search'])&&!empty($_POST['txtsearch'])){
            $category = $_POST['category'];
             $txtsearch = mysqli_real_escape_string($conn,$_POST['txtsearch']);
            
     echo "</center><br><br>";
            $sql ="SELECT * FROM `chapter` WHERE `$category` LIKE  '%$txtsearch%' "; 
            $result1 = mysqli_query($conn, $sql);
 echo "<table style='width:100%;  border: 1px solid black;'><tr '>         
 <th>chapter NUMBER</th>
            <th>chapter Name</th>
            <th>subject</th>

            <th>semester</th>
            <th>Branch</th>
            
             <th>Action</th>           
                 
             </tr>";
             while($row = mysqli_fetch_array($result1) )
             {
            
echo" <tr> 
            <td>"; echo $row["chapternumber"];echo"<br></td>
            <td>"; echo $row["chaptername"];echo"<br></td>
            <td>"; echo $row["subject"];echo"</td>
            <td>"; echo $row["semester"];echo"</td>
             <td>"; echo $row["branch"];echo"<br></td>
              ";               echo" <td> <button value='"; echo $row["id"];echo"' name='delete'>DELETE</button></td>";

  echo"    </tr>  
            ";
                    
                    }
            
                      
                      echo "</table>";
 
 
           }else {
            $sql ="SELECT * FROM `chapter`ORDER BY `chapter`.`id` DESC"; 
            $result2 = mysqli_query($conn, $sql);
 echo "<table style='width:100%;  border: 1px solid black;'><tr '>         
 <th>chapter NUMBER</th>
 <th>chapter Name</th>
 <th>subject</th>

 <th>semester</th>
 <th>Branch</th>
 
  <th>Action</th>           
      
             </tr>";
             while($row = mysqli_fetch_array($result2) )
             {
            
echo" <tr> 
<td>"; echo $row["chapternumber"];echo"<br></td>
<td>"; echo $row["chaptername"];echo"<br></td>
<td>"; echo $row["subject"];echo"</td>
<td>"; echo $row["semester"];echo"</td>
 <td>"; echo $row["branch"];echo"<br></td>
              "; 
              echo" <td> <button value='"; echo $row["id"];echo"' name='delete'>DELETE</button></td>";

  echo"    </tr>  
            ";
                    
                    }
            
                      
                      echo "</table>";
           }






           if(isset($_POST['delete']))
           {
             $id = $_POST['delete'];
             $sql="DELETE FROM `chapter` WHERE `chapter`.`id` = $id ";
             if(!mysqli_query($conn,$sql)) {
                 echo "Error: Could not save the data to mysql database. Please try again.";
          
           die(mysqli_error($conn));
 
          }
          else 
    {
     echo '<script type="text/javascript"> window.location = "chapter.php" </script>';
    }
 
           }




















           
?>

</form>  
</body>
</html>