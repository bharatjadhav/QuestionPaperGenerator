

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
    
    <title>Question</title>
    <link rel="stylesheet" href="style.css">

    <script src="jquery.js"></script>

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














<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">

<h1> Question </h1>




 <br>
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

        
     
        
<label> chapter
            </label>
            <select name='chapter' id='getchapter'>
            
            <option>select any</option>
            </select>
            <br>


<label>Question </label>
    <textarea name="question" style="width:75%;height:100px;"></textarea>
    <br>
    <label>Upload photo</label><sub>(File size must be less than 500 KB)</sub>
                     <input type="file"   placeholder="Upload photo" name="image"  value="" ><br>

    <label>Difficulty Of Question </label>
    <select name="difficultyofquestion" ">
            <option>Easy </option>
            <option>Moderate </option>
            <option>Hard</option>
        </select>
        <br>
        


        <label> Question Marks
</label>


<select name="marks" placeholder="Enter marks">
<option>3</option>
            <option>4</option>
            <option>6</option>
            <option>8</option>
          
        </select>


<br>
    
       
            


            <br><button type="submit" name="add">Add</button>













<?php
    if(isset($_POST['add'])){
    
if(isset($_POST['add'])&&!empty($_POST['question'])&&!empty($_POST['subject'])&&!empty($_POST['chapter'])&&!empty($_POST['difficultyofquestion'])&&!empty($_POST['marks']))
{ 
    ///if(isset($_POST['add'])&&!empty($_POST['image']) ){
       if ($_POST && !empty($_FILES)) {
           $formOk = true;
       
       
       
       //Assign Variables
       $path = $_FILES['image']['tmp_name'];
       $iname = $_FILES['image']['name'];
       $size = $_FILES['image']['size'];
       $type = $_FILES['image']['type'];
      // if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
        //   $formOk = false;
          // echo "<script>alert(' Error: Error in uploading file. Please try again !!!!')</script>";
       //}
       //check file extension
           if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
               $formOk = false;
               //echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
           }
            // check for file size.
            if ($formOk && filesize($path) > 500000) {
               $formOk = false;
               echo "Error: File size must be less than 500 KB.";
           }
       
      
       }








       
       
     
 
      @ $content = file_get_contents($path);  
  @ $content = mysqli_real_escape_string($conn, $content);
   // }
   
    $question = $_POST['question'];


    $id = $_POST['subject'];


    $sql ="SELECT * FROM `subject` WHERE `id` = '$id'  "; 
    $result2 = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result2) )
    {
     $s_code= $row["s_code"];
    
    $subject= $row["s_name"];
    $semester= $row["semester"];
    $branch= $row["branch"];
    
    
    }
    






















      $marks = $_POST['marks'];
     
      $difficultyofquestion = $_POST['difficultyofquestion']; 
      //$semester = $_POST['semester'];
     // $branch = $_POST['branch'];
 
     $chapter = $_POST['chapter'];


     @ $sql="INSERT INTO `question` (`id`, `question`, `marks`, `difficultyofquestion`, `chapter`, `subject`, `semester`, `branch` ,`upload_img`,`userid`) VALUES (NULL, '$question', '$marks', '$difficultyofquestion', '$chapter', '$subject', '$semester', '$branch', '$content', '$uid') ";
   if(!mysqli_query($conn,$sql)) {
       echo "Error: Could not save the data to mysql database. Please try again.";

 die(mysqli_error($conn));
}
  
   else 
   {    echo "<script>alert('question is Sucessfully Submit')</script>";

    echo '<script type="text/javascript"> window.location = "questionadduser.php" </script>';
   }
}
 else 
{    echo "<script>alert('question is NOT Submit')</script>";

}
}


?>







