<?php 
   //error_reporting(0);
?>
<body bgcolor="#FFFFFF">
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
	<div class="w3-row" style=" margin-left: 1%; width: 98%;">
		<?php 
			
				include("views/menu1.php");
			
		?>
	</div>
	<div class="w3-row" style=" margin-left: 1%; width: 98%;" >
		<?php include("views/banner_bar.php");?>
	</div>
	<div class="w3-row">
		<?php
	if(isset($_SESSION['user'])){
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
		<li><a style="color: yellow;">CHỨC NĂNG CƠ BẢN NGƯỜI DÙNG</a></li>
		<li><a href="index.php?view=ql_khoplenh">Quản lí khớp lệnh</a></li>
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
	<hr />
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
	<div class="w3-col s12" style="width: 98%; margin-left: 1%;">
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
		<div class="w3-col s12" >
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
													if($view == "tt_taikhoan") include('views/thongtin_taikhoan.php');
														else
															if($view == "doimatkhau") include('views/doimatkhau.php');
					
			?>	
		</div>

		<?php 
		}
		?>
	<div class="w3-col s12" style="height: 30%; margin-top: 5%;">
		Footer
	</div>
<body>