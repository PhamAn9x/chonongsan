<script type="text/javascript" src="ajax/ajax_tinhthanh.js"></script>
<?php
error_reporting(0);
	include("../config/connect.php");
if(isset($_POST['sdt'])){
	$key = $_POST['sdt'];
	if($key == "") {
		?>
		
		<script> alert('Vui lòng nhập số điện thoại!');</script>
		<div class="w3-row">
                    <input style="width: 47%; float: left; border-radius: 5px 0 0 0;" type="text" style="" class="w3-input" id="ho" name="ho" placeholder="Họ">
                    <input type="text" name="ten" id="ten" class="w3-input" style="width: 47%; float: left;border-radius: 0 5px 0 0;" placeholder="Tên">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="email" name="email" id="email" placeholder="E-mail" class="w3-input">
                </div>
                <!-- <div class="w3-row">
                    <input style="width: 97%;" type="text" name="facebook" id="facebook" placeholder="Facebook" class="w3-input">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="text" name="skyper" id="skyper" placeholder="Skyper" class="w3-input">
                </div> -->
                  <div class="w3-row">
                    <select style="width: 30%; float: left;" class="w3-select" name="sltinh" id="sltinh">
                        <option value=""><b>Chọn tỉnh</b></option>
                                    <?php
                          mysqli_set_charset($conn, 'UTF8');
                          $sql = "SELECT * FROM tinh_thanh";
                          $result = mysqli_query($conn,$sql);
                          while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                         ?>
                         <option value=<?php echo $rows['id_tinh']; ?>> <?php echo $rows['TINH_NAME']; ?></option>
                        <?php 
                      }
                        ?>
                    </select>
                    <select style="width: 30%; float: left;" class="w3-select" name="slhuyen" id="slhuyen">
                        <option value=""><b>Chọn huyện</b></option>
                    </select>
                    <select style="width: 31%; float: left;" class="w3-select" name="slxa" id="slxa">
                        <option value=""><b>Chọn xã</b></option>
                    </select>
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="text" name="diachi" id="diachi" placeholder="Địa chỉ chi tiết" class="w3-input">
                </div>
                <div class="w3-row">
                    <select style="width: 97%;" type="text" name="hoptacxa" id="hoptacxa" placeholder="Địa chỉ chi tiết" class="w3-input">
                    	<option value="">Chọn hợp tác xã</option>
                    	<?php
							mysqli_set_charset($conn,"UTF8");
							$sql="SELECT * FROM HOPTACXA";
							$result = mysqli_query($conn,$sql);
							foreach($result as $rows){	
						?>
						<option value="<?php echo $rows['HTX_ID']; ?>"><?php echo $rows['HTX_TEN']; ?></option>
						<?php
						}
						?>
					</select>
                </div>
	<?php
	}
	else {
	mysqli_set_charset($conn,"UTF8");
	$sql = "SELECT * FROM USER as USR, TINH_THANH as T, QUAN_HUYEN as H, PHUONG_XA as X, HOPTACXA as HTX WHERE USR_SDT = $key AND USR.ID_TINH = T.ID_TINH AND USR.ID_HUYEN = H.ID_HUYEN AND USR.ID_XA = X.ID_XA AND USR.HTX_ID = HTX.HTX_ID";
	$result = mysqli_query($conn,$sql);
	$sodong = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	if($sodong > 0){
?>
<div class="w3-row">
                    <input style="width: 47%; float: left;" type="text" style="" class="w3-input" id="ho" name="ho" placeholder="Họ"  value="<?php echo $row['USR_HO']; ?>">
                    <input type="text" name="ten" id="ten" class="w3-input" style="width: 47%; float: left;border-radius: 0 5px 0 0;" placeholder="Tên" value="<?php echo $row['USR_TEN']; ?>">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="email" name="email" id="email" placeholder="E-mail" class="w3-input"  value="<?php echo $row['USR_EMAIL']; ?>">
                </div>
                <!-- <div class="w3-row">
                    <input style="width: 97%;" type="text" name="facebook" id="facebook" placeholder="Facebook" class="w3-input">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="text" name="skyper" id="skyper" placeholder="Skyper" class="w3-input">
                </div> -->
                  <div class="w3-row">
                    <input type="text" style="width: 30%; float: left;" class="w3-select" name="sltinh" id="sltinh"  value="<?php echo $row['TINH_NAME']; ?>" />
                        
                    <input type="text" style="width: 30%; float: left;" class="w3-select" name="slhuyen" id="slhuyen"  value="<?php echo $row['HUYEN_NAME']; ?>"/>
                    <input type="text" style="width: 31%; float: left;" class="w3-select" name="slxa" id="slxa"  value="<?php echo $row['XA_NAME']; ?>"/>
                </div>
                <div class="w3-row">
                    <input type="text" style="width: 97%;" type="text" name="diachi" id="diachi" placeholder="Địa chỉ chi tiết" class="w3-input" value="<?php echo $row['USR_SONHA_AP'].','.$row['XA_NAME'].'-'.$row['HUYEN_NAME'].'-'.$row['TINH_NAME']; ?>">
                </div>
                <div class="w3-row">
                    <input style="display: none;" type="text" name="htx_id" id="htx_id" value="<?php echo $row['HTX_ID']; ?>">
                    <input type=text; style="width: 97%;" type="text" name="hoptacxa" id="hoptacxa" placeholder="Địa chỉ chi tiết" class="w3-input" value="<?php echo $row['HTX_TEN']; ?>">
                </div>
                <?php
}
	else{
		?>
				
				<div class="w3-row">
                    <input style="width: 47%; float: left; border-radius: 5px 0 0 0;" type="text" style="" class="w3-input" id="ho" name="ho" placeholder="Họ">
                    <input type="text" name="ten" id="ten" class="w3-input" style="width: 47%; float: left;border-radius: 0 5px 0 0;" placeholder="Tên">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="email" name="email" id="email" placeholder="E-mail" class="w3-input">
                </div>
                <!-- <div class="w3-row">
                    <input style="width: 97%;" type="text" name="facebook" id="facebook" placeholder="Facebook" class="w3-input">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="text" name="skyper" id="skyper" placeholder="Skyper" class="w3-input">
                </div> -->
                  <div class="w3-row">
                    <select style="width: 30%; float: left;" class="w3-select" name="sltinh" id="sltinh">
                        <option value=""><b>Chọn tỉnh</b></option>
                                    <?php
                          mysqli_set_charset($conn, 'UTF8');
                          $sql = "SELECT * FROM tinh_thanh";
                          $result = mysqli_query($conn,$sql);
                          while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                         ?>
                         <option value=<?php echo $rows['id_tinh']; ?>> <?php echo $rows['TINH_NAME']; ?></option>
                        <?php 
                      }
                        ?>
                    </select>
                    <select style="width: 30%; float: left;" class="w3-select" name="slhuyen" id="slhuyen">
                        <option value=""><b>Chọn huyện</b></option>
                    </select>
                    <select style="width: 31%; float: left;" class="w3-select" name="slxa" id="slxa">
                        <option value=""><b>Chọn xã</b></option>
                    </select>
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="text" name="diachi" id="diachi" placeholder="Địa chỉ chi tiết" class="w3-input">
                </div>
                <div class="w3-row">
                    <select style="width: 97%;" type="text" name="hoptacxa" id="hoptacxa" placeholder="Địa chỉ chi tiết" class="w3-input">
                    	<option value="">Chọn hợp tác xã</option>
                    	<?php
							mysqli_set_charset($conn,"UTF8");
							$sql="SELECT * FROM HOPTACXA";
							$result = mysqli_query($conn,$sql);
							foreach($result as $rows){	
						?>
						<option value="<?php echo $rows['HTX_ID']; ?>"><?php echo $rows['HTX_TEN']; ?></option>
						<?php
						}
						?>
					</select>
                </div>
				
				
		<?php
	}
	}
}
?>