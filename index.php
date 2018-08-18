
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/boxsp.css" rel="stylesheet" type="text/css"/>
	<link href="css/demo-page.css" rel="stylesheet">
    <link href="css/imagehover.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
	<script type="text/javascript" src="js/boxsp.js"></script>
<?php 
	include("config/connect.php");
	session_start();
?>
<div style="background-image: url('bg-main2.jpg'); padding-bottom: 20%;">
	<div class="w3-row">
		<img src="logo_image/banner.png" style=" margin-left: 1%; width: 98%;">
	</div>
	<div class="w3-row" style=" margin-left: 1%; width: 98%;" >
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
	<div class="w3-row" style=" margin-left: 1%; width: 98%;">
		<?php 
			if(!isset($_GET['view']))
			{
				include("views/timkiemnangcao.php");
			}
		?>
	</div>
	<div class="w3-row w3-col s3" >
		<?php 
			if(!isset($_GET['view']))
			{
			    include("vendor/menu/index_danhmucsp.php");
			}
		?>
	</div>
		<?php
			if(!isset($_GET['view'])){
		?>
	<div class="w3-row w3-col s9">
		<?php
				include("vendor/pd_item/index_sp.php");
		?>
	</div>
		<?php 
			}
			else {		 
		?>
		<div class="w3-row" style="padding-left: 3%; padding-right: 3%;">
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
					
			?>	
		</div>
		<?php 
				}	
		?>
	</div>
	<div class="w3-row" style="height: 30%; margin-top: 5%;">
		Footer
	</div>
</div>