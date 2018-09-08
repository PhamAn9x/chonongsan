<?php
include('../config/connect.php');
	mysqli_set_charset($conn,"UTF8");
	session_start();
	if(isset($_POST['ipsoluong'])){
		$sl = $_POST['ipsoluong'];
		$id = $_POST['idsp'];
		$dong = mysqli_fetch_array(mysqli_query($conn,"SELECT *,(SELECT HA_TEN FROM HINHANH AS HA WHERE SP.SP_ID = HA.SP_ID LIMIT 0,1) AS HA_TEN FROM SANPHAM AS SP WHERE SP.SP_ID=".$id));
		echo $dong['HA_TEN'];
		$slht = $dong['SP_SOLUONG'];
if($slht >= $sl ){
		$sanpham =array
		(
			"id" => $id,
			"soluong" => $sl,
			"ten" => $dong['SP_TEN'],
			"gia" => $dong['SP_GIA'],
			"hinhanh" => $dong['HA_TEN'],
			"mota" => $dong['SP_MOTANGAN']
		);
		$giohang = array();
		$giohang[$sanpham['id']] = $sanpham ;


	if(!isset($_SESSION['giohang']) || $_SESSION['giohang'] == null)
	{
			$_SESSION['giohang'][$id] = $sanpham;
	}
	else
	{
		echo "da co sna pham <br>";
		if(array_key_exists($id, $_SESSION['giohang'])){
			$_SESSION['giohang'][$id]['soluong']+= $sl;
		}
		else
		{
			$_SESSION['giohang'][$id] = $sanpham;
		}
	}
}
	else {
		?>
		<script type="text/javascript">alert('Khả năng cũng cấp không đủ! vui lòng chọn ít sản phẩm hơn!');</script>
		<?php
	}
}


?>
<meta  http-equiv="refresh" content="0,URL=../index.php?xem=giohang"/>








