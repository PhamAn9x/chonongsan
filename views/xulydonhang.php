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
        <style type="text/css">
        .dh tr th{text-align: center; vertical-align: middle; font-weight: 700; font-size: 15px;}
        .dh tr td{
            text-align: center;
        }
    </style>

    <form name="frdonhang" id="frdonhang" method="post" class="tindang">
        <div class="w3-row khung">
            <div class="w3-row">
                <h1>XỬ LÝ LỆNH MUA</h1>
            </div>
            <div class="w3-row w3-col s6" style="border-right: 1px dotted black; padding-right: 4%;">
                <h2 style="color: black; text-align: center;">THÔNG TIN ĐƠN HÀNG</h2>
                <hr />
                <table border="1" style="width: 104%; color: white; font-size: 20px; background-color: white; color: black; border-style: dotted;" class="w3-table">
                    <style type="text/css">
                    .h td{
                        text-align: center;
                        background-color: #00b894;
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
                $sdtb = $_GET['so'];
                $sdtm = $_SESSION['sdt'];
                mysqli_set_charset($conn,'UTF8');
                $result =mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdtm' AND KL_SDT_BAN = '$sdtb' AND KL_TRANGTHAI < 2");          
                            // echo "SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt'";    

                foreach ($result as $value) {
                    $ngaydat = $value['KL_NGAYKHOP'];
                    $id = $value['KL_SP_ID'];
                    $SP = array(  
                        "id" => $value['KL_SP_ID'],
                        "ten" => $value['KL_SP_TEN'],
                        "soluong" => $value['KL_SOLUONG'],
                        "gia" => $value['KL_GIA']
                    );
                    $_SESSION['SP'][$id] = $SP;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['KL_SP_TEN']; ?></td>
                        <?php
                        $dong = mysqli_query($conn,"SELECT SP_DONVITINH FROM SANPHAM WHERE SP_ID = $id");
                        $kq = mysqli_fetch_row($dong);
                        ?>
                        <td style="text-align: center;"> <?php echo $value['KL_SOLUONG']." ".$kq[0];?></td>
                        <td><?php echo adddotstring($value['KL_GIA']); ?></td>
                        <td><?php echo adddotstring($value['KL_SOLUONG'] * $value['KL_GIA']); ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                <tr>
                    <td " colspan="5" style="text-align: right;">Tổng đơn hàng: <span style="font-size: 25px; font-weight: 600; color: black;">
                        <?php
                        $tong =0;
                        $tongkhoiluong = 0;
                        foreach ($result as $value) {
                            $tong += ($value['KL_GIA'] * $value['KL_SOLUONG']);
                            $tongkhoiluong+=$value['KL_SOLUONG'];
                        }
                        echo adddotstring($tong).' VNĐ  ';
                        ?>

                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: right;">Phí: <span class="phi" style="font-size: 25px; font-weight: 600;color: blue;">
                    Bạn chưa chọn nơi giao

                </span>
            </td>
        </tr>


        <tr>
            <td " colspan="5" style="text-align: right;">Tổng thanh toán: <span class="tongtt1" style="font-size: 25px; font-weight: 600">
                <?php
                $tong =0;
                $tongkhoiluong = 0;
                foreach ($result as $value) {
                    $tong += ($value['KL_GIA'] * $value['KL_SOLUONG']);
                    $tongkhoiluong+=$value['KL_SOLUONG'];
                }
                echo adddotstring($tong).' VNĐ  ';
                ?>

            </span>
            <div>
                <input style="display: none;" type="text" name="tong" id="tong" value="<?php echo $tong; ?>">
            </div>
        </td>
    </tr>
</table>
</div>
<div class="w3-row w3-col s6" style="padding-left: 2%;">
    <h2 style="color: black; text-align: center;">THÔNG TIN NGƯỜI BÁN</h2>
    <hr />
    <?php
    mysqli_set_charset($conn,"UTF8");
    $dong = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM USER usr, tinh_thanh t, quan_huyen h, phuong_xa x WHERE USR_SDT = '$sdtb' and usr.id_tinh = t.id_tinh and usr.id_huyen = h.id_huyen and usr.id_xa = x.id_xa"));
    $dong1 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM USER usr, tinh_thanh t, quan_huyen h, phuong_xa x WHERE USR_SDT = '$sdtm' and usr.id_tinh = t.id_tinh and usr.id_huyen = h.id_huyen and usr.id_xa = x.id_xa"));
    echo $sdtm;
    ?>
    <form method="post" id="ttdonhang" name="ttdonhang">
        <style type="text/css">
        .tb tr th{
           text-align: center;
           vertical-align: middle;
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
        <td>
            <input class="w3-input" type="text" id="diachi" name="diachi" value="<?php echo $dong['USR_SONHA_AP'].'-'.$dong['XA_NAME'].'-'.$dong['HUYEN_NAME'].'-'.$dong['TINH_NAME']; ?>" placeholder="Địa chỉ">
            <input style="" class="w3-input" type="text" id="diachi" name="diachi1" value="<?php echo $dong1['USR_SONHA_AP'].'-'.$dong1['XA_NAME'].'-'.$dong1['HUYEN_NAME'].'-'.$dong1['TINH_NAME']; ?>" placeholder="Địa chỉ">
        </td>
    </tr>
    <tr>
        <th>Email</th>
        <td><input class="w3-input" id="email" name="email" placeholder="Email" value="<?php echo $dong['USR_EMAIL'];?>"/></td>
    </tr>
    <tr>
        <th>Ngày đặt hàng</th>
        <td><input class="w3-input" type="text" name="ngaydat" id="ngaydat" placeholder="Ngày đặt hàng" value ="<?php echo $ngaydat; ?>"/></td>
    </tr>
</table>
</form>    
</div>
<div class="w3-col s12">
 <h2 style="color: black; text-align: center; margin-top: 5%;">THÔNG TIN GIAO HÀNG</h2>
 <hr />
 <table style="width: 104%;">
    <tr>
        <?php 
        $sqlden = "SELECT TINH_NAME,usr.id_tinh FROM USER usr , TINH_THANH tt WHERE usr.id_tinh = tt.id_tinh AND USR_SDT = $sdtm";
        $sqltu = "SELECT TINH_NAME,usr.id_tinh FROM USER usr , TINH_THANH tt WHERE usr.id_tinh = tt.id_tinh AND USR_SDT = $sdtb";
        $den = mysqli_fetch_row(mysqli_query($conn,$sqlden));
        $tu = mysqli_fetch_row(mysqli_query($conn,$sqltu));
        $gtu = $tu[1];
        $gden = $den[1];
        $sqlkctu = "SELECT KC_DODAI FROM KHOANGCACH WHERE KC_TINH_ID = $gtu";
        $sqlkcden = "SELECT KC_DODAI FROM KHOANGCACH WHERE KC_TINH_ID = $gden";
        $rs1 = mysqli_fetch_row(mysqli_query($conn,$sqlkctu));
        $kc1 = $rs1[0];
        $rs2 = mysqli_fetch_row(mysqli_query($conn,$sqlkcden));
        $kc2 = $rs2[0];

        ?>
        <td style="text-align: center; font-size: 22px;" >Lộ trình:  <span style="font-size: 25px"><?php echo $tu[0]; ?></span> - <span style="font-size: 25px;"><?php echo $den[0]; ?>
    </span></td>
</tr>
<tr>
    <td style="text-align: center; font-size: 22px;">Khoảng cách:<span style="font-size: 25px;"><?php echo " ".abs($kc2-$kc1)." "; ?></span> Km</td>
</tr>
</table>
<table class="w3-table-all dh" style="width: 100%; margin-top: 2%;">
   <tr>
       <td colspan="7" style="text-align: center; text-transform: uppercase; background-color: #00b894; color: white; font-weight: 700;"> chọn đơn vị giao hàng</td>
   </tr>

   <tr>
       <th>Chọn</th>
       <th>Hình thức <br /> giao hàng</th>
       <th>Tên đơn vị</th>

       <th>Giá/Kg/Km</th>
       <th>Tổng phí giao <br /> đơn hàng này</th>
       <th>Thời gian giao hàng</th>
       <th>Độ tin cậy</th>
   </tr>
   <?php
   $sql = "SELECT * FROM DONVIVANCHUYEN DV, LOAIHANGVANCHUYEN LH WHERE DV.DVVC_ID = LH.DVVC_ID";
   $rs = mysqli_query($conn,$sql);
   foreach ($rs as $value) {
    echo $value['DVVC_SDT'];
    ?>
    <tr>
       <td>
        <input type="radio" class="rd_vt" name="rd_vt" value="<?php echo $value['DVVC_SDT']; ?>">
        <input style="display: none;" type="text" name="dv" id="<?php echo 'dv'.$value['DVVC_SDT']; ?>" value="<?php echo $value['DVVC_SDT']; ?>" >
        <div style="" id="dv_chot"></div>
        <div style="" id="phi_chot"></div>
    </td>

    <input style="display: none;" type="text" name="dvvc_tt" id="<?php echo 'dvvc_tt'.$value['DVVC_SDT']; ?>" value="<?php echo $tongkhoiluong*$value['LH_GIA_NHANH']; ?>" >

    <td style="text-align: center; padding-left: 0%;">
       <select name="<?php echo 'htgh'.$value['DVVC_SDT']; ?>" id="<?php echo 'htgh'.$value['DVVC_SDT']; ?>" class="w3-input" style="width: 90%;">
           <option value="1">Nhanh</option>
           <option value="2">Tiêu chuẩn</option>
       </select>
   </td>
   <td><?php echo $value['DVVC_TEN'] ?></td>
   <td class='<?php echo 'gia'.$value['DVVC_SDT']; ?>'><?php echo adddotstring($value['LH_GIA_NHANH']); ?></td>
   <td class='<?php echo 'tongtien'.$value['DVVC_SDT']; ?>'><?php echo adddotstring($tongkhoiluong*$value['LH_GIA_NHANH']); ?></td>
   <div class='<?php echo 'hide'.$value['DVVC_SDT']; ?>'  style="display: none;" >
     <input type="text" name="<?php echo 'tongtienh'.$value['DVVC_SDT']; ?>" id="<?php echo 'tongtienh'.$value['DVVC_SDT']; ?>" value="<?php echo $tongkhoiluong*$value['LH_GIA_NHANH']; ?>" >
 </div>
 <td class='<?php echo 'thoigian'.$value['DVVC_SDT']; ?>'><?php echo round((40/$value['THOIGIAN_NHANH']),2)." tiêng"; ?></td>
 <td><?php echo $value['DVVC_MUCDOHAILONG']."%"; ?></td>

</tr>
<script type="text/javascript">
    $(document).ready(function(){
       $("<?php echo '#htgh'.$value['DVVC_SDT']; ?>").change(function(){
        var ht = $("<?php echo '#htgh'.$value['DVVC_SDT']; ?>").val();
        if(ht == 2){
            $('<?php echo '.gia'.$value['DVVC_SDT']; ?>').html("<?php echo adddotstring($value['LH_GIA_TIEUCHUAN']); ?>");
            $('<?php echo '.tongtien'.$value['DVVC_SDT']; ?>').html("<?php echo adddotstring($tongkhoiluong*$value['LH_GIA_TIEUCHUAN']); ?>");
            $
            $('<?php echo '.hide'.$value['DVVC_SDT']; ?>').html('<input type="text" name="<?php echo 'tongtienh'.$value['DVVC_SDT']; ?>" id="<?php echo 'tongtienh'.$value['DVVC_SDT']; ?>" value="<?php echo $tongkhoiluong*$value['LH_GIA_TIEUCHUAN']; ?>" >');

            $('<?php echo '.thoigian'.$value['DVVC_SDT']; ?>').html("<?php echo round((40/$value['THOIGIAN_TIEUCHUAN']),2).' tiếng'; ?>");
            var radios = document.getElementsByName('rd_vt');

            for (var i = 0, length = radios.length; i < length; i++)
            {
               if (radios[i].checked)
               {
  // do whatever you want with the checked radio
  var phic = $("#tongtienh"+radios[i].value).val();
  $("#phi_chot").html('<input type="text" name="phi_chot" value="'+phic+'">');
  break;
}
}


}else{
   $('<?php echo '.gia'.$value['DVVC_SDT']; ?>').html("<?php echo adddotstring($value['LH_GIA_NHANH']); ?>");
   $('<?php echo '.tongtien'.$value['DVVC_SDT']; ?>').html("<?php echo adddotstring($value['LH_GIA_NHANH']*$tongkhoiluong); ?>");
   $('<?php echo '.hide'.$value['DVVC_SDT']; ?>').html('<input type="text" name="<?php echo 'tongtienh'.$value['DVVC_SDT']; ?>" id="<?php echo 'tongtienh'.$value['DVVC_SDT']; ?>" value="<?php echo $tongkhoiluong*$value['LH_GIA_NHANH']; ?>" >');
   $('<?php echo '.thoigian'.$value['DVVC_SDT']; ?>').html("<?php echo round((40/$value['THOIGIAN_NHANH']),2).' tiếng'; ?>");
    var radios = document.getElementsByName('rd_vt');

            for (var i = 0, length = radios.length; i < length; i++)
            {
               if (radios[i].checked)
               {
  // do whatever you want with the checked radio
  var phic = $("#tongtienh"+radios[i].value).val();
  $("#phi_chot").html('<input type="text" name="phi_chot" value="'+phic+'">');
  break;
}
}


}

var radios = document.getElementsByName('rd_vt');

for (var i = 0, length = radios.length; i < length; i++)
{
   if (radios[i].checked)
   {
  // do whatever you want with the checked radio
  var s = '#tongtienh'+radios[i].value;
  var p = $(s).val();
  $(".phi").html((parseInt(p)).toLocaleString()+" VNĐ");
  $(".tongtt1").html((parseInt(p) + parseInt(<?php echo $tong; ?>)).toLocaleString()+" VNĐ");

  // only one radio can be logically checked, don't check the rest
  break;
}
}
});
   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".rd_vt").change(function(){
        var radios = document.getElementsByName('rd_vt');

        for (var i = 0, length = radios.length; i < length; i++)
        {
           if (radios[i].checked)
           {
  // do whatever you want with the checked radio
  var s = '#tongtienh'+radios[i].value;
  var p = $(s).val();
  var k = $("#dv"+radios[i].value).val();
  var phic = $("#tongtienh"+radios[i].value).val();
  $("#phi_chot").html('<input type="text" name="phi_chot" value="'+phic+'">');
  $("#dv_chot").html('<input type="text" name="dv_chot" value="'+k+'">');
  $(".phi").html((parseInt(p)).toLocaleString()+" VNĐ");
  $(".tongtt1").html((parseInt(p) + parseInt(<?php echo $tong; ?>)).toLocaleString()+" VNĐ");

  // only one radio can be logically checked, don't check the rest
  break;
}
}

})
});

</script>
<?php
}
?>
</table>

</div>


<div class="w3-row w3-col s12" style="padding-left: 25%; padding-top: 2%">
   <p id="capchar" name="capchar" style="padding-left: 17%;" class="g-recaptcha" data-sitekey="6LdjITIUAAAAAN_4SReoxN5n0SmUhLYCNBAvCOkm"></p> 
</div>
<div class="w3-row">&nbsp</div>
<div class="w3-row" style="text-align: center;">
    <input type="submit" style="width: 20%" class="w3-btn w3-red w3-round w3-hover-white" name="btndangtin" id="btndangtin" value="Xác nhận & Đặt hàng">
    <a href="index.php?view=ql_khoplenh"><input style="width: 20%" type="button" class="w3-btn w3-blue w3-round w3-hover-white" name="btnhuy" id="btnhuy" value="Trở lại"></a>
</div>

</div>

</div>


</form>


<?php 
if(isset($_POST['hoten'])){
    $hoten=$_POST['hoten'] ;
    $ngaysinh=$_POST['ngaysinh'] ;
    $sdtb=$_POST['sodienthoai'] ;
    $sdtm = $_SESSION['sdt'];
    $diachi=$_POST['diachi'] ;
    $email=$_POST['email'] ;
    $ngaydathang=$_POST['ngaydat'] ;
    $cap = $_POST['g-recaptcha-response'];
    $tong = $_POST['tong'];
    $tongphigiao = $_POST['phi_chot'];
    $dvvc = $_POST['dv_chot'];
    $diachi1 = $_POST['diachi1'];
    if($hoten != "" && $ngaysinh != "" && $sdt != "" && $diachi != "" && $email != "" && $ngaydathang != "" && $cap != ""){
        $sql = "INSERT INTO DONHANG(DH_SDT_NGUOIBAN,DH_SDT_NGUOIMUA,DH_NOINHAN,DH_NOIGIAO,DH_NGAYDAT,DH_TONGKHOILUONG,DH_TONGTIEN,DH_PHI,DH_DVVC_ID) VALUES ('$sdtb',
        '$sdtm','$diachi','$diachi1','$ngaydathang',$tongkhoiluong,$tong,$tongphigiao,'$dvvc')";
        if(mysqli_query($conn,$sql)) 
        {
            $dong =  mysqli_fetch_row(mysqli_query($conn,"SELECT DH_ID FROM DONHANG WHERE DH_SDT_NGUOIBAN = '$sdtb' ORDER BY DH_ID DESC LIMIT 0,1"));
            $dh_ma = $dong[0];
            foreach ($_SESSION['SP'] as $value) {
                $sp_id = $value['id'];
                $soluong = $value['soluong'];
                $ten = $value['ten'];
                $gia = $value['gia'];
                mysqli_query($conn,"INSERT INTO SANPHAMDONHANG(DH_ID,SP_ID,SPDH_TEN,SPDH_GIA,SPDH_SOLUONG) VALUES($dh_ma,$sp_id,'$ten',$gia,$soluong)");
                mysqli_query($conn,"UPDATE KHOPLENH SET KL_TRANGTHAI =1 WHERE KL_SDT_BAN = '$sdtb' AND KL_SDT_MUA = '$sdtm' AND KL_TRANGTHAI < 2");
                mysqli_query($conn,"DELETE FROM KHOPLENH WHERE KL_TRANGTHAI = 1");
                $sl = mysqli_fetch_row(mysqli_query($conn,"SELECT SP_SOLUONG FROM SANPHAM WHERE SP_ID = $sp_id"));
                $vlsl = $sl[0];
                $slcl = $vlsl - $soluong;
                mysqli_query($conn,"UPDATE SANPHAM SET SP_SOLUONG = $slcl WHERE SP_ID = $sp_id");
            }
            echo '<meta http-equiv="Refresh" content="0,URL=index.php?view=ql_khoplenh" />';
            echo '<script>alert("Đơn hàng của bạn đã được ghi nhận! Cảm ơn!");</script';
            unset($_SESSION['SP']); 

        } else echo '<script>alert("Đặt hàng chưa thành công!");</script';


    }

    else echo '<script>alert("Vui lòng kiểm tra lại thông tin!");</script';

}
}
?>
