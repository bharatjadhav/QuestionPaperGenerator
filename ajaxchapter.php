<?php





require_once("connection.php");



$id = $_POST['subject'];
echo '$id';

$sql ="SELECT * FROM `subject` WHERE `id` = '$id'  ";
$result2 = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result2) )
{
 $s_code= $row["s_code"];

$subject= $row["s_name"];
$semester= $row["semester"];
$branch= $row["branch"];


}


 $sql1 = "SELECT * FROM `chapter` WHERE `subject` LIKE '%$subject%' ";
$chapter = mysqli_query($conn, $sql1);

while($row1 = mysqli_fetch_array($chapter) )
{
    
  
    
    
    
    
    
    echo " <option>";echo $row1["chapternumber"];echo':-';  echo $row1["chaptername"];echo "</option>";














}








?>







?>