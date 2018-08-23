<body style="position: fixed" bgcolor="#FFFFFF">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/boxsp.css" rel="stylesheet" type="text/css"/>
	<link href="css/demo-page.css" rel="stylesheet">
    <link href="css/imagehover.css" rel="stylesheet">
    <link href="css/style_sp.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
	<script type="text/javascript" src="js/boxsp.js"></script>
<?php 
	include("config/connect.php");
	session_start();
?>
<?php
    function adddotstring($strNum) {

        $len = strlen($strNum);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($strNum, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($strNum, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);   
        }
        return $result;
}
?>
<div style=" padding-bottom: 20%;">
	<div class="w3-row">
		<img src="logo_image/banner.png" style=" margin-left: 1%; width: 98%;">
	</div>
	<div class="w3-row" style=" margin-left: 1%; width: 98%;" >
		<?php include("views/banner_bar.php");?>
	</div>
	<div class="w3-row">
		<?php 
			if(!isset($_GET['view']) && !isset($_GET['xem']))
			{
				include("views/tinmoidang.php"); 
			}
		?>
	</div>
	<div class="w3-row" style=" margin-left: 1%; width: 98%;">
		<?php 
			if(!isset($_GET['view']) && !isset($_GET['xem']))
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
	<div class="w3-row w3-col s9" style=" border: 2px solid #009688;border-radius: 5px 0 0 0; margin-top: 10px; margin-bottom: 10%; padding-bottom: 3%;">
		<?php
				if(isset($_GET['xem'])){
					$xem = $_GET['xem'];
					if($xem == 'chiietsanpham') include('views/chitietsanpham.php');
					else
						if($xem == 'sanphamdathich') include('views/sanphamdathich.php');
							
		?>
	</div>
		<?php 
			} else
			include("views/index_sp.php");
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
<body>