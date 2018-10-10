<?php
session_start();
	include("../../config/connect.php");
	if(isset($_POST['ck_nsp'])){
		$nsp = $_POST['ck_nsp'];
	                            mysqli_set_charset($conn,"UTF8");
                            $rs = mysqli_query($conn,"SELECT * FROM  LOAISANPHAM WHERE NSP_ID = $nsp");
                            while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                ?>
                                    <option value="<?php echo $row['LSP_ID']; ?>"> <?php echo $row['LSP_TEN']; ?> </option>
                                <?php
                            }
	} else
				if(isset($_POST['dangnhap'])){
					$sdt = $_POST['sdt'];
					$pass = md5($_POST['pass']);
					$sql = "SELECT * FROM USER WHERE USR_SDT = '$sdt' AND USR_PASS = '$pass' AND Q_ID = 5" ;
					$row = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
					$kq = mysqli_num_rows(mysqli_query($conn,$sql));
					if($kq  > 0){
						$_SESSION['qt_htx']=$row['HTX_ID'];
					?>

					<script type="text/javascript">
						 window.location.href="index1.php";
					</script>
					<?php
				}else{
					?>
						<script type="text/javascript">
						alert("Đăng nhập thất bại! Vui lòng kiểm tra lại!");
					</script>
					<?php
				}
				} else
							if(isset($_POST['sdt'])){
		$sdt = $_POST['sdt'];
	                            mysqli_set_charset($conn,"UTF8");
                            $rs = mysqli_query($conn,"SELECT * FROM USER as usr, tinh_thanh as tt, quan_huyen as qh, phuong_xa as px WHERE usr.id_tinh = tt.id_tinh AND usr.id_huyen = qh.id_huyen AND usr.id_xa = px.id_xa AND USR_SDT = '$sdt'");
                            $kq = mysqli_fetch_array($rs,MYSQLI_ASSOC);
                            $diachi = $kq['XA_NAME'].'-'.$kq['HUYEN_NAME'].'-'.$kq['TINH_NAME'];

                                ?>
                                     <label for="exampleInputPassword1">Địa chỉ - Số điện thoại</label>
                   					 <div class="form-group">
                       				 <input  style="width: 60%; float: left;" type="text" class="form-control" id="ipdiachi" value="<?php echo $diachi; ?>">
                         			<input style="width: 40%;float: left;" type="text" class="form-control" id="ipsdt" value="<?php echo $kq['USR_SDT']; ?>">
                    </div>
                                <?php
	}  else
						if(isset($_POST['themsp'])){
							$sdt =$_POST['themsp'];
							$tensp= $_POST['tensp'];
							$nsp = $_POST['nsp'];
							$lsp = $_POST['lsp'];
							$dvtinh = $_POST['dvtinh'];
							$motangan = $_POST['motangan'];
							$motachitiet = $_POST['motachitiet'];
							$htx = $_POST['htx'];
							$diachi = $_POST['diachi'];
							mysqli_set_charset($conn,"UTF8");
								$sql = "INSERT INTO SANPHAM(SP_TEN,NSP_ID,LSP_ID,SP_DONVITINH,SP_MOTA,SP_MOTANGAN,SP_DIACHI,SP_HTX_ID,USR_SDT) VALUES ('$tensp',$nsp,$lsp,'$dvtinh','$motachitiet','$motangan','$diachi', $htx,'$sdt') ";
								if(mysqli_query($conn,$sql)){
										$sql = "SELECT SP_ID FROM SANPHAM WHERE SP_HTX_ID =$htx  ORDER BY SP_ID DESC LIMIT 0,1
";
	
										$kq = mysqli_fetch_row(mysqli_query($conn,$sql));
							?>
								<script type="text/javascript">
									var sp_id = <?php echo $kq[0] ;?>;
									var htx = <?php echo $htx;?>;
									alert("Thêm sản phẩm thành công! Vui lòng cập nhật ảnh sản phẩm!");
									$("#show").load("trang/popup_them_anh.php?sp_id="+sp_id+"&htx="+htx);
								</script>
							<?php
						}
								} else

							?>