<h1> ALL question </h1>


        <input  placeholder="Search question" type="text"  name="txtsearch">
        
          
       
        <select name='category'> 
            <option value="question"> question</option>
        <option value="chapter"> chapter </option>
        <option value="subject"> subject</option>

        </select>
  
     
         <button type="submit" name="search">Search</button><br>
     
 <?php 
          
           if(isset($_POST['search'])&&!empty($_POST['txtsearch'])){
            $category = $_POST['category'];
             $txtsearch = mysqli_real_escape_string($conn,$_POST['txtsearch']);
            
     echo "</center><br><br>";
            $sql ="SELECT * FROM `question` WHERE `$category` && `userid` = $uid LIKE  '%$txtsearch%'  "; 
            $result1 = mysqli_query($conn, $sql);
 echo "<table style='width:100%;  border: 1px solid black;'><tr '>         
 <th>question id</th>
            <th>question</th>
            <th>marks</th>
            <th>Difficulty of question</th>
            <th>chapter</th>

            <th>subject</th>

            <th>semester</th>
            <th>Branch</th>
            
             <th>Action</th>           
                 
             </tr>";
             while($row = mysqli_fetch_array($result1) )
             {
            
echo" <tr> 
            <td>"; echo $row["id"];echo"<br></td>
            <td>"; echo $row["question"];echo"<br></td>
            <td>"; echo $row["marks"];echo"</td>
            <td>"; echo $row["difficultyofquestion"];echo"</td>
             <td>"; echo $row["chapter"];echo"<br></td>
             <td>"; echo $row["subject"];echo"</td>
             <td>"; echo $row["semester"];echo"</td>
             <td>"; echo $row["branch"];echo"</td>

              ";               echo" <td> <button class='tablebutton' value='"; echo $row["id"];echo"' name='delete'>DELETE</button></td>";

  echo"    </tr>  
            ";
                    
                    }
            
                      
                      echo "</table>";
 
 
           } else {
            echo "</center><br><br>";
            $sql ="SELECT * FROM `question`WHERE `userid` = $uid ORDER BY `question`.`id` DESC  LIMIT 100 "; 
            $result1 = mysqli_query($conn, $sql);
 echo "<table style='width:100%;  border: 1px solid black;'><tr '>         
 <th>question id</th>
            <th>question</th>
            <th>marks</th>
            <th>Difficulty of question</th>
            <th>chapter</th>

            <th>subject</th>

            <th>semester</th>
            <th>Branch</th>
            
             <th>Action</th>           
                 
             </tr>";
             while($row = mysqli_fetch_array($result1) )
             {
            
echo" <tr> 
            <td>"; echo $row["id"];echo"<br></td>
            <td>"; echo $row["question"];echo"<br></td>
            <td>"; echo $row["marks"];echo"</td>
            <td>"; echo $row["difficultyofquestion"];echo"</td>
             <td>"; echo $row["chapter"];echo"<br></td>
             <td>"; echo $row["subject"];echo"</td>
             <td>"; echo $row["semester"];echo"</td>
             <td>"; echo $row["branch"];echo"</td>
             "; 
                            echo" <td> <button class='tablebutton' value='"; echo $row["id"];echo"' name='delete'>DELETE</button></td>";


  echo"    </tr>  
            ";
                    
                    }
            
                      
                      echo "</table>";
 
               
           }









           if(isset($_POST['delete']))
           {
             $id = $_POST['delete'];
             $sql="DELETE FROM `question` WHERE `question`.`id` = $id ";
             if(!mysqli_query($conn,$sql)) {
                 echo "Error: Could not save the data to mysql database. Please try again.";
          
           die(mysqli_error($conn));
 
          }
          else 
    {
     echo '<script type="text/javascript"> window.location = "questionadduser.php" </script>';
    }
 
}





























?></form>  















<script> 

function sub(datavalue)
{
    $.ajax({

        url:'ajaxchapter.php',
        type:'POST',
        data: {subject: datavalue },
        success:function(result)
        {
            $('#getchapter').html(result);
        }
    });
}









</script>

</body>
</html>
