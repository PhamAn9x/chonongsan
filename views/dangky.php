<!-- header starts here -->
<div style="margin-top: 5%;">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
  <script src="ajax/ajax_tinhthanh.js" type="text/javascript"></script>
  <script type="text/javascript">
    var check = 0;
    function check_dk() {
      var nnd = document.getElementById('sl_nnd').value;
      var ho = document.getElementById('ho').value;
      var ten = document.getElementById('ten').value;
      var sdt   = document.getElementById('sdt').value;
      var dsdt = sdt.length;
      var pass  = document.getElementById('matkhau').value;
      var repass= document.getElementById('rematkhau').value;
      var email = document.getElementById('email').value;
      var sltinh = document.getElementById('sltinh').value;
      var slhuyen = document.getElementById('slhuyen').value;
      var slxa = document.getElementById('slxa').value;
      if(nnd == ""){
        document.getElementById("sl_nnd").style.borderColor = "red"; 
        document.getElementById("sl_nnd").style.borderWidth = "2px";
        document.getElementById("alert_nnd").innerHTML="<i>Vui lòng chọn nhóm ngưòi dùng!</i>";
        check = 1;
      }else
      if(ho == "") 
      {
        document.getElementById("ho").style.borderColor = "red"; 
        document.getElementById("ho").style.borderWidth = "2px";
        document.getElementById("alert_ho_ten").innerHTML="<i>Họ không được để trống</i>";
        check = 1;
      } else
      {
        document.getElementById("ho").style.borderColor = "green"; 
        document.getElementById("ho").style.borderWidth = "1px";
        document.getElementById("alert_ho_ten").innerHTML="";
        check = 0;
      }

      if(ten == "") 
      {
        document.getElementById("ten").style.borderColor = "red"; 
        document.getElementById("ten").style.borderWidth = "2px";
        document.getElementById("alert_ho_ten").innerHTML="<i>Tên không được để trống</i>";
        check = 1;
      } else
      {
        document.getElementById("ten").style.borderColor = "green"; 
        document.getElementById("ten").style.borderWidth = "1px";
        document.getElementById("alert_ho_ten").innerHTML="";
        check = 0;
      }


      if(isNaN(sdt) == true || sdt == "" || dsdt <10 || dsdt > 11 ){
       document.getElementById("sdt").style.borderColor = "red"; 
       document.getElementById("sdt").style.borderWidth = "2px";
       document.getElementById("alert_sdt").innerHTML="<i>Số điện thoại phải là số và không được rỗng và trong độ dài cho phép!</i>";
       check = 1;    
     }else
     {
       document.getElementById("sdt").style.borderColor = "green"; 
       document.getElementById("sdt").style.borderWidth = "1px";
       document.getElementById("alert_sdt").innerHTML="";
       check = 0;
     }

     if(pass == "")
     {
      document.getElementById("matkhau").style.borderColor = "red"; 
      document.getElementById("matkhau").style.borderWidth = "2px";
      document.getElementById("alert_pass").innerHTML="<i>Mật khẩu không được rỗng và lớn hơn bằng 8 ký tự</i>";
      check = 1;
    }else
    {
      document.getElementById("matkhau").style.borderColor = "green"; 
      document.getElementById("matkhau").style.borderWidth = "1px";
      document.getElementById("alert_pass").innerHTML="";
      check = 0;
    }
    if(repass == "" || repass != pass)
    {
      document.getElementById("rematkhau").style.borderColor = "red"; 
      document.getElementById("rematkhau").style.borderWidth = "2px";
      document.getElementById("alert_repass").innerHTML="<i>Mật khẩu xác thực chưa hợp lệ!</i>";
      check = 1;
    }else
    {
      document.getElementById("rematkhau").style.borderColor = "green"; 
      document.getElementById("rematkhau").style.borderWidth = "1px";

      check = 0;
    }
    if(email == "")
    {
      document.getElementById("email").style.borderColor = "red"; 
      document.getElementById("email").style.borderWidth = "2px";
      document.getElementById("alert_email").innerHTML="<i>Email không được rỗng</i>";
      check = 1;
    }else
    {
      document.getElementById("email").style.borderColor = "green"; 
      document.getElementById("email").style.borderWidth = "1px";
      document.getElementById("alert_email").innerHTML="";

      check = 0;
    }
    if(check == 1){
     alert('Vui lòng kiểm tra lại thông tin!');
     window.location.href = "index.php?view=dangky"
   }
   else document.getElementById("dangky").submit(); 
 }
 var check=0;

 $(document).ready(function(){


  $("#ho").blur(function(){
    var ten = $("#ho").val();
    if(ten == "")
    {
      document.getElementById("ho").style.borderColor = "red"; 
      document.getElementById("ho").style.borderWidth = "2px";
      document.getElementById("alert_ho_ten").innerHTML="<i>Họ không được rỗng!</i>";
      check = 1;
    }else
    {
      document.getElementById("ho").style.borderColor = "green"; 
      document.getElementById("ho").style.borderWidth = "1px";
      document.getElementById("alert_ho_ten").innerHTML="";
      check = 0;
    }
  })


  $("#ten").blur(function(){
    var ten = $("#ten").val();
    if(ten == "")
    {
      document.getElementById("ten").style.borderColor = "red"; 
      document.getElementById("ten").style.borderWidth = "2px";
      document.getElementById("alert_ho_ten").innerHTML="<i>Tên không được rỗng!</i>";
      check = 1;
    }else
    {
      document.getElementById("ten").style.borderColor = "green"; 
      document.getElementById("ten").style.borderWidth = "1px";
      document.getElementById("alert_ho_ten").innerHTML="";
      check = 0;
    }
  })


  $("#sdt").blur(function(){
    var sdt = $("#sdt").val();
    var dsdt = sdt.length;
    if(sdt == "" || dsdt <10 || dsdt >11)
    {
      document.getElementById("sdt").style.borderColor = "red"; 
      document.getElementById("sdt").style.borderWidth = "2px";
      document.getElementById("alert_sdt").innerHTML="<i>Số điện thoại chưa đúng định dạng!</i>";
      check = 1;
    }else
    {
      document.getElementById("sdt").style.borderColor = "green"; 
      document.getElementById("sdt").style.borderWidth = "1px";
      document.getElementById("alert_sdt").innerHTML="";
      check = 0;
    }
  })

  $("#matkhau").blur(function(){
    var matkhau = $("#matkhau").val();
    var d = matkhau.length;
    if(matkhau == "" || d < 8)
    {
      document.getElementById("matkhau").style.borderColor = "red"; 
      document.getElementById("matkhau").style.borderWidth = "2px";
      document.getElementById("alert_pass").innerHTML="<i>Mật khẩu chưa chưa đúng định dạng!</i>";
      check = 1;
    }else
    {
      document.getElementById("matkhau").style.borderColor = "green"; 
      document.getElementById("matkhau").style.borderWidth = "1px";
      document.getElementById("alert_pass").innerHTML="";
      check = 0;
    }
  })

  $("#rematkhau").blur(function(){
    var rematkhau = $("#rematkhau").val();
    var mk = $("#matkhau").val();
    if(mk != rematkhau || rematkhau == "")
    {
      document.getElementById("rematkhau").style.borderColor = "red"; 
      document.getElementById("rematkhau").style.borderWidth = "2px";
      document.getElementById("alert_repass").innerHTML="<i>Mật khẩu chưa chưa khớp nhau!</i>";
      check = 1;
    }else
    {
      document.getElementById("rematkhau").style.borderColor = "green"; 
      document.getElementById("rematkhau").style.borderWidth = "1px";
      document.getElementById("alert_repass").innerHTML="";
      check = 0;
    }
  })

  $("#email").blur(function(){
    var email = $("#email").val();
    if(email == "")
    {
      document.getElementById("email").style.borderColor = "red"; 
      document.getElementById("email").style.borderWidth = "2px";
      document.getElementById("alert_email").innerHTML="<i>Email không được rỗng!</i>";
      check = 1;
    }else
    {
      document.getElementById("email").style.borderColor = "green"; 
      document.getElementById("email").style.borderWidth = "1px";
      document.getElementById("alert_email").innerHTML="";
      check = 0;
    }
  })


  $(".tinh").blur(function(){
    var tinh = $(".tinh").val();
    if(tinh == "")
    {
      document.getElementById("sltinh").style.borderColor = "red"; 
      document.getElementById("sltinh").style.borderWidth = "2px";
      document.getElementById("alert_tinh").innerHTML="<i>Tỉnh không được rỗng!</i>";
      check = 1;
    }else
    {
      document.getElementById("sltinh").style.borderColor = "green"; 
      document.getElementById("sltinh").style.borderWidth = "1px";
      document.getElementById("alert_tinh").innerHTML="";

      check = 0;
    }
  })

  $(".huyen").blur(function(){
    var huyen = $(".huyen").val();
    if(huyen == "")
    {
      document.getElementById("slhuyen").style.borderColor = "red"; 
      document.getElementById("slhuyen").style.borderWidth = "2px";
      document.getElementById("alert_huyen").innerHTML="<i>Huyện không được rỗng!</i>";
      check = 1;
    }else
    {
      document.getElementById("slhuyen").style.borderColor = "green"; 
      document.getElementById("slhuyen").style.borderWidth = "1px";
      document.getElementById("alert_huyen").innerHTML="";

      check = 0;
    }
  })

  $(".xa").blur(function(){
    var xa = $(".xa").val();
    if(xa == "")
    {
      document.getElementById("slxa").style.borderColor = "red"; 
      document.getElementById("slxa").style.borderWidth = "2px";
      document.getElementById("alert_xa").innerHTML="<i>Xã không được rỗng!</i>";
      check = 1;
    }else
    {
      document.getElementById("slxa").style.borderColor = "green"; 
      document.getElementById("slxa").style.borderWidth = "1px";
      document.getElementById("alert_xa").innerHTML="";

      check = 0;
    }
  })





})

