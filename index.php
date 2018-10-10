<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body bgcolor="#FFFFFF">
	<style type="text/css">
	ul li a{
		font-size: 15px;
	}
</style>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="css/boxsp.css" rel="stylesheet" type="text/css"/>
<link href="css/demo-page.css" rel="stylesheet">
<link href="css/imagehover.css" rel="stylesheet">
<link href="css/style_sp.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
<script type="text/javascript" src="js/boxsp.js"></script>
<script type="text/javascript" src="js/menu.css"></script>
<?php 
include("config/connect.php");
session_start();

?>
<?php if(isset($_SESSION['popup']) && isset($_SESSION['ndthuong'])){
	include('views/popup.php');
	unset($_SESSION['popup']);
}
?>
<?php
function adddotstring($strNum) {

	$len = strlen($strNum);
	$counter = 3;
	$result = "";
	while ($len - $counter >= 0)
	{
		$con = substr($strNum, $len - $counter , 3);
		$result = ','.$con.$result;
		$counter+= 3;
	}
	$con = substr($strNum, 0 , 3 - ($counter - $len) );
	$result = $con.$result;
	if(substr($result,0,1)==','){
		$result=substr($result,1,$len+1);   
	}
	return $result;
}
?>
<div style=" padding-bottom: 20%;">
	<div class="w3-row">
		<img src="logo_image/banner.png" style=" margin-left: 1%; width: 98%;">
	</div>
	<div class="w3-row w3-col s12">
		<?php 
		if(!isset($_GET['view']) && !isset($_GET['xem']))
		{
			include('views/slider.php'); 
		}
		?>
	</div>

	<div class="w3-row">
		<?php
		if(isset($_SESSION['user']) && isset($_SESSION['ndthuong'])){
	if(isset($_SESSION['sdt'])){
		$sdt = $_SESSION['sdt'];
	$slthich = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM THICH WHERE USR_SDT = $sdt"));
	} else $slthich = 0;
			?>

		<style type="text/css">
			#menu li a{
				font-size: 14px;
				margin-left: 8px;
				margin-right: 8px;
			}
		</style>

		<ul class="mn" id="menu" style=" margin-bottom: 1%; padding-left: 5px; background-color:#0a3d62; z-index: 0;width: 98%;margin-left: 1%;">
			<li><a href="index.php">Trang chủ</a></li>
			<li><a href="index.php?view=ql_lenhban">Lệnh bán</a></li>
			<li><a href="index.php?view=ql_lenhmua">Lệnh mua</a></li>
			<?php
			$sdt = $_SESSION['sdt'];
			mysqli_set_charset($conn,"UTF8");
			$rs= mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdt'"));
			?>
			<li><a href="index.php?view=ql_khoplenh">Khớp lệnh</a></li>
				<li><a href="index.php?view=tt_taikhoan" style="color: yellow;" >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp NGƯỜI DÙNG <br /><span style="color: white; font-style: italic; margin-left: 2%:">(<?php echo $rs[0].$rs[1]; ?>)</span></a></li>
			<li><a href="index.php?xem=sanphamdathich" >Đã thích(<?php echo $slthich; ?>) <img src="logo_image/ictim.png" width="20px" height="20px">
			</a></li>
		
			<li><a href="index.php?view=ql_donhang">Đơn hàng</a></li>
			<li><a href="index.php?view=ql_lichsu">Lịch sử </a></li>
			<!-- <li><a href="index.php?view=tt_taikhoan">Người dùng</a></li> -->
			<!-- <li><a href="">Đổi mật khẩu</a></li> -->
			<li><a href="?view=dangxuat">Đăng xuất</a></li>
		</ul>
		<?php
	} 

	?>


	<?php
	if(isset($_SESSION['user']) && isset($_SESSION['htx'])){
		?>
		<style type="text/css">
		#menu li a{
			font-size: 15px;
		}
	</style>
	<ul id="menu" style="margin-bottom: 1%;background-color:#0a3d62; z-index: 0;width: 98%;margin-left: 1%;">

		<li><a href="index.php?view=ql_tindang">Quản lí tin đăng</a></li>
		<li><a href="index.php?view=ql_lenhban">Quản lí lệnh bán</a></li>
		<li><a href="index.php?view=ql_lenhmua">Quản lí lệnh mua</a></li>
		<li><a style="color: yellow;">QUẢN TRỊ HỢP TÁC XÃ<br /><i style="color: white;padding-left: 2%;">(<?php echo $_SESSION['htx_ten']; ?>)</i></a></li>
		<li><a href="index.php?view=ql_khoplenh">Quản lí khớp lệnh</a></li>
		<li><a href="index.php?view=tt_taikhoan">Chi tiết người dùng</a></li>
		<!-- <li><a href="">Đổi mật khẩu</a></li> -->
		<li><a href="?view=dangxuat">Đăng xuất</a></li>
	</ul>
	<?php
} 

?>


<?php
if(isset($_SESSION['user']) && isset($_SESSION['giaohang'])){
	?>
	<style type="text/css">
	#menu li a{
		font-size: 15px;
	}
