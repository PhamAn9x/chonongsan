<?php
session_start();
include("../../config/connect.php");
$sdt = $_SESSION['sdt'];
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "../../upload/".$_FILES['userImage']['name'];
$ten = $_FILES['userImage']['name'];
$sql_ck ="SELECT HA_TEN FROM HINHANH WHERE USR_SDT = '$sdt'";
$row = mysqli_fetch_row(mysqli_query($conn,$sql_ck));
$count = mysqli_num_rows(mysqli_query($conn,$sql_ck));
if($count < 1){
$sql = "INSERT INTO HINHANH(HA_TEN,USR_SDT,HA_LOAI) VALUES ('$ten','$sdt',2)";
if(mysqli_query($conn,$sql)){
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img src="upload/<?php echo $_FILES['userImage']['name']; ?>" width="200px" height="200px" class="upload-preview" />
<script type="text/javascript">alert("Cập nhật thành công!");</script>
<?php
}
}
}else{
					$name = $row[0];
					$path = "../../upload/".$name;
					if(unlink($path)){
							$sql_updat ="UPDATE HINHANH SET HA_TEN='$ten' WHERE USR_SDT = '$sdt'";
							if(mysqli_query($conn,$sql_updat)){
								if(move_uploaded_file($sourcePath,$targetPath)) {
							?>
							<img src="upload/<?php echo $_FILES['userImage']['name']; ?>" width="200px" height="200px" class="upload-preview"  />
							<script type="text/javascript">alert("Cập nhật thành công!");</script>
							<?php
							}
						}
					}
	}
}
}
?>