</script>
<link rel="stylesheet" type="text/css" href="./css/dangky.css">
<!-- header ends here -->
<form id="dangky" action="" method="post">
  <h2 style="color:#141823; text-align:center; font-size: 30px; 
  line-height:38px; font-weight:1000; font-family:'roboto'">ĐĂNG KÝ THÀNH VIÊN</h2>
  <div class="loginheader">
    <h4 class="title">Nhập đầy đủ thông tin để tiến hành dăng ký!.</h4>
  </div>

  <div class="loginbox radius w3-col s6" style="margin-left:150px; padding-left: 3.5%; width: 75%;">
   
    <div class="loginboxinner radius" style="float: left;">
      <!--loginheader-->
     <div class="loginform">
<p><select id="sl_nnd" name = "sl_nnd">
     <option value="">Chọn nhóm ngưòi dùng</option>
     <option value="0">Ngưòi dùng cá nhân</option>
     <option value="1">Tổ chức - Công ty</option>

   </select>
 </p>
 <div style="color: red;" id="alert_nnd"></div>

        <p>
          <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại >= 10 và <=  11 ký tự!" class="radius" />
        </p>
        <div style="color: red;" id="alert_sdt"></div>
        <p>
          <input style=" width: 209px; text-align: left;" class="radius" class="ho" type="text" name="ho" id="ho" placeholder="Họ">
          <input class="radius" style="width: 209px;" type="text" name="ten" id="ten" placeholder="Tên">
        </p>
        <span style="color: red;" id="alert_ho_ten"></span>
        <p>
          <input type="email" id="email" name="email" placeholder="Email" value="<?php if(isset( $_SESSION['email'])) echo $_SESSION['email'];?>" class="radius" />
        </p>
        <p>
          <input type="password" id="matkhau" name="matkhau" placeholder="Mật khẩu >= 8 ký tự" class="radius" />
        </p>
        <div style="color: red;" id="alert_pass"></div>
        <p>
          <input type="password" id="rematkhau" name="rematkhau" placeholder="Xác nhận mật khẩu" class="radius" />
        </p>
        <div style="color: red;" id="alert_repass"></div>
      </div>

    </div>

    <div class="w3-col s6 radius1" style="float: left; padding-top: 0.7%;">
      <p>
        <select class="tinh" id="sltinh" name="sltinh">
          <option value=""> Chọn tỉnh</option>
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
       <div style="color: red;" id="alert_tinh"></div>
     </p>
     <p>
      <select class="huyen" name="slhuyen" id="slhuyen">
        <option value=""> Chọn huyện</option>
      </select>
    </p>
    <div style="color: red;" id="alert_huyen"></div>
    <p>
      <select class="xa" name="slxa" id="slxa">
        <option value=""> Chọn xã</option>
      </select>
    </p>
    <div style="color: red;" id="alert_xa"></div>
    <p>
     <p>
      <select class="htx" name="slhxa" id="slhxa">
        <option value=""> Chọn hợp tác xã</option>
        <?php
        $sql1 = "SELECT * FROM HOPTACXA";
        $result = mysqli_query($conn,$sql1);
        while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
          ?>
          <option value="<?php echo $rows['HTX_ID'];?>"> <?php echo $rows['HTX_TEN']; ?></option>
          <?php
        }
        ?>
      </select>
    </p>
    <div style="color: red;" id="alert_hta"></div>

    <p>
      <select class="" id="slgioitinh" name="slgioitinh">
        <option value=""> Chọn giới tính</option>
        <option value="Nam">Nam</option>
        <option value="Nũ">Nữ</option>
        <option value="Không xác định">Không xác định</option>
      </select>
      <div style="color: red;" id="alert_gioitinh"></div>
    </p>

    <div style="color: red;" id="alert_email"></div>
  </div>
  <style type="text/css">
    .sl select{
      width: 200px;
      float: left;
      margin-left: 4%;
      margin-bottom: 2%;
    }
  </style>
  <div class="w3-col s12 sl" style="padding-left: 8%;">
    <select id="slngaysinh" name="slngaysinh">
      <option>Ngày sinh</option>
      <?php
        for($i=1;$i<=31;$i++){
          ?>
         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
        }
     ?> 
    </select>

    <select id="slthangsinh" name="slthangsinh">
      <option>Tháng sinh</option>
       <?php
        for($i=1;$i<=12;$i++){
          ?>
         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
        }
     ?> 
    </select>

    <select id="slnamsinh" name="slnamsinh">
      <option>Năm sinh</option>
       <?php
       $year = date("Y");
        for($i=1900;$i<=$year;$i++){
          ?>
         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
        }
     ?> 
    </select>
  </div>
  <div class="w3-col s12" style="padding-left: 20%;">
   <p id="capchar" name="capchar" style="padding-left: 17%;" class="g-recaptcha" data-sitekey="6LdjITIUAAAAAN_4SReoxN5n0SmUhLYCNBAvCOkm"></p> 
 </div>
 <div class="w3-col s12" style="padding-left: 25%;">
  <p id="dk">
    <input style="width: 200px; float: left;" type="button" class="w3-blue" name="dangky" id="dangky" onclick="check_dk();" value="Đăng ký">
     <input style="margin-left: 3px; width: 200px; float: left;" type="button" class="w3-red" name="dangky" id="trolai"  value="Trở lại">
  </p>
