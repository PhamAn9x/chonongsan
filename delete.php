<?php 
	include('config/connect.php');
	echo "ok";
	mysqli_set_charset($conn,'UTF8');
	$rs = mysqli_query($conn,"SELECT * FROM tinh_thanh");
	while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
		$tinh = $row['TINH_NAME'];
		$id = $row['id_tinh'];
		mysqli_query($conn,"INSERT INTO KHOANCACH(KC_TINH_TEN,KC_TINH_ID) VALUES ('$tinh',$id)");

	}
?>