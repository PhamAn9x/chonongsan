<?php
	include('../config/connect.php');
	if(isset($_POST['idsp'])){
		$id = $_POST['idsp'];
		$sl = $_POST['sl'];
		$dong = mysqli_fetch_row(mysqli_query($conn,"SELECT SP_SOLUONG FROM SANPHAM WHERE SP_ID = $id"));
		$slht = $dong[0];
			if($slht < $sl ){
		?>

		<script type="text/javascript"> alert("Số lượng hàng không đủ cung cấp! Vui lòng chọn lại số lượng!");</script>
		<?php
	}
	}
?>