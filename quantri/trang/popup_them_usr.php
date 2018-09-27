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
  if(isset($_GET['sdt'])){
    $sdt = $_GET['sdt'];
    mysqli_set_charset($conn,"UTF8");
    $usr = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM USER WHERE USR_SDT = $sdt"),MYSQLI_ASSOC);
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
  <h1 style="text-align: center;" class="box-title">CHỈNH SỦA THÔNG TIN NGƯỜI DÙNG</h1>
  <h2 style="text-align: center; font-weight: 800; color: red;">(<?php echo $sdt; ?>)</h2>
  <form role="form">
  <div class="row">
    <div class="col-md-6">         
      <div class="box-body">
        <div class="form-group">
           <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="ipemail" placeholder="Nhập Email" value="<?php echo $usr['USR_EMAIL']; ?>">
        </div> <label for="exampleInputEmail1">Họ và tên</label>
        <div class="form-group">
          
          <input style="width: 49%; margin-right: 1%; float: left;" type="text" class="form-control" id="ipho" placeholder="Nhập họ" value="<?php echo $usr['USR_HO']; ?>">
          <input style="width: 49%; margin-left: 1%; float: left;" type="text" class="form-control" id="ipten" placeholder="Nhập tên" value="<?php echo $usr['USR_TEN']; ?>">
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
      </div>
      </div>
    </div>

<div class="col-md-12" style="text-align: center;">
   <button style="width: 100px; margin-right: 2%;" id="btnUpdate" type="button" class="btn btn-primary">Cập nhật</button>
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
    $("#btnUpdate").click(function(){
        var mail = $("#ipemail").val();
        var ho = $("#ipho").val();
        var ten = $("#ipten").val();
        var gt = $("#slgioitinh").val();
        var htx = $("#slhtx").val();
        var quyen = $("#slquyen").val();
        var sdt = <?php echo $sdt; ?>;
       if(confirm("Bạn có chắc chắn đã điền đầy đủ?")){
        if(mail=="" || ho=="" || ten=="") alert("Dự liều chưa đủ! Vui lòng kiểm tra lại thông tin!");
          else{
               $.post("xuly/xuly_update.php", {email: mail,ho: ho,ten: ten,gt: gt,htx: htx,quyen: quyen,sdt: sdt}, function(data){
                            $("#pop").html(data);
                        });
          }
      }
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