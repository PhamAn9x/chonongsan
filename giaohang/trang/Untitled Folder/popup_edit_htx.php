<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
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
      max-width: 720px;
      height: 460px;
      top: 50%;
      left: 50%;
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
  if(isset($_GET['htx_id'])){
    $htx_id = $_GET['htx_id'];
    mysqli_set_charset($conn,"UTF8");
    $htx = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM HOPTACXA WHERE HTX_ID = $htx_id"),MYSQLI_ASSOC);
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
  <h1 style="text-align: center;" class="box-title">CHỈNH SỬA THÔNG TIN HỢP TÁC XÃ</h1>
  <form role="form">
  <div class="row">
    <div class="col-md-6">
      <div class="box-body">
        <div class="form-group">
           <label for="exampleInputEmail1">Tên hợp tác xã</label>
          <input value="<?php echo $htx['HTX_TEN']; ?>" type="text" class="form-control" id="ipten_htx" placeholder="Nhập tên hợp tác xã">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Địa chỉ</label>
          <input value="<?php echo $htx['HTX_DIACHI']; ?>" type="text" class="form-control" id="iphtx_diachi" placeholder="Nhập số địa chỉ hợp tác xã" />

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Số điện thoại hợp tác xã</label>
          <input value="<?php echo $htx['HTX_SDT']; ?>" type="text" class="form-control" id="iphtx_sdt" placeholder="Nhập số điện thoại hợp tác xã" />
        </div>
        <div class="form-group">


        </div>
        <div class="form-group">

        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên người đại diện</label>
          <input value="<?php echo $htx['NDD_TEN']; ?>" type="text" class="form-control" id="ipten_dd" placeholder="Nhập tên người đại diện" />
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Địa chỉ người đại diện</label>
          <input  value="<?php echo $htx['NDD_DIACHI']; ?>" type="text" class="form-control" id="ipdiachi_dd" placeholder="Nhập địa chỉ người đại diện" />
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Số điện thoại người đại diện</label>
          <input  value="<?php echo $htx['NDD_SDT']; ?>" type="text" class="form-control" id="ipsdt_dd" placeholder="Nhập địa chỉ người đại diện" />
        </div>
      </div>
      </div>
    </div>
<div class="col-md-12" style="text-align: center;">
   <button style="width: 100px; margin-right: 2%;" id="btncapnhat_htx" type="button" class="btn btn-primary">Cập nhật</button>
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
  $("#show").load("trang/danhsach_hoptacxa.php");
}
</script>
<script>
function codeAddress() {

}
</script>
<script>
  $(document).ready(function(){
    $("#btncapnhat_htx").click(function(){
      geocoder = new google.maps.Geocoder();
      var address = document.getElementById("iphtx_diachi").value;
      geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      var id = <?php echo $htx_id; ?>;
      var tungdo = results[0].geometry.location.lat();
      var vido = results[0].geometry.location.lng();
      var htx_ten = $("#ipten_htx").val();
      var htx_diachi = $("#iphtx_diachi").val();
      var htx_sdt = $("#iphtx_sdt").val();
      var dd_ten = $("#ipten_dd").val();
      var dd_diachi = $("#ipdiachi_dd").val();
      var dd_sdt = $("#ipsdt_dd").val();
      $.post("xuly/xuly_update.php", {id: id, tungdo: tungdo,vido: vido, htx_ten: htx_ten, htx_diachi: htx_diachi, htx_sdt: htx_sdt, dd_ten: dd_ten, dd_diachi: dd_diachi, dd_sdt: dd_sdt}, function(data){
                   $("#pop").html(data);
               });





      //alert(tungdo+" "+vido + htx_ten+htx_diachi+htx_sdt+ " "+dd_ten+dd_diachi+dd_ten);
      }
      else {
      alert("Địa chỉ không hợp lệ, kiểm tra lại!");
      }
      });
    });
  });
</script>
