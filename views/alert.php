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
      max-width: 480px;
      height: 310px;
      top: 50%;
      left: 50%;
      margin-left: -260px;
      margin-top: -180px;
      background-color: #efefef;
      border: 2px solid #333;
      z-index: 102;
      padding: 10px 20px;
    }

    /*   This is the closing button  */
    #btnClose {


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

</style>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<!DOCTYPE html>
<html lang="en" >
<body>
  <img style=" z-index: 105; position: absolute; top:40%;left: 45%; width: 150px;height: 150px; border-radius: 50%;" id="imgl" src="loading.gif">
  <div id="bkgOverlay" class="backgroundOverlay"></div>
  
  <div id="delayedPopup" class="delayedPopupWindow" style="width: 70%; height: 200px; border-radius: 7px;">
    <!-- This is the close button -->
    <h1 style="font-size: 25px;text-align: center; font-family: 'roboto'; padding-top: 3%;"><?php echo $_SESSION['alert']; ?></h1>
    <input id="btnClose" style="width: 150px; position: absolute; top: 75%; left: 35%;" type="button" class="w3-button w3-green" value="OK" />

  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

  <script  src="js/index.js"></script>

<!-- <script type="text/javascript">alert("Đăng nhập thành công!");</script>
  <META http-equiv="refresh" content="0;URL=index.php"> -->


</body>

</html>
<script type="text/javascript">
  $(document).ready(function ()
    {$("#bkgOverlay").delay(0).fadeIn(400);
    //Fade in delay for the background overlay (control timing here)
    setTimeout(function(){
      $("#imgl").remove();
      $("#bkgOverlay").delay(0).fadeIn(400);
  //Fade in delay for the popup (control timing here)
  $("#delayedPopup").delay(0).fadeIn(400);
}, 2000);
    //Hide dialouge and background when the user clicks the close button
    setTimeout(function(){
     HideDialog();
     e.preventDefault();
     window.location.href = '<?php echo $_SESSION['redirect']; ?>';

   }, 5000);
     setTimeout(function(){
     HideDialog();
     window.location.href = '<?php echo $_SESSION['redirect']; ?>';
     
   },5000);
    $("#btnClose").click(function (e)
    {
      HideDialog();
      e.preventDefault();
      window.location.href = '<?php echo $_SESSION['redirect']; ?>';
    });
  });
//Controls how the modal popup is closed with the close button
function HideDialog()
{
  $("#bkgOverlay").fadeOut(400);
  $("#delayedPopup").fadeOut(300);
}
</script>