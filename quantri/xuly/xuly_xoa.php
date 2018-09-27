<?php 
	include("../../config/connect.php");
	if(isset($_POST['xoa_usr'])){
		$sdt = $_POST['xoa_usr'];
		if(mysqli_query($conn,"DELETE FROM USER WHERE USR_SDT = $sdt")){
			?>
			<script type="text/javascript">
				alert("Xóa thành công!")
				 $("#show").load('trang/danhsach_nguoidung.php');
			</script>
			<?php
		}
	}
	if(isset($_POST['edit_usr'])){
		echo "edit sdt";
	}else
	if(isset($_POST['kichhoat_usr'])){
		$sdt = $_POST['kichhoat_usr'];
		if(mysqli_query($conn,"UPDATE USER SET USR_TRANGTHAI = 1 WHERE USR_SDT = $sdt")){
			?>
			<script type="text/javascript">
				alert("Kích hoạt tài khoản thành công!")
				 $("#show").load('trang/danhsach_nguoidung.php');
			</script>
			<?php
		}
	}else
	if(isset($_POST['lock_usr'])){
		$sdt = $_POST['lock_usr'];
		if(mysqli_query($conn,"UPDATE USER SET USR_TRANGTHAI = 0 WHERE USR_SDT = $sdt")){
			?>
			<script type="text/javascript">
				alert("Khóa tài khoản thành công!")
				 $("#show").load('trang/danhsach_nguoidung.php');
			</script>
			<?php
		}
	}else
		if(isset($_POST['xoa_multi'])){
			$arr = $_POST['xoa_multi'];
			$check = 0;
			for($i=0;$i< count($arr);$i++){
				$sdt = $arr[$i];
				if(mysqli_query($conn,"DELETE FROM USER WHERE USR_SDT = $sdt")) $check=0; else $check = 1;
			}
			if($check==0){
			?>
				<script type="text/javascript">
					alert("Đã xóa thành công <?php echo count($arr);?> người dùng");
					 $("#show").load('trang/danhsach_nguoidung.php');
				</script>		
			<?php
		}
		}

?>