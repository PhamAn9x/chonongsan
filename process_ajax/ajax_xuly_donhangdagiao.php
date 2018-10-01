<?php
	include('../config/connect.php');
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM DONHANG WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Đã xóa đơn hàng');
				window.location.href="index.php?view=dh_dagiao";
			</script>
		<?php
	}
	}
	if(isset($_GET['dh_id'])){
		$id = $_GET['dh_id'];
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = 3 WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Đã báo nhận hàng thành công');
				window.location.href="index.php?view=ql_donhang";
			</script>
		<?php
	}
	}
	if(isset($_GET['xoa'])){
		$id = $_GET['xoa'];
		// $sql = "UPDATE DONHANG SET DH_TRANGTHAI = 3 WHERE DH_ID = $id";
		// if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Đã báo nhận hàng thành công');
				window.location.href="index.php?view=ql_donhang";
			</script>
		<?php
	}
	//}
?>