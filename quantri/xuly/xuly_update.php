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
	}else
		if(isset($_POST['manhom'])){
		$manhom = $_POST['manhom'];
		$ten = $_POST['ten'];
		$mota = $_POST['mota'];
		$sql = "UPDATE NHOMSANPHAM SET NSP_TEN = '$ten', NSP_MOTA = '$mota' WHERE NSP_ID = $manhom";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){

		?>

			<script type="text/javascript">
				alert("Đã cập nhật nhóm sản phẩm thành công!");
				$("#show").load('trang/danhsach_nhomsanpham.php');
		</script>

		<?php
	}else{
		?>
			<script type="text/javascript">alert("");</script>

		<?php
	}
	}else
		if(isset($_POST['lsp_id'])){
		$lsp = $_POST['lsp_id'];
		$ten = $_POST['ten'];
		$mota = $_POST['mota'];
		$sql = "UPDATE LOAISANPHAM SET LSP_TEN = '$ten', LSP_MOTA = '$mota' WHERE LSP_ID = $lsp";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){

		?>

			<script type="text/javascript">
				alert("Đã cập nhật loại sản phẩm thành công!");
				$("#show").load('trang/danhsach_loaisanpham.php');
		</script>

		<?php
	}else{
		?>
			<script type="text/javascript">alert("");</script>

		<?php
	}
	}else
		if(isset($_POST['duyet_sp'])){
		$sp_id = $_POST['duyet_sp'];
		$sql = "UPDATE SANPHAM SET SP_TRANGTHAI=1 WHERE SP_ID = $sp_id";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){

		?>

			<script type="text/javascript">
				alert("Duyệt sản phẩm thành công!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>

		<?php
	}else{
		?>
			<script type="text/javascript">
				alert("Đã xảy ra lỗi!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>
	
		<?php
	}
	}
	else 
		if(isset($_POST['khoa_sp'])){
		$sp_id = $_POST['khoa_sp'];
		$sql = "UPDATE SANPHAM SET SP_TRANGTHAI=0 WHERE SP_ID = $sp_id";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){

		?>

			<script type="text/javascript">
				alert("Khóa sản phẩm thành công!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>

		<?php
	}else{
		?>
			<script type="text/javascript">
				alert("Đã xảy ra lỗi!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>
	
		<?php
	}
	}else
		if(isset($_POST['chapnhan'])){
		$sp_id = $_POST['chapnhan'];
		$sql = "UPDATE SANPHAM SET SP_TRANGTHAI=1 WHERE SP_ID = $sp_id";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){

		?>

			<script type="text/javascript">
				alert("Kích hoạt sản phẩm thành công!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>

		<?php
	}else{
		?>
			<script type="text/javascript">
				alert("Đã xảy ra lỗi!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>
	
		<?php
	}
	}
	else
		if(isset($_POST['khongchapnhan'])){
		$sp_id = $_POST['khongchapnhan'];
		$sql = "UPDATE SANPHAM SET SP_TRANGTHAI=2 WHERE SP_ID = $sp_id";
		mysqli_set_charset($conn,"UTF8");
		if(mysqli_query($conn,$sql)){

		?>

			<script type="text/javascript">
				alert("Từ chối sản phẩm thành công!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>

		<?php
	}else{
		?>
			<script type="text/javascript">
				alert("Đã xảy ra lỗi!");
				$("#show").load('trang/danhsach_sanpham.php');
		</script>
	
		<?php
	}
	}
?>