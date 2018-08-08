<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link href="css/boxsp.css" rel="stylesheet" type="text/css"/>
	<link href="css/demo-page.css" rel="stylesheet">
    <link href="css/imagehover.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
	<script type="text/javascript" src="js/boxsp.js"></script>
	<title></title>
</head>
<body style="width: 99%; margin-left: 0.5%; background-image: url('bg-main.jpg');">
	<div class="w3-row">
		<div class="w3-col s8 w3-black">
			<img src="logo_image/banner.png">
		</div>
		<div class="w3-col s4 w3-black">
			<?php  ?>
		</div>
	</div>
	<div class="w3-row" style="margin-top: 1%;">
		<?php include("views/banner_bar.php");?>
	</div>
	<div class="w3-row">
		<div class="w3-col s12 khungsp">
			<div class="w3-row w3-teal w3-round tieude">
				<h1 class="tdl">TIN VỪA MỚI ĐĂNG </h1>
				<div class="tdr"> 
					<?php include("views/clock.php"); ?>
				</div>
			</div>
				<?php include("views/tinmoidang.php"); ?>
		</div>
	</div>
	<div class="w3-row">
		<div class="w3-col s2 w3-teal" style="margin-bottom: 10px;font-size: 22px; height: 40px;">
			<span style="margin-left: 15px;">TÌM KIẾM NÂNG CAO</span>
		</div>
		<div class="w3-col s10" style="margin-bottom:20px; ">
			<form name="frtimkiemnc" id ="frtimkiemnc" method="get">
				<select style="width: 170px; float: left; margin-right: 4px; border-radius: 4px; margin-left: 5px;" name="tinh" id="tinh" class="w3-select">
					<option value="">Chọn tỉnh</option>
				</select>
				<select style="width: 170px; float: left; margin-right: 4px; border-radius: 4px;" name="huyen" id="huyen" class="w3-select">
					<option value="">Chọn huyện</option>
				</select>
				<select style="width: 170px; float: left; margin-right: 4px; border-radius: 4px;" name="xa" id="xa" class="w3-select">
					<option value="">Chọn xã</option>
				</select>
				<input type="text" style="width: 200px; float: left; margin-right: 4px; height: 40px;  border-radius: 4px;" name="tukhoa" id="tukhoa" placeholder="Nhập từ khóa tìm kiếm">
				<select style="width: 170px; float: left; margin-right: 4px; border-radius: 4px;" name="gia" id="gia" class="w3-select">
					<option value="">Chọn khoảng giá</option>
				</select>
				<button class="w3-btn w3-red" style="height: 40px; width: 150px; margin-left: 15px;border-radius: 4px;">
					Tìm kiếm
				</button>

			</form>
		</div>
	</div>
	<div class="w3-row">
		<div class="w3-col s12" style="  margin-left: 5px; text-align: center;border-radius: 5px;">
			<div class="w3-col s3">
				<panel style=" height: 30px; padding-bottom: 10px; font-size: 23px;font-family: 'roboto'; font-weight: 700; color: white" >DANH MỤC HÀNG HÓA</panel>
				<div style="margin-top: 7px;"><?php include("vendor/menu/index_danhmucsp.php"); ?></div>
			</div>
			<div class="w3-col s9" style="text-align: center; box-shadow: 5px 2px 15px; margin-top: 5px; width:999px; padding-top: 0%;padding-right: 5%;">
				<panel style=" height: 30px; margin-right:20px; font-size: 23px;font-family: 'roboto'; font-weight: 700; color: white;">GIAN HÀNG TRƯNG BÀY</panel>
				<div style=""><?php include("vendor/pd_item/index.html"); ?></div>
			</div>
			
		</div>
	</div>
	</div>
</body>
</html>

