<?php
error_reporting(0);
include('../../config/connect.php');
	if(isset($_GET['id'])){
		$sdt = $_GET['id'];
		$st = $_GET['st'];
		if($st == 1){
			if(mysqli_query($conn,"UPDATE USER SET USR_TRANGTHAI = 0 WHERE USR_SDT = '$sdt'"))
				{
					
					echo "<script>alert('Khóa tài $sdt khoản thành công!');</script>";
					echo '<META http-equiv="refresh" content="0;URL=http:../index.php?view=danhsachnguoidung"/>';
					
				}
		}
		if($st == 0)
			{
				if(mysqli_query($conn,"UPDATE USER SET USR_TRANGTHAI = 1 WHERE USR_SDT = '$sdt'"))
				{
					echo "<script>alert('Kích hoạt tài khoản $sdt thành công!');</script>";
					echo '<META http-equiv="refresh" content="0;URL=http:../index.php?view=danhsachnguoidung"/>';	
				}
			}
	}
?>