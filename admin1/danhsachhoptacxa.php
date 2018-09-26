<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="ajax/ajax_xoa_usr.js"></script>
<script type="text/javascript" src="ajax/ajax_capnhat_trangthai.js"></script>
<script type="text/javascript" src="ajax/ajax_timkiemnguoidung.js"></script>
<script type="text/javascript" src="ajax/ajax_chonquyen.js"></script>
<?php 
	include('../config/connect.php');
	include('ajax/xuli_capnhattrangthai.php');
?>
<div class="w3-row w3-center" style="margin-top: 5%;"> 
	<h1 style="font-weight: 700">DANH SÁCH HỢP TÁC XÃ</h1></div>
	<div style="font-size: 20px; color:black; margin-left: 33.5%;margin-bottom: 0%;">.............................*............................</div>
	<div class="w3-row" style="margin-top: 1%;">
		<input disabled class="w3-input" style="float: left; width: 170px; font-size: 15px;" value="Tìm kiếm hợp tác xã:" /> </span><input placeholder="Nhập tên hợp tác xã" class="w3-input" style=" margin-right: 1%; width: 200px; text-align: center; float: left; background-color:#012E4A;color: white;font-size: 15px;" name="sltimkiemusr" id="sltimkiemusr"/>
		<button class="w3-btn w3-red w3-round" name="btn_timkiem" id="btn_timkiem" style="font-size: 15px;">Tìm kiếm</button>
	</div>
<div class="w3-row  w3-round" id="kqtim">
	<table  border="1" class="w3-table w3-broder" style="border: 2px solid green;box-shadow: 3px 3px 3px 3px green; border-radius: 5px; margin-top: 2%; font-family: 'roboto';">
		<tr class="fm w3-center" style="font-weight: 700; background-color: green; border-bottom: 2px solid black; border-radius: 5px 5px 0 0">
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">STT</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">TÊN</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">SỐ ĐIỆN THOẠI</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">ĐỊA CHỈ</td>
			<td style=" vertical-align: middle; border-right: 1px solid black; width: 12.8%; text-align: center;">XÓA</td>
		</tr>
<?php
	 mysqli_set_charset($conn, 'UTF8');
	 $sql = "SELECT * FROM HOPTACXA ";
	 mysqli_set_charset($conn,'UTF8');
	 $result = mysqli_query($conn,$sql);
	 $STT = 1;
	 if(mysqli_num_rows($result) >0){
	 while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){

?>	
		<tr style="border-bottom: 1px solid black;" class="hover">
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $STT ?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['HTX_TEN'];?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['HTX_SDT']; ?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['HTX_DIACHI'];?></td>
			<td class="xoa" style="text-align: center; vertical-align: middle; border-right: 1px dotted black;">
				<a href="ajax/ajax_xoa_htx.php?id=<?php echo $rows['HTX_ID']; ?>"><img src="../logo_image/delete.png" width="20px" height="20px" onclick="return xoa();"></a>
			</td>

		</tr>
<?php
	$STT++;
	}
	}
	else {
?>
			<tr>
				<td colspan="9" class="w3-center"> Chưa có người dùng nào đăng ký! </td>
			</tr>
<?php 
	}
?>
	</table>
</div>















