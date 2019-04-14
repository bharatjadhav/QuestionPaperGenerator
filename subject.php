
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

<head>
<link rel="stylesheet" href="style.css">

    <title>subject</title>
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



<h1>subject</h1>
<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">


<label>Subject Name  
</label>
<input name="subjectname" placeholder="Enter Subject Name" type="text"><br>


<label>Subject Code  
</label>
<input name="subjectcode" placeholder="Enter Subject Code " type="text" ><br>


<label>semester   
</label>

<select name="semester" placeholder="Enter semester">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
</select>
<br>
<label> Branch
</label>




<?php $sql = "SELECT * FROM `branch`";
$branch = mysqli_query($conn, $sql);

echo "<select name='branch'>";
while($row1 = mysqli_fetch_array($branch) )
{ 
echo " <option>";echo $row1["b_name"];echo "</option>";}
echo "</select>";
?> <br>

        <br><button type="submit" name="add">Add</button>
<br>

<h1>All Subject</h1>


        <input  placeholder="Search Subject" type="text"  name="txtsearch">
        
          
       
        <select name='category'> 
        <option value="s_name"> Subject Name</option>
        <option value="s_code"> Subject Code</option>
        <option value="semester"> Semester</option>
        <option value="branch"> Branch</option>
        </select>
  
     
         <button type="submit" name="search">Search</button><br>
     
 <?php 
          
           if(isset($_POST['search'])&&!empty($_POST['txtsearch'])){
            $category = $_POST['category'];
             $txtsearch = mysqli_real_escape_string($conn,$_POST['txtsearch']);
            
     echo "</center><br><br>";
            $sql ="SELECT * FROM `subject` WHERE `$category` LIKE  '%$txtsearch%' "; 
            $result1 = mysqli_query($conn, $sql);
 echo "<table style='width:100%;  border: 1px solid black;'><tr '>         
            <th>Subject Name</th>
            <th>Subject Code</th>
            <th>semester</th>
            <th>Branch</th>
            
             <th>Action</th>           
                 
             </tr>";
             while($row = mysqli_fetch_array($result1) )
             {
            
echo" <tr> 
            <td>"; echo $row["s_name"];echo"<br></td>
            <td>"; echo $row["s_code"];echo"<br></td>
            <td>"; echo $row["semester"];echo"</td>
             <td>"; echo $row["branch"];echo"<br></td>
              "; 
  echo"    </tr>  
            ";
                    
                    }
            
                      
                      echo "</table>";
 
 
           }else {
            $sql ="SELECT * FROM `subject` ORDER BY `subject`.`id`  DESC"; 
            $result2 = mysqli_query($conn, $sql);
 echo "<table style='width:100%;  border: 1px solid black;'><tr '>         
            <th>Subject Name</th>
            <th>Subject Code</th>
            <th>semester</th>
            <th>Branch</th>
            
             <th>Action</th>           
                 
             </tr>";
             while($row = mysqli_fetch_array($result2) )
             {
            
echo" <tr> 
            <td>"; echo $row["s_name"];echo"<br></td>
            <td>"; echo $row["s_code"];echo"<br></td>
            <td>"; echo $row["semester"];echo"</td>
             <td>"; echo $row["branch"];echo"<br></td>
              "; 
              echo" <td> <button  value='"; echo $row["id"];echo"' name='delete'>DELETE</button></td>";

  echo"    </tr>  
            ";
                    
                    }
            
                      
                      echo "</table>";
           }



           if(isset($_POST['delete']))
           {
             $id = $_POST['delete'];
             $sql="DELETE FROM `subject` WHERE `subject`.`id` = $id ";
             if(!mysqli_query($conn,$sql)) {
                 echo "Error: Could not save the data to mysql database. Please try again.";
          
           die(mysqli_error($conn));
 
          }
          else 
    {
     echo '<script type="text/javascript"> window.location = "subject.php" </script>';
    }
 
           }
?>

</form>
</body>
</html>


<?php
    if(isset($_POST['add'])){
    
if(isset($_POST['add'])&&!empty($_POST['subjectname'])&&!empty($_POST['subjectcode'])&&!empty($_POST['semester'])&&!empty($_POST['branch']))
{ 
  

      $subjectname = $_POST['subjectname'];
     
      $subjectcode = $_POST['subjectcode']; 
      $semester = $_POST['semester'];
      $branch = $_POST['branch'];
     

      $sql="INSERT INTO `subject` (`id`, `s_name`, `s_code`, `semester`, `branch`) VALUES (null, '$subjectname', '$subjectcode', '$semester', '$branch');";
   if(!mysqli_query($conn,$sql)) {
//       echo "Error: Could not save the data to mysql database. Please try again.";
       echo "<script>alert('Subject is NOT Submit')</script>";

 //die(mysqli_error($conn));
}
  
   else 
   {    echo "<script>alert('Subject is Sucessfully Submit')</script>";

    echo '<script type="text/javascript"> window.location = "subject.php" </script>';
   }
} else 
{    echo "<script>alert('Subject is NOT Submit')</script>";

}
}
?>