</style>
<ul id="menu" style="margin-bottom: 1%; padding-left: 10%; background-color:#0a3d62; z-index: 0;width: 98%;margin-left: 1%;">
<li><a href="index.php">Trang chủ</a></li>
	<li><a href="index.php?view=dh_chonhan">Đơn hàng chờ nhận</a></li>
	<li><a href="index.php?view=dh_danhan">Đơn hàng đã nhân</a></li>

	<?php
	$sdt = $_SESSION['sdt'];
	mysqli_set_charset($conn,"UTF8");
	$rs= mysqli_fetch_row(mysqli_query($conn,"SELECT DVVC_TEN FROM DONVIVANCHUYEN WHERE DVVC_SDT= '$sdt'"));
	?>
	<li><a style="color: yellow;" >&nbsp&nbsp&nbspĐƠN VỊ GIAO HÀNG <br /><span style="color: white; font-style: italic; margin-left: 2%:">(<?php echo $rs[0]; ?>)</span></a></li>
	<li><a href="index.php?view=dh_dagiao">Đơn hàng đã giao</a></li>
	<li><a href="index.php?view=tt_taikhoan">Chi tiết người dùng</a></li>
	<!-- <li><a href="">Đổi mật khẩu</a></li> -->
	<li><a href="?view=dangxuat">Đăng xuất</a></li>
</ul>
<?php
} 

?>
</div>
<div class="w3-row">
	<?php 
	if(!isset($_GET['view']) && !isset($_GET['xem']))
	{
		include("views/tinmoidang.php"); 
	}
	?>
</div>
<!-- <hr /> -->
<div class="w3-row" style=" margin-left: 1%; width: 98%; margin-top: 1%; margin-bottom: 1%;">
		<?php 
if(isset($_GET['view']) != "dangnhap" && isset($_GET['view']) != "dangky" &&  isset($_GET['xem']) != "chotietsanpham"){
		include("views/menu1.php");
}
		?>
	</div>
	<div class="w3-row" style=" margin-left: 4%; width: 98%; margin-top: 1%; margin-bottom: 1.5%;" >

		<?php 
		if(isset($_GET['view']) != "dangnhap" && isset($_GET['view']) != "dangky" &&  isset($_GET['xem']) != "chotietsanpham"){
		include("views/banner_bar.php");
	}
		?>
	</div>
	<!-- <div class="w3-row w3-col s3" style="width:24%;" >
		<?php 
			// if(!isset($_GET['view']))
			// {
			//     include("vendor/menu/index_danhmucsp.php");
			// }
		?>
	</div> -->
	<?php
	if(!isset($_GET['view'])){
		?>
		<div class="w3-col s12" style="width: 99%; margin-left: 0.5%;padding: 8px;  border: double 3px green; border-radius: 7px; ">
			<?php
			if(isset($_GET['xem'])){
				$xem = $_GET['xem'];
				if($xem == 'chitietsanpham') include('views/chitietsanpham.php');
				else
					if($xem == 'sanphamdathich') include('views/sanphamdathich.php');
				else 
					if($xem == 'giohang') include('views/giohang.php');

				?>
			</div>

			<?php 
		} else
		include("views/index_sp.php");
	} 
	else {		 
		?>
		<div class="w3-col s12" style="padding: 10px; margin-left: 3%; border: double 3px green; border-radius: 7px; width: 95%;">
			<?php 
			$view = $_GET['view'];
			if($view == "dangky") include("views/dangky.php");
			else
				if($view == "dangnhap") include("views/dangnhap.php");
			else
				if($view == "dangtin") include("views/dangtin.php");
			else 
				if($view == "dangxuat") include("views/dangxuat.php");
			else
				if($view == "capnhathinhanh") include("views/list_sanpham_vuadang.php");
			else
				if($view == "xulydonhang") include("views/xulydonhang.php");
			else
				if($view == "ql_lenhban") include('views/quanly_lenhban.php');
			else 
				if($view == "ql_lenhmua") include('views/quanly_lenhmua.php');
			else 
				if($view == "ql_khoplenh") include('views/quanly_khoplenh.php');
			else 
				if($view == "ql_tindang") include('views/quanlytindang.php');
			else
				if($view == "dh_dadat") include('views/donhang_damua.php');
			else
				if($view == "tt_taikhoan") include('views/profile/index.php');
			else
				if($view == "doimatkhau") include('views/doimatkhau.php');
			else
				if($view == "kichhoat") include('views/xacthuc_taikhoan.php');
			else
				if($view == "dh_chonhan") include('views/dvvc_donhangchonhan.php');
			else
				if($view == "ql_donhang") include('views/quanly_donhang.php');
			else
				if($view == "ql_dh_ct") include('views/ql_donhang_chitiet.php');
			else
				if($view == "dh_danhan") include('views/dvvc_donhang_danhan.php');
			else
				if($view == "dh_dagiao") include('views/dvvc_donhang_dagiao.php');
			else
				if($view == "ql_lichsu") include('views/ql_lichsu_muahang.php');
			else
				if($view == "htx_chitiet") include('views/thanhvien_htx/index.php');

			?>	
		</div>

		<?php 
	}
	?>
	<div class="w3-col s12" style="text-align: center; padding-left: 0%; width: 100%;">
		<?php 
		if(!isset($_GET['view']) && !isset($_GET['xem']))
		{
			include('views/mapshtx.php');
		}
		?>
	</div>
	<div class="w3-col s12" style="height: 30%; margin-top: 5%;">
		<!-- <img style="margin-left: 1%;" src="logo_image/footer.jpg" width="98%" height="150px"> -->
	</div>
	<body>