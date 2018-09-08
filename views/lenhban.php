
<link rel="stylesheet" type="text/css" href="css/lenhban_mua.css">
<?php
	include("config/connect.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		mysqli_set_charset($conn,"UTF8");
		$sql = "SELECT * FROM SANPHAM WHERE SP_ID = $id";
		$result=mysqli_query($conn,$sql);
		$dong = mysqli_fetch_array($result);
	}
?>
<div class="w3-row w3-col s12 tieude1">
	ĐẶT LỆNH BÁN
	</div>
	<div class="w3-col s6">
		<div class="w3-row tieude">Thông Tin Sản Phẩm</div>
		<table class="w3-table-all w3-hoverable w3-border sanpham">
			<tr>
				<th>Mã sản phẩm</th>
				<td><?php echo $dong['SP_ID']; ?></td>
			</tr>
			<tr>
				<th>Tên sản phẩm</th>
				<td><?php echo $dong['SP_TEN']; ?></td>
			</tr>
			<tr>
				<th>Đơn vị tính</th>
				<td><?php echo $dong['SP_DONVITINH']; ?></td>
			</tr>
			<tr>
				<th>Số lượng</th>
				<td><?php echo $dong['SP_SOLUONG'].' '.$dong['SP_DONVITINH']; ?></td>
			</tr>
			<tr>
				<th>Giá cao nhất</th>
				<td><?php echo adddotstring('2000000');?></td>
			</tr>
			<tr>
				<th>Giá thấp nhất</th>
				<td>100000</td>
			</tr>
		</table>

	</div>
	<div class="w3-col s6">
		<div class="w3-row tieude">Hình Ảnh</div>
	<?php 
		$sql = "SELECT HA_TEN FROM HINHANH WHERE SP_ID = $id";
		$result = mysqli_query($conn,$sql);
		while($dong = mysqli_fetch_array($result)){
	?>
		<a href="#">
			<img class="thumb" src="upload/<?php echo $dong['HA_TEN']; ?>" height="100px" width="100px">
			<img class="big" src="upload/<?php echo $dong['HA_TEN']; ?>" height="400px" width="400px">
		</a>
<?php 
	}
?>
		
	</div>
	<div class="w3-row w3-col s12">
		<br />
		<br />
		<br />
		<div class="w3-col s6">
			<div class="w3-row tieude">ĐANG CẦN MUA</div>
			<table class="w3-table-all w3-hoverable w3-border thongtin">
				<tr>
					<th>Họ tên</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Số lượng</th>
					<th>Giá cần mua</th>
					<th>Tổng thanh toán</th>
					<th>Lời nhắn</th>
				</tr>
				<tr>
					<td>Phạm Nguyễn Trường An</td>
					<td>Xà phiên- Long Mỹ - Hậu Giang</td>
					<td>0979837717</td>
					<td>1000</td>
					<td>300000</td>
					<td>300000000</td>
					<td>Giao hàng tận nơi</td>
				</tr>
				<tr>
					<td>Phạm Nguyễn Trường An</td>
					<td>Xà phiên- Long Mỹ - Hậu Giang</td>
					<td>0979837717</td>
					<td>1000</td>
					<td>300000</td>
					<td>300000000</td>
					<td>Giao hàng tận nơi</td>
				</tr>
			</table>
		</div>
		<div class="w3-col s6">
			<div class="w3-row tieude">ĐANG CẦN BÁN</div>
			<table class="w3-table-all w3-hoverable w3-border thongtin">
				<tr>
					<th>Họ tên</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Số lượng</th>
					<th>Giá cần mua</th>
					<th>Tổng thanh toán</th>
					<th>Lời nhắn</th>
				</tr>
				<tr>
					<td>Phạm Nguyễn Trường An</td>
					<td>Xà phiên- Long Mỹ - Hậu Giang</td>
					<td>0979837717</td>
					<td>1000</td>
					<td>300000</td>
					<td>300000000</td>
					<td>Giao hàng tận nơi</td>
				</tr>
				<tr>
					<td>Phạm Nguyễn Trường An</td>
					<td>Xà phiên- Long Mỹ - Hậu Giang</td>
					<td>0979837717</td>
					<td>1000</td>
					<td>300000</td>
					<td>300000000</td>
					<td>Giao hàng tận nơi</td>
				</tr>
			</table>

		</div>
	</div>
</div>