<?php 
session_start();
include('../config/connect.php');
if(isset($_POST['sldatlenh'])){
	$sl = $_POST['ipsoluong'];
	$gia = $_POST['ipgia'];
	$loai = $_POST['sldatlenh'];
	if($loai==0) $lenh = "mua";else if($loai==1) $lenh="ban";
	$spten= $_POST['ipspten'];
	$spid= $_POST['ipspid'];
	$thanhtien = $sl*$gia;
	$diachi = $_POST['ipdiachigiaohang'];
	$loinhan = $_POST['iploinhan'];
	$sdt =  $_SESSION['sdt'];
	if(!isset($_SESSION['sdt'])){
?>
 <meta http-equiv="Refresh" content="0,URL=../index.php?view=dangnhap" />
	<script type="text/javascript"> alert("Vui lòng đăng nhập trước khi giao dịch!");</script>
<?php
	}
	else
	if($sl*$gia == 0){
		?>
		<script type="text/javascript"> alert("Vui lòng kiểm tra lại thông tin!");</script>
		<?php
	}else
	{
		if($loai == 0){
			$sql = "SELECT * FROM LENH WHERE L_TEN = 'ban' AND SP_ID = $spid AND L_GIA <= $gia AND L_SDT <> '$sdt' ORDER BY L_GIA ASC";
			echo $sql;
			$result = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($result);
			if($count > 0){
				$mua_conlai = $sl;
				foreach ($result as $value) {
					$sdt_ban= $value['L_SDT'];
					$sl_ban = $value['L_SOLUONG'];
					$sp_id = $value['SP_ID'];
					$sp_gia = $value['L_GIA'];
					$sp_diachi = $value['L_DIACHIGIAO'];
					$sp_ghichu = $value['L_LOINHAN'];
					if($sl_ban >= $mua_conlai && $mua_conlai > 0)
					{
						echo "Còn đủ bán"."<br />";
						$sl_ban = $sl_ban - $mua_conlai;
						// mysqli_set_charset($conn,'UTF8');
						// mysqli_query($conn,"
						// 	INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('mua','$sdt_ban','$sdt',$spid,$mua_conlai,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
						// 	");
						mysqli_set_charset($conn,'UTF8');
						mysqli_query($conn,"
							INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('ban','$sdt_ban','$sdt',$spid,$mua_conlai,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
							");

						echo "1. Da mua".$mua_conlai." của".$sdt_ban."<br />";
						echo "1. So luong ban con lai ".$sl_ban."<br />";
						$mua_conlai = 0;
						mysqli_set_charset($conn,'UTF8');
						mysqli_query($conn,"UPDATE LENH SET L_SOLUONG = $sl_ban WHERE L_SDT = '$sdt_ban' AND SP_ID = $spid AND L_TEN = 'ban' AND L_GIA = $sp_gia");
						
						break;
					}
					else
					{
						echo "2. Một Người khong dủ cung cấp <br />";
						$mua_conlai = ($sl_ban - $mua_conlai)*(-1);
						echo "2. Da mua".$sl_ban." của".$sdt_ban."<br />";
						// mysqli_set_charset($conn,'UTF8');
						// mysqli_query($conn,"
						// 	INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('mua','$sdt','$sdt_ban',$spid,$sl_ban,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
						// 	");
					  	mysqli_set_charset($conn,'UTF8');
						mysqli_query($conn,"
							INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('ban','$sdt','$sdt_ban',$spid,$sl_ban,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
							");
						$sl_ban = 0;
						echo "2. So luong ban con lai ".$sl_ban."<br />";
						mysqli_set_charset($conn,'UTF8');
						mysqli_query($conn,"UPDATE LENH SET L_SOLUONG = $sl_ban WHERE L_SDT = '$sdt_ban' AND SP_ID = $spid AND L_TEN = 'ban' AND L_GIA = $sp_gia");

						echo "2. Số lượng cần mua còn lại ".$mua_conlai."<br />";

					}
					// mysqli_query($conn,"DELETE FROM LENH WHERE L_TEN = 'ban' AND L_SOLUONG <=0");
				}
				if($mua_conlai >0)
				{
					$sql="INSERT INTO LENH(L_TEN,SP_ID,L_SDT,SP_TEN,L_SOLUONG,L_GIA,L_TONGTIEN,L_DIACHIGIAO,L_LOINHAN) VALUES ('mua',$spid,'$sdt','$spten',$mua_conlai,$gia,$thanhtien,'$diachi','$loinhan')";
					echo $sql;
					mysqli_set_charset($conn,"UTF8");
					if(mysqli_query($conn,$sql))
						echo "thanh cong";
					else echo "k tv";

				}
			}
			else
			{
				$sql = "SELECT * FROM LENH WHERE L_TEN='mua' AND SP_ID = $spid AND L_GIA = $gia AND L_SDT = '$sdt'";
				echo $sql;
				$dong = mysqli_num_rows(mysqli_query($conn,$sql));
				$rs = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
				if($dong > 0)
					{
						$sl_update = $rs['L_SOLUONG'] + $sl;
						$sql = "UPDATE LENH SET L_SOLUONG = $sl_update WHERE L_TEN = 'mua' AND L_SDT = '$sdt' AND SP_ID = $spid AND L_GIA = $gia";
						mysqli_query($conn,$sql);
							echo "co dang lenh roi";
					}
				else
				{
					echo "Chưa khớp lệnh được";
					mysqli_set_charset($conn,'UTF8');
					mysqli_query($conn,"INSERT INTO LENH(L_TEN,SP_ID,L_SDT,SP_TEN,L_SOLUONG,L_GIA,L_TONGTIEN,L_DIACHIGIAO,L_LOINHAN) VALUES ('mua',$spid,'$sdt','$spten',$sl,$gia,$thanhtien,'$diachi','$loinhan')");
					echo $sql;
				}
			}
			mysqli_query($conn,"DELETE FROM LENH WHERE L_TEN = 'ban' AND L_SOLUONG <=0");
		}
		else{
			if($loai == 1){
				$sql = "SELECT * FROM LENH WHERE L_TEN = 'mua' AND SP_ID = $spid AND L_GIA >= $gia AND L_SDT <> '$sdt' ORDER BY L_GIA DESC";
				$result = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($result);
				if($count > 0){
				// echo ("cos ngwoif mua");
					$ban_conlai = $sl;
				// echo $ban_conlai;
					foreach ($result as $value) {
						$sdt_mua= $value['L_SDT'];
						$sl_mua = $value['L_SOLUONG'];
						$sp_id = $value['SP_ID'];
						$sp_gia = $value['L_GIA'];
						$sp_diachi = $value['L_DIACHIGIAO'];
						$sp_ghichu = $value['L_LOINHAN'];
						if($ban_conlai > 0 && $ban_conlai <= $sl_mua)
						{
						// echo $ban_conlai. " + ".$sl_mua;
							$check = $ban_conlai - $sl_mua;
						//echo $check."<br />";
							if($check <= 0){
								$mcl = $sl_mua - $ban_conlai;
								echo "Da ban ".$ban_conlai." cho ".$sdt_mua."<br />";
								// mysqli_set_charset($conn,'UTF8');
								// mysqli_query($conn,"
								// 	INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('ban','$sdt','$sdt_mua',$spid,$ban_conlai,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
								// 	");
								// mysqli_set_charset($conn,'UTF8');
								mysqli_query($conn,"
									INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('mua','$sdt','$sdt_mua',$spid,$ban_conlai,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
									");

								echo "So luong ".$sdt_mua." mua con lai la ".$mcl."<br/>";
								mysqli_set_charset($conn,'UTF8');
								mysqli_query($conn,"UPDATE LENH SET L_SOLUONG = $mcl WHERE L_SDT = '$sdt_mua' AND SP_ID = $spid AND L_TEN = 'mua' AND L_GIA = $sp_gia");
								$ban_conlai=0;
								break;
							}
							else
							{

							}
						// mysqli_query($conn,"
						// 	INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('mua','$sdt_ban','$sdt',$spid,$mua_conlai,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
						// 	");
					// 	echo "1. Da ban".$sl_mua." cho ".$sdt_mua."<br />";
					// 	echo "1. So luong ban con lai ".$ban_conlai."<br />";
					// 	$sl_mua = 0;

					// 	// mysqli_query($conn,"UPDATE LENH SET L_SOLUONG = $sl_ban WHERE L_SDT = '$sdt_ban' AND SP_ID = $spid AND L_TEN = 'ban'");

					// 	break;
						}else 
						{
							if($ban_conlai > 0)
							{
								$ban_conlai = $ban_conlai - $sl_mua;
								echo "Da ban ".$sl_mua." cho ".$sdt_mua."<br />";
								// mysqli_set_charset($conn,'UTF8');
								// mysqli_query($conn,"
								// 	INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('ban','$sdt','$sdt_mua',$spid,$sl_mua,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
								// 	");
						 		mysqli_set_charset($conn,'UTF8');
								mysqli_query($conn,"
									INSERT INTO KHOPLENH(KL_TEN,KL_SDT_BAN,KL_SDT_MUA,KL_SP_ID,KL_SOLUONG,KL_SP_TEN,KL_GIA,KL_DIACHI,KL_GHICHU) VALUES ('mua','$sdt','$sdt_mua',$spid,$sl_mua,'$spten',$sp_gia,'$sp_diachi','$sp_ghichu')
									");
								echo "So luong ".$sdt_mua." mua con lai 0 <br />";
								mysqli_set_charset($conn,'UTF8');
								mysqli_query($conn,"UPDATE LENH SET L_SOLUONG = 0 WHERE L_SDT = '$sdt_mua' AND SP_ID = $spid AND L_TEN = 'mua' AND L_GIA = $sp_gia");
							}
						}

						// mysqli_query($conn,"DELETE FROM LENH WHERE L_TEN = 'mua' AND L_SOLUONG < 1");
					}
					if($ban_conlai > 0){
						echo "Còn lại chưa khớp lệnh ".$ban_conlai;
						$sql="INSERT INTO LENH(L_TEN,SP_ID,L_SDT,SP_TEN,L_SOLUONG,L_GIA,L_TONGTIEN,L_DIACHIGIAO,L_LOINHAN) VALUES ('ban',$spid,'$sdt','$spten',$ban_conlai,$gia,$thanhtien,'$diachi','$loinhan')";
						echo $sql;
						mysqli_set_charset($conn,"UTF8");
						if(mysqli_query($conn,$sql))
							echo "thanh cong";
						else echo "k tv";
					}
				// if($mua_conlai >0)
				// {
				// 	// // $sql="INSERT INTO LENH(L_TEN,SP_ID,L_SDT,SP_TEN,L_SOLUONG,L_GIA,L_TONGTIEN,L_DIACHIGIAO,L_LOINHAN) VALUES ('mua',$spid,'$sdt','$spten',$mua_conlai,$gia,$thanhtien,'$diachi','$loinhan')";
				// 	// // echo $sql;
				// 	// mysqli_set_charset($conn,"UTF8");
				// 	// if(mysqli_query($conn,$sql))
				// 	// 	echo "thanh cong";
				// 	// else echo "k tv";

				// }
				 mysqli_query($conn,"DELETE FROM LENH WHERE L_TEN = 'mua' AND L_SOLUONG < 1");
				}
				else
				{
					$sql = "SELECT * FROM LENH WHERE L_TEN='ban' AND SP_ID = $spid AND L_GIA = $gia AND L_SDT = '$sdt'";
				echo $sql;
				$dong = mysqli_num_rows(mysqli_query($conn,$sql));
				$rs = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
				if($dong > 0)
					{
						$sl_update = $rs['L_SOLUONG'] + $sl;
						$sql = "UPDATE LENH SET L_SOLUONG = $sl_update WHERE L_TEN = 'ban' AND L_SDT = '$sdt' AND SP_ID = $spid AND L_GIA = $gia";
						mysqli_query($conn,$sql);
							echo "co dang lenh ban roi";
					}
				else
				{
					echo "Chưa khớp lệnh được";
					mysqli_set_charset($conn,'UTF8');
					mysqli_query($conn,"INSERT INTO LENH(L_TEN,SP_ID,L_SDT,SP_TEN,L_SOLUONG,L_GIA,L_TONGTIEN,L_DIACHIGIAO,L_LOINHAN) VALUES ('ban',$spid,'$sdt','$spten',$sl,$gia,$thanhtien,'$diachi','$loinhan')");
					echo $sql;
				}
				}
			}
		}
	}
}
?>