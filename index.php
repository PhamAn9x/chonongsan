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
<body style="width: 99%; margin-left: 0.5%;">
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
		<div class="w3-col s12 w3-white khungsp">
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
		<div class="w3-col s12" style=" border: solid 2px #009688; margin-left: 5px; text-align: left;border-radius: 5px;">
			<div class="w3-col s3">
				<panel style=" height: 30px; margin: 10px; font-size: 23px;font-family: 'roboto'; font-weight: 700;" >DANH MỤC HÀNG HÓA</panel>
				<?php include("vendor/menu/index_danhmucsp.php"); ?>
			</div>
			<div class="w3-col s7" style="text-align: center;background-color:#009688; box-shadow: 5px 2px 15px; margin-top: 5px;">
				<panel style=" height: 30px; margin: 10px; font-size: 23px;font-family: 'roboto'; font-weight: 700;">GIAN HÀNG TRƯNG BÀY</panel>
			</div>
			<div class="w3-col s2">
				<panel style=" height: 30px; margin: 10px; font-size: 23px;font-family: 'roboto'; font-weight: 700;" >TÌM KIẾM NÂNG CAO</panel>
			</div>
		</div>
	</div>
</body>
</html>

