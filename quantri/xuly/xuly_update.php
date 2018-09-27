<?php
include("../../config/connect.php");
	if(isset($_POST['quyen'])){
		$email = $_POST['email'];
		$ho = $_POST['ho'];
		$ten = $_POST['ten'];
		$gt = $_POST['gt'];
		$htx = $_POST['htx'];
		$quyen = $_POST['quyen'];
		$sdt = "0".$_POST['sdt'];
		$sql = "UPDATE USER SET USR_EMAIL = '$email', USR_HO = '$ho',USR_TEN = '$ten', USR_GIOITINH = '$gt', HTX_ID = $htx, Q_ID = $quyen WHERE USR_SDT = '$sdt'";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){

		?>

			<script type="text/javascript">
				alert("Đã cập nhật thành công!");
				$("#show").load('trang/danhsach_nguoidung.php');
		</script>

		<?php
	}else{
		?>
			<script type="text/javascript">alert("");</script>

		<?php
	}
	}
?>