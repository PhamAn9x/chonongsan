<link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
<!--     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>-->
	<link href="vendor/pd_item/style.css" rel="stylesheet" />

	
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
	$sql = "SELECT *,(SELECT HA_TEN FROM HINHANH as ha WHERE ha.SP_ID = sp.SP_ID limit 1) as HA_TEN FROM sanpham as sp ORDER BY sp.SP_ID DESC LIMIT 5";
	$result = mysqli_query($conn,$sql);
	while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
 <div class="itemnew" style="width: 225px;height: 225px; margin-left: 1%;">
                    <!-- item image -->
                    <div class="item-img">
                        <img src="upload/<?php echo $rows['HA_TEN']; ?>" width="230px" height="230px" />
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
                                <?php
								if(isset($_SESSION['sdt'])){
									$sp_id = $rows['SP_ID'];
									$sdt = $_SESSION['sdt'];
									$dathich = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM THICH WHERE USR_SDT = $sdt AND SP_ID = $sp_id"));
															if($dathich < 1){
								?>
                              <a href="views/xuly_thich.php?id=<?php echo $sp_id.'&usr='.$sdt; ?>" ><img style="position: absolute; top:40%; left: 80%;" src="logo_image/ictim2.png" width="30px" height="30px"></a>
                              <?php
								} else{
							?>
                           		 <a href="views/xuly_bothich.php?id=<?php echo $sp_id.'&usr='.$sdt; ?>" ><img style="position: absolute; top:40%; left: 80%;" src="logo_image/ictim.png" width="37px" height="37px"></a>
                           <?php 
								}
								}
							?>
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


