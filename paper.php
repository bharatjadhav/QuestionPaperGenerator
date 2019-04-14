
<?php 
session_start();


require_once("connection.php"); 


             
if(isset($_POST['get'])){
    
  if(isset($_POST['get'])&&!empty($_POST['subject'])&&!empty($_POST['totalmarks'])&&!empty($_POST['time']))
  { 
   
  

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    


    <style>
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
   }
    
    
    
    
    </style>
    <title>paper</title>

</head>
<body>
    <?php

$subject=$_POST['subject'];



  $chapter1="null" ;

  $chapter2 = "null";
  $chapter3 = "null";
  $chapter4 = "null";
  $chapter5 = "null";
  $chapter6 = "null";
  $chapter7 = "null";

  $chapter8 = "null";
  $chapter9 = "null";
  $chapter10 = "null";




if(isset($_POST['chapter1'])){

  @$chapter1=$_POST['chapter1'];
 // $chapterq1 = " `chapter` = '$chapter1'";
}


if(isset($_POST['chapter2'])){

  @$chapter2=$_POST['chapter2'];
 // $chapterq2 = "OR `chapter` = '$chapter2'";
}
if(isset($_POST['chapter3'])){

  @$chapter3=$_POST['chapter3'];
  //$chapterq3 = "OR `chapter` = '$chapter3'";
}
if(isset($_POST['chapter4'])){

  @$chapter4=$_POST['chapter4'];
  //$chapterq4 = "OR `chapter` = '$chapter4'";
}
if(isset($_POST['chapter5'])){

  @$chapter5=$_POST['chapter5'];
  //$chapterq5 = "OR `chapter` = '$chapter5'";
}
if(isset($_POST['chapter6'])){

  @$chapter6=$_POST['chapter6'];
  //$chapterq6 = "OR `chapter` = '$chapter6'";
}
if(isset($_POST['chapter7'])){

  @$chapter7=$_POST['chapter7'];
  //$chapterq7 = "OR `chapter` = '$chapter7'";
}
if(isset($_POST['chapter8'])){

  @$chapter8=$_POST['chapter8'];
  //$chapterq8 = "OR `chapter` = '$chapter8'";
}
if(isset($_POST['chapter9'])){

  @$chapter9=$_POST['chapter9'];
  //$chapterq9 = "OR `chapter` = '$chapter9'";
}
if(isset($_POST['chapter10'])){

  $chapter10=$_POST['chapter10'];
    //$chapterq10  = "OR `chapter` = '$chapter10'";
}


$difficultyofquestion=$_POST['difficultyofquestion'];
 $totalmarks=$_POST['totalmarks'];



$sql ="SELECT * FROM `subject` WHERE `id` = '$subject'  "; 
$result2 = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result2) )
{
 $s_code= $row["s_code"];

$s_name= $row["s_name"];
$semester= $row["semester"];
$branch= $row["branch"];


}



?>
    <h1 style="margin-left: 80%
    "><?php  echo "$s_code";
   ?></h1>

    <h2 style="margin-right: 70% ;position: absolute;"> <?php if(!empty($_POST['time']))
  { $time =  $_POST['time']; 
    echo "$time";
  } ?>  /<br> <?php if(!empty($_POST['totalmarks']))
  { $totalmarks =  $_POST['totalmarks']; 
    echo "$totalmarks";
  } ?> Marks</h2>  <br> <div style="margin-left: 60%"> Seat No.</div><table style="margin-left: 60%;height: 30px;width: 250px;"><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></table>
   <hr>
 <i><b>Instructions :</i></b>  
  <?php    
 

  if(!empty($_POST['instructions']))
  { $Instructions =  $_POST['instructions']; 
  
      

  
    echo " <pre> $Instructions  </pre>";


    
 

  } else {




    echo "
 <pre>        (1) All Questions are compulsory.
        (2) Answer each next main Question on a new page.
        (3) Illustrate your answers with neat sketches wherever necessary.
        (4) Figures to the right indicate full marks.
        (5) Assume suitable data, if necessary. 


        </pre> ";
    }

          
                  ?>

<?php



