<?php
	include('../config/connect.php');
	if(isset($_POST['xlnh'])){
		$id = $_POST['id'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date = date('Y-m-d H:i:s');
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = 3 , DH_NGAYNHAN =  '$date'  WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Đã nhận đơn hàng');
				 $("#show").load('trang/dvvc_donhangchonhan.php');
			</script>
		<?php
	}
	} else 
	if(isset($_POST['xlkn'])){
		$id = $_POST['id'];
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = -2 WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Đã từ chối nhận đơn hàng');
				 $("#show").load('trang/dvvc_donhangchonhan.php');
			</script>
		<?php
	}
	} else if(isset($_POST['xltt'])){
		$id = $_POST['id'];
		$tt = $_POST['tt'];
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = $tt WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Cập nhật trạng thái thành công!');
				 $("#show").load('trang/dvvc_donhang_danhan.php');
			</script>
		<?php
	}
	} else if(isset($_POST['xlttkg'])){
		$id = $_POST['id'];
		$tt = $_POST['tt'];
		$ld= $_POST['ld'];
		mysqli_set_charset($conn,"UTF8");
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = $tt , DH_LIDO = '$ld' WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Cập nhật trạng thái thành công!');
				 $("#show").load('trang/dvvc_donhang_danggiao.php');
			</script>
		<?php
	}
	} else if(isset($_POST['xlttdg'])){
		$id = $_POST['id'];
		$tt = $_POST['tt'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date = date('Y-m-d H:i:s');
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = $tt , DH_NGAYGIAO = '$date' WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert('Cập nhật trạng thái thành công!');
				 $("#show").load('trang/dvvc_donhang_danggiao.php');
			</script>
		<?php
	}
	}  else if(isset($_POST['xlan'])){
		$id = $_POST['id'];
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = 7 WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert(' Ân đơn hàng thành công!');
				 $("#show").load('trang/dvvc_donhang_dagiao.php');
			</script>
		<?php
	}
	}  else if(isset($_POST['xltrh'])){
		$id = $_POST['id'];
		$sql = "UPDATE DONHANG SET DH_TRANGTHAI = -1 WHERE DH_ID = $id";
		if(mysqli_query($conn,$sql)){
		?>
			<script type="text/javascript">
				alert(' Trả đơn hàng thành công!');
				 $("#show").load('trang/dvvc_donhang_khonggiao.php');
			</script>
		<?php
	}
	} 
?>