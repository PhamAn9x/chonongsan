<div class="w3-col khungsp">
<div class="w3-row w3-teal w3-round tieude">
				<h1 class="tdl">TIN VỪA MỚI ĐĂNG 
				</h1>
				<div class="tdr">
					<?php 
						if(isset($_SESSION['user'])){
					?>
				<marquee behavior="scroll" scrollamount="5" >Chào mừng <span style="color: red"><?php echo $_SESSION['user']; ?></span> đến website chợ nông sản hợp tác xã cua chúng tôi</marquee>
				<?php
					} else {
				?>
				<marquee behavior="scroll" scrollamount="5" >Chào mừng bạn đến website chợ nông sản hợp tác xã Long mỹ</marquee>
				<?php
					}
				?>
			</div>
			</div>
<?php
	include("config/connect.php");
	mysqli_set_charset($conn, 'UTF8');
	$sql = "SELECT * FROM SANPHAM AS SP,HINHANH AS HA WHERE SP.SP_ID = HA.SP_ID LIMIT 5";
	$result = mysqli_query($conn,$sql);
	while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
<div class="demo bsp">
          		<figure class="imghvr-fold-up">
          			<img src="server/php/files/<?php echo $rows['HA_TEN']; ?>" alt="example-image">
            		<figcaption>
            			<div style="font-size: 15px; font-family:'roboto'; margin-top: 1%;">
	             	 		<table width="100%">
	             	 			<tr>
	             	 				<td colspan="2" style=" position: absolute; top:5px; width: 100%; padding-left: 27px;font-weight: 700; font-size: 23px; color: red;"><?php echo $rows['SP_TEN']; ?></td>
	             	 			</tr>
	             	 			<tr>
	             	 				<td colspan="2">&nbsp</td>
	             	 			</tr>
	             	 			<tr>
	             	 				<td style="text-align: left; color: blue;"> Giá:</td>
	             	 				<td style="text-align: right;"><?php echo $rows['SP_GIA']; ?>/<?php echo $rows['SP_DONVITINH']; ?></td>
	             	 			</tr>
	             	 			<tr>
	             	 				<td style="text-align: left; color: blue;">Ngày đăng:</td>
	             	 				<td style="text-align: right;"><?php echo $rows['SP_NGAYDANG']; ?></td>
	             	 			</tr>
	             	 			<tr>
	             	 				<td style="text-align: left; color: blue;">Đơn vị:</td>
	             	 				<td style="text-align: right;">HTX Long Mỹ</td>
	             	 			</tr>
	             	 			<tr>
	             	 				<td colspan="2" style="height: 10px;">&nbsp</td>
	             	 			</tr>
	             	 			<tr>
	             	 				<td style="position: absolute; float: left; font-weight: 500">
	             	 					<button style="width: 90px;" class="w3-btn w3-blue w3-round">Đặt hàng</button>
	             	 					<button style="width: 90px;" class="w3-btn w3-green w3-round">Chi tiết</button>
	             	 				</td>
	             	 			</tr>
	             	 		</table>
             			</div>
            		</figcaption><a href="javascript:;"></a>
         		</figure>
          		<textarea readonly="readonly" style="font-weight: 700; font-size: 17px;"><?php echo $rows['SP_TEN']; ?></textarea>
          		<a href="#"><img src="logo_image/ictim.png" style="width: 40px; height: 40px; margin-bottom: 9px;"></a>
			</div>
<?php 
}
?>
</div>

