<?php
	include('../config/connect.php');
	if(isset($_POST['key'])){
		$id = $_POST['key'];
		if(mysqli_query($conn,"DELETE FROM SANPHAM WHERE SP_ID = $id")){
			$kq = mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE SP_ID = $id");
				while($row = mysqli_fetch_array($kq,MYSQLI_ASSOC)){
					if(unlink("../upload/".$row['HA_TEN'])) echo "xoa ảnh thanh cong"; else echo "không thể xóa anh";
				}
			if(mysqli_query($conn,"DELETE FROM HINHANH WHERE SP_ID = $id")){
			} else echo "Không thể xóa hình ảnh!";
			?>

			<?php
		} else echo "không thể xóa ản phẩm!";
		?>
		<script type="text/javascript">window.location.href='../index.php?view=danhsachsanpham'</script
		<?php
	}

?>