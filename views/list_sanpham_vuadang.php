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
	$sdt = $_GET['id'];
	mysqli_set_charset($conn,"UTF8");
	$sql = "SELECT * FROM SANPHAM AS SP, NHOMSANPHAM AS NSP, LOAISANPHAM AS LSP, USER AS USR WHERE SP.USR_SDT = '$sdt' AND SP.LSP_ID = LSP.LSP_ID AND SP.NSP_ID = NSP.NSP_ID AND USR.USR_SDT = SP.USR_SDT ORDER BY SP_ID DESC LIMIT 1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$SP_ID = $row['SP_ID'];
	echo $SP_ID;
	$HTX_ID = $row['HTX_ID'];
	echo $HTX_ID;
	$HA_LOAI = 1;
}
?>
<div class="w3-row tieude">
<p>CẬP NHẬT HÌNH ẢNH SẢN PHẨM</p>
	<div class="w3-row w3-col s12 tieude_P">
		<form action="views/xuly_upload.php" method="post" enctype="multipart/form-data">
			<input id="image" type="file" multiple name="image[]">
			<input style="display: none;" type="text" name="sp" value="<?php echo $SP_ID; ?>">
			<input style="display: none;" type="text" name="htx" value="<?php echo $HTX_ID; ?>">
			<input type="submit" name="upload" value="Upload">
		</form>
		
	</div>
</div>
