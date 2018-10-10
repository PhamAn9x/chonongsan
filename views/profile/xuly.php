<?php
include("../../config/connect.php");
if(isset($_POST['flat_update_usr'])){
	$sdt= $_POST['sdt'];
	$ho = $_POST['ho'];
	$ten = $_POST['ten'];
	$htx = $_POST['htx'];
	$email = $_POST['email'];
	$ngaysinh = $_POST['ngaysinh'];
	$gioitinh = $_POST['gioitinh'];
	$sql = "UPDATE USER SET USR_HO = '$ho' , USR_TEN = '$ten', HTX_ID=$htx,USR_EMAIL='$email',USR_NGAYSINH='$ngaysinh',USR_GIOITINH='$gioitinh' WHERE USR_SDT = '$sdt'";
	mysqli_set_charset($conn,"UTF8");
	if(mysqli_query($conn,$sql)){
?>
	<script type="text/javascript">
		alert("Cập nhật thành công!");
	</script>
<?php
	}else{
	?>
		<script type="text/javascript">alert("Cập nhật thất bại!");</script>
	<?php
}
} else
	if(isset($_POST['flat_update_pass'])){
	$sdt= $_POST['sdt'];
	$mkc = md5($_POST['mkc']);
	$mkm = md5($_POST['mkm']);
	$sql_ck ="SELECT * FROM USER WHERE USR_SDT = '$sdt' AND USR_PASS = '$mkc' ";
	if(mysqli_num_rows(mysqli_query($conn,$sql_ck)) > 0){
		$sql = "UPDATE USER SET USR_PASS = '$mkm'  WHERE USR_SDT = '$sdt'";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){
	
	
	
?>
	<script type="text/javascript">
		alert("Cập nhật thành công!");
	</script>
<?php
	}
	else{
	?>
		<script type="text/javascript">alert("Cập nhật thất bại!");</script>
	<?php
}
}
}
?>
  <!-- alert(ho+ten+htx+email+ngaysinh+gioitinh); -->