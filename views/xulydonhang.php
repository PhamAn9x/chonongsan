    <?php 
        if(isset($_SESSION['sdt'])){
            $sdt=$_SESSION['sdt'];
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
            <h1>XỬ LÝ ĐƠN HÀNG</h1>
            </div>
            <div class="w3-row w3-col s6" style="border-right: 1px dotted black; padding-right: 4%;">
                <h2 style="color: black; text-align: center;">THÔNG TIN ĐƠN HÀNG</h2>
                 <table border="1" style="width: 104%; color: white; font-size: 20px; background-color: white; color: black; border-style: dotted;" class="w3-table">
                    <style type="text/css">
                        .h td{
                            text-align: center;
                            background-color: green;
                            color: white;
                        }
                    </style>
                        <tr class="h">
                            <td>STT</td>
                            <td>Tên sản phẩm</td>
                            <td >Số lượng</td>
                            <td>Đơn giá</td>
                            <td>Thành tiền</td>
                        </tr>
                        <?php
                            $i=1;
                            $ngaydat ="";
                            $kl_id = $_GET['ma'];
                            $sdt = $_GET['so'];
                            mysqli_set_charset($conn,'UTF8');
                            $result =mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' OR KL_SDT_BAN = '$sdt' AND KL_ID = $kl_id");          
                            // echo "SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt'";                  
                            foreach ($result as $value) {
                                $ngaydat = $value['KL_NGAYKHOP'];
                                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['KL_SP_TEN']; ?></td>
                            <td style="text-align: center;"> <?php echo $value['KL_SOLUONG'];?></td>
                            <td><?php echo adddotstring($value['KL_GIA']); ?></td>
                            <td><?php echo adddotstring($value['KL_SOLUONG'] * $value['KL_GIA']); ?></td>
                        </tr>
                        <?php
                        $i++;
                         }
                        ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Tổng thanh toán: <span style="font-size: 25px; font-weight: 600">
                            <?php
                                    $tong =0;
                                    foreach ($result as $value) {
                                        $tong += ($value['KL_GIA'] * $value['KL_SOLUONG']);
                                    }
                                    echo adddotstring($tong).' VNĐ  ';
                            ?>

                            </span></td>
                        </tr>
                    </table>
               </div>
            <div class="w3-row w3-col s6" style="padding-left: 2%;">
                <h2 style="color: black; text-align: center;">THÔNG TIN NGƯỜI MUA</h2>
                <?php
                    mysqli_set_charset($conn,"UTF8");
                    $dong = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM USER usr, tinh_thanh t, quan_huyen h, phuong_xa x WHERE USR_SDT = '$sdt' and usr.id_tinh = t.id_tinh and usr.id_huyen = h.id_huyen and usr.id_xa = x.id_xa"));
                ?>
                <form method="post" id="ttdonhang" name="ttdonhang">
                    <style type="text/css">
                        .tb tr th{
                            background-color: green;
                            color: white;
                        }
                        .tb tr td{
                            text-align: center;
                        }
                        .tb tr td input{
                            border-bottom: none;
                            font-size: 20px;
                        }
                    </style>
                <table border="1" width="100%" class="w3-table tb" style=" border-style: dotted; background-color: white; color: black; font-size: 20px;">
                    <tr>
                        <th>Họ và tên</th>
                        <td><input class="w3-input"  type="text" name="hoten" id="hoten" value="<?php echo $dong['USR_HO'].' '.$dong['USR_TEN']; ?>"/></td>
                        
                    </tr>
                     <tr>
                        <th>Ngày sinh</th>
                        <td><input class="w3-input" id="ngaysinh" name="ngaysinh" placeholder="Ngày sinh" value="<?php echo $dong['USR_NGAYSINH'];?>" /></td>
                    </tr>
                     <tr>
                        <th>Số điện thoại</th>
                        <td><input class="w3-input" id="sodienthoai" name="sodienthoai" value="<?php echo $dong['USR_SDT'];?>" placeholder="Số điện thoại" /></td>
                    </tr>
                     <tr>
                        <th>Địa chỉ</th>
                        <td><input class="w3-input" type="text" id="diachi" name="diachi" value="<?php echo $dong['USR_SONHA_AP'].'-'.$dong['XA_NAME'].'-'.$dong['HUYEN_NAME'].'-'.$dong['TINH_NAME']; ?>" placeholder="Địa chỉ"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input class="w3-input" id="email" name="email" placeholder="Email" value="<?php echo $dong['USR_EMAIL'];?>"/></td>
                    </tr>
                    <tr>
                        <th>Ngày đặt hàng</th>
                        <td><input class="w3-input" type="text" name="ngaydat" id="ngaydat" placeholder="Ngày đặt hàng" value ="<?php echo $value['KL_NGAYKHOP']; ?>"/></td>
                    </tr>
                </table>
               </form>    
		</div>
               <div class="w3-row w3-col s12" style="padding-left: 25%; padding-top: 2%">
                   <p id="capchar" name="capchar" style="padding-left: 17%;" class="g-recaptcha" data-sitekey="6LdjITIUAAAAAN_4SReoxN5n0SmUhLYCNBAvCOkm"></p> 
               </div>
                <div class="w3-row">&nbsp</div>
                <div class="w3-row" style="text-align: center;">
                    <input type="submit" style="width: 20%" class="w3-btn w3-red w3-round w3-hover-white" name="btndangtin" id="btndangtin" value="Xác nhận & Đặt hàng">
                <a href="index.php?xem=giohang"><input style="width: 20%" type="button" class="w3-btn w3-blue w3-round w3-hover-white" name="btnhuy" id="btnhuy" value="Trở lại"></a>
                </div>
            </div>
         </div>
    </form>
    
   
  <?php 
  if(isset($_POST['hoten'])){
    $hoten=$_POST['hoten'] ;
    $ngaysinh=$_POST['ngaysinh'] ;
    $sdt=$_POST['sodienthoai'] ;
    $diachi=$_POST['diachi'] ;
    $email=$_POST['email'] ;
    $ngaydathang=$_POST['ngaydat'] ;
    $cap = $_POST['g-recaptcha-response'];
	if($hoten != "" && $ngaysinh != "" && $sdt != "" && $diachi != "" && $email != "" && $ngaydathang != "" && $cap != ""){
        $sql = "INSERT INTO DONHANG(DH_SDT,DH_NGAYDAT,DH_NOIGIAO,DH_TRANGTHAI,DH_HOTEN,DH_EMAIL,DH_TONGTIEN) VALUES (
        '$sdt','$ngaydathang','$diachi',1,'$hoten','$email',$tong)";
        if(mysqli_query($conn,$sql)) 
            {
                $dong =  mysqli_fetch_row(mysqli_query($conn,"SELECT DH_ID FROM DONHANG WHERE DH_SDT = '$sdt' ORDER BY DH_ID DESC LIMIT 0,1"));
                $dh_ma = $dong[0];
                foreach ($_SESSION['giohang'] as $value) {
                    $sp_id = $value['id'];
                    $soluong = $value['soluong'];
                   mysqli_query($conn,"INSERT INTO SANPHAMDONHANG(DH_ID,SP_ID,DHSP_SOLUONG) VALUES($dh_ma,$sp_id,$soluong)");
                   $sl = mysqli_fetch_row(mysqli_query($conn,"SELECT SP_SOLUONG FROM SANPHAM WHERE SP_ID = $sp_id"));
                   $vlsl = $sl[0];
                   $slcl = $vlsl - $soluong;
                   mysqli_query($conn,"UPDATE SANPHAM SET SP_SOLUONG = $slcl WHERE SP_ID = $sp_id");
                }
                echo '<meta http-equiv="Refresh" content="0,URL=index.php" />';
               echo '<script>alert("Đơn hàng của bạn đã được ghi nhận! Cảm ơn!");</script';
                unset($_SESSION['giohang']); 

            } else echo '<script>alert("Đặt hàng chưa thành công!");</script';


    }

    else echo '<script>alert("Vui lòng kiểm tra lại thông tin!");</script';
	
        }
    }
?>