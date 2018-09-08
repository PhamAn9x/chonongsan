    <?php 
        if(isset($_SESSION['sdt'])){
    ?>
    <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
<!--     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>-->
     <script type="text/javascript" src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="css/tindang.css" rel="stylesheet" />
    <link type="text/css" href="css/css_ck.css"/>
    <script type="text/javascript" src="ajax/ajax_tinhthanh.js"></script>
    <script type="text/javascript" src="ajax/ajax_loaisp.js"></script>
    <script type="text/javascript" src="ajax/ajax_check_sdt.js"></script>
    <script type="text/javascript" src="js/check_dangtin.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

    <?php
        include("config/connect.php");
    ?>

   
    <form name="dangtin" id="dangtin" method="post" class="tindang">
        <div class="w3-row khung">
            <div class="w3-row">
            <h1>ĐĂNG TIN SẢN PHẨM TRÊN CHỢ NÔNG SẢN HỢP TÁC XÃ</h1>
            </div>
            <div class="w3-row w3-col s6" style="border-right: 1px dotted black; padding-right: 4%;">
                <h2>Thông tin sản phẩm</h2>
                <div class="w3-row">
                    <input style="border-radius: 5px 5px;" class="w3-input" type="text" name="tieude" id="tieude" placeholder="Tiêu đề tin">
                </div>
                <div class="w3-row">
                    <select class="w3-select" name="slnhomsanpham" id="slnhomsanpham">
                        <option value=""><b>Chọn nhóm sản phẩm</b></option>
                        <?php
                            $sql = "SELECT * FROM NHOMSANPHAM";
                            mysqli_set_charset($conn, 'UTF8');
                            $result = mysqli_query($conn,$sql);
                            while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        ?>
                        <option style="font-weight: 900" value="<?php echo $rows['NSP_ID'];?>">
                            <?php echo $rows['NSP_TEN']; ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="w3-row">
                    <select class="w3-select" name="slloaisanpham" id="slloaisanpham">
                       <option value="">Chọn loại sản phẩm</option>";
                    </select>
                </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="soluong" id="soluong" placeholder="Số lượng cần bán">
                </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="gia" id="gia" placeholder="Giá bán">
                             </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="donvitinh" id="donvitinh" placeholder="Đơn vị tính">
                </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="phi" id="phi" placeholder="Phí vận chuyển">
                </div>
                <div class="w3-row" style="padding-left: 0%; width: 100%;">
                     <textarea name="ck" placeholder="Nhập mô tả sản phẩm" id="ck" rows="6" cols="79"></textarea>
                     <script>//CKEDITOR.replace('ck');</script>
                </div>
            </div>
            <div class="w3-row w3-col s6" style="padding-left: 2%;">
                <h2>Thông tin người đăng</h2>
                <div class="w3-row">
                    <input style="width: 97%; border-radius: 5px 5px 0 0; " type="text" name="sdt" id="sdt" placeholder="Số điện thoại" class="w3-input" value="<?php echo $_SESSION['sdt']; ?>">
                </div>
                <div id="data_sdt">
                 <div class="w3-row">
                    <input style="width: 47%; float: left;" type="text" style="" class="w3-input" id="ho" name="ho" placeholder="Họ">
                    <input type="text" name="ten" id="ten" class="w3-input" style="width: 47%; float: left;border-radius: 0 5px 0 0;" placeholder="Tên">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="email" name="email" id="email" placeholder="E-mail" class="w3-input">
                </div>
                <!-- <div class="w3-row">
                    <input style="width: 97%;" type="text" name="facebook" id="facebook" placeholder="Facebook" class="w3-input">
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="text" name="skyper" id="skyper" placeholder="Skyper" class="w3-input">
                </div> -->
                  <div class="w3-row">
                    <select style="width: 30%; float: left;" class="w3-select" name="sltinh" id="sltinh">
                        <option value=""><b>Chọn tỉnh</b></option>
                                    <?php
                          mysqli_set_charset($conn, 'UTF8');
                          $sql = "SELECT * FROM tinh_thanh";
                          $result = mysqli_query($conn,$sql);
                          while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                         ?>
                         <option value=<?php echo $rows['id_tinh']; ?>> <?php echo $rows['TINH_NAME']; ?></option>
                        <?php 
                      }
                        ?>
                    </select>
                    <select style="width: 30%; float: left;" class="w3-select" name="slhuyen" id="slhuyen">
                        <option value=""><b>Chọn huyện</b></option>
                    </select>
                    <select style="width: 31%; float: left;" class="w3-select" name="slxa" id="slxa">
                        <option value=""><b>Chọn xã</b></option>
                    </select>
                </div>
                <div class="w3-row">
                    <input style="width: 97%;" type="text" name="diachi" id="diachi" placeholder="Địa chỉ chi tiết" class="w3-input">
                </div>
                <div class="w3-row">
                    <select style="width: 97%;" type="text" name="hoptacxa" id="hoptacxa" placeholder="Địa chỉ chi tiết" class="w3-input">
                    	<option value="">Chọn hợp tác xã</option>
                    	<?php
							mysqli_set_charset($conn,"UTF8");
							$sql="SELECT * FROM HOPTACXA";
							$result = mysqli_query($conn,$sql);
							foreach($result as $rows){	
						?>
						<option value="<?php echo $rows['HTX_ID']; ?>"><?php echo $rows['HTX_TEN']; ?></option>
						<?php
						}
						?>
					</select>
                </div>
		</div>
                <div class="w3-row">
                    <input style="width: 97%; border-radius: 0 0 5px 5px" type="date" name="ngayhethan" id="ngayhethan" placeholder="Ngày hết hạn" placeholder="Chọn ngày" class="w3-input">
                    
                </div>
                <div class="w3-row" style="margin-top: 2%; padding-left: 10%;">
                   <p id="capchar" style="padding-left: 17%;" class="g-recaptcha" data-sitekey="6LdjITIUAAAAAN_4SReoxN5n0SmUhLYCNBAvCOkm"></p>
                </div>
                <div class="w3-row">&nbsp</div>
                <div class="w3-row" style="text-align: center;">
                    <input type="button" onclick="return kiemtradang();" style="width: 20%" class="w3-btn w3-red w3-round" name="btndangtin" id="btndangtin" value="Đăng tin">
                <input style="width: 20%" type="button" class="w3-btn w3-blue w3-round" name="btnhuy" id="btnhuy" value="Hủy bỏ">
                </div>
            </div>
         </div>
    </form>
    
   
  <?php 
	if(isset($_POST['tieude'])){
		$tieude = $_POST['tieude'];
		$nhomsanpham = $_POST['slnhomsanpham'];
		$loaisanpham = $_POST['slloaisanpham'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['gia'];
		$donvitinh = $_POST['donvitinh'];
		$phi = $_POST['phi'];
		$mota = $_POST['ck'];
		$sdt = $_POST['sdt'];
		$ngayhethan = $_POST['ngayhethan'];
		$ngaydang = date("Y-m-d");
		$diachi = $_POST['diachi'];
	$sql = "INSERT INTO SANPHAM(SP_TEN,NSP_ID,LSP_ID,SP_SOLUONG,SP_GIA,SP_DONVITINH,SP_PHIVANCHUYEN,SP_MOTA,USR_SDT,SP_NGAYDANG,SP_NGAYHETHAN,SP_DIACHI,SP_TRANGTHAI) VALUES ('$tieude',$nhomsanpham,$loaisanpham,$soluong,$gia,'$donvitinh','$phi','$mota','$sdt','$ngaydang','$ngayhethan','$diachi',0)";
	if(mysqli_query($conn,$sql)){
		$_SESSION['dinhanh']=$sdt;
		echo "<script>
		alert('Đăng tin thành công! Chờ duyệt của quản trị viên!');
	   window.location.href = 'index.php?view=capnhathinhanh&id=$sdt';
	  </script>";
		mysqli_close($conn);
		
	}
	else echo "<script>alert('Đăng tin thất bại! Vui lòng kiểm tra lại!');</script>";
	}
    } else 
        {
            echo "<script>alert('Vui lòng đăng nhập trước khi đăng tin!');</script>";
            echo '<meta http-equiv="Refresh" content="0,URL=index.php?view=dangnhap" />';
        }
?>