
<?php
include("../config/connect.php");
$hinh_daup = array();
$check = 0;
$checkt=0;
	if(isset($_POST["Upload"])){
		foreach($_FILES['hinh']['name'] as $key=>$value){
			$hinh_ten = $_FILES['hinh']['name'][$key];
			$kichco = $_FILES['hinh']['size'][$key];
			$tam_ten = $_FILES['hinh']['tmp_name'][$key];
			$folder = "../test/";
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
								$check = 1;
							}
		}
		if($check==1 && $checkt == 0) echo "<script>alert('Upload thành công!');</script>";
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
		<img src="<?php echo '../test/'.$hinh_daup[$i]; ?>" style="width: 100px; height: 100px"/>
	</div>

<?php
	}
?>
</p>
