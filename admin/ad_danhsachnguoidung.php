<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="ajax/ajax_xoa_usr.js"></script>
<?php 
	include('../config/connect.php');
?>
<div class="w3-row w3-center" style="margin-top: 5%;"> 
	<h1 style="font-weight: 700">DANH SÁCH NGƯỜI DÙNG</h1></div>
	<div style="font-size: 20px; color:black; margin-left: 33.5%;margin-bottom: 4%;">.............................*............................</div>
<div class="w3-row  w3-round">
	<table  border="1" class="w3-table w3-broder" style="border: 2px solid green;box-shadow: 3px 3px 3px 3px green; border-radius: 5px; margin-top: 2%; font-family: 'roboto';">
		<tr class="fm w3-center" style="font-weight: 700; background-color: green; border-bottom: 2px solid black; border-radius: 5px 5px 0 0">
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">STT</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">SỐ ĐIỆN THOẠI</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">HỌ VÀ TÊN</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">GIỚI TÍNH</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">ĐỊA CHỈ</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center; vertical-align: middle;">E_MAIL</td>
			<td style="border-right: 1px solid black; width: 12.8%; text-align: center vertical-align: middle;">ĐƠN VỊ HỢP TÁC XÃ</td>
			<td style=" vertical-align: middle; border-right: 1px solid black; width: 12.8%; text-align: center;">NGÀY ĐĂNG KÝ</td>
			<td style=" vertical-align: middle; border-right: 1px solid black; width: 12.8%; text-align: center;">XÓA</td>
		</tr>
<?php
	 mysqli_set_charset($conn, 'UTF8');
	 $sql = "SELECT * FROM USER AS USR, HOPTACXA AS HTX, QUAN_HUYEN AS H, TINH_THANH AS T, PHUONG_XA AS X WHERE USR.HTX_ID = HTX.HTX_ID AND USR.ID_TINH = T.ID_TINH AND USR.ID_HUYEN = H.ID_HUYEN AND USR.ID_XA = X.ID_XA ";
	 $result = mysqli_query($conn,$sql);
	 $STT = 1;
	 if(mysqli_num_rows($result) >0){
	 while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){

?>	
		<tr style="border-bottom: 1px solid black;" class="hover">
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $STT ?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['USR_SDT'];?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['USR_HO'].' '.$rows['USR_TEN'];?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['USR_GIOITINH'];?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['XA_NAME'].'-'.$rows['HUYEN_NAME'].'-'.$rows['TINH_NAME'];?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['USR_EMAIL'];?></td>
			<td style="text-align: center;vertical-align: middle;  border-right: 1px dotted black;"><?php echo $rows['HTX_TEN'];?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;"><?php echo $rows['USR_NGAYDANGKY'];?></td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;">
				<a href="ajax/ajax_xoa_usr.php?id=<?php echo $rows['USR_SDT']; ?>"><img src="../logo_image/delete.png" width="30px" height="30px" onclick="return xoa();"></a>
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