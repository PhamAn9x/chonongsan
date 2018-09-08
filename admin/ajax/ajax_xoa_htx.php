<?php
	include("../../config/connect.php");
	if(isset($_GET['id'])){
		$key = $_GET['id'];
		$sql = "DELETE FROM HOPTACXA WHERE HTX_ID = $key";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			echo "<META http-equiv='refresh' content='0;URL=../index.php?view=danhsachhoptacxa'";
			echo "<script>alert('Đã xóa thành công!');</script>";
		}else echo "<script>alert('Chưa xóa được hợp tác xã!');</script>";
	}
?>