<?php





require_once("connection.php"); 



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


 $sql1 = "SELECT * FROM `chapter` WHERE `subject` LIKE '%$subject%' ";
$chapter = mysqli_query($conn, $sql1);
$i=1;
while($row1 = mysqli_fetch_array($chapter) )
{ 
    $no=$row1["chapternumber"];
    $name= $row1["chaptername"];
    
    $sql3 = "SELECT * FROM `question` WHERE `chapter` LIKE '$no:-$name'  ";
$q = mysqli_query($conn, $sql3);

    
    
if($q && mysqli_num_rows($q) >= 1)
{
    

echo " <input type='checkbox'  name=chapter$i  value='";echo $row1["chapternumber"];echo':-';  echo $row1["chaptername"];echo "'>";echo $row1["chapternumber"];echo':-';  echo $row1["chaptername"];echo"<br>";

$i++;
}



}




?>