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
<?php 
	include("config/connect.php");
	session_start();
?>
<body style="margin: 3px;">
	<div class="w3-row w3-blue">
		<img src="logo_image/banner.png" width="1360">
	</div>
	<div class="w3-row">
		<?php include("views/banner_bar.php");?>
	</div>
	<div class="w3-row">
		<?php 
			if(!isset($_GET['view']))
			{
				include("views/tinmoidang.php"); 
			}
		?>
	</div>
	<div class="w3-row">
		<?php 
			if(!isset($_GET['view']))
			{
				include("views/timkiemnangcao.php");
			}
		?>
	</div>
	<div class="w3-row w3-col s3">
		<?php 
			if(!isset($_GET['view']))
			{
			    include("vendor/menu/index_danhmucsp.php");
			}
		?>
	</div>
	<div class="w3-row w3-col s9" style="padding-left: 3.5%;">
		<?php
			if(isset($_GET['view'])){
				$view = $_GET['view'];
				if($view == "dangky") include("views/dangky.php");
				else
					if($view == "dangnhap") include("views/dangnhap.php");
					else
						if($view == "dangtin") include("views/dangtin.php");
						else 
							if($view == "dangxuat") include("views/dangxuat.php");
			}
			else include("vendor/pd_item/index_sp.php");
						 
		?>
	</div>
	
</body>
</html>

