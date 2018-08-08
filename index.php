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
		<div class="w3-col s3" style="padding-top: 1%; background: grey;">
			<?php include("vendor/menu4/index.html"); ?>

		</div>
		<div class="w3-col s7 w3-red w3-xxxlarge">gian hang</div>
		<div class="w3-col s2 w3-yellow w3-xxxlarge">tim kiem nc</div>
	</div>
</body>
</html>

