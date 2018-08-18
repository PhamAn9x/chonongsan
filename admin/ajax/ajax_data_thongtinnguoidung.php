<script type="text/javascript" src="ajax/ajax_capnhatthongtinnguoidung.js"></script>
<?php
	include("../../config/connect.php");
	if(isset($_POST['id_nda'])){
		mysqli_set_charset($conn, 'UTF8');
		$keya = $_POST['id_nda'];
		$sql = "SELECT * FROM USER AS USR, HOPTACXA AS HTX, TINH_THANH AS T, QUAN_HUYEN AS H, PHUONG_XA AS X, QUYEN AS Q WHERE USR_SDT = '$keya' AND USR.HTX_ID = HTX.HTX_ID AND USR.ID_TINH = T.ID_TINH AND USR.ID_HUYEN = H.ID_HUYEN AND USR.ID_XA = X.ID_XA AND USR.Q_ID = Q.Q_ID";
		$result = mysqli_query($conn,$sql);
		foreach ($result as $rows) {
			?>
		<div class="w3-row w3-center">
			<h2>KÍCH HOẠT TÀI KHOẢN NGƯỜI DÙNG</h2>
		</div>
		<div  class="w3-center" style="font-style: italic; font-size: 19px;"><h6>Thông tin tài khoản : <span style="color: blue;"><?php echo $rows['USR_HO'].' '.$rows['USR_TEN']; ?></span></h6></div>
		<div class="w3-row" style="border: 2px solid green; border-radius: 5px; width: 80%; font-family: 'roboro'; box-shadow: 3px 2px 2px 2px grey; margin-left: 10%; margin-bottom: 2%;">
				<div class="w3-col s6 w3-table frkichhoat1">
					<div>Số điện thoại</div>
					<div>Họ và tên</div>
					<div>Ngày sinh</div>
					<div>Giới tính</div>
					<div>Địa chỉ</div>
					<div>Email</div>
					<div>Ngày đăng ký</div>
					<div>Quyền hạn</div>
					<div>Đơn vị HTX</div>
					<div>Số gian hàng hiện có</div>
					<div>Trạng thái kích hoạt</div>

				</div>
				<div class="w3-col s6 w3-table frkichhoat">
					<div><?php echo $rows['USR_SDT']; ?></div>
					<div><?php echo $rows['USR_HO'].' '.$rows['USR_TEN']; ?></div>
					<div><?php echo $rows['USR_NGAYSINH']; ?></div>
					<div><?php echo $rows['USR_GIOITINH']; ?></div>
					<div><?php echo $rows['XA_NAME'].'-'.$rows['HUYEN_NAME'].'-'.$rows['TINH_NAME']; ?></div>
					<div><?php echo $rows['USR_EMAIL']; ?></div>
					<div><?php echo $rows['USR_NGAYDANGKY']; ?></div>
					<div style="color: blue;"><?php echo $rows['Q_TEN']; ?></div>
					<div><?php echo $rows['HTX_TEN']; ?></div>
					<div>Số gian hàng hiện có</div>
					<div><?php if($rows['USR_TRANGTHAI'] == 1) echo '<span style="color:green;">Đã kích hoạt</span>'; else echo '<span style="color:red;">Chưa kích hoạt</span>'; ?></div>
				</div>
		
		<div class="w3-row w3-center" style="padding-top: 2%; margin-bottom: 2%;">
			<input style="width: 120px;" class="w3-btn w3-round w3-hover-white w3-blue" type="button" name="kichhhoattaikhoan" id="kichhoattaikhoan" value="Kích hoạt">
			<input style="width: 120px;" class="w3-btn w3-round w3-hover-white w3-red" type="button" name="" value="Trở lại">
		</div>

</div>



			<?php
		}

	}
?>


<?php

if(isset($_POST['id_ndl'])){
		mysqli_set_charset($conn, 'UTF8');
		$keyl = $_POST['id_ndl'];
		$sql = "SELECT * FROM USER AS USR, HOPTACXA AS HTX, TINH_THANH AS T, QUAN_HUYEN AS H, PHUONG_XA AS X, QUYEN AS Q WHERE USR_SDT = '$keyl' AND USR.HTX_ID = HTX.HTX_ID AND USR.ID_TINH = T.ID_TINH AND USR.ID_HUYEN = H.ID_HUYEN AND USR.ID_XA = X.ID_XA AND USR.Q_ID = Q.Q_ID";
		$result = mysqli_query($conn,$sql);
		foreach ($result as $rows) {
			?>
		<div class="w3-row w3-center">
			<h2>KHÓA TÀI KHOẢN NGƯỜI DÙNG</h2>
		</div>
		<div  class="w3-center" style="font-style: italic; font-size: 19px;"><h6>Thông tin tài khoản : <span style="color: blue;"><?php echo $rows['USR_HO'].' '.$rows['USR_TEN']; ?></span></h6></div>
		<div class="w3-row" style="border: 2px solid green; border-radius: 5px; width: 80%; font-family: 'roboro'; box-shadow: 3px 2px 2px 2px grey; margin-left: 10%; margin-bottom: 2%;">
				<div class="w3-col s6 w3-table frkichhoat1">
					<div>Số điện thoại</div>
					<div>Họ và tên</div>
					<div>Ngày sinh</div>
					<div>Giới tính</div>
					<div>Địa chỉ</div>
					<div>Email</div>
					<div>Ngày đăng ký</div>
					<div>Quyền hạn</div>
					<div>Đơn vị HTX</div>
					<div>Số gian hàng hiện có</div>
					<div>Số lựơt truy cập</div>
					<div>Trạng thái kích hoạt</div>

				</div>
				<div class="w3-col s6 w3-table frkichhoat">
					<div><?php echo $rows['USR_SDT']; ?></div>
					<div><?php echo $rows['USR_HO'].' '.$rows['USR_TEN']; ?></div>
					<div><?php echo $rows['USR_NGAYSINH']; ?></div>
					<div><?php echo $rows['USR_GIOITINH']; ?></div>
					<div><?php echo $rows['XA_NAME'].'-'.$rows['HUYEN_NAME'].'-'.$rows['TINH_NAME']; ?></div>
					<div><?php echo $rows['USR_EMAIL']; ?></div>
					<div><?php echo $rows['USR_NGAYDANGKY']; ?></div>
					<div style="color: blue;"><?php echo $rows['Q_TEN']; ?></div>
					<div><?php echo $rows['HTX_TEN']; ?></div>
					<div>Số gian hàng hiện có</div>
					<div><?php echo $rows['USR_SOLUOTDANGNHAP']; ?></div>
					<div><?php if($rows['USR_TRANGTHAI'] == 1) echo '<span style="color:green;">Đã kích hoạt</span>'; else echo '<span style="color:red;">Chưa kích hoạt</span>'; ?></div>
				</div>
		
		<div class="w3-row w3-center" style="padding-top: 2%; margin-bottom: 2%;">
			<input style="width: 120px;" class="w3-btn w3-round w3-hover-white w3-blue" type="button" name="" value="Khóa tài khoản" id="khoataikhoan">
			<input style="width: 120px;" class="w3-btn w3-round w3-hover-white w3-red" type="button" name="" value="Trở lại">
		</div>

</div>



			<?php
		}

	}
?>