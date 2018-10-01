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
                <h1>THAY ĐỔI MẬT KHẨU</h1>
                <div class="w3-col s12 " style="">
                  <table class="w3-table">
                    <tr>
                      <td style="text-align: right; width: 35%;">Mật khẩu cũ </td>
                      <td><input style="width: 50%;" type="password" name="oldpass" id="oldpass" placeholder="Mật khẩu cũ"></td>
                    </tr>
                    <tr>
                      <td style="text-align: right;">Mật khẩu mới </td>
                      <td><input style="width: 50%;" type="password" name="newpass" id="newpass" placeholder="Mật khẩu cũ"></td>
                    </tr>
                    <tr>
                      <td style="text-align: right;">Nhập lại mật khẩu mới</td>
                      <td><input style="width: 50%;" type="password" name="renewpass" id="renewpass" placeholder="Mật khẩu cũ"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: center;">
                        <input style="width: 10%;" class="w3-button w3-red w3-round w3-hover-blue" type="button" name="btndmk" id="btndmk" value="Đổi mật khẩu">
                        <input style="width: 10%;" class="w3-button w3-green w3-round w3-hover-blue" type="button" name="btnback" id="btnback" value="Trở lại">

                      </td>
                    </tr>
                  </table>
                   </div>
                 </div>
               </div>
             </form>
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

