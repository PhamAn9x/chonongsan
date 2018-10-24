<?php
					include("config/connect.php");
					mysqli_set_charset($conn, 'UTF8');
					$HTX =$row['SP_HTX_ID'];
					$sp_id = $row['SP_ID'];
					$sql = "SELECT *,(SELECT HA_TEN FROM HINHANH as ha WHERE ha.SP_ID = sp.SP_ID limit 1) as HA_TEN FROM (SELECT * FROM SANPHAM WHERE SP_HTX_ID = $HTX AND SP_ID <> $sp_id ) AS sp";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);
					if($count>0){
					while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						?>

						  <div class="itemnew" style="width: 150px;height: 150px; margin-left: 1%; ">
                    <!-- item image -->
                    <div class="item-img">
                        <img src="upload/<?php echo $rows['HA_TEN']; ?>" width="150px" height="150px" />
                    </div>

                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">
                                    <div class="item-top-title">
                                        <h2 style="width: 200px; font-size: 12px; font-weight: 900;text-shadow: currentColor;"><?php echo $rows['SP_TEN']; ?></h2>
                                       
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
                                <?php
                                if(isset($_SESSION['sdt'])){
                                    // $sp_id = $rows['SP_ID'];
                                    $sdt = $_SESSION['sdt'];
                                    $dathich = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM THICH WHERE USR_SDT = $sdt AND SP_ID = $sp_id"));
                                                            if($dathich < 1){
                                ?>
                           <!--    <a href="views/xuly_thich.php?id=<?php// echo $sp_id.'&ủ='.$sdt; ?>" ><img style="position: absolute; top:40%; lèt: 80%;" title="Thích" src="logo_image/ictim2.png" width="30px" height="30px"></a> -->
                              <?php
                                } else{
                            ?>
                                 <!-- <a href="views/xuly_bothich.php?id=<?php// echo $sp_id.'&ủ='.$sdt; ?>" ><img style="position: absolute; top:40%; lèt: 80%;" src="logo_image/ictim.png" title="Bỏ thích" width="37px" height="37px"></a> -->
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
                                        <a href="index.php?xem=chitietsanpham&id=<?php echo $rows['SP_ID'];?>" class="btn buy expand">Chi tiết</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
					<?php
				}
			} else
			{
				?>
					<div style="text-align: center;"><i style="text-align: center;"> Không có dữ liệu!</i></div>
				<?php
			}
		
				?>			
