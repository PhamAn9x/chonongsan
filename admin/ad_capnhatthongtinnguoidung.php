<link rel="stylesheet" type="text/css" href="../css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="ajax/ajax_capnhatthongtinnguoidung.js"></script>
<?php 
	include('../config/connect.php');
?>
<div class="w3-row">
		<div class="w3-row">
			<div class="w3-col s6 w3-left">
				<h6 style="font-weight: 800" class="w3-center">CHỌN NGỜI DÙNG CẦN KÍCH HOẠT TÀI KHOẢN</h6>
				<div class="w3-row" style=" width: 100%;">
					<select class="w3-input w3-center w3-round" style="width: 50%; margin-left:25%; " id="slusra" name="slusra">
						<option value="">--- Chọn người dùng ---</option>
					<?php
						mysqli_set_charset($conn, 'UTF8');
						$sql = "SELECT * FROM USER WHERE USR_TRANGTHAI = 0";
						$result = mysqli_query($conn,$sql);
						foreach ($result as $rows) {
							?>
							<option value="<?php echo $rows['USR_SDT']; ?>"> <?php echo $rows['USR_SDT'] .'-'.$rows['USR_HO'].' '.$rows['USR_TEN'];?></option>
					<?php
						}
					?>
					</select>
				</div>
			</div>
			<div class="w3-col s6">
				<h6 style="font-weight: 800" class="w3-center">CHỌN NGỜI DÙNG CẦN KHÓA TÀI KHOẢN</h6>
				<div class="w3-row" style=" width: 100%;">
					<select class="w3-input w3-center w3-round" style="width: 50%; margin-left:25%; " id="slusrl" name="slusrl">
						<option value="">--- Chọn người dùng ---</option>
					<?php
						mysqli_set_charset($conn, 'UTF8');
						$sql = "SELECT * FROM USER WHERE USR_TRANGTHAI = 1";
						$result = mysqli_query($conn,$sql);
						foreach ($result as $rows) {
							?>
							<option value="<?php echo $rows['USR_SDT']; ?>"> <?php echo $rows['USR_SDT'] .'-'.$rows['USR_HO'].' '.$rows['USR_TEN'];?></option>
					<?php
						}
					?>
					</select>
			</div>
	</div>
	<div id="ttusr" name="ttusr">
			
		</div>
</div>
</div>