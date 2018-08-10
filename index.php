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
<body style="width: 99%; margin-left: 0.5%; ">
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
		
				<?php 
					if(!isset($_GET['view'])){
						include("views/tinmoidang.php"); 
					}
					?>
	</div>
	<div class="w3-row">
		<?php 
					if(!isset($_GET['view'])){
						include("views/timkiemnangcao.php");
					}
		?>
	</div>
	<div class="w3-row">
		<?php 
					if(!isset($_GET['view'])){
						include("vendor/menu/index_danhmucsp.php");
					}
		?>
		
	</div>
			<div class="w3-col s9" style="text-align: center; margin-top: 5px; width:999px; padding-top: 0%;padding-right: 10px; padding-left: 50px;">
				<div style="">
					<?php
						if(isset($_GET['view'])){
							$view = $_GET['view'];
							if($view == "dangky") include("views/dangky.php");
							else
								if($view == "dangnhap") include("views/dangnhap.php");
						}
						//else include("vendor/pd_item/index_sp.php");
						else include("views/dangtin.php");
					?>
				</div>
			</div>
			
		</div>
	</div>
	<div class="w3-row">
		<div class="w3-col s12" style="margin: 10px;">
			<img src="logo_image/bannerft.png" style="height: 100px; width: 100%; margin-top: 40%;">
		</div>
	</div>
	</div>
</body>
</html>

