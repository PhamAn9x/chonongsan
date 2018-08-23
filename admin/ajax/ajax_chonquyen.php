<?php
include("../../config/connect.php");
if(isset($_GET['id'])){
	$sdt = $_GET['id'];
	$q = $_GET['q'];
	$sql ="UPDATE USER SET Q_ID = $q WHERE USR_SDT = '$sdt'";
	if(mysqli_query($conn,$sql)){
	?>
		<script>
			alert('Đã cấp quyền thành công!');
			window.location="../index.php?view=danhsachnguoidung";
		</script>
<?php
}
}
?>