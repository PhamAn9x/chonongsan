<!-- header starts here -->
<div style="margin-left: 20%; margin-top: 5%;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
      var check = 1;
  $(document).ready(function(){
   $("#sdt").blur(function(){
      var sdt = $("#sdt").val();
       if(sdt == "")
        {
          document.getElementById("sdt").style.borderColor = "red"; 
          document.getElementById("sdt").style.borderWidth = "2px";
          document.getElementById("alert_sdt").innerHTML="<i>Số điện thoại không được rỗng!</i>";
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
       if(matkhau == "")
        {
          document.getElementById("matkhau").style.borderColor = "red"; 
          document.getElementById("matkhau").style.borderWidth = "2px";
          document.getElementById("alert_matkhau").innerHTML="<i>Mật khẩu không được rỗng!</i>";
          check = 1;
        }else
              {
                document.getElementById("matkhau").style.borderColor = "green"; 
                document.getElementById("matkhau").style.borderWidth = "1px";
                document.getElementById("alert_matkhau").innerHTML="";
                check = 0;
              }
    })

  })
function dangnhap(){
  if(check == 1) alert("Vui lòng kiểm tra đầy đủ thông tin"); else document.getElementById("dangnhap").submit();
}
  
</script>
<link rel="stylesheet" type="text/css" href="./css/dangky.css">
<!-- header ends here -->
<div class="loginbox radius" style="margin-left:200px;">
  <h2 style="color:#141823; text-align:center; font-size: 30px; 
  line-height:38px; font-weight:1000; font-family: 'roboto';">ĐĂNG NHẬP</h2>
  <div class="loginboxinner radius">
    <div class="loginheader">
      <h4 class="title">Nhập tài khoản và mật khẩu để đăng nhập!.</h4>
    </div>
    <!--loginheader-->
    <div class="loginform">
      <form id="dangnhap" action="" method="post">
        <p>
          <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại" class="radius" />
        </p>
        <div style="color: red;" id="alert_sdt"></div>
        <p>
          <input type="password" id="matkhau" name="matkhau" placeholder="Nhập mật khẩu" class="radius" />
        </p>
         <div style="color: red;" id="alert_matkhau"></div>
        <p  style="text-align: left; margin-left: 20px; color: blue; font-size: 15px;" >
          <input style="width: 15px;" type="checkbox" name="nhotk" id="nhotk" value=""/> <i>Ghi nhớ tài khoản</i><i style="margin-left: 180px;">Quên mật khẩu?</i>
        </p>
        <p>
          <input type="button" class="w3-blue w3-round" onclick="dangnhap();" name="dangky" value="Đăng nhập">
        </p>
      </form>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
<!--loginbox-->
</div>
<?php
  if(isset($_POST['sdt'])){
    $sdt = $_POST['sdt'];
    $matkhau = $_POST['matkhau'];
    $_SESSION['sdt'] = $sdt;
    $pass = md5($matkhau);
    $sql = "SELECT * FROM USER WHERE USR_SDT = '$sdt' AND USR_PASS = '$pass'";
    $result = mysqli_query($conn,$sql);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $kq = mysqli_num_rows($result);
    if($kq>0){
      $_SESSION['user'] = $row['USR_TEN'];
      $_SESSION['pass'] = $row['USR_PASS'];
      ?>
      <script type="text/javascript">alert("Đăng nhập thành công!");</script>
      <META http-equiv="refresh" content="0;URL=index.php">
      <?php
        echo "<script type='text/javascript'>alert('$kq[1]');</script>";
    }else{
      ?>
      <script type="text/javascript"> alert("Sai tên đăng nhập hoặc mật khẩu!");</script>
      <?php
    }
  }
?>
</div>