<?php
include('database_connection.php');
$query = "SELECT * FROM tbl_image ORDER BY image_id DESC";
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
   <td><span class="delete" id="'.$row["image_id"].'" data-image_name="'.$row["image_name"].'" ><img src="files/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></span></td>
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
?>