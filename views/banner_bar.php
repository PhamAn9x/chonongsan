<?php
	include('config/connect.php');
	if(isset($_SESSION['sdt'])){
		$sdt = $_SESSION['sdt'];
	$slthich = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM THICH WHERE USR_SDT = $sdt"));
	} else $slthich = 0;
?>
<style type="text/css">
	#frtimkiem table tr td{
		font-size: 15px;
	}
</style>

<div style=" margin-top:0.5%; margin-bottom: 2px;">
<link rel="stylesheet" href="css/style_hover.css">
<div class="w3-col s2 "><a href="index.php"><img src="logo_image/logo.png"></a></div>
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
								style=" font-size: 16px; font-weight: 800; float:left; margin-top:20px; margin-right: 7px;"><img src="logo_image/ictim.png" width="30px" height="30px"><a href="index.php?xem=sanphamdathich&id=<?php echo $sdt; ?>" style=" text-decoration: none; color: black">Thích(<span style="color: red; font-size: 20px;"><?php echo $slthich; ?></span>)</a>
							</td>
							<?php 
								if(!isset($_SESSION['user'])){
							?>
								<td class="w3-border-left w3-border-right" style="font-weight: 600; padding-top: 3px; padding-left: 3px; font-size: 16px;">
									<img style="margin-left:7px;" src="logo_image/icondn.png" width="25px" height="25px"><span style="padding-left: 7px;"><a href="?view=dangnhap" style=" text-decoration: none; color: black;"> Đăng nhập </a></span>  
									<span style="font-size: 17px;">/</span>
									<span style="padding-right:7px;"><a href="?view=dangky" style=" text-decoration: none;color: black;">Đăng ký</a></span>  
								</td>
									<?php 
								}else{
									?>
								<td class="" style="font-weight: 600; padding-top: 3px; font-size: 16px; padding-left: 23px; padding-right: 23px; text-align: center;">
									<span style="padding-left: 0px;font-size: 15px;">Xin chào</span>  
									
									<span style=" font-size: 17px; color: red;"><?php echo $_SESSION['user']; ?></span>  
								</td>
								
							
							<td>
								
							<td class=" ">
									<style type="text/css">
										#ex4 .p1[data-count]:after{
											  position:absolute;
											  right:10%;
											  top:8%;
											  content: attr(data-count);
											  font-size:50%;
											  padding:0;
											  border-radius:50%;
											  line-height:1em;
											  color: white;
											  background:rgba(255,0,0,.85);
											  text-align:center;
											  min-width: 1em;
											  font-weight:bold;
											}

									</style>
								<?php
									$sdt = $_SESSION['sdt'];
									$sp = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) AS tssp FROM KHOPLENH WHERE KL_SDT_MUA = $sdt AND KL_TEN = 'mua'"));

								?>				
									<div id="ex4" style="display: none;">
									  <a href="?xem=giohang"><span class="p1 fa-stack fa-2x has-badge" data-count="<?php echo $sp[0]; ?>">
									    <!--<i class="p2 fa fa-circle fa-stack-2x"></i>-->
									    <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="4b"></i>
									  </span></a>
									</div>




								</td>
									
								<?php
							}
							?>
							<?php
								if(isset($_SESSION['htx'])){
							?>
							<td>
								<a href="?view=dangtin" class="w3-btn w3-round w3-red" style="margin-top: 4px; margin-left: 30%; width: 125px;";><span style="font-weight: 700">Đăng tin</span></a>
							</td>
							<?php
								}else{
							?>
								
							<?php
						}
							?>

						</tr>
					</table>
				</form>
			</div>
		</div>