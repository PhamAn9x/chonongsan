<body>
<?php
	include('config/connect.php');
	if(isset($_GET['id'])){
					$sp_id = $_GET['id'];
	}
?>

<link rel="stylesheet" href="css/chitietsanpham.css" />
<div>
    <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link href="vendor/pd_item/style.css" rel="stylesheet" />
  
   <div class="w3-row">
  		<div class="w3-col s12 w3-teal" style="font-size: 22px; padding: 1%;"> THÔNG TIN CHI TIẾT SẢN PHẨM</div>
   		<div class="w3-col s6">
   			<div class="row an-hinhanh" style="height: 350px;">
  				
  			
  				
  				
  	<div class="slider">
   
    
    
    	<?php
											mysqli_set_charset($conn,"UTF8");
											$sql_hinh = " SELECT HA_TEN FROM HINHANH WHERE SP_ID = $sp_id LIMIT 0,4";
											$rs = mysqli_query($conn,$sql_hinh);
											$i = 1;
											while( $dong = mysqli_fetch_array($rs,MYSQLI_ASSOC))
											{
											
										?>
	<input type="radio" name="slide_switch" id="<?php echo "id".$i; ?>" checked="checked"/>
    <label for="<?php echo "id".$i; ?>">
        <img style="bo" src="upload/<?php echo $dong['HA_TEN']; ?>" width="100" />
    </label>
    <img src="upload/<?php echo $dong['HA_TEN']; ?>"/>
    
 <?php 
											
											$i++;
											} ?>

    
</div>
  				<style>
					.slider{
    width:480px; /*Same as width of the large image*/
						height: 300px;
    position: relative;
    /*Instead of height we will use padding*/
    padding-top: 300px; /*That helps bring the labels down*/
	padding-left: 4%;
 
 
    /*Lets add a shadow*/
    box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.75);
}
 
/*Last thing remaining is to add transitions*/
.slider>img{
    position: absolute;
    left: 0; top: 0;
    transition: all 0.5s;
	width: 480px;
	height:300px;
	border-radius: 7px;
}
 
.slider input[name='slide_switch'] {
    display: none;
}
 
.slider label {
    /*Lets add some spacing for the thumbnails*/
    margin: 18px 0 0 10px;
    border: 3px solid #999;
 
    float: left;
    cursor: pointer;
    transition: all 0.5s;
 
    /*Default style = low opacity*/
    opacity: 0.5;
}
 
.slider label img{
	margin-bottom: 3%;
    display: block;
	width: 80px;
	height: 50px;
}
 
/*Time to add the click effects*/
.slider input[name='slide_switch']:checked+label {
    border-color: #666;
    opacity: 1;
}
/*Clicking any thumbnail now should change its opacity(style)*/
/*Time to work on the main images*/
.slider input[name='slide_switch'] ~ img {
    opacity: 0;
    transform: scale(1.1);
}
/*That hides all main images at a 110% size
On click the images will be displayed at normal size to complete the effect
*/
.slider input[name='slide_switch']:checked+label+img {
    opacity: 1;
    transform: scale(1);
}
				</style>
  				
  				
  				
  				
  				
  				
  				
   			</div>
   			<div style="position: absolute;bottom: 3%; left: 37%; font-size: 24px;font-style: italic;"> 
   			<?php
				$kq = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) AS KQ FROM HINHANH WHERE SP_ID =$sp_id")); 
			?>
				
   			</div>
   			
						<?php
				include("config/connect.php");
				mysqli_set_charset($conn,"UTF8");
				
					$sql = "SELECT * FROM SANPHAM AS SP, USER AS USR, HOPTACXA AS HTX WHERE USR.HTX_ID = HTX.HTX_ID AND SP.USR_SDT = USR.USR_SDT AND SP.SP_ID = $sp_id";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($result);
					$_SESSION['diachi'] = $row['SP_DIACHI'];
				
			?>

   			
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
   				<div class="w3-row" style="padding-top: 1px;">
   					<table border="0" class="w3-table an-table-sl"  style=" height:290px;">
   					<tr>
   						<td colspan="2">
   								<div style="margin-left: 5%; font-size: 30px;text-transform: uppercase; font-weight: bolder;  color:red; border-radius: 2px; height: 60px; padding: 2%; margin-right: 4%; font-family:Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana,' sans-serif';"><?php echo $row['SP_TEN'];?></div>
   						</td>
   					</tr>
					<tr style=" border-radius: 7px;">
					<td style="vertical-align: middle; text-align: center;"><span style=" font-size: 28px; font-weight: bolder; padding-top: 1%;">Giá :  </span><span style="color: red;font-size: 28px;font-weight: bolder;"><?php echo adddotstring($row['SP_GIA']); ?></span>/<?php echo $row['SP_DONVITINH']; ?> </td>
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
 <div class="w3-row s12">
 
 		<table border="1" style="width: 96%;" class="w3-table an-table">
					<tr>
						<th>Tình Trạng: </th><td style="font-weight: bolder; font-size: 20px;">
						<?php
							if($row['SP_SOLUONG']>0) {
						?>
							<span style="font-size: 22px; color:blue;" >Còn Hàng</span>
						<?php
							}else{
						?>
							<span style="font-size: 22px; color: red;">Hết Hàng</span>
						<?php
							}
						?>
						</td>
					</tr>
					<tr>
						<th>Khả năng cung cấp: </th><td style="color:red; font-size: 23px;"><?php echo adddotstring($row['SP_SOLUONG']).' '.$row['SP_DONVITINH']; ?></td>
					</tr>
					<tr>
						<th>Hợp tác xã: </th><td><?php echo $row['HTX_TEN']; ?></td>
					</tr>
					<tr>
						<th>Địa chỉ: </th><td><?php echo $row['SP_DIACHI']; ?></td>
					</tr>
					<tr>
						<th>Phí vận chuyển:</th><td><?php echo $row['SP_PHIVANCHUYEN']; ?></td>
					</tr>
					<tr>
						<th>Ngày đăng tin: </th><td><?php echo $row['SP_NGAYDANG']; ?></td>
					</tr>
					<tr>
						<th>Ngày hết hạn: </th><td><?php echo $row['SP_NGAYHETHAN']; ?></td>
					</tr>
					<tr>
					<th><span style="float: left;margin-top: 5px; ">Số lượng:</span> <input style="float: right; width: 90px; vertical-align: middle;border-radius: 4px; text-align: center;" class="w3-input" type="number" name="ipsoluong" id="ípoluong" value="0" /></th><td><input class="w3-btn w3-large w3-red w3-round w3-hover-teal" type="button" value="Đặt hàng"/></td>
					</tr>
					</table>
 </div>
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
                                    <a href="index.php?xem=chiietsanpham&id=<?php echo $rows['SP_ID'];?>" class="btn buy expand">Chi tiết / Đặt hàng</a>
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
</div>
	   </body>