if ($totalmarks==100) {
  
?>
<br>

<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3>
<br>
<h3 style=" position: absolute;"> 1.
    (A) Attempt any THREE of the following :</h3>

    <h4 style="margin-left: 85% ;position: absolute;">3 X 4 = 12</h4>
    <br>
    <br>

<?php 
 //$sql ="SELECT *  FROM `question` WHERE `marks` = 4 OR `difficultyofquestion` LIKE '' OR `chapter` LIKE '%%' AND `subject` LIKE '%java%' AND `semester` = 5 AND `branch` LIKE '%computer%' ORDER BY RAND()  "; 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 4 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 4  "; 

 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>"; echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";

?>



<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;">(B)Attempt any ONE of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 1 X 6 = 6</h4><br><br>

<?php 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 6 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 2 "; 

 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>";echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";

?>




<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;"> 2. Attempt any TWO of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 2 X 8 = 16</h4><br><br>

<?php 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 8 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 3 "; 
//echo "$sql";
 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>"; echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";

?>

<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;"> 3. Attempt any FOUR of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 4 X 4 = 16</h4><br><br>

<?php 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 4 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 5 "; 

 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>"; echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";

?>

<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;"> 4. (A) Attempt any THREE of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 3 X 4 = 12</h4><br><br>

<?php 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 4 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 4 "; 

 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>"; echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";

?>

<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;">(B)Attempt any ONE of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 1 X 6 = 6</h4><br><br>

<?php 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 6 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 2 "; 

 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>"; echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";

?>

<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;"> 5. Attempt any  TWO of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 2 X 8 = 16</h4><br><br>

<?php 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 8 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10') ORDER BY RAND() LIMIT 3 "; 

 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>"; echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";

?>

<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;"> 6. Attempt any FOUR of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 4 X 4 = 16</h4><br><br>

<?php 
 $sql ="SELECT *  FROM `question` WHERE `marks` = 4 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 5 "; 

 $result1 = mysqli_query($conn, $sql);
 echo "<ol>";
 while($row = mysqli_fetch_array($result1) )
 { echo " <li>"; echo $row["question"]; 
  
  
   if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
  
  echo "<br><br></li>";
    
 }
 echo "</ol>";
}
?>



<?php

if ($totalmarks==25) {
  
  ?>
  <br>
  
  <h3 style="margin-left: 85% ;position: absolute;"> Marks</h3>
  <br>
  <h3 style=" position: absolute;"> 1. Attempt any THREE of the following :</h3>
  
      <h4 style="margin-left: 85% ;position: absolute;">3 X 3 = 9</h4>
      <br>
      <br>
  
  <?php 
   $sql ="SELECT *  FROM `question` WHERE `marks` = 3 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 4  "; 
  
   $result1 = mysqli_query($conn, $sql);
   echo "<ol>";
   while($row = mysqli_fetch_array($result1) )
   { echo " <li>"; echo $row["question"]; 
    
    
     if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
   
    
    echo "<br><br></li>";
      
   }
   echo "</ol>";
  
  ?>
  
  
  
  
  <h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;"> 2. Attempt any TWO of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 2 X 8 = 16</h4><br><br>
  
  <?php 
   $sql ="SELECT *  FROM `question` WHERE `marks` = 8 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 3 "; 
  
   $result1 = mysqli_query($conn, $sql);
   echo "<ol>";
   while($row = mysqli_fetch_array($result1) )
   { echo " <li>"; echo $row["question"]; 
    
    
     if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
    
    echo "<br><br></li>";
      
   }
   echo "</ol>";
  
  ?>

  
<h3 style="margin-left: 85% ;position: absolute;"> Marks</h3><br><h3 style=" position: absolute;"> 3. Attempt any TWO of the following :</h3><h4 style="margin-left: 85% ;position: absolute;"> 2 X 8 = 16</h4><br><br>
  
  <?php 
   $sql ="SELECT *  FROM `question` WHERE `marks` = 8 AND `difficultyofquestion` LIKE '%$difficultyofquestion%'   AND `subject` LIKE '$s_name' AND `semester` = $semester AND  `branch` LIKE '$branch' AND `chapter` IN ('$chapter1',  '$chapter2',  '$chapter3',  '$chapter4',  '$chapter5',  '$chapter6',  '$chapter7',  '$chapter8',  '$chapter9',  '$chapter10')  ORDER BY RAND() LIMIT 3 "; 
  
   $result1 = mysqli_query($conn, $sql);
   echo "<ol>";
   while($row = mysqli_fetch_array($result1) )
   { echo " <li>"; echo $row["question"]; 
    
    
     if (!empty($row['upload_img'])) {
        
    
      echo '<br><img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/> <br>';  
      }
    
    echo "<br><br></li>";
      
   }
   echo "</ol>";
  }
  ?>
  
  

</body>
</html>



<?php 





?>


<?php  
echo '<script type="text/javascript"> window.print(); </script>';

 } }  


?>