<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div style="width: 97%; padding-left: 4%;">
	<?php
	include('config/connect.php');
	if(isset($_GET['id'])){
		$sp_id = $_GET['id'];
		$_SESSION['sp_bl'] = $sp_id;

	}
	?> 
	<?php
	mysqli_set_charset($conn,"UTF8");
	$sql = "SELECT * FROM SANPHAM AS SP, USER AS USR, HOPTACXA AS HTX WHERE USR.HTX_ID = HTX.HTX_ID AND SP.USR_SDT = USR.USR_SDT AND SP.SP_ID = $sp_id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$_SESSION['diachi'] = $row['SP_DIACHI'];
	$_SESSION['sdt_map'] = $row['USR_SDT'];

	?>

	<link rel="stylesheet" href="css/chitietsanpham.css" />
	<link rel="stylesheet" href="css/slider.css"/>
	<div>
		<link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link href="vendor/pd_item/style.css" rel="stylesheet" />

		<div class="w3-row" style="border: 3px solid #01a3a4; border-radius: 5px; box-shadow: -2px 2px 2px 2px #01a3a4">
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
					<style>
						.tt tr td{
							font-weight: 900;
						}
					</style>
					<table class="w3-table ">
						<tr>
							<th>Họ tên: </th> <td><?php echo $row['USR_HO'].' '.$row['USR_TEN']; ?></td>
						</tr>
						<tr>
							<th>Điện thoại: </th><td><?php echo $row['USR_SDT']; ?></td>
						</tr>
						<tr>
							<th>Ngày sinh: </th>
							<td>
								<?php $date=date_create($row['USR_NGAYSINH']);
								echo date_format($date,"d/m/Y"); ?>
									
								</td>
						</tr>
						<tr>
							<th>Email: </th> <td><?php echo $row['USR_EMAIL']; ?></td>
						</tr>
						<tr>
							<th>Địa chỉ</th><td><?php echo $row['SP_DIACHI']; ?></td>
						</tr>
						<tr>
							<th>Hợp tác xã</th><td><?php echo $row['HTX_TEN']; ?></td>
						</tr>
					</table>
				</div>

			</div>



			<div class="w3-col s6 " style="padding-top: 1px;">
				<div class="w3-row" style="padding-top: 1px; margin-bottom: -2%;">
					<table border="0" class="w3-table an-table-sl"  style=" height:400px; border:3px solid #01a3a4; width: 98%; margin-left: 1%; margin-top: 3%; box-shadow: -1px 1px 1px 1px #01a3a4">
						<tr>
							<td colspan="5">
								<div style="margin-left: 5%; font-size: 25px;text-transform: uppercase; font-weight: bolder;  color:red; border-radius: 2px; height: 60px; padding: 2%; margin-right: 2%; font-family:Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana,' sans-serif';"><?php echo $row['SP_TEN'];?>

								</div>
							</td>
						</tr>
						<tr style=" border-radius: 7px;">
							<?php
							$sql = "SELECT MAX(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'ban' ";
							$dong = mysqli_fetch_row(mysqli_query($conn,$sql));
							if( $dong[0] != null){

							?>
							<td style=" padding-top: -1%; vertical-align: middle; text-align: center;"><span style=" font-size: 25px; font-weight: bolder; padding-top: 1%;">Giá bán :  </span><span style="color: red;font-size: 28px;font-weight: bolder;"><?php echo adddotstring($dong[0]); ?></span>/<?php echo $row['SP_DONVITINH']; ?> </td>
							<?php
								}else{
									?>
									<td style="vertical-align: middle; text-align: center;"><span style=" font-size: 25px; font-weight: bolder; padding-top: 1%;">Giá Mua :  </span><span style="color: red;font-size: 23px;font-weight: bolder;"><?php echo "Đang cập nhật";?></span> </td>
							<?php

								}
							?>
							<?php
							$sql = "SELECT MIN(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'mua' ";
							$dong = mysqli_fetch_row(mysqli_query($conn,$sql));
							if( $dong[0] != null){

							?>
							<td style="vertical-align: middle; text-align: center; padding-top: -1%;"><span style=" font-size: 25px; font-weight: bolder; padding-top: 1%;">Giá Mua :  </span><span style="color: red;font-size: 28px;font-weight: bolder;"><?php echo adddotstring($dong[0]); ?></span>/<?php echo $row['SP_DONVITINH']; ?> </td>
							<?php
								}else{
									?>
									<td style="vertical-align: middle; text-align: center;"><span style=" font-size: 25px; font-weight: bolder; padding-top: 1%;">Giá Mua :  </span><span style="color: red;font-size: 23px;font-weight: bolder;"><?php echo "Đang cập nhật";?></span> </td>
							<?php

								}
							?>
							<td style="border-left: 1px dotted black; padding-top: 4%;padding-left: 0px;padding-right: 0px;" >
								<?php
								$strqr = 'Tên sản phẩm:'.$row['SP_TEN'].'-Thuộc hợp tác xã: '.$row['HTX_TEN'].'-Địa chỉ: '.$row['SP_DIACHI'].'-Tên chủ sản phẩm: '.$row['USR_HO'].' '.$row['USR_TEN'].'-Ngày đăng: '.$row['SP_NGAYDANG'].'-Số điện thoại liên lạc:'.$row['USR_SDT'];
								?>
								<input style="opacity: 0" id="qr" value="<?php echo $strqr; ?>"/>
								<img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
								class="qr-code img-thumbnail img-responsive" style="width: 200px; height: 200px; border-radius: 5px; box-shadow: -3px 2px 2px 5px #01a3a4;">
								<input style="opacity: 0" id="qr" value="<?php echo $strqr; ?>"/>
								<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
								<script  src="js/QR_code.js"></script>
							</td>
						</tr>
					</table>
				</div>

			</div>
			<div class="w3-col s6" >
				<?php include('views/maps.php'); ?>
			</div>
			<div class="w3-col s12"><hr /></div>
			<div class="w3-col s6">
						<div class="w3-row an-tieude">ĐANG CẦN MUA</div>
			<table class="w3-table-all w3-hoverable w3-border an-thongtin" style="margin-left: 0">
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
					<td><?php echo adddotstring($row_mua['L_SOLUONG']*$row_mua['L_GIA']); ?></td>
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
					<td><?php echo adddotstring($row_mua['L_SOLUONG']*$row_mua['L_GIA']); ?></td>
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
							<th>Địa chỉ hàng hóa</th>
							<th>Lời nhắn</th>

						</tr>
						<tr >
							<td>
								<select  id="sldatlenh" name="sldatlenh">
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
							<td class="thanhtien"> 0 VNĐ</td>
							<td style="width: 200px;">
								<input style="width: 280px;" type="text" name="ipdiachigiaohang" id="ipdiachigiaohang" value="<?php echo $row['SP_DIACHI'];?>">
							</td>
							<td>
								<input   type="text" name="iploinhan" id="iploinhan"/>
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
							if(dl == 0) $("#dat").html('<input class="w3-button w3-red w3-round" type="submit" name="btndatmua" id="btndatmua" value="ĐẶT LỆNH MUA">');
								else
									$("#dat").html('<input class="w3-button w3-red w3-round" type="submit" name="btndatban" id="btndatban" value="ĐẶT LỆNH BÁN"></a>');

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

						// $("#dathang").click(function(){
						// 	var sl = $("#ipsoluong").val();
						// 	var slht = <?php //echo $row['SP_SOLUONG'];?>;
						// 	if(slht >= sl){
						// 		document.getElementById("frsl").submit();
						// 	}
						// 	else
						// 	{
						// 		alert("Số lượng hiện tại không cung cấp đủ! vui lòng chọn ít sản phẩm hơn!");
						// 	}
						// });



					});
				</script>
				<div class="w3-col s16">
					<span style=" float: left; text-align: left; margin-left:18%;  text-transform: uppercase;" class="w3-row an-tieude">bình luận sản phẩm</span>
				
					<span style="float: left; margin-left: 20%; text-align: right;   text-transform: uppercase;" class="w3-row an-tieude">Sản phẩm cùng hợp tác xã</span>
					
				</div>
				<hr />
				<div class="w3-row w3-col s6">
					<?php
						include("views/ql_comment.php");
					?>
				</div>
					<div class="w3-row w3-col s6" style="padding-left: 4%; padding-top: 2%;">
						<?php
				include("views/sp_cung_htx.php");
				?>
				</div>
				<div class="w3-row w3-col s12">
				<div class="w3-col s12"><hr /></div>
				<div style=" text-align: center; font-size: 22px; padding:1%; width: 100%;" class="w3-col s6 w3-teal">SẢN PHẨM CÙNG LOẠI</div>

				<div class="w3-row w3-col s12" style="padding-left: 7%; padding-bottom: 3%;">
					<?php
					include("config/connect.php");
					mysqli_set_charset($conn, 'UTF8');
					$LSP =$row['LSP_ID'];
					$sql = "SELECT *,(SELECT HA_TEN FROM HINHANH as ha WHERE ha.SP_ID = sp.SP_ID limit 1) as HA_TEN FROM (SELECT * FROM SANPHAM WHERE LSP_ID = $LSP ) AS sp LIMIT 0,4";
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
										    <div class="item-product" style="width: 200px;">
                                    <?php 
                                    $sp_id = $rows['SP_ID'];
                            $sql = "SELECT MIN(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'ban' ";
                            $dong = mysqli_fetch_row(mysqli_query($conn,$sql));
                            if( $dong[0] != null){
                                
                            ?>
                                     <span style="font-weight:600; font-size: 13px; color: blue;">Mua: </span><span class="price-num" style="color: red; font-size:12px; font-weight: 700"><?php echo adddotstring( $dong[0]); ?>
                                        
                                    </span>
                                     /
                                         <span style="color: black">
                                            <?php echo $rows['SP_DONVITINH']; ?>
                                        </span>
                                        <?php
                                            }else{
                                                ?>
                                                <span style="font-weight:600; color: blue; font-size: 13px;">Bán: </span><span class="price-num" style="color: red; font-size:11px; font-weight: 700"><?php echo "Đang cập nhật"; ?>
                                        
                                    </span>
                                                <?php
                                            }
                                        ?>
                                         <br /> 
                                   <?php 
                                    $sp_id = $rows['SP_ID'];
                            $sql = "SELECT MAX(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'mua' ";
                            $dong = mysqli_fetch_row(mysqli_query($conn,$sql));
                            if( $dong[0] != null){
                                
                            ?>
                                     <span style="font-weight:600; color: blue;font-size: 13px;">Mua: </span><span class="price-num" style="color: red; font-size:12px; font-weight: 700"><?php echo adddotstring( $dong[0]); ?>
                                        
                                    </span>
                                     /
                                         <span style="color: black">
                                            <?php echo $rows['SP_DONVITINH']; ?>
                                        </span>
                                        <?php
                                            }else{
                                                ?>
                                                <span style="font-weight:600; color: blue;font-size: 13px;">Mua: </span><span class="price-num" style="color: red; font-size:11px; font-weight: 700"><?php echo "Đang cập nhật"; ?>
                                        
                                    </span>
                                                <?php
                                            }
                                        ?>
                                </div>
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
			<div style="text-align: center; margin-bottom: 5px;" class="w3-col s12"> <button id="btn-trolai" class="w3-button w3-red w3-round " style="width: 200px;">Trở lại</button></div>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
			<script type="text/javascript" src="js/slider.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#ipsoluong").keyup(function(){
						var ck = $("#sldatlenh").val();
						if(ck == "") {
							alert("Vui lòng chọn lệnh mua hoặc bán!");
						}
						var sl = $("#ipsoluong").val();
						var gia = $("#ipgia").val();
						var tong = sl * gia;
						var price =tong;
						$(".thanhtien").html(parseInt(tong).toLocaleString()+" VNĐ");
					});
					$("#ipgia").keyup(function(){
						var ck = $("#sldatlenh").val();
						if(ck == "") {
							alert("Vui lòng chọn lệnh mua hoặc bán!");
						}
						var sl = $("#ipsoluong").val();
						var sl = $("#ipsoluong").val();
						var gia = $("#ipgia").val();
						var tong = sl * gia;
						var price =tong;
						$(".thanhtien").html(parseInt(tong).toLocaleString()+" VNĐ");
					});
					$("#btn-trolai").click(function(){
							window.history.back();
					});
				});
			</script>
		</div>
	</div>
