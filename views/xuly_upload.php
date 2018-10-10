	<?php
	include("../config/connect.php");
	if(isset($_POST['upload'])){
		$sp_id = $_POST['sp'];
		$htx_id = $_POST['htx'];
		$check = 0;
		foreach ($_FILES['image']['name'] as $key => $value) {
			$file_name = $sp_id."_".$_FILES['image']['name'][$key];
			$tmp_file = $_FILES['image']['tmp_name'][$key];
			$link = "../upload/".$sp_id."_".$_FILES['image']['name'][$key];
			echo $link;
			$sql = "INSERT INTO HINHANH (HA_TEN, SP_ID, HTX_ID, HA_LOAI) VALUES('$file_name',$sp_id,$htx_id,1)";
			//echo $sql;
			if(mysqli_query($conn,$sql)){
			if(move_uploaded_file($tmp_file, $link)) $check = 0; else $check=1;
		}
	}
	if($check == 0){
		?>

			<script type="text/javascript"> 
				alert("Cập nhật hình ảnh thành công!");
				window.location.href="../index.php";
			</script>
			<?php
		} else{
			?>
				<script type="text/javascript"> 
				alert("Cập nhật hình ảnh thất bại!");
			</script>
			<?php
		}
	}

	

	
	?>