<?php
include("../../config/connect.php");
	if(isset($_POST['get_huyen'])){
		$id_tinh = $_POST['get_huyen'];
          mysqli_set_charset($conn, 'UTF8');
          $sql = "SELECT * FROM quan_huyen WHERE ID_TINH = $id_tinh";
          $result = mysqli_query($conn,$sql);
          while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           ?>
           <option value=<?php echo $rows['ID_HUYEN']; ?>> <?php echo $rows['HUYEN_NAME']; ?></option>
           <?php
         }

	}


	if(isset($_POST['get_xa'])){
		$id_huyen = $_POST['get_xa'];
          mysqli_set_charset($conn, 'UTF8');
          $sql = "SELECT * FROM phuong_xa WHERE ID_HUYEN = $id_huyen";
          $result = mysqli_query($conn,$sql);
          while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           ?>
           <option value=<?php echo $rows['id_xa']; ?>> <?php echo $rows['XA_NAME']; ?></option>
           <?php
         }

	}


	if(isset($_POST['check_sdt'])){
		$sdt = $_POST['check_sdt'];
          mysqli_set_charset($conn, 'UTF8');

          if($sdt != ""){
          	$sql = "SELECT * FROM USER WHERE USR_SDT = $sdt";
          	if(!is_numeric($sdt)){
          		?>
					<script type="text/javascript">
						$("#canhbao").html(' <div class="alert" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 300px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>Không đúng định dạng!</div>');
					</script>
          		<?php

          	}else{
          $result = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($result);
          if($count > 0){
          	?>
					<script type="text/javascript">
						$("#canhbao").html(' <div class="alert warning" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 300px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>đã được sử dụng!</div>');
					</script>
          	<?php
          }
          else{
          		?>
          			<script type="text/javascript">
						$("#canhbao").html(' <div class="alert success" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 300px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>Có thể sử dụng!</div>');
					</script>
          		<?php
          }
      }
  }

	}
  else



	if(isset($_POST['sdt'])){
		$sdt = $_POST['sdt'];
		$mail = $_POST['mail'];
		$ho = $_POST['ho'];
		$ten = $_POST['ten'];
		$gt = $_POST['gt'];
		$quyen = $_POST['quyen'];
		$htx = $_POST['htx'];
		$tinh = $_POST['tinh'];
		$huyen = $_POST['huyen'];
		$xa = $_POST['xa'];
		$pass = md5("nongsanhaugiang");
          if($sdt != ""){
          	$sql = "SELECT * FROM USER WHERE USR_SDT = $sdt";
          	if(!is_numeric($sdt)){
          		?>
					<script type="text/javascript">
						$("#canhbao").html(' <div class="alert" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 300px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>Không đúng định dạng!</div>');
					</script>
          		<?php

          	}else{
          $result = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($result);
          if($count > 0){
          	?>
					<script type="text/javascript">
						$("#canhbao").html(' <div class="alert warning" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 300px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>đã được sử dụng!</div>');
					</script>
          	<?php
          }
          else{
          		$sql = "INSERT INTO USER(USR_SDT,USR_EMAIL,USR_HO,USR_TEN,USR_GIOITINH,Q_ID,HTX_ID,id_tinh,id_huyen,id_xa,USR_PASS) VALUES ('$sdt','$mail','$ho','$ten','$gt',$quyen,$htx,$tinh,$huyen,$xa,'$pass')";
          		mysqli_set_charset($conn,"UTF8");
          		if(mysqli_query($conn,$sql)){
          			?>
						<script type="text/javascript">
							alert("Thêm người dùng thành công!");
							$("#cho_id").load('trang/danhsach_nguoidung.php');
						</script>
          			<?php
          		}
          }
      }




	}
}
  else
  if(isset($_POST['them_nsp'])){
    $ten = $_POST['ten'];
    $mota = $_POST['mota'];

       $sql = "INSERT INTO NHOMSANPHAM(NSP_TEN,NSP_MOTA) VALUES ('$ten','$mota')";
              mysqli_set_charset($conn,"UTF8");
              if(mysqli_query($conn,$sql)){
                ?>
            <script type="text/javascript">
              alert("Thêm nhóm sản phẩm thành công!");
              $("#show").load('trang/danhsach_nhomsanpham.php');
            </script>
                <?php
              }
          }
          else
           if(isset($_POST['them_lsp'])){
            $ten = $_POST['ten'];
            $nsp = $_POST['nsp'];
            $mota = $_POST['mota'];

            $sql = "INSERT INTO LOAISANPHAM(LSP_TEN,LSP_MOTA,NSP_ID) VALUES ('$ten','$mota',$nsp)";
            echo $sql;
            mysqli_set_charset($conn,"UTF8");
            if(mysqli_query($conn,$sql)){
              ?>
              <script type="text/javascript">
                alert("Thêm loại sản phẩm thành công!");
                $("#show").load('trang/danhsach_loaisanpham.php');
              </script>
              <?php
            }
          }else
					if(isset($_POST['tungdo'])){
						$kinhdo = $_POST['tungdo'];
						$vido   = $_POST['vido'];
						$htx_ten = $_POST['htx_ten'];
						$htx_diachi = $_POST['htx_diachi'];
						$htx_sdt = $_POST['htx_sdt'];
						$dd_ten = $_POST['dd_ten'];
						$dd_diachi = $_POST['dd_diachi'];
						$dd_sdt = $_POST['dd_sdt'];
            $dd_ngaysinh = $_POST['ngaysinh'];
						$sql = "INSERT INTO HOPTACXA(HTX_TEN,HTX_DIACHI,HTX_SDT,NDD_TEN,NDD_DIACHI,NDD_SDT,HTX_KINHDO,HTX_VIDO,NDD_NGAYSINH)
						VALUES ('$htx_ten','$htx_diachi','$htx_sdt','$dd_ten','$dd_diachi','$dd_sdt',$kinhdo,$vido,'$dd_ngaysinh')";
						mysqli_set_charset($conn,"UTF8");
						if(mysqli_query($conn,$sql)){
							?>
									<script>
												alert("Thêm hợp tác xã thành công!");
												$("#show").load('trang/danhsach_hoptacxa.php');
									</script>
							<?php
						}
				 }

				     else
                         if(isset($_POST['them_dvvc'])){
                             $ten = $_POST['ten'];
                             $diachi = $_POST['diachi'];
                             $sdt = $_POST['sdthoai'];
                             $sql = "INSERT INTO DONVIVANCHUYEN(DVVC_TEN,DVVC_DIACHI,DVVC_SDT,DVVC_MUCDOHAILONG)
						VALUES ('$ten','$diachi','$sdt',0)";
                                $pass = md5('00000000');
//                             $sql1 ="INSERT INTO USER(USR_SDT,DVVC_DIACHI,USR_PASS,USR_TRANGTHAI,Q_ID)
//						VALUES ('$sdt','$diachi','$pass',1,4)";
                             mysqli_set_charset($conn,"UTF8");
                             if(mysqli_query($conn,$sql)){
                                 ?>
                                 <script>
                                     alert("Thêm đơn vị vận chuyển thành công!");
                                     $("#show").load('trang/danhsach_donvivanchuyen.php');
                                 </script>
                                 <?php
                             }
                         }
                             else
                                 if(isset($_POST['themgia_dvvc'])){
                                     $dvvc_id = $_POST['themgia_dvvc'];
                                     $gianhanh  = $_POST['gianhanh'];
                                     $vantocnhanh  = $_POST['vantocnhanh'];
                                     $giachuan = $_POST['giachuan'];
                                     $vantocchuan = $_POST['vantocchuan'];
                                     $sql = "INSERT INTO LOAIHANGVANCHUYEN(DVVC_ID,LH_GIA_NHANH,LH_GIA_TIEUCHUAN,THOIGIAN_NHANH,THOIGIAN_TIEUCHUAN)
						VALUES ($dvvc_id,$gianhanh,$giachuan,$vantocnhanh,$vantocchuan)";
                                     echo $sql;
                                     mysqli_set_charset($conn,"UTF8");
                                     if(mysqli_query($conn,$sql)){
                                         ?>
                                         <script>
                                             alert("Thêm giá vận chuyển thành công!");
                                             $("#show").load('trang/danhsach_donvivanchuyen.php');
                                         </script>
                                         <?php
                                     }
                                 }

?>
