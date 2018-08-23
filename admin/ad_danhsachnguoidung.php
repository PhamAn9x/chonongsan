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
	<h1 style="font-weight: 700">DANH SÁCH NGƯỜI DÙNG</h1></div>
	<div style="font-size: 20px; color:black; margin-left: 33.5%;margin-bottom: 0%;">.............................*............................</div>
	<div class="w3-row" style="margin-top: 1%;">
		<input disabled class="w3-input" style="float: left; width: 170px; font-size: 15px;" value="Tìm kiếm người dùng:" /> </span><input placeholder="SĐT hoặc Tên" class="w3-input" style=" margin-right: 1%; width: 200px; text-align: center; float: left; background-color:#012E4A;color: white;font-size: 15px;" name="sltimkiemusr" id="sltimkiemusr"/>
		<button class="w3-btn w3-red w3-round" name="btn_timkiem" id="btn_timkiem" style="font-size: 15px;">Tìm kiếm</button>
	</div>
<div class="w3-row  w3-round" id="kqtim">
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
			<td style=" vertical-align: middle; border-right: 1px solid black; width: 12.8%; text-align: center;">TRẠNG THÁI KÍCH HOẠT</td>
			<td style=" vertical-align: middle; border-right: 1px solid black; width: 12.8%; text-align: center;">QUYỀN HIỆN TẠI</td>
			<td style=" vertical-align: middle; border-right: 1px solid black; width: 12.8%; text-align: center;">CÁP QUYỀN</td>
			<td style=" vertical-align: middle; border-right: 1px solid black; width: 12.8%; text-align: center;">XÓA</td>
		</tr>
<?php
	 mysqli_set_charset($conn, 'UTF8');
	 $sql = "SELECT * FROM USER AS USR, HOPTACXA AS HTX, QUAN_HUYEN AS H, TINH_THANH AS T, PHUONG_XA AS X, QUYEN AS Q WHERE USR.Q_ID = Q.Q_ID AND USR.HTX_ID = HTX.HTX_ID AND USR.ID_TINH = T.ID_TINH AND USR.ID_HUYEN = H.ID_HUYEN AND USR.ID_XA = X.ID_XA ORDER BY USR_NGAYDANGKY DESC, USR_TRANGTHAI ASC";
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
			<td class="st" style="text-align: center; vertical-align: middle; border-right: 1px dotted black;">
				<?php
					if($rows['USR_TRANGTHAI'] == 1)
					{
				?>
				<a href="ajax/xuli_capnhattrangthai.php?id=<?php echo $rows['USR_SDT'];?>&st=1"><img class="trangthai_ac" src="../logo_image/tick_ok.png" width="30px" height="30%;" /></a>
				<?php
					}
					else{
				?>
				<a href="ajax/xuli_capnhattrangthai.php?id=<?php echo $rows['USR_SDT'];?>&st=0"><img class="trangthai_lc" src="../logo_image/tick_no.png" width="30px" height="30%;" /></a>
				<?php
					}
				?>
			</td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;">
				<?php echo $rows['Q_TEN'];?>
			</td>
			<td style="text-align: center; vertical-align: middle; border-right: 1px dotted black;">
<script>
function handleSelect(elm)
{
window.location = elm.value+".php";
}
</script>
			<select name="select-city" onchange="location = this.value;" style="width: 110%;">
				<option value="" >Chọn</option>
				<?php 
				mysqli_set_charset($conn,"UTF8");
				$sql = "SELECT * FROM QUYEN";
				$result1 = mysqli_query($conn,$sql);
				foreach($result1 as $dong)
				{						 
				?>	
						<option value="ajax/ajax_chonquyen.php?id=<?php echo $rows['USR_SDT'].'&q='.$dong['Q_ID'];?>">
								<?php echo $dong['Q_TEN'];?>
						</option>
						
				<?php
					}
				?>
			</select>
			
			</td>
			<td class="xoa" style="text-align: center; vertical-align: middle; border-right: 1px dotted black;">
				<a href="ajax/ajax_xoa_usr.php?id=<?php echo $rows['USR_SDT']; ?>"><img src="../logo_image/delete.png" width="20px" height="20px" onclick="return xoa();"></a>
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















