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
}else if(isset($_POST['tungdo'])){
	$id = $_POST['id'];
	$kinhdo = $_POST['tungdo'];
	$vido   = $_POST['vido'];
	$htx_ten = $_POST['htx_ten'];
	$htx_diachi = $_POST['htx_diachi'];
	$htx_sdt = $_POST['htx_sdt'];
	$dd_ten = $_POST['dd_ten'];
	$dd_diachi = $_POST['dd_diachi'];
	$dd_sdt = $_POST['dd_sdt'];
	$sql = "UPDATE HOPTACXA SET HTX_TEN = '$htx_ten', HTX_DIACHI = '$htx_diachi',HTX_SDT = '$htx_sdt',NDD_TEN='$dd_ten',NDD_SDT='$dd_sdt',
	NDD_DIACHI='$dd_diachi',HTX_KINHDO = $kinhdo,HTX_VIDO = $vido WHERE HTX_ID = $id";
	mysqli_set_charset($conn,"UTF8");
	if(mysqli_query($conn,$sql)){
		?>
				<script>
							alert("Cập nhật hợp tác xã thành công!");
							$("#show").load('trang/danhsach_hoptacxa.php');
				</script>
		<?php
	}
}
    else
        if(isset($_POST['capnhat_dvvc'])){
            $dvvc_id = $_POST['capnhat_dvvc'];
            $ten = $_POST['ten'];
            $diachi = $_POST['diachi'];
            $sdt    = $_POST['sdthoai'];
            $sql = "UPDATE DONVIVANCHUYEN SET DVVC_TEN = '$ten', DVVC_DIACHI = '$diachi',DVVC_SDT = '$sdt' WHERE DVVC_ID = $dvvc_id";
            mysqli_set_charset($conn,"UTF8");
            if(mysqli_query($conn,$sql)){
                ?>
                <script>
                    alert("Cập nhật đơn vị vận chuyển thành công!");
                    $("#show").load('trang/danhsach_donvivanchuyen.php');
                </script>
                <?php
            }
        }
            else

                if(isset($_POST['capnhatgia_dvvc'])){
                $dvvc_id = $_POST['capnhatgia_dvvc'];
$gianhanh  = $_POST['gianhanh'];
$vantocnhanh  = $_POST['vantocnhanh'];
$giachuan = $_POST['giachuan'];
$vantocchuan = $_POST['vantocchuan'];
$sql = "UPDATE LOAIHANGVANCHUYEN SET LH_GIA_NHANH = $gianhanh, LH_GIA_TIEUCHUAN=$giachuan,
THOIGIAN_NHANH=$vantocnhanh,THOIGIAN_TIEUCHUAN=$vantocchuan WHERE DVVC_ID = $dvvc_id";
echo $sql;
mysqli_set_charset($conn,"UTF8");
if(mysqli_query($conn,$sql)){
    ?>
    <script>
        alert("Cập nhật giá vận chuyển thành công!");
        $("#show").load('trang/danhsach_donvivanchuyen.php');
    </script>
    <?php
}
}
?>
