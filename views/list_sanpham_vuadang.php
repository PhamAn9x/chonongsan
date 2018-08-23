<style>
	.tieude{
		margin-top: 3%;
		border-radius: 5px;
	}
	.tieude_p{
		border: 2px solid #077425;
		border-radius: 5px;
		background: #70AEAF;
		padding-bottom: 3%;
	}
	.tieude p{
		font-family: 'roboto';
		font-size: 30px;
		text-align: center;
		font-weight: 600;
		color: red;
	}
	.tieude_s h3{
		font-family: 'roboto';
		font-size: 25px;
		font-weight: 500;
		color: black;
		margin-top: 2%;
		padding-left: 3%;
		color: white;
		margin-bottom: 3%;
	}
	.tieude_s input{
		font-size: 25px;
		color: black;
		width: 90%;
		margin-left: 4%;
		border-radius: 4px;
		padding-left: 5%;
		margin-top: 0.5%;
		margin-bottom: 0.5%;
	}
	.tieude_s span{
		font-size: 17px;
		background-color: white;
		margin-left:0%;
		border-radius: 2px;
		float: left;
		padding: 0.5%;
		margin-bottom: 0.5%;
		width: 320px;
		text-align: center;
		font-family: 'roboto';
	}
	.tieude_s p {
		width: 40%;
		font-size: 20px;
		float: left;
		color: black;
	}
</style>
<?php
	include('config/connect.php');
if($_GET['id']){
	$key = $_GET['id'];
	mysqli_set_charset($conn,"UTF8");
	$sql = "SELECT * FROM SANPHAM AS SP, NHOMSANPHAM AS NSP, LOAISANPHAM AS LSP, USER AS USR WHERE SP.USR_SDT = '$key' AND SP.LSP_ID = LSP.LSP_ID AND SP.NSP_ID = NSP.NSP_ID AND USR.USR_SDT = SP.USR_SDT ORDER BY SP_ID DESC LIMIT 1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$SP_ID = $row['SP_ID'];
	$LSP_ID = $row['LSP_ID'];
	$NSP_ID = $row['NSP_ID'];
	$HTX_ID = $row['HTX_ID'];
	$HA_LOAI = 1;
	echo "ol";
}
?>
<div class="w3-row tieude">
<p>CẬP NHẬT HÌNH ẢNH SẢN PHẨM</p>
	<div class="w3-row w3-col s12 tieude_P">
		
		<div class="w3-col s6 tieude_s">
		
			<h3>Thông tin sản phẩm</h3>
			<p>Tên Sản phẩm:</h6></p><span> <?php echo $row['SP_TEN'];?></span>
			<p>Nhóm sản phẩm:</h6></p><span> <?php echo $row['NSP_TEN'];?></span>
			<p>Loại sản phẩm:</h6></p><span> <?php echo $row['LSP_TEN'];?></span>
			<p>Số lượng: </h6></p><span> <?php echo $row['SP_SOLUONG'].' '.$row['SP_DONVITINH'];?></span>
			<p>Giá bán: </h6></p><span> <?php echo adddotstring($row['SP_GIA']);?>  VNĐ</span>
			<p>Ngày đăng :</h6></p><span> <?php echo $row['SP_NGAYDANG'];?></span>
			<p>Ngày hết hạn :</h6></p><span> <?php echo $row['SP_NGAYHETHAN'];?></span>
			<p>Người đăng :</h6></p><span> <?php echo $row['USR_HO'].' '.$row['USR_TEN'];?></span>
			<p>Địa chỉ :</h6></p><span> <?php echo $row['SP_DIACHI'];?></span>
			<p>Số điện thoại :</h6></p><span> <?php echo $key?></span>
		</div>
	<div class="w3=col s6 " style="margin-top: 5%;">
		<?php
$hinh_daup = array();
$check = 0;
$checkt=0;
	if(isset($_POST["Upload"])){
		foreach($_FILES['hinh']['name'] as $key=>$value){
			$hinh_ten = $SP_ID.$_FILES['hinh']['name'][$key];
			$kichco = $_FILES['hinh']['size'][$key];
			$tam_ten = $_FILES['hinh']['tmp_name'][$key];
			$folder = "upload/";
			$duoi = explode(".",$hinh_ten);
			$ext = end($duoi);
			$chophep = array('jpeg','png','gif','jpg');
			$duongdan = $folder.$hinh_ten;
			if(empty($tam_ten))
			{
				echo "<script>alert('Chọn ít nhất một ảnh');</script>";
				$checkt =1;
			}
			else
				if($kichco > 9000000) 
				{
					echo "<script>alert('Kích cở ảnh quá lớn!');</script>";
					$checkt=1;
				}
				else
					if(!in_array($ext,$chophep)) echo "<script>alert('Hình ảnh sai định dạng!');</script>";
						else
							if(move_uploaded_file($tam_ten,$duongdan))
							{
								$hinh_daup[] = $hinh_ten;
								$kq = mysqli_query($conn,"INSERT INTO HINHANH(HA_TEN,SP_ID,LSP_ID,NSP_ID,USR_SDT,HTX_ID,HA_LOAI) VALUES('$hinh_ten',$SP_ID,$LSP_ID,$NSP_ID,$key,$HTX_ID,$HA_LOAI)");
								if($kq) $check = 1;
							}	
		}
		if($check==1 && $checkt == 0) {
			echo "<script>alert('Upload thành công!');</script>";
			echo "<script>window.location.href='index.php';</script>";
		}
		if($check == 0 && $checkt == 0) echo "<script>alert('Upload thất bại!');</script>";
	}
?>

	<form method="post" enctype="multipart/form-data"  style="height: 50px;">
		<p style="float: left;"> <input type="file" name="hinh[]" multiple/></p>
		<p style="float: left;"><input type="submit" value="Upload" name="Upload"/></p>
	</form>
	<p>
<?php
	for ($i=0; $i< count($hinh_daup); $i++){?>
	
	<div style="width: 100px; float: left; margin: 2px; text-align: center;">
		<img src="<?php echo 'upload/'.$hinh_daup[$i]; ?>" style="width: 100px; height: 100px"/>
	</div>
		
<?php
	}
?>
</p>
	</div>
</div>
</div>
<div id="chuyen"></div>
