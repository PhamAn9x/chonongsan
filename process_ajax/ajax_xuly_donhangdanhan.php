<?php
	include('../config/connect.php');
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = 2 WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Đã giao đơn hàng');
				window.location.href="index.php?view=dh_danhan";
			</script>
		<?php
	}
	}
?>