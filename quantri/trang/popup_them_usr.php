<style type="text/css">
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
<style type="text/css">
.instructions {
  text-align: center;
  font-size: 20px;
  margin: 15vh;
}

/* //////////////////////////////////////////////////////////////////////////////////////////////
    //   Default Modal Styles   //
    ////////////////////////////////////////////////////////////////////////////////////////////// */
    /*   This is the background overlay   */
    .backgroundOverlay {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
      background: #000000;
      opacity: .85;
      filter: alpha(opacity=85);
      -moz-opacity: .85;
      z-index: 101;
      display: none;
    }

    /*   This is the Popup Window   */
    .delayedPopupWindow {
      display: none;
      position: fixed;
      width: auto;
      max-width: 900px;
      height: 460px;
      top: 50%;
      left: 50%;
      margin-left: -350px;
      margin-top: -230px;
      background-color: #efefef;
      border: 2px solid #333;
      z-index: 102;
      padding: 10px 20px;
    }

    /*   This is the closing button  */
    #btnClose {
      width: 100%;
      display: block;
      text-align: right;
      text-decoration: none;
      color: #BCBCBC;
    }

    /*   This is the closing button hover state  */
    #btnClose:hover {
      color: #c90c12;
    }

    /*   This is the description headline and paragraph for the form   */
    #delayedPopup > div.formDescription {
      float: left;
      display: block;
      width: 44%;
      padding: 1% 3%;
      font-size: 18px;
      color: #666;
      clear: left;
    }

    /*   This is the styling for the form's headline   */
    #delayedPopup > div.formDescription h2 {
      color: #444444;
      font-size: 36px;
      line-height: 40px;
    }

/* 
////////// MailChimp Signup Form //////////////////////////////
*/
/*   This is the signup form body  */
#delayedPopup #mc_embed_signup {
  float: left;
  width: 47%;
  padding: 1%;
  display: block;
  font-size: 16px;
  color: #666;
  margin-left: 1%;
}

/*   This is the styling for the signup form inputs  */
#delayedPopup #mc-embedded-subscribe-form input {
  width: 95%;
  height: 30px;
  font-size: 18px;
  padding: 3px;
  margin-bottom: 5px;
}

/*   This is the styling for the signup form inputs when they are being hovered with the mouse  */
#delayedPopup #mc-embedded-subscribe-form input:hover {
  border: solid 2px #40c348;
  box-shadow: 0 1px 3px #AAAAAA;
}

/*   This is the styling for the signup form inputs when they are focused  */
#delayedPopup #mc-embedded-subscribe-form input:focus {
  border: solid 2px #40c348;
  box-shadow: none;
}

/*   This is the styling for the signup form submit button  */
#delayedPopup #mc-embedded-subscribe {
  width: 100% !important;
  height: 40px !important;
  margin: 10px auto 0 auto;
  background: #5D9E62;
  border: none;
  color: #fff;
}

/*   This is the styling for the signup form submit button hover state  */
#delayedPopup #mc-embedded-subscribe:hover {
  background: #40c348;
  color: #fff;
  box-shadow: none !important;
  cursor: pointer;
}
<?php 
   include('../../config/connect.php');
 ?>
</style>
<!DOCTYPE html>
<html lang="en" >
<div id="pop"></div>
<body>
  <div id="bkgOverlay" class="backgroundOverlay"></div>
  
  <div id="delayedPopup" class="delayedPopupWindow" style="width: 70%; border-radius: 7px;">
    <!-- This is the close button -->
    <a href="#" id="btnClose" class="btnClose">[ X ]</a>

    <style type="text/css">
    .tb tr td{
      text-align: center;
      vertical-align: middle;
    }
  </style>
  <h1 style="text-align: center;" class="box-title">THÊM NGƯỜI DÙNG MỚI</h1>
  <div id="canhbao"></div>
  <form role="form">
  <div class="row">
    <div class="col-md-6">         
      <div class="box-body">
         <div class="form-group">
           <label for="exampleInputEmail1">Số điện thoại</label>
           <span id="alert_sdt"></span>
          <input type="text" class="form-control" id="ipsdt" placeholder="Nhập số điện thoại" value="">
        </div>
        <div class="form-group">
           <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="ipemail" placeholder="Nhập Email" value="">
        </div> 
        <label for="exampleInputEmail1">Họ và tên</label>
        <div class="form-group">
          
          <input style="width: 49%; margin-right: 1%; float: left;" type="text" class="form-control" id="ipho" placeholder="Nhập họ" value="">
          <input style="width: 49%; margin-left: 1%; float: left;" type="text" class="form-control" id="ipten" placeholder="Nhập tên" value="">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Giới tính</label>
          <select class="form-control" id="slgioitinh">
            <option value="Nam"> Nam</option>
            <option value="Nữ"> Nữ</option>
            <option value="Không Xác định"> Không xác định</option>
          </select>
        </div>
      </div>
    </div>
    
    <div class="col-md-6">         
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Hợp tác xã</label>
          <select class="form-control" id="slhtx">
            <?php
            mysqli_set_charset($conn,"UTF8");
              $htx = mysqli_query($conn,"SELECT HTX_ID,HTX_TEN FROM HOPTACXA");
              while($row = mysqli_fetch_array($htx,MYSQLI_ASSOC)){
            ?>
            <option value="<?php echo $row['HTX_ID']; ?>"><?php echo $row['HTX_TEN']; ?></option>
            <?php
          }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Cấp quyền</label>
          <select class="form-control" id="slquyen">
          <?php
            mysqli_set_charset($conn,"UTF8");
              $quyen= mysqli_query($conn,"SELECT Q_ID,Q_TEN FROM QUYEN");
              while($row = mysqli_fetch_array($quyen,MYSQLI_ASSOC)){
                ?>
                 <option value="<?php echo $row['Q_ID']; ?>"><?php echo $row['Q_TEN']; ?></option>
            <?php
          }
          ?>
          </select>
        </div>
        <label for="exampleInputEmail1">Địa chỉ</label>
        <div class="form-group"> 
          <select style="width: 32%; float: left; margin-left: 1%;" class="form-control" id="sltinh">
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
          <select style="width: 32%; float: left; margin-left: 1%;" class="form-control" id="slhuyen">
            <option value=""> Chọn huyện</option>
          </select>
          <select style="width: 32%; float: left; margin-left: 1%;" class="form-control" id="slxa">
            <option value=""> Chọn xã</option>
          </select>
        </div> 
      </div>
      </div>
    </div>

