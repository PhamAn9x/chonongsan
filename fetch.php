<?php
if(isset($_POST['d'])){
	$key = $_POST['d'];
}

include('database_connection.php');
$query = "SELECT * FROM HINHANH ORDER BY HA_ID DESC LIMIT $key";
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
   <td><span class="delete" id="'.$row["HA_ID"].'" data-image_name="'.$row["HA_TEN"].'" ><img src="images/'.$row["HA_TEN"].'" class="img-thumbnail" width="100" height="100" /></span></td>
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