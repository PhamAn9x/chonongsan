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
	} else
	// if(isset($_POST['edit_usr'])){
	// 	echo "edit sdt";
	// }else
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
		else
			if(isset($_POST['xoa_multi_nsp'])){
				$arr_nsp = $_POST['xoa_multi_nsp'];
				$check = 0;
			for($i=0;$i< count($arr_nsp);$i++){
				$nsp = $arr_nsp[$i];
				if(mysqli_query($conn,"DELETE FROM NHOMSANPHAM WHERE NSP_ID = $nsp")) $check=0; else $check = 1;
			}
			if($check==0){
			?>
				<script type="text/javascript">
					alert("Đã xóa thành công <?php echo count($arr_nsp);?> nhóm sản phẩm");
					 $("#show").load('trang/danhsach_nhomsanpham.php');
				</script>		
			<?php
		}
			} else
				if(isset($_POST['xoa_nsp'])){
		$nsp_id = $_POST['xoa_nsp'];
		if(mysqli_query($conn,"DELETE FROM NHOMSANPHAM WHERE NSP_ID = $nsp_id")){
			?>
			<script type="text/javascript">
				alert("Xóa nhóm sản phẩm thành công!")
				 $("#show").load('trang/danhsach_nhomsanpham.php');
			</script>
			<?php
		}
	}else
			if(isset($_POST['xoa_lsp'])){
		$lsp_id = $_POST['xoa_lsp'];
		if(mysqli_query($conn,"DELETE FROM LOAISANPHAM WHERE LSP_ID = $lsp_id")){
			?>
			<script type="text/javascript">
				alert("Xóa loại sản phẩm thành công!")
				 $("#show").load('trang/danhsach_loaisanpham.php');
			</script>
			<?php
		}
	}else
	if(isset($_POST['block_multi'])){
				$arr_nsp = $_POST['block_multi'];
				$check = 0;
			for($i=0;$i< count($arr_nsp);$i++){
				$nsp = $arr_nsp[$i];
				if(mysqli_query($conn,"UPDATE USER SET USR_TRANGTHAI = 0 WHERE USR_SDT = '$nsp'")) $check=0; else $check = 1;
			}
			if($check==0){
			?>
				<script type="text/javascript">
					alert("Đã khóa thành công <?php echo count($arr_nsp);?> người dùng!");
					 $("#show").load('trang/danhsach_nguoidung.php');
				</script>		
			<?php
		}
			}
			else 
				if(isset($_POST['kichhoat_multi'])){
				$arr_nsp = $_POST['kichhoat_multi'];
				$check = 0;
			for($i=0;$i< count($arr_nsp);$i++){
				$nsp = $arr_nsp[$i];
				if(mysqli_query($conn,"UPDATE USER SET USR_TRANGTHAI = 1 WHERE USR_SDT = '$nsp'")) $check=0; else $check = 1;
			}
			if($check==0){
			?>
				<script type="text/javascript">
					alert("Đã kích hoạt thành công <?php echo count($arr_nsp);?> người dùng!");
					 $("#show").load('trang/danhsach_nguoidung.php');
				</script>		
			<?php
		}
			}else
			if(isset($_POST['sp_xoa_multi'])){
				$arr_sp = $_POST['sp_xoa_multi'];
				$check = 0;
			for($i=0;$i< count($arr_sp);$i++){
				$sp = $arr_sp[$i];
				if(mysqli_query($conn,"DELETE FROM SANPHAM WHERE SP_ID = $sp") && mysqli_query($conn,"DELETE FROM HINHANH WHERE SP_ID = $sp") &&  mysqli_query($conn,"DELETE FROM BINH_LUAN WHERE SP_ID = $sp")){
				 $check=0;
				} else $check = 1;
			}
			if($check==0){
			?>
				<script type="text/javascript">
					alert("Đã xóa thành công <?php echo count($arr_sp);?> sản phẩm!");
					 $("#show").load('trang/danhsach_sanpham.php');
				</script>		
			<?php
		}
			}
			else
				if(isset($_POST['sp_khoa_multi'])){
				$arr_nsp = $_POST['sp_khoa_multi'];
				$check = 0;
			for($i=0;$i< count($arr_nsp);$i++){
				$nsp = $arr_nsp[$i];
				if(mysqli_query($conn,"UPDATE SANPHAM SET SP_TRANGTHAI = 0 WHERE SP_ID = $nsp")) $check=0; else $check = 1;
			}
			if($check==0){
			?>
				<script type="text/javascript">
					alert("Đã khóa thành công <?php echo count($arr_nsp);?> sản phẩm!");
					 $("#show").load('trang/danhsach_sanpham.php');
				</script>		
			<?php
		}
			}
			else
				if(isset($_POST['sp_duyet_multi'])){
				$arr_nsp = $_POST['sp_duyet_multi'];
				$check = 0;
			for($i=0;$i< count($arr_nsp);$i++){
				$nsp = $arr_nsp[$i];
				if(mysqli_query($conn,"UPDATE SANPHAM SET SP_TRANGTHAI = 1 WHERE SP_ID = $nsp")) $check=0; else $check = 1;
			}
			if($check==0){
			?>
				<script type="text/javascript">
					alert("Đã duyệt thành công <?php echo count($arr_nsp);?> sản phẩm!");
					 $("#show").load('trang/danhsach_sanpham.php');
				</script>		
			<?php
		}
			}else
			if(isset($_POST['xoa_sp'])){
		$sp_id = $_POST['xoa_sp'];
		if(mysqli_query($conn,"DELETE FROM SANPHAM WHERE SP_ID = $sp_id")){
			?>
			<script type="text/javascript">
				alert("Xóa sản phẩm thành công!")
				 $("#show").load('trang/danhsach_sanpham.php');
			</script>
			<?php
		}
	}


?>