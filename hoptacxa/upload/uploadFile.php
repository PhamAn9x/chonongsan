<?php
session_start();
include("../../config/connect.php");
if(isset($_POST['submitImage']))
{
	$sp_id = $_POST['sp_id'];
	$htx_id = $_POST['htx_id'];
	for($i=0;$i<count($_FILES["uploadFile"]["name"]);$i++)
	{
		$uploadfile=$_FILES["uploadFile"]["tmp_name"][$i];
		$folder="../../upload/";
		$ten = $sp_id."_".$_FILES["uploadFile"]["name"][$i];
		mysqli_query($conn,"INSERT INTO HINHANH(HA_TEN,SP_ID,HTX_ID,HA_LOAI) VALUES('$ten',$sp_id,$htx_id,1)");
		move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], "$folder".$ten);
	}
?>
<script type="text/javascript">
				alert("Thêm hình ảnh thành công!");
			    window.location.href="../index1.php";
</script>
<?php
}
?>
