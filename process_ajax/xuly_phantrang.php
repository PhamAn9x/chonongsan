<?php
function adddotstring($strNum) {

	$len = strlen($strNum);
	$counter = 3;
	$result = "";
	while ($len - $counter >= 0)
	{
		$con = substr($strNum, $len - $counter , 3);
		$result = ','.$con.$result;
		$counter+= 3;
	}
	$con = substr($strNum, 0 , 3 - ($counter - $len) );
	$result = $con.$result;
	if(substr($result,0,1)==','){
		$result=substr($result,1,$len+1);   
	}
	return $result;
}
?>
<?php 
	if(isset($_GET['trang'])){
		$id= $_GET['trang'];
		$_SESSION['click'] = 1;
    include("../config/connect.php");
    mysqli_set_charset($conn, 'UTF8');
    $start = ($_SESSION['click']*10);
    if($_SESSION['click'] <= $id){
    $sql = "SELECT *,(SELECT HA_TEN FROM HINHANH as ha WHERE ha.SP_ID = sp.SP_ID limit 1) as HA_TEN FROM SANPHAM as sp limit $start,5";
    $result = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
?>
           
                <div class="itemnew" style="width: 220px;height: 220px; margin-left: 1%;">
                    <!-- item image -->
                    <div class="item-img">
                        <img src="upload/<?php echo $rows['HA_TEN']; ?>" width="230px" height="230px" />
                    </div>

                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">
                                    <div class="item-top-title">
                                        <h2 style="width: 200px; font-size: 17px; font-weight: 900;text-shadow: currentColor;"><?php echo $rows['SP_TEN']; ?></h2>
                                       
                                    </div>
                                </div>
                                <div class="item-product" style="width: 200px;">
                                    <?php 
                                    $sp_id = $rows['SP_ID'];
                            $sql = "SELECT MIN(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'ban' ";
                            $dong = mysqli_fetch_row(mysqli_query($conn,$sql));
                            if( $dong[0] != null){
                                
                            ?>
                                     <span style="font-weight:600; color: blue;">Bán: </span><span class="price-num" style="color: red; font-size:12px; font-weight: 700"><?php echo adddotstring( $dong[0]); ?>
                                        
                                    </span>
                                     /
                                         <span style="color: black">
                                            <?php echo $rows['SP_DONVITINH']; ?>
                                        </span>
                                        <?php
                                            }else{
                                                ?>
                                                <span style="font-weight:600; color: blue;">Bán: </span><span class="price-num" style="color: red; font-size:11px; font-weight: 700"><?php echo "Đang cập nhật"; ?>
                                        
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
                                     <span style="font-weight:600; color: blue;">Mua: </span><span class="price-num" style="color: red; font-size:12px; font-weight: 700"><?php echo adddotstring( $dong[0]); ?>
                                        
                                    </span>
                                     /
                                         <span style="color: black">
                                            <?php echo $rows['SP_DONVITINH']; ?>
                                        </span>
                                        <?php
                                            }else{
                                                ?>
                                                <span style="font-weight:600; color: blue;">Bán: </span><span class="price-num" style="color: red; font-size:11px; font-weight: 700"><?php echo "Đang cập nhật"; ?>
                                        
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
                              <a href="views/xuly_thich.php?id=<?php echo $sp_id.'&usr='.$sdt; ?>" ><img style="position: absolute; top:40%; left: 80%;" title="Thích" src="logo_image/ictim2.png" width="30px" height="30px"></a>
                              <?php
                                } else{
                            ?>
                                 <a href="views/xuly_bothich.php?id=<?php echo $sp_id.'&usr='.$sdt; ?>" ><img style="position: absolute; top:40%; left: 80%;" src="logo_image/ictim.png" title="Bỏ thích" width="37px" height="37px"></a>
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
                                        <a href="index.php?xem=chitietsanpham&id=<?php echo $rows['SP_ID'];?>" class="btn buy expand">Chi tiết / Đặt hàng</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
               
<?php
    }
}
    $_SESSION['click']++;
}
?>