</div>

</div>
<!--loginform-->
</div>
<!--loginboxinner-->
</div>
<!--loginbox-->
</div>
</form>
<?php 
if(isset($_POST['ten'])){
  $nhom_nd = $_POST['sl_nnd'];
  $ngaydangky =date("Y-m-d");
  $gioitinh = $_POST['slgioitinh'];
  $htx = $_POST['slhxa'];
  $ten= $_POST['ten'];
  $_SESSION['ten'] = $ten;
  $ho = $_POST['ho'];
  $_SESSION['ho'] = $ho;
  $sdt= $_POST['sdt'];
  $_SESSION['sdt'] = $sdt ;
  $pass = md5($_POST['matkhau']);
  $email= $_POST['email'];
  $_SESSION['email'] = $email;
  $tinh = $_POST["sltinh"];
  $huyen = $_POST['slhuyen'];
  $xa = $_POST['slxa'];
  $recaptcha = $_POST['g-recaptcha-response'];
  $nsinh = $_POST['slnamsinh'].'-'.$_POST['slthangsinh'].'-'.$_POST['slngaysinh'];
  if($recaptcha == "") {
    echo ("<script> alert('Vui lòng kiểm tra đầy đủ thông tin và xác thực không phải người máy!');</script>");
  }else
  {
    $sql = "INSERT INTO USER (USR_SDT,USR_PASS,USR_EMAIL,HTX_ID,GH_ID,ID_TINH,ID_HUYEN,ID_XA,USR_HO,USR_TEN,USR_GIOITINH,USR_NGAYDANGKY,USR_NGAYSINH,USR_TRANGTHAI,Q_ID,USR_LOAI) VALUES ('$sdt','$pass','$email',$htx,1,'$tinh','$huyen','$xa','$ho','$ten','$gioitinh','$ngaydangky','$nsinh',0,3,$nhom_nd)";
           // echo $sql;
    $kq = mysqli_query($conn,$sql);
    if($kq) {
     $_SESSION['dt'] = $sdt;
     include('xacthuc_mail.php');
   }
    // echo "<script> alert('Đăng ký');</script>";
      // echo $ten.$sdt.$pass.$email.$recaptcha;
   // echo "<META http-equiv='refresh' content='0;URL=https://mail.google.com/'";
 }
}
?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#trolai").click(function(){
  window.history.back();
    });
  })
</script>
