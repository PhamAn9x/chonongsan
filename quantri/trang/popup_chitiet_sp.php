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
      max-width: 1500px;
      height: 520px;
      top: 45%;
      left: 43%;
      margin-left: -260px;
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
  if(isset($_GET['sp_id'])){
    $sp_id = $_GET['sp_id'];
    mysqli_set_charset($conn,"UTF8");
    $usr = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM SANPHAM WHERE SP_ID = $sp_id"),MYSQLI_ASSOC);
  }
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
  <h1 style="text-align: center;" class="box-title">THÔNG TIN CHI TIẾT SẢN PHẨM (<span style="color: blue;"> MSP: <?php echo $sp_id; ?></span> )</h1>
  <!-- <h2 style="text-align: center; font-weight: 800; color: red;">Mã sản phẩm: <?php //echo $sp_id; ?></h2> -->
  <form role="form">
  <div class="row">
    <div class="col-md-4">         
      <div class="box-body">
        <div class="form-group">
           <label for="exampleInputEmail1">Tên sản phẩm</label>
          <label style="border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $usr['SP_TEN']; ?></label>
        </div> 
        <div class="form-group">
          <label for="exampleInputFile">Người đăng</label>
          <?php 
              $sdt = $usr['USR_SDT'];
              $nguoidang = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT='$sdt'"));
          ?>
          <label style=" border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $nguoidang[0]." ".$nguoidang[1]; ?></label>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Địa chỉ người đăng</label>
          <?php 
              $sdt = $usr['USR_SDT'];
              $dc = mysqli_fetch_row(mysqli_query($conn,"SELECT XA_NAME,HUYEN_NAME,TINH_NAME FROM USER usr,tinh_thanh tt,quan_huyen qh,phuong_xa px WHERE USR_SDT='$sdt' AND usr.id_tinh = tt.id_tinh AND usr.id_huyen = qh.id_huyen AND usr.id_xa = px.id_xa"));
          ?>
          <label style=" border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $dc[0].", ".$dc[1].", ".$dc[2]; ?></label>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Số điện thoại người đăng</label>
          <?php 
              $sdt = $usr['USR_SDT'];
              $nguoidang = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT='$sdt'"));
          ?>
          <label style=" border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $nguoidang[0]." ".$nguoidang[1]; ?></label>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">         
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Hợp tác xã</label>
           <?php 
              $htx = $usr['SP_HTX_ID'];
              $htx = mysqli_fetch_row(mysqli_query($conn,"SELECT HTX_TEN,NDD_SDT FROM HOPTACXA WHERE HTX_ID=$htx"));
              $ndd = $htx[1];
          ?>
           <label style=" border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $htx[0]; ?></label>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Người đại diện hợp tác xã</label>
           <?php 
              $nddien = mysqli_fetch_row(mysqli_query($conn,"SELECT NDD_TEN FROM NGUOIDAIDIEN WHERE NDD_SDT='$ndd'"));
          ?>
          <label style=" border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $nddien[0]; ?></label>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Địa chỉ người đại diện</label>
           <?php 
              $nddien = mysqli_fetch_row(mysqli_query($conn,"SELECT NDD_DIACHi FROM NGUOIDAIDIEN WHERE NDD_SDT='$ndd'"));
          ?>
          <label style=" border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $nddien[0]; ?></label>
        </div>
         <div class="form-group">
          <label for="exampleInputPassword1">Số điện thoại người đại diện</label>
           <?php 
              $nddien = mysqli_fetch_row(mysqli_query($conn,"SELECT NDD_DIACHi FROM NGUOIDAIDIEN WHERE NDD_SDT='$ndd'"));
          ?>
          <label style=" border-radius: 5px; color: blue; font-size: 16px; font-family: 'robo';" class="form-control"><?php echo $nddien[0]; ?></label>
        </div>
      </div>
      </div>
      <style type="text/css">
        ul li{
          list-style-type: none;
          float: left;
          margin:2px; 
        }
      </style>
      <?php
        $result = mysqli_query($conn,"SELECT HA_ID,HA_TEN FROM HINHANH WHERE SP_ID = $sp_id");
       foreach ($result as $row) {
      ?>
      <img id="zoom_l<?php echo $row['HA_ID']; ?>" style=" opacity: 0; position: absolute; left: 1.5%; border-radius: 5px; bottom: 17%; z-index: 100; width: 65%;height: 80%;" src="../upload/<?php echo $row['HA_TEN']; ?>"/>
      <?php
}
    ?>
      <div class="col-md-4" style="padding-top: 1%; ">
        <div class="form-group">
          <label for="exampleInputPassword1">Hình ảnh</label>
        </div>
        <ul style="width: 120%; margin-left: -15%;">
          <?php
            foreach ($result as $row) {
          ?>
          <li id="zoom<?php echo $row['HA_ID']; ?>"><img src="../upload/<?php echo $row['HA_TEN']; ?>" style="width: 90px;height: 60px"></li>
          
          <script type="text/javascript">
            $(document).ready(function(){
                $("#zoom<?php echo $row['HA_ID']; ?>").hover(function(){
                    $("#zoom_l<?php echo $row['HA_ID']; ?>").css({opacity:1});

                }, function(){
                  $("#zoom_l<?php echo $row['HA_ID']; ?>").css({opacity:0});
                });
            });
          </script>
<?php
        }
          ?>
        </ul>
      </div>
    </div>

<div class="col-md-12" style="text-align: center; margin-top: 3%;">
   <button style="width: 120px; margin-right: 2%;" id="btnchapnhan" type="button" class="btn btn-primary">Chấp nhận</button>
   <button style="width: 120px; margin-right: 2%;" id="btnkhongchapnhan" type="button" class="btn btn-warning">Không chấp nhận</button>
    <button  style="width: 120px; margin-left: 2%;" class="btn btn-danger btnClose">Trở lại</button>
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
    $("#btnchapnhan").click(function(){
      var sp_id = <?php echo $sp_id; ?>;
        $.post("xuly/xuly_update.php", {chapnhan: sp_id }, function(data){
      $("#pop").html(data);
        });
    });
    $("#btnkhongchapnhan").click(function(){
      var sp_id = <?php echo $sp_id; ?>;
        $.post("xuly/xuly_update.php", {khongchapnhan: sp_id }, function(data){
      $("#pop").html(data);
        });
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
    // $("#btnUpdate").click(function(){
    //     var mail = $("#ipemail").val();
    //     var ho = $("#ipho").val();
    //     var ten = $("#ipten").val();
    //     var gt = $("#slgioitinh").val();
    //     var htx = $("#slhtx").val();
    //     var quyen = $("#slquyen").val();
    //     var sdt = <?php //echo $sdt; ?>;
    //    if(confirm("Bạn có chắc chắn đã điền đầy đủ?")){
    //     if(mail=="" || ho=="" || ten=="") alert("Dự liều chưa đủ! Vui lòng kiểm tra lại thông tin!");
    //       else{
    //            $.post("xuly/xuly_update.php", {email: mail,ho: ho,ten: ten,gt: gt,htx: htx,quyen: quyen,sdt: sdt}, function(data){
    //                         $("#pop").html(data);
    //                     });
    //       }
    //   }
    // });
  });
//Controls how the modal popup is closed with the close button
function HideDialog()
{
  $("#bkgOverlay").fadeOut(200);
  $("#delayedPopup").fadeOut(100);
  $("#show").load("trang/danhsach_sanpham.php");
}
</script>