<div class="col-md-12" style="text-align: center;">
   <button style="width: 100px; margin-right: 2%;" id="btnthem" type="button" class="btn btn-primary">Thêm</button>
    <button  style="width: 100px; margin-left: 2%;" class="btn btn-danger btnClose">Trở lại</button>
</div>
     

    </form>
  </div>



  </div>

</div>



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



<script  src="js/index.js"></script>




</body>

</html>
<script type="text/javascript">
  $(document).ready(function ()
  {

    $("#sltinh").blur(function(){
      var id_tinh = $("#sltinh").val();
      $.post("xuly/xuly_them_usr.php", {get_huyen: id_tinh}, function(data){
        $("#slhuyen").html(data);
      });
    });

     $("#slhuyen").blur(function(){
      var id_huyen = $("#slhuyen").val();
      $.post("xuly/xuly_them_usr.php", {get_xa: id_huyen}, function(data){
        $("#slxa").html(data);
      });
    });
    //   $("#ipsdt").keyup(function(){
    //     var sdt = $("#ipsdt").val();
    //     $("#alert_sdt").html(sdt);
    //   // var id_huyen = $("#slhuyen").val();
    //   // $.post("xuly/xuly_them_usr.php", {get_xa: id_huyen}, function(data){
    //   //   $("#slxa").html(data);
    //   // });
    // });
      $("#ipsdt").keyup(function(){
        var sdt = $("#ipsdt").val();
        if(sdt.length <10 || sdt.length >11){
              $("#canhbao").html(' <div class="alert" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 270px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>chưa hợp lệ vui lòng kiểm tra lại!</div>'); 
        }else{
             $.post("xuly/xuly_them_usr.php", {check_sdt: sdt}, function(data){
        $("#canhbao").html(data);
      });
    }
    });


          $("#btnthem").click(function(){
        var sdt = $("#ipsdt").val();
        if(sdt==""){
                $("#canhbao").html(' <div class="alert" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 270px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>Không được rỗng!</div>'); 
        }else
        if(sdt.length <10 || sdt.length >11){
              $("#canhbao").html(' <div class="alert" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 270px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>chưa hợp lệ vui lòng kiểm tra lại!</div>'); 
        }else{
        var mail = $("#ipemail").val();
        var ho = $("#ipho").val();
        var ten = $("#ipten").val();
        var gt = $("#slgioitinh").val();
        var htx = $("#slhtx").val();
        var quyen = $("#slquyen").val();
        var tinh = $("#sltinh").val();
        var huyen = $("#slhuyen").val();
        var xa = $("#slxa").val();
          if(mail == "" || ten =="" || ho=="" || tinh=="" || huyen=="" || xa==""){
              alert("Chưa nhập đầy đủ thông tin!");
          }else{
              $.post("xuly/xuly_them_usr.php", {sdt: sdt, mail: mail, ho: ho, ten: ten,gt: gt, htx: htx,quyen: quyen, tinh: tinh, huyen: huyen, xa: xa}, function(data){
             $("#canhbao").html(data);
      });
    }
    }
    });




    //Fade in delay for the background overlay (control timing here)
    $("#bkgOverlay").delay(200).fadeIn(200);
  //Fade in delay for the popup (control timing here)
  $("#delayedPopup").delay(200).fadeIn(200);

    //Hide dialouge and background when the user clicks the close button
    $(".btnClose").click(function (e)
    {
      HideDialog();
      e.preventDefault();
    });

  });
//Controls how the modal popup is closed with the close button
function HideDialog()
{
  $("#bkgOverlay").fadeOut(200);
  $("#delayedPopup").fadeOut(100);
  $("#cho_id").load("trang/danhsach_nguoidung.php");
}
</script>
<script>
  $(document).ready(function(){
    $("#canhbao").click(function(){
      $("#canhbao").html("");

          $("#ipsdt").keyup(function(){
        var sdt = $("#ipsdt").val();
        if(sdt.length <10 || sdt.length >11){
              $("#canhbao").html(' <div class="alert" style="position: absolute; z-index: 10; top:3px; height: 40px;padding-top: 8px; left: 270px;"><span class="closebtn">&times;</span>  <strong>Số điện thoại </strong>chưa hợp lệ vui lòng kiểm tra lại!</div>'); 
        }else{
        var mail = $("#ipmail").val();
        var ho = $("#ipho").val();
        var ten = $("#ipten").val();
        var gt = $("#slgioitinh").val();
        var htx = $("#slhtx").val();
        var quyen = $("#slquyen").val();
        var tinh = $("#sltinh").val();
        var huyen = $("#slhuyen").val();
        var xa = $("#slxa").val();








      $.post("xuly/xuly_them_usr.php", {check_sdt: sdt}, function(data){
        $("#canhbao").html(data);
      });
    }
    });
    })

  })

</script>
