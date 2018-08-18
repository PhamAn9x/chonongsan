<?php
//upload.php
include('database_connection.php');


if(isset($_POST['id_msp'])){
  $msp = $_POST['id_msp'];
 
}

if(count($_FILES["file"]["name"]) > 0)
{
 //$output = '';

 sleep(3);

 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
  if(file_already_uploaded($file_name, $connect))
  {
   $file_name = $msp.'-'.$file_array[0] . '-'. rand() . '.' . $file_extension;
  }
  $location = 'images/' . $file_name;
  if(move_uploaded_file($tmp_name, $location))
  {
   $query = "
   INSERT INTO HINHANH (HA_TEN,SP_ID,LSP_ID,NSP_ID) 
   VALUES ('$file_name',$msp,2,3)
   ";
   $statement = $connect->prepare($query);
   $statement->execute();
  }
 }
}

function file_already_uploaded($file_name, $connect)
{
 
 $query = "SELECT * FROM HINHANH WHERE HA_TEN = '".$file_name."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $number_of_rows = $statement->rowCount();
 if($number_of_rows > 0)
 {
  return true;
 }
 else
 {
  return false;
 }
}

?>
