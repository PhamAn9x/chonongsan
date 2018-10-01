<?php
	include('../config/connect.php');
	if(isset($_GET['id'])){
		$sp_id = $_GET['id'];
		$sdt = $_GET['usr'];
		$dathich = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM THICH WHERE USR_SDT = $sdt AND SP_ID = $sp_id"));
		if($dathich > 0){
			$thich = mysqli_query($conn,"DELETE FROM THICH WHERE USR_SDT = $sdt AND SP_ID = $sp_id");
			echo '<meta http-equiv="Refresh" content="0,URL=../index.php" />';
		} else echo "<script>alert('da thich');</script>";
	}
?>
