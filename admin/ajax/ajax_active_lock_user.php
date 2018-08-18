<?php
	include("../../config/connect.php");
	if(isset($_POST['id_acl'])){
		$lock  = $_POST['id_acl'];
	$sql ="UPDATE USER SET USR_TRANGTHAI = 0 WHERE USR_SDT = '$lock'";
	if(mysqli_query($conn,$sql)){
	?>
		<script>
			alert('Đã khóa tài khoản thành công!');
			window.location="index.php?view=capnhatthongtinnguoidung";
		</script>
		


<?php
	}
	}

	if(isset($_POST['id_aca'])){
		$active  = $_POST['id_aca'];
	$sql ="UPDATE USER SET USR_TRANGTHAI = 1 WHERE USR_SDT = '$active'";
	if(mysqli_query($conn,$sql)){
		?>
		<script>
			alert('Đã mở tài khoản thành công!')
			window.location="index.php?view=capnhatthongtinnguoidung";
	</script>
<?php
	}
	}
?>
