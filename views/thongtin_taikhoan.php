    <?php 
        if(isset($_SESSION['sdt'])){
    ?>
   
<!--     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="css/tindang.css" rel="stylesheet" />
    <link type="text/css" href="css/css_ck.css"/>
    <script type="text/javascript" src="ajax/ajax_tinhthanh.js"></script>
    <script type="text/javascript" src="ajax/ajax_loaisp.js"></script>
    <script type="text/javascript" src="ajax/ajax_check_sdt.js"></script>
    <script type="text/javascript" src="js/check_dangtin.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div id = "alert"></div>
    <?php
        include("config/connect.php");
    ?>
    <form name="qldangtin" id="qldangtin" method="post" class="tindang">
        <div class="w3-row khung">
            <div class="w3-row">
                <h1>THÔNG TIN TÀI KHOẢN</h1>
                 <hr style="border: 2px;">
                <div class="w3-col s6 ">
                    <?php
                    $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM USER AS USR, TINH_THANH AS T, QUAN_HUYEN AS H, PHUONG_XA X WHERE USR_SDT = '$sdt' AND USR.ID_TINH = T.ID_TINH AND USR.ID_HUYEN = H.ID_HUYEN AND USR.ID_XA = X.ID_XA";
                        mysqli_set_charset($conn,"UTF8");
                        $rs = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
                    ?>
                   <table class="w3-table w3-border w3-large " style="width: 97%;">
                       <tr>
                           <td>Họ và tên</td>
                           <td style="font-weight: 700"><?php echo $rs['USR_HO'].' '.$rs['USR_TEN']; ?></td>
                       </tr>
                       <tr>
                           <td>Số điện thoại</td>
                           <td  style="font-weight: 700"><?php echo $sdt; ?></td>
                       </tr>
                       <tr>
                           <td>Địa chỉ</td>
                           <td style="font-weight: 700"><?php echo $rs['XA_NAME'].' - '.$rs['HUYEN_NAME'].' - '.$rs['TINH_NAME']; ?></td>
                       </tr>
                       <tr>
                           <td>Ngày sinh</td>
                           <td style="font-weight: 700"><?php echo $rs['USR_NGAYSINH']; ?></td>
                       </tr>
                       <tr>
                           <td>Giới tính</td>
                           <td style="font-weight: 700"><?php echo $rs['USR_GIOITINH']; ?></td>
                       </tr>
                   </table>
                </div>


                <div id ="sua" class="w3-col s6">
                    
                </div>
                <div class="w3-col s6" style="text-align: left; padding-left: 7%; padding-top: 3%;">
                    <input style="width: 120px;" class="w3-button w3-red w3-round w3-hover-blue" type="button" name="btnsua" id="btnsua" value="Sửa thông tin">
                    <input style="width: 120px;" class="w3-button w3-green w3-round w3-hover-blue" type="button" name="btnback" id="btnback" value="Quay lại">
                </div>
                <div id='dpluu' class="w3-col s6">
                    
                </div>
                    <div style="display: none;">
                        <div id ="luu" style="text-align: center; padding-top: 5%;">
                            <input style="width: 120px;" class="w3-button w3-red w3-hover-blue w3-round" type="button" name="btnluu" id= "btnluu" value="Lưu">
                        </div>
                    <div id = "chinhsua">
                        <table class="w3-table w3-border w3-large" style="width: 99%;">
                       <tr>
                           <td>Họ và tên</td>
                           <td style="font-weight: 700">
                                <input style="width: 45%;" type="text" placeholder="Họ" name="ho" id="ho" value="<?php echo $rs['USR_HO'];?>">
                                <input style="width: 45%;" placeholder="Tên" type="text" name="ten" id="ten" value="<?php echo $rs['USR_TEN'];?>">
                            </td>
                       </tr>
                       <tr>
                           <td>Số điện thoại</td>
                           <td  style="font-weight: 700">
                                <input type="text" name="sdt" id="sdt" value="<?php echo $rs['USR_SDT'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td>Địa chỉ</td>
                           <td style="font-weight: 700">
                               <input type="text" name="diachi" id="diachi" value="<?php echo $rs['USR_SONHA_AP'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td>Ngày sinh</td>
                           <td style="font-weight: 700">
                                <input type="date" name="ngaysinh" id="ngaysinh" value="<?php echo $rs['USR_NGAYSINH'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td>Giới tính</td>
                           <td style="font-weight: 700">
                               <select id="sl_gt">
                                   <option value=""> Chọn giới tính</option>
                                   <option value="0">Nam</option>
                                   <option value="1">Nữ</option>
                                   <option value="2">Không xác định</option>
                               </select>
                           </td>
                       </tr>
                   </table>
                </div>
            </div>

                </div>
         </div>
  <?php 
    } else 
        {
            echo "<script>alert('Vui lòng đăng nhập trước khi xem thông tin tài khoản!');</script>";
            echo '<meta http-equiv="Refresh" content="0,URL=index.php?view=dangnhap" />';
        }
?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#btnsua").click(function(){
           $("#sua").html($("#chinhsua"));
           $("#dpluu").html($("#luu"));
        });
    });
</script>

