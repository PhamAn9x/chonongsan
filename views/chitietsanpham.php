<body>
	<?php
	include('config/connect.php');
	if(isset($_GET['id'])){
		$sp_id = $_GET['id'];
	}
	?>
	<?php
	include("config/connect.php");
	mysqli_set_charset($conn,"UTF8");

	$sql = "SELECT * FROM SANPHAM AS SP, USER AS USR, HOPTACXA AS HTX WHERE USR.HTX_ID = HTX.HTX_ID AND SP.USR_SDT = USR.USR_SDT AND SP.SP_ID = $sp_id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$_SESSION['diachi'] = $row['SP_DIACHI'];

	?>

	<link rel="stylesheet" href="css/chitietsanpham.css" />
	<link rel="stylesheet" href="css/slider.css"/>
	<div>
		<link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link href="vendor/pd_item/style.css" rel="stylesheet" />

		<div class="w3-row">
			<div class="w3-col s12 w3-teal" style="font-size: 22px; padding: 1%; text-align: center;"> THÔNG TIN CHI TIẾT SẢN PHẨM</div>
			<div class="w3-col s6">
				<div class="row an-hinhanh" style="height: 350px;">

					<div class="w3-col s6">
						<section id="slider" class="container">
							<ul class="slider-wrapper">
								<?php 
								$sql = "SELECT HA_TEN FROM HINHANH WHERE SP_ID = $sp_id";
								$result = mysqli_query($conn,$sql);
								while($dong = mysqli_fetch_array($result)){
									?>


									<li class="current-slide">
										<img src="upload/<?php echo $dong['HA_TEN']; ?>" title="" alt="">
										<div class="caption">
											<?php
											echo $row['SP_MOTANGAN'];
											?>
										</div>
									</li>



									<?php 
								}
								?>
							</ul>
							<!-- Sombras -->
							<div class="slider-shadow"></div>

							<!-- Controles de Navegacion -->
							<ul id="control-buttons" class="control-buttons"></ul>
						</section>
					</div>



				</div>




				<div style=" font-size: 22px; padding:2%; width: 99%;px; margin-top: 2%;" class="w3-col s6 w3-teal">MÔ TẢ SẢN PHẨM</div>
				<div class="w3-row box" id="box" style="text-align: justify; font-size: 17px; font-weight: 100; padding-right: 4%; padding-left: 2%;">

					<link rel="stylesheet" href="css/style_readmore.css">



					<div class="wrap">
						<div class="read-more">
							<div class="content">
								<?php echo $row['SP_MOTA']; ?>
							</div>
							<span class="trigger" onclick="this.parentElement.classList.add('expanded')">Xem Thêm</span>
							<span class="collapse" onclick="this.parentElement.classList.remove('expanded')">Thu Gọn</span>
						</div>
					</div>


				</div>
				<div style=" font-size: 22px; padding:2%; width: 99%;px;" class="w3-col s6 w3-teal">THÔNG TIN NGƯỜI BÁN</div>
				<div class="w3-row an-thongtinchusanpham">
					<table class="w3-table ">
						<tr>
							<td>Liên hệ: </td> <td><?php echo $row['USR_HO'].' '.$row['USR_TEN']; ?></td>
						</tr>
						<tr>
							<td>Điện thoại: </td><td><?php echo $row['USR_SDT']; ?></td>
						</tr>
						<tr>
							<td>Email: </td> <td><?php echo $row['USR_EMAIL']; ?></td>
						</tr>
						<tr>
							<td>Địa chỉ</td><td><?php echo $row['SP_DIACHI']; ?></td>
						</tr>
					</table>
				</div>

			</div>



			<div class="w3-col s6 " style="padding-top: 1px;">
				<div class="w3-row" style="padding-top: 1px; margin-bottom: 8%;">
					<table border="0" class="w3-table an-table-sl"  style=" height:400px;">
						<tr>
							<td colspan="5">
								<div style="margin-left: 5%; font-size: 30px;text-transform: uppercase; font-weight: bolder;  color:red; border-radius: 2px; height: 60px; padding: 2%; margin-right: 4%; font-family:Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana,' sans-serif';"><?php echo $row['SP_TEN'];?>
									
								</div>
							</td>
						</tr>
						<tr style=" border-radius: 7px;">
							<?php 
							$sql = "SELECT MAX(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'ban' ";
							$dong = mysqli_fetch_row(mysqli_query($conn,$sql));
							if( $dong[0] != null){
								
							?>
							<td style="vertical-align: middle; text-align: center;"><span style=" font-size: 28px; font-weight: bolder; padding-top: 1%;">Giá bán :  </span><span style="color: red;font-size: 28px;font-weight: bolder;"><?php echo adddotstring($dong[0]); ?></span>/<?php echo $row['SP_DONVITINH']; ?> </td>
							<?php
								}else{
									?>
									<td style="vertical-align: middle; text-align: center;"><span style=" font-size: 28px; font-weight: bolder; padding-top: 1%;">Giá Mua :  </span><span style="color: red;font-size: 23px;font-weight: bolder;"><?php echo "Đang cập nhật";?></span> </td>
							<?php
									
								}
							?>
							<?php 
							$sql = "SELECT MIN(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'mua' ";
							$dong = mysqli_fetch_row(mysqli_query($conn,$sql));
							if( $dong[0] != null){
								
							?>
							<td style="vertical-align: middle; text-align: center;"><span style=" font-size: 28px; font-weight: bolder; padding-top: 1%;">Giá Mua :  </span><span style="color: red;font-size: 28px;font-weight: bolder;"><?php echo adddotstring($dong[0]); ?></span>/<?php echo $row['SP_DONVITINH']; ?> </td>
							<?php
								}else{
									?>
									<td style="vertical-align: middle; text-align: center;"><span style=" font-size: 28px; font-weight: bolder; padding-top: 1%;">Giá Mua :  </span><span style="color: red;font-size: 23px;font-weight: bolder;"><?php echo "Đang cập nhật";?></span> </td>
							<?php
									
								}
							?>
							<td style="border-left: 1px dotted black; padding-bottom: 1%;" >
								<?php 
								$strqr = 'Tên sản phẩm:'.$row['SP_TEN'].'-Thuộc hợp tác xã: '.$row['HTX_TEN'].'-Địa chỉ: '.$row['SP_DIACHI'].'-Tên chủ sản phẩm: '.$row['USR_HO'].' '.$row['USR_TEN'].'-Ngày đăng: '.$row['SP_NGAYDANG'].'-Số điện thoại liên lạc:'.$row['USR_SDT'];
								?>
								<input style="opacity: 0" id="qr" value="<?php echo $strqr; ?>"/>
								<img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
								class="qr-code img-thumbnail img-responsive" style="width: 160px; height: 160px;">
								<input style="opacity: 0" id="qr" value="<?php echo $strqr; ?>"/>
								<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
								<script  src="js/QR_code.js"></script>
							</td>
						</tr>
					</table>
				</div>	

			</div>
			<div class="w3-col s6">
				<?php include('views/maps.php'); ?>
			</div>
			<div class="w3-col s12"><hr /></div>
			<div class="w3-col s6">
						<div class="w3-row an-tieude">ĐANG CẦN MUA</div>
			<table class="w3-table-all w3-hoverable w3-border an-thongtin">
				<tr>
					<th>STT</th>
					<th>Họ tên</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Số lượng</th>
					<th>Giá cần mua</th>
					<th>Tổng thanh toán đơn hàng</th>
					<th>Lời nhắn</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM LENH,USER WHERE USR_SDT = L_SDT AND SP_ID=$sp_id AND L_TEN='mua'";
					mysqli_set_charset($conn,"UTF8");
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) > 0){
					while($row_mua = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				?>
				<tr>
					<td>1</td>
					<td><?php echo $row_mua['USR_HO'].' '.$row_mua['USR_TEN']; ?></td>
					<td>Xà phiên- Long Mỹ - Hậu Giang</td>
					<td><?php echo $row_mua['L_SDT']; ?></td>
					<td><?php echo $row_mua['L_SOLUONG']; ?></td>
					<td><?php echo adddotstring($row_mua['L_GIA']); ?></td>
					<td><?php echo adddotstring($row_mua['L_TONGTIEN']); ?></td>
					<td><?php echo $row_mua['L_LOINHAN']; ?></td>
				</tr>
				<?php
					}
				} else{
				?>
					<tr>
						<td style="text-align: center;" colspan="8"><i>Chưa có dữ liệu!</i></td>
					</tr>
				<?php
				}
				?>
			</table>	
				
				</div>
			<div class="w3-col s6">
					<div class="w3-row an-tieude">ĐANG CẦN BÁN</div>
			<table class="w3-table-all w3-hoverable w3-border an-thongtin">
				<tr>
					<th>STT</th>
					<th>Họ tên</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Số lượng</th>
					<th>Giá cần mua</th>
					<th>Tổng thanh toán đơn hàng</th>
					<th>Lời nhắn</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM LENH,USER WHERE USR_SDT = L_SDT AND SP_ID=$sp_id AND L_TEN='ban'";
					mysqli_set_charset($conn,"UTF8");
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) > 0){
					while($row_mua = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				?>
				<tr>
					<td>1</td>
					<td><?php echo $row_mua['USR_HO'].' '.$row_mua['USR_TEN']; ?></td>
					<td>Xà phiên- Long Mỹ - Hậu Giang</td>
					<td><?php echo $row_mua['L_SDT']; ?></td>
					<td><?php echo $row_mua['L_SOLUONG']; ?></td>
					<td><?php echo adddotstring($row_mua['L_GIA']); ?></td>
					<td><?php echo adddotstring($row_mua['L_TONGTIEN']); ?></td>
					<td><?php echo $row_mua['L_LOINHAN']; ?></td>
				</tr>
				<?php
					}
				}else {
					?>
					<tr>
						<td style="text-align: center;" colspan="8"><i>Chưa có dữ liệu</i></td>
					</tr>
					<?php
				}
				?>
			</table>
				</div>
				<div class="w3-col s12"><hr /></div>
				<div class="w3-col s12">
					<div class="w3-row an-tieude">ĐẶT LỆNH MUA - BÁN</div>
				<div class="w3-row w3-col s12">
					<form id="fr_datlenh" method="post" action="views/xuly_datlenh.php">
					<table class="w3-table-all an-datlenh">
						<tr>
							<th>Đặt lệnh</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
							<th>Địa chỉ giao hàng</th>
							<th>Lời nhắn</th>

						</tr>
						<tr>
							<td>
								<select id="sldatlenh" name="sldatlenh">
									<option value="">Chọn lệnh</option>
									<option value="0">Đặt mua</option>
									<option value="1">Đặt bán</option>
								</select>
							</td>
							<td><?php echo $row['SP_TEN']; ?></td>
							<input style="display: none;" type="text" name="ipspten" id="ipspten" value="<?php echo $row['SP_TEN']; ?>">
							<input style="display: none;" type="text" name="ipspid" id="ipspid" value="<?php echo $row['SP_ID']; ?>">
							<td>
								<input style="width: 100px;" type="number" name="ipsoluong" id="ipsoluong" value="1">
							</td>
							<td>
								<input  style="width: 100px;" type="number" name="ipgia" id="ipgia" value="0">
							</td>
							<td>0 VNĐ</td>
							<td>
								<input type="text" name="ipdiachigiaohang" id="ipdiachigiaohang" value="<?php echo $row['SP_DIACHI'];?>">
							</td>
							<td>
								<input type="text" name="iploinhan" id="iploinhan"/>
							</td>
						</tr>
						<tr>
							<td colspan="7" id="dat">
								
							</td>
						</tr>
					</table>
				</div>
				</form>
				<div id="alert"></div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#sldatlenh").change(function(){
						var dl = $("#sldatlenh").val();
							if(dl == 0) $("#dat").html('<input class="w3-button w3-red" type="submit" name="btndatmua" id="btndatmua" value="ĐẶT LỆNH MUA">');
								else 
									$("#dat").html('<input class="w3-button w3-red" type="submit" name="btndatban" id="btndatban" value="ĐẶT LỆNH BÁN"></a>');

						});


						$("#ipsoluong").change(function(){
							var sl = $("#ipsoluong").val();
							var idsp = $("#idsp").val();
							if(sl<1)
							{
								$("#ipsoluong").val("0");
								alert("Vui lòng nhập giá trị lớn hơn 0 !");
							}
							else
							{
								$.post("process_ajax/data_xuly_soluong.php", {sl: sl, idsp: idsp}, function(data){
									$("#alert").html(data);
								});
							}
						});

						$("#dathang").click(function(){
							var sl = $("#ipsoluong").val();
							var slht = <?php echo $row['SP_SOLUONG'];?>;
							if(slht >= sl){
								document.getElementById("frsl").submit(); 
							}
							else
							{
								alert("Số lượng hiện tại không cung cấp đủ! vui lòng chọn ít sản phẩm hơn!");
							}
						});



					});
				</script>
				<div class="w3-col s12"><hr /></div>
				<div style=" font-size: 22px; padding:1%; width: 100%;px;" class="w3-col s6 w3-teal">SẢN PHẨM CÙNG LOẠI</div>

				<div class="w3-row w3-col s12" style="padding-left: 7%; padding-bottom: 3%;">
					<?php 
					include("config/connect.php");
					mysqli_set_charset($conn, 'UTF8');
					$LSP =$row['LSP_ID'];
					$sql = "SELECT *,(SELECT HA_TEN FROM HINHANH as ha WHERE ha.SP_ID = sp.SP_ID limit 1) as HA_TEN FROM (SELECT * FROM sanpham WHERE LSP_ID = $LSP ) AS sp LIMIT 0,4";
					$result = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						?>

						<div class="item">
							<!-- item image -->
							<div class="item-img">
								<img src="upload/<?php echo $rows['HA_TEN']; ?>" width="260" height="260" />
							</div>

							<div class="item-content">
								<div class="item-top-content">
									<div class="item-top-content-inner">
										<div class="item-product">
											<div class="item-top-title">
												<h2 style="width: 180px; font-size: 15px; font-weight: 900;text-shadow: currentColor;"><?php echo $rows['SP_TEN']; ?></h2>

											</div>
										</div>
										<div class="item-product">
											<span class="price-num" style="color: red; font-size:19px; font-weight: 700"><?php echo adddotstring($rows['SP_GIA']); ?>

										</span>
										/
										<span style="color: black">
											<?php echo $rows['SP_DONVITINH']; ?>
										</span>   
									</div>
									<img style="position: absolute; top:50%; left: 75%;" src="logo_image/ictim2.png" width="30px" height="30px">
								</div>  
							</div>
							<div class="item-add-content">
								<div class="item-add-content-inner">
									<div class="section">
										<p>Ngày đăng: <?php echo $rows['SP_NGAYDANG']; ?></p>
										<p>Đơn vị: HTX Huyện Long Mỹ</p>
									</div> 
									<div class="section">
										<a href="index.php?xem=chitietsanpham&id=<?php echo $rows['SP_ID'];?>" class="btn buy expand">Chi tiết / Đặt hàng</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php
				}
				?>
			</div>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
			<script type="text/javascript" src="js/slider.js"></script>
		</div>
	</body>