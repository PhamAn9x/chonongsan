<?php
//delete.php

include('database_connection.php');

if(isset($_POST["image_id"]))
{
	$query = "DELETE FROM HINHANH WHERE HA_ID = '".$_POST["image_id"]."'";
  $statement = $connect->prepare($query);
  $statement->execute();
 $file_path = 'images/' . $_POST["image_name"];
 if($statement)
 {
 		unlink($file_path);
 }
}

if(isset($_POST["check"]) && $_POST["check"] > 0 ){
	$check = $_POST["check"];

$query = "SELECT * FROM HINHANH ORDER BY HA_ID DESC LIMIT $check";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
   <td id="im"><span class="delete" id="'.$row["HA_ID"].'" data-image_name="'.$row["HA_TEN"].'" ><img src="images/'.$row["HA_TEN"].'" class="img-thumbnail" width="100" height="100" /></span></td>
  ';
 }
}
else
{
 $output .= '
 ';
}
$output .= '</table>';
echo $output;
} else {
	$output ='Chưa có ảnh nào được chon!';
}
?>
