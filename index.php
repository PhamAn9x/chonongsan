<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/boxsp.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
	<script type="text/javascript" src="js/boxsp.js"></script>
	<title></title>
</head>
<body style="width: 99%; margin-left: 0.5%;">
	<div class="w3-row">
		<div class="w3-col s12 w3-black w3-xxxlarge">
			<img src="logo_image/banner.png">
		</div>
	</div>
	<div class="w3-row" style="margin-top: 1%;">
		<div class="w3-col s2 "><img src="logo_image/logo.png"></div>
		<div class="w3-col s10 ">
			<form name="frtimkiem" id="frtimkiem" method="get">
				<table>
					<tr>
						<td>
							<div style="float: left;">
								<select class="w3-input w3-border" style="width: 250px;">
									<option>Chọn danh mục</option>
								</select>
							</div>
							<div style="float: left; padding-left: 10px;">
								<input class="w3-input w3-border" type="tetx" name="iptimkiem" id="iptimkiem" placeholder="Nhập từ khóa cần tìm">
							</div>	
							<div style="float: left; margin-left:5px; width: 150px;">
								<button class="w3-btn w3-round w3-green" name="btntimkiem" id="btntimkiem" style=" width: 125px;margin-left: 5px;" ><span style="font-weight: 700;">Tìm kiếm</span></button>
							</div>						
						</td>
							<td
								style=" font-size: 16px; font-weight: 800; float:left; margin-top:10px; margin-right: 7px;"><img src="logo_image/ictim.png" width="30px" height="30px"><a href="" style=" text-decoration: none;"> Thích(0)</a>
							</td>
							<td class="w3-border-left w3-border-right" style="font-weight: 600; padding-top: 3px; padding-left: 3px; font-size: 16px;">
								<img style="margin-left:7px;" src="logo_image/icondn.png" width="25px" height="25px"><span style="padding-left: 7px;"><a href="" style=" text-decoration: none;"> Đăng nhập </a></span>  
								<span style="font-size: 17px;">/</span>
								<span style="padding-right:7px;"><a href="" style=" text-decoration: none;">Đăng ký</a></span>  
							</td>
							<td>
								<a href="#"><button  class="w3-btn w3-round w3-red" style="margin-top: 4px; margin-left: 7px; width: 125px;";><span style="font-weight: 700">Đăng tin</span></button></a>
							</td>

						</tr>
					</table>
			</div>
		</div>
	</div>
	<div class="w3-row" >
		<div class="w3-col s12" style="margin-bottom: 3%;">
			<?php 
				include("views/sanphammoi.php");
			?>

		</div
	</div>
	<div class="w3-row">
		<div class="w3-col s2 w3-blue w3-xxxlarge">Danh muc sp</div>
		<div class="w3-col s8 w3-red w3-xxxlarge">gian hang</div>
		<div class="w3-col s2 w3-yellow w3-xxxlarge">tim kiem nc</div>
	</div>
</body>
</html>